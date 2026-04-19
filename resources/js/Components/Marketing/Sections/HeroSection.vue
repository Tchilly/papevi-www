<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

const page = usePage();

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
                <h1 class="text-balance text-5xl font-bold leading-[1.04] tracking-[-0.035em] text-gray-900 sm:text-6xl dark:text-white">
                    The content platform for
                    <span class="bg-gradient-to-r from-brand-600 via-brand-500 to-brand-400 bg-clip-text text-transparent dark:from-brand-300 dark:via-brand-400 dark:to-brand-500">
                        ambitious teams</span>.
                </h1>

                <p class="mt-5 max-w-lg text-balance text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                    Papevi CMS gives editors a workspace they love and developers an API
                    they trust — with workflow, audit, and compliance built in from day one.
                </p>

                <div class="mt-8 flex flex-wrap gap-3">
                    <Link
                        v-if="canLogin && !page.props.auth.user"
                        :href="route(canRegister ? 'register' : 'login')"
                        class="inline-flex items-center gap-2 rounded-xl border border-brand-600/50 bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Start free
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M4 10h12M11 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </Link>
                    <Link
                        v-else-if="canLogin"
                        :href="route('dashboard')"
                        class="inline-flex items-center gap-2 rounded-xl border border-brand-600/50 bg-brand-600 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Open dashboard
                    </Link>
                    <Link
                        :href="route('docs')"
                        class="inline-flex items-center gap-2 rounded-xl border border-gray-300 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:border-gray-400 hover:text-gray-900 dark:border-white/15 dark:bg-white/5 dark:text-gray-100 dark:hover:border-white/30 dark:hover:text-white"
                    >
                        Read the docs
                    </Link>
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
