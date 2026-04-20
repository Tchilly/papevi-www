<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const pillars = [
    {
        icon: `<path d="M12 3L4 7v5c0 4.418 3.582 8 8 8s8-3.582 8-8V7l-8-4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" fill="none"/>`,
        label: 'NIS-2',
        title: 'NIS-2 ready*',
        body: 'Role-based access controls, incident-response audit trails, and platform hardening align with the EU NIS-2 Directive obligations for network and information security.',
    },
    {
        icon: `<path d="M12 2C8.134 2 5 5.134 5 9c0 4.5 7 13 7 13s7-8.5 7-13c0-3.866-3.134-7-7-7zm0 9.5A2.5 2.5 0 1112 6.5a2.5 2.5 0 010 5z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" fill="none"/>`,
        label: 'GDPR',
        title: 'GDPR by design',
        body: "Data residency in the EU, media consent and retention controls, right-to-erasure tooling, and a Data Processing Agreement available on request.",
    },
    {
        icon: `<path d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" fill="none"/>`,
        label: 'WCAG 2.2',
        title: 'WCAG 2.2 AA',
        body: 'The admin interface targets WCAG 2.2 Level AA — keyboard navigation, focus management, screen-reader semantics, and sufficient colour contrast throughout.',
    },
    {
        icon: `<path d="M5 12h14M5 12l4-4m-4 4l4 4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/><rect x="3" y="3" width="7" height="7" rx="1" stroke="currentColor" stroke-width="1.6" fill="none"/><rect x="14" y="14" width="7" height="7" rx="1" stroke="currentColor" stroke-width="1.6" fill="none"/>`,
        label: 'Data',
        title: 'EU data residency',
        body: 'All data is stored and processed within the European Union. We will never sell or share your data with third parties. Privacy is a design principle, not an afterthought.',
    },
    {
        icon: `<path d="M15 7a3 3 0 11-6 0 3 3 0 016 0zM17 21v-2a4 4 0 00-3-3.87M7 21v-2a4 4 0 013-3.87" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" fill="none"/><path d="M16 11l2 2 4-4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>`,
        label: 'RBAC',
        title: 'Granular access control',
        body: 'Every action is gated by role-based permissions. Assign Editor, Reviewer, Publisher, or Admin roles per site — with a full audit trail of who did what and when.',
    },
    {
        icon: `<path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" fill="none"/>`,
        label: 'Audit',
        title: 'Immutable audit log',
        body: 'Every content change, publish event, and access action is recorded with timestamp, user ID, and IP. Exportable on demand for regulatory review.',
    },
];
</script>

<template>
    <section
        id="trust"
        class="relative border-t border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
    >
        <!-- Subtle left glow — dark mode only -->
        <div
            class="pointer-events-none absolute left-[-10%] top-1/2 hidden h-[500px] w-[500px] -translate-y-1/2 brand-glow opacity-10 dark:block"
            aria-hidden="true"
        />

        <div class="relative mx-auto max-w-6xl">
            <!-- Header -->
            <div class="max-w-2xl">
                <p class="kicker">Trust &amp; compliance</p>
                <Heading as="h2" display="md" class="mt-5 text-balance">
                    Built for regulated teams and demanding auditors.
                </Heading>
                <p class="mt-4 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                    Papevi ships with the compliance controls that procurement teams ask for — not as add-ons, but as core platform features.
                </p>
            </div>

            <!-- Pillars grid -->
            <div class="mt-16 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <div
                    v-for="pillar in pillars"
                    :key="pillar.label"
                    class="group relative flex flex-col gap-4 rounded-xl border border-gray-200 bg-white p-7 dark:border-white/8 dark:bg-gray-950"
                >
                    <!-- Top accent line on hover -->
                    <div class="absolute inset-x-0 top-0 h-px rounded-t-xl bg-gradient-to-r from-transparent via-brand-400/0 to-transparent transition group-hover:via-brand-400/50" aria-hidden="true" />

                    <!-- Icon -->
                    <div class="flex h-10 w-10 items-center justify-center rounded-xl border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-5 text-brand-700 dark:text-brand-400" viewBox="0 0 24 24" fill="none" aria-hidden="true" v-html="pillar.icon" />
                    </div>

                    <!-- Label / title -->
                    <div>
                        <p class="font-mono text-[10px] font-semibold uppercase tracking-[0.14em] text-brand-700 dark:text-brand-400">{{ pillar.label }}</p>
                        <Heading as="h3" class="mt-1">{{ pillar.title }}</Heading>
                    </div>

                    <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ pillar.body }}</p>
                </div>
            </div>

            <!-- Footer note -->
            <p class="mt-8 text-center text-xs text-gray-600 dark:text-gray-400">
                * NIS-2 implementation is in progress. Current status and our roadmap are available on request.
            </p>
        </div>
    </section>
</template>
