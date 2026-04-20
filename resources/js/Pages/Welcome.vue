<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import AboutSection from '@/Components/Marketing/Sections/AboutSection.vue';
import BetaSignupSection from '@/Components/Marketing/Sections/BetaSignupSection.vue';
import CapabilitiesSection from '@/Components/Marketing/Sections/CapabilitiesSection.vue';
import DocsSection from '@/Components/Marketing/Sections/DocsSection.vue';
import FaqSection from '@/Components/Marketing/Sections/FaqSection.vue';
import FeaturesSection from '@/Components/Marketing/Sections/FeaturesSection.vue';
import HeroSection from '@/Components/Marketing/Sections/HeroSection.vue';
import PlatformSection from '@/Components/Marketing/Sections/PlatformSection.vue';
import TrustSection from '@/Components/Marketing/Sections/TrustSection.vue';
import WorkflowSection from '@/Components/Marketing/Sections/WorkflowSection.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    betaSuccess?: string;
}>();

const structuredData = {
    '@context': 'https://schema.org',
    '@graph': [
        {
            '@type': 'WebSite',
            'name': 'Papevi CMS',
            'url': '/',
            'description': 'Headless CMS for teams that need structured content, editorial workflow, and a reliable API.',
        },
        {
            '@type': 'Organization',
            'name': 'Papevi',
            'url': '/',
            'description': 'Papevi builds a structured headless CMS for ambitious teams — with editorial workflow, multi-site support, and a clean API.',
        },
        {
            '@type': 'SoftwareApplication',
            'name': 'Papevi CMS',
            'applicationCategory': 'BusinessApplication',
            'operatingSystem': 'Web',
            'description': 'Structured headless CMS with editorial workflow, REST API, media management, multi-locale support, and a free developer tier.',
            'offers': {
                '@type': 'AggregateOffer',
                'lowPrice': '0',
                'highPrice': '129',
                'priceCurrency': 'EUR',
                'offerCount': '5',
            },
        },
    ],
};
</script>

<template>
    <Head>
        <title>Papevi CMS — The content platform for ambitious teams</title>
        <meta head-key="description" name="description" content="Papevi is a headless CMS built for teams that need structured content, editorial workflow, and a clean API. Free developer tier — no credit card required." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('home')" />
        <meta head-key="og:type" property="og:type" content="website" />
        <meta head-key="og:title" property="og:title" content="Papevi CMS — The content platform for ambitious teams" />
        <meta head-key="og:description" property="og:description" content="Papevi is a headless CMS built for teams that need structured content, editorial workflow, and a clean API. Free developer tier — no credit card required." />
        <meta head-key="og:url" property="og:url" :content="route('home')" />
        <meta head-key="twitter:card" name="twitter:card" content="summary_large_image" />
        <meta head-key="twitter:title" name="twitter:title" content="Papevi CMS — The content platform for ambitious teams" />
        <meta head-key="twitter:description" name="twitter:description" content="Papevi is a headless CMS built for content teams that demand structure, workflow, and a clean API." />
        <component :is="'script'" type="application/ld+json" v-text="JSON.stringify(structuredData)" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <HeroSection />
            <FeaturesSection />
            <CapabilitiesSection />
            <WorkflowSection />
            <AboutSection />
            <PlatformSection />
            <DocsSection />
            <FaqSection />
            <TrustSection />
            <BetaSignupSection />
        </main>

        <MarketingFooter />
    </div>
</template>
