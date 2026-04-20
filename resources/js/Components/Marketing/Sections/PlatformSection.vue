<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';

const qualities = [
    { name: 'EU data centres', detail: 'Your data stays in Europe — hosted, processed, and backed up in EU-certified infrastructure.' },
    { name: 'CDN-accelerated delivery', detail: 'Content delivered at edge speed, wherever your readers and customers are in the world.' },
    { name: 'Scales with you', detail: 'From your first publish to millions of requests — no re-platforming, no migration headaches.' },
    { name: 'Always-on availability', detail: 'Engineered for reliability with seamless updates pushed without downtime or disruption.' },
    { name: 'Encrypted in transit and at rest', detail: 'Every request and every stored record is protected from end to end, always.' },
    { name: 'Bring your own database', detail: 'SaaS-first by default, with the option to keep content in your own database on request.' },
];
</script>

<template>
    <section
        id="platform"
        class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950"
    >
        <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.9fr_1.1fr] lg:gap-16">
            <div class="space-y-5">
                <p class="kicker">Infrastructure</p>
                <Heading as="h2" display="lg" class="text-balance">
                    Built to keep up with you.
                </Heading>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    Papevi runs on hardened, EU-hosted infrastructure — tuned for speed,
                    resilience, and growth without hidden limits or surprise migrations.
                </p>
            </div>

            <div class="grid gap-3 sm:grid-cols-2">
                <div v-for="item in qualities" :key="item.name" class="glass-panel p-5">
                    <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ item.name }}</p>
                    <p class="mt-1 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ item.detail }}</p>
                </div>
            </div>
        </div>
    </section>
</template>
