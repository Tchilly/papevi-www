<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import { useCaseImages } from '@/Components/Marketing/marketingImages';
import ProductFrame from '@/Components/Marketing/ProductFrame.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import Heading from '@/Components/Ui/Heading.vue';

const useCases = [
    {
        id: 'marketing',
        eyebrow: 'Marketing teams',
        title: 'Launch campaigns without waiting on developers.',
        body: 'Papevi gives marketers a structured workspace they can own — with page building, approval flows, and scheduling built in so campaigns ship on time.',
        bullets: [
            'Build landing pages and campaign content from a shared editorial workspace',
            'AI writing assistance speeds up copy across every campaign and page',
            'Set approval gates so nothing goes live without the right sign-off',
            'Schedule launch dates and auto-expiry in advance, then forget about it',
            'Centralised DAM with folder structure, bulk upload, and media picker embedded in the editor',
            'Auto-generated WebP and AVIF variants keep page weight low without manual optimisation',
        ],
    },
    {
        id: 'publishers',
        eyebrow: 'Multi-brand publishers',
        title: 'Run many sites from one workspace.',
        body: 'One installation powers multiple brands and domains. Content stays isolated per site while teams share infrastructure, editorial standards, and reusable blocks.',
        bullets: [
            'One workspace, many brands — content stays separate, infrastructure stays shared',
            'Per-site permissions keep each editorial team in their own lane',
        ],
    },
    {
        id: 'developers',
        eyebrow: 'Developer-led products',
        title: 'A content backbone your product can rely on.',
        body: 'Model content as structured data and connect it to any frontend through a clean, versioned API. Papevi becomes the content layer your product depends on.',
        bullets: [
            'Structured content types with predictable JSON schemas your frontend can build on',
            'Model fields, validation, and relationships visually — no schema migrations',
            'Multi-locale and multi-site support built in from day one',
            'Full revision history with side-by-side diff — rollbacks are always one click away',
        ],
    },
    {
        id: 'regulated',
        eyebrow: 'Regulated industries',
        title: 'The evidence your compliance team asks for.',
        body: 'Audit trails, revision history, role-based access, and GDPR-ready media controls are core platform features — not add-ons you have to configure.',
        bullets: [
            'Full audit trail — everyone knows who changed what, and when',
            'Configurable approval flows so nothing publishes without the right sign-off',
            'GDPR media controls and EU data residency included, not bolted on',
            'Per-asset consent tracking, data retention policies, and right-to-be-forgotten in the DAM',
            'Asset licence management — flag commercial use rights, attribution requirements, and expiry',
        ],
    },
    {
        id: 'agencies',
        eyebrow: 'Agencies & freelancers',
        title: 'Spin up. Ship. Hand off.',
        body: 'Start a new client site in minutes. Reusable page types and blocks reduce repetition across projects, and clients get a workspace they can manage themselves.',
        bullets: [
            'New client workspace ready in minutes with reusable page types and blocks already in place',
            "Clients get a clean, self-manageable CMS — they won't need you for every edit",
        ],
    },
    {
        id: 'saas',
        eyebrow: 'Content-driven SaaS',
        title: 'Keep product content fresh without a developer.',
        body: 'Embed structured content directly into your product experience. Help centers, changelogs, and knowledge bases — authored in Papevi, delivered through the API.',
        bullets: [
            'Push help center, changelog, and knowledge base content into your product via API',
            'Non-technical teammates update content independently',
            'Every entry versioned — always know exactly what changed and when',
        ],
    },
];

const structuredData = {
    '@context': 'https://schema.org',
    '@graph': [
        {
            '@type': 'WebPage',
            name: 'Papevi CMS Use Cases — Built for teams that move fast',
            description:
                'Explore how marketing teams, publishers, developers, regulated industries, agencies, and SaaS products use Papevi CMS to manage structured content at scale.',
            inLanguage: 'en',
            breadcrumb: {
                '@type': 'BreadcrumbList',
                itemListElement: [
                    { '@type': 'ListItem', position: 1, name: 'Home', item: '/' },
                    { '@type': 'ListItem', position: 2, name: 'Use Cases', item: '/use-cases' },
                ],
            },
        },
        {
            '@type': 'ItemList',
            name: 'Papevi CMS Use Cases',
            itemListElement: useCases.map((item, i) => ({
                '@type': 'ListItem',
                position: i + 1,
                name: item.eyebrow,
                description: item.body,
                url: `/use-cases#${item.id}`,
            })),
        },
    ],
};
</script>

<template>
    <Head>
        <title>Papevi CMS Use Cases — Built for teams that move fast</title>
        <meta
            head-key="description"
            name="description"
            content="Explore how marketing teams, publishers, developers, regulated industries, agencies, and SaaS products use Papevi CMS to manage structured content at scale."
        />
        <meta
            head-key="robots"
            name="robots"
            content="index, follow"
        />
        <link
            head-key="canonical"
            rel="canonical"
            :href="route('use-cases')"
        />
        <meta
            head-key="og:type"
            property="og:type"
            content="website"
        />
        <meta
            head-key="og:title"
            property="og:title"
            content="Papevi CMS Use Cases — Built for teams that move fast"
        />
        <meta
            head-key="og:description"
            property="og:description"
            content="Explore how marketing teams, publishers, developers, regulated industries, agencies, and SaaS products use Papevi CMS."
        />
        <meta
            head-key="og:url"
            property="og:url"
            :content="route('use-cases')"
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
            head-key="twitter:card"
            name="twitter:card"
            content="summary_large_image"
        />
        <meta
            head-key="twitter:title"
            name="twitter:title"
            content="Papevi CMS Use Cases — Built for teams that move fast"
        />
        <meta
            head-key="twitter:description"
            name="twitter:description"
            content="Explore how marketing teams, publishers, developers, and SaaS products use Papevi CMS to manage content at scale."
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
            <!-- Hero intro + quick-nav cards -->
            <section class="relative overflow-hidden bg-gray-950 px-6 py-24 sm:px-8 lg:px-12">
                <!-- Brand glow -->
                <div
                    class="pointer-events-none absolute top-[-10%] right-[-5%] h-[700px] w-[700px] opacity-70 brand-glow"
                    aria-hidden="true"
                />

                <!-- Noise texture -->
                <div
                    class="pointer-events-none absolute inset-0 hero-noise opacity-30"
                    aria-hidden="true"
                />

                <!-- Subtle grid -->
                <div
                    class="pointer-events-none absolute inset-0 atmos-grid"
                    aria-hidden="true"
                />

                <!-- Bottom gradient fade -->
                <div
                    class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-gray-950 to-transparent"
                    aria-hidden="true"
                />

                <div class="relative mx-auto max-w-3xl text-center">
                    <p class="mx-auto kicker">Use cases</p>
                    <Heading
                        as="h1"
                        display="lg"
                        class="mt-5 text-balance"
                    >
                        Built for teams that move fast.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-400">
                        Whether you're a startup shipping landing pages or an enterprise managing multi-brand content —
                        Papevi adapts to how your team works.
                    </p>
                </div>

                <nav
                    aria-label="Jump to a use case"
                    class="relative mx-auto mt-14 grid max-w-4xl gap-3 sm:grid-cols-2 lg:grid-cols-3"
                >
                    <a
                        v-for="item in useCases"
                        :key="item.id"
                        :href="`#${item.id}`"
                        :aria-label="`Jump to: ${item.eyebrow}`"
                        class="group flex items-center justify-between gap-3 rounded-xl border border-white/10 bg-gray-900/70 p-4 backdrop-blur transition hover:border-brand-400/40 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-400 focus-visible:ring-offset-1"
                    >
                        <p class="text-sm font-semibold text-white transition group-hover:text-brand-300">
                            {{ item.eyebrow }}
                        </p>
                        <svg
                            class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 group-hover:text-brand-400"
                            viewBox="0 0 20 20"
                            fill="none"
                            aria-hidden="true"
                        >
                            <path
                                d="M4 10h12M11 5l5 5-5 5"
                                stroke="currentColor"
                                stroke-width="1.6"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </a>
                </nav>
            </section>

            <!-- Expanded use case sections -->
            <div class="divide-y divide-gray-100 px-6 sm:px-8 lg:px-12 dark:divide-white/5">
                <section
                    v-for="(item, index) in useCases"
                    :id="item.id"
                    :key="item.id"
                    :aria-labelledby="`${item.id}-title`"
                    class="mx-auto grid max-w-6xl items-center gap-10 py-24 lg:grid-cols-2 lg:gap-16"
                    :class="{ 'lg:[&>*:first-child]:order-2': index % 2 === 1 }"
                >
                    <div class="space-y-5">
                        <p class="text-xs font-semibold tracking-[0.18em] text-brand-700 uppercase dark:text-brand-400">
                            {{ item.eyebrow }}
                        </p>
                        <Heading
                            :id="`${item.id}-title`"
                            as="h2"
                            display="md"
                            class="text-balance"
                        >
                            {{ item.title }}
                        </Heading>
                        <p class="text-base leading-relaxed text-gray-600 sm:text-lg dark:text-gray-300">
                            {{ item.body }}
                        </p>
                        <ul class="space-y-2.5 pt-2">
                            <li
                                v-for="bullet in item.bullets"
                                :key="bullet"
                                class="flex items-start gap-3 text-sm text-gray-700 dark:text-gray-200"
                            >
                                <span
                                    class="mt-1 inline-flex size-4 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700 dark:bg-brand-500/20 dark:text-brand-400"
                                >
                                    <svg
                                        class="size-3"
                                        viewBox="0 0 12 12"
                                        fill="none"
                                        aria-hidden="true"
                                    >
                                        <path
                                            d="M2.5 6.5l2.5 2.5 4.5-5"
                                            stroke="currentColor"
                                            stroke-width="1.8"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                        />
                                    </svg>
                                </span>
                                <span>{{ bullet }}</span>
                            </li>
                        </ul>
                    </div>

                    <ProductFrame
                        :url="`papevi.com / ${item.id}`"
                        :src="useCaseImages[index]"
                        :alt="item.title"
                        :label="item.eyebrow"
                    />
                </section>
            </div>

            <CtaSection />
        </main>

        <MarketingFooter />
    </div>
</template>
