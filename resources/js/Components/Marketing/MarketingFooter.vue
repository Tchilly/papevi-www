<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

const year = new Date().getFullYear();
</script>

<template>
    <footer class="border-t border-gray-200 bg-white px-6 py-12 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950">
        <div class="mx-auto grid max-w-7xl gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg border border-brand-400/50 bg-brand-500/10">
                        <span class="font-mono text-xs font-semibold text-brand-700 dark:text-brand-200">PC</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900 dark:text-white">Papevi CMS</p>
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    Enterprise headless content platform for ambitious teams.
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gray-600 dark:text-gray-400">
                    Product
                </p>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li><a href="/#features" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Features</a></li>
                    <li><a href="/#workflow" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Workflow</a></li>
                    <li><a href="/#platform" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Platform</a></li>
                    <li><Link :href="route('use-cases')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Use Cases</Link></li>
                    <li><Link :href="route('pricing')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Pricing</Link></li>
                </ul>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gray-600 dark:text-gray-400">
                    Company
                </p>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li><Link :href="route('about')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">About</Link></li>
                    <li><Link :href="route('docs')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Documentation</Link></li>
                    <li><Link :href="route('partners')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Partners</Link></li>
                    <li>
                        <a
                            href="https://github.com/Tchilly/papevi-cms"
                            class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white"
                            target="_blank"
                            rel="noopener noreferrer"
                        >GitHub</a>
                    </li>
                </ul>
            </div>

            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gray-600 dark:text-gray-400">
                    Legal
                </p>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li><Link :href="route('privacy')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Privacy policy</Link></li>
                    <li><Link :href="route('terms')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Terms of service</Link></li>
                    <li>
                        <Link :href="route('security')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Security policy</Link>
                    </li>
                    <li><Link :href="route('trust')" class="rounded transition hover:underline hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:text-white">Trust &amp; compliance</Link></li>
                </ul>
            </div>
        </div>

        <div class="mx-auto mt-10 flex max-w-7xl flex-col items-center justify-between gap-3 border-t border-gray-200 pt-6 text-xs text-gray-600 sm:flex-row dark:border-white/5">
            <p>&copy; {{ year }} Papevi CMS. All rights reserved.</p>
            <p class="font-mono">papevi.com</p>
        </div>
    </footer>
</template>
