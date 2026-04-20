<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
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

const onImageLoad = (event: Event) => {
    (event.target as HTMLImageElement).dataset.loaded = 'true';
};

const onImageError = (event: Event) => {
    (event.target as HTMLImageElement).remove();
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
            head-key="twitter:card"
            name="twitter:card"
            content="summary"
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
        <component
            :is="'script'"
            type="application/ld+json"
            v-text="JSON.stringify(structuredData)"
        />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main id="main-content">
            <!-- Header + quick-nav cards -->
            <section
                class="border-b border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
            >
                <div class="mx-auto max-w-3xl text-center">
                    <p class="mx-auto kicker">Use cases</p>
                    <Heading
                        as="h1"
                        display="lg"
                        class="mt-5 text-balance"
                    >
                        Built for teams that move fast.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                        Whether you're a startup shipping landing pages or an enterprise managing multi-brand content —
                        Papevi adapts to how your team works.
                    </p>
                </div>

                <nav
                    aria-label="Jump to a use case"
                    class="mx-auto mt-14 grid max-w-4xl gap-3 sm:grid-cols-2 lg:grid-cols-3"
                >
                    <a
                        v-for="item in useCases"
                        :key="item.id"
                        :href="`#${item.id}`"
                        :aria-label="`Jump to: ${item.eyebrow}`"
                        class="group flex items-center justify-between gap-3 glass-panel p-4 transition hover:border-brand-400/40 focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 focus-visible:ring-offset-1 dark:focus-visible:ring-brand-400"
                    >
                        <p
                            class="text-sm font-semibold text-gray-900 transition group-hover:text-brand-700 dark:text-white dark:group-hover:text-brand-300"
                        >
                            {{ item.eyebrow }}
                        </p>
                        <svg
                            class="size-4 shrink-0 text-gray-400 transition group-hover:translate-x-0.5 group-hover:text-brand-600 dark:group-hover:text-brand-400"
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
                        <p class="text-xs font-semibold tracking-[0.18em] text-brand-600 uppercase dark:text-brand-400">
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

                    <figure class="product-frame">
                        <div class="product-frame-bar">
                            <span class="product-frame-dot"></span>
                            <span class="product-frame-dot"></span>
                            <span class="product-frame-dot"></span>
                            <span class="ml-3 font-mono text-[11px] text-gray-500 dark:text-gray-400">
                                papevi.com / {{ item.id }}
                            </span>
                        </div>
                        <div class="relative aspect-[4/3] w-full overflow-hidden product-placeholder">
                            <img
                                :src="`/images/marketing/use-case-${index + 1}.png`"
                                :alt="item.title"
                                class="absolute inset-0 h-full w-full object-cover opacity-0 transition data-[loaded=true]:opacity-100"
                                loading="lazy"
                                @load="onImageLoad"
                                @error="onImageError"
                            />
                            <div class="absolute inset-0 flex items-center justify-center text-sm text-gray-400">
                                <span class="font-mono">{{ item.eyebrow }}</span>
                            </div>
                        </div>
                    </figure>
                </section>
            </div>

            <CtaSection />
        </main>

        <MarketingFooter />
    </div>
</template>
