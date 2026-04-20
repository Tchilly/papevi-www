<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const annual = ref(false);

type Limit = { label: string; value: string };
type Plan = {
    name: string;
    monthlyPrice: number | null;
    description: string;
    limits: Limit[];
    features: string[];
    cta: string;
    highlighted: boolean;
    enterprise?: boolean;
};

const plans: Plan[] = [
    {
        name: 'Starter',
        monthlyPrice: 29,
        description: 'One site, a small team, and a reliable CMS. Perfect for getting started.',
        limits: [
            { label: 'Sites', value: '1' },
            { label: 'Users', value: '5' },
            { label: 'API calls / month*', value: '500k' },
            { label: 'Media storage', value: '10 GB' },
            { label: 'Revision retention', value: '30 days' },
        ],
        features: [
            'Unlimited page types',
            'REST API access',
            'Built-in digital asset management (DAM)',
            'Basic editorial workflow',
            'Email support',
        ],
        cta: 'Start free trial',
        highlighted: false,
    },
    {
        name: 'Grow',
        monthlyPrice: 59,
        description: 'More users, higher limits, and the full workflow toolset — on a single site.',
        limits: [
            { label: 'Sites', value: '1' },
            { label: 'Users', value: '15' },
            { label: 'API calls / month*', value: '2M' },
            { label: 'Media storage', value: '50 GB' },
            { label: 'Revision retention', value: '1 year' },
        ],
        features: [
            'Everything in Starter',
            'Scheduled publish & unpublish',
            'Multi-locale content',
            'Priority support',
        ],
        cta: 'Start free trial',
        highlighted: true,
    },
    {
        name: 'Scale',
        monthlyPrice: 129,
        description: 'Built for teams running multiple sites with compliance and security requirements.',
        limits: [
            { label: 'Sites', value: '5' },
            { label: 'Users', value: '50' },
            { label: 'API calls / month*', value: '5M' },
            { label: 'Media storage', value: '250 GB' },
            { label: 'Revision retention', value: '5 years' },
        ],
        features: [
            'Everything in Grow',
            'Approval workflows & audit log',
            'Webhooks',
            'GDPR media controls',
            'EU data residency',
            'Priority support + SLA',
        ],
        cta: 'Start free trial',
        highlighted: false,
    },
    {
        name: 'Enterprise',
        monthlyPrice: null,
        description: 'For large organisations that need custom limits, compliance controls, and a dedicated team.',
        limits: [
            { label: 'Sites', value: 'Unlimited' },
            { label: 'Users', value: 'Unlimited' },
            { label: 'API calls / month', value: 'Unlimited' },
            { label: 'Media storage', value: 'Unlimited' },
            { label: 'Revision retention***', value: '7 years' },
        ],
        features: [
            'Everything in Scale',
            'Bring your own database',
            'NIS-2 compliance controls**',
            'Custom roles & permissions',
            'Dedicated account manager',
            'Custom SLA & DPA',
            'On-premise or private cloud options',
        ],
        cta: 'Contact us',
        highlighted: false,
        enterprise: true,
    },
];

const structuredData = {
    '@context': 'https://schema.org',
    '@graph': [
        {
            '@type': 'WebPage',
            'name': 'Papevi CMS Pricing — Plans Starting at €29/month',
            'description': 'Transparent headless CMS pricing. Starter €29/mo, Grow €59/mo, Scale €129/mo, Enterprise custom. Annual billing saves 2 months. Free developer tier available — no credit card required.',
            'inLanguage': 'en',
            'breadcrumb': {
                '@type': 'BreadcrumbList',
                'itemListElement': [
                    { '@type': 'ListItem', 'position': 1, 'name': 'Home', 'item': '/' },
                    { '@type': 'ListItem', 'position': 2, 'name': 'Pricing', 'item': '/pricing' },
                ],
            },
        },
        {
            '@type': 'ItemList',
            'name': 'Papevi CMS Pricing Plans',
            'itemListElement': [
                {
                    '@type': 'ListItem',
                    'position': 1,
                    'item': { '@type': 'Product', 'name': 'Papevi CMS Starter', 'description': 'One site, a small team, and a reliable headless CMS. Perfect for getting started.', 'offers': { '@type': 'Offer', 'price': '29.00', 'priceCurrency': 'EUR', 'billingIncrement': 'Monthly', 'availability': 'https://schema.org/InStock' } },
                },
                {
                    '@type': 'ListItem',
                    'position': 2,
                    'item': { '@type': 'Product', 'name': 'Papevi CMS Grow', 'description': 'More sites, more team members, and the full workflow toolset.', 'offers': { '@type': 'Offer', 'price': '59.00', 'priceCurrency': 'EUR', 'billingIncrement': 'Monthly', 'availability': 'https://schema.org/InStock' } },
                },
                {
                    '@type': 'ListItem',
                    'position': 3,
                    'item': { '@type': 'Product', 'name': 'Papevi CMS Scale', 'description': 'Built for teams running multiple sites with compliance and security requirements.', 'offers': { '@type': 'Offer', 'price': '129.00', 'priceCurrency': 'EUR', 'billingIncrement': 'Monthly', 'availability': 'https://schema.org/InStock' } },
                },
                {
                    '@type': 'ListItem',
                    'position': 4,
                    'item': { '@type': 'Product', 'name': 'Papevi CMS Enterprise', 'description': 'For large organisations that need custom limits, compliance controls, and a dedicated team.', 'offers': { '@type': 'Offer', 'price': '0', 'priceCurrency': 'EUR', 'description': 'Custom pricing — contact us' } },
                },
            ],
        },
    ],
};

const addOns = [
    {
        name: 'AI Writing',
        price: '€25',
        period: '/month',
        description: 'Smart rewriting, tone adjustment, and content suggestions — built into the editor toolbar.',
    },
    {
        name: 'Extra Users',
        price: '€6',
        period: '/user/month',
        description: 'Add seats beyond your plan limit. Available on all paid plans.',
    },
    {
        name: 'Content Metrics',
        price: '€29',
        period: '/month',
        description: 'Publish velocity, editorial throughput, and content performance dashboards.',
    },
];

function formatPrice(monthly: number): string {
    if (annual.value) {
        return '€' + (monthly * 10);
    }
    return '€' + monthly;
}

function pricePeriod(monthly: number): string {
    if (annual.value) {
        const saving = monthly * 2;
        return `/year — saves €${saving}`;
    }
    return '/month';
}
</script>

<template>
    <Head>
        <title>Papevi CMS Pricing — Plans Starting at €29/month</title>
        <meta head-key="description" name="description" content="Transparent headless CMS pricing. Starter from €29/month. Grow €59/mo, Scale €129/mo, Enterprise custom. Annual billing saves 2 months. Free developer tier — no credit card required." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('pricing')" />
        <meta head-key="og:type" property="og:type" content="website" />
        <meta head-key="og:title" property="og:title" content="Papevi CMS Pricing — Plans Starting at €29/month" />
        <meta head-key="og:description" property="og:description" content="Transparent headless CMS pricing. Starter from €29/month. Annual billing saves 2 months. Free developer tier available — no credit card required." />
        <meta head-key="og:url" property="og:url" :content="route('pricing')" />
        <meta head-key="twitter:card" name="twitter:card" content="summary" />
        <meta head-key="twitter:title" name="twitter:title" content="Papevi CMS Pricing — Plans Starting at €29/month" />
        <meta head-key="twitter:description" name="twitter:description" content="Transparent headless CMS pricing. Starter from €29/month. Annual billing saves 2 months. Free dev tier — no credit card required." />
        <component :is="'script'" type="application/ld+json" v-text="JSON.stringify(structuredData)" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <!-- Header -->
            <section class="px-6 pb-0 pt-24 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="kicker mx-auto">Pricing</p>
                    <Heading as="h1" display="lg" class="mt-5 text-balance">
                        Transparent pricing, no surprises.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                        All prices in euros. Every paid plan includes the full CMS, API access,
                        and editorial workflow — add what you need.
                    </p>

                    <!-- Annual toggle -->
                    <div class="mt-10 inline-flex items-center gap-3 rounded-full border border-gray-200 bg-gray-50 px-4 py-2.5 dark:border-white/10 dark:bg-gray-900">
                        <span :class="['text-sm font-medium transition', !annual ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-500']">Monthly</span>
                        <button
                            type="button"
                            role="switch"
                            :aria-checked="annual"
                            aria-label="Toggle annual billing"
                            class="relative inline-flex h-6 w-10 shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-brand-600 dark:focus-visible:outline-brand-400"
                            :class="annual ? 'bg-brand-500' : 'bg-gray-300 dark:bg-gray-600'"
                            @click="annual = !annual"
                        >
                            <span
                                aria-hidden="true"
                                class="pointer-events-none inline-block size-5 rounded-full bg-white shadow-sm ring-0 transition-transform duration-200"
                                :class="annual ? 'translate-x-4' : 'translate-x-0'"
                            />
                        </button>
                        <span :class="['text-sm font-medium transition', annual ? 'text-gray-900 dark:text-white' : 'text-gray-400 dark:text-gray-500']">
                            Annual <span class="ml-1 rounded-full bg-brand-100 px-2 py-0.5 text-xs font-semibold text-brand-700 dark:bg-brand-500/20 dark:text-brand-300">2 months free</span>
                        </span>
                    </div>
                </div>

                <!-- Plans grid -->
                <div id="pricing-plans" class="mx-auto mt-14 grid max-w-6xl gap-6 sm:grid-cols-2 xl:grid-cols-4" role="list" aria-label="Pricing plans">
                    <article
                        v-for="plan in plans"
                        :key="plan.name"
                        :aria-label="`${plan.name} plan`"
                        role="listitem"
                        :class="[
                            'flex flex-col rounded-2xl border p-7',
                            plan.highlighted
                                ? 'border-brand-400/50 bg-brand-500/5 ring-1 ring-brand-400/25 dark:border-brand-400/30 dark:bg-brand-500/5'
                                : 'border-gray-200 bg-white dark:border-white/10 dark:bg-gray-900',
                        ]"
                    >
                        <h3 class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-700 dark:text-brand-400">
                            {{ plan.name }}
                        </h3>

                        <div class="mt-4">
                            <template v-if="plan.enterprise">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">€399</span>
                                <span class="ml-1 text-sm text-gray-600 dark:text-gray-400">/month +</span>
                            </template>
                            <template v-else-if="plan.monthlyPrice">
                                <span class="text-3xl font-bold text-gray-900 dark:text-white">{{ formatPrice(plan.monthlyPrice) }}</span>
                                <span class="ml-1 text-xs text-gray-600 dark:text-gray-400">{{ pricePeriod(plan.monthlyPrice) }}</span>
                            </template>
                        </div>

                        <p class="mt-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ plan.description }}</p>

                        <!-- Usage limits -->
                        <dl class="mt-6 space-y-2 border-t border-gray-100 pt-5 dark:border-white/5">
                            <div
                                v-for="limit in plan.limits"
                                :key="limit.label"
                                class="flex items-center justify-between gap-2 text-sm"
                            >
                                <dt class="text-gray-600 dark:text-gray-400">{{ limit.label }}</dt>
                                <dd class="font-medium text-gray-900 dark:text-white">{{ limit.value }}</dd>
                            </div>
                        </dl>

                        <!-- Features -->
                        <ul :aria-label="`Features included in ${plan.name}`" class="mt-6 flex-1 space-y-2.5 border-t border-gray-100 pt-5 dark:border-white/5">
                            <li
                                v-for="feature in plan.features"
                                :key="feature"
                                class="flex items-start gap-2.5 text-sm text-gray-700 dark:text-gray-200"
                            >
                                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700 dark:bg-brand-500/20 dark:text-brand-400">
                                    <svg class="size-3" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                        <path d="M2.5 6.5l2.5 2.5 4.5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span>{{ feature }}</span>
                            </li>
                        </ul>

                        <div class="mt-7">
                            <Button
                                as="a"
                                href="/#beta"
                                :variant="plan.highlighted ? 'brand' : 'outline'"
                                size="lg"
                                :aria-label="`${plan.cta} — ${plan.name} plan`"
                                class="w-full"
                            >
                                {{ plan.cta }}
                            </Button>
                        </div>
                    </article>
                </div>

                <div class="mx-auto mt-6 max-w-6xl space-y-1 text-right text-xs text-gray-600 dark:text-gray-400">
                    <p>* API requests are direct origin requests — no CDN caching on authenticated endpoints. Overages are billed at €10 per 500k additional requests.</p>
                    <p>** NIS-2 implementation is in progress. Current status available on request.</p>
                    <p>*** 7-year retention aligns with EU accounting and audit trail obligations (VAT Directive, NIS-2 guidance).</p>
                </div>
            </section>

            <!-- Free dev mode -->
            <section id="dev-mode" aria-labelledby="dev-mode-heading" class="mt-16 border-t border-gray-100 bg-gray-50 px-6 py-12 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900">
                <div class="mx-auto max-w-6xl">
                    <div class="flex flex-col gap-6 rounded-2xl border border-dashed border-gray-300 bg-white p-8 dark:border-white/10 dark:bg-gray-950 sm:flex-row sm:items-center sm:justify-between">

                        <div class="space-y-1.5">
                            <div class="flex items-center gap-2.5">
                                <p class="text-xs font-semibold uppercase tracking-[0.18em] text-gray-600 dark:text-gray-400">Free</p>
                                <span class="rounded-full border border-gray-200 bg-gray-100 px-2.5 py-0.5 font-mono text-[11px] text-gray-700 dark:border-white/10 dark:bg-white/5 dark:text-gray-400">dev mode</span>
                            </div>
                            <Heading id="dev-mode-heading" as="h2" class="text-xl font-semibold text-gray-900 dark:text-white">Evaluate Papevi without a credit card.</Heading>
                            <p class="max-w-sm text-sm leading-relaxed text-gray-600 dark:text-gray-400">
                                Full API access on a single rate-limited site — 1 site, 2 users, 10k API calls/mo, and 1 GB storage. Build and test before committing to a plan.
                            </p>
                        </div>

                        <div class="flex shrink-0 flex-col items-start gap-5 sm:items-end">
                            <Button as="a" href="/#beta" variant="outline" size="md" aria-label="Get free developer access to Papevi">
                                Get dev access
                            </Button>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Add-ons -->
            <section id="add-ons" aria-labelledby="add-ons-heading" class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="kicker mx-auto">Add-ons</p>
                    <Heading id="add-ons-heading" as="h2" display="md" class="mt-5 text-balance">
                        Extend any plan with what you need.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-base text-gray-600 dark:text-gray-300">
                        Optional extras you can toggle on at any time — no plan change required.
                    </p>
                </div>

                <div class="mx-auto mt-16 grid max-w-5xl gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <article
                        v-for="addon in addOns"
                        :key="addon.name"
                        :aria-label="`${addon.name} add-on`"
                        class="glass-panel flex flex-col p-6"
                    >
                        <h3 class="text-sm font-semibold text-gray-900 dark:text-white">{{ addon.name }}</h3>
                        <div class="mt-2 flex items-baseline gap-1">
                            <span class="text-2xl font-bold text-gray-900 dark:text-white">{{ addon.price }}</span>
                            <span class="text-xs text-gray-600 dark:text-gray-400">{{ addon.period }}</span>
                        </div>
                        <p class="mt-3 flex-1 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ addon.description }}</p>
                    </article>
                </div>
            </section>

            <CtaSection />
        </main>

        <MarketingFooter />
    </div>
</template>
