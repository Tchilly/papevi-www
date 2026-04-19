<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
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
                    <Heading as="h2" display="lg" class="text-balance">
                        Ready to publish without compromise?
                    </Heading>
                    <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                        Spin up a workspace, model your content, and ship to any
                        frontend. Your editors and engineers will thank you.
                    </p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                    <Button
                        v-if="canLogin && !page.props.auth.user"
                        :as="Link"
                        :href="route(canRegister ? 'register' : 'login')"
                        variant="brand"
                        size="lg"
                    >
                        Start free
                    </Button>
                    <Button
                        v-else-if="canLogin"
                        :as="Link"
                        :href="route('dashboard')"
                        variant="brand"
                        size="lg"
                    >
                        Open dashboard
                    </Button>
                    <Button
                        :as="Link"
                        :href="route('docs')"
                        variant="outline"
                        size="lg"
                    >
                        Browse the docs
                    </Button>
                </div>
            </div>
        </div>
    </section>
</template>
