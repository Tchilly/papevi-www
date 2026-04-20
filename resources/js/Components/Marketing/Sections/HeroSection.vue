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
    <section class="relative overflow-hidden bg-gray-950">
        <!-- Brand glow — offset top-right -->
        <div
            class="pointer-events-none absolute right-[-5%] top-[-10%] h-[700px] w-[700px] brand-glow opacity-70"
            aria-hidden="true"
        />

        <!-- Noise texture -->
        <div class="pointer-events-none absolute inset-0 hero-noise opacity-30" aria-hidden="true" />

        <!-- Subtle grid -->
        <div class="pointer-events-none absolute inset-0 atmos-grid" aria-hidden="true" />

        <!-- Bottom gradient fade -->
        <div class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-gray-950 to-transparent" aria-hidden="true" />

        <div class="relative mx-auto grid max-w-7xl items-center gap-12 px-6 py-24 sm:px-8 lg:grid-cols-[1fr_1.15fr] lg:gap-16 lg:px-12 lg:py-32">
            <!-- Left column: copy + CTAs -->
            <div class="flex flex-col">
                <!-- Kicker pill -->
                <div class="mb-6 flex">
                    <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-400/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-brand-300">
                        <span class="size-1.5 rounded-full bg-brand-400 animate-pulse" aria-hidden="true" />
                        Now in beta
                    </span>
                </div>

                <Heading as="h1" display="xl" class="text-balance text-white">
                    The content platform for
                    <span class="bg-gradient-to-r from-brand-300 via-brand-400 to-brand-500 bg-clip-text text-transparent">
                        ambitious teams</span>.
                </Heading>

                <p class="mt-6 max-w-lg text-balance text-lg leading-relaxed text-gray-400">
                    Papevi CMS gives editors a workspace they love and developers an API
                    they trust — with workflow, audit, and compliance built in from day one.
                </p>

                <div class="mt-10 flex flex-wrap gap-3">
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
                    <span class="ml-3 font-mono text-[11px] text-gray-600 dark:text-gray-400">
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
