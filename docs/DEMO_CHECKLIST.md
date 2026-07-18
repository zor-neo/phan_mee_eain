# Demo Checklist

Use this checklist before a live presentation or after a Render deployment.

Do not record passwords, API keys, database credentials, or private URLs with secrets in this file.

## Pre-demo Status

1. Confirm GitHub Actions is green for `main`.
2. Confirm Render shows the latest expected commit as live.
3. Open the public app URL.
4. Open `/up`.
5. Open `/health`.
6. Confirm `/health` reports `ok` for app, database, and cache.
7. Confirm uploads show `disk: s3`.

## Demo Accounts

Use operator-managed credentials only.

```text
superadmin account: stored outside Git
demo author account: user1@gmail.com
demo author password: stored outside Git
```

## Reader Flow

1. Login as a demo user or author.
2. Open the reader home page.
3. Browse seeded learning content.
4. Search for a topic such as `Technology`.
5. Filter or navigate by category.
6. Open a content item.
7. Use See more / See less on long content.
8. Save content.
9. React to content.
10. Add a comment.
11. Delete your own comment.
12. Report content once.

## Author Flow

1. Login as `user1@gmail.com`.
2. Open `/auther/content`.
3. Confirm seeded articles are visible.
4. Open create content.
5. Upload a small image.
6. Submit content.
7. Refresh the page.
8. Confirm the uploaded image still renders.

## Superadmin Flow

1. Login as the superadmin account.
2. Open `/admins/access-control`.
3. Confirm normal users, authors, and admins are listed.
4. Grant admin access to a non-superadmin account if the demo requires it.
5. Confirm the UI does not allow assigning the `superadmin` role.
6. Confirm the superadmin account cannot be deleted.

## AI Flow

1. Open the footer Help Center link.
2. Confirm the Guru chat pane opens.
3. Send one short question.
4. Confirm the answer appears.
5. Refresh the page.
6. Confirm recent chat messages are still shown.

## Recovery Pointers

Use [`PRODUCTION_OPERATIONS.md`](PRODUCTION_OPERATIONS.md) if any check fails.

Common checks:

```text
/health
Render logs
Aiven query editor
GitHub Actions run page
Cloudflare R2 bucket object list
```
