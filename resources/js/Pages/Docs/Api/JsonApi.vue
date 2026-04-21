<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import DocsToc from '@/Components/Docs/DocsToc.vue';
import DocsTable from '@/Components/Docs/DocsTable.vue';
import Code from '@/Components/Ui/Code.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

const tocItems = [
    { id: 'overview', label: 'Overview' },
    { id: 'content-type', label: 'Content type' },
    { id: 'resource-objects', label: 'Resource objects' },
    { id: 'collections', label: 'Collections' },
    { id: 'relationships', label: 'Relationships & includes' },
    { id: 'error-objects', label: 'Error objects' },
    { id: 'version-member', label: 'Version member' },
];

const singleResourceExample =
    '{\n' +
    '  "data": {\n' +
    '    "type": "pages",\n' +
    '    "id": "42",\n' +
    '    "attributes": {\n' +
    '      "slug": "getting-started",\n' +
    '      "title": "Getting Started",\n' +
    '      "language": "en",\n' +
    '      "published_at": "2025-03-10T09:00:00+00:00",\n' +
    '      "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '      "updated_at": "2025-03-10T09:00:00+00:00"\n' +
    '    }\n' +
    '  },\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';

const collectionExample =
    '{\n' +
    '  "data": [\n' +
    '    {\n' +
    '      "type": "pages",\n' +
    '      "id": "42",\n' +
    '      "attributes": { "slug": "getting-started", "title": "Getting Started" }\n' +
    '    },\n' +
    '    {\n' +
    '      "type": "pages",\n' +
    '      "id": "43",\n' +
    '      "attributes": { "slug": "about-us", "title": "About Us" }\n' +
    '    }\n' +
    '  ],\n' +
    '  "meta": {\n' +
    '    "current_page": 1,\n' +
    '    "last_page": 3,\n' +
    '    "per_page": 15,\n' +
    '    "total": 42\n' +
    '  },\n' +
    '  "links": {\n' +
    '    "first": "https://api.papevi.app/api/v1/pages?page=1",\n' +
    '    "last": "https://api.papevi.app/api/v1/pages?page=3",\n' +
    '    "prev": null,\n' +
    '    "next": "https://api.papevi.app/api/v1/pages?page=2"\n' +
    '  },\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';

const relationshipExample =
    '// GET /menus/main-menu?include=items\n' +
    '{\n' +
    '  "data": {\n' +
    '    "type": "menus",\n' +
    '    "id": "1",\n' +
    '    "attributes": { "name": "Main Navigation", "slug": "main-menu" },\n' +
    '    "relationships": {\n' +
    '      "items": {\n' +
    '        "data": [\n' +
    '          { "type": "menu-items", "id": "10" },\n' +
    '          { "type": "menu-items", "id": "11" }\n' +
    '        ]\n' +
    '      }\n' +
    '    }\n' +
    '  },\n' +
    '  "included": [\n' +
    '    {\n' +
    '      "type": "menu-items",\n' +
    '      "id": "10",\n' +
    '      "attributes": { "title": "Home", "resolved_url": "/", "order": 1 }\n' +
    '    },\n' +
    '    {\n' +
    '      "type": "menu-items",\n' +
    '      "id": "11",\n' +
    '      "attributes": { "title": "About", "resolved_url": "/about-us", "order": 2 }\n' +
    '    }\n' +
    '  ],\n' +
    '  "jsonapi": { "version": "1.1" }\n' +
    '}';

const errorExample =
    '// 401 — missing or invalid token\n' +
    '{\n' +
    '  "errors": [\n' +
    '    {\n' +
    '      "status": "401",\n' +
    '      "title": "Unauthorized",\n' +
    '      "detail": "API token is required"\n' +
    '    }\n' +
    '  ]\n' +
    '}\n\n' +
    '// 429 — rate limit exceeded\n' +
    '{\n' +
    '  "errors": [\n' +
    '    {\n' +
    '      "status": "429",\n' +
    '      "title": "Too Many Requests",\n' +
    '      "detail": "Rate limit exceeded",\n' +
    '      "meta": { "retry_after": 60 }\n' +
    '    }\n' +
    '  ]\n' +
    '}';
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="JSON:API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-600 uppercase dark:text-brand-400">
                    API Reference
                </p>
                <Heading as="h1">JSON:API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    All Papevi API endpoints follow the
                    <strong class="font-semibold">JSON:API 1.1</strong> specification — a standardised format for
                    resource responses, relationships, and errors.
                </p>
            </div>

            <!-- Overview -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="overview"
                    :level="3"
                    class="scroll-mt-24"
                    >Overview</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    JSON:API defines a consistent structure for every response, regardless of the resource type. This
                    means the same code pattern works for pages, menus, media, and taxonomies alike.
                </p>
                <div class="grid gap-3 text-sm sm:grid-cols-3">
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Predictable</p>
                        <p class="mt-1 text-gray-500 dark:text-gray-400">
                            Every response has the same top-level shape.
                        </p>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Self-describing</p>
                        <p class="mt-1 text-gray-500 dark:text-gray-400">
                            Resources carry a <code class="font-mono text-xs">type</code> and string
                            <code class="font-mono text-xs">id</code>.
                        </p>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Efficient</p>
                        <p class="mt-1 text-gray-500 dark:text-gray-400">
                            Related resources are sideloaded once in <code class="font-mono text-xs">included</code>.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Content type -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="content-type"
                    :level="3"
                    class="scroll-mt-24"
                    >Content type</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    All responses use the JSON:API media type. You should include it as your
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">Accept</code>
                    header, though it is not required.
                </p>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="bash"
                        code="Content-Type: application/vnd.api+json"
                    />
                </div>
            </div>

            <!-- Resource objects -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="resource-objects"
                    :level="3"
                    class="scroll-mt-24"
                    >Resource objects</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    A single resource is returned under
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">data</code>.
                    Every resource object has three required members:
                </p>
                <DocsTable :columns="['Member', 'Type', 'Description']">
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">type</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                <td class="px-5 py-3">
                                    Resource type name (e.g. <code class="font-mono text-xs">pages</code>,
                                    <code class="font-mono text-xs">menus</code>)
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">id</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                <td class="px-5 py-3">
                                    Resource identifier — always a string even when the underlying value is numeric
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">attributes</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">object</td>
                                <td class="px-5 py-3">
                                    Resource fields. Foreign keys are never exposed here — use relationships instead
                                </td>
                            </tr>
                        </DocsTable>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        :code="singleResourceExample"
                    />
                </div>
            </div>

            <!-- Collections -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="collections"
                    :level="3"
                    class="scroll-mt-24"
                    >Collections</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    List endpoints return
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">data</code> as an
                    array. The response also includes
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">meta</code> with
                    pagination counts and
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">links</code> with
                    cursor URLs.
                </p>

                <DocsTable :columns="['Parameter', 'Default', 'Description']">
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">per_page</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">15</td>
                                <td class="px-5 py-3">Items per page. Each resource type has a configured max.</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">page</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">1</td>
                                <td class="px-5 py-3">Page number to fetch</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">sort</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">varies</td>
                                <td class="px-5 py-3">
                                    Field name to sort by. Prefix with <code class="font-mono text-xs">-</code> for
                                    descending (e.g. <code class="font-mono text-xs">-created_at</code>)
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">filter[field]</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">—</td>
                                <td class="px-5 py-3">
                                    Filter by field value. See each resource's docs for supported filters.
                                </td>
                            </tr>
                        </DocsTable>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        :code="collectionExample"
                    />
                </div>
            </div>

            <!-- Relationships -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="relationships"
                    :level="3"
                    class="scroll-mt-24"
                    >Relationships &amp; includes</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Some resources have related resources (e.g. a menu has items, a taxonomy has terms). Use the
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">include</code>
                    query parameter to sideload them in a single request instead of making separate calls.
                </p>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    When included, the primary resource lists related resource identifiers in
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800"
                        >relationships</code
                    >. The full resource objects appear in the top-level
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">included</code>
                    array — each resource appears only once even if referenced multiple times.
                </p>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        :code="relationshipExample"
                    />
                </div>
                <DocsTable :columns="['Resource', 'Supported includes']">
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">menus</code></td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">items</code></td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">taxonomies</code></td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">terms</code></td>
                            </tr>
                        </DocsTable>
            </div>

            <!-- Error objects -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="error-objects"
                    :level="3"
                    class="scroll-mt-24"
                    >Error objects</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Errors are returned in an
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">errors</code>
                    array. Each error object includes a string
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">status</code>
                    (the HTTP status code), a
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">title</code>, and
                    a human-readable
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">detail</code>.
                    Rate limit errors additionally include a
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800"
                        >meta.retry_after</code
                    >
                    value in seconds.
                </p>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        :code="errorExample"
                    />
                </div>
                <DocsTable :columns="['Status', 'Title', 'When']">
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-red-600 dark:text-red-400">401</code>
                                </td>
                                <td class="px-5 py-3">Unauthorized</td>
                                <td class="px-5 py-3">Missing or invalid API token</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-red-600 dark:text-red-400">403</code>
                                </td>
                                <td class="px-5 py-3">Forbidden</td>
                                <td class="px-5 py-3">Token used from an unverified domain</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-red-600 dark:text-red-400">404</code>
                                </td>
                                <td class="px-5 py-3">Not Found</td>
                                <td class="px-5 py-3">Resource doesn't exist or doesn't belong to your site</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-red-600 dark:text-red-400">405</code>
                                </td>
                                <td class="px-5 py-3">Method Not Allowed</td>
                                <td class="px-5 py-3">HTTP method not supported on this endpoint</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-red-600 dark:text-red-400">429</code>
                                </td>
                                <td class="px-5 py-3">Too Many Requests</td>
                                <td class="px-5 py-3">
                                    Rate limit exceeded — check <code class="font-mono text-xs">meta.retry_after</code>
                                </td>
                            </tr>
                        </DocsTable>
            </div>

            <!-- Version member -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="version-member"
                    :level="3"
                    class="scroll-mt-24"
                    >Version member</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Every response includes a top-level
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">jsonapi</code>
                    object declaring the spec version. This is always
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">1.1</code>.
                </p>
                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        code='{ "jsonapi": { "version": "1.1" } }'
                    />
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
