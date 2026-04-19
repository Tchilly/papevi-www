<script setup lang="ts">
import { onBeforeUnmount, onMounted, ref } from 'vue';

const props = defineProps<{
    items: { id: string; label: string }[];
}>();

const activeId = ref('');
const visibleIds = new Set<string>();
let observer: IntersectionObserver | null = null;

function updateActive() {
    for (const item of props.items) {
        if (visibleIds.has(item.id)) {
            activeId.value = item.id;
            return;
        }
    }
}

onMounted(() => {
    observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    visibleIds.add(entry.target.id);
                } else {
                    visibleIds.delete(entry.target.id);
                }
            });
            updateActive();
        },
        { rootMargin: '-80px 0px -55% 0px' },
    );

    props.items.forEach(({ id }) => {
        const el = document.getElementById(id);
        if (el) observer!.observe(el);
    });

    if (window.location.hash) {
        activeId.value = window.location.hash.slice(1);
    }
});

onBeforeUnmount(() => {
    observer?.disconnect();
});
</script>

<template>
    <nav aria-label="Page contents">
        <p class="mb-3 text-[11px] font-semibold uppercase tracking-[0.13em] text-gray-400 dark:text-gray-500">On this page</p>
        <ul class="space-y-px border-l border-gray-200 dark:border-white/10">
            <li v-for="item in items" :key="item.id">
                <a
                    :href="`#${item.id}`"
                    class="-ml-px block border-l-2 py-1 pl-3 text-sm transition"
                    :class="
                        activeId === item.id
                            ? 'border-brand-500 font-medium text-brand-600 dark:border-brand-400 dark:text-brand-400'
                            : 'border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-800 dark:text-gray-400 dark:hover:border-white/20 dark:hover:text-gray-100'
                    "
                >
                    {{ item.label }}
                </a>
            </li>
        </ul>
    </nav>
</template>
