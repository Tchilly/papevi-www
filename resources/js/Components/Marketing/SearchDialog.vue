<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import {
    DialogClose,
    DialogContent,
    DialogDescription,
    DialogOverlay,
    DialogPortal,
    DialogRoot,
    DialogTitle,
    DialogTrigger,
    VisuallyHidden,
} from 'reka-ui';
import { computed, onMounted, onUnmounted, ref } from 'vue';

type Entry = {
    title: string;
    body: string;
    href: string;
    section: string;
    external?: boolean;
};

const open = ref(false);
const query = ref('');

const entries: Entry[] = [
    { section: 'Docs', title: 'Developer overview', body: 'Architecture, stack, and how Papevi fits together.', href: '/docs#developer' },
    { section: 'Docs', title: 'API & tokens', body: 'Authenticate, fetch pages, and manage tokens.', href: '/docs#api' },
    { section: 'Docs', title: 'Page types', body: 'Schema-per-type modeling with reusable blocks.', href: '/docs#page-types' },
    { section: 'Docs', title: 'Editor help', body: 'Authoring, review, comments, and publishing.', href: '/docs#editor' },
    { section: 'Docs', title: 'Roles & permissions', body: 'Predefined roles and the permission system.', href: '/docs#roles' },
    { section: 'Docs', title: 'Workflow & scheduling', body: 'Draft → review → approved → scheduled → published.', href: '/docs#workflow' },
    { section: 'Docs', title: 'GDPR media', body: 'Consent, retention, and privacy zones for assets.', href: '/docs#media' },
    { section: 'Platform', title: 'Headless architecture', body: 'API-first delivery for any channel.', href: '/docs#developer' },
    { section: 'Platform', title: 'Multi-tenancy', body: 'One install, many organizations and sites.', href: '/docs#developer' },
    { section: 'Platform', title: 'Audit & versioning', body: 'Full revision history with user context.', href: '/docs#workflow' },
];

const results = computed<Entry[]>(() => {
    const q = query.value.trim().toLowerCase();
    if (!q) {
        return entries.slice(0, 6);
    }
    return entries
        .filter(
            (e) =>
                e.title.toLowerCase().includes(q) ||
                e.body.toLowerCase().includes(q) ||
                e.section.toLowerCase().includes(q),
        )
        .slice(0, 12);
});

const onKey = (e: KeyboardEvent) => {
    if ((e.metaKey || e.ctrlKey) && e.key.toLowerCase() === 'k') {
        e.preventDefault();
        open.value = true;
    }
};

onMounted(() => window.addEventListener('keydown', onKey));
onUnmounted(() => window.removeEventListener('keydown', onKey));
</script>

<template>
    <DialogRoot v-model:open="open">
        <DialogTrigger
            class="inline-flex h-9 items-center gap-2 rounded-lg border border-gray-200 bg-gray-50 px-3 text-sm text-gray-600 transition hover:border-gray-300 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:border-white/10 dark:bg-white/5 dark:text-gray-300 dark:hover:border-white/20 dark:hover:text-white"
        >
            <svg class="size-4" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                <circle cx="9" cy="9" r="5.5" stroke="currentColor" stroke-width="1.6" />
                <path d="m13.5 13.5 3.5 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
            </svg>
            <span class="hidden sm:inline">Search</span>
            <kbd
                class="hidden rounded border border-gray-200 bg-gray-100 px-1.5 font-mono text-[10px] text-gray-700 sm:inline dark:border-white/10 dark:bg-white/5 dark:text-gray-400"
            >⌘K</kbd>
        </DialogTrigger>
        <DialogPortal>
            <DialogOverlay
                class="fixed inset-0 z-40 bg-gray-950/80 backdrop-blur-sm data-[state=open]:animate-in data-[state=open]:fade-in"
            />
            <DialogContent
                class="fixed left-1/2 top-24 z-50 w-[min(36rem,calc(100vw-2rem))] -translate-x-1/2 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-2xl focus:outline-none dark:border-white/10 dark:bg-gray-900"
            >
                <VisuallyHidden>
                    <DialogTitle>Search documentation</DialogTitle>
                    <DialogDescription>Find docs, page types, and editor help.</DialogDescription>
                </VisuallyHidden>

                <div class="flex items-center gap-3 border-b border-gray-200 px-4 py-3 dark:border-white/10">
                    <svg class="size-4 text-gray-400" viewBox="0 0 20 20" fill="none" aria-hidden="true">
                        <circle cx="9" cy="9" r="5.5" stroke="currentColor" stroke-width="1.6" />
                        <path d="m13.5 13.5 3.5 3.5" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" />
                    </svg>
                    <input
                        v-model="query"
                        type="text"
                        placeholder="Search docs, page types, editor help…"
                        autofocus
                        class="w-full border-0 bg-transparent p-0 text-sm text-gray-900 placeholder:text-gray-400 focus:outline-none focus:ring-0 dark:text-white dark:placeholder:text-gray-500"
                    />
                    <DialogClose
                        class="rounded border border-gray-200 px-1.5 font-mono text-[10px] text-gray-700 transition hover:text-gray-900 dark:border-white/10 dark:text-gray-400 dark:hover:text-white"
                        aria-label="Close"
                    >ESC</DialogClose>
                </div>

                <ul class="max-h-[60vh] overflow-y-auto p-2">
                    <li v-if="results.length === 0" class="px-3 py-6 text-center text-sm text-gray-400">
                        No matches.
                    </li>
                    <li v-for="entry in results" :key="entry.title + entry.href">
                        <Link
                            :href="entry.href"
                            class="flex items-start justify-between gap-3 rounded-lg px-3 py-2.5 text-left transition hover:bg-gray-100 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:hover:bg-white/5"
                            @click="open = false"
                        >
                            <div class="min-w-0">
                                <p class="truncate text-sm font-medium text-gray-900 dark:text-white">{{ entry.title }}</p>
                                <p class="truncate text-xs text-gray-600 dark:text-gray-400">{{ entry.body }}</p>
                            </div>
                            <span
                                class="shrink-0 rounded-full border border-gray-200 px-2 py-0.5 text-[10px] uppercase tracking-wider text-gray-700 dark:border-white/10 dark:text-gray-400"
                            >{{ entry.section }}</span>
                        </Link>
                    </li>
                </ul>
            </DialogContent>
        </DialogPortal>
    </DialogRoot>
</template>
