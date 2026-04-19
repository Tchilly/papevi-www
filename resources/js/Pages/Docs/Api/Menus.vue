<script setup lang="ts">
import DocsToc from '@/Components/Docs/DocsToc.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';
import { Head } from '@inertiajs/vue3';

const tocItems = [
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'get-menus', label: 'GET /menus' },
    { id: 'get-menus-id', label: 'GET /menus/{id}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'attributes', label: 'Attributes' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Menus API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">API Reference</p>
                <Heading as="h1">Menus API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Fetch navigation menus and their items for your site. Use the <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-sm dark:bg-gray-800">include=items</code> parameter to load menu items in a single request.
                </p>
            </div>

            <!-- Base URL -->
            <div class="space-y-3">
                <Heading as="h2" id="base-url" :level="3" class="scroll-mt-24">Base URL</Heading>
                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm"><code class="font-mono text-brand-300">https://api.papevi.app/api/v1</code></pre>
            </div>

            <!-- Endpoints overview -->
            <div class="space-y-4">
                <Heading as="h2" id="endpoints" :level="3" class="scroll-mt-24">Endpoints</Heading>
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
                                <td class="px-5 py-3"><code class="font-mono text-xs">/menus</code></td>
                                <td class="px-5 py-3">List all menus for your site</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code></td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/menus/{id}</code></td>
                                <td class="px-5 py-3">Get a single menu by slug</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- GET /menus -->
            <div class="space-y-4">
                <Heading as="h2" id="get-menus" :level="3" class="scroll-mt-24">GET /menus</Heading>
                <p class="text-sm text-gray-600 dark:text-gray-300">Returns a paginated list of menus for the authenticated site.</p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100">curl https://api.papevi.app/api/v1/menus \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>

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
                                    <td class="px-5 py-3"><code class="font-mono text-xs">sort</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">One of <code class="font-mono text-xs">name</code>, <code class="font-mono text-xs">slug</code>, <code class="font-mono text-xs">created_at</code>, <code class="font-mono text-xs">updated_at</code>. Prefix with <code class="font-mono text-xs">-</code> for descending (default <code class="font-mono text-xs">name</code>)</td>
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
                                    <td class="px-5 py-3">Filter by language code (e.g. <code class="font-mono text-xs">en</code>)</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[is_primary]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">boolean</td>
                                    <td class="px-5 py-3">Filter to primary menus only (<code class="font-mono text-xs">true</code> or <code class="font-mono text-xs">false</code>)</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">include</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Pass <code class="font-mono text-xs">items</code> to sideload menu items</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="text-sm font-medium text-gray-900 dark:text-white">Example</p>
                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500"># Fetch the primary menu with its items</span>
curl <span class="text-brand-300">"https://api.papevi.app/api/v1/menus?filter[is_primary]=true&amp;include=items"</span> \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>
            </div>

            <!-- GET /menus/{slug} -->
            <div class="space-y-4">
                <Heading as="h2" id="get-menus-id" :level="3" class="scroll-mt-24">GET /menus/{slug}</Heading>
                <p class="text-sm text-gray-600 dark:text-gray-300">Returns a single menu. Returns <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">404</code> if the menu does not belong to your site.</p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100">curl <span class="text-brand-300">"https://api.papevi.app/api/v1/menus/main-menu?include=items"</span> \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>
            </div>

            <!-- Response format -->
            <div class="space-y-4">
                <Heading as="h2" id="response-format" :level="3" class="scroll-mt-24">Response format</Heading>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Responses follow the <strong class="font-semibold text-gray-800 dark:text-gray-100">JSON:API</strong> specification.
                </p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500">// GET /menus/{slug}?include=items</span>
{
  <span class="text-green-400">"data"</span>: {
    <span class="text-green-400">"type"</span>: <span class="text-brand-300">"menus"</span>,
    <span class="text-green-400">"id"</span>: <span class="text-brand-300">"1"</span>,
    <span class="text-green-400">"attributes"</span>: {
      <span class="text-green-400">"name"</span>: <span class="text-brand-300">"Primary Navigation"</span>,
      <span class="text-green-400">"slug"</span>: <span class="text-brand-300">"primary-navigation"</span>,
      <span class="text-green-400">"description"</span>: <span class="text-gray-500">null</span>,
      <span class="text-green-400">"language"</span>: <span class="text-brand-300">"en"</span>,
      <span class="text-green-400">"is_primary"</span>: <span class="text-brand-300">true</span>,
      <span class="text-green-400">"created_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>,
      <span class="text-green-400">"updated_at"</span>: <span class="text-brand-300">"2025-03-10T09:00:00+00:00"</span>
    },
    <span class="text-green-400">"relationships"</span>: {
      <span class="text-green-400">"items"</span>: {
        <span class="text-green-400">"data"</span>: [
          { <span class="text-green-400">"type"</span>: <span class="text-brand-300">"menu-items"</span>, <span class="text-green-400">"id"</span>: <span class="text-brand-300">"10"</span> }
        ]
      }
    }
  },
  <span class="text-green-400">"included"</span>: [
    {
      <span class="text-green-400">"type"</span>: <span class="text-brand-300">"menu-items"</span>,
      <span class="text-green-400">"id"</span>: <span class="text-brand-300">"10"</span>,
      <span class="text-green-400">"attributes"</span>: {
        <span class="text-green-400">"title"</span>: <span class="text-brand-300">"Home"</span>,
        <span class="text-green-400">"link_type"</span>: <span class="text-brand-300">"page"</span>,
        <span class="text-green-400">"url"</span>: <span class="text-brand-300">"/"</span>,
        <span class="text-green-400">"external_url"</span>: <span class="text-gray-500">null</span>,
        <span class="text-green-400">"resolved_url"</span>: <span class="text-brand-300">"/"</span>,
        <span class="text-green-400">"page_slug"</span>: <span class="text-brand-300">"home"</span>,
        <span class="text-green-400">"target"</span>: <span class="text-brand-300">"_self"</span>,
        <span class="text-green-400">"is_visible"</span>: <span class="text-brand-300">true</span>,
        <span class="text-green-400">"order"</span>: 1,
        <span class="text-green-400">"icon"</span>: <span class="text-gray-500">null</span>,
        <span class="text-green-400">"created_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>,
        <span class="text-green-400">"updated_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>
      }
    }
  ],
  <span class="text-green-400">"jsonapi"</span>: { <span class="text-green-400">"version"</span>: <span class="text-brand-300">"1.1"</span> }
}</code></pre>
            </div>

            <!-- Menu attributes -->
            <div class="space-y-4">
                <Heading as="h2" id="attributes" :level="3" class="scroll-mt-24">Attributes</Heading>
                <div class="space-y-4">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Menu</p>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                                <tr>
                                    <th class="px-5 py-3 text-left font-medium">Field</th>
                                    <th class="px-5 py-3 text-left font-medium">Type</th>
                                    <th class="px-5 py-3 text-left font-medium">Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">name</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Menu display name</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">slug</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">URL-safe identifier</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">description</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Optional description</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">language</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Language code (e.g. <code class="font-mono text-xs">en</code>)</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">is_primary</code></td><td class="px-5 py-3 text-xs text-gray-500">boolean</td><td class="px-5 py-3">Whether this is the site's primary menu</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">created_at</code></td><td class="px-5 py-3 text-xs text-gray-500">ISO 8601</td><td class="px-5 py-3">Creation timestamp</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">updated_at</code></td><td class="px-5 py-3 text-xs text-gray-500">ISO 8601</td><td class="px-5 py-3">Last updated timestamp</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Menu item <span class="font-normal text-gray-500">(type: <code class="font-mono text-xs">menu-items</code>)</span></p>
                    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                                <tr>
                                    <th class="px-5 py-3 text-left font-medium">Field</th>
                                    <th class="px-5 py-3 text-left font-medium">Type</th>
                                    <th class="px-5 py-3 text-left font-medium">Description</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">title</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Link label</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">link_type</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Type of link: <code class="font-mono text-xs">page</code> or <code class="font-mono text-xs">external</code></td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">url</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Stored URL (may be derived from a linked page)</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">external_url</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Explicit external URL when <code class="font-mono text-xs">link_type</code> is <code class="font-mono text-xs">external</code></td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">resolved_url</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Ready-to-use URL — use this in your navigation</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">page_slug</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Slug of the linked page, if any</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">description</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Optional item description</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">target</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Link target (<code class="font-mono text-xs">_self</code> or <code class="font-mono text-xs">_blank</code>)</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">rel</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Optional <code class="font-mono text-xs">rel</code> attribute value</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">is_visible</code></td><td class="px-5 py-3 text-xs text-gray-500">boolean</td><td class="px-5 py-3">Whether to show this item in navigation</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">custom_params</code></td><td class="px-5 py-3 text-xs text-gray-500">object|null</td><td class="px-5 py-3">Additional custom parameters</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">order</code></td><td class="px-5 py-3 text-xs text-gray-500">integer</td><td class="px-5 py-3">Sort position within the menu</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">icon</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Optional icon identifier</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
