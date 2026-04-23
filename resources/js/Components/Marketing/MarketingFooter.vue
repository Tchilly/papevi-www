<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import BrandLogo from '@/Components/BrandLogo.vue';

const year = new Date().getFullYear();
</script>

<template>
    <footer class="border-t border-gray-200 bg-white px-6 py-12 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950">
        <div class="mx-auto grid max-w-7xl gap-10 sm:grid-cols-2 lg:grid-cols-4">
            <div class="space-y-3">
                <div class="flex items-center gap-3">
                    <BrandLogo name="Papevi CMS" />
                </div>
                <p class="text-xs text-gray-600 dark:text-gray-400">
                    Enterprise headless content platform for ambitious teams.
                </p>
            </div>

            <div>
                <p class="text-xs font-semibold tracking-[0.16em] text-gray-600 uppercase dark:text-gray-400">
                    Product
                </p>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li>
                        <a
                            href="/#features"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Features</a
                        >
                    </li>
                    <li>
                        <a
                            href="/#workflow"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Workflow</a
                        >
                    </li>
                    <li>
                        <a
                            href="/#platform"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Platform</a
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('use-cases')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Use Cases</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('pricing')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Pricing</Link
                        >
                    </li>
                </ul>
            </div>

            <div>
                <p class="text-xs font-semibold tracking-[0.16em] text-gray-600 uppercase dark:text-gray-400">
                    Company
                </p>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li>
                        <Link
                            :href="route('about')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >About</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('docs')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Documentation</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('partners')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Partners</Link
                        >
                    </li>
                    <li>
                        <a
                            href="https://github.com/Tchilly/papevi-cms"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            target="_blank"
                            rel="noopener noreferrer"
                            >GitHub</a
                        >
                    </li>
                </ul>
            </div>

            <div>
                <p class="text-xs font-semibold tracking-[0.16em] text-gray-600 uppercase dark:text-gray-400">Legal</p>
                <ul class="mt-3 space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <li>
                        <Link
                            :href="route('privacy')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Privacy policy</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('terms')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Terms of service</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('security')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Security policy</Link
                        >
                    </li>
                    <li>
                        <Link
                            :href="route('trust')"
                            class="rounded transition hover:text-gray-900 hover:underline focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:hover:text-white dark:focus-visible:ring-brand-400"
                            >Trust &amp; compliance</Link
                        >
                    </li>
                </ul>
            </div>
        </div>

        <div
            class="mx-auto mt-10 flex max-w-7xl flex-col items-center justify-between gap-3 border-t border-gray-200 pt-6 text-xs text-gray-700 sm:flex-row dark:border-white/5 dark:text-gray-300"
        >
            <p>&copy; {{ year }} Papevi CMS. All rights reserved.</p>
            <p class="font-mono">papevi.com</p>
        </div>
    </footer>
</template>
