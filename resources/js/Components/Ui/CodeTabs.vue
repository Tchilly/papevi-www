<script setup lang="ts">
import { TabsContent, TabsIndicator, TabsList, TabsRoot, TabsTrigger } from 'reka-ui';

import Code from '@/Components/Ui/Code.vue';
import { provideCodeTabs } from '@/composables/useCodeTabs';

const props = withDefaults(
    defineProps<{
        /** Prop mode: pass examples as { label: code } record */
        examples?: Record<string, string>;
        language?: string;
    }>(),
    { language: 'typescript' },
);

const { items, activeLabel, setActive } = provideCodeTabs();

// Prop mode: pre-register all examples immediately
if (props.examples) {
    for (const [label, code] of Object.entries(props.examples)) {
        items.value.push({ label, code, language: props.language });
    }
}
</script>

<template>
    <TabsRoot
        :model-value="activeLabel"
        class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
        @update:model-value="setActive"
    >
        <!--
            Slot children (<Code label="..." />) render here first (hidden) so they
            self-register synchronously before the tab bar and content panels render.
        -->
        <div
            class="hidden"
            aria-hidden="true"
        >
            <slot />
        </div>

        <!-- Tab bar -->
        <TabsList
            class="relative flex border-b border-gray-200 bg-gray-200/50 dark:border-white/10 dark:bg-white/[0.03]"
            aria-label="Code examples"
        >
            <TabsIndicator
                class="absolute bottom-0 left-0 h-0.5 w-[--reka-tabs-indicator-size] translate-x-[--reka-tabs-indicator-position] bg-brand-400 transition-[width,transform] duration-200 dark:bg-brand-400"
            />
            <TabsTrigger
                v-for="item in items"
                :key="item.label"
                :value="item.label"
                class="relative px-4 py-2.5 text-xs font-medium text-gray-500 transition-colors select-none hover:text-gray-800 focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:outline-none focus-visible:ring-inset data-[state=active]:bg-gray-100/80 data-[state=active]:text-gray-900 dark:hover:text-gray-200 dark:focus-visible:ring-brand-400 dark:data-[state=active]:bg-white/[0.06] dark:data-[state=active]:text-white"
            >
                {{ item.label }}
            </TabsTrigger>
        </TabsList>

        <!-- Tab content panels -->
        <TabsContent
            v-for="item in items"
            :key="item.label"
            :value="item.label"
            class="focus-visible:outline-none"
        >
            <Code
                :code="item.code"
                :language="item.language"
            />
        </TabsContent>
    </TabsRoot>
</template>
