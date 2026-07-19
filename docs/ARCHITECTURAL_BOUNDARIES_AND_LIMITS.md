# Architectural Boundaries and Operational Limits

This document collects the important boundaries, limits, and rules for the PhanMeeEin student MVP.

It is written for project-book explanation, presentation preparation, and deployment operation.

Do not record real passwords, API keys, database credentials, R2 secrets, Render secrets, complete connection strings, or private certificates in this file.

## 1. Current Production Shape

The current deployed MVP uses one Render web service for the main Laravel application.

```text
Browser
  -> Render Laravel container
      -> Aiven MySQL
      -> Cloudflare R2
      -> Google Gemini API
```

The AI chat interface, chat routes, prompt building, Gemini client, and AI conversation persistence are currently integrated into the main Laravel codebase through the local `AiCompanion` package.

The AI model itself does not live in the Render container. It is provided by Google Gemini and is called through an outbound HTTPS JSON API request.

## 2. Planned Separable AI Architecture

The approved project architecture allows the AI capability to become a separately deployed service later.

```text
Browser
  -> Main Laravel application
      -> Separate AI service
          -> Gemini or another AI provider
```

In that future design, Laravel remains the security boundary and the AI service remains stateless where practical.

Recommended future service-to-service protection:

```text
HTTPS JSON + HMAC request signing
```

HMAC signing means the main app signs each AI-service request with a shared server-side secret. The AI service verifies the signature before accepting the request. This prevents direct unauthorized use of the AI service and protects provider quota.

Current MVP note:

```text
HMAC is not currently active because there is no separately deployed internal AI service yet.
```

## 3. Ownership Boundaries

| Area | Owner | Rule |
| --- | --- | --- |
| User accounts | Laravel main app | Users, passwords, roles, sessions, and authorization stay in the main app. |
| Superadmin authority | Laravel main app and Aiven MySQL | Superadmin role is stored in the database and enforced by Laravel policies/controllers. |
| Content and categories | Laravel main app and Aiven MySQL | Content records are permanent database data. |
| Uploaded files | Cloudflare R2 | R2 stores file bytes. Laravel stores metadata and paths in MySQL. |
| File access control | Laravel main app | Browser requests files through Laravel media routes, not direct DB-to-R2 communication. |
| AI chat UI | Laravel main app | Floating chat button and panel are part of the main app frontend. |
| AI memory | Laravel main app and Aiven MySQL | Current chat history is stored in `ai_conversations` and `ai_messages`. |
| AI response generation | Gemini API | Google Gemini generates the model response. Laravel controls the request. |
| Deployment image | Docker and Render | Container runs the Laravel app and built frontend assets. |
| CI checks | GitHub Actions | CI validates tests, config/route cache, frontend build, and Docker build. |

## 4. Browser Boundary

The browser is never trusted as an authority for ownership or role decisions.

Browser may send:

```text
form fields
uploaded files
chat message text
selected content/category IDs
UI state
CSRF token
session cookie
```

Browser must not own:

```text
user role
content ownership
conversation ownership
upload ownership
Gemini API key
R2 secret key
database credentials
authorization result
```

Rule:

> The browser may request an action, but Laravel decides whether the action is allowed.

## 5. Laravel Application Boundary

Laravel is the trusted coordinator.

Laravel validates:

```text
auth session
CSRF token
request method
input size and type
file MIME and extension
ownership
role permission
rate limit
database connection
storage configuration
```

Laravel coordinates:

```text
database writes
R2 file writes
AI prompt construction
Gemini API calls
chat history persistence
media serving
health checks
```

Laravel should not:

```text
expose service secrets to JavaScript
trust browser-supplied user_id values
trust browser-supplied roles
store uploads on Render container storage in production
store authoritative AI memory in browser localStorage
send unnecessary private data to the AI provider
```

## 6. Database Boundary: Aiven MySQL

Aiven MySQL stores durable application state.

Current production uses MySQL for:

```text
users
roles
categories
contents
content resources metadata
comments
reports
saves/reactions
sessions
cache
queues
AI conversations
AI messages
```

Database rules:

```text
Use Laravel migrations for schema changes.
Run php artisan migrate:status before production migrations.
Use php artisan migrate --pretend when reviewing migration impact.
Do not run migrate:fresh, migrate:refresh, or db:wipe against production unless intentionally rebuilding.
Do not manually change production schema without also creating a migration.
```

Database limitation:

```text
Aiven MySQL does not talk directly to R2 or Gemini.
Laravel is the coordinator between services.
```

## 7. Object Storage Boundary: Cloudflare R2

R2 stores uploaded file bytes. MySQL stores file references and metadata.

Normal upload sequence:

```text
1. Browser sends file to Laravel.
2. Laravel validates file.
3. Laravel uploads file to R2 through the S3-compatible API.
4. Laravel saves the returned object name/path in MySQL.
5. Later, Laravel reads the DB path and serves or links the file.
```

Current upload directories:

```text
profile
content
content-resources
```

Production storage environment:

```text
FILESYSTEM_DISK=s3
UPLOADS_DISK=s3
AWS_DEFAULT_REGION=auto
AWS_ENDPOINT=https://[CLOUDFLARE_ACCOUNT_ID].r2.cloudflarestorage.com
AWS_URL=
AWS_USE_PATH_STYLE_ENDPOINT=true
```

Keep `AWS_URL` blank unless a public R2 or custom domain is intentionally configured.

R2 and DB relationship:

```text
MySQL stores: file name/path, metadata, content relationship
R2 stores: actual file bytes
Laravel connects them
```

Failure cases:

```text
R2 upload fails before DB save:
  Laravel should not save a new file path.

R2 upload succeeds but DB save fails:
  R2 may contain an orphaned file.

DB path exists but R2 object is missing:
  image/resource may appear broken.

R2 object exists but URL/access config is wrong:
  image/resource may appear broken.
```

## 8. Upload Validation Limits

Current content image validation:

```text
nullable
file
mimes: png, jpg, jpeg, webp, gif
```

Current content resource validation:

```text
nullable array
allowed extensions:
png, jpg, jpeg, webp, gif,
mp4, mov, avi, mkv,
pdf, doc, docx, ppt, pptx, xls, xlsx,
txt, zip

per-file limit:
5 MB

total resources per request:
10 MB
```

Current profile image validation:

```text
file
mimes: png, jpg, jpeg, svg
```

Frontend forms also show the 10 MB total-resource warning, but the server-side Laravel validation is the real authority.

Important boundary:

> Browser-side file validation improves user experience, but Laravel-side validation is the security control.

## 9. Render Container Boundary

Render runs the Docker image for the Laravel application.

Render container contains:

```text
Laravel app code
Composer production dependencies
built Vite assets
Apache/PHP runtime
local AiCompanion package code
published chat widget assets
```

Render container must not be treated as durable storage.

Do not depend on Render container filesystem for:

```text
uploaded profile images
uploaded content images
content resources
database backups
AI conversation memory
long-term logs
```

Required production posture:

```text
APP_ENV=production
APP_DEBUG=false
APP_URL=https://[RENDER_APP_HOST]
TRUSTED_PROXIES=*
SESSION_SECURE_COOKIE=true
LOG_CHANNEL=stderr
LOG_STACK=stderr
```

Known deployment limits:

```text
Free or low-cost instances may cold start.
Region mismatch between Render, Aiven, R2, and Gemini can add latency.
Deployments can take several minutes because CI and Docker builds must complete.
```

## 10. AI Boundary and Rate Limits

Current AI request flow:

```text
Browser
  -> POST /ai/chat
  -> Laravel validates auth, CSRF, message length, and rate limit
  -> Laravel builds prompt with bounded context
  -> Laravel calls Gemini HTTPS JSON API
  -> Laravel saves user and assistant messages in MySQL
  -> Laravel returns JSON to browser
```

Detailed AI memory flow per request:

```text
1. User sends a new message from the chat pane.
2. Laravel reads the latest 20 previous messages from ai_messages for the active conversation.
3. Laravel builds the prompt using:
   - the latest 20 previous messages
   - the current new user message
   - the web helper context document, if available
4. Laravel sends the final prompt to Gemini through HTTPS JSON.
5. Gemini returns an assistant reply.
6. Laravel saves the new user message into ai_messages.
7. Laravel saves the assistant reply into ai_messages.
8. Laravel returns the assistant reply and refreshed message list to the browser.
```

Important clarification:

```text
The latest 20 previous messages are read from the database and sent to Gemini as context.
They are not sent "to the database" again.
Only the new user message and new assistant reply are written after Gemini responds.
```

Current AI route settings:

```text
route prefix: /ai
middleware: web, auth
chat limit: throttle:10,1
clear limit: throttle:5,1
message max length: 2000 characters
Gemini timeout: 30 seconds
memory driver: database
max stored session messages shown: 100
context messages sent to prompt: 20
authenticated retention days: 7
```

Current AI memory configuration in Laravel:

```php
'memory' => [
    'driver' => 'database',
    'session_key' => 'active_ai_conversation_id',
    'max_messages' => 100,
    'context_messages' => 20,
    'authenticated_retention_days' => 7,
],
```

Meaning:

```text
authenticated_retention_days: 7
  New authenticated AI conversations receive an expiry timestamp 7 days ahead.
  This is a retention rule, not an automatic database deletion by itself.

max_messages: 100
  A conversation keeps at most 100 recent messages in the database.
  Older messages in the same active conversation are pruned.

context_messages: 20
  Only the latest 20 messages are sent back into the AI prompt as context.
  This controls cost, latency, and prompt size.
```

Logout behavior:

```text
Logging out clears the Laravel session pointer named active_ai_conversation_id.
It does not physically delete ai_conversations or ai_messages rows immediately.
After a new login session, the app does not automatically reuse old rows as long-term memory.
```

Future retention enforcement:

```text
A future Laravel cleanup command or Render Cron Job can delete expired ai_conversations.
Because ai_messages cascade on conversation delete, their messages would be removed too.
```

Current Gemini key behavior:

```text
GEMINI_API_KEY_1
GEMINI_API_KEY_2
GEMINI_API_KEY_3
```

The app can attempt configured keys and fallback models if one key or model fails.

AI security rules:

```text
Do not expose Gemini keys to browser JavaScript.
Do not send all database data into the prompt.
Do not trust user-provided conversation IDs without ownership checks.
Keep AI context bounded.
Keep provider errors generic for users.
Log server-side errors without exposing secrets.
```

Presentation wording:

> The AI feature is server-mediated. The browser talks to Laravel, Laravel controls user identity and context, and only Laravel calls Gemini.

## 11. Cache, Session, and Queue Boundary

Production uses database-backed drivers:

```text
SESSION_DRIVER=database
CACHE_STORE=database
QUEUE_CONNECTION=database
```

Reason:

```text
Render container storage is temporary.
Database-backed drivers survive redeploys better than file-backed drivers.
```

Operational effect:

```text
The cache, sessions, and queue tables must exist before production use.
php artisan optimize:clear may touch the configured cache store.
If CACHE_STORE=database and the cache table is missing, cache clearing can fail.
```

## 12. Cloud Provider Size and Limit Awareness

Several layers can reject an upload or request before application logic finishes.

Relevant layers:

```text
Browser form and JavaScript checks
Laravel validation
PHP upload settings
Apache/PHP request limits inside the container
Render proxy/platform limits
Cloudflare/R2 S3-compatible request rules
Aiven MySQL packet/storage limits
Gemini API request/token/quota limits
Laravel route rate limits
```

Project rule:

> The effective limit is the smallest active limit in the path.

Example:

```text
If Laravel allows 10 MB total resources but PHP upload_max_filesize is 2 MB,
the real maximum is 2 MB until PHP is configured higher.
```

For this MVP, keep user-facing upload sizes conservative and easy to demo:

```text
Small profile images
Small content images
Content resources within 10 MB total per request
Short AI prompts
One AI smoke-test message per deploy
```

## 13. CI and Release Boundary

GitHub Actions validates code before deployment confidence.

Current CI checks:

```text
Composer install
Laravel environment preparation
php artisan test
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
npm ci
npm run build
docker build -t phanmeeein:test .
```

CI does not prove:

```text
production database credentials are correct
R2 production credentials are correct
Gemini production quota is available
Render region latency is low
browser cache has refreshed
production seed data is present
```

Therefore every production deploy still needs the smoke test in `docs/DEMO_CHECKLIST.md`.

## 14. Security Rules For Presentation

Use these as short explanation points:

```text
Laravel is the security gateway.
Database stores authority; browser stores only UI state.
R2 stores file bytes; MySQL stores file references.
Gemini keys stay server-side.
CSRF protects state-changing browser requests.
Rate limiting protects AI quota.
Input validation protects database, storage, and AI provider calls.
Role checks protect admin and author workflows.
CI catches code-level regressions before deployment.
Health endpoints help detect production configuration problems.
```

## 15. Developed Rules For Future Changes

Use these rules when adding features:

1. New database structure must use migrations.
2. New uploads must go through `UploadedMedia` or an equivalent reviewed storage helper.
3. New uploaded file types must be added to both server validation and frontend hints.
4. New AI context sources must pass authorization before being included in a prompt.
5. New AI endpoints must be authenticated, CSRF-protected where browser-originated, and rate-limited.
6. New admin actions must use role checks on the server, not hidden UI controls only.
7. New production environment variables must be documented without secrets.
8. New deployment behavior must be reflected in `README.md`, `PRODUCTION_OPERATIONS.md`, or this document.
9. New provider integrations must keep provider secrets on the server.
10. New performance optimizations should be measured before and after when practical.

## 16. Presentation Summary

Short version:

> PhanMeeEin uses Laravel as the trusted coordinator. Laravel authenticates users, validates requests, enforces roles, stores permanent records in Aiven MySQL, stores uploaded file bytes in Cloudflare R2, and calls Gemini through a server-side HTTPS JSON integration. Each external service has a clear boundary, and the application documents the limits of a zero-budget production-oriented student deployment.

One-slide diagram:

```text
Browser
  |
  | HTTPS, session, CSRF
  v
Laravel on Render
  |-- MySQL protocol --> Aiven MySQL
  |-- S3 HTTPS API ----> Cloudflare R2
  |-- HTTPS JSON ------> Gemini API
  |
  v
GitHub Actions validates code before deploy
```
