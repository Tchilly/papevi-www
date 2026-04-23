<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

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

defineProps<{
    betaSuccess?: string;
}>();

const structuredData = {
    '@context': 'https://schema.org',
    '@graph': [
        {
            '@type': 'WebSite',
            '@id': 'https://papevi.com/#website',
            name: 'Papevi CMS',
            url: 'https://papevi.com/',
            description: 'Headless CMS for teams that need structured content, editorial workflow, and a reliable API.',
        },
        {
            '@type': 'Organization',
            '@id': 'https://papevi.com/#organization',
            name: 'Papevi',
            url: 'https://papevi.com/',
            description:
                'Papevi builds a structured headless CMS for ambitious teams — with editorial workflow, multi-site support, and a clean API.',
        },
        {
            '@type': 'SoftwareApplication',
            '@id': 'https://papevi.com/#software',
            name: 'Papevi CMS',
            applicationCategory: 'BusinessApplication',
            operatingSystem: 'Web',
            description:
                'Structured headless CMS with editorial workflow, REST API, media management, multi-locale support, and a free developer tier.',
            offers: {
                '@type': 'AggregateOffer',
                lowPrice: '0',
                highPrice: '129',
                priceCurrency: 'EUR',
                offerCount: '5',
            },
        },
        {
            '@type': 'FAQPage',
            mainEntity: [
                {
                    '@type': 'Question',
                    name: 'Who is Papevi for?',
                    acceptedAnswer: {
                        '@type': 'Answer',
                        text: 'Editorial teams, product organizations, and engineering groups that need a single CMS for multi-site, multi-tenant publishing with strong governance.',
                    },
                },
                {
                    '@type': 'Question',
                    name: 'Is Papevi really headless?',
                    acceptedAnswer: {
                        '@type': 'Answer',
                        text: 'Yes. Your team authors content in the Papevi admin, and it is delivered through a clean API any frontend, app, or channel can consume.',
                    },
                },
                {
                    '@type': 'Question',
                    name: 'How does workflow and scheduling work in Papevi CMS?',
                    acceptedAnswer: {
                        '@type': 'Answer',
                        text: 'Pages move through draft, review, approved, and published. Status is computed live from publish and unpublish timestamps so scheduling is deterministic.',
                    },
                },
                {
                    '@type': 'Question',
                    name: 'What compliance and security features does Papevi include?',
                    acceptedAnswer: {
                        '@type': 'Answer',
                        text: 'Role-based access control, audit history, encrypted recovery codes, 2FA, and GDPR media controls are part of the platform — not add-ons.',
                    },
                },
                {
                    '@type': 'Question',
                    name: 'Can Papevi CMS scale to enterprise traffic?',
                    acceptedAnswer: {
                        '@type': 'Answer',
                        text: 'Yes. Papevi is multi-tenant from the ground up and runs on EU-hosted cloud infrastructure sized for enterprise traffic. As your audience grows, the platform grows with it.',
                    },
                },
            ],
        },
    ],
};
</script>

<template>
    <Head>
        <title>Papevi CMS — The content platform for ambitious teams</title>
        <meta
            head-key="description"
            name="description"
            content="Papevi is a headless CMS built for teams that need structured content, editorial workflow, and a clean API. Free developer tier — no credit card required."
        />
        <meta
            head-key="robots"
            name="robots"
            content="index, follow"
        />
        <link
            head-key="canonical"
            rel="canonical"
            :href="route('home')"
        />
        <meta
            head-key="og:type"
            property="og:type"
            content="website"
        />
        <meta
            head-key="og:title"
            property="og:title"
            content="Papevi CMS — The content platform for ambitious teams"
        />
        <meta
            head-key="og:description"
            property="og:description"
            content="Papevi is a headless CMS built for teams that need structured content, editorial workflow, and a clean API. Free developer tier — no credit card required."
        />
        <meta
            head-key="og:url"
            property="og:url"
            :content="route('home')"
        />
        <meta
            head-key="twitter:card"
            name="twitter:card"
            content="summary_large_image"
        />
        <meta
            head-key="twitter:title"
            name="twitter:title"
            content="Papevi CMS — The content platform for ambitious teams"
        />
        <meta
            head-key="twitter:description"
            name="twitter:description"
            content="Papevi is a headless CMS built for content teams that demand structure, workflow, and a clean API."
        />
        <meta
            head-key="og:site_name"
            property="og:site_name"
            content="Papevi CMS"
        />
        <meta
            head-key="og:locale"
            property="og:locale"
            content="en_GB"
        />
        <meta
            head-key="og:image"
            property="og:image"
            content="https://papevi.com/images/og-social-card.png"
        />
        <meta
            head-key="og:image:width"
            property="og:image:width"
            content="1200"
        />
        <meta
            head-key="og:image:height"
            property="og:image:height"
            content="630"
        />
        <meta
            head-key="twitter:image"
            name="twitter:image"
            content="https://papevi.com/images/og-social-card.png"
        />
        <component
            :is="'script'"
            type="application/ld+json"
            v-text="JSON.stringify(structuredData)"
        />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main id="main-content">
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
