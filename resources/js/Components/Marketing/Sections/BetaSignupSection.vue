<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
import { useForm, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();

const form = useForm({
    email: '',
});

const betaSuccess = computed(() => (page.props as Record<string, unknown>).betaSuccess as string | undefined);

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
        class="relative overflow-hidden bg-gray-950 px-6 py-32 text-center sm:px-8 lg:py-40"
    >
        <!-- Brand glow -->
        <div class="pointer-events-none absolute inset-0 brand-glow opacity-60" aria-hidden="true" />

        <!-- Noise texture -->
        <div class="pointer-events-none absolute inset-0 hero-noise opacity-40" aria-hidden="true" />

        <!-- Top border accent -->
        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-brand-400/50 to-transparent" aria-hidden="true" />

        <div class="relative mx-auto max-w-3xl space-y-8">
            <!-- Kicker -->
            <div class="flex justify-center">
                <span class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-400/10 px-4 py-1.5 text-xs font-semibold uppercase tracking-[0.12em] text-brand-300">
                    <span class="size-1.5 rounded-full bg-brand-400 animate-pulse" aria-hidden="true" />
                    Early access
                </span>
            </div>

            <!-- Heading -->
            <Heading as="h2" display="xl" class="text-balance text-white">
                Be first to build<br class="hidden sm:block"> with Papevi.
            </Heading>

            <!-- Subtext -->
            <p class="mx-auto max-w-xl text-lg leading-relaxed text-gray-300">
                We're building the content platform for ambitious teams.
                Drop your email and we'll reach out when beta opens.
            </p>

            <!-- Success state -->
            <div
                v-if="betaSuccess"
                class="mx-auto max-w-md rounded-2xl border border-green-500/20 bg-green-500/5 px-8 py-6"
            >
                <svg class="mx-auto size-8 text-green-400" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" />
                    <path d="M8 12.5l2.5 2.5 5-5.5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="mt-3 text-sm font-medium text-green-300">
                    {{ betaSuccess }}
                </p>
            </div>

            <!-- Form -->
            <form
                v-else
                @submit.prevent="submit"
                class="mx-auto flex max-w-md flex-col gap-3 sm:flex-row"
            >
                <div class="flex-1">
                    <label for="beta-email" class="sr-only">Email address</label>
                    <input
                        id="beta-email"
                        v-model="form.email"
                        type="email"
                        placeholder="you@company.com"
                        required
                        autocomplete="email"
                        class="w-full rounded-lg border border-white/10 bg-white/5 px-4 py-3 text-sm text-white placeholder:text-gray-500 backdrop-blur focus:border-brand-400/60 focus:outline-none focus:ring-2 focus:ring-brand-400/30"
                    />
                    <p v-if="form.errors.email" class="mt-2 text-left text-sm text-red-400">
                        {{ form.errors.email }}
                    </p>
                </div>
                <Button
                    type="submit"
                    variant="brand"
                    size="lg"
                    :loading="form.processing"
                    class="shrink-0"
                >
                    Get early access
                </Button>
            </form>

            <p class="text-xs text-gray-500">No spam. Only Papevi updates.</p>
        </div>
    </section>
</template>
