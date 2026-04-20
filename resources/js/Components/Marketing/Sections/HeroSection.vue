<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
import { Link } from '@inertiajs/vue3';

const onImageLoad = (event: Event) => {
    (event.target as HTMLImageElement).dataset.loaded = 'true';
};

const onImageError = (event: Event) => {
    (event.target as HTMLImageElement).remove();
};
</script>

<template>
    <section class="relative overflow-hidden bg-white dark:bg-gray-950">
        <!-- Subtle background glow -->
        <div
            class="pointer-events-none absolute right-[-10%] top-[-15%] h-[600px] w-[600px] rounded-full bg-brand-400/8 blur-[120px] dark:bg-brand-500/10"
            aria-hidden="true"
        />
        <div
            class="pointer-events-none absolute bottom-0 left-[-5%] h-[400px] w-[400px] rounded-full bg-brand-300/6 blur-[100px] dark:bg-brand-600/8"
            aria-hidden="true"
        />

        <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-6 py-20 sm:px-8 lg:grid-cols-[1fr_1.15fr] lg:gap-16 lg:px-12 lg:py-28">
            <!-- Left column: copy + CTAs -->
            <div class="flex flex-col">
                <Heading as="h1" display="xl" class="text-balance">
                    The content platform for
                    <span class="bg-gradient-to-r from-brand-600 via-brand-500 to-brand-400 bg-clip-text text-transparent dark:from-brand-300 dark:via-brand-400 dark:to-brand-500">
                        ambitious teams</span>.
                </Heading>

                <p class="mt-5 max-w-lg text-balance text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                    Papevi CMS gives editors a workspace they love and developers an API
                    they trust — with workflow, audit, and compliance built in from day one.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <Button
                        as="a"
                        href="/#beta"
                        variant="brand"
                        size="lg"
                    >
                        <template #icon-right>
                            <svg viewBox="0 0 20 20" fill="none" aria-hidden="true">
                                <path d="M4 10h12M11 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </template>
                        Get early access
                    </Button>
                    <Button
                        :as="Link"
                        :href="route('docs')"
                        variant="outline"
                        size="lg"
                    >
                        Read the docs
                    </Button>
                </div>
            </div>

            <!-- Right column: product frame -->
            <figure class="product-frame">
                <div class="product-frame-bar">
                    <span class="product-frame-dot"></span>
                    <span class="product-frame-dot"></span>
                    <span class="product-frame-dot"></span>
                    <span class="ml-3 font-mono text-[11px] text-gray-500 dark:text-gray-400">
                        papevi.app / editor
                    </span>
                </div>
                <div class="product-placeholder relative aspect-[4/3] w-full overflow-hidden">
                    <img
                        src="/images/marketing/editor-hero.png"
                        alt="Papevi CMS editor interface"
                        class="absolute inset-0 h-full w-full object-cover opacity-0 transition data-[loaded=true]:opacity-100"
                        loading="eager"
                        @load="onImageLoad"
                        @error="onImageError"
                    />
                    <div class="absolute inset-0 flex items-center justify-center text-sm text-gray-400 dark:text-gray-500">
                        <span class="font-mono">Editor preview</span>
                    </div>
                </div>
            </figure>
        </div>
    </section>
</template>
