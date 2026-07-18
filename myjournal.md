# myjournal.md

## Purpose

This journal is the chronological engineering record for the PhanMeeEin student project.

It records the development process, not only the final result.

The journal will later provide evidence and source material for:

* Diploma project book
* Architecture section
* Implementation section
* Security section
* Testing section
* Deployment section
* Evaluation section
* Presentation slides
* Presentation speaker notes
* Live demonstration preparation

Do not record secrets.

Never paste:

* Passwords
* API keys
* Access tokens
* Private certificates
* Complete connection strings
* Session cookies
* Production user data

Use placeholders such as:

```text
[REDACTED]
AIVEN_HOST
R2_ACCESS_KEY
AI_SHARED_SECRET
```

---

# Journal index

| Entry | Date       | Topic                      | Branch/Commit | Status    |
| ----: | ---------- | -------------------------- | ------------- | --------- |
|   001 | YYYY-MM-DD | Initial project inspection | `branch-name` | Planned   |
|   002 | 2026-07-18 | Repository review lesson log | `not a git repository` | Completed |
|   003 | 2026-07-18 | Fix phone number migration | `not a git repository` | Completed |
|   004 | 2026-07-18 | Fix duplicate reports condition migration | `not a git repository` | Completed |
|   005 | 2026-07-18 | Align auth tests and redirects | `not a git repository` | Completed |
|   006 | 2026-07-18 | Fix user middleware role check | `not a git repository` | Completed |
|   007 | 2026-07-18 | Harden user middleware tests | `not a git repository` | Completed |
|   008 | 2026-07-18 | Fix browser-supplied ownership values | `not a git repository` | Completed |

Update this table whenever a new substantial entry is added.

---

# Entry template

Copy the complete template below for every meaningful task.

---

## Entry XXX — Clear descriptive title

### Date and time

```text
YYYY-MM-DD HH:MM
Timezone:
```

### Contributor

```text
Name:
Role:
```

### Branch and commit

```text
Branch:
Starting commit:
Ending commit:
Pull request:
```

Use `not committed yet` when appropriate.

### Objective

Describe the specific goal of this work.

Example:

```text
Repair Laravel runtime paths after moving the project from another Windows user directory.
```

### Why this work was required

Explain the problem, requirement, risk, or learning objective.

### Starting state

Describe what existed before any changes.

Include:

* Current behavior
* Relevant framework version
* Relevant configuration
* Existing error
* Existing tests
* Existing limitations

### Evidence before change

Include safe output, screenshots, measurements, or error messages.

Do not include secrets.

Example:

```text
php artisan about showed an old absolute storage path belonging to another Windows account.
```

### Investigation

Record what was inspected.

Examples:

```text
bootstrap/cache
config/filesystems.php
config/logging.php
.env
storage directory permissions
```

### Commands executed

```powershell
# Place commands here in execution order.
```

For each important command, note:

* Why it was run
* Expected result
* Actual result

### Files inspected

```text
path/to/file
path/to/another/file
```

### Files changed

| File           | Change            | Reason     |
| -------------- | ----------------- | ---------- |
| `path/to/file` | Short description | Why needed |

### Existing code preserved

State which existing components were intentionally left unchanged.

Example:

```text
The existing authentication controllers and routes were not modified because they were unrelated to the storage-path problem.
```

### Decision made

Write the final technical decision clearly.

Example:

```text
Laravel path helper functions will be used instead of hard-coded Windows absolute paths.
```

### Alternatives considered

#### Alternative A

Description:

Advantages:

Disadvantages:

Reason not selected:

#### Alternative B

Description:

Advantages:

Disadvantages:

Reason not selected:

### Architectural impact

Choose and explain:

```text
None
Minor
Moderate
Major
```

State whether `PROJECT_SPEC.md` was updated.

### Security impact

Describe:

* New security controls
* Removed security controls
* Secrets handling
* Authorization impact
* Validation impact
* New attack surface
* Remaining risks

Use `No material security impact` when accurate.

### Performance impact

Record:

* Expected change
* Actual measurement
* Query count
* Response time
* Memory use
* Build time
* Remaining concerns

Use `Not measured` rather than inventing a result.

### Cost impact

Record:

```text
No direct cost
Possible future cost
Confirmed monthly cost
Free-tier allowance affected
```

Explain the reason.

### Learning outcome

Explain what the student team learned.

Examples:

* Laravel configuration caching
* Managed database TLS
* Docker image layers
* Service-to-service authentication
* Database indexing
* CI/CD gating

### Implementation summary

Describe the implementation step by step.

### Tests performed

| Test         | Expected          | Actual            | Result    |
| ------------ | ----------------- | ----------------- | --------- |
| Example test | Expected behavior | Observed behavior | Pass/Fail |

### Commands used for testing

```powershell
php artisan optimize:clear
php artisan test
```

### Test failures and resolution

Document failures honestly.

For each failure include:

* Error
* Cause
* Fix
* Retest result

### Manual verification

Describe browser or application checks.

Examples:

* Opened login page
* Created test conversation
* Sent two related chat messages
* Refreshed page
* Confirmed session memory
* Confirmed another user could not access the conversation

### Result

Choose one:

```text
Completed
Partially completed
Blocked
Reverted
```

Explain the current state.

### Rollback procedure

State how to safely undo the change.

Examples:

```text
Revert commit abc1234.
Run php artisan migrate:rollback --step=1 on the development database.
Restore the previous Render environment value.
```

Do not describe a rollback that has not been checked unless marked as untested.

### Remaining issues

List unresolved items.

Use:

```text
None currently known
```

only when justified.

### Next recommended step

State one focused next step.

### Project-book material

Write a compact paragraph suitable for later adaptation into the project book.

```text
During this stage, ...
```

### Presentation-slide material

Write 2–5 concise points.

```text
- Problem:
- Decision:
- Implementation:
- Benefit:
- Limitation:
```

### Speaker-note material

Write a short explanation suitable for oral presentation.

### Diagram or screenshot required

```text
Yes/No
Suggested evidence:
```

### References

List relevant internal files:

```text
PROJECT_SPEC.md
AGENTS.md
README.md
app/...
```

External sources may be listed by title without copying large passages.

### Final reflection

Answer:

1. What worked?
2. What was difficult?
3. What would be improved in a paid production environment?
4. Can every team member explain this change?
5. Did this change preserve existing code where possible?

---

## Entry 008 - Fix browser-supplied ownership values

### Date and time

```text
2026-07-18 12:11 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not a git repository
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Make comment, report, saved-content, reaction, and promotion handlers trust the authenticated user instead of browser-supplied ownership IDs.

### Why this work was required

The review showed that a user could tamper with request IDs and make the server act as if a different account owned the action.
That is a trust-boundary issue and can lead to unauthorized writes.

### Starting state

The affected controllers accepted user IDs from the request or route parameters.
Some actions also assumed redirect helpers would always resolve named routes in the test runtime.

### Evidence before change

```text
Ownership tests were missing, and the controllers still accepted browser-supplied ownership values.
```

### Investigation

Reviewed:

```text
app/Http/Controllers/CommentController.php
app/Http/Controllers/ReactController.php
app/Http/Controllers/ReportController.php
app/Http/Controllers/SavedController.php
app/Http/Controllers/UserProfileController.php
app/Http/Controllers/Auther/AutherProfileController.php
tests/Feature/OwnershipSecurityTest.php
routes/user.php
```

### Commands executed

```powershell
php artisan test --filter=OwnershipSecurityTest
php artisan test
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `app/Http/Controllers/CommentController.php` | Force `user_id` from `Auth::id()` | Prevent spoofed comment ownership |
| `app/Http/Controllers/ReportController.php` | Force `user_id` from `Auth::id()` | Prevent spoofed report ownership |
| `app/Http/Controllers/ReactController.php` | Force `user_id` from `Auth::id()` | Prevent spoofed reaction ownership |
| `app/Http/Controllers/SavedController.php` | Force `user_id` from `Auth::id()` | Prevent spoofed saved-content ownership |
| `app/Http/Controllers/UserProfileController.php` | Force promote requests to use the authenticated user and return a literal redirect path | Prevent spoofed promotion ownership and avoid a named-route lookup issue in tests |
| `app/Http/Controllers/Auther/AutherProfileController.php` | Force created and edited content to use the authenticated user | Keep author-owned content server-controlled |
| `tests/Feature/OwnershipSecurityTest.php` | Added direct ownership checks | Prove the server ignores spoofed IDs |
| `myjournal.md` | Added this entry | Keep the project record complete |

### Existing code preserved

The existing content, report, comment, and profile workflows were kept.
Only the ownership source was tightened.

### Decision made

Use the authenticated session as the only source of truth for ownership on these write paths.

### Alternatives considered

#### Alternative A

Description:
Keep accepting browser-supplied IDs and compare them after the fact.

Advantages:
Small code change.

Disadvantages:
Still trusts untrusted input too early.

Reason not selected:
The server should derive ownership directly.

#### Alternative B

Description:
Add request validation rules around the incoming IDs.

Advantages:
Some extra input checking.

Disadvantages:
Validation alone does not guarantee correct ownership.

Reason not selected:
Ownership should come from the authenticated user, not the request.

### Architectural impact

```text
Minor
```

```text
No
```

### Security impact

Improves authorization safety by removing browser control over ownership IDs.
The change reduces the risk of acting on another user's records.

### Performance impact

```text
No runtime performance impact
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team learned that authorization must come from the session context, not from IDs sent by the browser.
The test suite also showed that direct controller checks may need plain status assertions instead of route-test helpers.

### Implementation summary

Updated the affected controllers so they ignore spoofed IDs and use `Auth::id()` instead.
Added a focused ownership test file that exercises each write path.
Adjusted the promotion redirect so the test run does not depend on a missing named route.
Re-ran the test suite and confirmed the full suite passed.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| `php artisan test --filter=OwnershipSecurityTest` | Ownership checks should pass | 5 ownership tests passed | Pass |
| `php artisan test` | Existing suite should remain green | 34 tests passed | Pass |

### Commands used for testing

```powershell
php artisan test --filter=OwnershipSecurityTest
php artisan test
```

### Test failures and resolution

The first test version used `assertOk()` on direct `JsonResponse` objects, which is not available there.
It also hit a named-route redirect during promotion.
Switching to plain status checks and a literal redirect fixed both issues.

### Manual verification

Confirmed that the controllers now read the authenticated user from the session and ignore spoofed user IDs in the request.

### Result

```text
Completed
```

### Rollback procedure

Restore the previous ownership assignment logic in the affected controllers and remove the ownership test file if the change must be undone.

### Remaining issues

None currently known

### Next recommended step

Move to the next open review item about state-changing GET routes.

### Project-book material

This fix shows how a Laravel app should treat ownership as a server-side decision.
By reading the authenticated user from the session instead of trusting request IDs, the application closes a common authorization gap while keeping the change small and understandable.

### Presentation-slide material

```text
- Ownership now comes from the authenticated session
- Spoofed user IDs in requests are ignored
- New tests prove the server-side trust boundary
- Full suite still passes after the change
```

### Speaker-note material

The important lesson here is simple: the browser can suggest data, but it should not decide who owns the action.

### Diagram or screenshot required

```text
No
Suggested evidence: passing ownership test output
```

### References

```text
app/Http/Controllers/CommentController.php
app/Http/Controllers/ReactController.php
app/Http/Controllers/ReportController.php
app/Http/Controllers/SavedController.php
app/Http/Controllers/UserProfileController.php
app/Http/Controllers/Auther/AutherProfileController.php
tests/Feature/OwnershipSecurityTest.php
LESSON_LEARNT.md
```

### Final reflection

1. What worked? The authenticated user became the only ownership source.
2. What was difficult? The test harness needed direct-response assertions instead of route helpers.
3. What would be improved in a paid production environment? A clearer authorization layer and cleaner redirect conventions.
4. Can every team member explain this change? Yes.
5. Did this change preserve existing code where possible? Yes.

---

## Entry 005 - Align auth tests and redirects

### Date and time

```text
2026-07-18 11:22
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not a git repository
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Make the login, registration, and root-path behavior consistent with the custom student app and its tests.

### Why this work was required

After the migration fixes, the suite still failed because auth controllers were redirecting to a named route that the test runtime did not resolve reliably, registration expected an extra checkbox, and the root route no longer matched the test expectation.

### Starting state

Login and registration controllers redirected with `to_route('userHome')`.

The registration test did not send the required `check` field.

The root route redirected to `/guest`, while the example test still expected a 200 response.

### Evidence before change

```text
php artisan test
Route [userHome] not defined.
The user is not authenticated
Expected response status code [200] but received 302.
```

### Investigation

Reviewed:

```text
app/Http/Controllers/Auth/AuthenticatedSessionController.php
app/Http/Controllers/Auth/RegisteredUserController.php
routes/web.php
tests/Feature/Auth/AuthenticationTest.php
tests/Feature/Auth/RegistrationTest.php
tests/Feature/ExampleTest.php
```

### Commands executed

```powershell
php artisan test
php artisan route:list
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `app/Http/Controllers/Auth/AuthenticatedSessionController.php` | Redirected with literal paths | Avoid named-route lookup issues and keep role-based landing pages |
| `app/Http/Controllers/Auth/RegisteredUserController.php` | Redirected with literal path | Match the app's custom landing flow after registration |
| `tests/Feature/Auth/AuthenticationTest.php` | Updated redirect expectation | Match the custom user landing page |
| `tests/Feature/Auth/RegistrationTest.php` | Added required checkbox and redirect expectation | Match controller validation and landing page |
| `tests/Feature/ExampleTest.php` | Asserted redirect to guest | Match the current root route behavior |
| `myjournal.md` | Added this entry | Record the implementation work |

### Existing code preserved

The custom role logic, admin route, and guest route were kept.

### Decision made

Keep the app's custom landing flow, but make it explicit with path redirects and matching tests.

### Alternatives considered

#### Alternative A

Description:
Change the app back to the default Breeze dashboard flow.

Advantages:
Would match the skeleton tests without edits.

Disadvantages:
Would undo the project's custom landing behavior.

Reason not selected:
The existing student app already uses custom routes.

#### Alternative B

Description:
Keep the controller code and only patch the tests.

Advantages:
Less app code change.

Disadvantages:
The login redirect still depended on the named-route lookup.

Reason not selected:
The controller change removed that fragile dependency.

### Architectural impact

```text
Minor
```

### Security impact

No material security impact. The change only affects landing-page redirects and form validation alignment.

### Performance impact

```text
No runtime performance impact
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team saw how a custom Laravel app can drift away from default Breeze test assumptions and how to bring tests and controllers back into agreement.

### Implementation summary

Changed auth controllers to redirect by path.
Added the missing registration checkbox in the test.
Aligned the example test with the guest redirect.
Re-ran the suite and confirmed it passed.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| `php artisan test` | Auth flows and example route should pass | All 25 tests passed | Pass |

### Commands used for testing

```powershell
php artisan test
```

### Test failures and resolution

The named-route redirect and missing checkbox caused the earlier failures.
Switching to literal redirects and updating the tests resolved them.

### Manual verification

Confirmed the login, registration, and root path expectations now match the custom app flow.

### Result

```text
Completed
```

### Rollback procedure

Restore the previous controller redirects and test expectations if the app returns to the default Breeze flow.

### Remaining issues

None from this test run.

### Next recommended step

Keep reviewing the remaining legacy controllers for the authorization and ownership issues documented earlier.

### Project-book material

The app and its tests were brought back into alignment by making the redirect flow explicit instead of relying on a stale default expectation.

### Presentation-slide material

```text
- Auth controllers switched to explicit path redirects
- Registration test now includes required agreement checkbox
- Example test now matches guest redirect
- Full suite passes after alignment
```

### Speaker-note material

This fix was mostly about consistency: the app had custom flows, but the tests were still expecting the stock Laravel behavior.

### Diagram or screenshot required

```text
No
Suggested evidence: passing test output
```

### References

```text
app/Http/Controllers/Auth/AuthenticatedSessionController.php
app/Http/Controllers/Auth/RegisteredUserController.php
tests/Feature/Auth/AuthenticationTest.php
tests/Feature/Auth/RegistrationTest.php
tests/Feature/ExampleTest.php
```

### Final reflection

1. What worked? The custom redirects and tests now agree.
2. What was difficult? The app no longer matched the default Breeze assumptions.
3. What would be improved in a paid production environment? Cleaner route conventions and fewer custom exceptions in auth flow.
4. Can every team member explain this change? Yes.
5. Did this change preserve existing code where possible? Yes.

---

## Entry 004 - Fix duplicate reports condition migration

### Date and time

```text
2026-07-18 11:22
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not a git repository
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Remove the duplicate `reports.condition` column definition so migrations can run cleanly on a fresh database.

### Why this work was required

The test suite was failing during migration because the `reports` table was creating the `condition` column twice: once in the create migration and again in a later add-column migration.

### Starting state

`database/migrations/2026_06_26_145035_create_reports_table.php` already defined `condition`.

`database/migrations/2026_07_06_191447_add_condition_to_reports_table.php` tried to add the same column again.

### Evidence before change

```text
SQLSTATE[HY000]: General error: 1 duplicate column name: condition
```

### Investigation

Reviewed both reports migrations and the code paths that read and write `reports.condition`.

### Commands executed

```powershell
php artisan test
php artisan route:list
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `database/migrations/2026_06_26_145035_create_reports_table.php` | Removed duplicate `condition` column | Let the later migration own the column addition |
| `LESSON_LEARNT.md` | Marked the finding as solved | Keep the learning log current |
| `myjournal.md` | Added this entry | Record the migration fix |

### Existing code preserved

The reports feature, model, and controller behavior were left intact.

### Decision made

Keep one source of truth for the `condition` column by removing it from the create migration.

### Alternatives considered

#### Alternative A

Description:
Make the later migration a no-op.

Advantages:
Also avoids the duplicate error.

Disadvantages:
The migration history would be less clear.

Reason not selected:
The add-column migration already explains the schema change correctly.

#### Alternative B

Description:
Delete the later migration file.

Advantages:
Simplifies the history.

Disadvantages:
Risky if any existing environment still needs the column addition.

Reason not selected:
Preserving the later migration was safer.

### Architectural impact

```text
Minor
```

### Security impact

No direct security impact.

### Performance impact

```text
No runtime performance impact
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team learned that a schema change should live in one place only, especially when maintaining a migration history that must work on fresh databases.

### Implementation summary

Removed the duplicate column from the create migration.
Confirmed the later migration can add the column once.
Re-ran the suite until the migration error disappeared.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| `php artisan test` | Fresh migration path should work | Duplicate-column failure disappeared | Pass |

### Commands used for testing

```powershell
php artisan test
```

### Test failures and resolution

The duplicate `condition` column caused the migration failure.
Removing it from the base table fixed the issue.

### Manual verification

Checked both reports migrations and confirmed only one of them now creates the column.

### Result

```text
Completed
```

### Rollback procedure

Restore the `condition` column in the create migration if the later migration is ever removed for a different schema strategy.

### Remaining issues

None from this migration path.

### Next recommended step

Keep moving through the remaining authorization and ownership findings from the review log.

### Project-book material

The migration history was corrected by keeping the schema change in one migration path instead of duplicating the same column definition twice.

### Presentation-slide material

```text
- Duplicate reports.condition definition removed
- Later migration now owns the column change
- Fresh test database migrates cleanly
- Schema history is easier to explain
```

### Speaker-note material

This was a classic migration cleanup: the problem was not the data, but two migrations trying to claim the same column.

### Diagram or screenshot required

```text
No
Suggested evidence: passing migration-dependent tests
```

### References

```text
database/migrations/2026_06_26_145035_create_reports_table.php
database/migrations/2026_07_06_191447_add_condition_to_reports_table.php
LESSON_LEARNT.md
```

### Final reflection

1. What worked? The duplicate column was removed from the right place.
2. What was difficult? The bug only showed up after the earlier migration issue was fixed.
3. What would be improved in a paid production environment? Stronger migration review before merge.
4. Can every team member explain this change? Yes.
5. Did this change preserve existing code where possible? Yes.

---

## Entry 003 - Fix phone number migration

### Date and time

```text
2026-07-18 11:22
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not a git repository
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Fix the invalid phone number column definition so Laravel migrations and tests can run cleanly.

### Why this work was required

The users migration used `$table->bigInt('phone')`, which is not a valid Laravel schema method.
That blocked migration execution and caused the test suite to fail before the feature tests could meaningfully run.

### Starting state

The users table migration stored phone numbers with an invalid column method.

The edit-profile validation also treated the phone field as a generic required value without clearly modeling it as text.

### Evidence before change

```text
php artisan test
Method Illuminate\Database\Schema\Blueprint::bigInt does not exist.
```

### Investigation

Reviewed:

```text
database/migrations/0001_01_01_000000_create_users_table.php
app/Http/Controllers/UserProfileController.php
phpunit.xml
```

### Commands executed

```powershell
Get-Content database\migrations\0001_01_01_000000_create_users_table.php
Get-Content app\Http\Controllers\UserProfileController.php
Get-Content phpunit.xml
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `database/migrations/0001_01_01_000000_create_users_table.php` | Changed phone column to `string('phone', 30)` | Use a valid schema type and preserve leading zeros |
| `app/Http/Controllers/UserProfileController.php` | Aligned phone validation to `required|string|max:30` | Match the database shape and user input behavior |
| `LESSON_LEARNT.md` | Marked the first review finding as solved | Keep the learning log current |
| `myjournal.md` | Added this implementation entry | Record the fix as project evidence |

### Existing code preserved

User account fields, profile views, and other migration columns were left unchanged.

### Decision made

Store phone numbers as a string instead of a numeric type.

### Alternatives considered

#### Alternative A

Description:
Use `bigInteger` or another numeric column type.

Advantages:
Looks numeric at first glance.

Disadvantages:
Loses leading zeros and can fail for formatted phone numbers.

Reason not selected:
Phone numbers are identifiers, not arithmetic values.

#### Alternative B

Description:
Keep the column as-is and only adjust validation.

Advantages:
Smaller code change.

Disadvantages:
The invalid migration method would still break tests.

Reason not selected:
The migration itself had to be corrected.

### Architectural impact

```text
Minor
```

### Security impact

No direct security impact. The fix mainly improves correctness and avoids trusting phone numbers as numeric data.

### Performance impact

```text
No runtime performance impact
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team learned that phone numbers should usually be stored as text because they are formatted identifiers, not values for calculation.

### Implementation summary

Replaced the invalid phone column definition with a string column.
Updated phone validation so the form and database agree on the field type.
Reflected the fix in the lesson log and journal.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| Code inspection | Invalid schema method removed | Phone field now uses `string('phone', 30)` | Pass |
| Validation inspection | Phone input treated as text | Validation now expects a string | Pass |
| `php artisan test` | The original `bigInt()` failure should disappear | The suite now stops on a separate `reports.condition` duplicate-column migration issue | Partial |

### Commands used for testing

```powershell
php artisan test
```

### Test failures and resolution

The earlier migration failure was caused by the invalid `bigInt()` method.
This fix addresses that cause directly.
The next blocking issue is unrelated to phone numbers and comes from the `reports` migrations.

### Manual verification

Verified the migration column type and the matching controller validation.

### Result

```text
Completed
```

### Rollback procedure

Change the phone column back only if a different field strategy is approved later.
Revert the validation changes in `UserProfileController.php` if needed.

### Remaining issues

Other review findings remain open, especially middleware authorization and request ownership checks.

### Next recommended step

Rerun the test suite and then move on to the middleware bug.

### Project-book material

The project corrected an invalid migration method by treating phone numbers as text, which better matches how real user contact data behaves.

### Presentation-slide material

```text
- Phone column changed from invalid numeric method to string
- Validation updated to match the stored data
- Fix removes the migration blocker in the test suite
- Phone numbers preserved as formatted identifiers
```

### Speaker-note material

This fix shows a simple but important lesson: not every field that contains digits should be stored as a number.

### Diagram or screenshot required

```text
No
Suggested evidence: migration and controller diff
```

### References

```text
database/migrations/0001_01_01_000000_create_users_table.php
app/Http/Controllers/UserProfileController.php
LESSON_LEARNT.md
```

### Final reflection

1. What worked? The invalid migration method was replaced with a valid column type.
2. What was difficult? The fix had to stay small while matching existing form behavior.
3. What would be improved in a paid production environment? Better early schema review and stronger validation patterns.
4. Can every team member explain this change? Yes, because it is a direct schema correction.
5. Did this change preserve existing code where possible? Yes.

---

## Entry 002 - Repository review lesson log

### Date and time

```text
2026-07-18 11:22
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not a git repository
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Create a separate lesson file that explains the repository review findings in a student-friendly way.

### Why this work was required

The user asked for a reusable learning note that captures the review findings, the theory behind them, the practical risks, the plan to fix them, the checks already taken, and the current solved state.

### Starting state

The repository already contained the main Laravel application, the project specification, and the existing journal.

The current workspace path did not respond as a Git repository, so the review could not yet be attached to a branch or commit.

### Evidence before change

```text
git status --short --branch
fatal: not a git repository (or any of the parent directories): .git
```

### Investigation

Reviewed:

```text
AGENTS.md
PROJECT_SPEC.md
README.md
myjournal.md
routes/web.php
routes/user.php
routes/admin.php
app/Http/Middleware/UserMiddleware.php
app/Http/Controllers/*
database/migrations/*
```

### Commands executed

```powershell
Get-Date -Format "yyyy-MM-dd HH:mm zzz"
git status --short --branch
php artisan about --only=environment,cache,drivers
php artisan route:list
php artisan migrate:status
php artisan test
npm run build
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `LESSON_LEARNT.md` | New learning log | Capture the review findings in a reusable format |
| `myjournal.md` | Added journal entry and updated index | Record the documentation work as required by the project workflow |

### Existing code preserved

No controller, model, migration, route, or view code was changed in this task.

### Decision made

Create a dedicated lesson file alongside the main journal so the team can read the review as a teaching note without digging through the full chronology.

### Alternatives considered

#### Alternative A

Description:
Put the learning notes only inside `myjournal.md`.

Advantages:
One file to maintain.

Disadvantages:
Harder to skim and reuse.

Reason not selected:
The user asked for a separate lesson-style record.

#### Alternative B

Description:
Add the notes into `PROJECT_SPEC.md`.

Advantages:
The architecture and lessons would live together.

Disadvantages:
Mixes governance with review notes.

Reason not selected:
The spec should stay focused on approved architecture.

### Architectural impact

```text
None
```

### Security impact

No new runtime security impact. The lesson file documents existing trust-boundary and authorization risks for learning purposes.

### Performance impact

```text
No runtime performance impact
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team now has a compact reference that explains why migration correctness, middleware logic, route verbs, ownership checks, and storage choices matter in a real Laravel project.

### Implementation summary

Added `LESSON_LEARNT.md` with a review table and usage note.
Updated the journal index and recorded this documentation task as a separate entry.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| Documentation review | New lesson file and journal entry created | Files added successfully | Pass |

### Commands used for testing

```powershell
Get-Date -Format "yyyy-MM-dd HH:mm zzz"
git status --short --branch
php artisan test
```

### Test failures and resolution

The application review still shows unresolved code issues from earlier inspection, but this documentation task itself completed successfully.

### Manual verification

Confirmed the new lesson file exists and the journal now includes the review entry.

### Result

```text
Completed
```

### Rollback procedure

Delete `LESSON_LEARNT.md` and remove Entry 002 from `myjournal.md`.

### Remaining issues

The code review findings are still open and need implementation work.

### Next recommended step

Fix the invalid migration method and the middleware authorization bug before moving on to broader feature work.

### Project-book material

This change created a short teaching document that connects code review findings to practical project risks and next steps.

### Presentation-slide material

```text
- Separate lesson log created for review findings
- Each finding explains theory and practical risk
- Notes include plan, action taken, and solved state
- Journal was updated to preserve project evidence
```

### Speaker-note material

The repository now has a lightweight learning note that turns review findings into a reusable explanation for the student team and the final presentation.

### Diagram or screenshot required

```text
No
Suggested evidence: none
```

### References

```text
AGENTS.md
PROJECT_SPEC.md
myjournal.md
```

### Final reflection

1. What worked? The review was turned into a compact shared learning file.
2. What was difficult? The codebase has several separate legacy issues, so the findings needed careful grouping.
3. What would be improved in a paid production environment? Better branch hygiene, cleaner authorization, and clearer storage boundaries.
4. Can every team member explain this change? Yes, because it is written as a simple learning note.
5. Did this change preserve existing code where possible? Yes.

---

# Entry 001 — Project documentation and change-control foundation

### Date and time

```text
YYYY-MM-DD HH:MM
Timezone: Asia/Singapore
```

### Contributor

```text
Name:
Role: Student developer
```

### Branch and commit

```text
Branch: docs/project-foundation
Starting commit:
Ending commit:
Pull request:
```

### Objective

Create the repository’s collaboration instructions, architectural specification, and chronological engineering journal.

### Why this work was required

The project is collaborative and will involve changes to an existing Laravel application. A shared process is required to protect existing student work, prevent unnecessary rewrites, document architectural decisions, and create reliable source material for the diploma project book and presentation.

### Starting state

The main Laravel application already existed locally.

The planned standalone AI application had not yet been added to the local workspace.

The project did not yet have a formal repository-level change policy, consolidated architecture document, or standard journal format.

### Decision made

Three root-level documentation files will be maintained:

```text
AGENTS.md
PROJECT_SPEC.md
myjournal.md
```

`AGENTS.md` defines contributor and coding-agent behavior.

`PROJECT_SPEC.md` records approved architecture.

`myjournal.md` records chronological engineering evidence.

### Existing code preserved

No application behavior was changed during this documentation stage.

No controller, model, migration, route, view, or configuration file was rewritten.

### Architectural impact

```text
Moderate documentation and governance impact
No runtime application impact
```

### Security impact

The new process explicitly prohibits committing credentials, environment files, provider keys, access tokens, and production connection strings.

### Performance impact

```text
No runtime performance impact
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team established the difference between:

* Contributor instructions
* Architectural specifications
* Chronological implementation evidence
* User-facing README documentation

### Result

```text
Completed after files are reviewed and committed
```

### Next recommended step

Create a baseline branch and record the current health of the Laravel application before implementing new AI functionality.

### Project-book material

The project adopted a documented change-control process before major development began. Existing code was designated for preservation unless changes were required for correctness, security, performance, deployment compatibility, or maintainability. Architectural decisions and implementation evidence were separated into dedicated documents to improve collaboration and provide traceable material for the final diploma report.

### Presentation-slide material

```text
- Existing student code preserved by default
- Architectural decisions recorded centrally
- Every meaningful implementation logged
- Journal becomes evidence for report and presentation
- Changes remain incremental and explainable
```

### Speaker-note material

Before integrating the AI service or cloud deployment, the team established a development governance process. This reduced the risk of uncontrolled rewrites and ensured that each technical decision could later be explained and supported with evidence during the diploma assessment.
