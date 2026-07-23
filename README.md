# PhanMeeEin

[![CI](https://github.com/zor-neo/phan_mee_eain/actions/workflows/ci.yml/badge.svg?branch=main)](https://github.com/zor-neo/phan_mee_eain/actions/workflows/ci.yml)

PhanMeeEin is a Laravel 12 student learning platform. This repository includes a Docker setup for deploying the main Laravel application to Render.

## Docker and Render

The Docker image:

- Builds Vite assets with Node.
- Installs production Composer dependencies.
- Serves only Laravel's `public` directory through Apache.
- Uses Render's `PORT` environment variable.
- Keeps `.env`, `vendor`, `node_modules`, logs, and local caches out of the image context.
- Does not run database migrations automatically on container startup.

Local build check:

```bash
docker build -t phanmeeein:test .
```

Render environment variables must be configured in the Render dashboard, not committed to Git:

```text
APP_ENV=production
APP_DEBUG=false
APP_KEY=[REDACTED]
APP_URL=https://[RENDER_APP_HOST]
TRUSTED_PROXIES=*
SUPERADMIN_PASSWORD=[REDACTED]
DEMO_AUTHOR_PASSWORD=[REDACTED]
DB_CONNECTION=mysql
DB_HOST=[AIVEN_HOST]
DB_PORT=[AIVEN_PORT]
DB_DATABASE=[AIVEN_DATABASE]
DB_USERNAME=[AIVEN_USER]
DB_PASSWORD=[REDACTED]
SESSION_DRIVER=database
SESSION_SECURE_COOKIE=true
CACHE_STORE=database
QUEUE_CONNECTION=database
LOG_CHANNEL=stderr
LOG_STACK=stderr
HEALTH_CHECK_STORAGE_WRITE=false
FILESYSTEM_DISK=s3
UPLOADS_DISK=s3
AWS_ACCESS_KEY_ID=[R2_ACCESS_KEY_ID]
AWS_SECRET_ACCESS_KEY=[REDACTED]
AWS_DEFAULT_REGION=auto
AWS_BUCKET=[R2_BUCKET_NAME]
AWS_ENDPOINT=https://[CLOUDFLARE_ACCOUNT_ID].r2.cloudflarestorage.com
AWS_URL=
AWS_USE_PATH_STYLE_ENDPOINT=true
AI_COMPANION_ENABLED=true
GEMINI_API_KEY_1=[REDACTED]
BRAVE_SEARCH_API_KEY=[REDACTED]
```

Run migrations as a controlled release step:

```bash
php artisan migrate --pretend
php artisan migrate
```

Seed or repair demo data as a controlled setup step after migrations:

```bash
php artisan db:seed --force
```

The main seeder is idempotent. It creates or repairs the superadmin account, demo author accounts, categories, and demo learning contents without truncating tables.

Uploaded profile images, content images, and content resources use Laravel storage. In production set `UPLOADS_DISK=s3` with Cloudflare R2 credentials. The R2 bucket can stay private because the app serves uploaded images through an authenticated Laravel route and downloads resources after Laravel checks the request.

Leave `AWS_URL` empty unless a public R2/custom domain is intentionally configured. The app does not need a public bucket for the current MVP.

Health checks:

- `/up` is Laravel's lightweight process health endpoint and is suitable for Render's normal health check path.
- `/health` returns JSON for operator checks. It verifies application boot, database, cache, and upload-storage configuration.
- Keep `HEALTH_CHECK_STORAGE_WRITE=false` for normal probes. Set it to `true` only when intentionally testing whether the configured upload disk can write/delete a tiny file.

Production operations, smoke tests, and recovery notes are documented in [`docs/PRODUCTION_OPERATIONS.md`](docs/PRODUCTION_OPERATIONS.md).

The live student MVP is expected to be checked after every deploy with the production smoke-test flow in [`docs/DEMO_CHECKLIST.md`](docs/DEMO_CHECKLIST.md).

Architecture boundaries, tier-specific limits, and developed rules for future changes are collected in [`docs/ARCHITECTURAL_BOUNDARIES_AND_LIMITS.md`](docs/ARCHITECTURAL_BOUNDARIES_AND_LIMITS.md).

## CI

GitHub Actions runs on pushes and pull requests to `main`. The workflow installs Composer and Node dependencies, runs the Laravel test suite, validates config and route caching, builds frontend assets, and builds the Docker image.

Latest CI status is visible from the badge above or the [GitHub Actions workflow page](https://github.com/zor-neo/phan_mee_eain/actions/workflows/ci.yml).

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
