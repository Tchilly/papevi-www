<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import SearchDialog from './SearchDialog.vue';
import ThemeToggle from './ThemeToggle.vue';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

const page = usePage();
</script>

<template>
    <header class="sticky top-0 z-30 border-b border-gray-200 bg-white/90 backdrop-blur dark:border-white/5 dark:bg-gray-950/90">
        <div class="mx-auto flex max-w-7xl items-center justify-between gap-3 px-6 py-4 sm:px-8 lg:px-12">
            <Link href="/" class="flex items-center gap-3">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg border border-brand-400/50 bg-brand-500/10">
                    <span class="font-mono text-xs font-semibold text-brand-700 dark:text-brand-200">PC</span>
                </div>
                <p class="text-sm font-semibold text-gray-900 dark:text-white">Papevi CMS</p>
            </Link>

            <div class="flex items-center gap-2">
                <SearchDialog />
                <ThemeToggle />
                <Link
                    :href="route('docs')"
                    class="inline-flex h-9 items-center rounded-lg border border-gray-200 bg-gray-50 px-3 text-sm font-medium text-gray-700 transition hover:border-gray-300 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-white/10 dark:bg-white/5 dark:text-gray-200 dark:hover:border-white/20 dark:hover:text-white"
                >
                    Docs
                </Link>

                <template v-if="canLogin">
                    <Link
                        v-if="page.props.auth.user"
                        :href="route('dashboard')"
                        class="inline-flex h-9 items-center rounded-lg border border-brand-600/50 bg-brand-600 px-3 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Dashboard
                    </Link>
                    <Link
                        v-else-if="canRegister"
                        :href="route('register')"
                        class="inline-flex h-9 items-center rounded-lg border border-brand-600/50 bg-brand-600 px-3 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Get started
                    </Link>
                    <Link
                        v-else
                        :href="route('login')"
                        class="inline-flex h-9 items-center rounded-lg border border-brand-600/50 bg-brand-600 px-3 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Log in
                    </Link>
                </template>
            </div>
        </div>
    </header>
</template>
