<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import Button from '@/Components/Ui/Button.vue';
import SearchDialog from './SearchDialog.vue';
import ThemeToggle from './ThemeToggle.vue';
import { ref } from 'vue';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

const page = usePage();
const solutionsOpen = ref(false);
const mobileOpen = ref(false);

const solutionsLinks = [
    { label: 'Features', href: '/#features' },
    { label: 'Capabilities', href: '/#capabilities' },
    { label: 'Workflow', href: '/#workflow' },
    { label: 'Platform', href: '/#platform' },
];
</script>

<template>
    <header class="sticky top-0 z-30 border-b border-gray-200 bg-white/90 backdrop-blur dark:border-white/5 dark:bg-gray-950/90">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-4 px-6 py-4 sm:px-8 lg:px-12">
            <!-- Left: Logo + Main nav -->
            <div class="flex items-center gap-6">
                <Link href="/" class="flex shrink-0 items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center rounded-lg border border-brand-400/50 bg-brand-500/10">
                        <span class="font-mono text-xs font-semibold text-brand-700 dark:text-brand-200">PC</span>
                    </div>
                    <p class="text-sm font-semibold text-gray-900 dark:text-white">Papevi</p>
                </Link>

                <!-- Desktop nav -->
                <nav class="hidden items-center gap-1 lg:flex" aria-label="Main navigation">
                    <!-- Solutions dropdown -->
                    <div
                        class="relative"
                        @mouseenter="solutionsOpen = true"
                        @mouseleave="solutionsOpen = false"
                    >
                        <button
                            type="button"
                            class="inline-flex items-center gap-1 rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white"
                            :aria-expanded="solutionsOpen"
                            aria-haspopup="true"
                            @click="solutionsOpen = !solutionsOpen"
                        >
                            Solutions
                            <svg class="size-4 transition" :class="solutionsOpen && 'rotate-180'" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
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
                                class="absolute left-0 top-full z-40 mt-1 w-52 rounded-xl border border-gray-200 bg-white p-1.5 shadow-lg dark:border-white/10 dark:bg-gray-900"
                            >
                                <a
                                    v-for="item in solutionsLinks"
                                    :key="item.label"
                                    :href="item.href"
                                    class="flex rounded-lg px-3 py-2 text-sm text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-300 dark:hover:bg-gray-800 dark:hover:text-white"
                                    @click="solutionsOpen = false"
                                >
                                    {{ item.label }}
                                </a>
                            </div>
                        </Transition>
                    </div>

                    <Link
                        :href="route('use-cases')"
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white"
                    >
                        Use Cases
                    </Link>
                    <Link
                        :href="route('pricing')"
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white"
                    >
                        Pricing
                    </Link>
                    <Link
                        :href="route('about')"
                        class="rounded-md px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 hover:text-gray-900 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-white"
                    >
                        About
                    </Link>
                </nav>
            </div>

            <!-- Right: Utilities + CTA -->
            <div class="flex items-center gap-2">
                <SearchDialog />
                <ThemeToggle />
                <Button :as="Link" :href="route('docs')" variant="ghost" size="sm" class="hidden sm:inline-flex">
                    Docs
                </Button>

                <template v-if="canLogin">
                    <Button
                        v-if="page.props.auth.user"
                        :as="Link"
                        :href="route('dashboard')"
                        variant="brand"
                        size="sm"
                        class="hidden sm:inline-flex"
                    >
                        Dashboard
                    </Button>
                    <Button
                        v-else-if="canRegister"
                        :as="Link"
                        :href="route('register')"
                        variant="brand"
                        size="sm"
                    >
                        Get started
                    </Button>
                    <Button
                        v-else
                        :as="Link"
                        :href="route('login')"
                        variant="brand"
                        size="sm"
                    >
                        Log in
                    </Button>
                </template>

                <!-- Mobile menu toggle -->
                <button
                    type="button"
                    class="inline-flex items-center justify-center rounded-md p-2 text-gray-700 transition hover:bg-gray-100 lg:hidden dark:text-gray-200 dark:hover:bg-gray-800"
                    aria-label="Toggle menu"
                    @click="mobileOpen = !mobileOpen"
                >
                    <svg v-if="!mobileOpen" class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M2 4.75A.75.75 0 0 1 2.75 4h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 4.75Zm0 5A.75.75 0 0 1 2.75 9h14.5a.75.75 0 0 1 0 1.5H2.75A.75.75 0 0 1 2 9.75Zm0 5a.75.75 0 0 1 .75-.75h14.5a.75.75 0 0 1 0 1.5H2.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
                    </svg>
                    <svg v-else class="size-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile nav panel -->
        <Transition
            enter-active-class="transition duration-150 ease-out"
            enter-from-class="-translate-y-2 opacity-0"
            enter-to-class="translate-y-0 opacity-100"
            leave-active-class="transition duration-100 ease-in"
            leave-from-class="translate-y-0 opacity-100"
            leave-to-class="-translate-y-2 opacity-0"
        >
            <div
                v-show="mobileOpen"
                class="border-t border-gray-200 bg-white px-6 pb-6 pt-4 lg:hidden dark:border-white/5 dark:bg-gray-950"
            >
                <nav class="flex flex-col gap-1" aria-label="Mobile navigation">
                    <p class="px-3 pb-1 pt-3 text-xs font-semibold uppercase tracking-[0.16em] text-gray-400 dark:text-gray-500">Solutions</p>
                    <a
                        v-for="item in solutionsLinks"
                        :key="item.label"
                        :href="item.href"
                        class="rounded-lg px-3 py-2 text-sm text-gray-700 transition hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-800"
                        @click="mobileOpen = false"
                    >
                        {{ item.label }}
                    </a>

                    <hr class="my-2 border-gray-200 dark:border-white/5" />

                    <Link
                        :href="route('use-cases')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                        @click="mobileOpen = false"
                    >
                        Use Cases
                    </Link>
                    <Link
                        :href="route('pricing')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                        @click="mobileOpen = false"
                    >
                        Pricing
                    </Link>
                    <Link
                        :href="route('about')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                        @click="mobileOpen = false"
                    >
                        About
                    </Link>
                    <Link
                        :href="route('docs')"
                        class="rounded-lg px-3 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-100 dark:text-gray-200 dark:hover:bg-gray-800"
                        @click="mobileOpen = false"
                    >
                        Docs
                    </Link>

                    <template v-if="canLogin">
                        <hr class="my-2 border-gray-200 dark:border-white/5" />
                        <Link
                            v-if="page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-lg px-3 py-2 text-sm font-medium text-brand-600 transition hover:bg-brand-50 dark:text-brand-400 dark:hover:bg-brand-500/10"
                            @click="mobileOpen = false"
                        >
                            Dashboard
                        </Link>
                        <Link
                            v-else-if="canRegister"
                            :href="route('register')"
                            class="rounded-lg px-3 py-2 text-sm font-medium text-brand-600 transition hover:bg-brand-50 dark:text-brand-400 dark:hover:bg-brand-500/10"
                            @click="mobileOpen = false"
                        >
                            Get started
                        </Link>
                        <Link
                            v-else
                            :href="route('login')"
                            class="rounded-lg px-3 py-2 text-sm font-medium text-brand-600 transition hover:bg-brand-50 dark:text-brand-400 dark:hover:bg-brand-500/10"
                            @click="mobileOpen = false"
                        >
                            Log in
                        </Link>
                    </template>
                </nav>
            </div>
        </Transition>
    </header>
</template>
