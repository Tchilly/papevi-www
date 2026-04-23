<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

import BrandLogo from '@/Components/BrandLogo.vue';
import Button from '@/Components/Ui/Button.vue';

import SearchDialog from './SearchDialog.vue';
import ThemeToggle from './ThemeToggle.vue';

const solutionsOpen = ref(false);
const marketingMobileOpen = ref(false);

const solutionsLinks = [
    { label: 'Features', href: '/#features' },
    { label: 'Capabilities', href: '/#capabilities' },
    { label: 'Workflow', href: '/#workflow' },
    { label: 'Platform', href: '/#platform' },
];

withDefaults(
    defineProps<{
        mobileOpen?: boolean;
        showMobileToggle?: boolean;
        badge?: string;
        showMainNav?: boolean;
    }>(),
    {
        mobileOpen: false,
        showMobileToggle: false,
        badge: '',
        showMainNav: true,
    },
);

defineEmits<{
    (event: 'toggle-mobile'): void;
}>();
</script>

<template>
    <!-- Skip navigation (2.4.1 Bypass Blocks) -->
    <a
        href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 focus:z-50 focus:rounded-lg focus:bg-white focus:px-4 focus:py-2 focus:text-sm focus:font-medium focus:text-gray-900 focus:shadow-lg focus:ring-2 focus:ring-brand-600 focus:outline-none dark:focus:bg-gray-900 dark:focus:text-white dark:focus:ring-brand-400"
        >Skip to main content</a
    >
    <header
        class="sticky top-0 z-40 border-b border-gray-200 bg-white/90 backdrop-blur-md dark:border-white/8 dark:bg-gray-950/90"
    >
        <div class="flex h-14 items-center gap-3 px-4 sm:px-6">
            <button
                v-if="showMobileToggle || showMainNav"
                type="button"
                class="rounded-lg p-1.5 text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 lg:hidden dark:text-gray-400 dark:hover:bg-white/5 dark:hover:text-white"
                :aria-expanded="showMobileToggle ? mobileOpen : marketingMobileOpen"
                @click="showMobileToggle ? $emit('toggle-mobile') : (marketingMobileOpen = !marketingMobileOpen)"
            >
                <svg
                    class="size-5"
                    viewBox="0 0 20 20"
                    fill="none"
                    aria-hidden="true"
                >
                    <path
                        v-if="showMobileToggle ? mobileOpen : marketingMobileOpen"
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

            <Link
                href="/"
                class="flex shrink-0 items-center gap-2.5"
            >
                <BrandLogo
                    compact
                    :boxed="false"
                    :badge="badge"
                />
            </Link>

            <nav
                v-if="showMainNav"
                class="ml-4 hidden items-center gap-1 lg:flex"
                aria-label="Main navigation"
            >
                <div
                    class="relative"
                    @mouseenter="solutionsOpen = true"
                    @mouseleave="solutionsOpen = false"
                >
                    <button
                        type="button"
                        class="inline-flex items-center gap-1 rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white dark:focus-visible:ring-brand-400"
                        :aria-expanded="solutionsOpen"
                        aria-haspopup="true"
                        @click="solutionsOpen = !solutionsOpen"
                    >
                        Solutions
                        <svg
                            class="size-4 transition"
                            :class="solutionsOpen ? 'rotate-180' : ''"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </button>

                    <Transition
                        enter-active-class="transition duration-100 ease-out"
                        enter-from-class="scale-95 opacity-0"
                        enter-to-class="scale-100 opacity-100"
                        leave-active-class="transition duration-75 ease-in"
                        leave-from-class="scale-100 opacity-100"
                        leave-to-class="scale-95 opacity-0"
                    >
                        <div
                            v-show="solutionsOpen"
                            role="menu"
                            class="absolute top-full left-0 z-40 mt-1 w-52 rounded-xl border border-gray-200 bg-white p-1.5 shadow-lg dark:border-white/10 dark:bg-gray-900"
                        >
                            <a
                                v-for="item in solutionsLinks"
                                :key="item.label"
                                :href="item.href"
                                role="menuitem"
                                class="flex rounded-lg px-3 py-2 text-sm text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white dark:focus-visible:ring-brand-400"
                                @click="solutionsOpen = false"
                            >
                                {{ item.label }}
                            </a>
                        </div>
                    </Transition>
                </div>

                <Link
                    :href="route('use-cases')"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white dark:focus-visible:ring-brand-400"
                >
                    Use Cases
                </Link>
                <Link
                    :href="route('pricing')"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white dark:focus-visible:ring-brand-400"
                >
                    Pricing
                </Link>
                <Link
                    :href="route('about')"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white dark:focus-visible:ring-brand-400"
                >
                    About
                </Link>
                <Link
                    :href="route('blog')"
                    class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white dark:focus-visible:ring-brand-400"
                >
                    Blog
                </Link>
            </nav>

            <div class="flex flex-1 items-center justify-end gap-2">
                <SearchDialog />
                <ThemeToggle />

                <template v-if="showMainNav">
                    <Button
                        :as="Link"
                        :href="route('docs')"
                        variant="outline"
                        size="sm"
                        class="hidden sm:inline-flex"
                    >
                        Docs
                    </Button>
                    <Button
                        as="a"
                        href="/#beta"
                        variant="brand"
                        size="sm"
                        class="hidden! md:inline-flex"
                    >
                        Get started
                    </Button>
                </template>
            </div>
        </div>
    </header>

    <Teleport to="body">
        <template v-if="showMainNav">
            <div
                v-if="marketingMobileOpen"
                class="fixed inset-0 top-14 z-30 bg-black/30 lg:hidden"
                aria-hidden="true"
                @click="marketingMobileOpen = false"
            />

            <aside
                id="mobile-nav"
                class="fixed top-14 z-30 h-[calc(100vh-3.5rem)] w-64 shrink-0 overflow-y-auto border-r border-gray-200 bg-white px-4 py-6 transition-transform duration-200 lg:hidden dark:border-white/8 dark:bg-gray-950"
                :class="marketingMobileOpen ? 'translate-x-0' : '-translate-x-full'"
            >
                <nav
                    class="flex flex-col gap-1"
                    aria-label="Mobile navigation"
                >
                    <p
                        class="px-3 pt-3 pb-1 text-xs font-semibold tracking-[0.16em] text-gray-400 uppercase dark:text-gray-500"
                    >
                        Solutions
                    </p>
                    <a
                        v-for="item in solutionsLinks"
                        :key="item.label"
                        :href="item.href"
                        class="rounded-lg px-3 py-2 text-sm text-gray-700 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-300 dark:hover:bg-gray-800 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        {{ item.label }}
                    </a>

                    <hr class="my-2 border-gray-200 dark:border-white/8" />

                    <Link
                        :href="route('use-cases')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        Use Cases
                    </Link>
                    <Link
                        :href="route('pricing')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        Pricing
                    </Link>
                    <Link
                        :href="route('about')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        About
                    </Link>
                    <Link
                        :href="route('blog')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        Blog
                    </Link>
                    <Link
                        :href="route('docs')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-gray-200 dark:hover:bg-gray-800 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        Docs
                    </Link>

                    <hr class="my-2 border-gray-200 dark:border-white/8" />
                    <a
                        href="/#beta"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-brand-700 transition hover:bg-brand-50 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-brand-400 dark:hover:bg-brand-500/10 dark:focus-visible:ring-brand-400"
                        @click="marketingMobileOpen = false"
                    >
                        Get started
                    </a>
                </nav>
            </aside>
        </template>
    </Teleport>
</template>
