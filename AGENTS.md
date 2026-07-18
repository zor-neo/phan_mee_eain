# AGENTS.md

## Purpose

This repository is a collaborative student software project developed for learning, assessment, demonstration, and diploma documentation.

All contributors and coding assistants must work carefully, incrementally, and transparently.

The project is not a greenfield commercial rewrite. Existing code represents work completed by students and must be treated with respect.

The primary rule is:

> Preserve existing working code whenever reasonably possible. Improve the project through small, justified, testable changes rather than unnecessary rewriting.

Before making changes, read:

* `PROJECT_SPEC.md`
* `myjournal.md`
* `README.md`
* Relevant migrations, routes, models, controllers, services, tests, and configuration files

---

## Core Working Principles

### 1. Preserve existing code

Do not rewrite, rename, reorganize, or replace existing code merely because another implementation appears cleaner.

Prefer:

* Small patches
* Localized refactoring
* Backward-compatible changes
* Reuse of existing models, controllers, views, services, and conventions
* Incremental improvements with clear explanations

Avoid:

* Full-file rewrites without necessity
* Replacing working features with new libraries
* Renaming large numbers of files or classes
* Changing architecture only for stylistic preference
* Introducing patterns that the student team cannot explain
* Deleting code before confirming that it is unused

Existing code may be substantially changed only when at least one of the following applies:

1. It causes a fatal error or prevents the application from running.
2. It creates a confirmed security vulnerability.
3. It causes measurable performance degradation.
4. It violates an important framework practice that creates real maintenance or reliability risk.
5. It blocks the agreed project architecture.
6. It is demonstrably incorrect and cannot be safely repaired with a smaller change.

Every substantial change must be documented in `myjournal.md`.

---

## 2. Learning-first development

This is a student project. Every implementation must remain understandable to the student team.

When proposing or implementing a change:

1. Explain the problem in simple terms.
2. Show the relevant existing behavior.
3. Explain the selected solution.
4. Explain at least one reasonable alternative.
5. State why the selected solution fits this project.
6. Apply the smallest safe change.
7. Run appropriate tests.
8. Record the work in `myjournal.md`.

Do not silently introduce advanced abstractions, infrastructure, packages, or patterns.

When advanced techniques are necessary, explain:

* What they solve
* Why the simpler approach is insufficient
* How the implementation works
* How students can test it
* How it can be reverted

---

## 3. Step-by-step execution

Do not attempt multiple unrelated architectural changes in one task.

Use this sequence:

1. Inspect
2. Understand
3. Propose
4. Record the intended change
5. Implement
6. Test
7. Review
8. Update documentation
9. Commit

Each step should leave the repository in a usable state.

Do not proceed to a later architectural stage while the current stage is broken.

Examples of separate stages include:

* Repairing local storage paths
* Confirming database connectivity
* Adding AI conversation tables
* Integrating the chat widget
* Connecting the standalone AI service
* Containerizing the main application
* Deploying the main application
* Configuring object storage
* Adding CI
* Enabling continuous deployment

---

## 4. Mandatory journal logging

All meaningful work must be recorded in `myjournal.md`.

The journal is not optional supplementary documentation. It is part of the project workflow.

Record:

* What was attempted
* Why it was needed
* Existing behavior
* Commands executed
* Files changed
* Architectural decisions
* Alternatives considered
* Test results
* Errors encountered
* Security impact
* Performance impact
* Cost impact
* Deployment impact
* Lessons learned
* Remaining work
* Material suitable for the project book
* Material suitable for presentation slides

Do not record secrets, passwords, API keys, certificates, access tokens, or complete production connection strings.

Small formatting changes may be grouped into one journal entry. Functional, security, database, dependency, deployment, and architectural changes require their own clear entries.

---

## 5. Architectural authority

`PROJECT_SPEC.md` contains the approved architecture.

Do not make changes that contradict it without:

1. Identifying the conflict
2. Explaining the reason for the proposed deviation
3. Recording the decision in `myjournal.md`
4. Updating `PROJECT_SPEC.md`
5. Obtaining agreement from the student team

Temporary experiments must be clearly marked and must not silently become permanent architecture.

---

## 6. Main application responsibilities

The main Laravel application owns:

* User accounts
* Authentication
* Authorization
* Core business logic
* User-facing pages
* The floating AI chat button
* The expanding and collapsible chat pane
* Conversation ownership
* Temporary AI conversation memory
* File metadata
* Calls to the standalone AI service

The main application is the security boundary between users and the AI service.

The browser should normally communicate with the main Laravel application rather than calling the AI service directly.

---

## 7. Standalone AI service responsibilities

The standalone AI application will later be obtained from:

```text
zor-neo/Laravel_ai_chatbot
```

It must initially remain a separate repository and separate deployable service.

The AI service owns:

* AI-provider communication
* Prompt processing
* AI response generation
* Provider-key selection or rotation
* AI-specific error handling
* Optional AI usage metrics
* Its minimal standalone test interface

The AI service should not own:

* Main-application user authentication
* Main-application authorization
* Permanent user profiles
* The authoritative chat transcript
* Main business data
* Browser session cookies from the main application

The AI service should remain stateless for the MVP wherever possible.

---

## 8. AI memory policy

For the MVP, AI memory is temporary conversation memory.

The authoritative chat history must be stored by the main Laravel application in MySQL using dedicated tables such as:

* `ai_conversations`
* `ai_messages`

Do not store authoritative AI memory in:

* Render container storage
* Browser local storage
* Cloudflare R2
* Laravel’s serialized HTTP session value
* The standalone AI service filesystem

The browser may store only non-authoritative UI state, such as:

* Whether the chat pane is open
* Current conversation identifier
* Unsent draft text
* Unread state

The main application retrieves a limited recent context window and sends it to the AI service.

Long-term AI memory is a future feature and must be designed separately with:

* Explicit user control
* View and delete functionality
* Retention rules
* Sensitive-data handling
* Clear separation from temporary chat history

---

## 9. Database rules

The project uses managed MySQL.

Database changes must use Laravel migrations.

Never manually alter production tables without also creating the corresponding migration.

Before running a migration:

1. Review the active database connection.
2. Run `php artisan migrate:status`.
3. Review the migration.
4. Use `php artisan migrate --pretend` where appropriate.
5. Confirm that destructive operations are intentional.
6. Record the operation in `myjournal.md`.

Never run these commands against production unless explicitly authorized:

```bash
php artisan migrate:fresh
php artisan migrate:refresh
php artisan db:wipe
```

Application runtime accounts must follow least privilege.

Administrative database credentials must not be placed in source control or normal runtime configuration.

---

## 10. Security requirements

Never commit:

* `.env`
* Production `APP_KEY`
* Database passwords
* API keys
* Gemini keys
* Cloudflare R2 secrets
* HMAC shared secrets
* TLS private keys
* CA files unless they are explicitly public certificates approved for source control
* Personal access tokens
* Session cookies
* Production database exports

All user input must be validated.

All access to conversations, messages, uploads, and private records must be authorized.

Do not trust a `user_id`, `conversation_id`, role, filename, or ownership value supplied by the browser without server-side verification.

Production must use:

```dotenv
APP_ENV=production
APP_DEBUG=false
```

Error responses must not reveal:

* Stack traces
* Environment variables
* Database queries containing private data
* Provider secrets
* Internal prompts
* Filesystem paths

Service-to-service requests should use HTTPS and authenticated request signing.

---

## 11. Performance rules

Do not optimize based only on assumption.

Before a substantial optimization:

1. Identify the slow operation.
2. Measure it where possible.
3. Record the result.
4. Apply a targeted change.
5. Measure again.

Prioritize:

* Removing N+1 database queries
* Eager loading required relationships
* Pagination
* Appropriate indexes
* Bounded AI context windows
* Avoiding repeated database queries inside loops
* Avoiding unnecessarily large API payloads
* Avoiding unnecessary frontend dependencies

Do not add caching unless:

* The data is suitable for caching
* Invalidation is understood
* The team can explain the behavior
* The cache does not introduce correctness or security problems

---

## 12. Dependency upgrades

Do not upgrade Laravel, PHP, Composer packages, Node packages, Docker base images, or major frontend libraries without a reason.

Acceptable reasons include:

* Security fix
* Fatal incompatibility
* Unsupported dependency
* Confirmed bug
* Required deployment compatibility
* Significant and measured performance issue

Before upgrading:

1. Check the current version.
2. Read the relevant release or migration notes.
3. Identify possible breaking changes.
4. Create a focused branch.
5. Run tests before the upgrade.
6. Apply the smallest suitable upgrade.
7. Run tests after the upgrade.
8. Record the result in `myjournal.md`.

Do not combine a major dependency upgrade with unrelated feature work.

---

## 13. Testing requirements

Before declaring work complete, run the relevant checks.

Typical Laravel checks include:

```bash
php artisan optimize:clear
php artisan migrate:status
php artisan route:list
php artisan test
```

For deployment-related changes, also run:

```bash
php artisan route:cache
php artisan config:cache
docker build -t phanmeeein:test .
```

Clear local caches afterward when required:

```bash
php artisan optimize:clear
```

When frontend files change, run the appropriate commands:

```bash
npm ci
npm run build
```

A change is not complete merely because the page loads once.

Test:

* Expected behavior
* Invalid input
* Unauthorized access
* Empty states
* Error states
* Relevant mobile or responsive behavior
* Existing features affected by the change

---

## 14. Git collaboration workflow

Use focused branches.

Suggested branch names:

```text
feature/ai-conversation-memory
feature/chat-widget
fix/storage-path
fix/database-connection
security/ai-request-signing
deployment/render-docker
docs/project-journal
```

Before editing:

```bash
git status
git pull --ff-only
git checkout -b feature/descriptive-name
```

Commits should be small and meaningful.

Examples:

```text
fix: repair Laravel storage path handling
feat: add AI conversation persistence
test: cover conversation ownership rules
docs: record Render deployment decision
security: sign requests to AI service
```

Do not mix unrelated changes in one commit.

Do not force-push shared branches without team agreement.

Do not commit generated secrets, local caches, logs, database dumps, or vendor directories unless the project has explicitly chosen otherwise.

---

## 15. AI-generated code policy

AI-generated code must be treated as an unreviewed contribution.

Before accepting it:

1. Read every changed line.
2. Confirm it matches the current Laravel version.
3. Confirm it follows the approved architecture.
4. Check authorization and validation.
5. Check error handling.
6. Run tests.
7. Record significant use in `myjournal.md`.
8. Ensure a student can explain the implementation.

Do not accept generated code solely because it appears professional.

Never allow an agent to:

* Delete large sections without review
* Change production credentials
* Run destructive database commands
* Push directly to production without approval
* Replace the architecture without documentation
* Hide errors by disabling validation or security controls

---

## 16. Documentation standard

When behavior, architecture, setup, security, or deployment changes, update the relevant documentation.

Documentation should explain:

* What the system does
* How to set it up
* Why the design was selected
* Known limitations
* How to test it
* How to recover from common failures

Use clear student-friendly language.

Do not claim that a free-tier deployment has full enterprise availability.

Use accurate descriptions such as:

* Production-oriented
* Near-production-grade where practical
* Managed-service-based
* Zero-budget student deployment
* Subject to documented free-tier constraints

---

## 17. Completion definition

A task is complete only when:

* The requested behavior works
* Existing behavior has been checked
* Relevant tests pass
* No secret was introduced
* The architecture remains consistent
* Documentation has been updated
* `myjournal.md` has been updated
* Remaining limitations are stated
* The student team can explain the change
