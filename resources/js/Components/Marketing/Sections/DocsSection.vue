<script setup lang="ts">
const links = [
    { title: 'API & tokens', body: 'Authenticate, fetch pages, and manage tokens.', href: 'https://github.com/Tchilly/papevi-cms/blob/development/docs/api-tokens.md' },
    { title: 'PageType builder', body: 'Model structured content with reusable blocks.', href: 'https://github.com/Tchilly/papevi-cms/blob/development/docs/features/pages/page-type-features.md' },
    { title: 'Roles & permissions', body: 'Predefined roles and the granular permission system.', href: 'https://github.com/Tchilly/papevi-cms/blob/development/docs/roles.md' },
    { title: 'Versioning & audit', body: 'Revision history and audit trails for every change.', href: 'https://github.com/Tchilly/papevi-cms/blob/development/docs/features/pages/versioning-audit-trails.md' },
    { title: 'Publishing & scheduling', body: 'How draft, scheduled, and live states resolve.', href: 'https://github.com/Tchilly/papevi-cms/blob/development/docs/features/pages/page-publishing-scheduling.md' },
    { title: 'GDPR media', body: 'Consent, retention, and privacy zones for assets.', href: 'https://github.com/Tchilly/papevi-cms/blob/development/docs/features/media/media-gdpr-compliance.md' },
];
</script>

<template>
    <section
        id="docs"
        class="border-t border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
    >
        <div class="mx-auto max-w-3xl text-center">
            <p class="kicker mx-auto">Documentation</p>
            <h2 class="mt-5 text-4xl font-bold tracking-[-0.025em] text-gray-900 sm:text-5xl dark:text-white">
                Start where you need to.
            </h2>
            <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                Practical guides for editors, developers, and operators — from API
                tokens to GDPR media controls.
            </p>
        </div>

        <div class="mx-auto mt-14 grid max-w-6xl gap-4 sm:grid-cols-2 lg:grid-cols-3">
            <a
                v-for="doc in links"
                :key="doc.title"
                :href="doc.href"
                target="_blank"
                rel="noopener noreferrer"
                class="glass-panel group flex h-full flex-col justify-between p-6 transition hover:border-brand-400/40"
            >
                <div>
                    <h3 class="flex items-center gap-2 text-base font-semibold text-gray-900 dark:text-white">
                        {{ doc.title }}
                        <svg
                            class="size-4 shrink-0 text-brand-600 transition-transform group-hover:translate-x-0.5 dark:text-brand-400"
                            viewBox="0 0 20 20"
                            fill="none"
                            aria-hidden="true"
                        >
                            <path d="M5 15L15 5M8 5h7v7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </h3>
                    <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ doc.body }}</p>
                </div>
            </a>
        </div>
    </section>
</template>
