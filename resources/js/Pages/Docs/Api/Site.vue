<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import DocsTable from '@/Components/Docs/DocsTable.vue';
import DocsToc from '@/Components/Docs/DocsToc.vue';
import Code from '@/Components/Ui/Code.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

const tocItems = [
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'get-sites-id', label: 'GET /sites/{id}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'attributes', label: 'Attributes' },
];

const baseUrl = 'https://api.papevi.app/api/v1';

const getSiteCurl = 'curl https://api.papevi.app/api/v1/sites/1 \\\n  -H "Authorization: Bearer <token>"';

const siteResponseJson =
    '// GET /sites/{id}\n' +
    '{\n' +
    '  "data": {\n' +
    '    "type": "sites",\n' +
    '    "id": "1",\n' +
    '    "attributes": {\n' +
    '      "name": "My Website",\n' +
    '      "slug": "my-website",\n' +
    '      "description": null,\n' +
    '      "color": "#3b82f6",\n' +
    '      "language": "en",\n' +
    '      "timezone": "UTC",\n' +
    '      "currency": "USD",\n' +
    '      "is_active": true,\n' +
    '      "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '      "updated_at": "2025-03-10T09:00:00+00:00"\n' +
    '    }\n' +
    '  },\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Site API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-700 uppercase dark:text-brand-400">
                    API Reference
                </p>
                <Heading as="h1">Site API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Read metadata about your site. Your API token is scoped to a single site, so this endpoint returns
                    the site it belongs to.
                </p>
            </div>

            <!-- Base URL -->
            <div class="space-y-3">
                <Heading
                    as="h2"
                    id="base-url"
                    :level="3"
                    class="scroll-mt-24"
                    >Base URL</Heading
                >
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
                >
                    <Code
                        lang="bash"
                        :code="baseUrl"
                    />
                </div>
            </div>

            <!-- Endpoints -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="endpoints"
                    :level="3"
                    class="scroll-mt-24"
                    >Endpoints</Heading
                >
                <DocsTable :columns="['Method', 'Path', 'Description']">
                    <tr>
                        <td class="px-5 py-3">
                            <code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code>
                        </td>
                        <td class="px-5 py-3"><code class="font-mono text-xs">/sites/{id}</code></td>
                        <td class="px-5 py-3">Get site metadata</td>
                    </tr>
                </DocsTable>
            </div>

            <!-- GET /sites/{id} -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="get-sites-id"
                    :level="3"
                    class="scroll-mt-24"
                    >GET /sites/{id}</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns the site associated with the API token. The
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">{id}</code> must
                    match the site ID of your token — any other ID returns
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">404</code>.
                </p>

                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
                >
                    <Code
                        lang="bash"
                        :code="getSiteCurl"
                    />
                </div>
            </div>

            <!-- Response format -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="response-format"
                    :level="3"
                    class="scroll-mt-24"
                    >Response format</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Responses follow the
                    <strong class="font-semibold text-gray-800 dark:text-gray-100">JSON:API</strong> specification.
                </p>

                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
                >
                    <Code
                        lang="json"
                        :code="siteResponseJson"
                    />
                </div>
            </div>

            <!-- Attributes -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="attributes"
                    :level="3"
                    class="scroll-mt-24"
                    >Attributes</Heading
                >
                <DocsTable :columns="['Field', 'Type', 'Description']">
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">name</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string</td>
                        <td class="px-5 py-3">Site display name</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">slug</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string</td>
                        <td class="px-5 py-3">URL-safe identifier</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">description</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                        <td class="px-5 py-3">Optional description</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">color</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                        <td class="px-5 py-3">Brand colour hex code</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">language</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string</td>
                        <td class="px-5 py-3">
                            Default language code (e.g. <code class="font-mono text-xs">en</code>)
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">timezone</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string</td>
                        <td class="px-5 py-3">
                            Site timezone (e.g. <code class="font-mono text-xs">UTC</code>,
                            <code class="font-mono text-xs">Europe/London</code>)
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">currency</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">string</td>
                        <td class="px-5 py-3">Currency code (e.g. <code class="font-mono text-xs">USD</code>)</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">is_active</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">boolean</td>
                        <td class="px-5 py-3">Whether the site is active</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">created_at</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">ISO 8601</td>
                        <td class="px-5 py-3">Creation timestamp</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">updated_at</code></td>
                        <td class="px-5 py-3 text-xs text-gray-500">ISO 8601</td>
                        <td class="px-5 py-3">Last updated timestamp</td>
                    </tr>
                </DocsTable>
            </div>
        </div>
    </DocsLayout>
</template>
