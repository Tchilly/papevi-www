<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
}>();

const page = usePage();
</script>

<template>
    <section class="border-t border-gray-100 bg-gray-50 px-6 pb-24 pt-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900">
        <div class="mx-auto max-w-6xl rounded-3xl border border-brand-200 bg-white p-10 sm:p-14 dark:border-brand-400/25 dark:bg-gray-950">
            <div class="grid items-center gap-8 lg:grid-cols-[1.4fr_1fr]">
                <div class="space-y-5">
                    <p class="kicker">Get started</p>
                    <h2 class="text-balance text-4xl font-bold tracking-[-0.025em] text-gray-900 sm:text-5xl dark:text-white">
                        Ready to publish without compromise?
                    </h2>
                    <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                        Spin up a workspace, model your content, and ship to any
                        frontend. Your editors and engineers will thank you.
                    </p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                    <Link
                        v-if="canLogin && !page.props.auth.user"
                        :href="route(canRegister ? 'register' : 'login')"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-brand-600/50 bg-brand-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Start free
                    </Link>
                    <Link
                        v-else-if="canLogin"
                        :href="route('dashboard')"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-brand-600/50 bg-brand-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-brand-500 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-brand-400/60 dark:bg-brand-500 dark:hover:bg-brand-400"
                    >
                        Open dashboard
                    </Link>
                    <Link
                        :href="route('docs')"
                        class="inline-flex items-center justify-center gap-2 rounded-xl border border-gray-300 bg-white px-5 py-3 text-sm font-medium text-gray-700 transition hover:border-gray-400 hover:text-gray-900 dark:border-white/15 dark:bg-white/5 dark:text-gray-100 dark:hover:border-white/30 dark:hover:text-white"
                    >
                        Browse the docs
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
