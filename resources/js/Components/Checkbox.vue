<script setup lang="ts">
import { computed } from 'vue';

const emit = defineEmits(['update:checked']);

const props = defineProps<{
    checked: boolean;
    value?: any;
}>();

const proxyChecked = computed({
    get() {
        return props.checked;
    },

    set(val) {
        emit('update:checked', val);
    },
});
</script>

<template>
    <input
        type="checkbox"
        :value="value"
        v-model="proxyChecked"
        class="rounded border-gray-300 text-brand-600 shadow-sm focus:ring-brand-600 dark:border-gray-700 dark:bg-gray-900 dark:text-brand-300 dark:focus:ring-brand-300 dark:focus:ring-offset-gray-900"
    />
</template>
