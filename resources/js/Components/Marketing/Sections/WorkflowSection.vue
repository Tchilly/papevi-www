<script setup lang="ts">
import { workflowImage } from '@/Components/Marketing/marketingImages';
import ProductFrame from '@/Components/Marketing/ProductFrame.vue';
import Heading from '@/Components/Ui/Heading.vue';

const stages = [
    { state: 'Draft', summary: 'Authors iterate freely without touching live content.' },
    { state: 'Review', summary: 'Reviewers validate quality and policy with comments.' },
    { state: 'Approved', summary: 'A final administrative checkpoint before release.' },
    { state: 'Scheduled', summary: 'Publish and unpublish on precise timestamps.' },
    { state: 'Published', summary: 'Live with audit-backed accountability and rollback.' },
];
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
            <ProductFrame
                url="workflow.papevi.app"
                :src="workflowImage"
                alt="Workflow board"
                label="Workflow preview"
                aspect="16/9"
            />
        </div>
    </section>
</template>
