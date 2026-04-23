<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

import BrandLogo from '@/Components/BrandLogo.vue';
import SearchDialog from '@/Components/Marketing/SearchDialog.vue';
import ThemeToggle from '@/Components/Marketing/ThemeToggle.vue';

const page = usePage();
const mobileOpen = ref(false);

const nav = [
    {
        label: 'Getting Started',
        items: [{ title: 'Getting Started', path: '/docs' }],
    },
    {
        label: 'API Reference',
        items: [
            { title: 'JSON:API', path: '/docs/api/json-api' },
            { title: 'Authentication', path: '/docs/api/authentication' },
            { title: 'Pages API', path: '/docs/api/pages' },
            { title: 'Menus API', path: '/docs/api/menus' },
            { title: 'Taxonomies API', path: '/docs/api/taxonomies' },
            { title: 'Media API', path: '/docs/api/media' },
            { title: 'Site API', path: '/docs/api/site' },
        ],
    },
    {
        label: 'Editor Guide',
        items: [
            { title: 'Workflow & Publishing', path: '/docs/features/workflow' },
            { title: 'Versioning & Audit', path: '/docs/features/versioning' },
        ],
    },
];

const isActive = (path: string) => page.url === path;
</script>

<template>
    <!-- Skip navigation (2.4.1 Bypass Blocks) -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-gray-900 focus:shadow-lg focus:ring-2 focus:ring-brand-600 focus:outline-none dark:focus:bg-gray-900 dark:focus:text-white dark:focus:ring-brand-400"
        >Skip to main content</a
    >
    <div class="min-h-screen bg-white text-gray-900 dark:bg-gray-950 dark:text-gray-100">
        <!-- Header -->
        <header
            class="sticky top-0 z-40 border-b border-gray-200 bg-white/90 backdrop-blur-md dark:border-white/8 dark:bg-gray-950/90"
        >
            <div class="flex h-14 items-center gap-3 px-4 sm:px-6">
                <!-- Mobile toggle -->
                <button
                    type="button"
                    class="rounded-lg p-1.5 text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 lg:hidden dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white"
                    :aria-expanded="mobileOpen"
                    @click="mobileOpen = !mobileOpen"
                >
                    <svg
                        class="size-5"
                        viewBox="0 0 20 20"
                        fill="none"
                        aria-hidden="true"
                    >
                        <path
                            v-if="mobileOpen"
                            d="M5 5L15 15M15 5L5 15"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                        />
                        <path
                            v-else
                            d="M3 6h14M3 10h14M3 14h14"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                        />
                    </svg>
                    <span class="sr-only">Toggle navigation</span>
                </button>

                <!-- Logo -->
                <Link
                    href="/"
                    class="flex shrink-0 items-center gap-2.5"
                >
                    <BrandLogo
                        compact
                        :boxed="false"
                        badge="docs"
                    />
                </Link>

                <div class="flex flex-1 items-center justify-end gap-2">
                    <SearchDialog />
                    <ThemeToggle />
                </div>
            </div>
        </header>

        <!-- Body -->
        <div class="lg:flex">
            <!-- Mobile overlay -->
            <div
                v-if="mobileOpen"
                class="fixed inset-0 top-14 z-30 bg-black/30 lg:hidden"
                aria-hidden="true"
                @click="mobileOpen = false"
            />

            <!-- Sidebar -->
            <aside
                class="fixed top-14 z-30 h-[calc(100vh-3.5rem)] w-64 shrink-0 overflow-y-auto border-r border-gray-200 bg-white px-4 py-6 transition-transform duration-200 lg:sticky lg:translate-x-0 dark:border-white/8 dark:bg-gray-950"
                :class="mobileOpen ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
            >
                <nav>
                    <div
                        v-for="section in nav"
                        :key="section.label"
                        class="mb-7"
                    >
                        <p
                            class="mb-2 px-3 text-[11px] font-semibold tracking-[0.13em] text-gray-400 uppercase dark:text-gray-500"
                        >
                            {{ section.label }}
                        </p>
                        <ul class="space-y-0.5">
                            <li
                                v-for="item in section.items"
                                :key="item.path"
                            >
                                <Link
                                    :href="item.path"
                                    class="flex rounded-md px-3 py-2 text-sm transition"
                                    :class="
                                        isActive(item.path)
                                            ? 'bg-brand-50 font-medium text-brand-700 dark:bg-brand-500/10 dark:text-brand-300'
                                            : 'text-gray-600 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-100'
                                    "
                                    @click="mobileOpen = false"
                                >
                                    {{ item.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>

                    <!-- GitHub link -->
                    <div class="mt-6 border-t border-gray-200 pt-6 dark:border-white/8">
                        <a
                            href="https://github.com/Tchilly/repli-cms"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex items-center gap-2 rounded-md px-3 py-2 text-sm text-gray-600 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-gray-100"
                        >
                            <svg
                                class="size-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M10 0C4.477 0 0 4.477 0 10c0 4.418 2.865 8.166 6.839 9.489.5.092.682-.217.682-.483 0-.237-.008-.866-.013-1.7-2.782.604-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.464-1.11-1.464-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0110 4.836a9.59 9.59 0 012.504.337c1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.741 0 .269.18.58.688.482A10.003 10.003 0 0020 10c0-5.523-4.477-10-10-10z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            GitHub
                        </a>
                    </div>
                </nav>
            </aside>

            <!-- Content + TOC -->
            <div class="flex min-w-0 flex-1 justify-center">
                <div class="flex w-full max-w-328 items-start px-6 sm:px-10">
                    <main
                        id="main-content"
                        class="min-w-0 flex-1 py-12 lg:py-16"
                    >
                        <slot />
                    </main>

                    <!-- Right TOC sidebar -->
                    <aside
                        v-if="$slots.toc"
                        class="sticky top-16 hidden max-h-[calc(100vh-7rem)] w-88 shrink-0 self-start overflow-y-auto py-12 pl-16 lg:py-16 xl:block"
                    >
                        <slot name="toc" />
                    </aside>
                </div>
            </div>
        </div>
    </div>
</template>
