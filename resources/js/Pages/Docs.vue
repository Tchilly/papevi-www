<script setup lang="ts">
import DocsLayout from '@/Layouts/DocsLayout.vue';
import Heading from '@/Components/Ui/Heading.vue';
import { Head, Link } from '@inertiajs/vue3';
</script>

<template>
    <DocsLayout>
        <Head title="Documentation — Papevi CMS" />

        <div class="space-y-12">
            <!-- Page header -->
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">
                    Papevi CMS
                </p>
                <Heading as="h1" display="md">Documentation</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Everything you need to integrate the public API, manage content, and configure your workspace.
                </p>
            </div>

            <!-- Quick start band -->
            <div
                class="rounded-xl border border-gray-200 bg-gray-50 p-6 dark:border-white/10 dark:bg-white/[0.03]"
            >
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-gray-500 dark:text-gray-400">Quick start</p>
                <p class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                    Add your Bearer token to any request — the token identifies your site automatically.
                </p>
                <pre
                    class="mt-4 overflow-x-auto rounded-lg border border-white/10 bg-gray-950 p-4 text-sm leading-relaxed"
                ><code class="font-mono text-gray-100">curl https://api.papevi.app/api/v1/pages \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;your-token&gt;"</span></code></pre>
                <div class="mt-4 flex flex-wrap gap-3">
                    <Link
                        href="/docs/getting-started"
                        class="inline-flex items-center gap-1.5 text-sm font-medium text-brand-600 transition hover:text-brand-500 dark:text-brand-400 dark:hover:text-brand-300"
                    >
                        Get your first token
                        <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                            <path
                                d="M4 10h12M11 5l5 5-5 5"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                </div>
            </div>

            <!-- Section cards -->
            <div class="grid gap-4 sm:grid-cols-2">
                <!-- Getting Started -->
                <Link
                    href="/docs/getting-started"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M10 2L2 8v10h6v-4h4v4h6V8L10 2z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Quick Start</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Create your first API token and make your first request in under five minutes.
                    </p>
                </Link>

                <!-- Authentication -->
                <Link
                    href="/docs/api/authentication"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M8 11a4 4 0 100-8 4 4 0 000 8zm-3 2h6l2 4H3l2-4z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Authentication</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Dev and production tokens, domain verification, token rotation, and security practices.
                    </p>
                </Link>

                <!-- Pages API -->
                <Link
                    href="/docs/api/pages"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M4 4h12v12H4zM8 8h4M8 12h2" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Pages API</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Fetch published pages, filter by type, paginate results, and understand response shapes.
                    </p>
                </Link>

                <!-- Menus API -->
                <Link
                    href="/docs/api/menus"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M3 6h14M3 10h10M3 14h7" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Menus API</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Fetch navigation menus and their items. Filter by primary menu or language.
                    </p>
                </Link>

                <!-- Taxonomies API -->
                <Link
                    href="/docs/api/taxonomies"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M4 4h4v4H4zM12 4h4v4h-4zM8 12h4v4H8zM2 8l2 4M18 8l-2 4M10 8v4" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Taxonomies API</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Fetch taxonomies and their terms. Supports hierarchical and flat structures.
                    </p>
                </Link>

                <!-- Media API -->
                <Link
                    href="/docs/api/media"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <rect x="3" y="5" width="14" height="10" rx="1" stroke="currentColor" stroke-width="1.6" />
                            <circle cx="7.5" cy="9.5" r="1.5" stroke="currentColor" stroke-width="1.3" />
                            <path d="M3 13l4-3 3 2.5 2-1.5 5 4" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Media API</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        List and retrieve media files with URLs, dimensions, and generated variants.
                    </p>
                </Link>

                <!-- Site API -->
                <Link
                    href="/docs/api/site"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <circle cx="10" cy="10" r="7" stroke="currentColor" stroke-width="1.6" />
                            <path d="M10 3a10 10 0 010 14M3 10h14" stroke="currentColor" stroke-width="1.3" stroke-linecap="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Site API</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Read site metadata: name, language, timezone, currency, and active status.
                    </p>
                </Link>

                <!-- Workflow -->
                <Link
                    href="/docs/features/workflow"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M4 10h12M10 4l6 6-6 6" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Workflow & Publishing</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Draft → Review → Approved → Published. How statuses work and how scheduling is handled.
                    </p>
                </Link>

                <!-- Versioning -->
                <Link
                    href="/docs/features/versioning"
                    class="group rounded-xl border border-gray-200 bg-white p-6 transition hover:border-brand-400/40 hover:shadow-sm dark:border-white/10 dark:bg-white/[0.02] dark:hover:border-brand-400/30"
                >
                    <div class="mb-3 flex h-9 w-9 items-center justify-center rounded-lg border border-brand-200 bg-brand-50 dark:border-brand-400/20 dark:bg-brand-400/10">
                        <svg class="size-4 text-brand-600 dark:text-brand-400" viewBox="0 0 20 20" fill="none">
                            <path d="M10 18a8 8 0 100-16 8 8 0 000 16z" stroke="currentColor" stroke-width="1.6" />
                            <path d="M10 6v4l3 3" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                        </svg>
                    </div>
                    <Heading as="h2" :level="5">Versioning & Audit</Heading>
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Every change tracked. Compare revisions, revert safely, and access a full audit trail.
                    </p>
                </Link>
            </div>
        </div>
    </DocsLayout>
</template>
