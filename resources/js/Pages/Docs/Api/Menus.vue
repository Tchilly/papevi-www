<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import DocsToc from '@/Components/Docs/DocsToc.vue';
import DocsTable from '@/Components/Docs/DocsTable.vue';
import Code from '@/Components/Ui/Code.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

const tocItems = [
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'get-menus', label: 'GET /menus' },
    { id: 'get-menus-id', label: 'GET /menus/{id}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'attributes', label: 'Attributes' },
];

const baseUrl = 'https://api.papevi.app/api/v1';

const listMenusCurl = 'curl https://api.papevi.app/api/v1/menus \\\n  -H "Authorization: Bearer <token>"';

const listMenusExampleCurl =
    '# Fetch the primary menu with its items\n' +
    'curl "https://api.papevi.app/api/v1/menus?filter[is_primary]=true&include=items" \\\n' +
    '  -H "Authorization: Bearer <token>"';

const getMenuSlugCurl =
    'curl "https://api.papevi.app/api/v1/menus/main-menu?include=items" \\\n  -H "Authorization: Bearer <token>"';

const menuResponseJson =
    '// GET /menus/{slug}?include=items\n' +
    '{\n' +
    '  "data": {\n' +
    '    "type": "menus",\n' +
    '    "id": "1",\n' +
    '    "attributes": {\n' +
    '      "name": "Primary Navigation",\n' +
    '      "slug": "primary-navigation",\n' +
    '      "description": null,\n' +
    '      "language": "en",\n' +
    '      "is_primary": true,\n' +
    '      "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '      "updated_at": "2025-03-10T09:00:00+00:00"\n' +
    '    },\n' +
    '    "relationships": {\n' +
    '      "items": {\n' +
    '        "data": [\n' +
    '          { "type": "menu-items", "id": "10" }\n' +
    '        ]\n' +
    '      }\n' +
    '    }\n' +
    '  },\n' +
    '  "included": [\n' +
    '    {\n' +
    '      "type": "menu-items",\n' +
    '      "id": "10",\n' +
    '      "attributes": {\n' +
    '        "title": "Home",\n' +
    '        "link_type": "page",\n' +
    '        "url": "/",\n' +
    '        "external_url": null,\n' +
    '        "resolved_url": "/",\n' +
    '        "page_slug": "home",\n' +
    '        "target": "_self",\n' +
    '        "is_visible": true,\n' +
    '        "order": 1,\n' +
    '        "icon": null,\n' +
    '        "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '        "updated_at": "2025-01-01T12:00:00+00:00"\n' +
    '      }\n' +
    '    }\n' +
    '  ],\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Menus API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-600 uppercase dark:text-brand-400">
                    API Reference
                </p>
                <Heading as="h1">Menus API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Fetch navigation menus and their items for your site. Use the
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-sm dark:bg-gray-800"
                        >include=items</code
                    >
                    parameter to load menu items in a single request.
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
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="bash"
                        :code="baseUrl"
                    />
                </div>
            </div>

            <!-- Endpoints overview -->
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
                                <td class="px-5 py-3"><code class="font-mono text-xs">/menus</code></td>
                                <td class="px-5 py-3">List all menus for your site</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code>
                                </td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/menus/{id}</code></td>
                                <td class="px-5 py-3">Get a single menu by slug</td>
                            </tr>
                        </DocsTable>
            </div>

            <!-- GET /menus -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="get-menus"
                    :level="3"
                    class="scroll-mt-24"
                    >GET /menus</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns a paginated list of menus for the authenticated site.
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="bash"
                        :code="listMenusCurl"
                    />
                </div>

                <div class="space-y-3">
                    <p class="text-sm font-medium text-gray-900 dark:text-white">Query parameters</p>
                                        <DocsTable :columns="['Parameter', 'Type', 'Description']">
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">per_page</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">integer</td>
                                    <td class="px-5 py-3">
                                        Results per page (default <code class="font-mono text-xs">15</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">sort</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        One of <code class="font-mono text-xs">name</code>,
                                        <code class="font-mono text-xs">slug</code>,
                                        <code class="font-mono text-xs">created_at</code>,
                                        <code class="font-mono text-xs">updated_at</code>. Prefix with
                                        <code class="font-mono text-xs">-</code> for descending (default
                                        <code class="font-mono text-xs">name</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[name]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Exact name match</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[slug]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Exact slug match</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[language]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Filter by language code (e.g. <code class="font-mono text-xs">en</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[is_primary]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">boolean</td>
                                    <td class="px-5 py-3">
                                        Filter to primary menus only (<code class="font-mono text-xs">true</code> or
                                        <code class="font-mono text-xs">false</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">include</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Pass <code class="font-mono text-xs">items</code> to sideload menu items
                                    </td>
                                </tr>
                            </DocsTable>
                </div>

                <p class="text-sm font-medium text-gray-900 dark:text-white">Example</p>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="bash"
                        :code="listMenusExampleCurl"
                    />
                </div>
            </div>

            <!-- GET /menus/{slug} -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="get-menus-id"
                    :level="3"
                    class="scroll-mt-24"
                    >GET /menus/{slug}</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns a single menu. Returns
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">404</code> if the
                    menu does not belong to your site.
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="bash"
                        :code="getMenuSlugCurl"
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

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        :code="menuResponseJson"
                    />
                </div>
            </div>

            <!-- Menu attributes -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="attributes"
                    :level="3"
                    class="scroll-mt-24"
                    >Attributes</Heading
                >
                <div class="space-y-4">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Menu</p>
                                        <DocsTable :columns="['Field', 'Type', 'Description']">
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">name</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Menu display name</td>
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
                                    <td class="px-5 py-3"><code class="font-mono text-xs">language</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Language code (e.g. <code class="font-mono text-xs">en</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">is_primary</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">boolean</td>
                                    <td class="px-5 py-3">Whether this is the site's primary menu</td>
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

                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">
                        Menu item
                        <span class="font-normal text-gray-500"
                            >(type: <code class="font-mono text-xs">menu-items</code>)</span
                        >
                    </p>
                                        <DocsTable :columns="['Field', 'Type', 'Description']">
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">title</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Link label</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">link_type</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Type of link: <code class="font-mono text-xs">page</code> or
                                        <code class="font-mono text-xs">external</code>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">url</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">Stored URL (may be derived from a linked page)</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">external_url</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">
                                        Explicit external URL when <code class="font-mono text-xs">link_type</code> is
                                        <code class="font-mono text-xs">external</code>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">resolved_url</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">Ready-to-use URL — use this in your navigation</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">page_slug</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">Slug of the linked page, if any</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">description</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">Optional item description</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">target</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Link target (<code class="font-mono text-xs">_self</code> or
                                        <code class="font-mono text-xs">_blank</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">rel</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">
                                        Optional <code class="font-mono text-xs">rel</code> attribute value
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">is_visible</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">boolean</td>
                                    <td class="px-5 py-3">Whether to show this item in navigation</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">custom_params</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">object|null</td>
                                    <td class="px-5 py-3">Additional custom parameters</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">order</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">integer</td>
                                    <td class="px-5 py-3">Sort position within the menu</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">icon</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                    <td class="px-5 py-3">Optional icon identifier</td>
                                </tr>
                            </DocsTable>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
