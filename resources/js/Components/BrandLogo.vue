<script setup lang="ts">
import ApplicationLogo from '@/Components/ApplicationLogo.vue';

withDefaults(
    defineProps<{
        name?: string;
        showName?: boolean;
        badge?: string;
        compact?: boolean;
        boxed?: boolean;
    }>(),
    {
        name: 'Papevi',
        showName: true,
        badge: '',
        compact: false,
        boxed: true,
    },
);
</script>

<template>
    <span
        class="inline-flex items-center"
        :class="compact ? 'gap-2' : 'gap-2.5'"
    >
        <span
            class="inline-flex shrink-0 items-center justify-center text-gray-900 dark:text-white"
            :class="[
                compact ? 'h-8 w-8' : 'h-9 w-9',
                boxed
                    ? 'rounded-lg border border-brand-400/50 bg-brand-500/10 ring-1 ring-brand-500/20 dark:border-brand-300/35 dark:bg-brand-400/15 dark:ring-brand-300/20'
                    : '',
            ]"
        >
            <ApplicationLogo :class="compact ? 'h-4 w-4' : 'h-5 w-5'" />
        </span>

        <span
            v-if="showName"
            class="inline-flex items-center gap-2"
        >
            <span class="text-sm font-semibold text-gray-900 dark:text-white">{{ name }}</span>
            <span
                v-if="badge"
                class="rounded border border-gray-200 bg-gray-100 px-1.5 py-0.5 font-mono text-[10px] text-gray-500 dark:border-white/10 dark:bg-white/5 dark:text-gray-400"
            >
                {{ badge }}
            </span>
        </span>
    </span>
</template>
