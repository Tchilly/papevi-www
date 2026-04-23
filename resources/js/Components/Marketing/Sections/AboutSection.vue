<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const pillars = [
    {
        label: 'Vision',
        text: 'To make great digital publishing feel as natural as writing on paper — only faster, smarter, and connected everywhere.',
    },
    {
        label: 'Mission',
        text: 'We help teams create, manage, and deliver living content through a modern CMS and API platform built for clarity, speed, and scale.',
    },
    {
        label: 'Positioning',
        text: 'For startups and content-driven teams that need speed and structure, Papevi is the writing-first CMS platform that combines intuitive editing with powerful API delivery — so content moves from idea to impact without friction.',
    },
];
</script>

<template>
    <section
        id="about"
        class="relative overflow-hidden bg-gray-950 px-6 py-24 sm:px-8 lg:px-12"
    >
        <!-- Brand glow -->
        <div
            class="pointer-events-none absolute top-[-10%] right-[-5%] h-[700px] w-[700px] opacity-70 brand-glow"
            aria-hidden="true"
        />

        <!-- Noise texture -->
        <div
            class="pointer-events-none absolute inset-0 hero-noise opacity-30"
            aria-hidden="true"
        />

        <!-- Subtle grid -->
        <div
            class="pointer-events-none absolute inset-0 atmos-grid"
            aria-hidden="true"
        />

        <!-- Bottom gradient fade -->
        <div
            class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-gray-950 to-transparent"
            aria-hidden="true"
        />

        <div class="relative mx-auto max-w-6xl">
            <!-- Intro -->
            <div class="mx-auto max-w-3xl text-center">
                <p class="mx-auto kicker">About Papevi</p>
                <Heading
                    as="h2"
                    display="lg"
                    class="mt-5 text-balance text-white"
                >
                    From pen and paper to living digital content.
                </Heading>
                <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-400">
                    Papevi is a writing-first SaaS CMS that turns ideas into publish-ready digital content — fast. From
                    draft to structured content to API delivery, Papevi gives teams a clean editorial workflow and
                    developer-friendly output in one platform.
                </p>
            </div>

            <!-- Brand etymology -->
            <div class="mx-auto mt-16 max-w-3xl rounded-2xl border border-white/10 bg-gray-900 p-8 sm:p-10">
                <p class="text-center text-sm font-medium text-gray-400">The name</p>
                <p class="mt-3 text-center text-base leading-relaxed text-gray-200">
                    <span class="font-semibold text-brand-400">Pa</span> from <em>paper</em>,
                    <span class="font-semibold text-brand-400">pe</span> from <em>pen</em>, and
                    <span class="font-semibold text-brand-400">vi</span> from <em>viva / vivid</em> — symbolizing
                    content that comes alive and is amplified through digital publishing.
                </p>
            </div>

            <!-- Pillars -->
            <div class="mt-20 grid gap-8 sm:grid-cols-3">
                <div
                    v-for="pillar in pillars"
                    :key="pillar.label"
                    class="space-y-3 rounded-xl border border-white/10 bg-gray-900/70 p-6 backdrop-blur"
                >
                    <p class="text-xs font-semibold tracking-[0.18em] text-brand-400 uppercase">
                        {{ pillar.label }}
                    </p>
                    <p class="text-sm leading-relaxed text-gray-400">
                        {{ pillar.text }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</template>
