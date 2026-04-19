<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const capabilities = [
    { title: 'Headless architecture', body: 'API-first delivery with parameter-driven endpoints. Ship to web, mobile, kiosk, or any channel.' },
    { title: 'PageType builder', body: 'Define structured content types with a visual builder. Schema-per-type for safety and flexibility.' },
    { title: 'Block composition', body: 'Reusable, referenceable blocks behave as micro-pagetypes. Compose pages without rebuilding components.' },
    { title: 'Multi-tenancy', body: 'One installation, many organizations and sites. Isolate content, share infrastructure.' },
    { title: 'Roles & permissions', body: 'Admin, Site Owner, Editor, Moderator out of the box. Extend with fine-grained permissions.' },
    { title: 'Audit & versioning', body: 'Every change tracked. Compare revisions, restore safely, and prove what shipped when.' },
    { title: 'Scheduling', body: 'Plan launches and auto-unpublish events. Status is computed live from publish windows.' },
    { title: 'GDPR media', body: 'Consent per person, retention rules, and privacy zones for sensitive assets.' },
    { title: 'Performance', body: 'Built on Laravel, Octane-ready, Redis-cached, and tuned for enterprise traffic patterns.' },
];
</script>

<template>
    <section class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950">
        <div class="mx-auto max-w-3xl text-center">
            <p class="kicker mx-auto">Capabilities</p>
            <Heading as="h2" class="mt-5 text-4xl font-bold tracking-[-0.025em] text-gray-900 sm:text-5xl dark:text-white">
                A complete content operations stack.
            </Heading>
            <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                Production-ready modules across content modeling, delivery, security,
                and operations — documented and ready to use.
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
