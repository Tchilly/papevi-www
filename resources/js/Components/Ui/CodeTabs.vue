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
        class="overflow-hidden rounded-xl border border-white/10 bg-gray-950"
        @update:model-value="setActive"
    >
        <!--
            Slot children (<Code label="..." />) render here first (hidden) so they
            self-register synchronously before the tab bar and content panels render.
        -->
        <div class="hidden" aria-hidden="true">
            <slot />
        </div>

        <!-- Tab bar -->
        <TabsList
            class="relative flex border-b border-white/10 bg-white/[0.03]"
            aria-label="Code examples"
        >
            <TabsIndicator
                class="absolute bottom-0 left-0 h-0.5 w-[--reka-tabs-indicator-size] translate-x-[--reka-tabs-indicator-position] bg-brand-400 transition-[width,transform] duration-200"
            />
            <TabsTrigger
                v-for="item in items"
                :key="item.label"
                :value="item.label"
                class="relative px-4 py-2.5 text-xs font-medium text-gray-500 transition-colors select-none hover:text-gray-200 data-[state=active]:bg-white/[0.06] data-[state=active]:text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 focus-visible:ring-inset"
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
            <Code :code="item.code" :language="item.language" />
        </TabsContent>
    </TabsRoot>
</template>
