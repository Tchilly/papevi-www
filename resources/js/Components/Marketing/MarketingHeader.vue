<script setup lang="ts">
import { Link, usePage } from '@inertiajs/vue3';
import Button from '@/Components/Ui/Button.vue';
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
                <Button :as="Link" :href="route('about')" variant="ghost" size="sm">
                    About
                </Button>
                <Button :as="Link" :href="route('docs')" variant="ghost" size="sm">
                    Docs
                </Button>

                <template v-if="canLogin">
                    <Button
                        v-if="page.props.auth.user"
                        :as="Link"
                        :href="route('dashboard')"
                        variant="brand"
                        size="sm"
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
            </div>
        </div>
    </header>
</template>
