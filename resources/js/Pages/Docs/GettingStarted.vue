<script setup lang="ts">
import DocsToc from '@/Components/Docs/DocsToc.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const tocItems = [
    { id: 'step-1', label: 'Step 1 — Create a token' },
    { id: 'step-2', label: 'Step 2 — First request' },
    { id: 'step-3', label: 'Step 3 — Verify domain' },
    { id: 'next-steps', label: 'Next steps' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Quick Start — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">Getting Started</p>
                <h1 class="text-4xl font-bold tracking-[-0.025em] text-gray-900 dark:text-white">Quick Start</h1>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Create an API token, verify your domain for production, and make your first request.
                </p>
            </div>

            <!-- Step 1 -->
            <div class="space-y-4">
                <h2 id="step-1" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">
                    Step 1 — Create an API token
                </h2>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Tokens are created per site inside your workspace settings. Each token automatically identifies the site it belongs to — you never need to pass a site ID in the request.
                </p>
                <ol class="space-y-3 text-sm text-gray-700 dark:text-gray-200">
                    <li class="flex gap-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-brand-300 bg-brand-50 text-[11px] font-semibold text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-300">1</span>
                        <span>Go to <strong class="font-medium text-gray-900 dark:text-white">Site Settings → API Tokens</strong>.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-brand-300 bg-brand-50 text-[11px] font-semibold text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-300">2</span>
                        <span>Click <strong class="font-medium text-gray-900 dark:text-white">Create Token</strong>, give it a name (e.g. <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">Website Integration</code>), and choose the type.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-brand-300 bg-brand-50 text-[11px] font-semibold text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-300">3</span>
                        <span><strong class="font-medium text-gray-900 dark:text-white">Copy the token immediately</strong> — it is shown only once.</span>
                    </li>
                </ol>

                <div
                    class="flex gap-3 rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800 dark:border-yellow-500/20 dark:bg-yellow-500/5 dark:text-yellow-300"
                >
                    <svg class="mt-0.5 size-4 shrink-0" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <path d="M10 3L2 17h16L10 3z" stroke="currentColor" stroke-width="1.6" stroke-linejoin="round" />
                        <path d="M10 11V8M10 14v.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <p>For local development use a <strong class="font-medium">Dev token</strong>. For production use a <strong class="font-medium">Production token</strong> which requires a verified domain.</p>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="space-y-4">
                <h2 id="step-2" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">
                    Step 2 — Make your first request
                </h2>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Every request includes an <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">Authorization</code> header with your Bearer token. The response includes only currently published pages.
                </p>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500"># List all published pages</span>
curl https://api.papevi.app/api/v1/pages \
  -H <span class="text-brand-300">"Authorization: Bearer &lt;your-token&gt;"</span></code></pre>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500">// JavaScript (fetch)</span>
const res = await fetch(<span class="text-green-400">'https://api.papevi.app/api/v1/pages'</span>, {
  headers: {
    <span class="text-green-400">'Authorization'</span>: <span class="text-green-400">`Bearer ${process.env.PAPEVI_TOKEN}`</span>
  }
});
const { data } = await res.json();</code></pre>

                <pre class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5 text-sm leading-relaxed"><code class="font-mono text-gray-100"><span class="text-gray-500">// PHP (Laravel Http client)</span>
$response = Http::withToken(config(<span class="text-green-400">'services.papevi.token'</span>))
    ->get(<span class="text-green-400">'https://api.papevi.app/api/v1/pages'</span>);

$pages = $response->json(<span class="text-green-400">'data'</span>);</code></pre>
            </div>

            <!-- Step 3 -->
            <div class="space-y-4">
                <h2 id="step-3" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">
                    Step 3 — Verify your domain (production only)
                </h2>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Production tokens require at least one verified domain. Verification is done by adding a DNS TXT record to your domain.
                </p>
                <ol class="space-y-3 text-sm text-gray-700 dark:text-gray-200">
                    <li class="flex gap-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-brand-300 bg-brand-50 text-[11px] font-semibold text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-300">1</span>
                        <span>In <strong class="font-medium text-gray-900 dark:text-white">API Tokens → Verified Domains</strong>, click <strong class="font-medium text-gray-900 dark:text-white">Add Domain</strong> and enter your domain without <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">https://</code>.</span>
                    </li>
                    <li class="flex gap-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-brand-300 bg-brand-50 text-[11px] font-semibold text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-300">2</span>
                        <span>Add the provided TXT record to your DNS provider:</span>
                    </li>
                </ol>
                <div class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5">
                    <table class="w-full font-mono text-xs text-gray-300">
                        <thead>
                            <tr class="border-b border-white/10 text-gray-500">
                                <th class="pb-2 pr-8 text-left font-medium">Type</th>
                                <th class="pb-2 pr-8 text-left font-medium">Host</th>
                                <th class="pb-2 text-left font-medium">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3 pr-8">TXT</td>
                                <td class="pt-3 pr-8">@</td>
                                <td class="pt-3 text-brand-300">papevi-cms-verify=&lt;your-verification-token&gt;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <ol class="space-y-3 text-sm text-gray-700 dark:text-gray-200" start="3">
                    <li class="flex gap-3">
                        <span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full border border-brand-300 bg-brand-50 text-[11px] font-semibold text-brand-700 dark:border-brand-500/40 dark:bg-brand-500/10 dark:text-brand-300">3</span>
                        <span>Wait for DNS propagation (5–30 minutes), then click <strong class="font-medium text-gray-900 dark:text-white">Verify</strong>.</span>
                    </li>
                </ol>
            </div>

            <!-- Next steps -->
            <div class="space-y-3 border-t border-gray-200 pt-10 dark:border-white/8">
                <h2 id="next-steps" class="scroll-mt-24 text-xl font-semibold tracking-[-0.015em] text-gray-900 dark:text-white">Next steps</h2>
                <div class="grid gap-3 sm:grid-cols-2">
                    <Link
                        href="/docs/api/authentication"
                        class="group flex items-center justify-between rounded-xl border border-gray-200 p-4 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                    >
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Authentication reference</p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Full token types, rotation, and security guide</p>
                        </div>
                        <svg class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500" viewBox="0 0 20 20" fill="none">
                            <path d="M7 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </Link>
                    <Link
                        href="/docs/api/pages"
                        class="group flex items-center justify-between rounded-xl border border-gray-200 p-4 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                    >
                        <div>
                            <p class="text-sm font-medium text-gray-900 dark:text-white">Pages API reference</p>
                            <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">Endpoints, filtering, and response shapes</p>
                        </div>
                        <svg class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500" viewBox="0 0 20 20" fill="none">
                            <path d="M7 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </Link>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
