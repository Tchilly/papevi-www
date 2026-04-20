<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import Heading from '@/Components/Ui/Heading.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    laravelVersion: string;
    phpVersion: string;
}>();

const useCases = [
    {
        title: 'Marketing teams',
        body: 'Launch campaigns, landing pages, and blog content without waiting on developers. Papevi gives marketers a structured workspace with approval workflows built in.',
    },
    {
        title: 'Multi-brand publishers',
        body: 'Run multiple sites from one installation. Isolate content per brand while sharing infrastructure, blocks, and editorial standards across the organization.',
    },
    {
        title: 'Developer-led products',
        body: 'Model content as structured data, consume it through a predictable REST API, and ship to web, mobile, or any frontend — without CMS lock-in.',
    },
    {
        title: 'Regulated industries',
        body: 'Audit trails, role-based access, revision history, and GDPR-ready media controls give compliance teams the evidence they need.',
    },
    {
        title: 'Agencies & freelancers',
        body: 'Spin up client workspaces fast. Reusable page types and blocks mean less rebuilding and more shipping across projects.',
    },
    {
        title: 'Content-driven SaaS',
        body: 'Embed structured content into your product with API-first delivery. Help centers, changelogs, and knowledge bases — managed in one platform.',
    },
];
</script>

<template>
    <Head title="Use Cases — Papevi CMS" />

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <section class="px-6 py-24 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="kicker mx-auto">Use cases</p>
                    <Heading as="h1" display="lg" class="mt-5 text-balance">
                        Built for teams that move fast.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                        Whether you're a startup shipping landing pages or an enterprise managing
                        multi-brand content — Papevi adapts to how your team works.
                    </p>
                </div>

                <div class="mx-auto mt-20 grid max-w-6xl gap-8 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="item in useCases"
                        :key="item.title"
                        class="glass-panel space-y-3 p-6"
                    >
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ item.title }}</p>
                        <p class="text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ item.body }}</p>
                    </div>
                </div>
            </section>

            <CtaSection />
        </main>

        <MarketingFooter :laravel-version="laravelVersion" :php-version="phpVersion" />
    </div>
</template>
