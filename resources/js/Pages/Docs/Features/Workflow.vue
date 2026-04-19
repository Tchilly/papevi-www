<script setup lang="ts">
import DocsToc from '@/Components/Docs/DocsToc.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

const tocItems = [
    { id: 'content-states', label: 'Content states' },
    { id: 'scheduling', label: 'Scheduling' },
    { id: 'who-can-do-what', label: 'Who can do what' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Workflow & Publishing — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">Editor Guide</p>
                <Heading as="h1" :level="1" class="text-gray-900 dark:text-white">Workflow &amp; Publishing</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Every page moves through a deterministic set of states. Status is computed live from timestamps — there is no stored status field.
                </p>
            </div>

            <!-- States overview -->
            <div class="space-y-4">
                <Heading as="h2" id="content-states" :level="3" class="scroll-mt-24 text-gray-900 dark:text-white">Content states</Heading>

                <div class="space-y-3">
                    <div class="flex gap-4 rounded-xl border border-gray-200 p-5 dark:border-white/10">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-gray-100 dark:bg-white/10">
                            <span class="text-[10px] font-semibold text-gray-600 dark:text-gray-300">1</span>
                        </div>
                        <div>
                            <p class="flex items-center gap-2 text-sm font-semibold text-gray-900 dark:text-white">
                                Draft
                                <span class="rounded-md border border-gray-200 bg-gray-100 px-1.5 py-0.5 text-[10px] font-medium text-gray-500 dark:border-white/10 dark:bg-white/5 dark:text-gray-400">API: hidden</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                The default state. Authors iterate freely without touching live content. No <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800">published_at</code> date is set.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-xl border border-gray-200 p-5 dark:border-white/10">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-yellow-100 dark:bg-yellow-500/10">
                            <span class="text-[10px] font-semibold text-yellow-700 dark:text-yellow-400">2</span>
                        </div>
                        <div>
                            <p class="flex items-center gap-2 text-sm font-semibold text-gray-900 dark:text-white">
                                Review
                                <span class="rounded-md border border-gray-200 bg-gray-100 px-1.5 py-0.5 text-[10px] font-medium text-gray-500 dark:border-white/10 dark:bg-white/5 dark:text-gray-400">API: hidden</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                Reviewers validate quality and policy via inline comments. Authors address feedback before moving forward.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-xl border border-gray-200 p-5 dark:border-white/10">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-brand-100 dark:bg-brand-500/10">
                            <span class="text-[10px] font-semibold text-brand-700 dark:text-brand-400">3</span>
                        </div>
                        <div>
                            <p class="flex items-center gap-2 text-sm font-semibold text-gray-900 dark:text-white">
                                Approved
                                <span class="rounded-md border border-gray-200 bg-gray-100 px-1.5 py-0.5 text-[10px] font-medium text-gray-500 dark:border-white/10 dark:bg-white/5 dark:text-gray-400">API: hidden</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                Administrative checkpoint before release. Content can be published immediately or scheduled.
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-xl border border-yellow-200 bg-yellow-50/30 p-5 dark:border-yellow-500/20 dark:bg-yellow-500/5">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-yellow-200 dark:bg-yellow-500/20">
                            <span class="text-[10px] font-semibold text-yellow-800 dark:text-yellow-300">4</span>
                        </div>
                        <div>
                            <p class="flex items-center gap-2 text-sm font-semibold text-gray-900 dark:text-white">
                                Scheduled
                                <span class="rounded-md border border-yellow-300 bg-yellow-100 px-1.5 py-0.5 text-[10px] font-medium text-yellow-700 dark:border-yellow-500/30 dark:bg-yellow-500/10 dark:text-yellow-400">API: hidden until publish time</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800">published_at</code> is set to a future time. The page becomes visible automatically when that time arrives (checked every minute).
                            </p>
                        </div>
                    </div>

                    <div class="flex gap-4 rounded-xl border border-green-200 bg-green-50/30 p-5 dark:border-green-500/20 dark:bg-green-500/5">
                        <div class="mt-0.5 flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-green-200 dark:bg-green-500/20">
                            <span class="text-[10px] font-semibold text-green-800 dark:text-green-300">5</span>
                        </div>
                        <div>
                            <p class="flex items-center gap-2 text-sm font-semibold text-gray-900 dark:text-white">
                                Published
                                <span class="rounded-md border border-green-300 bg-green-100 px-1.5 py-0.5 text-[10px] font-medium text-green-700 dark:border-green-500/30 dark:bg-green-500/10 dark:text-green-400">API: visible</span>
                            </p>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                                Live on the API. <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800">published_at</code> ≤ now and either <code class="rounded bg-gray-100 px-1 font-mono text-xs dark:bg-gray-800">unpublish_at</code> is null or in the future.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scheduling -->
            <div class="space-y-4">
                <Heading as="h2" id="scheduling" :level="3" class="scroll-mt-24 text-gray-900 dark:text-white">Scheduling</Heading>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Set <strong class="font-medium text-gray-900 dark:text-white">Publish at</strong> to schedule a go-live. Set <strong class="font-medium text-gray-900 dark:text-white">Unpublish at</strong> to expire content automatically. A background job processes both every minute.
                </p>

                <div class="grid gap-4 sm:grid-cols-3 text-sm">
                    <div class="space-y-2 rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Scenario: Scheduled publish</p>
                        <ol class="space-y-1 text-xs text-gray-500 dark:text-gray-400 list-decimal list-inside">
                            <li>Set <code class="font-mono">published_at</code> to tomorrow 9am</li>
                            <li>Status shows "Scheduled"</li>
                            <li>API returns 404 until that time</li>
                            <li>Job fires, page becomes Published</li>
                            <li>API returns 200</li>
                        </ol>
                    </div>
                    <div class="space-y-2 rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Scenario: Auto-unpublish</p>
                        <ol class="space-y-1 text-xs text-gray-500 dark:text-gray-400 list-decimal list-inside">
                            <li>Page is live, set <code class="font-mono">unpublish_at</code></li>
                            <li>Status stays "Published" until then</li>
                            <li>Job fires at unpublish time</li>
                            <li>Status becomes "Unscheduled"</li>
                            <li>API returns 404</li>
                        </ol>
                    </div>
                    <div class="space-y-2 rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Scenario: Re-publish</p>
                        <ol class="space-y-1 text-xs text-gray-500 dark:text-gray-400 list-decimal list-inside">
                            <li>Page was unpublished</li>
                            <li>Update <code class="font-mono">published_at</code> to now</li>
                            <li>Next job run publishes it again</li>
                            <li>API returns 200</li>
                        </ol>
                    </div>
                </div>
            </div>

            <!-- Role permissions -->
            <div class="space-y-4">
                <Heading as="h2" id="who-can-do-what" :level="3" class="scroll-mt-24 text-gray-900 dark:text-white">Who can do what</Heading>
                <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                            <tr>
                                <th class="px-5 py-3 text-left font-medium">Action</th>
                                <th class="px-5 py-3 text-left font-medium">Editor</th>
                                <th class="px-5 py-3 text-left font-medium">Moderator</th>
                                <th class="px-5 py-3 text-left font-medium">Site Owner</th>
                                <th class="px-5 py-3 text-left font-medium">Admin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                            <tr>
                                <td class="px-5 py-3">Create/edit draft</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Submit for review</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Approve</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Publish / schedule</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Force unpublish</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Nav to versioning -->
            <div class="border-t border-gray-200 pt-10 dark:border-white/8">
                <Link
                    href="/docs/features/versioning"
                    class="group flex items-center justify-between rounded-xl border border-gray-200 p-5 transition hover:border-brand-400/40 dark:border-white/10 dark:hover:border-brand-400/30"
                >
                    <div>
                        <p class="text-sm font-medium text-gray-900 dark:text-white">Next: Versioning & Audit</p>
                        <p class="mt-0.5 text-xs text-gray-500 dark:text-gray-400">How every change is tracked, compared, and reverted</p>
                    </div>
                    <svg class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 dark:text-gray-500" viewBox="0 0 20 20" fill="none">
                        <path d="M7 5l5 5-5 5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </Link>
            </div>
        </div>
    </DocsLayout>
</template>
