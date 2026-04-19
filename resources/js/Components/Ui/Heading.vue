<script setup lang="ts">
import { computed } from 'vue';

const props = withDefaults(
    defineProps<{
        /** Rendered HTML element */
        as?: 'h1' | 'h2' | 'h3' | 'h4' | 'h5' | 'h6';
        /**
         * Visual size level — independent of the semantic element.
         * Falls back to the numeric value of `as` (h1→1, h2→2, …) when omitted.
         */
        level?: 1 | 2 | 3 | 4 | 5 | 6;
        /**
         * Display / marketing size — overrides level entirely.
         * xl = 56px Display XL    (hero emphasis)
         * lg = 48px Display Large (section hero)
         * md = 40px Display       (section headline)
         */
        display?: 'xl' | 'lg' | 'md';
    }>(),
    { as: 'h2' },
);

/** display takes full precedence; otherwise fall back: explicit level → numeric from as tag */
const resolvedLevel = computed<1 | 2 | 3 | 4 | 5 | 6 | null>(() => {
    if (props.display) return null;
    if (props.level !== undefined) return props.level;
    return parseInt(props.as.replace('h', ''), 10) as 1 | 2 | 3 | 4 | 5 | 6;
});
</script>

<template>
    <component
        :is="as"
        :class="[
            'font-serif text-gray-900 dark:text-white',
            display === 'xl' && 'text-[3.5rem] font-bold leading-none tracking-[-0.04em]',
            display === 'lg' && 'text-[3rem] font-bold leading-none tracking-[-0.03em]',
            display === 'md' && 'text-[2.5rem] font-semibold leading-[1.05] tracking-[-0.02em]',
            resolvedLevel === 1 && 'text-[2rem] font-bold leading-[1.10] tracking-[-0.02em]',
            resolvedLevel === 2 && 'text-2xl font-bold leading-[1.25] tracking-[-0.01em]',
            resolvedLevel === 3 && 'text-xl font-medium leading-[1.33]',
            resolvedLevel === 4 && 'text-lg font-semibold leading-snug',
            resolvedLevel === 5 && 'text-base font-medium leading-normal',
            resolvedLevel === 6 && 'text-sm font-medium leading-normal',
        ]"
    >
        <slot />
    </component>
</template>
