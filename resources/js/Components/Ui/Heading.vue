<script setup lang="ts">
withDefaults(
    defineProps<{
        /** Rendered HTML element */
        as?: 'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'h6';
        /**
         * Visual size level — independent of the semantic element.
         * Defaults to matching the `as` prop (h1→1, h2→2, …).
         */
        level?: 1 | 2 | 3 | 4 | 5 | 6;
    }>(),
    { as: 'h2' },
);
</script>

<template>
    <component
        :is="as"
        :class="[
            'font-serif',
            level === 1 && 'text-4xl font-bold tracking-[-0.025em] leading-tight',
            level === 2 && 'text-2xl font-bold tracking-[-0.015em] leading-snug',
            level === 3 && 'text-xl font-semibold tracking-[-0.01em] leading-snug',
            level === 4 && 'text-lg font-semibold leading-snug',
            level === 5 && 'text-base font-medium leading-normal',
            level === 6 && 'text-sm font-medium leading-normal',
        ]"
    >
        <slot />
    </component>
</template>
