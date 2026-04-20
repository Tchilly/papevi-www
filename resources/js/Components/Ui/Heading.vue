<script setup lang="ts">
import { computed, useAttrs } from 'vue';
import { cn } from '@/composables/cn';

defineOptions({ inheritAttrs: false });

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

const attrs = useAttrs();

/** display takes full precedence; otherwise fall back: explicit level → numeric from as tag */
const resolvedLevel = computed<1 | 2 | 3 | 4 | 5 | 6 | null>(() => {
    if (props.display) return null;
    if (props.level !== undefined) return props.level;
    return parseInt(props.as.replace('h', ''), 10) as 1 | 2 | 3 | 4 | 5 | 6;
});

const classes = computed(() =>
    cn(
        'font-serif text-gray-900 dark:text-white',
        props.display === 'xl' && 'text-[3.5rem] font-medium leading-[1.06] tracking-[-0.02em]',
        props.display === 'lg' && 'text-[3rem] font-medium leading-[1.08] tracking-[-0.02em]',
        props.display === 'md' && 'text-[2.5rem] font-medium leading-[1.12] tracking-[-0.01em]',
        resolvedLevel.value === 1 && 'text-[2rem] font-semibold leading-[1.18] tracking-[-0.01em]',
        resolvedLevel.value === 2 && 'text-2xl font-medium leading-[1.30]',
        resolvedLevel.value === 3 && 'text-xl font-medium leading-[1.33]',
        resolvedLevel.value === 4 && 'text-lg font-semibold leading-snug',
        resolvedLevel.value === 5 && 'text-base font-medium leading-normal',
        resolvedLevel.value === 6 && 'text-sm font-medium leading-normal',
        attrs.class as string,
    ),
);
</script>

<template>
    <component
        :is="as"
        v-bind="{ ...attrs, class: undefined }"
        :class="classes"
    >
        <slot />
    </component>
</template>
