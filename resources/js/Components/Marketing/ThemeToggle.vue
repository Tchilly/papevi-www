<script setup lang="ts">
import { useAppearance, type Appearance } from '@/composables/useAppearance';

const { appearance } = useAppearance();

const options: { value: Appearance; label: string }[] = [
    { value: 'light', label: 'Light' },
    { value: 'dark', label: 'Dark' },
    { value: 'system', label: 'System' },
];

const cycle = () => {
    const order: Appearance[] = ['light', 'dark', 'system'];
    const next = order[(order.indexOf(appearance.value) + 1) % order.length];
    appearance.value = next;
};
</script>

<template>
    <button
        type="button"
        @click="cycle"
        :title="`Theme: ${appearance}`"
        :aria-label="`Toggle theme (current: ${appearance})`"
        class="inline-flex h-9 w-9 items-center justify-center rounded-lg border border-gray-200 bg-gray-50 text-gray-600 transition hover:border-gray-300 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 dark:border-white/10 dark:bg-white/5 dark:text-gray-300 dark:hover:border-white/20 dark:hover:text-white"
    >
        <svg
            v-if="appearance === 'light'"
            class="size-4"
            viewBox="0 0 20 20"
            fill="none"
            aria-hidden="true"
        >
            <circle cx="10" cy="10" r="3.5" stroke="currentColor" stroke-width="1.6" />
            <path
                d="M10 2v2M10 16v2M2 10h2M16 10h2M4.5 4.5l1.4 1.4M14.1 14.1l1.4 1.4M4.5 15.5l1.4-1.4M14.1 5.9l1.4-1.4"
                stroke="currentColor"
                stroke-width="1.6"
                stroke-linecap="round"
            />
        </svg>
        <svg
            v-else-if="appearance === 'dark'"
            class="size-4"
            viewBox="0 0 20 20"
            fill="none"
            aria-hidden="true"
        >
            <path
                d="M16 11.5A6 6 0 0 1 8.5 4a6 6 0 1 0 7.5 7.5z"
                stroke="currentColor"
                stroke-width="1.6"
                stroke-linejoin="round"
            />
        </svg>
        <svg v-else class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
            <rect
                x="2.5"
                y="4"
                width="15"
                height="10"
                rx="1.5"
                stroke="currentColor"
                stroke-width="1.6"
            />
            <path d="M7 17h6M10 14v3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
        </svg>
        <span class="sr-only">Theme: {{ appearance }}</span>
    </button>
</template>
