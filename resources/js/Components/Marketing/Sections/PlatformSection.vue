<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const stack = [
    { name: 'Laravel 12', detail: 'Backend framework' },
    { name: 'Vue + Inertia', detail: 'Admin experience' },
    { name: 'PostgreSQL', detail: 'Primary datastore' },
    { name: 'Redis', detail: 'Caching layer' },
    { name: 'Octane / FrankenPHP', detail: 'High-throughput runtime' },
    { name: 'Cloudflare CDN', detail: 'Edge delivery' },
];
</script>

<template>
    <section
        id="platform"
        class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950"
    >
        <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
            <div class="space-y-5">
                <p class="kicker">Platform</p>
                <Heading as="h2" class="text-balance text-4xl font-bold tracking-[-0.025em] text-gray-900 sm:text-5xl dark:text-white">
                    A modern stack, ready for production.
                </Heading>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Built on Laravel and Vue. Tuned for high-throughput frontends with
                    Octane, Redis, and a Cloudflare-fronted edge.
                </p>
                <div class="pt-2">
                    <a
                        href="https://github.com/Tchilly/papevi-cms"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 text-sm font-medium text-brand-600 transition hover:text-brand-500 dark:text-brand-400 dark:hover:text-brand-300"
                    >
                        View on GitHub
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path d="M7 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>

            <div class="grid gap-3 sm:grid-cols-2">
                <div v-for="item in stack" :key="item.name" class="glass-panel p-5">
                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ item.name }}</p>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">{{ item.detail }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
