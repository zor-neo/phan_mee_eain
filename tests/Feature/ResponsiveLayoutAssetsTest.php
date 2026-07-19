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
        ->toContain('overscroll-behavior: contain');

    expect($widgetJs)
        ->toContain("document.body.classList.add('guru-chat-open')")
        ->toContain("document.body.classList.remove('guru-chat-open')")
        ->toContain("window.matchMedia('(max-width: 520px)').matches");
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
        ->toContain('object-fit: cover')
        ->toContain('padding: 0');
});

test('article fallbacks use wide image while brand logo keeps original logo asset', function () {
    $readerContentView = file_get_contents(resource_path('views/user/home/contentPage.blade.php'));
    $authorContentView = file_get_contents(resource_path('views/auther/home/contents.blade.php'));
    $authorCreateView = file_get_contents(resource_path('views/auther/home/createContent.blade.php'));
    $authorEditView = file_get_contents(resource_path('views/auther/home/editContentPage.blade.php'));

    expect($readerContentView)
        ->toContain("asset('content/image/logo.jpg')")
        ->toContain('max-width: 256px')
        ->toContain('content/image/default-article-wide.jpg');

    expect($authorContentView)->toContain('content/image/default-article-wide.jpg');
    expect($authorCreateView)->toContain('content/image/default-article-wide.jpg');
    expect($authorEditView)->toContain('content/image/default-article-wide.jpg');
});
