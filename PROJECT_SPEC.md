# PROJECT_SPEC.md

## 1. Project identity

**Project name:** PhanMeeEin
**Project type:** Collaborative student diploma project
**Primary framework:** Laravel 12
**Primary runtime:** PHP 8.4
**Primary database:** Managed MySQL
**Deployment approach:** Docker containers deployed through Render
**Object storage:** Cloudflare R2 or a comparable zero-cost S3-compatible service
**Development priority:** Learning, documentation, security, maintainability, and zero-budget deployment

---

## 2. Project objective

The objective is to deliver a functional student application using a zero-budget or near-zero-budget managed-service architecture while applying as many real production practices as reasonably possible.

The project should demonstrate:

* Collaborative Git development
* Laravel application development
* Managed database integration
* Secure secrets handling
* Docker containerization
* Managed cloud deployment
* Persistent object storage
* Service separation
* AI integration
* Temporary conversational memory
* Automated testing
* CI/CD
* Architectural documentation
* Honest evaluation of free-tier limitations

The system is described as production-oriented rather than enterprise production-grade.

---

## 3. Development philosophy

The project must evolve incrementally.

Existing working code should be preserved unless a change is required for:

* Correctness
* Security
* Serious performance degradation
* Deployment compatibility
* Maintainability risk
* Agreed architecture

The team must be able to explain every major implementation during the diploma assessment.

Unnecessary complexity is considered a project risk.

---

## 4. Repository and workspace structure

The system will use two separate Git repositories in one local workspace.

Recommended local structure:

```text
workspace/
├── PhanMeeEin/
│   ├── AGENTS.md
│   ├── PROJECT_SPEC.md
│   ├── myjournal.md
│   ├── Dockerfile
│   └── main Laravel application
│
└── Laravel_ai_chatbot/
    ├── Dockerfile
    └── standalone Laravel AI application
```

The standalone AI repository will later be obtained from:

```text
zor-neo/Laravel_ai_chatbot
```

The repositories must initially remain independent.

Do not copy the AI application wholesale into the main application.

Do not combine their Git histories.

Do not create a monolithic Laravel installation merely to simplify local development.

Keeping them as sibling repositories provides:

* Independent deployment
* Independent testing
* Clear responsibility boundaries
* Smaller change sets
* Easier replacement of the AI provider or service
* A stronger microservice demonstration

The repositories may be opened together in one IDE workspace.

---

## 5. High-level architecture

```text
User browser
    |
    | HTTPS
    v
Main Laravel application
    |
    | Authenticates user
    | Authorizes conversation
    | Stores chat history
    | Builds bounded context
    | Signs service request
    v
Standalone Laravel AI service
    |
    | Calls Gemini or another AI provider
    | Generates response
    v
Main Laravel application
    |
    | Stores assistant response
    v
User chat pane
```

Supporting services:

```text
Main application ── TLS ──> Managed MySQL
Main application ── HTTPS/S3 API ──> Cloudflare R2
Main application ── HTTPS/HMAC ──> AI service
```

---

## 6. Main Laravel application

The main application is the primary user-facing system.

It owns:

* User registration and authentication
* User roles and authorization
* Core domain models
* Core business workflows
* Main frontend
* Floating AI button
* Expanding and collapsible AI chat pane
* Conversation ownership
* Temporary AI memory
* File-upload authorization
* File metadata
* Request forwarding to the AI service
* Public domain or Render hostname

The floating chat interface is visually part of the main application even though AI response processing is performed by the standalone AI service.

The main application must not expose service credentials to browser JavaScript.

---

## 7. Standalone AI application

The AI application is an independently deployable Laravel service.

It owns:

* Gemini or alternative provider communication
* AI prompt preparation specific to the provider
* Provider-key rotation or selection
* AI API error handling
* Response normalization
* Optional AI usage measurements
* Minimal standalone chat interface for testing and demonstration

The minimal frontend may contain:

* Floating chat button
* Expandable chat pane
* Message input
* Loading state
* Error state

In the complete system, the normal user should use the chat pane embedded in the main application.

The standalone AI frontend is primarily for:

* Independent development
* Component testing
* Demonstration
* Troubleshooting

The AI service should not require access to the main application’s user table.

The AI service should not accept or trust the main application’s browser session cookie.

---

## 8. AI service communication

Normal browser traffic should follow:

```text
Browser → Main application → AI service
```

Avoid the normal production flow:

```text
Browser → AI service directly
```

The main application must:

1. Authenticate the user.
2. Validate the message.
3. Confirm conversation ownership.
4. Apply rate limits.
5. Store the user message.
6. Build the permitted context.
7. Sign the AI request.
8. Send it over HTTPS.
9. Validate the AI response.
10. Store the assistant response.
11. Return the result to the browser.

Service requests should contain:

* Timestamp
* Unique nonce or request identifier
* HMAC signature
* Bounded message context
* No unnecessary private user fields

The shared service secret must remain server-side.

---

## 9. AI conversation memory

### MVP decision

The MVP uses temporary, session-based conversation memory.

This is a logical AI conversation session, not merely Laravel’s HTTP login-session payload.

Authoritative memory is stored in the main application’s managed MySQL database.

Suggested tables:

```text
ai_conversations
ai_messages
```

Suggested conversation fields:

```text
id
user_id
guest_token_hash
title
summary
status
last_activity_at
expires_at
created_at
updated_at
```

Suggested message fields:

```text
id
conversation_id
role
content
model
input_tokens
output_tokens
created_at
updated_at
```

The AI service remains stateless for the MVP.

### Context policy

Do not send unlimited conversation history to the provider.

Send a bounded context such as:

```text
System instruction
+ optional summary
+ latest 10–20 relevant messages
+ current user message
```

The stored conversation may contain more messages than the context sent to the provider.

### Retention policy

Initial recommended retention:

```text
Authenticated user conversation: up to 7 days
Guest conversation: up to 24 hours
Maximum retained messages per temporary conversation: 50–100
Context window sent to AI: latest 10–20 messages
```

The exact limits may be changed after testing and must be recorded in `myjournal.md`.

### Future long-term memory

Long-term memory is not part of the MVP.

Future long-term memory must be implemented separately from chat history and should include:

* User consent
* Viewable memories
* User deletion controls
* Source conversation reference
* Retention policy
* Sensitive-data protection
* Optional vector or embedding retrieval

Temporary history must not silently become permanent user profiling.

---

## 10. Database architecture

### Initial database

The existing managed Aiven MySQL database may be used for the MVP.

The main application may store:

* Core business data
* Users
* AI conversations
* AI messages
* File metadata
* Application sessions if required
* Queue jobs if required

The AI service should have no database for the MVP unless a confirmed requirement exists.

If it requires a database later, it should use:

* Its own schema or database
* Its own least-privilege user
* No unrestricted access to main-application tables

### Region decision

The application services are intended to run in Singapore.

The current Aiven database may be located in India.

This is accepted initially as a zero-cost constraint.

The team must measure:

* Database round-trip time
* Login response time
* Dashboard response time
* Conversation loading time
* Message-saving time
* Total chat request duration
* Query count per request

Migration to an Amazon RDS MySQL instance in Singapore may be considered when:

* Cross-region latency is visibly harmful
* Query optimization has already been attempted
* The available AWS free allowance is confirmed
* The team understands the future cost risk
* Migration and rollback are documented

The database must not be migrated solely because a closer region appears theoretically better.

---

## 11. Session, cache, and queue decisions

Current Laravel drivers may use database storage for:

* Cache
* Queue
* Session

These settings must be reviewed before deployment.

### HTTP session

The HTTP session stores login and temporary web state.

It should not contain the full AI transcript.

Permitted AI-related session value:

```text
active_ai_conversation_id
```

### Cache

Database cache is acceptable for the MVP but adds database traffic.

Caching should be introduced only where behavior and invalidation are understood.

### Queue

Database queues are acceptable for local development and some MVP workflows.

A free Render deployment may not provide a continuously available background worker.

Critical user-facing tasks must not depend on an unavailable worker.

Queue architecture must be reassessed before production claims are made.

---

## 12. File storage

The Render container filesystem must not be treated as persistent storage.

Cloudflare R2 or another S3-compatible managed object store will hold persistent uploads.

MySQL stores:

* Object key
* User or owner identifier
* Original display name
* MIME type
* Size
* Access classification
* Creation time

R2 stores:

* File binary

Private files should use:

* Private bucket access
* Server-side authorization
* Temporary signed URLs or Laravel streaming responses
* Bucket-scoped credentials
* Randomized object keys

Original filenames should not be used as trusted storage paths.

---

## 13. Container architecture

Each repository will contain its own Dockerfile.

Render will build each service from its repository Dockerfile.

Expected repositories:

```text
PhanMeeEin repository
└── Dockerfile for main application

Laravel_ai_chatbot repository
└── Dockerfile for AI service
```

The Dockerfiles should:

* Install production Composer dependencies
* Build frontend assets
* Install required PHP extensions
* Serve only Laravel’s `public` directory
* Listen on the Render-provided port
* Bind to `0.0.0.0`
* Write logs to standard output and standard error
* Create writable Laravel runtime directories
* Avoid copying `.env`
* Avoid embedding secrets
* Avoid persistent local uploads

Local Docker testing should occur before the first Render deployment.

---

## 14. Deployment architecture

Two Render web services will be created:

```text
Main Laravel web service
Standalone AI web service
```

Both should use the Singapore region when available.

Each service will connect to its corresponding GitHub repository.

Render-managed runtime configuration will provide:

* `APP_KEY`
* Database credentials
* AI service URL
* AI shared secret
* Gemini keys
* R2 credentials
* Production URLs
* Logging configuration

Secret values must not be committed to GitHub.

Database migrations are controlled release tasks and should not automatically run on every container startup.

---

## 15. DNS decision

### MVP

The project will initially use Render-provisioned hostnames.

Reasons:

* No domain-purchase cost
* No manual DNS configuration
* No domain renewal
* Suitable for student assessment
* Faster initial deployment
* Managed HTTPS

### Future custom domain

A future custom domain should be attached only to the main application.

The AI service may continue using its Render-provisioned hostname because it is primarily a backend service.

Benefits of this decision:

* One branded public URL
* One public DNS configuration
* Lower operational overhead
* AI service can move without changing the public user address
* Internal AI URL remains an environment variable

A custom domain is primarily a branding and portability improvement rather than an MVP requirement.

---

## 16. CI/CD architecture

Each repository should have its own pipeline.

Suggested flow:

```text
Feature branch
→ Pull request
→ GitHub Actions tests
→ Docker build validation
→ Merge to main
→ Render deployment
→ Health check
→ Public release
```

The main app and AI service deploy independently.

Examples:

```text
Chat widget UI change
→ main application deployment

AI prompt or provider change
→ AI service deployment
```

GitHub Actions should eventually verify:

* Composer installation
* Frontend installation
* Frontend build
* Laravel tests
* Migration compatibility
* Route caching
* Docker image build

Render should deploy after successful CI checks when that option is configured.

The pipeline demonstrates automated release, not instantaneous source-code editing.

---

## 17. Security architecture

Required controls include:

* Secrets outside Git
* TLS database connections
* Least-privilege database users
* Private object storage
* Authorization for every conversation
* Authorization for every private file
* Input validation
* Request rate limiting
* HMAC-signed service requests
* Replay protection using timestamps and nonces
* Production debug disabled
* Generic production error responses
* No provider keys in the browser
* No direct trust of browser-supplied ownership values
* Dependency review
* Secret rotation after accidental exposure

Security provided by managed services does not remove application-level security responsibilities.

---

## 18. Cost strategy

The target is zero direct infrastructure cost during development and assessment.

The project uses free or included allowances where possible.

The team must document limitations such as:

* Service sleeping or cold starts
* Shared compute allowances
* Limited database storage
* Lack of production SLA
* Possible cross-region latency
* Limited background processing
* Future expiry of promotional cloud allowances
* Domain cost if a custom domain is introduced

The project must not claim guaranteed enterprise availability.

The intended claim is:

> A zero-budget student deployment designed with production-oriented security, service separation, managed infrastructure, Docker, and CI/CD practices where the selected free services permit them.

---

## 19. Documentation architecture

The repository documentation has separate purposes.

### `README.md`

For:

* Project overview
* Installation
* Local setup
* Normal usage
* Common commands

### `AGENTS.md`

For:

* Contributor behavior
* Coding-agent instructions
* Change-control expectations
* Testing requirements
* Preservation rules

### `PROJECT_SPEC.md`

For:

* Approved architecture
* Service responsibilities
* Technical decisions
* Security decisions
* Deployment strategy
* Known constraints

### `myjournal.md`

For:

* Chronological development evidence
* Commands
* Decisions
* Errors
* Test results
* Lessons
* Book material
* Presentation material

---

## 20. Initial implementation phases

### Phase 1 — Baseline recovery

* Confirm Laravel version
* Repair stale local paths
* Confirm writable storage
* Confirm `.env`
* Confirm database connection
* Run current tests
* Document current application behavior

### Phase 2 — Repository discipline

* Add `AGENTS.md`
* Add `PROJECT_SPEC.md`
* Add `myjournal.md`
* Review `.gitignore`
* Create baseline commit
* Establish branch workflow

### Phase 3 — AI memory foundation

* Create conversation migration
* Create message migration
* Add models and relationships
* Add authorization policy
* Add validation
* Add feature tests
* Add expiry behavior

### Phase 4 — Main chat interface

* Add floating button
* Add collapsible pane
* Add loading state
* Add error state
* Add responsive behavior
* Connect to main application endpoint

### Phase 5 — AI service workspace

* Clone the standalone repository
* Inspect its architecture
* Record its current behavior
* Verify Laravel and PHP compatibility
* Run its tests
* Review provider-key handling
* Avoid premature code merging

### Phase 6 — Service integration

* Define request contract
* Add HMAC signing
* Add timestamp validation
* Add nonce protection
* Connect main application to AI service
* Test invalid and unauthorized requests

### Phase 7 — Object storage

* Configure private R2 bucket
* Add S3-compatible filesystem driver
* Add scoped credentials
* Test upload
* Test temporary download
* Record cost and security decisions

### Phase 8 — Containerization

* Add Dockerfile to each repository
* Add `.dockerignore`
* Test local Docker builds
* Confirm health endpoints
* Use `/up` for lightweight platform uptime checks
* Use `/health` for operator checks of database, cache, and upload-storage configuration
* Confirm production caching
* Confirm no secrets are copied

### Phase 9 — Render deployment

* Deploy AI service
* Deploy main application
* Configure secrets
* Configure database TLS
* Configure health checks
* Keep storage write health checks disabled for normal probes unless actively validating R2
* Maintain a production operations and recovery checklist
* Validate public behavior
* Measure cold start and database latency

### Phase 10 — CI/CD

* Add GitHub Actions
* Add automated tests
* Add Docker build validation
* Configure Render auto-deployment
* Demonstrate visible production change
* Record failed-CI evidence

---

## 21. Change approval rule

An architectural decision is approved when:

1. It is discussed by the team.
2. Its purpose is understood.
3. Alternatives are recorded.
4. Security, performance, cost, and learning impact are considered.
5. `PROJECT_SPEC.md` is updated.
6. The implementation is recorded in `myjournal.md`.
7. Relevant tests pass.

This document must evolve with the project, but changes must be deliberate and documented.
