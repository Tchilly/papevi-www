<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import DocsToc from '@/Components/Docs/DocsToc.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

const tocItems = [
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'get-media', label: 'GET /media' },
    { id: 'get-media-id', label: 'GET /media/{id}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'attributes', label: 'Attributes' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Media API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-600 uppercase dark:text-brand-400">
                    API Reference
                </p>
                <Heading as="h1">Media API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Fetch media files uploaded to your site. Responses include direct URLs for displaying images and
                    other assets, along with available variants and thumbnails.
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
                <pre
                    class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm"
                ><code class="font-mono text-brand-300">https://api.papevi.app/api/v1</code></pre>
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
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code>
                                </td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/media</code></td>
                                <td class="px-5 py-3">List all media files for your site</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">
                                    <code class="font-mono text-xs text-green-600 dark:text-green-400">GET</code>
                                </td>
                                <td class="px-5 py-3"><code class="font-mono text-xs">/media/{id}</code></td>
                                <td class="px-5 py-3">Get a single media file by ID</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- GET /media -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="get-media"
                    :level="3"
                    class="scroll-mt-24"
                    >GET /media</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns a paginated list of media files for the authenticated site, sorted by newest first.
                </p>

                <pre
                    class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"
                ><code class="font-mono text-gray-100">curl https://api.papevi.app/api/v1/media \
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
                            <tbody
                                class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200"
                            >
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
                                        One of <code class="font-mono text-xs">filename</code>,
                                        <code class="font-mono text-xs">size</code>,
                                        <code class="font-mono text-xs">created_at</code>,
                                        <code class="font-mono text-xs">updated_at</code>. Prefix with
                                        <code class="font-mono text-xs">-</code> for descending (default
                                        <code class="font-mono text-xs">-created_at</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[type]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Filter by media type (e.g. <code class="font-mono text-xs">image</code>,
                                        <code class="font-mono text-xs">video</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[mime_type]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">
                                        Filter by MIME type (e.g. <code class="font-mono text-xs">image/jpeg</code>)
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-5 py-3"><code class="font-mono text-xs">filter[filename]</code></td>
                                    <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                    <td class="px-5 py-3">Exact filename match</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <p class="text-sm font-medium text-gray-900 dark:text-white">Example</p>
                <pre
                    class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"
                ><code class="font-mono text-gray-100"><span class="text-gray-500"># Fetch all images, 20 per page</span>
curl <span class="text-brand-300">"https://api.papevi.app/api/v1/media?filter[type]=image&amp;per_page=20"</span> \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>
            </div>

            <!-- GET /media/{id} -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="get-media-id"
                    :level="3"
                    class="scroll-mt-24"
                    >GET /media/{id}</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Returns a single media file. Returns
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">404</code> if it
                    does not belong to your site.
                </p>

                <pre
                    class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"
                ><code class="font-mono text-gray-100">curl https://api.papevi.app/api/v1/media/7 \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;token&gt;"</span></code></pre>
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

                <pre
                    class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"
                ><code class="font-mono text-gray-100"><span class="text-gray-500">// GET /media/{id}</span>
{
  <span class="text-green-400">"data"</span>: {
    <span class="text-green-400">"type"</span>: <span class="text-brand-300">"media"</span>,
    <span class="text-green-400">"id"</span>: <span class="text-brand-300">"7"</span>,
    <span class="text-green-400">"attributes"</span>: {
      <span class="text-green-400">"type"</span>: <span class="text-brand-300">"image"</span>,
      <span class="text-green-400">"filename"</span>: <span class="text-brand-300">"hero-photo.jpg"</span>,
      <span class="text-green-400">"original_filename"</span>: <span class="text-brand-300">"hero photo.jpg"</span>,
      <span class="text-green-400">"mime_type"</span>: <span class="text-brand-300">"image/jpeg"</span>,
      <span class="text-green-400">"size"</span>: 245760,
      <span class="text-green-400">"alt"</span>: <span class="text-brand-300">"Hero photo"</span>,
      <span class="text-green-400">"caption"</span>: <span class="text-gray-500">null</span>,
      <span class="text-green-400">"dimensions"</span>: { <span class="text-green-400">"width"</span>: 1920, <span class="text-green-400">"height"</span>: 1080 },
      <span class="text-green-400">"metadata"</span>: {},
      <span class="text-green-400">"url"</span>: <span class="text-brand-300">"https://cdn.papevi.app/media/hero-photo.jpg"</span>,
      <span class="text-green-400">"view_url"</span>: <span class="text-brand-300">"https://cdn.papevi.app/view/hero-photo.jpg"</span>,
      <span class="text-green-400">"thumbnail_url"</span>: <span class="text-brand-300">"https://cdn.papevi.app/thumb/hero-photo.jpg"</span>,
      <span class="text-green-400">"variants"</span>: {
        <span class="text-green-400">"sm"</span>: <span class="text-brand-300">"https://cdn.papevi.app/media/hero-photo-sm.jpg"</span>,
        <span class="text-green-400">"md"</span>: <span class="text-brand-300">"https://cdn.papevi.app/media/hero-photo-md.jpg"</span>
      },
      <span class="text-green-400">"created_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>,
      <span class="text-green-400">"updated_at"</span>: <span class="text-brand-300">"2025-01-01T12:00:00+00:00"</span>
    }
  },
  <span class="text-green-400">"jsonapi"</span>: { <span class="text-green-400">"version"</span>: <span class="text-brand-300">"1.1"</span> }
}</code></pre>
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
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">type</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                <td class="px-5 py-3">
                                    General media type (e.g. <code class="font-mono text-xs">image</code>,
                                    <code class="font-mono text-xs">video</code>)
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">filename</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                <td class="px-5 py-3">Stored filename (URL-safe)</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">original_filename</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                <td class="px-5 py-3">Original filename as uploaded</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">mime_type</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string</td>
                                <td class="px-5 py-3">
                                    MIME type (e.g. <code class="font-mono text-xs">image/jpeg</code>)
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">size</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">integer</td>
                                <td class="px-5 py-3">File size in bytes</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">alt</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                <td class="px-5 py-3">Alt text for the media</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">caption</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                <td class="px-5 py-3">Optional caption</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">dimensions</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">object|null</td>
                                <td class="px-5 py-3">Width and height (images only)</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">metadata</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">object</td>
                                <td class="px-5 py-3">Additional metadata (EXIF, etc.)</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">url</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                <td class="px-5 py-3">CDN URL for the original file</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">view_url</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                <td class="px-5 py-3">URL for in-browser viewing</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">thumbnail_url</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">string|null</td>
                                <td class="px-5 py-3">URL for the generated thumbnail preview</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3"><code class="font-mono text-xs">variants</code></td>
                                <td class="px-5 py-3 text-xs text-gray-500">object|null</td>
                                <td class="px-5 py-3">Resized variants keyed by size name</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
