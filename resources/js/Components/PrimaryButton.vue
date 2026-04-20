<script setup lang="ts">
import Button from '@/Components/Ui/Button.vue';

withDefaults(
    defineProps<{
        type?: 'button' | 'submit' | 'reset';
        loading?: boolean;
    }>(),
    {
        type: 'button',
        loading: false,
    },
);
</script>

<template>
    <Button
        variant="brand"
        size="md"
        v-bind="$props"
    >
        <slot />
    </Button>
</template>
