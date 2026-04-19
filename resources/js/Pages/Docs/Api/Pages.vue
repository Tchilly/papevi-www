<script setup lang="ts">
import CodeTabs from '@/Components/Ui/CodeTabs.vue';
import Code from '@/Components/Ui/Code.vue';
import DocsToc from '@/Components/Docs/DocsToc.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';
import { Head } from '@inertiajs/vue3';
import { pagesExamples } from './pagesExamples';

const tocItems = [
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'list-pages', label: 'GET /pages' },
    { id: 'get-pages-slug', label: 'GET /pages/{slug}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'framework-examples', label: 'Code examples' },
];

const baseUrl = 'https://api.papevi.app/api/v1';

const listPagesCurl = 'curl "https://api.papevi.app/api/v1/pages?per_page=10" \\\n  -H "Authorization: Bearer <token>"';

const listPagesJson =
    '{\n' +
    '  "data": [\n' +
    '    {\n' +
    '      "type": "pages",\n' +
    '      "id": "42",\n' +
    '      "attributes": {\n' +
    '        "slug": "getting-started",\n' +
    '        "language": "en",\n' +
    '        "title": "Getting Started",\n' +
    '        "published_at": "2025-03-10T09:00:00+00:00",\n' +
    '        "original_language": null,\n' +
    '        "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '        "updated_at": "2025-03-10T09:00:00+00:00"\n' +
    '      }\n' +
    '    }\n' +
    '  ],\n' +
    '  "meta": {\n' +
    '    "current_page": 1,\n' +
    '    "last_page": 3,\n' +
    '    "per_page": 10,\n' +
    '    "total": 28\n' +
    '  },\n' +
    '  "links": {\n' +
    '    "first": "https://api.papevi.app/api/v1/pages?page=1",\n' +
    '    "last": "https://api.papevi.app/api/v1/pages?page=3",\n' +
    '    "prev": null,\n' +
    '    "next": "https://api.papevi.app/api/v1/pages?page=2"\n' +
    '  },\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';

const getPagesSlugCurl = 'curl https://api.papevi.app/api/v1/pages/getting-started \\\n  -H "Authorization: Bearer <token>"';

const singlePageJson =
    '// GET /pages/{slug} — custom fields merged into attributes\n' +
    '{\n' +
    '  "data": {\n' +
    '    "type": "pages",\n' +
    '    "id": "42",\n' +
    '    "attributes": {\n' +
    '      "slug": "getting-started",\n' +
    '      "language": "en",\n' +
    '      "title": "Getting Started",\n' +
    '      "published_at": "2025-03-10T09:00:00+00:00",\n' +
    '      "original_language": null,\n' +
    '      "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '      "updated_at": "2025-03-10T09:00:00+00:00",\n' +
    '      // your custom page type fields appear here:\n' +
    '      "hero_title": "Welcome",\n' +
    '      "body": "...",\n' +
    '      "blocks": []\n' +
    '    }\n' +
    '  },\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';

const sparseFieldsExample = 'curl "https://api.papevi.app/api/v1/pages?fields[pages]=slug,title" \\\n  -H "Authorization: Bearer <token>"';
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Pages API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">API Reference</p>
                <h1 class="text-4xl font-bold tracking-[-0.025em] text-gray-900 dark:text-white">Pages API</h1>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Fetch published pages for your site. The API only returns pages with published content — draft and scheduled pages return <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-sm dark:bg-gray-800">404</code>. Custom content fields are merged directly into <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-sm dark:bg-gray-800">attributes</code>.
                </p>
            </div>

            <!-- Base URL -->
            <div class="space-y-3">
                <h2 id="base-url" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">Base URL</h2>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code lang="bash" :code="baseUrl" />
                </div>
            </div>

            <!-- Endpoints overview -->
            <div class="space-y-4">
                <h2 id="endpoints" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">Endpoints</h2>
                <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                            <tr>
                                <th class="px-5 py-3 text-left font-medium">Method</th>
                                <th class="px-5 py-3 text-left font-medium">Path</th>
                                <th class="px-5 py-3 text-left font-medium">Description</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code></td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/pages</code></td>
                                <td class="px-5 py-3">List pages for your site</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code></td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/pages/{slug}</code></td>
                                <td class="px-5 py-3">Get a single page by slug</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- GET /pages -->
            <div class="space-y-4">
                <h2 id="list-pages" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">GET /pages</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns a paginated list of published pages for the authenticated site. Use <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">per_page</code> to control page size.
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code lang="bash" :code="listPagesCurl" />
                </div>

                <div class="space-y-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Query parameters</p>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                                <tr>
                                    <th class="px-5 py-3 text-left font-medium">Parameter</th>
                                    <th class="px-5 py-3 text-left font-medium">Type</th>
                                    <th class="px-5 py-3 text-left font-medium">Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">per_page</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">integer</td>
                                    <td class="px-5 py-3">Results per page (default <code class="font-mono text-xs">15</code>)</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">page</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">integer</td>
                                    <td class="px-5 py-3">Page number (default <code class="font-mono text-xs">1</code>)</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">sort</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Field name to sort by. Prefix with <code class="font-mono text-xs">-</code> for descending (e.g. <code class="font-mono text-xs">-created_at</code>)</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[slug]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Exact slug match</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code lang="json" :code="listPagesJson" />
                </div>
            </div>

            <!-- GET /pages/{slug} -->
            <div class="space-y-4">
                <h2 id="get-pages-slug" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">GET /pages/{slug}</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns a single published page by its slug. Unpublished pages return <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">404</code>. The page must belong to the site associated with your token.
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code lang="bash" :code="getPagesSlugCurl" />
                </div>
            </div>

            <!-- Response format -->
            <div class="space-y-4">
                <h2 id="response-format" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">Response format</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Responses follow the <strong class="font-semibold text-gray-800 dark:text-gray-100">JSON:API</strong> specification. Custom content fields from your page type are merged directly into <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">attributes</code> — there is no <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">published_content</code> wrapper. The exact fields depend on your page type configuration.
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code lang="json" :code="singlePageJson" />
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Use sparse fieldsets to limit which attributes are returned:
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code lang="bash" :code="sparseFieldsExample" />
                </div>
            </div>

            <!-- Code examples -->
            <div class="space-y-4">
                <h2 id="framework-examples" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">Code examples</h2>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Ready-to-use clients for listing and rendering pages in common stacks.
                </p>

                <CodeTabs>
                    <Code label="TypeScript" lang="typescript" :code="pagesExamples['TypeScript']" />
                    <Code label="Vue 3" lang="typescript" :code="pagesExamples['Vue 3']" />
                    <Code label="React" lang="typescript" :code="pagesExamples['React']" />
                    <Code label="Svelte" lang="html" :code="pagesExamples['Svelte']" />
                    <Code label="PHP" lang="php" :code="pagesExamples['PHP']" />
                    <Code label="C#" lang="csharp" :code="pagesExamples['C#']" />
                </CodeTabs>
            </div>
        </div>
    </DocsLayout>
</template>
