# Lesson Learnt

This file turns review findings into reusable learning notes.

## Review Log

| Finding | Theoretical explanation | Practical risk | Solution plan | Actual taken step | Solved state |
| --- | --- | --- | --- | --- | --- |
| Invalid schema method in users migration | Laravel migrations only support schema methods that exist on `Blueprint`. | `php artisan test` and migration boot can fail before any feature test runs. | Replace `bigInt()` with a valid column type, likely `string()` for phone numbers. | Updated `database/migrations/0001_01_01_000000_create_users_table.php` to use `string('phone', 30)` and aligned phone validation in `app/Http/Controllers/UserProfileController.php`. | Solved |
| Duplicate `reports.condition` migration | A column should be created once in a fresh migration path. Later migrations are for changes after the earlier schema exists. | Fresh test databases fail with a duplicate-column SQL error before feature tests can run. | Keep the later add-column migration and remove the duplicate column from the original reports table creation. | Removed `condition` from `database/migrations/2026_06_26_145035_create_reports_table.php` so `2026_07_06_191447_add_condition_to_reports_table.php` adds it once. | Solved |
| User middleware logic bug | A non-empty string in a boolean expression evaluates as true in PHP. | Role checks become ineffective and protected routes can be reached too freely. | Rewrite the condition to compare the role explicitly. | Updated `app/Http/Middleware/UserMiddleware.php` to check auth first, then allow only `user` and `author`, and added direct middleware tests. | Solved |
| Browser-supplied ownership values | Trust boundaries should be enforced on the server, not the client. | A user can act on another account's data by changing IDs in the request. | Use `Auth::id()` and server-side ownership checks. | Updated comment, report, react, save, and promote handlers to ignore browser user IDs and added ownership tests. | Solved |
| State-changing GET routes | GET should be safe and idempotent. | Deletes and role changes can be triggered accidentally or via shared links. | Move those actions to POST, PATCH, or DELETE routes with CSRF protection. | Reviewed `routes/admin.php` and `routes/user.php`. | Open |
| Public filesystem uploads | Files stored in `public/` are easy to serve but weak as persistent private storage. | User files can be exposed, collide, or be deleted unsafely. | Move toward validated storage metadata and managed object storage later. | Read file-upload code in content and profile controllers. | Open |
| No Git repository at the current path | Branch-based collaboration depends on a valid repository root. | Change tracking, commits, and review workflow cannot start cleanly. | Open the actual repo root or initialize the repository properly. | Ran `git status --short --branch` and got a not-a-git-repository error. | Open |

## How To Use This File

Read the table from left to right:

1. What went wrong
2. Why it matters in theory
3. What can happen in practice
4. What the small fix plan looks like
5. What was actually checked
6. Whether the issue is already solved

## Sharing Note

This document is meant for students and reviewers who want a quick bridge between code review and project understanding.
It does not replace `myjournal.md`; it complements it with shorter, reusable lessons.
