<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage<{ betaSuccess?: string }>();

const form = useForm({
    email: '',
});

const betaSuccess = computed(() => page.props.betaSuccess);

function submit() {
    form.post(route('beta-signup'), {
        preserveScroll: true,
        onSuccess: () => form.reset(),
    });
}
</script>

<template>
    <section
        id="beta"
        class="border-t border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
    >
        <div class="mx-auto max-w-6xl rounded-3xl border border-brand-200 bg-white p-10 sm:p-14 dark:border-brand-400/25 dark:bg-gray-950">
            <div class="grid items-center gap-10 lg:grid-cols-[1.4fr_1fr]">
                <div class="space-y-5">
                    <p class="kicker">Early access</p>
                    <Heading as="h2" display="lg" class="text-balance">
                        Get early access to Papevi CMS.
                    </Heading>
                    <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                        We're building the content platform for ambitious teams.
                        Sign up to be first in line when beta access opens.
                    </p>
                </div>

                <div>
                    <!-- Success state -->
                    <div
                        v-if="betaSuccess"
                        class="rounded-xl border border-green-200 bg-green-50 p-6 text-center dark:border-green-500/20 dark:bg-green-500/5"
                    >
                        <svg class="mx-auto size-8 text-green-600 dark:text-green-400" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                            <path d="M8 12.5l2.5 2.5 5-5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <p class="mt-3 text-sm font-medium text-green-800 dark:text-green-300">
                            {{ betaSuccess }}
                        </p>
                    </div>

                    <!-- Form state -->
                    <form v-else @submit.prevent="submit" class="space-y-4">
                        <div>
                            <label for="beta-email" class="sr-only">Email address</label>
                            <input
                                id="beta-email"
                                v-model="form.email"
                                type="email"
                                placeholder="you@company.com"
                                required
                                autocomplete="email"
                                class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-900 placeholder:text-gray-400 focus:border-brand-500 focus:outline-none focus:ring-2 focus:ring-brand-400/40 dark:border-white/10 dark:bg-gray-900 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-brand-400 dark:focus:ring-brand-400/20"
                            />
                            <p
                                v-if="form.errors.email"
                                class="mt-2 text-sm text-red-600 dark:text-red-400"
                            >
                                {{ form.errors.email }}
                            </p>
                        </div>
                        <Button
                            type="submit"
                            variant="brand"
                            size="lg"
                            class="w-full"
                            :loading="form.processing"
                        >
                            Sign up for early access
                        </Button>
                        <p class="text-center text-xs text-gray-500 dark:text-gray-400">
                            No spam. We'll only email you about Papevi CMS.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
