<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import Button from '@/Components/Ui/Button.vue';
import Heading from '@/Components/Ui/Heading.vue';
</script>

<template>
    <section
        class="border-t border-gray-100 bg-gray-50 px-6 pt-24 pb-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
    >
        <div
            class="mx-auto max-w-6xl rounded-3xl border border-brand-200 bg-white p-10 sm:p-14 dark:border-brand-400/25 dark:bg-gray-950"
        >
            <div class="grid items-center gap-8 lg:grid-cols-[1.4fr_1fr]">
                <div class="space-y-5">
                    <p class="kicker">Get started</p>
                    <Heading
                        as="h2"
                        display="lg"
                        class="text-balance"
                    >
                        Ready to publish without compromise?
                    </Heading>
                    <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                        Sign up for early access and be among the first to try Papevi CMS when we launch.
                    </p>
                </div>
                <div class="flex flex-col gap-3 sm:flex-row lg:flex-col">
                    <Button
                        as="a"
                        href="/#beta"
                        variant="brand"
                        size="lg"
                    >
                        Sign up for beta
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
