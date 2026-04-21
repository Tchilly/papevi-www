<script setup lang="ts">
defineProps<{
    columns: string[];
}>();
</script>

<template>
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                <tr>
                    <th
                        v-for="col in columns"
                        :key="col"
                        class="px-5 py-3 text-left font-medium"
                    >{{ col }}</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                <slot />
            </tbody>
        </table>
    </div>
</template>
