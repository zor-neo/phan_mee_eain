# Spring Wisdom Frontend Snapshot

This folder is a portable, standalone frontend snapshot for presentation and backend collaboration. It can be moved outside the main project folder without depending on `spring-wisdom-v1`.

## How to Open

- Open `index.html` to browse every exported screen.
- Open `public/home.html` for the public home page.
- Open `public/access-portal.html` for the login/register page.

The pages work directly from the file system. A static server is optional.

## Contents

- `index.html` lists every exported page.
- `public/` contains public and unauthenticated pages.
- `user/` contains signed-in user pages.
- `author/` contains author pages.
- `admin/` contains admin pages.
- `assets/` contains Spring Wisdom CSS, JavaScript, images, charts, and the static route helper.
- `vendor/` contains local Bootstrap, Bootstrap Icons, and downloaded font files.

## Offline Assets

The presentation copy uses local assets only:

- Bootstrap CSS/JS is stored under `vendor/cdn/`.
- Bootstrap Icons and icon fonts are stored under `vendor/cdn/`.
- Inter and Noto Sans Myanmar font files are stored under `vendor/fonts/`.
- App CSS, JS, and images are stored under `assets/`.

## Static Navigation

The HTML keeps backend-style links such as `/home.php`, `/browse.php`, and `/admin-dashboard.php` so the backend route intent remains clear. For standalone presentation, `assets/js/static-router.js` catches those clicks and opens the matching `.html` snapshot.

This means the same folder can be used in two ways:

- As a static presentation workspace.
- As a frontend reference for backend integration.
