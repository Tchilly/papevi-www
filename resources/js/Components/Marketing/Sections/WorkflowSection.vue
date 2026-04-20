<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const stages = [
    { state: 'Draft', summary: 'Authors iterate freely without touching live content.' },
    { state: 'Review', summary: 'Reviewers validate quality and policy with comments.' },
    { state: 'Approved', summary: 'A final administrative checkpoint before release.' },
    { state: 'Scheduled', summary: 'Publish and unpublish on precise timestamps.' },
    { state: 'Published', summary: 'Live with audit-backed accountability and rollback.' },
];

const onImageLoad = (event: Event) => {
    (event.target as HTMLImageElement).dataset.loaded = 'true';
};

const onImageError = (event: Event) => {
    (event.target as HTMLImageElement).remove();
};
</script>

<template>
    <section
        id="workflow"
        class="border-t border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
    >
        <div class="mx-auto max-w-3xl text-center">
            <p class="mx-auto kicker">Workflow</p>
            <Heading
                as="h2"
                display="lg"
                class="mt-5"
            >
                Review discipline by default.
            </Heading>
            <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                Every page moves through a deterministic set of states with audit history, comment-driven approvals, and
                live-status scheduling.
            </p>
        </div>

        <ol class="mx-auto mt-14 grid max-w-6xl gap-4 sm:grid-cols-2 lg:grid-cols-5">
            <li
                v-for="(stage, index) in stages"
                :key="stage.state"
                class="relative glass-panel p-5"
            >
                <span class="font-mono text-xs text-brand-700 dark:text-brand-400">0{{ index + 1 }}</span>
                <p class="mt-2 text-base font-semibold text-gray-900 dark:text-white">{{ stage.state }}</p>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">{{ stage.summary }}</p>
            </li>
        </ol>

        <div class="mx-auto mt-14 max-w-5xl">
            <figure class="product-frame">
                <div class="product-frame-bar">
                    <span class="product-frame-dot"></span>
                    <span class="product-frame-dot"></span>
                    <span class="product-frame-dot"></span>
                    <span class="ml-3 font-mono text-[11px] text-gray-600 dark:text-gray-400">
                        workflow.papevi.app
                    </span>
                </div>
                <div class="relative aspect-[16/9] w-full overflow-hidden product-placeholder">
                    <img
                        src="/images/marketing/workflow.png"
                        alt="Workflow board"
                        class="absolute inset-0 h-full w-full object-cover opacity-0 transition data-[loaded=true]:opacity-100"
                        loading="lazy"
                        @load="onImageLoad"
                        @error="onImageError"
                    />
                    <div class="absolute inset-0 flex items-center justify-center text-sm text-gray-400">
                        <span class="font-mono">Workflow preview</span>
                    </div>
                </div>
            </figure>
        </div>
    </section>
</template>
