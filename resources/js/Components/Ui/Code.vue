<script setup lang="ts">
import { computed } from 'vue';
import hljs from 'highlight.js/lib/core';
import typescript from 'highlight.js/lib/languages/typescript';
import javascript from 'highlight.js/lib/languages/javascript';
import bash from 'highlight.js/lib/languages/bash';
import xml from 'highlight.js/lib/languages/xml';
import json from 'highlight.js/lib/languages/json';
import php from 'highlight.js/lib/languages/php';
import { useCodeTabsContext } from '@/composables/useCodeTabs';

hljs.registerLanguage('typescript', typescript);
hljs.registerLanguage('javascript', javascript);
hljs.registerLanguage('bash', bash);
hljs.registerLanguage('xml', xml);
hljs.registerLanguage('html', xml);
hljs.registerLanguage('vue', xml);
hljs.registerLanguage('json', json);
hljs.registerLanguage('php', php);

const props = withDefaults(defineProps<{
    code: string;
    /** Language for syntax highlighting */
    language?: string;
    /** Alias for language — preferred in slot mode */
    lang?: string;
    /** Tab label — when provided inside a <CodeTabs>, registers this block as a tab */
    label?: string;
}>(), {
    language: 'typescript',
});

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
</script>

<template>
    <!-- When inside a CodeTabs context, CodeTabs renders the content — this renders nothing -->
    <pre v-if="!ctx || !label" class="overflow-x-auto p-5 text-sm leading-relaxed text-slate-200"><code class="font-mono" v-html="highlighted" /></pre>
</template>

<style>
.hljs-comment,
.hljs-quote {
    color: rgb(107 114 128); /* gray-500 */
}
.hljs-keyword,
.hljs-selector-tag,
.hljs-addition {
    color: rgb(167 139 250); /* violet-400 */
}
.hljs-string,
.hljs-attr,
.hljs-template-tag,
.hljs-template-variable,
.hljs-link {
    color: rgb(74 222 128); /* green-400 */
}
.hljs-number,
.hljs-literal {
    color: rgb(251 146 60); /* orange-400 */
}
.hljs-built_in,
.hljs-attribute {
    color: rgb(96 165 250); /* blue-400 */
}
.hljs-variable {
    color: rgb(226 232 240); /* slate-200 */
}
.hljs-title,
.hljs-class .hljs-title,
.hljs-title.class_ {
    color: rgb(129 200 248); /* sky-300 */
}
.hljs-type,
.hljs-params {
    color: rgb(129 200 248); /* sky-300 */
}
.hljs-name {
    color: rgb(96 165 250); /* blue-400 */
}
.hljs-meta {
    color: rgb(156 163 175); /* gray-400 */
}
.hljs-deletion {
    color: rgb(248 113 113); /* red-400 */
}
.hljs-subst,
.hljs-punctuation {
    color: rgb(148 163 184); /* slate-400 */
}
.hljs-section {
    color: rgb(167 139 250); /* violet-400 */
    font-weight: 600;
}
.hljs-emphasis {
    font-style: italic;
}
.hljs-strong {
    font-weight: 700;
}
</style>
