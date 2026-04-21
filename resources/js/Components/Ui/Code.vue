<script setup lang="ts">
import hljs from 'highlight.js/lib/core';
import bash from 'highlight.js/lib/languages/bash';
import javascript from 'highlight.js/lib/languages/javascript';
import json from 'highlight.js/lib/languages/json';
import php from 'highlight.js/lib/languages/php';
import typescript from 'highlight.js/lib/languages/typescript';
import xml from 'highlight.js/lib/languages/xml';
import { computed, ref } from 'vue';

import { useCodeTabsContext } from '@/composables/useCodeTabs';

hljs.registerLanguage('typescript', typescript);
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('xml', xml);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('vue', xml);
hljs.registerLanguage('json', json);
hljs.registerLanguage('php', php);

const props = withDefaults(
    defineProps<{
        code: string;
        /** Language for syntax highlighting */
        language?: string;
        /** Alias for language — preferred in slot mode */
        lang?: string;
        /** Tab label — when provided inside a <CodeTabs>, registers this block as a tab */
        label?: string;
    }>(),
    {
        language: 'typescript',
    },
);

const ctx = useCodeTabsContext();

// Self-register synchronously so the tab bar renders correctly on first pass
if (ctx && props.label) {
    ctx.register({
        label: props.label,
        code: props.code,
        language: props.lang ?? props.language,
    });
}

const highlighted = computed(() => {
    const lang = props.lang ?? props.language;
    try {
        return hljs.highlight(props.code.trim(), { language: lang }).value;
    } catch {
        return hljs.highlightAuto(props.code.trim()).value;
    }
});
const copied = ref(false);

async function copy() {
    await navigator.clipboard.writeText(props.code.trim());
    copied.value = true;
    setTimeout(() => (copied.value = false), 2000);
}
</script>

<template>
    <!-- When inside a CodeTabs context, CodeTabs renders the content — this renders nothing -->
    <div
        v-if="!ctx || !label"
        class="group relative"
    >
        <pre
            class="overflow-x-auto bg-gray-100 p-5 text-sm leading-relaxed text-gray-700 dark:bg-gray-900 dark:text-gray-300"
        ><code class="hljs font-mono" v-html="highlighted" /></pre>
        <button
            type="button"
            aria-label="Copy code"
            class="absolute top-3 right-3 rounded-md p-1.5 text-gray-500 opacity-0 transition group-hover:opacity-100 hover:text-gray-200 focus-visible:opacity-100 focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:outline-none dark:focus-visible:ring-brand-400"
            @click="copy"
        >
            <!-- Copy icon -->
            <svg
                v-if="!copied"
                xmlns="http://www.w3.org/2000/svg"
                class="size-4"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.8"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <rect
                    x="9"
                    y="9"
                    width="13"
                    height="13"
                    rx="2"
                />
                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1" />
            </svg>
            <!-- Check icon -->
            <svg
                v-else
                xmlns="http://www.w3.org/2000/svg"
                class="size-4 text-green-400"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                aria-hidden="true"
            >
                <polyline points="20 6 9 17 4 12" />
            </svg>
        </button>
    </div>
</template>

<!-- unscoped: rules target v-html injected spans -->
<style>
/* ── Light mode ─────────────────────────────────────────── */
.hljs {
    color: var(--color-gray-700);
}
.hljs-comment,
.hljs-quote {
    color: var(--color-gray-500);
    font-style: italic;
}
.hljs-keyword,
.hljs-selector-tag,
.hljs-subst,
.hljs-name {
    color: var(--color-yellow-700);
}
.hljs-string,
.hljs-doctag,
.hljs-template-variable,
.hljs-addition {
    color: var(--color-brand-600);
}
.hljs-attr,
.hljs-attribute {
    color: var(--color-gray-800);
}
.hljs-number,
.hljs-literal,
.hljs-symbol,
.hljs-bullet {
    color: var(--color-orange-600);
}
.hljs-built_in,
.hljs-type,
.hljs-class .hljs-title,
.hljs-title.class_,
.hljs-title {
    color: var(--color-yellow-600);
}
.hljs-variable,
.hljs-params,
.hljs-formula {
    color: var(--color-gray-700);
}
.hljs-meta,
.hljs-meta .hljs-keyword,
.hljs-meta .hljs-string {
    color: var(--color-green-600);
}
.hljs-deletion {
    color: var(--color-red-600);
}

/* ── Dark mode ──────────────────────────────────────────── */
.dark .hljs {
    color: var(--color-gray-300);
}
.dark .hljs-comment,
.dark .hljs-quote {
    color: var(--color-gray-500);
    font-style: italic;
}
.dark .hljs-keyword,
.dark .hljs-selector-tag,
.dark .hljs-subst,
.dark .hljs-name {
    color: var(--color-yellow-300);
}
.dark .hljs-string,
.dark .hljs-doctag,
.dark .hljs-template-variable,
.dark .hljs-addition {
    color: var(--color-brand-400);
}
.dark .hljs-attr,
.dark .hljs-attribute {
    color: var(--color-gray-100);
}
.dark .hljs-number,
.dark .hljs-literal,
.dark .hljs-symbol,
.dark .hljs-bullet {
    color: var(--color-orange-300);
}
.dark .hljs-built_in,
.dark .hljs-type,
.dark .hljs-class .hljs-title,
.dark .hljs-title.class_,
.dark .hljs-title {
    color: var(--color-yellow-400);
}
.dark .hljs-variable,
.dark .hljs-params,
.dark .hljs-formula {
    color: var(--color-gray-300);
}
.dark .hljs-meta,
.dark .hljs-meta .hljs-keyword,
.dark .hljs-meta .hljs-string {
    color: var(--color-green-300);
}
.dark .hljs-deletion {
    color: var(--color-red-400);
}

.hljs-strong {
    font-weight: 600;
}
.hljs-emphasis {
    font-style: italic;
}
</style>
