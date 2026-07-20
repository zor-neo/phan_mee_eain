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
|   009 | 2026-07-18 | RBAC, reporting, and author content hardening | `not committed yet` | Completed |
|   010 | 2026-07-18 | Refresh footer navigation and demo text | `not committed yet` | Completed |
|   011 | 2026-07-18 | Prevent attachment loss on incomplete author forms | `not committed yet` | Completed |
|   012 | 2026-07-18 | Fix favicon asset wiring | `not committed yet` | Completed |
|   013 | 2026-07-18 | Add static report policy and author guidelines pages | `not committed yet` | Completed |
|   014 | 2026-07-18 | Convert state-changing GET routes | `not committed yet` | Completed |
|   015 | 2026-07-18 | Phase 5 — AI service inspection (aibot / Summie) | `not committed yet` | Completed |
|   016 | 2026-07-18 | Phase 6 — AI service integration (local package, auth-gated) | `not committed yet` | Completed |
|   017 | 2026-07-18 | Add webapp help RAG + dual-role Summie (webhelper.md) | `not committed yet` | Completed |
|   018 | 2026-07-18 | Phase 3 - Database-backed AI memory for Aiven MySQL | `not committed yet` | Completed |
|   019 | 2026-07-18 | Add superadmin access-control role | `not committed yet` | Completed |
|   020 | 2026-07-18 | Add Aiven demo user accounts | `not committed yet` | Completed |
|   021 | 2026-07-18 | Manual Aiven AI flow verification | `not committed yet` | Completed |
|   022 | 2026-07-19 | Add Docker setup for Render deployment | `not committed yet` | Completed |
|   023 | 2026-07-19 | Open Guru chat from footer Help Center links | `not committed yet` | Completed |
|   024 | 2026-07-19 | Fix Render HTTPS, CSS, footer, and auth form deployment issues | `not committed yet` | Completed |
|   025 | 2026-07-19 | Restore Aiven demo user login accounts | `not committed yet` | Completed |
|   026 | 2026-07-19 | Restore Aiven superadmin account | `not committed yet` | Completed |
|   027 | 2026-07-19 | Restore Aiven starter categories | `not committed yet` | Completed |
|   028 | 2026-07-19 | Seed Aiven demo authors, categories, and learning content | `not committed yet` | Completed |
|   029 | 2026-07-19 | Display content images proportionately | `not committed yet` | Completed |
|   030 | 2026-07-19 | Configure persistent R2-backed upload storage | `not committed yet` | Completed |
|   031 | 2026-07-19 | Fix account dropdown avatar and email overflow | `not committed yet` | Completed |
|   032 | 2026-07-19 | Resolve Composer and npm security advisories | `not committed yet` | Completed |
|   033 | 2026-07-19 | Add production health check endpoint | `not committed yet` | Completed |
|   034 | 2026-07-19 | Repair Aiven user and demo data consistency | `not committed yet` | Completed |
|   035 | 2026-07-19 | Add expandable long-content previews | `not committed yet` | Completed |
|   036 | 2026-07-19 | Add production operations and recovery guide | `not committed yet` | Completed |
|   037 | 2026-07-19 | Add GitHub Actions CI workflow | `not committed yet` | Completed |
|   038 | 2026-07-19 | Fix CI demo seeder environment handling | `not committed yet` | Completed |
|   039 | 2026-07-19 | Disable Vite manifest dependency during tests | `not committed yet` | Completed |
|   040 | 2026-07-19 | Use test-safe drivers in GitHub Actions | `not committed yet` | Completed |
|   041 | 2026-07-19 | Verify production smoke test and document operations checklist | `not committed yet` | Completed |
|   042 | 2026-07-19 | Fix admin layout CSRF metadata for superadmin logout | `not committed yet` | Completed |
|   043 | 2026-07-19 | Improve mobile navbar and Guru chat panel layout | `not committed yet` | Completed |
|   044 | 2026-07-19 | Document architecture boundaries and operational limits | `not committed yet` | Completed |
|   045 | 2026-07-19 | Clarify AI memory retention limits in architecture documentation | `not committed yet` | Completed |
|   046 | 2026-07-19 | Align project book draft with real production implementation | `not committed yet` | Completed |
|   047 | 2026-07-20 | Standardize non-auth pages with Author Room palette | `not committed yet` | Completed |
|   048 | 2026-07-20 | Replace square article fallback image with wide version | `not committed yet` | Completed |
|   049 | 2026-07-20 | Improve cyan readability and fix brand home links | `not committed yet` | Completed |
|   050 | 2026-07-20 | Add professional coming-soon states for author video and quiz tools | `not committed yet` | Completed |
|   051 | 2026-07-20 | Make article hero images fully cover their frames | `not committed yet` | Completed |
|   052 | 2026-07-20 | Split brand logo and wide article fallback image | `not committed yet` | Completed |
|   053 | 2026-07-20 | Add non-technical tester checklist | `not committed yet` | Completed |
|   054 | 2026-07-20 | Fix access-control update redirect after role grant | `not committed yet` | Completed |
|   055 | 2026-07-20 | Add singular admin access-control compatibility route | `not committed yet` | Completed |
|   056 | 2026-07-20 | Disable static prototype router on Laravel pages | `not committed yet` | Completed |
|   057 | 2026-07-20 | Add admin feed coming-soon placeholder | `not committed yet` | Completed |
|   058 | 2026-07-20 | Strengthen Great Guru persona against role override | `not committed yet` | Completed |
|   059 | 2026-07-20 | Make Great Guru responses more directive | `not committed yet` | Completed |
|   060 | 2026-07-20 | Left-align reader comment names | `not committed yet` | Completed |

Update this table whenever a new substantial entry is added.

---

## Entry 060 - Left-align reader comment names

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The user reported that comment user names appeared visually centered depending on the comment body length. The request was to preserve the codebase as much as possible and only make the name/text block left aligned.

### Files changed

```text
resources/views/user/home/contentPage.blade.php
tests/Feature/ExpandableContentTest.php
myjournal.md
```

### Main changes

- Added `text-start` to the existing comment text container for server-rendered comments.
- Added the same `text-start` class to the JavaScript-created comment container after a new comment is submitted.
- Added a small regression test for the content page markup.

### Test results

```text
php artisan test tests\Feature\ExpandableContentTest.php: passed, 3 tests / 9 assertions
php artisan test: passed, 81 tests / 252 assertions
php artisan optimize:clear: passed
git diff --check: passed with a harmless CRLF normalization warning for myjournal.md
```

### Security impact

```text
No security or authorization change
UI alignment only
```

### Project-book material

A small user-interface polish was made to keep comment author names and comment text left aligned for better readability.

## Entry 059 - Make Great Guru responses more directive

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The Great Guru persona was resisting role override better, but responses still felt less directive than expected. The intended tone is an old wise mentor who gives practical guidance first, not a generic polite assistant.

### Files changed

```text
packages/Local/AiCompanion/src/Services/PromptBuilder.php
tests/Unit/PromptBuilderPersonaTest.php
myjournal.md
```

### Main changes

- Changed output style from mentor-medium to firmly helpful.
- Instructed Guru to start with the next useful action or answer.
- Added guidance to prefer imperative phrasing such as "Start here", "Do this next", and "Check this".
- Reduced the requirement to end most responses with a question.
- Updated the persona prompt unit test to cover the more directive style.

### Test results

```text
php artisan test tests\Unit\PromptBuilderPersonaTest.php: passed, 1 test / 11 assertions
php -l packages\Local\AiCompanion\src\Services\PromptBuilder.php: passed
php artisan test: passed, 80 tests / 249 assertions
php artisan optimize:clear: passed
git diff --check: passed with a harmless CRLF normalization warning for myjournal.md
```

### Security impact

```text
No route, database, or authorization change
Keeps the previous persona-lock behavior
```

### Project-book material

The AI companion tone was refined to behave more like a practical mentor. It now prioritizes direct next steps and clearer guidance while keeping the old wise Guru identity.

## Entry 058 - Strengthen Great Guru persona against role override

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The AI persona could become too generic, especially when users asked it to roleplay or ignore its normal identity. The intended persona is an old wise Guru character, not a bland support assistant.

### Files changed

```text
packages/Local/AiCompanion/src/Services/PromptBuilder.php
tests/Unit/PromptBuilderPersonaTest.php
myjournal.md
```

### Main changes

- Strengthened the Great Guru identity as an old wise man and true Guru.
- Added a persona lock section to resist identity override and unsafe roleplay requests.
- Clarified that safe roleplay may continue, but the assistant must remain the Great Guru.
- Reduced overly polite or corporate assistant behavior in the prompt.
- Added a unit test to confirm the persona-lock instructions remain in the generated prompt.

### Test results

```text
php artisan test tests\Unit\PromptBuilderPersonaTest.php: passed, 1 test / 8 assertions
php -l packages\Local\AiCompanion\src\Services\PromptBuilder.php: passed
php artisan test: passed, 80 tests / 246 assertions
php artisan optimize:clear: passed
git diff --check: passed with a harmless CRLF normalization warning for myjournal.md
```

### Security impact

```text
Positive prompt-safety impact
Reduces prompt-injection style identity override attempts
No database, authorization, or route changes
```

### Project-book material

The AI companion persona was strengthened so it remains a consistent old wise Guru character during normal chat and safe roleplay. This improves user experience and helps prevent users from overriding the assistant identity through prompt instructions.

## Entry 057 - Add admin feed coming-soon placeholder

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The admin sidebar had a `Create Admin Feed` item, but it was only linked to `#`. The announcements table and model existed, but the real feed publishing workflow was not implemented.

### Files changed

```text
app/Http/Controllers/AnnouncementController.php
routes/admin.php
resources/views/admin/layout/master.blade.php
resources/views/admin/home/createAdminFeed.blade.php
tests/Feature/AdminComingSoonPageTest.php
myjournal.md
```

### Main changes

- Added an admin-protected route for the admin feed placeholder page.
- Wired the admin sidebar `Create Admin Feed` link to the new route.
- Added a professional Coming Soon page explaining that admin feed publishing is planned for a future version.
- Added tests to confirm the page and sidebar link are present.

### Test results

```text
php artisan test tests\Feature\AdminComingSoonPageTest.php: passed, 2 tests / 9 assertions
php artisan route:list --name=adminFeed: confirmed /admins/feed/create route
php artisan route:cache: passed
php artisan test: passed, 79 tests / 238 assertions
php artisan optimize:clear: passed
git diff --check: passed with a harmless CRLF normalization warning for myjournal.md
```

### Security impact

```text
No publishing permission added yet
Route remains behind admin middleware
No announcement database writes are introduced in this change
```

### Project-book material

The admin feed feature is acknowledged as planned but not completed in the current release. Instead of showing a broken link, the application now displays a clear Coming Soon message from the admin portal.

## Entry 056 - Disable static prototype router on Laravel pages

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

Production showed a 404 request for `/admin/dashboard.html`. This path belongs to the old static HTML prototype, while the real Laravel admin dashboard route is `/admins/page`.

### Files changed

```text
resources/views/admin/layout/master.blade.php
resources/views/user/layout/master.blade.php
resources/views/user/guest/guestUser.blade.php
public/user/js/static-router.js
tests/Feature/ResponsiveLayoutAssetsTest.php
myjournal.md
```

### Main changes

- Removed the static prototype router script from Laravel admin, user, and guest layouts.
- Added a guard inside `static-router.js` so it only runs on static `.html` prototype pages or pages that explicitly opt in.
- Kept the old prototype router file for reference instead of deleting it.

### Test results

```text
php artisan route:list --name=adminHome: confirmed adminHome is /admins/page
php artisan route:cache: passed
php artisan test: passed, 77 tests / 229 assertions
php artisan test tests\Feature\ResponsiveLayoutAssetsTest.php: passed, 5 tests / 27 assertions
php artisan optimize:clear: passed
git diff --check: passed with a harmless CRLF normalization warning for myjournal.md
```

### Security impact

```text
No authorization change
No route permission change
Reduced accidental navigation to non-Laravel static paths
```

### Project-book material

The project kept the old UI prototype files for reference, but production Laravel pages no longer use the prototype router. This avoids broken `.html` navigation paths in the deployed application.

## Entry 055 - Add singular admin access-control compatibility route

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

Production still returned 404 when using `/admin/access-control`. The canonical Laravel route is `/admins/access-control`, but the singular `/admin/...` path is easy to type and had already been used during testing.

### Files changed

```text
routes/admin.php
tests/Feature/SuperAdminAccessTest.php
myjournal.md
```

### Main changes

- Added a singular compatibility GET route from `/admin/access-control` to the canonical access-control page.
- Added a singular compatibility POST route for `/admin/access-control/{user}` so old or manually typed role update paths still work.
- Kept the canonical route as `/admins/access-control`.
- Added tests for both singular GET and POST behavior.

### Test results

```text
php artisan test tests\Feature\SuperAdminAccessTest.php: passed, 10 tests / 24 assertions
php artisan route:cache: passed
php artisan optimize:clear: passed
php artisan test: passed, 76 tests / 224 assertions
git diff --check: passed
```

### Security impact

```text
No permission expansion
The singular compatibility route still uses admin middleware
Only superadmin can update access because the controller checks isSuperAdmin()
```

### Project-book material

A backward-compatible route was added to reduce user-facing 404 errors caused by singular and plural admin URL confusion. The canonical route remains `/admins/access-control`.

## Entry 054 - Fix access-control update redirect after role grant

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The superadmin access-control form could show a 404 after updating a user role. The access-control POST route existed, but the controller used a browser-dependent `back()` redirect after update. The admin navbar also still had a legacy static dashboard link.

### Files changed

```text
app/Http/Controllers/Admin/AdminController.php
resources/views/admin/layout/master.blade.php
tests/Feature/SuperAdminAccessTest.php
myjournal.md
```

### Main changes

- Changed the access-control update redirect to `to_route('accessControlPage')`.
- Replaced the admin navbar dashboard link from a legacy static path to `route('adminHome')`.
- Added an HTTP-level regression test for superadmin role update redirect behavior.

### Test results

```text
php artisan test tests\Feature\SuperAdminAccessTest.php: passed, 8 tests / 19 assertions
php artisan test: passed, 74 tests / 219 assertions
git diff --check: passed, with line-ending warnings only
```

### Security impact

```text
No permission expansion
Only superadmin can use access-control update
Normal admin remains blocked from access-control role grants
```

### Project-book material

The admin role-management flow was improved by redirecting to a named Laravel route after an access update. This avoids legacy or browser-dependent paths and improves reliability in production.

## Entry 053 - Add non-technical tester checklist

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The project needed a simple checklist that can be shared with non-technical testers. The checklist should help collect useful feedback without overwhelming testers with technical terms.

### Files changed

```text
docs/NON_TECH_TESTER_CHECKLIST.md
myjournal.md
```

### Main changes

- Added a tester information section.
- Added simple `OK`, `Issue`, and `Skip` result labels.
- Covered basic page checks, login, reading content, Author Room, AI chat, and mobile testing.
- Added internal team testing notes for the admin test account email and user self-promotion workflow.
- Added checks for submitting an author request as a normal user and approving it from the admin side.
- Added a short issue report form for screenshots and reproduction notes.
- Avoided passwords, secrets, environment variables, and technical debugging steps.

### Test results

```text
Documentation-only change
git diff --check: passed, with line-ending warnings only
```

### Project-book material

A simple user testing checklist was prepared for non-technical testers. This supports usability testing and helps collect feedback in a consistent format.

## Entry 052 - Split brand logo and wide article fallback image

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The wide article image had been created by replacing `public/content/image/logo.jpg`. This made article cards look better, but it removed the original square brand logo. The project needs both assets: the original logo for branding and a wide fallback for article hero frames.

### Files changed

```text
public/content/image/default-article-wide.jpg
resources/views/user/home/contentPage.blade.php
resources/views/auther/home/contents.blade.php
resources/views/auther/home/createContent.blade.php
resources/views/auther/home/editContentPage.blade.php
tests/Feature/ResponsiveLayoutAssetsTest.php
myjournal.md
```

### Main changes

- Restored `public/content/image/logo.jpg` to the original square logo.
- Saved the generated wide image as `public/content/image/default-article-wide.jpg`.
- Updated article/card/upload-preview fallbacks to use the wide image.
- Kept the content page brand logo using `content/image/logo.jpg`.
- Increased the rendered content page brand logo from `140px` to `256px`.
- Added a test to confirm article fallbacks and brand logo use separate assets.

### Asset result

```text
Brand logo: public/content/image/logo.jpg
Size: 1280 x 1280

Article fallback: public/content/image/default-article-wide.jpg
Size: 1672 x 941
```

### Test results

```text
php artisan test tests\Feature\ResponsiveLayoutAssetsTest.php: passed, 4 tests / 22 assertions
php artisan test: passed, 73 tests / 213 assertions
git diff --check: passed, with line-ending warnings only
```

### Project-book material

The project now separates brand imagery from content fallback imagery. The logo remains a square branding asset, while article cards use a wide fallback image designed for horizontal hero frames.

## Entry 051 - Make article hero images fully cover their frames

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The new wide default article image was still leaving gray space inside article image frames. The image itself was wide enough, but the CSS class used `object-fit: contain` with inner padding.

### Files changed

```text
public/user/css/style.css
tests/Feature/ResponsiveLayoutAssetsTest.php
myjournal.md
```

### Main changes

- Changed `.sw-content-image` from `object-fit: contain` to `object-fit: cover`.
- Removed inner image padding by setting `padding: 0`.
- Kept the existing `16 / 9` frame ratio and max height.
- Added a focused layout asset test to protect this behavior.

### Test results

```text
php artisan test tests\Feature\ResponsiveLayoutAssetsTest.php: passed, 3 tests / 16 assertions
php artisan test: passed, 72 tests / 208 assertions
git diff --check: passed, with line-ending warnings only
```

### Project-book material

Article images were adjusted to fill their card frame cleanly. The fallback image now behaves like a true article hero image instead of appearing inside a padded gray box.

## Entry 050 - Add professional coming-soon states for author video and quiz tools

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The Author Room quick links for video upload and quiz creation opened placeholder pages with a casual typo message. This looked unprofessional for a production-style student project demonstration.

### Files changed

```text
resources/views/auther/home/createVContent.blade.php
resources/views/auther/home/createQuize.blade.php
resources/views/auther/home/dashboard.blade.php
tests/Feature/AuthorComingSoonPageTest.php
myjournal.md
```

### Main changes

- Replaced the casual placeholder error with polished `Coming Soon` cards.
- Renamed `Upload Video Content` to `Upload Video Lecture Content`.
- Updated the Author Room dashboard video card wording to `Video Lectures & Quizzes`.
- Added author-friendly actions back to written content creation and Author Room.
- Added feature tests to confirm the professional coming-soon copy and prevent the old typo message from returning.

### Test results

```text
php artisan test tests\Feature\AuthorComingSoonPageTest.php: passed, 3 tests / 15 assertions
php artisan test: passed, 71 tests / 204 assertions
git diff --check: passed, with line-ending warnings only
```

### Security impact

```text
No security impact
No route permission changes
```

### Project-book material

Unfinished author features now show a clear coming-soon message instead of a casual error. This improves the demonstration quality while honestly showing that video lecture publishing and quiz creation are planned future features.

## Entry 049 - Improve cyan readability and fix brand home links

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

After applying the Author Room palette across non-auth pages, the cyan accent was still a little light for small text, links, icons, and outline buttons. The navbar title links also pointed to `/home.php`, which can create a 404 in the Laravel deployment.

### Files changed

```text
public/user/css/style.css
resources/views/auther/layout/master.blade.php
resources/views/user/layout/master.blade.php
resources/views/admin/layout/master.blade.php
resources/views/user/guest/guestUser.blade.php
resources/views/static/layout.blade.php
resources/views/admin/home/dashboard.blade.php
packages/Local/AiCompanion/public/ai-companion/widget.css
public/vendor/ai-companion/ai-companion/widget.css
myjournal.md
```

### Main changes

```text
Old primary cyan: #76b9d8
New primary cyan: #3f9fc8
Old hover cyan: #4db4e3
New hover cyan: #2f86ad
```

- Updated non-auth shared styling to use the darker cyan.
- Updated Author Room, static pages, admin chart colors, user inline reaction styling, and Guru widget colors.
- Left login and registration page styling unchanged.
- Changed signed-in user brand link from `/home.php` to `route('userHome')`.
- Changed admin brand link from `/home.php` to `route('adminHome')`.
- Changed guest brand link from `#` to `route('guest#Place')`.

### Commands executed

```powershell
php artisan route:list --name=userHome
php artisan route:list --name=adminHome
php artisan route:list --name=guest#Place
rg -n "old cyan and /home.php patterns" public resources packages
```

### Test results

```text
git diff --check: passed, with line-ending warnings only
php artisan test: passed, 68 tests / 189 assertions
Route checks confirmed userHome, adminHome, and guest#Place exist
Scan confirmed /home.php and old cyan are removed from non-auth targets
```

### Security impact

```text
No security impact
No authentication behavior changed
```

### Project-book material

The visual theme was adjusted for readability by using a slightly darker cyan while keeping the same design direction. Broken legacy title links were replaced with Laravel named routes so they work correctly in production.

## Entry 048 - Replace square article fallback image with wide version

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The default article image was a square logo. In wide article cards and hero frames, it could look awkward because it had to be cropped or contained inside a horizontal frame.

The requested fix was to create the broad article fallback directly on `public/content/image/logo.jpg`, so existing fallback references continue to work without changing Blade files.

### Files changed

```text
public/content/image/logo.jpg
myjournal.md
```

### Result

The fallback image was replaced with a wide 16:9-style educational illustration based on the Phan Mee Eain lantern and books identity.

```text
Final image: public/content/image/logo.jpg
Final size: 1672 x 941
Aspect ratio: 1.78
```

### Commands executed

```powershell
Generated a wide image using image generation from the existing logo reference.
Converted the generated PNG to JPEG and replaced public/content/image/logo.jpg.
Checked final dimensions with System.Drawing.
```

### Security impact

```text
No security impact
No secrets changed
```

### Performance impact

The new JPEG is larger than the old logo fallback but still reasonable for a default article image. If page speed becomes a concern, it can later be compressed further or converted to WebP.

### Project-book material

The default article image was improved to match the real article card layout. A wide fallback image avoids unnatural cropping and gives article cards a more consistent appearance when authors do not upload a custom image.

## Entry 047 - Standardize non-auth pages with Author Room palette

### Date and time

```text
2026-07-20
Timezone: Asia/Bangkok
```

### Contributor

```text
Codex with Kaung
```

### What was attempted

The project had different visual color systems across page areas. Author Room used a light gray, white, cyan, and green palette, while user, admin, public, static, and AI chat areas still used older warm or blue colors.

The goal was to make all non-auth pages use the current Author Room palette, while keeping login and registration pages unchanged.

### Files changed

```text
public/user/css/style.css
resources/views/auther/layout/master.blade.php
resources/views/auther/home/createContent.blade.php
resources/views/auther/home/editContentPage.blade.php
resources/views/user/layout/master.blade.php
resources/views/admin/home/dashboard.blade.php
resources/views/static/layout.blade.php
packages/Local/AiCompanion/public/ai-companion/widget.css
public/vendor/ai-companion/ai-companion/widget.css
```

### Main changes

```text
Background: #f4f4f4
Surface: #ffffff
Primary: #76b9d8
Primary hover: #4db4e3
Green action: #1c8233
Green hover: #156627
Text: #333333
Muted text: #6c757d
Soft hover: #e0e0e0
Border: #dee2e6
```

- Updated the shared non-auth CSS variables to match Author Room.
- Added shared button and color helper overrides for cyan and green actions.
- Added missing Author Room helper styles for `sw-panel`, `sw-muted`, buttons, dashed borders, and form focus states.
- Updated the Guru AI chat widget source and published CSS to use the same palette.
- Updated admin chart colors to use cyan, green, and gray tones.
- Changed optional YouTube labels in author content forms from red to muted gray.
- Left authentication views and Tailwind guest auth layout unchanged.

### Commands executed

```powershell
rg -n -- "palette and color patterns" public resources packages
```

### Security impact

```text
No security impact
No secrets changed
No auth behavior changed
```

### Performance impact

```text
No expected performance impact
CSS-only visual update
```

### Deployment impact

The change requires a normal Render redeploy after commit and push. Browser cache may need refresh because shared CSS files changed.

### Test results

```text
git diff --check: passed, with line-ending warnings only
php artisan test: passed, 68 tests / 189 assertions
```

### Project-book material

The user interface was standardized by applying one consistent color palette across non-authenticated and authenticated application pages, excluding login and registration. This improved visual consistency while preserving existing layouts and page behavior.

## Entry 046 - Align project book draft with real production implementation

### Date and time

```text
2026-07-19
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Project-book editor and documentation assistant
```

### Objective

Update the full project book draft so it matches the real production state of Phan Mee Eain instead of the earlier planned version.

### Existing behavior

The uploaded project book draft still used older wording and planned structures, including:

```text
Learner as a formal role name
AI chatbot listed as a future improvement
announcements listed as completed management feature
older sample routes such as /resources and /contents/{id}
older controller names such as HomeController and SaveController
database/model tables missing AI chat, reactions, content resources, and managed deployment details
```

### Documentation update

Created a revised Word copy:

```text
C:\Users\kaung\Desktop\Final Project\DOCS\Phan_Mee_Eain_Project_Book_realigned.docx
```

Main alignment changes:

```text
Changed formal role wording to Guest, User, Author, Admin, and Superadmin.
Moved Guru AI chat from future plan into completed/implemented features.
Kept announcement module as not completed instead of completed.
Updated route, controller, model, migration, requirement, test, screenshot, and feature tables.
Added production references to https://gurus.onrender.com and https://github.com/zor-neo/phan_mee_eain.git.
Updated future plan to compact student-level items such as paid AWS ecosystem, custom domain, no cold start, higher availability, community group chat, better AI operation, and scheduled cleanup.
```

### Verification

Structural DOCX checks confirmed:

```text
Output file exists
Paragraph count: 355
Table count: 32
No remaining formal Learner role text
No old future-AI wording
No old route sample terms such as HomeController, /resources, /contents/{id}, or /admin/announcements
```

Visual render QA could not be completed because LibreOffice/`soffice` is not installed or not available on PATH in the local environment.

### Files changed

```text
C:\Users\kaung\Desktop\Final Project\DOCS\Phan_Mee_Eain_Project_Book_realigned.docx
myjournal.md
```

### Deployment impact

No runtime code, database, deployment, or environment variable behavior changed. This is documentation work only.

---

## Entry 045 - Clarify AI memory retention limits in architecture documentation

### Date and time

```text
2026-07-19
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Architecture discussion partner and documentation assistant
```

### Objective

Clarify the AI chat memory configuration for project-book and presentation discussion.

### Existing behavior

The architecture limits document listed the AI memory numbers in plain English, but did not show the exact Laravel configuration shape or clearly explain the difference between retention expiry and physical database deletion.

### Documentation update

Added the exact AI memory configuration values:

```php
'authenticated_retention_days' => 7,
'max_messages' => 100,
'context_messages' => 20,
```

Also clarified:

```text
7 days creates an expiry timestamp, but does not delete rows by itself.
100 messages is the maximum stored messages per active conversation.
20 messages is the bounded context window sent to Gemini.
Logout clears the session pointer but does not immediately delete DB rows.
A future Laravel cleanup command or Render Cron Job can enforce physical deletion.
```

Added the per-request AI memory flow:

```text
Laravel reads the latest 20 previous messages from MySQL.
Laravel combines them with the current user message and helper context.
Laravel sends the resulting prompt to Gemini.
Laravel saves only the new user message and new assistant reply back to MySQL.
```

### Files changed

```text
docs/ARCHITECTURAL_BOUNDARIES_AND_LIMITS.md
myjournal.md
```

### Deployment impact

No deployment, migration, environment variable, or runtime behavior change is required. This is documentation only.

---

## Entry 044 - Document architecture boundaries and operational limits

### Date and time

```text
2026-07-19
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Architecture discussion partner and documentation assistant
```

### Objective

Create a single project document that collects the important configuration boundaries and operational limits across Laravel, Render, Aiven MySQL, Cloudflare R2, Gemini, uploads, CI, cache, sessions, and queue handling.

### Existing behavior

The project already had production operations and demo checklist documents, but the tier-specific limits and developed rules were spread across code, configuration, README notes, and discussion. This made it harder to explain the architecture clearly during presentation preparation.

### Selected solution

Add `docs/ARCHITECTURAL_BOUNDARIES_AND_LIMITS.md` and link it from `README.md`.

The document explains:

```text
current production architecture
planned separable AI-service architecture
ownership boundaries
browser trust boundary
Laravel as security coordinator
Aiven MySQL durability rules
Cloudflare R2 upload rules
upload validation limits
Render container limitations
AI route and context limits
database-backed cache/session/queue behavior
cross-tier request-size awareness
CI and release boundaries
security presentation points
future-change rules
presentation summary
```

### Important architecture clarification

The document distinguishes the current MVP from the future architecture:

```text
Current MVP: AI integration runs inside the main Laravel container and calls Gemini directly.
Future architecture: AI service can be split out and protected with HTTPS JSON plus HMAC signing.
```

### Commands executed

```powershell
Get-Content PROJECT_SPEC.md
Get-Content README.md
Get-ChildItem docs
Get-Content config\ai-companion.php
rg upload/configuration terms across app, config, routes, resources, packages, and tests
Get-Content app\Support\UploadedMedia.php
Get-Content config\filesystems.php
Get-Content app\Http\Controllers\HealthCheckController.php
Get-Content app\Http\Controllers\Auther\AutherProfileController.php
Get-Content app\Http\Controllers\UserProfileController.php
Get-Content .github\workflows\ci.yml
```

### Files changed

```text
docs/ARCHITECTURAL_BOUNDARIES_AND_LIMITS.md
README.md
myjournal.md
```

### Security impact

No runtime security behavior changed. The documentation explicitly avoids recording secrets and reinforces that provider keys, database credentials, R2 secrets, and trusted role decisions stay server-side.

### Deployment impact

No deployment, migration, or environment variable change is required. This is documentation only.

---

## Entry 043 - Improve mobile navbar and Guru chat panel layout

### Date and time

```text
2026-07-19
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment tester and coding assistant
```

### Objective

Fix the mobile layout problem where a long top title could stretch the page horizontally and where the Guru AI chat panel could open partly outside the viewport with mixed scrolling behind it.

### Existing behavior

On small screens, a long navbar brand/title could force the layout wider than the phone viewport, creating extra white space on the right. The Guru chat panel also used a desktop-style popup size, a large floating button, `100vh` sizing, and automatic input focus. On mobile this could make the panel feel out of screen, trigger the keyboard too early, and allow the page behind the chat to scroll at the same time as the chat messages.

### Selected solution

The page shell now prevents horizontal overflow and the navbar brand is constrained with ellipsis on small screens. The mobile Guru chat panel now behaves more like a viewport-bounded fixed panel: it uses left/right spacing, `100dvh`, safe-area-aware bottom spacing, a smaller mobile toggle button, and message-area-only scrolling. Opening the chat adds a temporary body class to stop background scrolling, and mobile open/send flows avoid automatic input focus so the keyboard does not immediately resize the panel.

Package and published Guru widget assets were updated together so Render serves the same fixed code that exists in the local package source.

### Alternative considered

One alternative was to keep the existing desktop-like floating panel and only reduce its width. That would have been smaller, but it would not fully solve the mixed-scroll and mobile keyboard behavior. The selected change is still local to CSS/JS assets and is easier for the student team to explain than a larger widget rewrite.

### Commands executed

```powershell
php artisan test tests\Feature\ResponsiveLayoutAssetsTest.php
php -l tests\Feature\ResponsiveLayoutAssetsTest.php
composer test
npm run build
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
docker build -t phanmeeein:test .
php artisan serve --host=127.0.0.1 --port=8011
Invoke-WebRequest http://127.0.0.1:8011
```

### Test results

```text
ResponsiveLayoutAssetsTest: passed, 2 tests, 12 assertions
Full test suite: passed, 68 tests, 189 assertions
npm run build: passed
config:cache, route:cache, optimize:clear: passed
docker build -t phanmeeein:test .: passed
Local guest page request on port 8011: HTTP 200
```

### Browser check note

A Playwright screenshot attempt was made for a narrow mobile viewport, but the temporary Playwright command was not available in the local npx environment during this session. The automated asset regression test was added to keep the important mobile CSS and JS safeguards from being accidentally removed.

### Files changed

```text
public/user/css/style.css
packages/Local/AiCompanion/public/ai-companion/widget.css
packages/Local/AiCompanion/public/ai-companion/widget.js
public/vendor/ai-companion/ai-companion/widget.css
public/vendor/ai-companion/ai-companion/widget.js
tests/Feature/ResponsiveLayoutAssetsTest.php
myjournal.md
```

### Security impact

No authentication, authorization, CSRF, database, or secret-handling behavior changed.

### Performance impact

No server-side performance impact is expected. The browser receives small CSS and JavaScript layout changes only.

### Deployment impact

No migration or environment variable change is required. Render only needs to deploy the new commit. After deployment, mobile testers should hard-refresh the page or open a new private browser tab to avoid stale CSS or JavaScript.

---

## Entry 042 - Fix admin layout CSRF metadata for superadmin logout

### Date and time

```text
2026-07-19 11:55 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Investigate the reported `419` page when logging out from the superadmin/admin interface.

### Existing behavior

The user and Breeze layouts included:

```text
<meta name="csrf-token" content="...">
```

The admin layout had normal `@csrf` hidden fields on forms, including logout, but did not include the shared CSRF meta tag. That made the admin shell inconsistent with the rest of the application and harder to support for JavaScript or token refresh behavior.

### Selected solution

Add the CSRF meta tag to `resources/views/admin/layout/master.blade.php` and add a focused regression test confirming the superadmin admin page renders:

```text
csrf meta tag
logout form action
logout hidden _token input
```

### Note about stale pages

If a browser is still on an admin page loaded before a deploy or before a session refresh, the already-rendered hidden logout token can still be stale. Refresh the admin page once after the new deployment, then use Logout again.

### Commands executed

```powershell
php artisan test tests\Feature\SuperAdminAccessTest.php
php -l resources\views\admin\layout\master.blade.php
php -l tests\Feature\SuperAdminAccessTest.php
composer test
npm run build
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
docker build -t phanmeeein:test .
```

### Test results

```text
SuperAdminAccessTest: passed, 7 tests, 14 assertions
Full test suite: passed, 66 tests, 177 assertions
npm run build: passed
config:cache, route:cache, optimize:clear: passed
docker build -t phanmeeein:test .: passed
```

### Files changed

```text
resources/views/admin/layout/master.blade.php
tests/Feature/SuperAdminAccessTest.php
myjournal.md
```

### Security impact

No CSRF protection was weakened. Logout remains a POST route with a CSRF token.

### Deployment impact

No migration or environment change is required. Render only needs to deploy the new commit.

---

## Entry 041 - Verify production smoke test and document operations checklist

### Date and time

```text
2026-07-19 07:10 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Carry the post-CI release checklist forward by checking production, documenting monitoring, documenting backups, and adding a presentation-day demo checklist.

### Existing behavior

The CI workflow was green for commit `ed8ff06`, but the production smoke-test evidence and monitoring/backup steps were not yet recorded in one current checklist.

### Production checks performed

```text
Production URL: https://gurus.onrender.com
Latest green CI commit checked locally: ed8ff06
GitHub Actions run: 29661418179
```

Checks:

```text
/health: HTTP 200, status ok
database health: ok, responded in 80 ms
cache health: ok, responded in 266 ms
uploads health: skipped write test, disk s3
homepage: HTTP 200, title Phan Mee Ein
user1@gmail.com login: HTTP 302 redirect to /user/home
authenticated user home: HTTP 200
footer Help Center hook: present with data-guru-open
Guru widget: present
first-party user CSS/JS/widget assets: HTTP 200
author content page for user1@gmail.com: HTTP 200
AI session before message: HTTP 200, 0 messages
AI chat POST: HTTP 200
AI session after message: HTTP 200, 2 messages
latest saved AI message role: assistant
/admins/access-control as normal demo author: redirected to /user/home
temporary content upload with PNG image: created and visible in author content page
uploaded content image through authenticated media route: HTTP 200, image/png, 68 bytes
temporary smoke-test content cleanup: title no longer present after delete
```

The `/admin/access-control` path returned 404 because the actual Laravel route is `/admins/access-control`.

The delete cleanup command reported a final `405` after following redirects, but the content item was removed. The verification condition was the absence of the temporary title from `/auther/content`.

### Selected solution

Add:

```text
README CI badge and workflow link
docs/DEMO_CHECKLIST.md
monitoring routine in docs/PRODUCTION_OPERATIONS.md
manual backup and restore rehearsal notes in docs/PRODUCTION_OPERATIONS.md
production smoke evidence notes in docs/PRODUCTION_OPERATIONS.md
```

### Remaining manual check

Full superadmin login was not automated because the superadmin password is private and must not be guessed or recorded. The protected route was checked with a normal demo author account and correctly redirected away from access control.

### Commands executed

```powershell
git status --short
git rev-parse --short HEAD
Invoke-RestMethod https://api.github.com/repos/zor-neo/phan_mee_eain/actions/runs?per_page=1
Invoke-WebRequest https://gurus.onrender.com/health
Invoke-WebRequest https://gurus.onrender.com/
Invoke-WebRequest https://gurus.onrender.com/login
Invoke-WebRequest https://gurus.onrender.com/user/home
Invoke-WebRequest https://gurus.onrender.com/ai/session
Invoke-WebRequest https://gurus.onrender.com/ai/chat
Invoke-WebRequest https://gurus.onrender.com/auther/content
Invoke-WebRequest https://gurus.onrender.com/admins/access-control
curl.exe https://gurus.onrender.com/auther/create
curl.exe https://gurus.onrender.com/media/content/[generated-file-name]
curl.exe https://gurus.onrender.com/auther/deleteContent/Process/[generated-id]/[generated-file-name]
```

### Files changed

```text
README.md
docs/DEMO_CHECKLIST.md
docs/PRODUCTION_OPERATIONS.md
myjournal.md
```

### Security impact

No secrets were added. The demo checklist explicitly tells the team to keep superadmin credentials outside Git and documentation. The backup procedure uses placeholders only.

### Deployment impact

Documentation-only change. No migration or Render environment change is required.

### Learning outcome

The team now has a repeatable difference between:

```text
CI evidence
Render production status
application health checks
authenticated smoke tests
manual backup/recovery preparation
presentation-day demo flow
```

---

## Entry 040 - Use test-safe drivers in GitHub Actions

### Date and time

```text
2026-07-19 06:55 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Fix the third GitHub Actions failure after the Laravel tests started passing.

### Existing behavior

GitHub Actions run `29661317180` passed the `Run Laravel tests` step, then failed at `Validate Laravel caches`.

A clean Linux clone reproduced the failure during `php artisan optimize:clear`:

```text
Database file at path [/tmp/app/database/database.sqlite] does not exist
SQL: delete from "cache"
```

### Root cause

The workflow copied `.env.example`, which uses database-backed cache, queue, and session defaults. That is acceptable when the database exists and migrations have been run, but the CI cache-validation step is not meant to use application database tables.

### Selected solution

Set test-safe environment variables at the GitHub Actions application job level:

```text
APP_ENV=testing
CACHE_STORE=array
DB_CONNECTION=sqlite
DB_DATABASE=:memory:
QUEUE_CONNECTION=sync
SESSION_DRIVER=array
```

This matches the test environment and allows config/route cache validation to run without Aiven credentials or local SQLite files.

### Alternative considered

The workflow could create `database/database.sqlite` and run migrations before cache validation. That would be heavier and would still make a cache-clear check depend on database state. Test-safe nonpersistent drivers are simpler and better aligned with CI.

### Commands executed

```powershell
docker run --rm composer:2 sh -lc "git clone --depth=1 https://github.com/zor-neo/phan_mee_eain.git /tmp/app >/dev/null && cd /tmp/app && cp .env.example .env && composer install --no-interaction --prefer-dist --no-progress >/dev/null && APP_ENV=testing CACHE_STORE=array DB_CONNECTION=sqlite DB_DATABASE=':memory:' QUEUE_CONNECTION=sync SESSION_DRIVER=array php artisan key:generate --ansi && APP_ENV=testing CACHE_STORE=array DB_CONNECTION=sqlite DB_DATABASE=':memory:' QUEUE_CONNECTION=sync SESSION_DRIVER=array php artisan config:clear --ansi && APP_ENV=testing CACHE_STORE=array DB_CONNECTION=sqlite DB_DATABASE=':memory:' QUEUE_CONNECTION=sync SESSION_DRIVER=array php artisan test --stop-on-failure && APP_ENV=testing CACHE_STORE=array DB_CONNECTION=sqlite DB_DATABASE=':memory:' QUEUE_CONNECTION=sync SESSION_DRIVER=array php artisan config:cache && APP_ENV=testing CACHE_STORE=array DB_CONNECTION=sqlite DB_DATABASE=':memory:' QUEUE_CONNECTION=sync SESSION_DRIVER=array php artisan route:cache && APP_ENV=testing CACHE_STORE=array DB_CONNECTION=sqlite DB_DATABASE=':memory:' QUEUE_CONNECTION=sync SESSION_DRIVER=array php artisan optimize:clear"
```

### Test results

```text
Clean Linux clone with test-safe CI env: passed
Laravel tests: passed, 65 tests, 173 assertions
config:cache, route:cache, optimize:clear: passed
```

### Files changed

```text
.github/workflows/ci.yml
myjournal.md
```

### Security impact

The workflow still uses no production secrets. It explicitly avoids managed database credentials.

### Deployment impact

No Render environment change is required. The change only affects GitHub Actions.

---

## Entry 039 - Disable Vite manifest dependency during tests

### Date and time

```text
2026-07-19 06:40 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Fix the second GitHub Actions failure in the Laravel test step.

### Existing behavior

The pushed CI repair for demo seed configuration reached GitHub Actions, but the new run still failed at `Run Laravel tests`.

A clean Linux clone reproduced the failure:

```text
Vite manifest not found at: /tmp/app/public/build/manifest.json
```

The failure happened when auth tests rendered Breeze guest layout views before the CI workflow had run `npm run build`.

### Root cause

Local testing passed because `public/build/manifest.json` already existed from previous frontend builds. A clean GitHub checkout correctly starts without generated build assets. Some backend feature tests render views that contain `@vite`, so Laravel tried to load a manifest that had not been generated yet.

### Selected solution

Call Laravel's `withoutVite()` helper from the shared test base class:

```text
tests/TestCase.php
```

This keeps backend response tests focused on Laravel behavior. The workflow still runs `npm run build` later as a separate frontend validation step, so real asset build failures are still caught.

### Alternative considered

Moving `npm ci` and `npm run build` before `php artisan test` would also provide the manifest. That would make every backend test run depend on frontend build time and Node availability. Disabling Vite in the test base is a cleaner fit because the tests are not asserting compiled asset contents.

### Commands executed

```powershell
docker run --rm composer:2 sh -lc "git clone --depth=1 https://github.com/zor-neo/phan_mee_eain.git /tmp/app && cd /tmp/app && cp .env.example .env && composer install --no-interaction --prefer-dist --no-progress && php artisan key:generate --ansi && php artisan config:clear --ansi && php artisan test --stop-on-failure"
php artisan optimize:clear
php artisan test --stop-on-failure
npm run build
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
php -l tests\TestCase.php
```

### Test results

```text
Clean Linux clone before fix: failed because public/build/manifest.json was missing
Laravel tests with public/build temporarily moved aside: passed, 65 tests, 173 assertions
npm run build: passed
config:cache, route:cache, optimize:clear: passed
PHP syntax check: passed
```

### Files changed

```text
tests/TestCase.php
myjournal.md
```

### Security impact

No security-sensitive runtime behavior changed. The change applies only during automated tests.

### Deployment impact

No migration or Render environment change is required. The next push should let the Laravel test job proceed without requiring prebuilt Vite assets.

---

## Entry 038 - Fix CI demo seeder environment handling

### Date and time

```text
2026-07-19 06:20 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Repair the first GitHub Actions run after CI was added.

### Existing behavior

GitHub Actions run `29660300222` failed in the `Laravel tests and frontend build` job at the `Run Laravel tests` step. Public job metadata was visible through the GitHub API, but raw logs required authenticated access.

The same failure was reproduced in a clean Linux container. The failing assertion was in `DatabaseSeederTest`, where the demo author password expected by the test did not match the seeded password.

### Root cause

The seeders read demo passwords directly with `env()`, while the feature test changed values with `putenv()`. That was fragile across environments. Laravel's normal practice is to read environment variables through configuration files and let application code read `config()`.

### Selected solution

Add `config/demo.php` for controlled demo seed passwords and update seeders to read:

```text
config('demo.superadmin_password')
config('demo.author_password')
```

The tests now set those config keys directly, which makes the behavior consistent on local Windows, Linux containers, and GitHub Actions.

### Alternative considered

The workflow could have been changed to export `DEMO_AUTHOR_PASSWORD` before running tests. That would only fix this one CI run and leave the seeders using direct `env()` calls. Moving the values into configuration better matches Laravel conventions and is easier for the student team to explain.

### Commands executed

```powershell
php artisan test tests\Feature\DatabaseSeederTest.php
docker run --rm -v C:\Users\kaung\AppData\Local\Temp\phan-ci-a04de8e4bd48410daf0971625570b96a:/app -w /app composer:2 sh -lc "php artisan key:generate --ansi && php artisan config:clear --ansi && php artisan test --stop-on-failure"
composer test
npm run build
php -l config\demo.php
php -l database\seeders\DatabaseSeeder.php
php -l database\seeders\DemoLearningContentSeeder.php
php -l tests\Feature\DatabaseSeederTest.php
```

### Test results

```text
DatabaseSeederTest: passed, 2 tests, 10 assertions
Clean Linux container test run: passed, 65 tests, 173 assertions
composer test: passed, 65 tests, 173 assertions
npm run build: passed
PHP syntax checks: passed
```

### Files changed

```text
config/demo.php
database/seeders/DatabaseSeeder.php
database/seeders/DemoLearningContentSeeder.php
tests/Feature/DatabaseSeederTest.php
myjournal.md
```

### Security impact

No secrets were added. The config file defines environment variable names only. Real passwords must remain in `.env`, Render environment variables, or a secure operator-managed place.

### Deployment impact

No migration is required. The fix affects demo seeding and automated tests only. The next push should trigger GitHub Actions again and allow Render to use a commit with a passing CI baseline.

### Learning outcome

The team learned why Laravel application code should normally read configuration through `config()` instead of calling `env()` directly. Configuration keeps behavior stable after caching and makes tests easier to control.

---

## Entry 037 - Add GitHub Actions CI workflow

### Date and time

```text
2026-07-19 05:35 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Add a GitHub Actions workflow so pushes and pull requests to `main` are checked before they are treated as deploy-ready.

### Existing behavior

Render could deploy from GitHub, and local tests/builds were being run manually. The repository did not yet have a project-owned `.github/workflows` CI file.

### Selected solution

Add `.github/workflows/ci.yml` with two jobs:

* Application job: PHP 8.4, Node 22, Composer install, Laravel tests, config cache, route cache, optimize clear, npm install, Vite build.
* Docker job: build the production Docker image after the application job passes.

The workflow uses the existing `phpunit.xml` testing configuration, which points tests at in-memory SQLite and avoids using Aiven credentials in CI.

### Alternative considered

A smaller CI workflow could run only `php artisan test`, but that would miss frontend build failures and Dockerfile regressions. A fuller workflow better supports the Render deployment path while still remaining understandable for the student team.

### Commands executed

```powershell
composer test
npm run build
composer validate --no-check-publish
git diff --check
docker build -t phanmeeein:test .
```

### Test results

```text
composer test: passed, 65 tests, 173 assertions
npm run build: passed
composer validate --no-check-publish: valid with warning about local/ai-companion @dev path dependency
git diff --check: passed, only line-ending warnings for existing Markdown files
docker build -t phanmeeein:test .: first attempt failed because Docker could not resolve api.github.com; retry passed
```

### Files changed

```text
.github/workflows/ci.yml
README.md
docs/PRODUCTION_OPERATIONS.md
PROJECT_SPEC.md
myjournal.md
```

### Security impact

The workflow does not use production secrets. Tests use SQLite memory through `phpunit.xml`, and the workflow copies `.env.example` only for local CI bootstrapping.

### Deployment impact

Future pushes and pull requests to `main` will run automated checks on GitHub. Render auto-deploy can still deploy from `main`, but CI now provides visible evidence for test and Docker build status.

---

## Entry 036 - Add production operations and recovery guide

### Date and time

```text
2026-07-19 05:15 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Production smoke tester and coding assistant
```

### Objective

Create a clear production operations guide for the Render, Aiven, R2, and AI-chat setup so the team has one safe checklist for deployment verification and recovery.

### Existing behavior

Operational notes were spread across chat, README snippets, and journal entries. The team had working production pieces, but no single checklist for:

* Render environment expectations
* Health checks
* Smoke testing
* Aiven user/content audits
* Demo data repair
* Dangerous database commands
* R2 image troubleshooting
* AI chat memory checks

### Selected solution

Add `docs/PRODUCTION_OPERATIONS.md` and link it from the README. The guide documents safe commands using placeholders only and avoids recording secrets. `PROJECT_SPEC.md` was updated so maintaining an operations and recovery checklist is explicitly part of the Render deployment phase.

### Alternative considered

Putting all operations notes directly into `README.md` would be simpler initially, but the README is already serving setup and overview purposes. A dedicated docs file keeps production procedures easier to find and less likely to be buried under general Laravel text.

### Commands executed

```powershell
git diff --check
rg -n "password=|DB_PASSWORD=|AWS_SECRET_ACCESS_KEY=|GEMINI_API_KEY|APP_KEY=|SECRET|TOKEN|REDACTED|AIVEN_HOST|R2" docs\PRODUCTION_OPERATIONS.md README.md PROJECT_SPEC.md myjournal.md
```

### Files changed

```text
docs/PRODUCTION_OPERATIONS.md
README.md
PROJECT_SPEC.md
myjournal.md
```

### Security impact

The guide uses placeholders such as `[REDACTED]`, `[AIVEN_HOST]`, and `[R2_BUCKET_NAME]`. No secrets, passwords, access tokens, private certificates, or complete connection strings were documented.

### Deployment impact

No runtime behavior changed. The new guide supports safer Render/Aiven/R2 operation and explains which commands are safe or dangerous during production repair.

---

## Entry 035 - Add expandable long-content previews

### Date and time

```text
2026-07-19 04:55 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: UI tester and coding assistant
```

### Objective

Fix long content previews that were visually cut off or hard-truncated inside content cards by adding a clear See more / See less expansion control.

### Existing behavior

The reader content page used `Str::words()` and `str_word_count()` to decide whether to show the expansion button. That works for English text with spaces, but it is unreliable for Myanmar or other long text without normal word spacing. The author content list also showed only a hard 50-word preview and did not allow expanding the text.

### Alpine.js note

The old reader content page used Alpine-style attributes such as `x-data`, `x-show`, and `x-cloak`. Alpine itself was not the main data problem. The larger problem was consistency:

* The reader layout loaded Alpine from a CDN.
* The author layout did not load Alpine.
* The local Vite `resources/js/app.js` also starts Alpine, but these legacy user/author layouts do not rely on the Vite bundle in the same way.
* The old long-content decision used `str_word_count()`, so Myanmar or other long text without normal spaces could fail to show the expansion button even when the content was visually too long.

Because the feature needed to work in both reader and author views, the final fix used small plain JavaScript attached to `data-*` attributes instead of adding another Alpine dependency to the author layout.

### Selected solution

Use character-based preview limits and a small plain JavaScript toggle:

* Reader cards show a preview first and can expand to full text.
* Author content cards show a preview first and can expand to full text.
* Expanded text preserves line breaks.
* Long unspaced text wraps inside the card instead of overflowing horizontally.

### Alternative considered

Keeping the existing Alpine-based reader toggle would require only a small adjustment, but the author page does not load Alpine. A plain JavaScript toggle is easier for the student team to understand and works in both affected views.

### Commands executed

```powershell
php artisan test tests\Feature\ExpandableContentTest.php
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
git diff --check
```

### Test results

```text
ExpandableContentTest: passed, 2 tests, 6 assertions
config:cache: passed
route:cache: passed
optimize:clear: passed
git diff --check: passed
```

### Files changed

```text
resources/views/user/home/contentPage.blade.php
resources/views/auther/home/contents.blade.php
tests/Feature/ExpandableContentTest.php
myjournal.md
```

### Security impact

No database or authorization behavior changed. Content is still escaped by Blade before display.

### Deployment impact

No migration is required. Render only needs to redeploy the Blade and test changes.

---

## Entry 034 - Repair Aiven user and demo data consistency

### Date and time

```text
2026-07-19 04:25 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Fix the Aiven database inconsistency where demo users, superadmin, categories, and content were missing or could become inconsistent after profile edits.

### Existing behavior

The active MySQL database connection pointed to Aiven `defaultdb`. A read-only audit found:

```text
users: 0
categories: 0
contents: 0
```

The legacy user profile update controller also forced non-superadmin accounts back to `role=user`, which meant an author or admin could lose access after saving profile information.

### Selected solution

Apply two small fixes:

* Preserve the current role during user profile updates.
* Detect superadmin by the `superadmin` role helper instead of exact email/name text.
* Make `DatabaseSeeder` idempotent and call `DemoLearningContentSeeder`.

This allows `php artisan db:seed --force` to repair the production demo data without wiping tables.

### Commands executed

```powershell
php artisan migrate:status
php artisan test tests\Feature\DatabaseSeederTest.php
php artisan test tests\Feature\UserProfileRoleTest.php tests\Feature\SuperAdminAccessTest.php
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
git diff --check
docker build -t phanmeeein:test .
php artisan db:seed --force
php artisan tinker --execute="[read-only database audit]"
```

### Test and audit results

```text
migrate:status: all migrations ran on Aiven
DatabaseSeederTest: passed, 2 tests, 10 assertions
UserProfileRoleTest: passed, 2 tests, 8 assertions
SuperAdminAccessTest: passed, 6 tests, 10 assertions
config:cache: passed
route:cache: passed
optimize:clear: passed
git diff --check: passed, only line-ending warning for existing journal Markdown
docker build -t phanmeeein:test .: passed
Aiven after repair: 1 superadmin, 3 authors, 10 categories, 30 contents
Content split: 10 education records and 20 article records
```

### Files changed

```text
app/Http/Controllers/UserProfileController.php
resources/views/user/home/editProfile.blade.php
database/seeders/DatabaseSeeder.php
tests/Feature/UserProfileRoleTest.php
tests/Feature/DatabaseSeederTest.php
.env.example
README.md
myjournal.md
```

### Security impact

No secrets or password values were committed. Environment variables are documented as placeholders only. Superadmin behavior now depends on the stored role value rather than a hard-coded email/name match.

### Deployment impact

No migration is required. Render should redeploy the code fix. Demo data can be repaired with a controlled `php artisan db:seed --force` command after migrations.

---

## Entry 033 - Add production health check endpoint

### Date and time

```text
2026-07-19 03:40 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Improve production monitoring and error visibility with a small zero-budget health endpoint suitable for Render and manual operator checks.

### Existing behavior

Laravel already exposed the built-in `/up` endpoint through `bootstrap/app.php`. That endpoint is useful for checking whether the application process can boot, but it does not show whether the database, cache, or upload-storage configuration is healthy.

### Selected solution

Keep `/up` as the lightweight platform health check and add `/health` as a JSON operator endpoint. The new endpoint checks:

* Application boot
* Database response
* Cache write/read/delete
* Upload disk configuration
* Optional upload disk write/delete when `HEALTH_CHECK_STORAGE_WRITE=true`

The storage write check is disabled by default to avoid adding R2 traffic on every uptime probe.

### Alternative considered

A third-party monitoring tool such as Sentry or a paid uptime monitor could provide richer alerts, but it would add another service and setup burden. The Laravel-native endpoint is easier for the student team to explain and works with Render logs today.

### Commands executed

```powershell
php -l app\Http\Controllers\HealthCheckController.php
php -l config\health.php
php artisan route:list --path=health
php artisan config:cache
php artisan route:cache
php artisan test tests\Feature\HealthCheckTest.php
php artisan test
php artisan optimize:clear
git diff --check
docker build -t phanmeeein:test .
```

### Test results

```text
HealthCheckController syntax: passed
health.php syntax: passed
HealthCheckTest: passed, 3 tests, 13 assertions
route:list --path=health: passed, /health route registered
config:cache: passed
route:cache: passed
optimize:clear: passed
git diff --check: passed, only line-ending warnings for existing Markdown files
docker build -t phanmeeein:test .: passed
php artisan test: timed out after 124 seconds before returning a final result
```

### Files changed

```text
app/Http/Controllers/HealthCheckController.php
config/health.php
routes/web.php
.env.example
README.md
PROJECT_SPEC.md
tests/Feature/HealthCheckTest.php
resources/views/user/home/suggestion.blade.php
myjournal.md
```

### Security impact

The endpoint returns high-level statuses only. It does not expose secrets, database hostnames, credentials, full exception messages, stack traces, or filesystem paths. `/health` is public so Render or an uptime checker can call it, but storage write checks stay disabled unless explicitly enabled.

### Deployment impact

No migration is required. Render can continue using `/up` for its health check. Operators can open `/health` after deployment to verify database/cache/upload configuration.

---

## Entry 032 - Resolve Composer and npm security advisories

### Date and time

```text
2026-07-19 03:20 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Review and resolve the Composer and npm security advisories reported during Docker builds.

### Existing behavior

Composer reported three medium advisories affecting `guzzlehttp/guzzle` and `guzzlehttp/psr7`. npm reported one low `esbuild` advisory and critical `shell-quote` exposure through development tooling.

### Selected solution

Apply focused dependency lockfile updates instead of a broad framework or frontend upgrade:

* `guzzlehttp/guzzle` updated from `7.11.1` to `7.15.1`.
* `guzzlehttp/psr7` updated from `2.11.0` to `2.13.0`.
* Related Composer patch dependencies were refreshed.
* npm development tooling was refreshed so `concurrently` uses a patched `shell-quote` and Vite uses patched `esbuild`.

### Alternative considered

A broad `composer update` or major npm upgrade could also remove advisories, but it would risk unrelated behavior changes. The focused update is safer for the student project and easier to explain.

### Commands executed

```powershell
composer audit
npm audit --json
composer update guzzlehttp/guzzle guzzlehttp/psr7 --with-dependencies --no-interaction
npm update concurrently vite --save-dev
npm audit fix
npm audit
npm run build
php artisan test
docker build -t phanmeeein:test .
```

### Files changed

```text
composer.lock
package-lock.json
myjournal.md
```

### Test results

```text
composer audit: No security vulnerability advisories found.
npm audit: found 0 vulnerabilities.
npm run build: passed.
php artisan test: 56 tests passed, 136 assertions.
docker build -t phanmeeein:test .: passed.
```

### Security impact

Known Composer and npm audit advisories are resolved in the lockfiles used by Render and Docker builds. No secrets or credentials were changed.

### Deployment impact

Render will install the patched dependency versions from the updated lockfiles on the next deployment. No database migration is required.

---

## Entry 031 - Fix account dropdown avatar and email overflow

### Date and time

```text
2026-07-19 03:05 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: UI reviewer and coding assistant
```

### Objective

Fix the account dropdown/profile tab where uploaded thumbnails could appear disproportionate and long email addresses could overflow outside the dropdown.

### Existing behavior

The user dropdown used Bootstrap `row`, `col-4`, and `offset-1` classes inside a compact dropdown header. This gave the avatar and email text unstable space, especially when the email was long.

### Selected solution

Replace the dropdown header grid with a small flex layout and add shared account-menu CSS:

* Avatar size is pinned to a 40px square/circle with `object-fit: cover`.
* The account text column has `min-width: 0` and controlled overflow.
* Long email addresses truncate inside the dropdown and keep the full value in the `title` attribute.

### Files changed

```text
public/user/css/style.css
resources/views/user/layout/master.blade.php
resources/views/admin/layout/master.blade.php
```

### Security impact

No security-sensitive behavior changed. No secrets or credentials were added.

### Deployment impact

The fix is a Blade/CSS-only change. A normal Render redeploy is enough.

---

## Entry 030 - Configure persistent R2-backed upload storage

### Date and time

```text
2026-07-19 02:30 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment operator and coding assistant
```

### Objective

Move user-uploaded profile images, content images, and content resources away from Render's temporary container filesystem and onto Cloudflare R2 using Laravel's filesystem abstraction.

### Existing behavior

Profile images were stored in `public/profile`, content images were stored in `public/content`, and uploaded resources were stored through the local Laravel disk. This works on a laptop but is not reliable on Render because container files are not persistent across deploys or restarts.

### Selected solution

Add the Laravel S3 filesystem adapter and introduce a small `UploadedMedia` helper. Controllers now store new uploads through the configured uploads disk. In production, Render should set `UPLOADS_DISK=s3` and provide Cloudflare R2 variables. Uploaded images are served through an authenticated Laravel media route, so the R2 bucket can remain private for the MVP.

During verification, the test suite exposed an existing route-loading problem: `routes/web.php` used `require_once` for `user.php` and `admin.php`, so repeated Laravel application rebuilds in one PHP process skipped those route files. The route imports now use normal `require`. The author comment page route was also tightened from `comment/{para?}` to `comment` so `GET /auther/comment/mark-seen` cannot accidentally render the comments page.

### Alternative considered

A public R2 bucket or custom R2 domain could serve images directly from Cloudflare. That can reduce app bandwidth later, but it requires additional public-access configuration. The private-bucket Laravel streaming approach is simpler and safer for the current student deployment.

### Commands executed

```powershell
composer require league/flysystem-aws-s3-v3:^3.0 --no-interaction
rg -n "public_path\(|asset\('(profile|content)/|Storage::disk\('local'|move\(public_path" app resources routes config composer.json README.md myjournal.md
php artisan test tests\Feature\UploadedMediaTest.php
php artisan test
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
docker build -t phanmeeein:test .
```

### Files changed

```text
composer.json
composer.lock
.env.example
README.md
PROJECT_SPEC.md
config/filesystems.php
routes/user.php
routes/web.php
app/Support/UploadedMedia.php
app/Http/Controllers/MediaController.php
app/Http/Controllers/UserProfileController.php
app/Http/Controllers/Admin/AdminController.php
app/Http/Controllers/Auther/AutherProfileController.php
app/Http/Controllers/ContentController.php
resources/views/... profile and content image references
tests/Feature/UploadedMediaTest.php
tests/Feature/StateChangingRouteVerbTest.php
```

### Security impact

No secrets were committed. The R2 bucket can stay private. Image delivery goes through the authenticated Laravel app route, and uploaded resource downloads continue to require an authenticated request.

### Deployment impact

Render must include `FILESYSTEM_DISK=s3`, `UPLOADS_DISK=s3`, the R2 access key ID, secret access key, bucket name, endpoint, `AWS_DEFAULT_REGION=auto`, and `AWS_USE_PATH_STYLE_ENDPOINT=true`. `AWS_URL` should remain empty unless a public R2 custom domain is added later.

### Remaining work

Existing local-only uploads already stored under `public/profile`, `public/content`, or `storage/app/private/content-resources` are not automatically copied to R2. Users can re-upload those files, or a future migration script can copy known local files into the bucket.

Composer validation is clean in normal mode but strict mode still warns about the existing local `local/ai-companion` `@dev` path package. Docker build also reported existing Composer and npm dependency advisories. Those should be reviewed in a separate dependency-security task instead of being mixed into this storage change.

---

## Entry 029 - Display content images proportionately

### Date and time

```text
2026-07-19 01:40 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: UI reviewer and coding assistant
```

### Objective

Fix content/default images that appeared unnaturally cropped because long horizontal images were forced into fixed-height thumbnails with `object-fit: cover`.

### What changed

```text
resources/views/user/home/contentPage.blade.php
resources/views/auther/home/contents.blade.php
public/user/css/style.css
myjournal.md
```

A reusable `sw-content-image` class was added and applied to user-facing and author-facing content thumbnails.

The class uses:

```text
aspect-ratio: 16 / 9
object-fit: contain
max-height: 240px
neutral background
small padding
```

This preserves image proportions while keeping card layout stable.

### Alternative considered

Leaving `object-fit: cover` keeps all thumbnails visually filled, but it crops default/logo-style images badly. `object-fit: contain` is a better fit for this project because seeded/default images need to remain recognizable.

### Verification

```text
php artisan view:clear: passed
php artisan test: 53 passed, 130 assertions
```

### Result

```text
Completed
```

---

## Entry 028 - Seed Aiven demo authors, categories, and learning content

### Date and time

```text
2026-07-19 01:30 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Product data requester and coding assistant
```

### Objective

Create a repeatable database seeder and populate Aiven with richer demo learning content:

```text
- 3 dummy author accounts
- 10 categories
- 1 educational content item per category
- 2 article content items per category
```

Requested topic coverage included languages, technology, Myanmar culture, economics in Southeast Asia, sport science, computer science, Myanmar food preparation, tourism guides, and related learning topics.

### Starting state

The active database was Aiven MySQL. Earlier emergency starter categories existed, but there was no formal seeder for the requested larger demo dataset.

### What changed

```text
database/seeders/DemoLearningContentSeeder.php
myjournal.md
```

The new seeder is idempotent:

```text
- Existing demo users are reused and promoted to author.
- Missing demo users are created without recording a password in source control.
- Existing "Language" category is renamed to "Languages".
- Existing "Science" starter category is reused as "Sport Science".
- Categories are created if missing.
- Content rows are update-or-created by title and category.
```

### Categories seeded

```text
Languages
Technology
Myanmar Culture
Southeast Asian Economics
Sport Science
Computer Science
Myanmar Food Preparation
Tourism Guides
General Knowledge
Study Skills
```

### Commands executed

```powershell
php -l database\seeders\DemoLearningContentSeeder.php
php artisan about --only=drivers
php artisan db:seed --class=DemoLearningContentSeeder
php artisan tinker --execute="..."
php artisan cache:clear
php artisan test
```

The first seed command timed out after partially inserting two categories worth of content. Because the seeder is idempotent, it was safely rerun with a longer timeout and completed successfully.

### Verification

Aiven verification showed:

```text
authors: 3
categories: 10
contents: 30
educational contents: 10
articles: 20
```

Each category was verified to contain:

```text
1 educational content item
2 article content items
```

The Laravel test suite passed:

```text
53 tests passed
130 assertions
```

### Security impact

No secrets or password hashes were committed. The seeder supports `DEMO_AUTHOR_PASSWORD` for environments that need to create missing demo authors with a known password, but existing Aiven demo accounts retained their current passwords.

### Performance impact

The seed operation is heavier over Aiven than local SQLite/MySQL because it performs multiple remote database writes. It should be run as a controlled setup/demo-data step, not during normal container startup.

### Result

```text
Completed
```

---

## Entry 027 - Restore Aiven starter categories

### Date and time

```text
2026-07-19 01:17 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment tester and coding assistant
```

### Objective

Restore category data after the user reported that categories had disappeared from the deployed application.

### Starting state

The active Laravel database connection was Aiven MySQL. Checks showed:

```text
categories: 0
contents: 0
```

The project routes show category management is under the admin route group:

```text
GET    category/page
POST   category/Process
DELETE category/delete/{id}
```

This means category management is available to admin-role users, including superadmin, but it is not superadmin-only.

### What was done

Because the repo did not contain an authoritative category seed list and there were no content rows to preserve, a neutral starter set was restored:

```text
General Knowledge
Science
Technology
Language
Study Skills
```

### Verification

After restoration, Aiven returned five category rows.

Laravel cache was cleared after the data repair.

### Security impact

No secrets were changed. This was a demo/application data repair only.

### Result

```text
Completed
```

---

## Entry 026 - Restore Aiven superadmin account

### Date and time

```text
2026-07-19 01:14 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment tester and coding assistant
```

### Objective

Restore the superadmin account after the user reported that it was missing from the deployed/Aiven database.

### Starting state

The configured Laravel database connection was MySQL. A check against the active database showed that `superadmin@gmail.com` did not exist.

### What was done

The superadmin account was recreated through Laravel using `User::updateOrCreate()` and `Hash::make()`.

```text
email: superadmin@gmail.com
role: superadmin
```

The account password was not recorded in this journal.

### Verification

After restoration, the account was verified to:

```text
exist: true
role: superadmin
is_superadmin: true
password_check: true
```

The Laravel cache table was cleared to remove possible login rate-limit entries from earlier failed attempts.

### Security impact

This was a demo/admin data repair. No password, password hash, database credential, or connection string was committed to source control.

The superadmin password should be changed after successful login if this deployment will remain publicly reachable.

### Result

```text
Completed
```

---

## Entry 025 - Restore Aiven demo user login accounts

### Date and time

```text
2026-07-19 01:10 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment tester and coding assistant
```

### Objective

Repair the demo login account after the user reported that the first demo user could not log in on the deployed application.

### Starting state

The Laravel app was connected to Aiven MySQL. A check against the configured Aiven database showed that `user1@gmail.com` did not exist, so authentication could not succeed.

### What was done

The three demo user accounts were restored in Aiven using Laravel's `User::updateOrCreate()` and `Hash::make()` helpers.

```text
user1@gmail.com
user2@gmail.com
user3@gmail.com
```

The shared demo password was not recorded in this journal.

### Commands executed

```powershell
php artisan about --only=environment,drivers
php artisan tinker --execute="..."
php artisan cache:clear
```

### Verification

The configured database connection was confirmed as Aiven MySQL.

`user1@gmail.com` was verified to:

```text
exist: true
role: user
password_check: true
```

The Laravel cache table was cleared to remove possible login rate-limit entries from failed attempts.

### Security impact

This was a demo-data repair only. No production secrets or password hashes were committed to source control.

### Result

```text
Completed
```

---

## Entry 024 - Fix Render HTTPS, CSS, footer, and auth form deployment issues

### Date and time

```text
2026-07-19 00:36 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Deployment tester and coding assistant
```

### Objective

Respond to Render deployment issues reported by the user:

```text
- UI appeared abnormally large and overflowed.
- CSS appeared broken.
- Recent footer text did not appear on the deployed visible page.
- Authentication fields were rejected by the platform/browser as insecure.
```

### Root causes identified

Render terminates HTTPS before traffic reaches the Docker container. Without trusted proxy headers and HTTPS-aware URL generation, Laravel can generate insecure URLs behind the proxy.

Several layouts also depended on external Bootstrap CDN links. If those external CSS or integrity checks fail, pages can render without Bootstrap and appear very large or broken.

The deployed first page normally uses the guest footer, while the previous footer contact change had only been applied to the authenticated user layout.

The custom login/register views used `type="text"` for email fields and did not include complete browser-friendly authentication field attributes.

### What changed

```text
bootstrap/app.php
app/Providers/AppServiceProvider.php
.env.example
README.md
resources/views/Login/login.blade.php
resources/views/Login/register.blade.php
resources/views/admin/layout/master.blade.php
resources/views/auther/layout/master.blade.php
resources/views/static/layout.blade.php
resources/views/user/guest/guestUser.blade.php
resources/views/user/layout/master.blade.php
myjournal.md
```

The app now trusts forwarded proxy headers using Laravel middleware configuration.

In production, when `APP_URL` starts with `https://`, Laravel forces HTTPS URL generation.

Main layouts now use the local Bootstrap assets already stored under `public/user/vendor1/...` instead of external Bootstrap CDN URLs.

A typo in one admin Bootstrap script path was fixed from `verdor1` to `vendor1`.

The guest and admin footer contact/legal text now matches the updated user footer.

Custom login/register forms now use:

```text
type="email"
autocomplete="username"
autocomplete="current-password"
autocomplete="new-password"
required
```

Small responsive guards were added to the custom login/register card layout so it cannot exceed the viewport width.

### Deployment configuration reminder

Render must use:

```text
APP_URL=https://[RENDER_APP_HOST]
TRUSTED_PROXIES=*
SESSION_SECURE_COOKIE=true
```

### Commands executed

```powershell
php -l bootstrap\app.php
php -l app\Providers\AppServiceProvider.php
php artisan view:clear
php artisan optimize:clear
php artisan test
docker build -q -t phanmeeein:test .
docker run -d --name phanmeeein-smoke -p 8081:8080 --env-file .env -e PORT=8080 -e APP_ENV=production -e APP_URL=https://phanmee-test.onrender.com -e TRUSTED_PROXIES=* -e SESSION_SECURE_COOKIE=true phanmeeein:test
Invoke-WebRequest http://127.0.0.1:8081/guest
Invoke-WebRequest http://127.0.0.1:8081/login
docker rm -f phanmeeein-smoke
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
```

### Test results

```text
PHP syntax checks: passed
php artisan test: 53 passed, 130 assertions
docker build: passed
Docker HTTPS proxy smoke test /guest: HTTP 200
Docker HTTPS proxy smoke test /login: HTTP 200
Rendered /guest CSS and JS URLs: https://...
Rendered /login form action: https://...
Rendered /login email field: type="email", autocomplete="username"
Rendered /guest footer: www.gurus.com and support@gurus.com visible
config:cache, route:cache, optimize:clear: passed
```

One test run failed during verification because cache commands were accidentally run in parallel with the test suite. After clearing caches and rerunning the tests sequentially, the full test suite passed.

### Security impact

This change reduces mixed-content and insecure-form risk on Render by trusting forwarded HTTPS headers and requiring HTTPS URL generation in production when `APP_URL` is HTTPS.

No secrets were added.

### Performance impact

Serving Bootstrap from local app assets avoids relying on external Bootstrap CDN availability during production rendering. No database or AI performance behavior changed.

### Result

```text
Completed
```

---

## Entry 023 - Open Guru chat from footer Help Center links

### Date and time

```text
2026-07-19 00:07 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Change the authenticated footer Help Center links so they open the existing Guru AI chat pane instead of showing placeholder text.

### Starting state

The user and admin footers showed Help Center placeholder text. The Guru widget could be opened by its floating button, but its open function was private inside the widget JavaScript.

### What changed

```text
resources/views/user/layout/master.blade.php
resources/views/admin/layout/master.blade.php
packages/Local/AiCompanion/public/ai-companion/widget.js
public/vendor/ai-companion/ai-companion/widget.js
myjournal.md
```

The footer chat icon and Help Center text now use:

```text
data-guru-open
```

The widget JavaScript now listens for clicks on that attribute, opens the chat pane, loads the session if needed, and focuses the input.

It also exposes a small browser API:

```text
window.GuruChat.open()
window.GuruChat.close()
window.GuruChat.toggle()
```

### Alternative considered

A direct inline `onclick` handler could have opened the widget, but that would mix behavior into Blade markup and make future reuse harder. A data attribute keeps the footer simple and lets the widget own its own behavior.

### Security impact

No new endpoint or permission path was added. The existing AI routes remain protected by the current Laravel middleware.

### Test plan

```text
- Clear views.
- Confirm Blade templates compile.
- Run the Laravel test suite.
- Manually click Help Center after starting the local app.
```

### Result

```text
Completed
```

---

## Entry 022 - Add Docker setup for Render deployment

### Date and time

```text
2026-07-19 00:03 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Prepare the main Laravel application for Render deployment by adding a production Docker image, Apache public-directory configuration, startup script, Docker ignore rules, and README deployment notes.

### Starting state

The repository did not yet contain a Dockerfile. The Laravel app had already been pointed at Aiven MySQL locally, migrations had been applied, demo accounts existed, and the user had manually confirmed login, promotion, and AI chat flow.

### What changed

```text
Dockerfile
.dockerignore
docker/apache/000-default.conf
docker/render-start.sh
README.md
.env.example
myjournal.md
```

The Dockerfile now:

```text
- Builds Vite assets in a Node stage.
- Installs production Composer dependencies in a Composer stage.
- Runs the application on php:8.4-apache.
- Enables required PHP extensions for the current Laravel app.
- Serves only the public directory.
- Uses the PORT environment variable expected by Render.
- Creates writable Laravel storage and cache directories.
- Does not run database migrations automatically during container startup.
```

The Docker ignore file excludes local environment files, local dependencies, logs, generated caches, and other development-only files from the Docker build context.

The Render startup script clears runtime Laravel caches and starts Apache in the foreground. It also unsets `MYSQL_ATTR_SSL_CA` when the configured certificate path does not exist inside the container. This prevents a local Windows-only CA path from breaking Linux container smoke tests. Production should either omit that variable or provide a real in-container certificate path.

### Issue found during smoke testing

The first production-style container failed because Laravel tried to load `Laravel\Pail\PailServiceProvider`, which is a development dependency excluded by `composer install --no-dev`.

Root cause:

```text
Local generated files in bootstrap/cache were copied into the image and still referenced dev-only packages.
```

Fix:

```text
bootstrap/cache/* is now excluded from the Docker build context except .gitignore.
The Dockerfile copies the production-generated bootstrap cache from the Composer build stage.
```

### Commands executed

```powershell
php artisan test
npm run build
php artisan config:cache
php artisan route:cache
php artisan optimize:clear
docker build -q -t phanmeeein:test .
docker run -d --name phanmeeein-smoke -p 8081:8080 --env-file .env -e PORT=8080 phanmeeein:test
Invoke-WebRequest -Uri http://127.0.0.1:8081 -UseBasicParsing -MaximumRedirection 5
docker logs --tail 80 phanmeeein-smoke
docker stop phanmeeein-smoke
docker rm phanmeeein-smoke
```

### Test results

```text
php artisan test: 53 passed, 130 assertions
npm run build: passed
php artisan config:cache: passed
php artisan route:cache: passed
php artisan optimize:clear: passed
docker build -q -t phanmeeein:test .: passed
Docker smoke test: HTTP 200 after redirect to /guest
```

### Security impact

No secrets were added to source control. `.env`, `.env.*`, local Composer authentication files, logs, and local dependency directories are excluded from the Docker image context.

Render environment variables must be configured in the Render dashboard, not committed to the repository.

### Deployment impact

The main Laravel app is now ready to create a Render Web Service using Docker. Database migrations remain a controlled release step and are not executed automatically at container startup.

The current app still uses local filesystem paths for some uploaded profile/content files. On Render, that storage is temporary until Cloudflare R2 or another S3-compatible object store is configured.

### Performance impact

No runtime optimization was added. The deployment image installs production dependencies and builds frontend assets ahead of runtime, which avoids development server overhead in Render.

### Cost impact

No new paid service was added by this repository change. Render and Aiven usage remain subject to their configured plan limits.

### Result

```text
Completed
```

### Next recommended step

Commit the Docker deployment files, push the branch, create a Render Web Service from the repository, set the required environment variables, and run Laravel migrations as a controlled release step.

---

## Entry 021 - Manual Aiven AI flow verification

### Date and time

```text
2026-07-18 23:35 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Project user and Codex
Role: Manual tester and coding assistant
```

### Objective

Record the manual verification result after pointing the Laravel app to Aiven MySQL and testing the Guru AI flow.

### Starting state

Aiven MySQL was configured as the active Laravel database. The AI memory tables had been created, demo users existed, and the superadmin role/access-control work was available locally.

### Manual verification performed

The user reported:

```text
- User login works.
- Promotion path works.
- AI flow works.
- AI chat latency is noticeably higher compared with local database usage.
```

### Performance observation

The noticeable latency is expected because each AI chat now uses managed MySQL over the network instead of a local database/session-only path. The Gemini API call is still likely the largest part of total chat time, but cross-region database access can add visible delay.

Exact timings were not measured in this pass.

### Result

```text
Completed
```

### Remaining issues

Measure actual response times before deciding whether to change database region or architecture.

### Next recommended step

Capture simple timings for:

```text
- Login response time
- Dashboard response time
- /ai/session response time
- /ai/chat total duration
- Aiven database query latency
```

Use the measurements in the project book to honestly explain the free-tier/cross-region tradeoff.

---

## Entry 020 - Add Aiven demo user accounts

### Date and time

```text
2026-07-18 23:30 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Create three basic demo user accounts in the current Aiven MySQL database for local testing and demonstration.

### Why this work was required

The Aiven database contained only the superadmin account. The user requested three normal demo users so the access-control and normal user login flows can be tested.

### Commands executed

```powershell
$env:DEMO_USER_PASSWORD='[DEMO_PASSWORD_FROM_USER]'
php artisan tinker --execute="[created user1@gmail.com through user3@gmail.com with role=user]"
```

The actual password is intentionally not recorded in the journal.

### Result

```text
Completed
```

### Verification

The current Aiven `users` table now contains:

```text
superadmin@gmail.com - superadmin
user1@gmail.com - user
user2@gmail.com - user
user3@gmail.com - user
```

### Security impact

These are demo accounts with a shared password. They should be changed, disabled, or deleted before any real public production use.

### Next recommended step

Log in as each demo user once, confirm the normal user dashboard works, then use the superadmin access-control page to promote one demo user to admin or author for testing.

---

## Entry 019 - Add superadmin access-control role

### Date and time

```text
2026-07-18 23:22 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: main
Starting commit: ca99b29
Ending commit: not committed yet
Pull request: not created
```

### Objective

Add a real `superadmin` role that can grant or revoke elevated access for other accounts.

### Why this work was required

The user wanted a superadmin account that can override normal access and grant other users higher access. Previously, the seeded account `superadmin@gmail.com` existed but used the normal `admin` role, and some older code protected it by checking email/name directly. A real role value is clearer, safer, and easier for the student team to explain.

### Starting state

The app had three practical roles:

```text
user
author
admin
```

Normal admins could moderate content and promote users to authors. There was no controlled UI for granting admin access, and the seeded "SuperAdmin" account was not a separate role.

### Commands executed

```powershell
php -l app\Models\User.php
php -l app\Http\Middleware\AdminMiddleware.php
php -l app\Http\Controllers\Admin\AdminController.php
php -l database\migrations\2026_07_18_231000_promote_seeded_superadmin_account.php
php -l tests\Feature\SuperAdminAccessTest.php
php artisan optimize:clear
php artisan test --filter=SuperAdminAccessTest
php artisan test
php artisan about --only=environment,drivers
php artisan migrate:status
php artisan migrate --pretend
php artisan route:list --path=admins/access-control --verbose
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `app/Models/User.php` | Added role constants, `isAdminRole()`, and `isSuperAdmin()` | Centralize role checks |
| `app/Http/Middleware/AdminMiddleware.php` | Allows `admin` and `superadmin` into admin routes | Superadmin must reach admin area |
| `app/Http/Middleware/UserMiddleware.php` | Treats superadmin like admin for view mode | Preserve admin view-mode behavior |
| `app/Http/Middleware/ReadOnlyViewMiddleware.php` | Applies read-only admin view rules to superadmin too | Keep safety behavior consistent |
| `app/Http/Controllers/Auth/AuthenticatedSessionController.php` | Redirects superadmin to admin area after login | Expected superadmin workflow |
| `app/Http/Controllers/Admin/AdminController.php` | Added access-control page and role update action | Let only superadmin grant/revoke access |
| `routes/admin.php` | Added access-control routes | Expose the new superadmin workflow |
| `resources/views/admin/layout/master.blade.php` | Adds sidebar link for superadmin only | Make workflow discoverable |
| `resources/views/admin/home/accessControl.blade.php` | New role-management view | Allow role updates through UI |
| `database/seeders/DatabaseSeeder.php` | Seeds SuperAdmin with `superadmin` role | New databases get the correct role |
| `database/migrations/2026_07_18_231000_promote_seeded_superadmin_account.php` | Updates existing seeded account from `admin` to `superadmin` | Upgrade existing Aiven/local database safely |
| `tests/Feature/SuperAdminAccessTest.php` | Added role-management tests | Prove superadmin-only access rules |

### Decision made

Use `superadmin` as a role value in the existing `users.role` column. Superadmin can assign only:

```text
user
author
admin
```

The UI cannot create another superadmin. The existing seeded superadmin account cannot be deleted.

### Security impact

Positive. Only `superadmin` can grant admin access. Normal admins cannot open or submit access-control changes. Superadmin cannot assign another superadmin through the UI, and the protected superadmin account cannot be deleted through the admin delete route. No passwords or secrets were added.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| PHP lint checks | No syntax errors | No syntax errors | Pass |
| `php artisan test --filter=SuperAdminAccessTest` | Superadmin tests pass | 6 passed, 10 assertions | Pass |
| `php artisan test` | Full suite passes | 53 passed, 130 assertions | Pass |
| `php artisan migrate:status` | New superadmin migration pending | Pending | Pass |
| `php artisan migrate --pretend` | Non-destructive role update only | Updates `superadmin@gmail.com` from `admin` to `superadmin` | Pass |
| `php artisan route:list --path=admins/access-control --verbose` | Routes are admin-middleware protected | Confirmed `web`, `admin` | Pass |

### Result

```text
Completed
```

### Remaining issues

The new migration has not been applied to Aiven yet. It is pending and should be run only after the team confirms `superadmin@gmail.com` is the intended account to upgrade.

### Next recommended step

Run `php artisan migrate` against the intended Aiven database to promote the existing seeded superadmin account, then log in as `superadmin@gmail.com` and open:

```text
/admins/access-control
```

### Project-book material

The project added a dedicated `superadmin` role for controlled access management. This avoids hard-coded email checks and separates normal admin moderation from higher-risk permission changes. The access-control feature allows superadmin to grant user, author, or admin roles while preventing normal admins from escalating privileges.

### Presentation-slide material

```text
- Added real superadmin role
- Normal admins keep moderation access
- Only superadmin can grant/revoke admin access
- Superadmin account protected from deletion
- 53 tests pass after RBAC change
```

### References

```text
app/Models/User.php
app/Http/Controllers/Admin/AdminController.php
routes/admin.php
resources/views/admin/home/accessControl.blade.php
tests/Feature/SuperAdminAccessTest.php
```

---

## Entry 018 - Phase 3: Database-backed AI memory for Aiven MySQL

### Date and time

```text
2026-07-18 22:53 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: main
Starting commit: ca99b29
Ending commit: not committed yet
Pull request: not created
```

### Objective

Replace Guru's session-only AI memory with temporary MySQL-backed conversation memory that can run on the project's Aiven managed MySQL database.

### Why this work was required

PROJECT_SPEC.md Phase 3 requires `ai_conversations` and `ai_messages` tables, models, relationships, authorization checks, validation, tests, and expiry behavior. The user confirmed that Aiven will be used, so the main application now needs database-backed AI memory instead of storing the transcript in Laravel's session payload.

### Starting state

Guru was already integrated into the main Laravel app and protected by `auth` middleware. The user reported that the widget had already been manually tested on the local server with the Gemini API key. Memory was still stored under the `ai_companion.messages` session key, so the authoritative chat transcript was not in MySQL.

### Commands executed

```powershell
git status --short --branch
php -l app\Models\AiConversation.php
php -l app\Models\AiMessage.php
php -l packages\Local\AiCompanion\src\Services\SessionMemoryManager.php
php -l packages\Local\AiCompanion\src\Http\Controllers\AiChatController.php
php -l tests\Feature\AiDatabaseMemoryTest.php
php -l database\migrations\2026_07_18_181000_create_ai_conversations_table.php
php -l database\migrations\2026_07_18_181001_create_ai_messages_table.php
php artisan optimize:clear
php artisan test
php artisan route:list --path=ai --verbose
php artisan migrate:status
php artisan migrate --pretend
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `database/migrations/2026_07_18_181000_create_ai_conversations_table.php` | Added `ai_conversations` table | Store temporary conversation ownership, status, timestamps, and expiry |
| `database/migrations/2026_07_18_181001_create_ai_messages_table.php` | Added `ai_messages` table | Store user and assistant messages in MySQL |
| `app/Models/AiConversation.php` | Added model and relationships | Represent AI conversations in Eloquent |
| `app/Models/AiMessage.php` | Added model and relationship | Represent AI messages in Eloquent |
| `app/Models/User.php` | Added `aiConversations()` relationship | Connect users to their AI conversations |
| `config/ai-companion.php` | Changed memory driver and limits | Use database memory with session pointer only |
| `packages/Local/AiCompanion/config/ai-companion.php` | Mirrored package default config | Keep package defaults aligned with app config |
| `packages/Local/AiCompanion/src/Services/SessionMemoryManager.php` | Reworked storage from session array to MySQL | Preserve existing service API while changing storage backend |
| `packages/Local/AiCompanion/src/Http/Controllers/AiChatController.php` | Uses bounded context messages for prompt | Send only latest configured context to Gemini |
| `tests/Feature/AiDatabaseMemoryTest.php` | Added persistence, ownership, and clear tests | Prove Phase 3 behavior and security boundary |
| `packages/Local/AiCompanion/README.md` | Updated memory documentation | Remove stale session-only documentation |

### Existing code preserved

The existing AI routes, controller response shape, widget JavaScript, widget Blade include, Gemini client, prompt builder persona, and auth middleware configuration were preserved. The route `/ai/session` still exists because the browser already uses it, but it now returns messages from the active database conversation.

### Decision made

Use Aiven MySQL as the authoritative temporary AI memory store. Laravel's HTTP session stores only:

```text
active_ai_conversation_id
```

Every read/write verifies that the active conversation belongs to the authenticated user.

### Alternatives considered

#### Alternative A

Description:
Keep session-only memory.

Advantages:
Smallest code change and no migration required.

Disadvantages:
Contradicts PROJECT_SPEC.md, stores transcript in the session payload, and does not demonstrate managed database persistence.

Reason not selected:
The project plan requires MySQL-backed temporary AI memory.

#### Alternative B

Description:
Store long-term AI memories or summaries now.

Advantages:
Could support richer personalization later.

Disadvantages:
Adds privacy, consent, deletion, retention, and design complexity beyond the MVP.

Reason not selected:
Long-term AI memory is explicitly a future feature in PROJECT_SPEC.md.

### Architectural impact

```text
Moderate
```

The main Laravel app now owns temporary AI conversation history in MySQL as required by the approved architecture. PROJECT_SPEC.md did not need an update because this work implements the existing Phase 3 plan.

### Security impact

Conversation ownership is server-verified using the authenticated user ID. A forged `active_ai_conversation_id` in the browser session cannot expose or continue another user's conversation. Gemini keys remain server-side. No secrets were added.

### Performance impact

Each AI request now performs small database reads/writes for the active conversation and messages. Messages are bounded to 100 retained rows per conversation and 20 context messages sent to Gemini. Indexes were added for user/status/activity and conversation message lookup.

### Cost impact

No new direct service cost beyond the selected Aiven MySQL usage. The feature uses normal managed database storage and a small number of rows per conversation.

### Learning outcome

The team can explain the difference between HTTP session state and authoritative application data. The session can remember which conversation is active, but the database owns the actual temporary AI transcript.

### Implementation summary

1. Added `ai_conversations` and `ai_messages` migrations.
2. Added Eloquent models and relationships.
3. Reworked the memory manager to create or reuse an active conversation for the logged-in user.
4. Preserved bounded prompt context by sending only the latest configured messages to Gemini.
5. Added pruning so temporary conversations retain at most 100 messages.
6. Added tests for persistence, ownership protection, and clearing memory.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| PHP lint checks | No syntax errors | No syntax errors | Pass |
| `php artisan optimize:clear` | Laravel caches cleared | Completed | Pass |
| `php artisan test` | Full test suite passes | 47 passed, 120 assertions | Pass |
| `php artisan route:list --path=ai --verbose` | AI routes remain `web` + `auth` protected | Confirmed | Pass |
| `php artisan migrate:status` | New AI migrations pending before deployment | Both AI migrations pending | Pass |
| `php artisan migrate --pretend` | Shows non-destructive create-table SQL | Only creates `ai_conversations` and `ai_messages` | Pass |

### Manual verification

The user reported that the Guru widget had already been tested on the local server before this database-memory change. After applying this change, the recommended browser check is to run the app, send two Guru messages while logged in, refresh the page, and confirm the conversation still appears from MySQL.

### Result

```text
Completed
```

### Rollback procedure

Revert this change set before running the new migrations. If the migrations have already been applied on a development database, run:

```powershell
php artisan migrate:rollback --step=2
```

Do not run rollback against production without team approval.

### Remaining issues

- The new migrations are pending and must be applied deliberately to Aiven after reviewing the active `.env` database connection.
- The service is still integrated as a local package, not yet as the separate HMAC-signed service described for the later deployment phase.
- Long-term AI memory is not implemented, by design.

### Next recommended step

Review the active Aiven database connection, run `php artisan migrate --pretend` again, then apply the two pending AI migrations to the intended development Aiven database and manually verify conversation persistence after browser refresh.

### Project-book material

During Phase 3, the project moved Guru's temporary AI memory from Laravel session storage to managed MySQL storage. The main application now stores conversations and messages in dedicated `ai_conversations` and `ai_messages` tables while the session stores only the active conversation ID. This keeps the main Laravel app as the security boundary and prepares the project for Aiven-backed deployment.

### Presentation-slide material

```text
- AI memory moved from session payload to MySQL
- Tables added: ai_conversations, ai_messages
- Session stores only active_ai_conversation_id
- Ownership checked on every conversation read/write
- 47 tests pass, including AI persistence and security tests
```

### References

```text
PROJECT_SPEC.md Section 9 and Phase 3
AGENTS.md Database rules and AI memory policy
app/Models/AiConversation.php
app/Models/AiMessage.php
packages/Local/AiCompanion/src/Services/SessionMemoryManager.php
tests/Feature/AiDatabaseMemoryTest.php
```

---

## Entry 017 — Add webapp help RAG + dual-role Summie (webhelper.md)

### Date and time

```text
2026-07-18 18:00 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not committed yet
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Extend Summie from a learning-only assistant to a dual-role assistant:
1. Webapp assistant — answers questions about how to use Phan Mee Eain Learning Hub.
2. Learning companion — original role, unchanged.

Implemented using a lightweight RAG (retrieve-and-augment) approach: a knowledge document (`webhelper.md`) is read from disk and injected into the system prompt on every chat request.

### Why this work was required

Users may be confused about how to use the website. Rather than requiring them to read documentation separately, they can now ask Summie directly. The AI reads the knowledge document and answers accurately using only documented platform features and policies.

### Starting state

Summie was a learning companion only. It had no knowledge of the platform's features, navigation, or policies. A user asking "How do I become an author?" would receive a generic or incorrect response.

### Commands executed

```powershell
# Lint
php -l packages/Local/AiCompanion/src/Services/PromptBuilder.php
php -l packages/Local/AiCompanion/src/Http/Controllers/AiChatController.php

# Clear and test
php artisan optimize:clear
php artisan test
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `webhelper.md` | New file (9 361 bytes) | Webapp knowledge document for RAG injection |
| `packages/Local/AiCompanion/src/Services/PromptBuilder.php` | Added `$webContext` parameter; rewrote system prompt with dual-role persona | Enable webapp help while preserving learning companion |
| `packages/Local/AiCompanion/src/Http/Controllers/AiChatController.php` | Load `webhelper.md` at chat time; pass it to `PromptBuilder::build()` | Wire RAG source to AI prompt |

### How it works

1. On every `POST /ai/chat` request, `AiChatController::chat()` reads `webhelper.md` from `base_path('webhelper.md')` using `file_get_contents`.
2. The content is passed to `PromptBuilder::build()` as `$webContext`.
3. `PromptBuilder` appends it to the system instruction under a `WEBAPP CONTEXT` heading.
4. The Gemini model receives the full system instruction + webapp context + conversation history + new user message.
5. The model uses the webapp context to answer usage questions and uses its training for learning guidance.

This is a document-level RAG approach. The full document is injected on every request. No vector database, embeddings, or external retrieval service is needed at this scale.

### webhelper.md coverage

| Section | Covered |
| --- | --- |
| Platform overview | Yes |
| Role definitions (User, Author, Admin) | Yes |
| Registration and login flow | Yes |
| User actions (react, comment, save, report, suggest, promote) | Yes |
| Report reasons and 24-hour cooldown policy | Yes |
| Suggestion minimum length (50 chars) | Yes |
| Author promotion (four checkboxes) | Yes |
| Author content creation, editing, deletion | Yes |
| Author comment inbox | Yes |
| Author content rules (language, citations, no discrimination) | Yes |
| Admin panel functions | Yes |
| Admin view mode (read-only author view) | Yes |
| Profile management (edit, change password) | Yes |
| Content types (article, video, quiz) | Yes |
| Downloadable resources | Yes |
| Governing policies | Yes |
| Common Q&A section (13 questions) | Yes |

### Design decision: full document injection vs. section retrieval

The webhelper.md document is approximately 9 KB. Gemini 2.0 Flash Lite's context window handles this comfortably. Full injection means zero retrieval latency, no missing sections, and no extra infrastructure.

This should be revisited if the document grows beyond ~50 KB or if token cost becomes a concern.

### Existing code preserved

The `PromptBuilder::build()` signature change is backward-compatible (`$webContext = ''` default). Any caller without the third argument continues to work. All 44 existing tests passed without modification.

### Security impact

```text
Minimal. webhelper.md contains only public platform documentation.
No secrets, credentials, or private user data are present.
The document is read-only from the filesystem. No user input can modify it.
```

### Performance impact

```text
Each chat request reads ~9 KB from disk synchronously.
On a typical SSD this adds approximately 0.1–0.5 ms per request.
This is negligible compared to the Gemini API round-trip of 1–5 seconds.
```

### Cost impact

```text
The system prompt is approximately 9 KB (~2 300 tokens) longer per request.
For the free tier of Gemini 2.0 Flash Lite this is within per-minute and per-day limits at student-project scale.
Monitor at console.cloud.google.com if usage grows.
```

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| `php -l PromptBuilder.php` | No syntax errors | No syntax errors | Pass |
| `php -l AiChatController.php` | No syntax errors | No syntax errors | Pass |
| `php artisan test` | 44 passed | 44 passed, 102 assertions, 8.06s | Pass |

### Manual verification checklist (requires Gemini API key in .env)

1. Log in as any user.
2. Open Summie widget.
3. Ask: "How do I become an author?" — should explain the promotion request flow.
4. Ask: "How do I report a post?" — should explain the report modal and 24-hour cooldown.
5. Ask: "Where are my saved posts?" — should say saved content is in the user profile/dashboard.
6. Ask: "I want to learn Python" — should give a learning path (ROLE 2, original behavior preserved).
7. Ask: "What languages can I write content in?" — should say English, Burmese, or bilingual.

### Result

```text
Completed
```

### Remaining issues

- `webhelper.md` is English-only. The AI translates naturally when the user writes in Burmese.
- The document is a static file. If the webapp adds new features, `webhelper.md` must be updated manually.
- Full document injection is appropriate now. If the document grows significantly, switch to section-based retrieval.

### Next recommended step

Add a Gemini API key to `.env` and perform the manual verification checklist. Then commit all changes since Entry 009 in a focused git branch (`feature/ai-companion-integration`).

### Project-book material

```text
The team extended Summie from a single-role learning assistant into a dual-role assistant. A lightweight RAG technique was used: a structured knowledge document (webhelper.md) describing the full activity flow of the platform is injected into the AI system prompt on every chat request. This gives Summie accurate, up-to-date knowledge of the platform without a database, vector store, or embedding model. webhelper.md covers all three user roles, all major features, governing policies, and 13 pre-answered common questions.
```

### Presentation-slide material

```text
- Summie upgraded: Webapp Help + Learning Companion (dual-role)
- RAG source: webhelper.md (9 KB, injected into every prompt)
- Covers: registration, roles, reactions, reports, saves, promotions, author rules, admin panel
- No vector database needed at this scale
- 44 tests pass, all existing behavior preserved
```

### References

```text
PROJECT_SPEC.md §6, §7, §8
AGENTS.md §2, §4, §6
packages/Local/AiCompanion/src/Services/PromptBuilder.php
packages/Local/AiCompanion/src/Http/Controllers/AiChatController.php
webhelper.md
Author Status Rules & Regulations.md
```

---

# Entry template



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

## Entry 015 — Phase 5: AI service inspection (aibot / Summie)

### Date and time

```text
2026-07-18 17:40 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not committed yet
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Inspect the standalone AI service repository located at `c:\Users\kaung\aibot` to understand its architecture before integrating it into the main application.

### Why this work was required

PROJECT_SPEC.md Phase 5 requires the team to clone or locate the standalone AI repository, inspect its architecture, record its behavior, verify Laravel and PHP compatibility, review provider-key handling, and avoid premature merging.

### Starting state

The AI service was located at `c:\Users\kaung\aibot` — a Laravel 12 project with a local Composer package at `packages/Local/AiCompanion`. It was not previously connected to the main application.

### Evidence before change

```text
The aibot project was fully independent with no reference in PhanMeeEin's composer.json.
The package had no auth middleware, meaning any user with the URL could call the Gemini API.
```

### Investigation

Inspected:

```text
c:\Users\kaung\aibot\composer.json
c:\Users\kaung\aibot\packages\Local\AiCompanion\README.md
c:\Users\kaung\aibot\packages\Local\AiCompanion\composer.json
c:\Users\kaung\aibot\packages\Local\AiCompanion\config\ai-companion.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\routes\web.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\src\AiCompanionServiceProvider.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\src\Http\Controllers\AiChatController.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\src\Services\GeminiClient.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\src\Services\GeminiKeyManager.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\src\Services\PromptBuilder.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\src\Services\SessionMemoryManager.php
c:\Users\kaung\aibot\packages\Local\AiCompanion\resources\views\widget.blade.php
```

### Findings

| Item | Finding |
| --- | --- |
| Framework | Laravel 12, PHP 8.2+ — matches main app |
| Package name | `local/ai-companion` installed via Composer path repository |
| Memory | Session-based (`ai_companion.messages`, max 20 messages) |
| Routes | `GET /ai/session`, `POST /ai/chat`, `POST /ai/clear` |
| Middleware | `web` (CSRF) plus rate limiting — NO auth middleware |
| AI provider | Gemini API with key rotation across up to 3 keys |
| Model | Primary and fallback model configurable via `.env` |
| Persona | Summie — holistic AI learning companion, English and Burmese |
| Assets | `widget.js` and `widget.css` publishable to `public/vendor/` |
| Auth gap | Routes were open to unauthenticated users — must be closed |

### Architecture deviation recorded

PROJECT_SPEC.md §8 describes a two-service HMAC-signed HTTP architecture (main app calls a separate deployed AI service). The actual `aibot` repo is a local Composer package installed into the same Laravel process.

Decision: Use the local package approach (Option A) for the MVP. This is documented here and in the implementation plan. The HMAC service boundary will be added in the containerization phase when two separate Render deployments are configured.

PROJECT_SPEC.md does not need to be updated now because §3 (incremental evolution) and §20 (Phase 5 description) already permit inspection before architectural integration. The deviation will be documented when the Dockerfile and Render deployment phases are planned.

### Security impact

The auth gap (open routes) was identified in this inspection and closed in Entry 016.

### Decision made

Proceed with local package integration (Entry 016). Defer HMAC service boundary to containerization phase.

### Alternatives considered

#### Alternative A — Local package (selected for MVP)

Advantages: Simplest path, zero additional infrastructure, works immediately in local dev.
Disadvantages: Does not demonstrate the service boundary described in PROJECT_SPEC.md §8.
Reason selected: Fastest path to a working, auth-protected AI feature for the MVP.

#### Alternative B — True separate service

Advantages: Fully matches PROJECT_SPEC.md §8 HMAC architecture.
Disadvantages: Requires two running servers, HMAC signing, and more complex deployment.
Reason not selected for now: Appropriate for containerization phase, not for this MVP integration.

### Result

```text
Completed
```

### Next recommended step

Proceed to Entry 016 — integrate the package into PhanMeeEin with auth middleware.

### Project-book material

```text
During Phase 5, the team inspected the standalone AI service repository (aibot) and found it implemented as a local Laravel 12 Composer package named Summie. The package provides Gemini API integration, session-based conversational memory, key rotation, and a floating chat widget. A key finding was that the package routes had no authentication guard, which would have allowed unauthenticated users to consume Gemini API quota. This was documented as a critical gap to close before integration.
```

### Presentation-slide material

```text
- AI service is a local Laravel 12 Composer package (Summie)
- Gemini API with up to 3 rotating keys and fallback model
- Session-based memory (max 20 messages)
- Auth gap identified: routes were open to unauthenticated users
- Decision: local package for MVP, separate service for production
```

### References

```text
PROJECT_SPEC.md §5, §7, §8
AGENTS.md §6, §7
c:\Users\kaung\aibot\packages\Local\AiCompanion\README.md
```

---

## Entry 016 — Phase 6: AI service integration (local package, auth-gated)

### Date and time

```text
2026-07-18 17:48 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Branch and commit

```text
Branch: not committed yet
Starting commit: not committed yet
Ending commit: not committed yet
Pull request: not created
```

### Objective

Install the `local/ai-companion` (Summie) package into PhanMeeEin so that authenticated users can use the AI learning companion through a floating chat widget, with the Gemini API key kept entirely server-side.

### Why this work was required

PROJECT_SPEC.md Phase 6 requires defining a request contract, adding authentication, and connecting the main application to the AI service. AGENTS.md §6 specifies that the main application must authenticate the user before any AI request.

### Starting state

The `local/ai-companion` package existed in `c:\Users\kaung\aibot` but was not installed in PhanMeeEin. No AI chat widget appeared in any layout.

### Commands executed

```powershell
# Copy package
Copy-Item -Path "c:\Users\kaung\aibot\packages\Local\AiCompanion" -Destination "packages\Local\AiCompanion" -Recurse -Force

# Install via Composer
composer require local/ai-companion:@dev --no-interaction

# Publish config and assets
php artisan vendor:publish --tag=ai-companion-config
php artisan vendor:publish --tag=ai-companion-assets --force

# Verify routes
php artisan optimize:clear
php artisan route:list --path=ai --verbose

# Run tests
php artisan test
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `packages/Local/AiCompanion/` | Copied from aibot repo | Install package locally inside PhanMeeEin |
| `composer.json` | Added path repository and `local/ai-companion` dependency | Enable Composer to resolve the package |
| `composer.lock` | Updated by Composer | Locks the package version |
| `vendor/` | Package installed via junction | Composer autoload |
| `config/ai-companion.php` | Published and updated: `middleware` changed from `['web']` to `['web', 'auth']` | Gate all AI routes behind authentication |
| `public/vendor/ai-companion/` | Published widget CSS and JS | Serve frontend assets |
| `.env.example` | Added AI companion variable block | Document required environment keys |
| `resources/views/user/layout/master.blade.php` | Added `@include('ai-companion::widget')` before `</body>` | Show widget to authenticated users |
| `resources/views/auther/layout/master.blade.php` | Added `@include('ai-companion::widget')` before `</body>` | Show widget to authors |
| `resources/views/admin/layout/master.blade.php` | Added `@include('ai-companion::widget')` before `</body>` | Show widget to admins |
| `app/Http/Middleware/ReadOnlyViewMiddleware.php` | Added early-exit for `/ai/*` paths | Allow AI chat in admin read-only view mode |
| `tests/Feature/AiChatAuthTest.php` | New: 6 tests covering unauthenticated redirect and authenticated access | Prove the auth gate works |

### Existing code preserved

All existing user, author, and admin flows were kept unchanged. Only the widget include and middleware exemption were added to existing files.

### Decision made

Add `auth` middleware at the config level (`config/ai-companion.php`) rather than modifying the package source. This keeps the package clean and the auth policy in the main application where it belongs.

### Alternatives considered

#### Alternative A — Modify package routes file

Advantages: One place to change.
Disadvantages: Would require modifying the package source, creating drift from the upstream package.
Reason not selected: Config-level middleware is the correct Laravel approach.

#### Alternative B — Add a wrapper route in the main app

Advantages: Full control over the request.
Disadvantages: Duplicates the route definitions.
Reason not selected: The package already supports custom middleware via config.

### Architectural impact

```text
Moderate
```

The AI companion routes and widget are now part of the main application. `PROJECT_SPEC.md` is not changed because the local-package approach is documented as an MVP deviation deferred from the HMAC service-boundary requirement.

### Security impact

- All three AI endpoints (`/ai/session`, `/ai/chat`, `/ai/clear`) now require an authenticated session.
- Unauthenticated users receive a login redirect (HTML) or 401 (JSON).
- The Gemini API key is set via server environment variables and never sent to the browser.
- Rate limiting remains active: `throttle:10,1` on chat, `throttle:5,1` on clear.
- CSRF protection is preserved via the `web` middleware group.

### Performance impact

```text
Not measured. Each AI chat POST adds one Gemini API round-trip (~1–5 seconds depending on response length).
No additional database queries are introduced at this phase.
```

### Cost impact

```text
Gemini API usage: Gemini 2.0 Flash Lite has a free tier. Usage at this scale (student project) is expected to remain within the free allowance. Monitor at console.cloud.google.com.
```

### Learning outcome

The team learned how to install a local Composer path package, how middleware is layered in Laravel (package default + application override via config), and why authentication must be enforced at the application level even when the underlying package does not include it.

### Implementation summary

1. Copied the AiCompanion package folder into `packages/Local/AiCompanion/`.
2. Added a path repository to `composer.json` and required `local/ai-companion:@dev`.
3. Ran `composer require` — package discovered and junctioned successfully.
4. Published config to `config/ai-companion.php` and assets to `public/vendor/ai-companion/`.
5. Changed route middleware from `['web']` to `['web', 'auth']` in the published config.
6. Added `@include('ai-companion::widget')` to user, author, and admin master layouts.
7. Added an early-exit in `ReadOnlyViewMiddleware` to allow AI routes in admin read-only mode.
8. Added `AI_COMPANION_ENABLED` and `GEMINI_API_KEY_*` variables to `.env.example`.
9. Wrote `AiChatAuthTest` with 6 tests.
10. Ran `php artisan test` — 44 tests passed, 102 assertions.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| `php artisan route:list --path=ai --verbose` | All 3 routes show `web`, `auth`, and rate-limit middleware | Confirmed | Pass |
| `php artisan test` | 44 tests pass | 44 passed, 102 assertions, 9.08s | Pass |
| `AiChatAuthTest::unauthenticated_get_session_redirects_to_login` | 302 to /login | 302 | Pass |
| `AiChatAuthTest::unauthenticated_post_chat_returns_401` | 401 JSON | 401 | Pass |
| `AiChatAuthTest::unauthenticated_post_clear_returns_401` | 401 JSON | 401 | Pass |
| `AiChatAuthTest::authenticated_user_can_reach_session_endpoint` | 200 + messages array | 200 | Pass |
| `AiChatAuthTest::authenticated_author_can_reach_session_endpoint` | 200 + messages array | 200 | Pass |
| `AiChatAuthTest::authenticated_admin_can_reach_session_endpoint` | 200 + messages array | 200 | Pass |

### Manual verification

To verify in the browser after adding a Gemini API key to `.env`:

1. Run `php artisan serve`.
2. Open the app as a guest — the Summie widget must NOT appear.
3. Log in as any role — the Summie widget must appear in the bottom-right corner.
4. Click the Summie button — the pane must open.
5. Type a message — Summie must respond via Gemini.
6. Log out — widget must disappear.
7. Attempt `POST /ai/chat` manually without a session — must receive redirect to login.

### Result

```text
Completed
```

The Summie AI companion is installed, auth-gated, tested, and ready to use once a Gemini API key is added to `.env`.

### Rollback procedure

1. Remove `@include('ai-companion::widget')` from all three layout files.
2. Revert `ReadOnlyViewMiddleware.php` to remove the `$isAiRoute` exemption.
3. Remove `local/ai-companion` from `composer.json` and run `composer update`.
4. Delete `config/ai-companion.php` and `public/vendor/ai-companion/`.
5. Delete `packages/Local/AiCompanion/`.
6. Remove the `GEMINI_API_KEY_*` block from `.env.example`.
7. Delete `tests/Feature/AiChatAuthTest.php`.

### Remaining issues

- The Gemini API key must be added to `.env` manually before the widget can make real AI calls.
- Memory is session-based. The `ai_conversations` and `ai_messages` MySQL tables described in PROJECT_SPEC.md §9 are not yet created — this is a separate Phase 3 task.
- The HMAC service boundary (PROJECT_SPEC.md §8) is deferred to the containerization phase.
- The widget uses the default Summie branding. It can be re-themed by publishing and modifying the assets.

### Next recommended step

Add a Gemini API key to `.env` and perform the manual browser verification checklist. Then plan the `ai_conversations` and `ai_messages` database migrations (Phase 3) to replace session memory with persistent MySQL storage.

### Project-book material

```text
During Phase 6, the team integrated the Summie AI companion package into the main PhanMeeEin application. The package was copied into the project as a local Composer path package and installed using standard Composer tooling. Authentication was enforced at the configuration level by adding the auth middleware to the AI route group, ensuring that no unauthenticated request can reach the Gemini API. The Gemini API key remains server-side at all times. Six automated tests confirm the auth gate works correctly. The AI chat widget now appears in the authenticated user, author, and admin layouts.
```

### Presentation-slide material

```text
- Summie AI companion integrated as a local Laravel 12 Composer package
- All /ai/* routes gated by Laravel auth middleware
- Gemini API key is server-side only — never exposed to the browser
- Widget appears only in authenticated layouts (user, author, admin)
- 44 tests pass: 6 new AI auth tests + 38 existing
- Session memory used for MVP; database persistence planned next
```

### Speaker-note material

The key design decision was to add the auth middleware at the config level rather than changing the package source code. This follows the same principle as adding middleware to any Laravel route group — the security enforcement lives in the application that owns the user session, not in the feature package itself.

### Diagram or screenshot required

```text
Yes
Suggested evidence: Browser screenshot showing the Summie widget in the authenticated user dashboard, and the absence of the widget on the guest landing page.
```

### References

```text
PROJECT_SPEC.md §6, §7, §8, §9, §17
AGENTS.md §6, §7, §8, §10
packages/Local/AiCompanion/README.md
config/ai-companion.php
tests/Feature/AiChatAuthTest.php
app/Http/Middleware/ReadOnlyViewMiddleware.php
```

### Final reflection

1. What worked? Composer path repositories made local package installation clean and straightforward.
2. What was difficult? The PowerShell heredoc produced a UTF-8 BOM in the test file which PHP rejects as a namespace error. Fixed by using `[System.IO.File]::WriteAllText` with a BOM-free UTF-8 encoding.
3. What would be improved in a paid production environment? A separate deployed AI service with HMAC signing, as described in PROJECT_SPEC.md §8.
4. Can every team member explain this change? Yes — the auth middleware addition and widget include are both single-line changes with clear comments.
5. Did this change preserve existing code where possible? Yes. Only three layout files gained one include line each, and one middleware gained a four-line AI route exemption.

---

### Date and time

```text
2026-07-18 14:52 +07:00
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
Starting commit: 1cfa133
Ending commit: not committed yet
Pull request: not created
```

### Objective

Implement session-based admin view modes, report cooldown protection, responsive UI fixes, and safer author content creation.

### Why this work was required

The review and user feedback showed that role mutation, report spam, validation loss, and brittle layouts were creating security and usability risk.

### Starting state

Admins could switch roles through the UI, report reasons were too exposed, content uploads lost work on validation failure, and several pages assumed wide screens.

### Evidence before change

```text
php artisan test
tests/Feature/OwnershipSecurityTest.php failed on the report reason validation
```

### Investigation

Reviewed:

```text
app/Http/Controllers/Admin/AdminController.php
app/Http/Controllers/Auther/AutherProfileController.php
app/Http/Controllers/ContentController.php
app/Http/Controllers/ReportController.php
app/Http/Middleware/AdminMiddleware.php
app/Http/Middleware/UserMiddleware.php
app/Http/Middleware/ReadOnlyViewMiddleware.php
resources/views/admin/layout/master.blade.php
resources/views/user/layout/master.blade.php
resources/views/user/home/contentPage.blade.php
resources/views/auther/home/createContent.blade.php
resources/views/auther/home/editContentPage.blade.php
routes/admin.php
routes/user.php
database/migrations/2026_07_18_130001_make_content_image_nullable.php
database/migrations/2026_07_18_130002_create_content_resources_table.php
database/migrations/2026_07_18_130003_add_report_lookup_index.php
tests/Feature/OwnershipSecurityTest.php
tests/Feature/UserMiddlewareTest.php
```

### Commands executed

```powershell
php -l app/Http/Controllers/Auther/AutherProfileController.php
php artisan optimize:clear
php artisan migrate:status
php artisan migrate
php artisan test
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `app/Http/Middleware/ReadOnlyViewMiddleware.php` | Added session-scoped read-only protection | Block writes in admin author-readonly mode |
| `app/Http/Middleware/UserMiddleware.php` | Allowed admin user-view access | Support session-based view mode safely |
| `app/Http/Controllers/Admin/AdminController.php` | Added view-mode switch/reset | Replace role mutation with session state |
| `app/Http/Controllers/ReportController.php` | Added cooldown logic and content-focused report reasons | Prevent report spam |
| `app/Http/Controllers/Auther/AutherProfileController.php` | Added optional image, resources, and validation recovery | Preserve work and support attachments |
| `app/Http/Controllers/ContentController.php` | Added resource loading and download action | Expose attachment metadata safely |
| `resources/views/user/home/contentPage.blade.php` | Redesigned report UI, responsive feed layout, and reason list | Reduce exposure and improve usability |
| `resources/views/auther/home/createContent.blade.php` | Reworked create form with old input and file support | Keep author drafts recoverable |
| `resources/views/auther/home/editContentPage.blade.php` | Reworked edit form with old input and file support | Keep editing recoverable |
| `resources/views/auther/home/contents.blade.php` | Expanded the clickable create area | Make the create entry easier to use |
| `resources/views/Login/login.blade.php` | Masked password input | Correct auth UX |
| `resources/views/Login/register.blade.php` | Masked password inputs | Correct auth UX |
| `public/user/css/style.css` | Added responsive and report-state styling | Improve mobile behavior |
| `tests/Feature/OwnershipSecurityTest.php` | Updated report reason test and added cooldown test | Prove server-side report behavior |
| `tests/Feature/UserMiddlewareTest.php` | Added admin user-view access test | Verify session-based RBAC |
| `resources/views/user/home/contentPage.blade.php` | Grouped reactions, comment, and report into one footer row | Match the requested interaction layout |

### Existing code preserved

Existing user, author, and admin flows were kept.

### Decision made

Use session-based view modes and server-enforced read-only and cooldown checks instead of role mutation or client-only controls.

### Alternatives considered

#### Alternative A

Description:
Keep changing `users.role` from the UI.

Advantages:
Fewer session checks.

Disadvantages:
Weak security and confusing account state.

Reason not selected:
Role mutation is the wrong trust boundary for view-only admin inspection.

#### Alternative B

Description:
Throttle reports only in JavaScript.

Advantages:
Quick UI change.

Disadvantages:
Easy to bypass.

Reason not selected:
Cooldown must be enforced by the server.

### Architectural impact

```text
Moderate
```

### Security impact

Improves authorization by separating real role from temporary admin view mode and by blocking writes in read-only admin inspection mode.
Report spam is reduced with a 24-hour server-side cooldown and attachment uploads are validated before storage.

### Performance impact

```text
Minor positive impact from the report lookup index
```

### Cost impact

```text
No direct cost
```

### Learning outcome

The team learned how to use session state for safe admin view toggles, how to enforce repeat-action cooldowns in the controller, and how to keep validation failures from wiping author input.

### Implementation summary

Added a dedicated read-only middleware and admin view-mode switch.
Replaced the report selector with a modal and cooldown-aware controller logic.
Added optional featured images, attachment metadata storage, and download links.
Cleaned up responsive layout behavior on the main user and author screens.
Ran migrations and re-tested the suite until it passed.

### Tests performed

| Test | Expected | Actual | Result |
| --- | --- | --- | --- |
| `php artisan migrate` | New schema should apply | Three new migrations applied | Pass |
| `php artisan test` | Existing and new checks should pass | 36 tests passed | Pass |

### Commands used for testing

```powershell
php artisan optimize:clear
php artisan migrate:status
php artisan migrate
php artisan test
```

### Test failures and resolution

The report ownership test initially used a stale reason value.
Updating the test to an allowed reason fixed the failure and confirmed the cooldown path works.

### Manual verification

Checked the feed layout, author create path, and report button flow after the code updates.

### Result

```text
Completed
```

### Rollback procedure

Revert the related controller, middleware, view, and migration commits, then roll back the three new migrations on the development database if needed.

### Remaining issues

State-changing GET routes still exist in the legacy codebase, although the read-only middleware now blocks them in the restricted admin view.

### Next recommended step

Move the remaining legacy GET mutators toward explicit POST or DELETE routes when the team is ready.

### Project-book material

This pass strengthened the app by separating temporary admin view state from real authorization, adding server-side report cooldown enforcement, and making author content creation safer to use on slower or error-prone form submissions.

### Presentation-slide material

```text
- Admin role is no longer mutated for view switching
- Read-only admin browsing is blocked server-side
- Reports now have a 24-hour cooldown
- Author uploads preserve input and support attachments
- Main UI was tightened for mobile screens
```

### Speaker-note material

The key idea is that convenience features, like "view as user," should be session-scoped and reversible, while security controls, like report throttling and write blocking, must stay on the server.

### Diagram or screenshot required

```text
No
Suggested evidence: test output and updated responsive pages
```

### References

```text
AGENTS.md
PROJECT_SPEC.md
LESSON_LEARNT.md
app/Http/Controllers/...
resources/views/...
database/migrations/...
tests/Feature/...
```

### Final reflection

1. What worked? The implementation stayed focused and the tests passed.
2. What was difficult? The feed template and author forms needed careful cleanup to keep old behavior intact.
3. What would be improved in a paid production environment? A cleaner route design for state-changing actions and more formal attachment lifecycle handling.
4. Can every team member explain this change? Yes, because the session mode, cooldown, and attachment design are documented.
5. Did this change preserve existing code where possible? Yes.

---

## Entry 014 - Convert state-changing GET routes

### Date and time

```text
2026-07-18
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Remove legacy GET routes that changed application state.

### Why this work was required

GET requests should be safe to open, refresh, preview, and share. Delete, promote, demote, save, and mark-seen actions should require CSRF-protected mutating requests.

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `routes/admin.php` | Changed promote, demote, user delete, category delete, and mark-seen actions to POST/DELETE | Stop state changes through GET URLs |
| `routes/user.php` | Changed author content delete and save toggle to DELETE/POST; added comment mark-seen POST | Stop state changes through GET URLs |
| Admin and author Blade views | Replaced action links with CSRF forms | Match the safer route verbs |
| `resources/views/user/home/contentPage.blade.php` | Changed save toggle AJAX to POST | Match the safer route verb |
| `tests/Feature/StateChangingRouteVerbTest.php` | Added regression tests | Prove old GET mutators are unavailable |
| `LESSON_LEARNT.md` | Marked the finding solved | Keep the review log current |

### Tests performed

```powershell
php artisan route:list --except-vendor
php artisan test
```

### Result

```text
Completed
```

### Remaining issues

Admin report/suggestion list views no longer mark records as seen on simple page load. They now provide explicit "Mark all as seen" POST buttons.

---

## Entry 013 - Add static report policy and author guidelines pages

### Date and time

```text
2026-07-18 17:19 +07:00
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Replace footer demo text with real static Laravel pages for Report Policy and Author Guidelines.

### Why this work was required

The footer needed real destinations for policy and guideline content while omitting the Contact Us support item.

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `routes/web.php` | Added `reportPolicy` and `authorGuidelines` routes | Provide real static pages |
| `resources/views/static/layout.blade.php` | Added uniform static-page layout | Keep both pages visually consistent |
| `resources/views/static/report-policy.blade.php` | Added standard demo report policy | Explain moderation expectations |
| `resources/views/static/author-guidelines.blade.php` | Renders the author rules markdown | Reuse the approved rule source |
| `resources/views/*/layout*.blade.php` | Updated footer support links | Remove Contact Us and point to real pages |

### Tests performed

```powershell
php artisan route:list --name=reportPolicy
php artisan route:list --name=authorGuidelines
php artisan test
```

### Result

```text
Completed
```

### Remaining issues

None currently known.

---

## Entry 012 - Fix favicon asset wiring

### Date and time

```text
2026-07-18
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Make the browser render the recently added Phan Mee Eain favicon correctly.

### Why this work was required

The browser favicon path was not explicitly wired in the Blade layouts, and the standard `/favicon.ico` asset needed to point to the valid recently added icon.

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `public/favicon.ico` | Copied from `public/phan_mee_eain_favicon.ico` | Use the valid recent favicon at the browser-standard path |
| `resources/views/user/layout/master.blade.php` | Added favicon link | Ensure user pages request the icon directly |
| `resources/views/admin/layout/master.blade.php` | Added favicon link | Ensure admin pages request the icon directly |
| `resources/views/auther/layout/master.blade.php` | Added favicon link | Ensure author pages request the icon directly |
| `resources/views/user/guest/guestUser.blade.php` | Added favicon link | Ensure guest pages request the icon directly |
| `resources/views/Login/login.blade.php` | Added favicon link | Ensure login page requests the icon directly |
| `resources/views/Login/register.blade.php` | Added favicon link | Ensure register page requests the icon directly |

### Tests performed

```powershell
php artisan test
```

### Result

```text
Completed
```

### Remaining issues

Browsers cache favicons aggressively, so a hard refresh, private window, or cache clear may be needed before the updated icon appears.

---

## Entry 011 - Prevent attachment loss on incomplete author forms

### Date and time

```text
2026-07-18
Timezone: Asia/Bangkok
```

### Contributor

```text
Name: Codex
Role: Coding assistant
```

### Objective

Keep selected author attachments from being cleared when required fields are incomplete.

### Why this work was required

Browsers intentionally do not restore file inputs after a server validation redirect. Text fields can use `old(...)`, but selected files are cleared when the page reloads.

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `resources/views/auther/home/createContent.blade.php` | Added client-side validation before submit | Stop incomplete forms before selected files are lost |
| `resources/views/auther/home/editContentPage.blade.php` | Added the same validation guard | Keep edit uploads selected until the form is valid |
| `myjournal.md` | Added this entry | Keep the project record complete |

### Implementation summary

The author create and edit forms now validate required fields, URL format, allowed file extensions, and the 10 MB total resource limit before submitting. Server-side validation remains the authority.

### Tests performed

```powershell
php artisan test
```

### Result

```text
Completed
```

### Remaining issues

If the server rejects a request for a reason the browser cannot pre-check, selected files can still be cleared by the redirect. A future enhancement could add temporary draft upload storage, but this pass fixes the normal incomplete-field workflow.

---

## Entry 010 - Refresh footer navigation and demo text

### Date and time

```text
2026-07-18 15:16 +07:00
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

Replace dead footer links with real app destinations or plain demo text, and update the footer branding to Phan Mee Eain Learning Hub.

### Why this work was required

The footer still pointed to placeholder `.php` pages that were returning 404s.

### Starting state

Footer navigation in the admin, user, and guest layouts still used old static demo routes such as `/browse.php`, `/contact.php`, and `/admin-feed.php`.

### Evidence before change

```text
Footer clicks were resolving to placeholder pages rather than the Laravel app routes.
```

### Files changed

| File | Change | Reason |
| --- | --- | --- |
| `resources/views/admin/layout/master.blade.php` | Updated footer links, demo text, branding, and copyright | Remove dead links from the admin layout |
| `resources/views/user/layout/master.blade.php` | Updated footer links, demo text, branding, and copyright | Remove dead links from the user layout |
| `resources/views/user/guest/guestUser.blade.php` | Updated footer links, demo text, branding, and copyright | Remove dead links from the guest layout |
| `myjournal.md` | Added this entry | Keep the project record complete |

### Decision made

Keep only real links for pages that exist now, and turn the remaining footer items into honest demo copy.

### Security impact

No material security impact.

### Performance impact

```text
No runtime performance impact
```

### Test performed

```text
php artisan test
```

### Result

```text
Completed
```

### Remaining issues

None currently known from this footer update.

### Project-book material

This small cleanup shows how a student project can gradually replace placeholder navigation with real application routes while keeping the UI honest about which pages exist and which are still demo copy.

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

## AI Companion Persona and Styling Update

**Date**: 2026-07-18
**Context**: The user wanted to change the AI companion's persona from "Summie" to "The Great Guru", an empathetic but professional mythical mentor. The AI needed to avoid self-introducing in the chat responses, as the introduction is already provided in the fixed welcome message. Additionally, the widget UI required updates to match the new persona and a modern design.

### What was attempted
- Update the system instructions in `PromptBuilder.php` to define the "Great Guru" persona.
- Update the hardcoded welcome messages in `widget.js`.
- Replace the floating widget button icon with `floating_guru_flipped.svg`.
- Modernize the widget UI styling with a blue gradient and properly mask the circular button.

### Commands executed
```powershell
php artisan view:clear
```

### Files changed
- `packages/Local/AiCompanion/src/Services/PromptBuilder.php`: Updated system prompt persona and added constraints against self-introduction.
- `packages/Local/AiCompanion/public/ai-companion/widget.js` & `public/vendor/ai-companion/ai-companion/widget.js`: Updated welcome message to "Hola, I am the Great Guru...".
- `packages/Local/AiCompanion/resources/views/widget.blade.php`: Replaced the inline SVG with an `<img>` tag referencing `guru_icon.svg`.
- `packages/Local/AiCompanion/public/ai-companion/widget.css` & `public/vendor/ai-companion/ai-companion/widget.css`: Updated toggle button to 96x96 pixels, masked with `overflow: hidden`, and updated theme colors to a UI-friendly blue gradient.
- `public/vendor/ai-companion/ai-companion/guru_icon.svg` & `packages/Local/AiCompanion/public/ai-companion/guru_icon.svg`: Added the new SVG image.

### Architectural decisions
- Moved from inline SVG to an `<img>` tag referencing an external SVG file, as the new SVG contained a large embedded Base64 image which would bloat the blade template.
- Sized the button directly in CSS to fully enclose and mask the image, maintaining the circular shape and preventing transparent edges.

### Test results
- The AI correctly responds in the persona of an empathetic mentor without re-introducing itself.
- The UI reflects the new "Great Guru" icon, now properly scaled (1.5x) and themed with modern blue accents.

## Rename Summie to Guru in UI and Code

**Date**: 2026-07-18
**Context**: Following the persona change to "The Great Guru", the user requested that all remaining instances of the old name "Summie" be replaced with "Guru" across the application, including the loading text and underlying CSS classes/HTML IDs.

### What was attempted
- Replace the loading text "Summie is thinking..." with "Guru will enlighten you soon...".
- Globally replace all occurrences of `summie` (case-insensitive where applicable, preserving camelCase/kebab-case) with `guru` in the widget's JS, CSS, Blade files, and documentation.

### Commands executed
```powershell
php artisan view:clear
git add .
git commit -m "refactor: rename Summie to Guru across widget UI and code"
```

### Files changed
- `packages/Local/AiCompanion/resources/views/widget.blade.php`
- `packages/Local/AiCompanion/public/ai-companion/widget.js` & `public/vendor/ai-companion/ai-companion/widget.js`
- `packages/Local/AiCompanion/public/ai-companion/widget.css` & `public/vendor/ai-companion/ai-companion/widget.css`
- `packages/Local/AiCompanion/README.md`
- `webhelper.md`
- `packages/Local/AiCompanion/src/Http/Controllers/AiChatController.php` (comments)
- `packages/Local/AiCompanion/src/Services/PromptBuilder.php` (comments)

### Architectural decisions
- Renamed internal DOM IDs and CSS classes (e.g., `#summie-widget` to `#guru-widget`) to ensure the codebase remains consistent with the new product direction, avoiding technical debt where the code domain language lags behind the UI domain language.
