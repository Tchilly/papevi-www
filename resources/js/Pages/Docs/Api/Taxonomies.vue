<script setup lang="ts">
import DocsToc from '@/Components/Docs/DocsToc.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';
import { Head } from '@inertiajs/vue3';

const tocItems = [
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'get-taxonomies', label: 'GET /taxonomies' },
    { id: 'get-taxonomies-id', label: 'GET /taxonomies/{id}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'attributes', label: 'Attributes' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Taxonomies API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">API Reference</p>
                <Heading as="h1">Taxonomies API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Fetch taxonomies and their terms for your site. Taxonomies categorise content — include terms to get the full hierarchy in one request.
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
                                <td class="px-5 py-3"><code class="font-mono text-xs">/taxonomies</code></td>
                                <td class="px-5 py-3">List all taxonomies for your site</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code></td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/taxonomies/{id}</code></td>
                                <td class="px-5 py-3">Get a single taxonomy by ID</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- GET /taxonomies -->
            <div class="space-y-4">
                <Heading as="h2" id="get-taxonomies" :level="3" class="scroll-mt-24">GET /taxonomies</Heading>
                <p class="text-sm text-gray-600 dark:text-gray-300">Returns a paginated list of taxonomies for the authenticated site.</p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100">curl https://api.papevi.app/api/v1/taxonomies \
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
                                    <td class="px-5 py-3">Filter by language code</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[hierarchical]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">boolean</td>
                                    <td class="px-5 py-3">Filter to hierarchical (<code class="font-mono text-xs">true</code>) or flat (<code class="font-mono text-xs">false</code>) taxonomies</td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">include</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Pass <code class="font-mono text-xs">terms</code> to sideload taxonomy terms</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="text-sm font-medium text-gray-900 dark:text-white">Example</p>
                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500"># Fetch the "category" taxonomy with all its terms</span>
curl <span class="text-brand-300">"https://api.papevi.app/api/v1/taxonomies?filter[slug]=category&amp;include=terms"</span> \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>
            </div>

            <!-- GET /taxonomies/{id} -->
            <div class="space-y-4">
                <Heading as="h2" id="get-taxonomies-id" :level="3" class="scroll-mt-24">GET /taxonomies/{id}</Heading>
                <p class="text-sm text-gray-600 dark:text-gray-300">Returns a single taxonomy. Returns <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">404</code> if it does not belong to your site.</p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100">curl <span class="text-brand-300">"https://api.papevi.app/api/v1/taxonomies/5?include=terms"</span> \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>
            </div>

            <!-- Response format -->
            <div class="space-y-4">
                <Heading as="h2" id="response-format" :level="3" class="scroll-mt-24">Response format</Heading>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Responses follow the <strong class="font-semibold text-gray-800 dark:text-gray-100">JSON:API</strong> specification.
                </p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500">// GET /taxonomies/{id}?include=terms</span>
{
  <span class="text-green-400">"data"</span>: {
    <span class="text-green-400">"type"</span>: <span class="text-brand-300">"taxonomies"</span>,
    <span class="text-green-400">"id"</span>: <span class="text-brand-300">"5"</span>,
    <span class="text-green-400">"attributes"</span>: {
      <span class="text-green-400">"name"</span>: <span class="text-brand-300">"Category"</span>,
      <span class="text-green-400">"slug"</span>: <span class="text-brand-300">"category"</span>,
      <span class="text-green-400">"description"</span>: <span class="text-gray-500">null</span>,
      <span class="text-green-400">"hierarchical"</span>: <span class="text-brand-300">true</span>,
      <span class="text-green-400">"multiple_selection"</span>: <span class="text-brand-300">true</span>,
      <span class="text-green-400">"required"</span>: <span class="text-brand-300">false</span>,
      <span class="text-green-400">"max_depth"</span>: 3,
      <span class="text-green-400">"language"</span>: <span class="text-brand-300">"en"</span>,
      <span class="text-green-400">"created_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>,
      <span class="text-green-400">"updated_at"</span>: <span class="text-brand-300">"2025-03-10T09:00:00+00:00"</span>
    },
    <span class="text-green-400">"relationships"</span>: {
      <span class="text-green-400">"terms"</span>: {
        <span class="text-green-400">"data"</span>: [
          { <span class="text-green-400">"type"</span>: <span class="text-brand-300">"taxonomy-terms"</span>, <span class="text-green-400">"id"</span>: <span class="text-brand-300">"20"</span> }
        ]
      }
    }
  },
  <span class="text-green-400">"included"</span>: [
    {
      <span class="text-green-400">"type"</span>: <span class="text-brand-300">"taxonomy-terms"</span>,
      <span class="text-green-400">"id"</span>: <span class="text-brand-300">"20"</span>,
      <span class="text-green-400">"attributes"</span>: {
        <span class="text-green-400">"name"</span>: <span class="text-brand-300">"Technology"</span>,
        <span class="text-green-400">"slug"</span>: <span class="text-brand-300">"technology"</span>,
        <span class="text-green-400">"description"</span>: <span class="text-gray-500">null</span>,
        <span class="text-green-400">"order"</span>: 1,
        <span class="text-green-400">"created_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>,
        <span class="text-green-400">"updated_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>
      }
    }
  ],
  <span class="text-green-400">"jsonapi"</span>: { <span class="text-green-400">"version"</span>: <span class="text-brand-300">"1.1"</span> }
}</code></pre>
            </div>

            <!-- Attributes -->
            <div class="space-y-4">
                <Heading as="h2" id="attributes" :level="3" class="scroll-mt-24">Attributes</Heading>
                <div class="space-y-4">
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Taxonomy</p>
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
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">name</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Taxonomy name</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">slug</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">URL-safe identifier</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">description</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Optional description</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">hierarchical</code></td><td class="px-5 py-3 text-xs text-gray-500">boolean</td><td class="px-5 py-3">Whether terms can be nested</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">multiple_selection</code></td><td class="px-5 py-3 text-xs text-gray-500">boolean</td><td class="px-5 py-3">Whether multiple terms can be selected on a page</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">required</code></td><td class="px-5 py-3 text-xs text-gray-500">boolean</td><td class="px-5 py-3">Whether a term is required on pages using this taxonomy</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">max_depth</code></td><td class="px-5 py-3 text-xs text-gray-500">integer|null</td><td class="px-5 py-3">Maximum nesting depth for hierarchical taxonomies</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">language</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Language code</td></tr>
                            </tbody>
                        </table>
                    </div>

                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Taxonomy term <span class="font-normal text-gray-500">(type: <code class="font-mono text-xs">taxonomy-terms</code>)</span></p>
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
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">name</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">Term label</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">slug</code></td><td class="px-5 py-3 text-xs text-gray-500">string</td><td class="px-5 py-3">URL-safe identifier</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">description</code></td><td class="px-5 py-3 text-xs text-gray-500">string|null</td><td class="px-5 py-3">Optional description</td></tr>
                                <tr><td class="px-5 py-3"><code class="font-mono text-xs">order</code></td><td class="px-5 py-3 text-xs text-gray-500">integer</td><td class="px-5 py-3">Sort position within the taxonomy</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
