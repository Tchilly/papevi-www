<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import AboutSection from '@/Components/Marketing/Sections/AboutSection.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import { Head } from '@inertiajs/vue3';

const structuredData = {
    '@context': 'https://schema.org',
    '@graph': [
        {
            '@type': 'AboutPage',
            'name': 'About Papevi CMS — The content platform for ambitious teams',
            'description': 'Learn about Papevi — a headless CMS built to give content teams structure, editorial control, and a reliable API for any frontend.',
            'inLanguage': 'en',
            'breadcrumb': {
                '@type': 'BreadcrumbList',
                'itemListElement': [
                    { '@type': 'ListItem', 'position': 1, 'name': 'Home', 'item': '/' },
                    { '@type': 'ListItem', 'position': 2, 'name': 'About', 'item': '/about' },
                ],
            },
        },
        {
            '@type': 'Organization',
            'name': 'Papevi',
            'url': '/',
            'description': 'Papevi builds a structured headless CMS for ambitious teams — with editorial workflow, multi-site support, and a clean API.',
        },
    ],
};
</script>

<template>
    <Head>
        <title>About Papevi CMS — The content platform for ambitious teams</title>
        <meta head-key="description" name="description" content="Learn about Papevi — a headless CMS built to give content teams structure, editorial control, and a reliable API for any frontend." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('about')" />
        <meta head-key="og:type" property="og:type" content="website" />
        <meta head-key="og:title" property="og:title" content="About Papevi CMS — The content platform for ambitious teams" />
        <meta head-key="og:description" property="og:description" content="Learn about Papevi — a headless CMS built to give content teams structure, editorial control, and a reliable API for any frontend." />
        <meta head-key="og:url" property="og:url" :content="route('about')" />
        <meta head-key="twitter:card" name="twitter:card" content="summary" />
        <meta head-key="twitter:title" name="twitter:title" content="About Papevi CMS" />
        <meta head-key="twitter:description" name="twitter:description" content="Learn about Papevi — a headless CMS built to give content teams structure, editorial control, and a reliable API." />
        <component :is="'script'" type="application/ld+json" v-text="JSON.stringify(structuredData)" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <AboutSection />
            <CtaSection />
        </main>

        <MarketingFooter />
    </div>
</template>
