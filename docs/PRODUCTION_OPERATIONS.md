# Production Operations Guide

This guide is for operating the PhanMeeEin Render deployment with Aiven MySQL and Cloudflare R2.

Do not record real passwords, API keys, R2 secrets, Aiven credentials, Render secrets, or complete connection strings in this file.

## Service Map

```text
Browser
  -> Render web service
  -> Aiven MySQL for users, content, sessions, cache, queues, and AI memory
  -> Cloudflare R2 for uploaded files
  -> Gemini API for AI responses
```

Render container storage is temporary. Do not depend on it for uploaded images, content files, database backups, or AI memory.

## Normal Release Checklist

Before pushing:

```powershell
php artisan test tests\Feature\ExpandableContentTest.php
php artisan test tests\Feature\DatabaseSeederTest.php tests\Feature\UserProfileRoleTest.php tests\Feature\SuperAdminAccessTest.php
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
git diff --check
docker build -t phanmeeein:test .
```

For a migration release:

```powershell
php artisan migrate:status
php artisan migrate --pretend
php artisan migrate
```

Run migration commands only after confirming the active connection points to the intended database.

## Render Environment

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

Database:

```text
DB_CONNECTION=mysql
DB_HOST=[AIVEN_HOST]
DB_PORT=[AIVEN_PORT]
DB_DATABASE=[AIVEN_DATABASE]
DB_USERNAME=[AIVEN_USER]
DB_PASSWORD=[REDACTED]
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database
```

Storage:

```text
FILESYSTEM_DISK=s3
UPLOADS_DISK=s3
AWS_ACCESS_KEY_ID=[R2_ACCESS_KEY_ID]
AWS_SECRET_ACCESS_KEY=[REDACTED]
AWS_DEFAULT_REGION=auto
AWS_BUCKET=[R2_BUCKET_NAME]
AWS_ENDPOINT=https://[CLOUDFLARE_ACCOUNT_ID].r2.cloudflarestorage.com
AWS_URL=
AWS_USE_PATH_STYLE_ENDPOINT=true
```

Demo repair values:

```text
SUPERADMIN_PASSWORD=[REDACTED]
DEMO_AUTHOR_PASSWORD=[REDACTED]
```

Keep `AWS_URL` blank unless a public R2/custom domain is intentionally configured.

## Health Checks

Use this for Render's normal health check path:

```text
/up
```

Use this for manual operator checks:

```text
/health
```

Expected `/health` checks:

```text
app
database
cache
uploads
```

Keep this disabled for normal probes:

```text
HEALTH_CHECK_STORAGE_WRITE=false
```

Set it to `true` only when intentionally validating that the configured upload disk can write and delete a tiny file.

## Production Smoke Test

After Render deploys a new commit:

1. Open `/up`.
2. Open `/health`.
3. Login as superadmin.
4. Login as `user1@gmail.com`.
5. Browse content.
6. Search content.
7. Filter by category.
8. Expand and collapse a long article with See more / See less.
9. Upload a profile image.
10. Create content with an image.
11. Refresh and confirm uploaded images still render.
12. Save/bookmark content.
13. React to content.
14. Comment on content.
15. Delete your own comment.
16. Report content.
17. Open the AI chat pane.
18. Send one AI message and confirm the answer appears.
19. Refresh and confirm the recent chat still appears.

## Database Audit Commands

These are read-only checks from the project terminal when `.env` points to the intended Aiven database:

```powershell
php artisan tinker --execute="dump(DB::connection()->getDatabaseName());"
```

```powershell
php artisan tinker --execute="dump(DB::table('users')->select('role', DB::raw('count(*) as total'))->groupBy('role')->orderBy('role')->get());"
```

```powershell
php artisan tinker --execute="dump(DB::table('users')->select('id','name','email','role')->whereIn('email',['superadmin@gmail.com','user1@gmail.com','user2@gmail.com','user3@gmail.com'])->orderBy('email')->get());"
```

```powershell
php artisan tinker --execute="dump(['categories'=>DB::table('categories')->count(),'contents'=>DB::table('contents')->count(),'ai_conversations'=>DB::table('ai_conversations')->count(),'ai_messages'=>DB::table('ai_messages')->count()]);"
```

## Demo Data Repair

The main seeder is idempotent. It creates or repairs:

```text
superadmin account
user1@gmail.com author account
user2@gmail.com author account
user3@gmail.com author account
10 categories
30 demo content rows
```

Run only after confirming the active database connection:

```powershell
php artisan migrate:status
php artisan db:seed --force
```

The seeder does not wipe existing tables. It uses `firstOrCreate` or `updateOrCreate` style behavior.

## Dangerous Commands

Do not run these against production unless the team explicitly decides to wipe and rebuild the database:

```powershell
php artisan migrate:fresh
php artisan migrate:refresh
php artisan db:wipe
```

These commands can delete users, sessions, content, categories, comments, reports, saved content, and AI memory.

## If Users Disappear

1. Do not run destructive commands.
2. Confirm the active database:

```powershell
php artisan tinker --execute="dump([config('database.default'), DB::connection()->getDatabaseName()]);"
```

3. Count users:

```powershell
php artisan tinker --execute="dump(DB::table('users')->select('role', DB::raw('count(*) as total'))->groupBy('role')->get());"
```

4. If the expected demo rows are missing and migrations exist, run:

```powershell
php artisan db:seed --force
```

5. Recheck the key demo accounts.

## If Images Disappear

1. Confirm Render env has `UPLOADS_DISK=s3`.
2. Confirm R2 env variables are present.
3. Confirm `AWS_URL` is blank unless a public domain is intentionally used.
4. Open `/health`.
5. Temporarily set `HEALTH_CHECK_STORAGE_WRITE=true` only if actively testing R2 writes.
6. Return `HEALTH_CHECK_STORAGE_WRITE=false` after testing.

If old local images existed before R2 setup, they may not exist in R2. Reupload important demo images through the app.

## If AI Chat Memory Looks Missing

Check latest AI conversations:

```powershell
php artisan tinker --execute="dump(DB::table('ai_conversations')->latest('updated_at')->limit(5)->get(['id','user_id','title','status','updated_at']));"
```

Check latest AI messages:

```powershell
php artisan tinker --execute="dump(DB::table('ai_messages')->latest('created_at')->limit(10)->get(['id','ai_conversation_id','role','content','created_at']));"
```

Expected roles:

```text
user
assistant
```

Browser storage is not authoritative AI memory. Aiven MySQL is the source of truth for temporary chat history.

## Backup Notes

For the student MVP, there is no automated backup workflow in this repository yet.

Before any risky production database operation:

1. Export data from Aiven Console if available.
2. Or connect with a MySQL client and make a SQL dump.
3. Store the dump outside the repository.
4. Do not commit database dumps to Git.

Future work should add a documented backup and restore procedure before claiming production-grade recovery.

