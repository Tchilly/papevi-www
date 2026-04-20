<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';

import DocsToc from '@/Components/Docs/DocsToc.vue';
import Code from '@/Components/Ui/Code.vue';
import CodeTabs from '@/Components/Ui/CodeTabs.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';

import { frameworkExamples } from './authExamples';

const tocItems = [
    { id: 'token-types', label: 'Token types' },
    { id: 'authorization-header', label: 'Authorization header' },
    { id: 'test-connection', label: 'Test connection' },
    { id: 'framework-examples', label: 'Code examples' },
    { id: 'domain-verification', label: 'Domain verification' },
    { id: 'managing-tokens', label: 'Managing tokens' },
    { id: 'security-practices', label: 'Security practices' },
    { id: 'error-responses', label: 'Error responses' },
];

const headerCurlExample = 'curl https://api.papevi.app/api/v1/pages \\\n  -H "Authorization: Bearer $PAPEVI_TOKEN"';
const headerTsExample = "fetch('/api/v1/pages', {\n  headers: { 'Authorization': `Bearer ${token}` }\n})";
const headerPhpExample =
    "<?php\nuse Illuminate\\Support\\Facades\\Http;\n\nHttp::withToken($token)->get('/api/v1/pages');";
const headerCsharpExample =
    'var client = new HttpClient();\n' +
    'client.DefaultRequestHeaders.Authorization =\n' +
    '    new AuthenticationHeaderValue("Bearer", token);\n' +
    'var response = await client.GetAsync("/api/v1/pages");';

const testCurlExample = 'curl https://api.papevi.app/api/test \\\n  -H "Authorization: Bearer <token>"';
const testResponseExample =
    '{\n' +
    '  "meta": {\n' +
    '    "message": "API token verified successfully",\n' +
    '    "site_id": 1\n' +
    '  }\n' +
    '}';
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Authentication — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold tracking-[0.14em] text-brand-600 uppercase dark:text-brand-400">
                    API Reference
                </p>
                <Heading as="h1">Authentication</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    All API requests are authenticated with Bearer tokens. Tokens identify your site automatically — no
                    site ID needed in URLs.
                </p>
            </div>

            <!-- Token types -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="token-types"
                    :level="3"
                    class="scroll-mt-24"
                    >Token types</Heading
                >
                <div class="grid gap-4 sm:grid-cols-2">
                    <div class="rounded-xl border border-gray-200 p-5 dark:border-white/10">
                        <div class="mb-3 flex items-center gap-2">
                            <span
                                class="rounded-full border border-green-300 bg-green-50 px-2 py-0.5 text-xs font-medium text-green-700 dark:border-green-500/30 dark:bg-green-500/10 dark:text-green-400"
                                >Dev</span
                            >
                        </div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Development token</p>
                        <ul class="mt-3 space-y-1.5 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex gap-2">
                                <span class="text-green-600 dark:text-green-400">✓</span> Works from
                                <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800"
                                    >localhost</code
                                >,
                                <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800">*.dev</code>,
                                <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800">*.test</code>
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-600 dark:text-green-400">✓</span> No domain verification
                                required
                            </li>
                            <li class="flex gap-2">
                                <span class="text-red-500 dark:text-red-400">✗</span> Cannot be used from production
                                domains
                            </li>
                        </ul>
                    </div>
                    <div class="rounded-xl border border-brand-200 p-5 dark:border-brand-400/30">
                        <div class="mb-3 flex items-center gap-2">
                            <span
                                class="rounded-full border border-brand-300 bg-brand-50 px-2 py-0.5 text-xs font-medium text-brand-700 dark:border-brand-500/30 dark:bg-brand-500/10 dark:text-brand-400"
                                >Production</span
                            >
                        </div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Production token</p>
                        <ul class="mt-3 space-y-1.5 text-sm text-gray-600 dark:text-gray-300">
                            <li class="flex gap-2">
                                <span class="text-green-600 dark:text-green-400">✓</span> Requires at least one verified
                                domain
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-600 dark:text-green-400">✓</span> Domain ownership verified via
                                DNS TXT
                            </li>
                            <li class="flex gap-2">
                                <span class="text-green-600 dark:text-green-400">✓</span> Recommended for live
                                applications
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Authorization header -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="authorization-header"
                    :level="3"
                    class="scroll-mt-24"
                    >Authorization header</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Include the token in every request using the standard
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800"
                        >Authorization</code
                    >
                    header.
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        code="Authorization: Bearer <your-token>"
                        lang="bash"
                    />
                </div>

                <CodeTabs>
                    <Code
                        label="curl"
                        lang="bash"
                        :code="headerCurlExample"
                    />
                    <Code
                        label="TypeScript"
                        lang="typescript"
                        :code="headerTsExample"
                    />
                    <Code
                        label="PHP"
                        lang="php"
                        :code="headerPhpExample"
                    />
                    <Code
                        label="C#"
                        lang="csharp"
                        :code="headerCsharpExample"
                    />
                </CodeTabs>
            </div>

            <!-- Test connection -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="test-connection"
                    :level="3"
                    class="scroll-mt-24"
                    >Test connection</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Use the test endpoint to verify your token and retrieve your
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">site_id</code>.
                    Note this endpoint is at
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">/api/test</code>
                    (no
                    <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-gray-800">v1</code>
                    prefix).
                </p>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="bash"
                        :code="testCurlExample"
                    />
                </div>

                <div class="overflow-hidden rounded-xl border border-white/10 bg-gray-950">
                    <Code
                        lang="json"
                        :code="testResponseExample"
                    />
                </div>
            </div>

            <!-- Code examples -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="framework-examples"
                    :level="3"
                    class="scroll-mt-24"
                    >Code examples</Heading
                >
                <p class="text-sm text-gray-600 dark:text-gray-300">
                    Ready-to-use clients for common stacks. Store your token in an environment variable — never in
                    client-side code.
                </p>

                <CodeTabs>
                    <Code
                        label="TypeScript"
                        lang="typescript"
                        :code="frameworkExamples['TypeScript']"
                    />
                    <Code
                        label="PHP"
                        lang="php"
                        :code="frameworkExamples['PHP']"
                    />
                    <Code
                        label="C#"
                        lang="csharp"
                        :code="frameworkExamples['C#']"
                    />
                </CodeTabs>
            </div>

            <!-- Domain verification -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="domain-verification"
                    :level="3"
                    class="scroll-mt-24"
                    >Domain verification</Heading
                >
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Add your domain in
                    <strong class="font-medium text-gray-900 dark:text-white">API Tokens → Verified Domains</strong>,
                    then add this TXT record to your DNS:
                </p>
                <div class="overflow-x-auto rounded-xl border border-white/10 bg-gray-950 p-5">
                    <table class="w-full font-mono text-xs text-gray-300">
                        <thead>
                            <tr class="border-b border-white/10 text-gray-500">
                                <th class="pr-10 pb-2 text-left font-medium">Type</th>
                                <th class="pr-10 pb-2 text-left font-medium">Host</th>
                                <th class="pr-10 pb-2 text-left font-medium">TTL</th>
                                <th class="pb-2 text-left font-medium">Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="pt-3 pr-10">TXT</td>
                                <td class="pt-3 pr-10">@</td>
                                <td class="pt-3 pr-10">3600</td>
                                <td class="pt-3 text-brand-300">papevi-cms-verify=&lt;token&gt;</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    DNS propagation typically takes 5–30 minutes. Click <strong>Verify</strong> once the record is live.
                </p>
            </div>

            <!-- Token management -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="managing-tokens"
                    :level="3"
                    class="scroll-mt-24"
                    >Managing tokens</Heading
                >

                <div class="space-y-3">
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Token limits by plan</p>
                        <div class="mt-3 overflow-x-auto">
                            <table class="w-full text-sm">
                                <thead class="text-xs text-gray-500 dark:text-gray-400">
                                    <tr>
                                        <th class="pr-10 pb-2 text-left font-medium">Plan</th>
                                        <th class="pb-2 text-left font-medium">Max tokens</th>
                                    </tr>
                                </thead>
                                <tbody class="text-gray-700 dark:text-gray-200">
                                    <tr class="border-t border-gray-100 dark:border-white/8">
                                        <td class="py-2 pr-10">Free</td>
                                        <td class="py-2">2</td>
                                    </tr>
                                    <tr class="border-t border-gray-100 dark:border-white/8">
                                        <td class="py-2 pr-10">Pro</td>
                                        <td class="py-2">5</td>
                                    </tr>
                                    <tr class="border-t border-gray-100 dark:border-white/8">
                                        <td class="py-2 pr-10">Enterprise</td>
                                        <td class="py-2">Unlimited</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <p class="text-sm text-gray-600 dark:text-gray-300">
                    To revoke a token go to
                    <strong class="font-medium text-gray-900 dark:text-white">Site Settings → API Tokens</strong>, click
                    the trash icon, and confirm. Revocation is immediate and permanent.
                </p>
            </div>

            <!-- Security -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="security-practices"
                    :level="3"
                    class="scroll-mt-24"
                    >Security practices</Heading
                >
                <div class="grid gap-3 text-sm sm:grid-cols-2">
                    <div
                        class="rounded-xl border border-green-200 bg-green-50/50 p-4 dark:border-green-500/20 dark:bg-green-500/5"
                    >
                        <p class="font-medium text-green-800 dark:text-green-300">Do</p>
                        <ul class="mt-2 space-y-1 text-green-700 dark:text-green-400">
                            <li>Store tokens in environment variables</li>
                            <li>Use production tokens for live sites</li>
                            <li>Rotate tokens regularly</li>
                            <li>Use separate tokens per environment</li>
                        </ul>
                    </div>
                    <div
                        class="rounded-xl border border-red-200 bg-red-50/50 p-4 dark:border-red-500/20 dark:bg-red-500/5"
                    >
                        <p class="font-medium text-red-800 dark:text-red-300">Don't</p>
                        <ul class="mt-2 space-y-1 text-red-700 dark:text-red-400">
                            <li>Commit tokens to version control</li>
                            <li>Use dev tokens in production</li>
                            <li>Expose tokens in client-side code</li>
                            <li>Share tokens between team members</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Error messages -->
            <div class="space-y-4">
                <Heading
                    as="h2"
                    id="error-responses"
                    :level="3"
                    class="scroll-mt-24"
                    >Error responses</Heading
                >
                <div class="space-y-2 text-sm">
                    <div class="flex gap-4 rounded-lg border border-gray-200 p-4 dark:border-white/10">
                        <code class="shrink-0 font-mono text-red-600 dark:text-red-400">401</code>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">API token is required</p>
                            <p class="text-gray-500 dark:text-gray-400">
                                No Bearer token was provided in the Authorization header.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-lg border border-gray-200 p-4 dark:border-white/10">
                        <code class="shrink-0 font-mono text-red-600 dark:text-red-400">401</code>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">Invalid API token</p>
                            <p class="text-gray-500 dark:text-gray-400">
                                Token is incorrect, expired, or has been revoked.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-lg border border-gray-200 p-4 dark:border-white/10">
                        <code class="shrink-0 font-mono text-red-600 dark:text-red-400">403</code>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">
                                This site is inactive. API access is disabled.
                            </p>
                            <p class="text-gray-500 dark:text-gray-400">
                                The site associated with this token has been deactivated.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-lg border border-gray-200 p-4 dark:border-white/10">
                        <code class="shrink-0 font-mono text-red-600 dark:text-red-400">403</code>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">
                                Development tokens can only be used from development environments
                            </p>
                            <p class="text-gray-500 dark:text-gray-400">
                                Dev tokens are restricted to local or development domains.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4 rounded-lg border border-gray-200 p-4 dark:border-white/10">
                        <code class="shrink-0 font-mono text-red-600 dark:text-red-400">403</code>
                        <div>
                            <p class="font-medium text-gray-900 dark:text-white">
                                Production tokens require at least one verified domain for the site
                            </p>
                            <p class="text-gray-500 dark:text-gray-400">
                                Add and verify a domain for your site before using a production token.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </DocsLayout>
</template>
