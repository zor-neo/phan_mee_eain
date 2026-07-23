<?php

test('mobile layout assets include overflow and chat viewport safeguards', function () {
    $appCss = file_get_contents(public_path('user/css/style.css'));
    $widgetCss = file_get_contents(public_path('vendor/ai-companion/ai-companion/widget.css'));
    $widgetJs = file_get_contents(public_path('vendor/ai-companion/ai-companion/widget.js'));

    expect($appCss)
        ->toContain('overflow-x: hidden')
        ->toContain('text-overflow: ellipsis')
        ->toContain('max-width: calc(100vw - 96px)');

    expect($widgetCss)
        ->toContain('body.guru-chat-open')
        ->toContain('position: fixed')
        ->toContain('calc(100dvh - 108px')
        ->toContain('overscroll-behavior: contain')
        ->toContain('--guru-font-ui: "Inter", "Noto Sans Myanmar", Arial, sans-serif')
        ->toContain('--guru-font-reading: var(--guru-font-ui)')
        ->toContain('.guru-assistant')
        ->toContain('font-family: var(--guru-font-reading)')
        ->not->toContain('Source Serif 4')
        ->not->toContain('Noto Serif Myanmar');

    expect($widgetJs)
        ->toContain("document.body.classList.add('guru-chat-open')")
        ->toContain("document.body.classList.remove('guru-chat-open')")
        ->toContain("window.matchMedia('(max-width: 520px)').matches");
});

test('ai companion widget loads scoped chat fonts only with the widget', function () {
    $widgetView = file_get_contents(base_path('packages/Local/AiCompanion/resources/views/widget.blade.php'));

    expect($widgetView)
        ->toContain('fonts.googleapis.com')
        ->toContain('family=Inter')
        ->toContain('family=Noto+Sans+Myanmar')
        ->not->toContain('family=Noto+Serif+Myanmar')
        ->not->toContain('family=Source+Serif+4')
        ->toContain("asset('vendor/ai-companion/ai-companion/widget.css')");
});

test('published guru widget assets stay synced with package assets', function () {
    expect(file_get_contents(public_path('vendor/ai-companion/ai-companion/widget.css')))
        ->toBe(file_get_contents(base_path('packages/Local/AiCompanion/public/ai-companion/widget.css')));

    expect(file_get_contents(public_path('vendor/ai-companion/ai-companion/widget.js')))
        ->toBe(file_get_contents(base_path('packages/Local/AiCompanion/public/ai-companion/widget.js')));
});

test('content images cover the article frame without inner padding', function () {
    $appCss = file_get_contents(public_path('user/css/style.css'));

    expect($appCss)
        ->toContain('.sw-content-image')
        ->toContain('aspect-ratio: 16 / 9')
        ->toContain('height: 100%')
        ->toContain('object-fit: cover')
        ->toContain('padding: 0');
});

test('landing visual image fills its frame without bottom background bleed', function () {
    $appCss = file_get_contents(public_path('user/css/style.css'));
    $guestView = file_get_contents(resource_path('views/user/guest/guestUser.blade.php'));
    $userDashboardView = file_get_contents(resource_path('views/user/home/userDashboard.blade.php'));

    expect($appCss)
        ->toContain('.sw-visual')
        ->toContain('aspect-ratio: 16 / 9')
        ->toContain('min-height: 0')
        ->toContain('position: relative')
        ->toContain('position: absolute')
        ->toContain('inset: 0')
        ->toContain('object-fit: cover');

    expect($guestView)
        ->toContain("asset('user/images/featured_img-1600.webp')")
        ->toContain('width="1600" height="838"');

    expect($userDashboardView)
        ->toContain("asset('user/images/featured_img-1600.webp')")
        ->toContain('width="1600" height="838"');

    expect(filesize(public_path('user/images/featured_img-1600.webp')))->toBeLessThan(700 * 1024);
});

test('article fallbacks use wide image while brand logo keeps original logo asset', function () {
    $readerContentView = file_get_contents(resource_path('views/user/home/contentPage.blade.php'));
    $authorContentView = file_get_contents(resource_path('views/auther/home/contents.blade.php'));
    $authorCreateView = file_get_contents(resource_path('views/auther/home/createContent.blade.php'));
    $authorEditView = file_get_contents(resource_path('views/auther/home/editContentPage.blade.php'));

    expect($readerContentView)
        ->toContain("asset('content/image/logo1-square.jpg')")
        ->toContain('Knowledge and Education')
        ->toContain('text-primary')
        ->toContain('max-width: 256px')
        ->toContain('content/image/default-article-wide.jpg');

    expect($authorContentView)->toContain('content/image/default-article-wide.jpg');
    expect($authorCreateView)->toContain('content/image/default-article-wide.jpg');
    expect($authorEditView)->toContain('content/image/default-article-wide.jpg');
});

test('laravel layouts do not load the static prototype router', function () {
    $adminLayout = file_get_contents(resource_path('views/admin/layout/master.blade.php'));
    $userLayout = file_get_contents(resource_path('views/user/layout/master.blade.php'));
    $guestLayout = file_get_contents(resource_path('views/user/guest/guestUser.blade.php'));
    $staticRouter = file_get_contents(public_path('user/js/static-router.js'));

    expect($adminLayout)->not->toContain('static-router.js');
    expect($userLayout)->not->toContain('static-router.js');
    expect($guestLayout)->not->toContain('static-router.js');

    expect($staticRouter)
        ->toContain('endsWith(".html")')
        ->toContain('data-static-router');
});
