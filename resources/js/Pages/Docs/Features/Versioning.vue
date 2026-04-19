<script setup lang="ts">
import DocsToc from '@/Components/Docs/DocsToc.vue';
import Heading from '@/Components/Ui/Heading.vue';
import DocsLayout from '@/Layouts/DocsLayout.vue';
import { Head } from '@inertiajs/vue3';

const tocItems = [
    { id: 'version-history', label: 'Version history' },
    { id: 'audit-trail', label: 'Audit trail' },
    { id: 'access-control', label: 'Access control' },
];
</script>

<template>
    <DocsLayout>
        <template #toc>
            <DocsToc :items="tocItems" />
        </template>

        <Head title="Versioning & Audit — Papevi CMS Docs" />

        <div class="space-y-10">
            <div class="space-y-3 border-b border-gray-200 pb-10 dark:border-white/8">
                <p class="text-xs font-semibold uppercase tracking-[0.14em] text-brand-600 dark:text-brand-400">Editor Guide</p>
                <Heading as="h1">Versioning &amp; Audit</Heading>
                <p class="max-w-xl text-lg text-gray-600 dark:text-gray-300">
                    Every save creates a version. Every action leaves an audit log. Compare any two versions side-by-side, revert with one click, and prove exactly what happened and when.
                </p>
            </div>

            <!-- Versions -->
            <div class="space-y-4">
                <Heading as="h2" id="version-history" :level="3" class="scroll-mt-24">Version history</Heading>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Each time content is saved a new <strong class="font-medium text-gray-900 dark:text-white">PageContent</strong> record is created. The published version is tracked by a pointer on the page — historical versions are always preserved.
                </p>

                <div class="grid gap-4 sm:grid-cols-3 text-sm">
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">View history</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Open a page → Version History. Each entry shows the author, language, and a preview of the content at that point in time.</p>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 dark:border-white/10">
                        <p class="font-medium text-gray-900 dark:text-white">Revert</p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Click <strong>Revert</strong> on any version to restore it. The revert itself is logged — nothing is silently overwritten.</p>
                    </div>
                    <div class="rounded-xl border border-brand-200 p-4 dark:border-brand-400/30">
                        <p class="font-medium text-gray-900 dark:text-white">Compare <span class="rounded border border-brand-300 bg-brand-50 px-1 text-[10px] text-brand-700 dark:border-brand-400/30 dark:bg-brand-400/10 dark:text-brand-300">Admin</span></p>
                        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Select two versions and click <strong>Compare Selected</strong>. A side-by-side diff highlights additions in green and removals in red, field by field.</p>
                    </div>
                </div>
            </div>

            <!-- Audit trail -->
            <div class="space-y-4">
                <Heading as="h2" id="audit-trail" :level="3" class="scroll-mt-24">Audit trail</Heading>
                <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                    Accessible to admins via <strong class="font-medium text-gray-900 dark:text-white">Version History → View Audit Logs</strong>. Each log entry captures the full context of the action.
                </p>

                <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                            <tr>
                                <th class="px-5 py-3 text-left font-medium">Field</th>
                                <th class="px-5 py-3 text-left font-medium">Description</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                            <tr>
                                <td class="px-5 py-3 font-mono text-xs">event</td>
                                <td class="px-5 py-3 text-xs">created, updated, deleted, published, unpublished, reverted, scheduled</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3 font-mono text-xs">user</td>
                                <td class="px-5 py-3 text-xs">Who performed the action</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3 font-mono text-xs">old_values</td>
                                <td class="px-5 py-3 text-xs">State before the change (JSON)</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3 font-mono text-xs">new_values</td>
                                <td class="px-5 py-3 text-xs">State after the change (JSON)</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3 font-mono text-xs">ip_address</td>
                                <td class="px-5 py-3 text-xs">For security auditing</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3 font-mono text-xs">created_at</td>
                                <td class="px-5 py-3 text-xs">Precise timestamp</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="space-y-2 text-sm">
                    <p class="font-medium text-gray-900 dark:text-white">Event color coding in the timeline</p>
                    <div class="flex flex-wrap gap-2 text-xs">
                        <span class="rounded-md border border-brand-200 bg-brand-50 px-2 py-1 text-brand-700 dark:border-brand-500/20 dark:bg-brand-500/10 dark:text-brand-400">Brand — Created</span>
                        <span class="rounded-md border border-yellow-200 bg-yellow-50 px-2 py-1 text-yellow-700 dark:border-yellow-500/20 dark:bg-yellow-500/10 dark:text-yellow-400">Yellow — Updated</span>
                        <span class="rounded-md border border-red-200 bg-red-50 px-2 py-1 text-red-700 dark:border-red-500/20 dark:bg-red-500/10 dark:text-red-400">Red — Deleted</span>
                        <span class="rounded-md border border-green-200 bg-green-50 px-2 py-1 text-green-700 dark:border-green-500/20 dark:bg-green-500/10 dark:text-green-400">Green — Published/Restored</span>
                        <span class="rounded-md border border-gray-200 bg-gray-100 px-2 py-1 text-gray-600 dark:border-white/10 dark:bg-white/5 dark:text-gray-300">Gray — Unpublished</span>
                        <span class="rounded-md border border-orange-200 bg-orange-50 px-2 py-1 text-orange-700 dark:border-orange-500/20 dark:bg-orange-500/10 dark:text-orange-400">Orange — Reverted</span>
                        <span class="rounded-md border border-yellow-200 bg-yellow-50 px-2 py-1 text-yellow-700 dark:border-yellow-500/20 dark:bg-yellow-500/10 dark:text-yellow-400">Yellow — Scheduled</span>
                    </div>
                </div>
            </div>

            <!-- Access control -->
            <div class="space-y-4">
                <Heading as="h2" id="access-control" :level="3" class="scroll-mt-24">Access control</Heading>
                <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-white/10">
                    <table class="w-full text-sm">
                        <thead class="bg-gray-50 text-xs text-gray-500 dark:bg-white/[0.03] dark:text-gray-400">
                            <tr>
                                <th class="px-5 py-3 text-left font-medium">Feature</th>
                                <th class="px-5 py-3 text-left font-medium">Editor</th>
                                <th class="px-5 py-3 text-left font-medium">Moderator</th>
                                <th class="px-5 py-3 text-left font-medium">Admin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 text-gray-700 dark:divide-white/8 dark:text-gray-200">
                            <tr>
                                <td class="px-5 py-3">View version list</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Preview version</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Revert to version</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">Compare versions (diff)</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                            <tr>
                                <td class="px-5 py-3">View audit log</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-gray-300 dark:text-gray-600">—</td>
                                <td class="px-5 py-3 text-green-600 dark:text-green-400">✓</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Compliance -->
            <div class="rounded-xl border border-brand-200 bg-brand-50/40 p-5 dark:border-brand-400/20 dark:bg-brand-400/5">
                <p class="text-sm font-semibold text-brand-800 dark:text-brand-300">Compliance notes</p>
                <ul class="mt-2 space-y-1 text-sm text-brand-700 dark:text-brand-400">
                    <li><strong class="font-medium">SOC 2</strong> — Comprehensive audit trails with timestamped user attribution and IP logging.</li>
                    <li><strong class="font-medium">GDPR</strong> — User action tracking for accountability. Old/new values stored without exposing sensitive data.</li>
                    <li><strong class="font-medium">Change management</strong> — Complete, tamper-evident history of every modification to every page.</li>
                </ul>
            </div>
        </div>
    </DocsLayout>
</template>
