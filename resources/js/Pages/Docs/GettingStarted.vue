<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import DocsToc from '@/Components/Docs/DocsToc.vue';
import Code from '@/Components/Ui/Code.vue';
import CodeTabs from '@/Components/Ui/CodeTabs.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

const apiCallExamples = {
    TypeScript: `// TypeScript · Vue · React · Svelte
const BASE = 'https://api.papevi.app/api/v1';

const res = await fetch(\`\${BASE}/pages\`, {
  headers: { Authorization: \`Bearer \${token}\` },
});
const { data } = await res.json();`,
    PHP: `<?php
use Illuminate\\Support\\Facades\\Http;

$pages = Http::withToken($token)
    ->get('https://api.papevi.app/api/v1/pages')
    ->json('data');`,
    'C#': `using System.Net.Http.Headers;

var client = new HttpClient();
client.DefaultRequestHeaders.Authorization =
    new AuthenticationHeaderValue("Bearer", token);

var res = await client.GetAsync("https://api.papevi.app/api/v1/pages");
res.EnsureSuccessStatusCode();`,
};

const tocItems = [
    { id: 'create-site', label: 'Create your workspace' },
    { id: 'api-key', label: 'Get your API key' },
    { id: 'content-type', label: 'Model your content' },
    { id: 'publish', label: 'Write and publish' },
    { id: 'api-call', label: 'Make your first API call' },
    { id: 'next-steps', label: 'Go further' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Quick Start — Papevi CMS Docs" />

        <div class="space-y-16">
            <!-- Header -->
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-600 uppercase dark:text-brand-400">
                    Getting Started
                </p>
                <Heading as="h1">Quick Start</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Set up your site, model your content, publish your first page, and fetch it live — in under ten
                    minutes.
                </p>
            </div>

            <!-- Create site -->
            <div
                id="create-site"
                class="scroll-mt-24 space-y-5"
            >
                <div>
                    <Heading
                        as="h2"
                        :level="3"
                        >Create your workspace</Heading
                    >
                    <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                        A site is the top-level container for your content, API tokens, and domain settings. You can run
                        multiple sites from a single account.
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="text-xs font-semibold tracking-[0.12em] text-gray-400 uppercase dark:text-gray-500">
                            From the dashboard
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                            Click <strong class="font-medium text-gray-900 dark:text-white">New Site</strong>, give it a
                            name and a default language, then hit
                            <strong class="font-medium text-gray-900 dark:text-white">Create</strong>.
                        </p>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="text-xs font-semibold tracking-[0.12em] text-gray-400 uppercase dark:text-gray-500">
                            What you get
                        </p>
                        <p class="mt-2 text-sm text-gray-700 dark:text-gray-200">
                            An isolated content space with its own API tokens, domain config, and team members.
                        </p>
                    </div>
                </div>

                <!-- Screenshot placeholder -->
                <div
                    class="flex aspect-video items-center justify-center rounded-xl border border-dashed border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/[0.02]"
                >
                    <p class="text-xs text-gray-400 dark:text-gray-600">Screenshot — new site dialog</p>
                </div>
            </div>

            <!-- API key -->
            <div
                id="api-key"
                class="scroll-mt-24 space-y-5"
            >
                <div>
                    <Heading
                        as="h2"
                        :level="3"
                        >Get your API key</Heading
                    >
                    <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                        Tokens are scoped to a site and identify it automatically — you never pass a site ID in
                        requests. There are two types:
                    </p>
                </div>

                <div class="grid gap-3 sm:grid-cols-2">
                    <div
                        class="rounded-xl border border-green-200 bg-green-50 p-4 dark:border-green-500/20 dark:bg-green-500/5"
                    >
                        <p class="text-xs font-semibold text-green-700 dark:text-green-400">Dev token</p>
                        <p class="mt-1.5 text-sm text-green-900 dark:text-green-200">
                            Works from <code class="font-mono text-xs">localhost</code>,
                            <code class="font-mono text-xs">127.0.0.1</code>, and any
                            <code class="font-mono text-xs">*.dev</code>, <code class="font-mono text-xs">*.test</code>,
                            <code class="font-mono text-xs">*.app</code>, or
                            <code class="font-mono text-xs">*.local</code> host. No domain verification needed.
                            Rate-limited to <strong class="font-medium">60 req/min</strong>.
                        </p>
                    </div>
                    <div
                        class="rounded-xl border border-brand-200 bg-brand-50 p-4 dark:border-brand-500/20 dark:bg-brand-500/5"
                    >
                        <p class="text-xs font-semibold text-brand-700 dark:text-brand-400">Production token</p>
                        <p class="mt-1.5 text-sm text-brand-900 dark:text-brand-200">
                            For live sites. Requires at least one verified domain (DNS TXT record). Rate limit is set by
                            your plan — <strong class="font-medium">100 req/min</strong> by default.
                        </p>
                    </div>
                </div>

                <div class="space-y-2 text-sm text-gray-600 dark:text-gray-300">
                    <p>
                        Go to
                        <strong class="font-medium text-gray-900 dark:text-white">Site Settings → API Tokens</strong>
                        and click <strong class="font-medium text-gray-900 dark:text-white">Create Token</strong>. Give
                        it a unique name, choose the type, and optionally set an expiry date.
                    </p>
                    <p class="flex items-start gap-2">
                        <svg
                            class="mt-0.5 size-3.5 shrink-0 text-yellow-500"
                            viewBox="0 0 20 20"
                            fill="none"
                            aria-hidden="true"
                        >
                            <path
                                d="M10 3L2 17h16L10 3z"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linejoin="round"
                            />
                            <path
                                d="M10 11V8M10 14v.5"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                            />
                        </svg>
                        <span
                            >The plain-text token is shown
                            <strong class="font-medium text-gray-900 dark:text-white">only once</strong> — copy it
                            immediately and store it in an environment variable. It's saved as a SHA-256 hash and is
                            never retrievable again.</span
                        >
                    </p>
                    <p class="text-xs text-gray-400 dark:text-gray-500">
                        Each site can have up to 2 tokens by default. Revoking a token immediately breaks all clients
                        using it.
                    </p>
                </div>

                <pre
                    class="overflow-x-auto rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900 p-4 text-sm"
                ><code class="font-mono text-gray-100">PAPEVI_TOKEN=<span class="text-brand-300">papevi_live_xxxxxxxxxxxx</span></code></pre>

                <!-- Screenshot placeholder -->
                <div
                    class="flex aspect-video items-center justify-center rounded-xl border border-dashed border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/[0.02]"
                >
                    <p class="text-xs text-gray-400 dark:text-gray-600">Screenshot — API tokens settings page</p>
                </div>
            </div>

            <!-- Content type -->
            <div
                id="content-type"
                class="scroll-mt-24 space-y-5"
            >
                <div class="sm:flex sm:gap-10">
                    <div class="sm:flex-1">
                        <Heading
                            as="h2"
                            :level="3"
                            >Model your content</Heading
                        >
                        <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            Content types define the fields available when writing a page — title, body, hero image,
                            author, whatever your project needs. You can have as many types as you want: blog posts,
                            landing pages, case studies.
                        </p>
                        <ul class="mt-4 space-y-2 text-sm text-gray-700 dark:text-gray-200">
                            <li class="flex items-start gap-2">
                                <span class="mt-0.5 text-brand-500">→</span>
                                <span
                                    >Open
                                    <strong class="font-medium text-gray-900 dark:text-white">Content Types</strong> in
                                    the site sidebar</span
                                >
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-0.5 text-brand-500">→</span>
                                <span
                                    >Click
                                    <strong class="font-medium text-gray-900 dark:text-white">New Content Type</strong>
                                    and add your fields</span
                                >
                            </li>
                            <li class="flex items-start gap-2">
                                <span class="mt-0.5 text-brand-500">→</span>
                                <span>Save — it's immediately available when writing pages</span>
                            </li>
                        </ul>
                    </div>

                    <!-- Screenshot placeholder -->
                    <div
                        class="mt-5 flex aspect-video w-full items-center justify-center rounded-xl border border-dashed border-gray-200 bg-gray-50 sm:mt-0 sm:aspect-auto sm:h-52 sm:w-72 sm:shrink-0 dark:border-white/10 dark:bg-white/[0.02]"
                    >
                        <p class="text-xs text-gray-400 dark:text-gray-600">Screenshot — field builder</p>
                    </div>
                </div>
            </div>

            <!-- Publish -->
            <div
                id="publish"
                class="scroll-mt-24 space-y-5"
            >
                <Heading
                    as="h2"
                    :level="3"
                    >Write and publish</Heading
                >

                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Go to <strong class="font-medium text-gray-900 dark:text-white">Pages → New Page</strong>, pick your
                    content type, fill in the fields, and click
                    <strong class="font-medium text-gray-900 dark:text-white">Publish</strong>. The page is immediately
                    live in the API.
                </p>

                <div class="flex gap-3 rounded-xl border border-gray-200 p-4 dark:border-white/10">
                    <div class="text-gray-400 dark:text-gray-500">
                        <svg
                            class="mt-0.5 size-4 shrink-0"
                            viewBox="0 0 20 20"
                            fill="none"
                        >
                            <path
                                d="M4 4h12v12H4zM8 8h4M8 12h2"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                            />
                        </svg>
                    </div>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        The <strong class="font-medium text-gray-900 dark:text-white">slug</strong> you set becomes the
                        URL segment used in API requests — e.g.
                        <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800"
                            >/api/v1/pages/my-first-post</code
                        >.
                    </p>
                </div>

                <!-- Screenshot placeholder -->
                <div
                    class="flex aspect-video items-center justify-center rounded-xl border border-dashed border-gray-200 bg-gray-50 dark:border-white/10 dark:bg-white/[0.02]"
                >
                    <p class="text-xs text-gray-400 dark:text-gray-600">Screenshot — page editor</p>
                </div>
            </div>

            <!-- API call -->
            <div
                id="api-call"
                class="scroll-mt-24 space-y-5"
            >
                <div>
                    <Heading
                        as="h2"
                        :level="3"
                        >Make your first API call</Heading
                    >
                    <p class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                        Every request uses a Bearer token in the
                        <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800"
                            >Authorization</code
                        >
                        header. The API returns only published content and follows the
                        <Link
                            href="/docs/api/json-api"
                            class="text-brand-600 hover:underline dark:text-brand-400"
                            >JSON:API</Link
                        >
                        spec.
                    </p>
                </div>

                <pre
                    class="overflow-x-auto rounded-xl border border-gray-200 bg-gray-100 dark:border-white/10 dark:bg-gray-900 p-5 text-sm leading-relaxed"
                ><code class="font-mono text-gray-100"><span class="text-gray-500"># Authenticate</span>
curl https://api.papevi.app/api/test \
  -H <span class="text-brand-300">"Authorization: Bearer $PAPEVI_TOKEN"</span>

<span class="text-gray-500"># Fetch your pages</span>
curl https://api.papevi.app/api/v1/pages \
  -H <span class="text-brand-300">"Authorization: Bearer $PAPEVI_TOKEN"</span>

<span class="text-gray-500"># Fetch a single page by slug</span>
curl https://api.papevi.app/api/v1/pages/my-first-post \
  -H <span class="text-brand-300">"Authorization: Bearer $PAPEVI_TOKEN"</span></code></pre>

                <CodeTabs>
                    <Code
                        label="TypeScript"
                        lang="typescript"
                        :code="apiCallExamples['TypeScript']"
                    />
                    <Code
                        label="PHP"
                        lang="php"
                        :code="apiCallExamples['PHP']"
                    />
                    <Code
                        label="C#"
                        lang="csharp"
                        :code="apiCallExamples['C#']"
                    />
                </CodeTabs>
            </div>

            <!-- Next steps -->
            <div
                id="next-steps"
                class="scroll-mt-24 space-y-4 border-t border-gray-200 pt-10 dark:border-white/8"
            >
                <div>
                    <Heading
                        as="h2"
                        :level="3"
                        >Go further</Heading
                    >
                    <p class="mt-1.5 text-sm text-gray-600 dark:text-gray-300">
                        Dig into the full API reference and editor guides.
                    </p>
                </div>
                <div class="grid gap-3 sm:grid-cols-2">
                    <Link
                        href="/docs/api/authentication"
                        class="group flex items-center justify-between rounded-xl border border-gray-200 p-4 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                    >
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Authentication</p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Token types, domain verification, and security
                            </p>
                        </div>
                        <svg
                            class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500"
                            viewBox="0 0 20 20"
                            fill="none"
                        >
                            <path
                                d="M7 5l5 5-5 5"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                    <Link
                        href="/docs/api/pages"
                        class="group flex items-center justify-between rounded-xl border border-gray-200 p-4 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                    >
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Pages API</p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Endpoints, filtering, sorting, and response shapes
                            </p>
                        </div>
                        <svg
                            class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500"
                            viewBox="0 0 20 20"
                            fill="none"
                        >
                            <path
                                d="M7 5l5 5-5 5"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                    <Link
                        href="/docs/api/menus"
                        class="group flex items-center justify-between rounded-xl border border-gray-200 p-4 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                    >
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Menus API</p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Navigation menus and structured item trees
                            </p>
                        </div>
                        <svg
                            class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500"
                            viewBox="0 0 20 20"
                            fill="none"
                        >
                            <path
                                d="M7 5l5 5-5 5"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                    <Link
                        href="/docs/api/json-api"
                        class="group flex items-center justify-between rounded-xl border border-gray-200 p-4 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                    >
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">JSON:API spec</p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">
                                Response format, pagination, and relationships
                            </p>
                        </div>
                        <svg
                            class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500"
                            viewBox="0 0 20 20"
                            fill="none"
                        >
                            <path
                                d="M7 5l5 5-5 5"
                                stroke="currentColor"
                                stroke-width="1.8"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
