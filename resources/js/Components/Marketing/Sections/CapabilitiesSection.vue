<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const capabilities = [
    { title: 'PageType builder', body: 'Design content structures visually. Each type gets its own field schema — flexible without losing consistency.' },
    { title: 'Block composition', body: 'Reusable, structured blocks keep every page consistent — a pattern editors love and developers rely on.' },
    { title: 'Revision history', body: 'Every version is saved. Browse edits, compare changes, and restore any earlier version instantly.' },
    { title: 'Multiple sites, one workspace', body: 'One installation, many sites and organisations. Separate content, shared infrastructure and team.' },
    { title: 'Localisation support', body: 'Create locale variants for any content type. Manage translations alongside originals with the same structure and workflow.' },
    { title: 'Media library', body: 'Centralized assets with folder and tag organisation. Upload, resize, and reference across all your content.' },
    { title: 'SEO & metadata', body: 'Set titles, descriptions, canonical URLs, and Open Graph data per entry — built in, no plugin required.' },
    { title: 'Comment-driven review', body: 'Editors and reviewers collaborate with inline comments. No external tools, no lost feedback.' },
    { title: 'Content relationships', body: 'Link and reference content across types. Build rich, connected experiences without duplication.' },
];
</script>

<template>
    <section id="capabilities" class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950">
        <div class="mx-auto max-w-3xl text-center">
            <p class="kicker mx-auto">What's included</p>
            <Heading as="h2" display="lg" class="mt-5">
                Everything in one platform.
            </Heading>
            <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                The editorial tools your team needs — content modeling, media, localisation,
                review, and delivery — without stitching together extra services.
            </p>
        </div>

        <div class="mx-auto mt-14 grid max-w-6xl gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <article
                v-for="cap in capabilities"
                :key="cap.title"
                class="glass-panel group relative h-full p-6 transition hover:border-brand-400/40"
            >
                <Heading as="h3" class="text-base font-semibold text-gray-900 dark:text-white">{{ cap.title }}</Heading>
                <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ cap.body }}</p>
            </article>
        </div>
    </section>
</template>
