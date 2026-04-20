<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const features = [
    {
        eyebrow: 'Authoring',
        title: 'A workspace editors actually love',
        body: 'Drag-and-drop PageType builder, block-based composition, and a rich text toolbar built around real editorial workflows — with AI writing assistance when you need a head start.',
        bullets: [
            'AI-assisted writing built directly into the editing experience',
            'Track every change with side-by-side version comparison and one-click restore',
            'Comment threads and approval flows built into every page — before it ever goes live',
        ],
    },
    {
        eyebrow: 'Delivery',
        title: 'Publish to any channel',
        body: 'Content flows from Papevi to any screen through a clean, predictable API — with multi-site and multi-locale support built in from day one.',
        bullets: [
            'API-first delivery to web, mobile, kiosk, or any frontend',
            'Consistent JSON schemas your team can build on with confidence',
            'Multi-site and multi-locale — one workspace, every channel',
            'Schedule publish and unpublish to the minute, automatically',
        ],
    },
    {
        eyebrow: 'Control',
        title: 'Your team, always in control',
        body: 'Set who can do what, get sign-off before anything goes live, and have a clear record of every change — without slowing your team down.',
        bullets: [
            'Configurable approval workflows — define who approves per content type',
            'Every action logged with full context: user, time, IP, and exactly what changed',
        ],
    },
];

const onImageLoad = (event: Event) => {
    (event.target as HTMLImageElement).dataset.loaded = 'true';
};

const onImageError = (event: Event) => {
    (event.target as HTMLImageElement).remove();
};
</script>

<template>
    <section
        id="features"
        class="border-t border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
    >
        <div class="mx-auto max-w-3xl text-center">
            <p class="mx-auto kicker">Built for the modern web</p>
            <Heading
                as="h2"
                display="lg"
                class="mt-5"
            >
                Everything you need to ship content.
            </Heading>
            <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                Three pillars — authoring, delivery, and governance — designed to work together so teams can move
                quickly without losing control.
            </p>
        </div>

        <div class="mx-auto mt-20 max-w-6xl space-y-24">
            <div
                v-for="(feature, index) in features"
                :key="feature.title"
                class="grid items-center gap-10 lg:grid-cols-2 lg:gap-16"
                :class="{ 'lg:[&>*:first-child]:order-2': index % 2 === 1 }"
            >
                <div class="space-y-5">
                    <p class="text-xs font-semibold tracking-[0.18em] text-brand-700 uppercase dark:text-brand-400">
                        {{ feature.eyebrow }}
                    </p>
                    <Heading
                        as="h3"
                        class="text-3xl font-bold tracking-[-0.02em] text-balance text-gray-900 sm:text-4xl dark:text-white"
                    >
                        {{ feature.title }}
                    </Heading>
                    <p class="text-base leading-relaxed text-gray-600 sm:text-lg dark:text-gray-300">
                        {{ feature.body }}
                    </p>
                    <ul class="space-y-2.5 pt-2">
                        <li
                            v-for="bullet in feature.bullets"
                            :key="bullet"
                            class="flex items-start gap-3 text-sm text-gray-700 dark:text-gray-200"
                        >
                            <span
                                class="mt-1 inline-flex size-4 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700 dark:bg-brand-500/20 dark:text-brand-400"
                            >
                                <svg
                                    class="size-3"
                                    viewBox="0 0 12 12"
                                    fill="none"
                                    aria-hidden="true"
                                >
                                    <path
                                        d="M2.5 6.5l2.5 2.5 4.5-5"
                                        stroke="currentColor"
                                        stroke-width="1.8"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </span>
                            <span>{{ bullet }}</span>
                        </li>
                    </ul>
                </div>

                <figure class="product-frame">
                    <div class="product-frame-bar">
                        <span class="product-frame-dot"></span>
                        <span class="product-frame-dot"></span>
                        <span class="product-frame-dot"></span>
                        <span class="ml-3 font-mono text-[11px] text-gray-600 dark:text-gray-400">
                            {{ feature.eyebrow.toLowerCase() }}.papevi.app
                        </span>
                    </div>
                    <div class="relative aspect-[4/3] w-full overflow-hidden product-placeholder">
                        <img
                            :src="`/images/marketing/feature-${index + 1}.png`"
                            :alt="feature.title"
                            class="absolute inset-0 h-full w-full object-cover opacity-0 transition data-[loaded=true]:opacity-100"
                            loading="lazy"
                            @load="onImageLoad"
                            @error="onImageError"
                        />
                        <div class="absolute inset-0 flex items-center justify-center text-sm text-gray-400">
                            <span class="font-mono">{{ feature.eyebrow }} preview</span>
                        </div>
                    </div>
                </figure>
            </div>
        </div>
    </section>
</template>
