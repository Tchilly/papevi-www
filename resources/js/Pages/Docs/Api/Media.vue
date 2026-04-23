<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import DocsTable from '@/Components/Docs/DocsTable.vue';
import DocsToc from '@/Components/Docs/DocsToc.vue';
import Code from '@/Components/Ui/Code.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

const tocItems = [
    { id: 'overview', label: 'DAM overview' },
    { id: 'base-url', label: 'Base URL' },
    { id: 'endpoints', label: 'Endpoints' },
    { id: 'get-media', label: 'GET /media' },
    { id: 'get-media-id', label: 'GET /media/{id}' },
    { id: 'response-format', label: 'Response format' },
    { id: 'attributes', label: 'Attributes' },
    { id: 'variants', label: 'Image variants' },
    { id: 'gdpr', label: 'GDPR & privacy' },
    { id: 'licensing', label: 'Licensing' },
];

const baseUrl = 'https://api.papevi.app/api/v1';

const listMediaCurl = 'curl https://api.papevi.app/api/v1/media \\\n  -H "Authorization: Bearer <token>"';

const listMediaExampleCurl =
    '# Fetch all images, 20 per page\n' +
    'curl "https://api.papevi.app/api/v1/media?filter[type]=image&per_page=20" \\\n  -H "Authorization: Bearer <token>"';

const getMediaIdCurl = 'curl https://api.papevi.app/api/v1/media/7 \\\n  -H "Authorization: Bearer <token>"';

const mediaResponseJson =
    '// GET /media/{id}\n' +
    '{\n' +
    '  "data": {\n' +
    '    "type": "media",\n' +
    '    "id": "7",\n' +
    '    "attributes": {\n' +
    '      "type": "image",\n' +
    '      "filename": "hero-photo.jpg",\n' +
    '      "original_filename": "hero photo.jpg",\n' +
    '      "mime_type": "image/jpeg",\n' +
    '      "size": 245760,\n' +
    '      "alt": "Hero photo",\n' +
    '      "caption": null,\n' +
    '      "dimensions": { "width": 1920, "height": 1080 },\n' +
    '      "metadata": {},\n' +
    '      "url": "https://cdn.papevi.app/media/hero-photo.jpg",\n' +
    '      "view_url": "https://cdn.papevi.app/view/hero-photo.jpg",\n' +
    '      "thumbnail_url": "https://cdn.papevi.app/thumb/hero-photo.jpg",\n' +
    '      "variants": {\n' +
    '        "sm": "https://cdn.papevi.app/media/hero-photo-sm.jpg",\n' +
    '        "md": "https://cdn.papevi.app/media/hero-photo-md.jpg"\n' +
    '      },\n' +
    '      "created_at": "2025-01-01T12:00:00+00:00",\n' +
    '      "updated_at": "2025-01-01T12:00:00+00:00"\n' +
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

        <Head title="Media and DAM API — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-700 uppercase dark:text-brand-400">
                    API Reference
                </p>
                <Heading as="h1">Media and DAM API</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Papevi includes a full Digital Asset Management system. Every uploaded file is automatically
                    processed into optimised variants (WebP, AVIF), stored with rich metadata, and delivered through a
                    clean JSON:API endpoint scoped to your site.
                </p>
            </div>

            <!-- DAM overview -->
            <div
                id="overview"
                class="scroll-mt-24 space-y-4"
            >
                <Heading
                    as="h2"
                    :level="3"
                    >DAM overview</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    The Papevi DAM handles the full asset lifecycle inside the CMS admin — upload, process, organise,
                    and attach to content — while the API exposes assets to any frontend or external system.
                </p>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    <li class="flex gap-2">
                        <span class="mt-0.5 text-brand-500">→</span
                        ><span
                            ><strong class="font-medium">Auto-processing</strong> — on upload, images are converted to
                            configured output formats (WebP, AVIF, JPEG, PNG) at site-defined quality. Spatie optimisers
                            then reduce file size a further 20–40%.</span
                        >
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-0.5 text-brand-500">→</span
                        ><span
                            ><strong class="font-medium">Variants</strong> — named size presets (e.g.
                            <code class="font-mono text-xs">sm</code>, <code class="font-mono text-xs">md</code>,
                            <code class="font-mono text-xs">lg</code>) are generated per site configuration and returned
                            in the <code class="font-mono text-xs">variants</code> map.</span
                        >
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-0.5 text-brand-500">→</span
                        ><span
                            ><strong class="font-medium">Folder structure</strong> — assets are organised into folders
                            per site, with bulk upload and a media picker embedded in the page editor.</span
                        >
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-0.5 text-brand-500">→</span
                        ><span
                            ><strong class="font-medium">GDPR controls</strong> — per-person consent tracking, retention
                            policies, and right-to-be-forgotten are first-class DAM features.</span
                        >
                    </li>
                    <li class="flex gap-2">
                        <span class="mt-0.5 text-brand-500">→</span
                        ><span
                            ><strong class="font-medium">Licence management</strong> — every asset carries a licence
                            record (CC0, CC-BY, proprietary, custom) with commercial use and derivative work
                            flags.</span
                        >
                    </li>
                </ul>
            </div>
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
                </DocsTable>
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

                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
                >
                    <Code
                        lang="bash"
                        :code="listMediaCurl"
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
                    </DocsTable>
                </div>

                <p class="text-sm font-medium text-gray-900 dark:text-white">Example</p>
                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
                >
                    <Code
                        lang="bash"
                        :code="listMediaExampleCurl"
                    />
                </div>
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

                <div
                    class="overflow-hidden rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900"
                >
                    <Code
                        lang="bash"
                        :code="getMediaIdCurl"
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
                        :code="mediaResponseJson"
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
                        <td class="px-5 py-3">MIME type (e.g. <code class="font-mono text-xs">image/jpeg</code>)</td>
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
                </DocsTable>
            </div>

            <!-- Image variants -->
            <div
                id="variants"
                class="scroll-mt-24 space-y-4"
            >
                <Heading
                    as="h2"
                    :level="3"
                    >Image variants</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    When an image is uploaded, Papevi generates named variants based on the site's media preset
                    configuration. Each variant is a separately stored file, optimised for its intended display size.
                    Variants are returned in the <code class="font-mono text-xs">variants</code> attribute as a key →
                    URL map.
                </p>
                <DocsTable :columns="['Format', 'How it is produced']">
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">WebP</code></td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Default output format. Converted via Intervention Image, then compressed by
                            <code class="font-mono text-xs">cwebp</code>.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">AVIF</code></td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Optional next-gen format. Processed by <code class="font-mono text-xs">avifenc</code> when
                            enabled per site.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3"><code class="font-mono text-xs">JPEG / PNG</code></td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Fallback formats. Optimised by <code class="font-mono text-xs">jpegoptim</code> /
                            <code class="font-mono text-xs">pngquant</code> +
                            <code class="font-mono text-xs">optipng</code>.
                        </td>
                    </tr>
                </DocsTable>
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Optimisation is configured per site under <strong class="font-medium">Settings → Media</strong>. The
                    quality value is shared between the conversion step and the post-processor, so renders are
                    consistent. Failed optimisations are logged but never fail the upload.
                </p>
            </div>

            <!-- GDPR & privacy -->
            <div
                id="gdpr"
                class="scroll-mt-24 space-y-4"
            >
                <Heading
                    as="h2"
                    :level="3"
                    >GDPR and privacy</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Every media record has a linked <strong class="font-medium">MediaPrivacy</strong> record created
                    automatically on upload. Privacy metadata is managed through the admin and is not exposed through
                    the public API — it is for internal compliance use only.
                </p>
                <DocsTable :columns="['Feature', 'Description']">
                    <tr>
                        <td class="px-5 py-3 text-sm font-medium">Personal data flagging</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Mark any asset as containing personal data. Flagged assets are excluded from bulk export
                            until consent is confirmed.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-sm font-medium">Per-person consent</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Track named individuals appearing in media, including face coordinates and consent status.
                            Each person's consent is recorded independently.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-sm font-medium">Retention policies</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Set a <code class="font-mono text-xs">retention_until</code> date per asset. The
                            <code class="font-mono text-xs">media:delete-expired</code> artisan command enforces
                            deletion on schedule.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-sm font-medium">Right to be forgotten</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Remove an individual from an asset's people list. The asset is queued for manual review and
                            potential deletion.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 text-sm font-medium">Review queue</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            All assets with compliance issues (no consent, expired retention, missing licence) appear in
                            the admin review queue at <code class="font-mono text-xs">/media/review</code>.
                        </td>
                    </tr>
                </DocsTable>
            </div>

            <!-- Licensing -->
            <div
                id="licensing"
                class="scroll-mt-24 space-y-4"
            >
                <Heading
                    as="h2"
                    :level="3"
                    >Licensing</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Every asset has a linked <strong class="font-medium">MediaLicense</strong> record. Licence data is
                    set in the admin edit drawer and used to govern how assets may be reused across your team and
                    downstream channels.
                </p>
                <DocsTable :columns="['Licence type', 'Notes']">
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">CC0</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Public domain dedication. No restrictions.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">CC-BY</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">Attribution required.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">CC-BY-SA</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Attribution + share-alike required.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">CC-BY-NC</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">Non-commercial use only.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">CC-BY-ND</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">No derivative works.</td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">proprietary</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            All rights reserved. Default for new uploads.
                        </td>
                    </tr>
                    <tr>
                        <td class="px-5 py-3 font-mono text-xs">custom</td>
                        <td class="px-5 py-3 text-sm text-gray-600 dark:text-gray-300">
                            Freeform copyright holder, attribution text, and commercial/derivative flags set manually.
                        </td>
                    </tr>
                </DocsTable>
            </div>
        </div>
    </DocsLayout>
</template>
