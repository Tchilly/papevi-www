<?php

test('ssr build is configured', function () {
    $packageJson = json_decode(file_get_contents(base_path('package.json')), true, 512, JSON_THROW_ON_ERROR);

    expect($packageJson)
        ->toHaveKey('scripts.build:ssr')
        ->and($packageJson['scripts']['build:ssr'])->toBe('vite build --ssr');

    $viteConfig = file_get_contents(base_path('vite.config.js'));

    expect($viteConfig)->toContain('ssr: "resources/js/ssr.ts"');
    expect(file_exists(resource_path('js/ssr.ts')))->toBeTrue();
});
