# Guru AI Companion

Guru is a standalone Laravel 12 AI learning companion package using Gemini API.

## Features

- Floating chat widget
- Gemini API integration
- Multiple API key rotation
- Fallback model support
- Session-only memory
- CSRF-protected chat request
- Rate-limited chat endpoint
- Configurable route prefix
- Enable/disable switch from `.env`
- Publishable config and assets

## Environment

```env
AI_COMPANION_ENABLED=true

GEMINI_API_KEY_1=
GEMINI_API_KEY_2=
GEMINI_API_KEY_3=

AI_COMPANION_MODEL=gemini-3.1-flash-lite
AI_COMPANION_FALLBACK_MODEL=gemini-3.5-flash
AI_COMPANION_TIMEOUT=30
```

## Publish config

```bash
php artisan vendor:publish --tag=ai-companion-config
```

## Publish assets

```bash
php artisan vendor:publish --tag=ai-companion-assets --force
```

## Use widget

Add this to any Blade page:

```blade
@include('ai-companion::widget')
```

## Routes

Default prefix:

```text
/ai/session
/ai/chat
/ai/clear
```

The route prefix can be changed in:

```php
config/ai-companion.php
```

## Beginner integration guide for an existing Laravel project

This guide assumes you already have an existing Laravel project and you want to add Guru as a local package.

If your project is plain PHP and not Laravel, this package cannot be installed directly as-is. Guru depends on Laravel features such as service providers, Blade views, routes, config publishing, sessions, CSRF protection, and the HTTP client.

### 1. Check your existing project

Open your existing project folder and make sure it has these files:

```text
artisan
composer.json
routes/web.php
resources/views
config
public
```

If those files exist, you are in a Laravel project.

You can also run:

```bash
php artisan --version
```

This package was built for Laravel 12. If your project uses an older Laravel version, test carefully after installing.

### 2. Copy the package folder

Inside your existing Laravel project, create this folder path if it does not exist:

```text
packages/Local
```

Copy the whole package folder into it:

```text
packages/Local/AiCompanion
```

After copying, your project should look like this:

```text
your-laravel-project/
â”œâ”€â”€ app/
â”œâ”€â”€ config/
â”œâ”€â”€ packages/
â”‚   â””â”€â”€ Local/
â”‚       â””â”€â”€ AiCompanion/
â”‚           â”œâ”€â”€ composer.json
â”‚           â”œâ”€â”€ config/
â”‚           â”œâ”€â”€ public/
â”‚           â”œâ”€â”€ resources/
â”‚           â”œâ”€â”€ routes/
â”‚           â””â”€â”€ src/
â”œâ”€â”€ public/
â”œâ”€â”€ resources/
â”œâ”€â”€ routes/
â”œâ”€â”€ artisan
â””â”€â”€ composer.json
```

### 3. Add the local package repository

Open the main project `composer.json`, not the package `composer.json`.

Add this `repositories` block near the top level:

```json
"repositories": [
    {
        "type": "path",
        "url": "packages/Local/AiCompanion",
        "options": {
            "symlink": true
        }
    }
]
```

If your main `composer.json` already has a `repositories` section, add only the object inside the existing array.

Example:

```json
"repositories": [
    {
        "type": "path",
        "url": "packages/Local/AiCompanion",
        "options": {
            "symlink": true
        }
    },
    {
        "type": "vcs",
        "url": "https://example.com/another/package.git"
    }
]
```

The `symlink` option is useful during development because changes inside `packages/Local/AiCompanion` are used immediately.

### 4. Require the package

From the root of your Laravel project, run:

```bash
composer require local/ai-companion:@dev
```

Then regenerate autoload files:

```bash
composer dump-autoload
```

Laravel should automatically discover the package service provider:

```text
Local\AiCompanion\AiCompanionServiceProvider
```

You normally do not need to manually add the provider.

### 5. Publish the package config

Run:

```bash
php artisan vendor:publish --tag=ai-companion-config
```

This creates:

```text
config/ai-companion.php
```

This file controls whether Guru is enabled, which Gemini keys/models are used, memory size, route prefix, route middleware, and rate limits.

### 6. Publish the frontend assets

Run:

```bash
php artisan vendor:publish --tag=ai-companion-assets --force
```

This copies the widget JavaScript and CSS into:

```text
public/vendor/ai-companion/ai-companion/widget.js
public/vendor/ai-companion/ai-companion/widget.css
```

Run this command again whenever you update the package widget assets.

### 7. Add environment variables

Open your main project `.env` file and add:

```env
AI_COMPANION_ENABLED=true

GEMINI_API_KEY_1=your_real_gemini_key_here
GEMINI_API_KEY_2=
GEMINI_API_KEY_3=

AI_COMPANION_MODEL=gemini-3.1-flash-lite
AI_COMPANION_FALLBACK_MODEL=gemini-3.5-flash
AI_COMPANION_TIMEOUT=30
```

Important:

- Put your real Gemini API key in `GEMINI_API_KEY_1`.
- Leave `GEMINI_API_KEY_2` and `GEMINI_API_KEY_3` empty unless you have extra keys.
- Do not commit real API keys into Git.
- If you change `.env`, clear Laravel config/cache before testing.

Run:

```bash
php artisan optimize:clear
```

### 8. Add the widget to a Blade page

Open any Blade file where you want Guru to appear.

For example:

```text
resources/views/layouts/app.blade.php
```

Add this before the closing `</body>` tag:

```blade
@include('ai-companion::widget')
```

Example:

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Laravel App</title>
</head>
<body>
    <main>
        @yield('content')
    </main>

    @include('ai-companion::widget')
</body>
</html>
```

If your app has a shared layout, adding the include there makes Guru appear on every page that uses that layout.

If you only want Guru on one page, add the include only to that page.

### 9. Confirm routes are registered

Run:

```bash
php artisan route:list --path=ai
```

You should see:

```text
GET|HEAD   ai/session
POST       ai/chat
POST       ai/clear
```

If you changed the route prefix in `config/ai-companion.php`, replace `ai` with your custom prefix:

```bash
php artisan route:list --path=guru
```

### 10. Test in the browser

Start your Laravel app:

```bash
php artisan serve
```

Open your app in the browser:

```text
http://127.0.0.1:8000
```

Expected result:

1. A `Guru` button appears near the bottom-right of the page.
2. Clicking the button opens the chat pane.
3. A welcome message appears.
4. Sending a message shows a loading bubble.
5. Guru replies using the Gemini API.
6. Refreshing the page keeps the current session messages.

Good beginner test prompts:

```text
Explain API to beginner.
```

```text
I am a junior developer. Should I learn Laravel or Vue first?
```

The response should feel like a helpful mentor: clear recommendation, simple reasoning, examples or practice steps when useful, and one guiding question at the end.

### 11. Test enable and disable

To temporarily disable Guru, change `.env`:

```env
AI_COMPANION_ENABLED=false
```

Then run:

```bash
php artisan optimize:clear
```

Refresh the browser.

Expected result:

- The widget disappears.
- The package routes stop registering.

Turn it back on:

```env
AI_COMPANION_ENABLED=true
```

Then run:

```bash
php artisan optimize:clear
```

### 12. Change the route prefix if needed

By default, Guru uses:

```text
/ai/session
/ai/chat
/ai/clear
```

To change this, open:

```text
config/ai-companion.php
```

Change:

```php
'prefix' => 'ai',
```

to:

```php
'prefix' => 'guru',
```

Then run:

```bash
php artisan optimize:clear
php artisan route:list --path=guru
```

The widget uses Laravel named routes, so it should keep working after the prefix changes.

### 13. Common problems and fixes

If the widget does not appear:

- Make sure `AI_COMPANION_ENABLED=true`.
- Make sure you added `@include('ai-companion::widget')` to a Blade page that is actually being rendered.
- Run `php artisan optimize:clear`.
- Check that the page source contains `id="guru-widget"`.

If CSS or JavaScript is missing:

- Run `php artisan vendor:publish --tag=ai-companion-assets --force`.
- Check that these files exist:

```text
public/vendor/ai-companion/ai-companion/widget.css
public/vendor/ai-companion/ai-companion/widget.js
```

If routes are missing:

- Run `composer dump-autoload`.
- Run `php artisan package:discover`.
- Run `php artisan optimize:clear`.
- Check that `local/ai-companion` exists in the main project `composer.json`.
- Check that `AI_COMPANION_ENABLED` is not set to `false`.

If chat returns `419`:

- The CSRF session expired or the page was loaded before the current session token.
- Refresh the page and try again.
- Make sure the route middleware includes `web` in `config/ai-companion.php`.

If chat returns `429`:

- You are hitting the rate limit.
- Wait a moment and try again.
- You can adjust this in `config/ai-companion.php`:

```php
'chat_rate_limit' => 'throttle:10,1',
```

If chat returns `503`:

- Check that `GEMINI_API_KEY_1` is set correctly.
- Check your internet connection and Gemini API access.
- Check Laravel logs:

```bash
tail -f storage/logs/laravel.log
```

On Windows PowerShell, use:

```powershell
Get-Content storage/logs/laravel.log -Wait
```

### 14. Updating the package later

When you edit files inside:

```text
packages/Local/AiCompanion
```

Run these commands from the main Laravel project:

```bash
composer dump-autoload
php artisan optimize:clear
php artisan vendor:publish --tag=ai-companion-assets --force
```

If you changed only PHP prompt or service code, `composer dump-autoload` and `php artisan optimize:clear` are usually enough.

If you changed widget CSS or JavaScript, publish assets again.

### 15. Production checklist

Before deploying:

- Put real Gemini keys in production environment variables.
- Keep `.env` out of Git.
- Set `AI_COMPANION_ENABLED=true`.
- Run `composer install --no-dev --optimize-autoloader`.
- Run `php artisan optimize:clear`.
- Run `php artisan config:cache` if your deployment normally caches config.
- Run `php artisan route:list --path=ai` or your custom prefix.
- Run `php artisan vendor:publish --tag=ai-companion-assets --force` during deployment if assets are not already present.
