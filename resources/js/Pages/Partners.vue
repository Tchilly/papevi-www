<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
import { Head } from '@inertiajs/vue3';

const structuredData = {
    '@context': 'https://schema.org',
    '@graph': [
        {
            '@type': 'WebPage',
            'name': 'Papevi CMS Partner Programme',
            'description': 'Join the Papevi partner programme. Earn 30% recurring commission in year one, 20% after that. Built for agencies and freelancers who build on headless CMS.',
            'inLanguage': 'en',
            'breadcrumb': {
                '@type': 'BreadcrumbList',
                'itemListElement': [
                    { '@type': 'ListItem', 'position': 1, 'name': 'Home', 'item': '/' },
                    { '@type': 'ListItem', 'position': 2, 'name': 'Partners', 'item': '/partners' },
                ],
            },
        },
    ],
};

const perks = [
    {
        title: '30% year one',
        body: 'Earn 30% of the monthly subscription for every client you refer, for as long as they stay subscribed through their first year.',
    },
    {
        title: '20% recurring after that',
        body: 'After year one the commission drops to 20% — still paid every month, for the lifetime of the subscription.',
    },
    {
        title: 'No quotas',
        body: 'Refer one client or fifty. There are no minimums, tiers, or targets to hit to keep earning.',
    },
    {
        title: 'Early access',
        body: 'Partners get access to new features and API changes ahead of general availability — more time to build before your clients ask.',
    },
];
</script>

<template>
    <Head>
        <title>Partner Programme — Papevi CMS</title>
        <meta head-key="description" name="description" content="Join the Papevi partner programme. Earn 30% recurring commission in year one, 20% after that. Built for agencies and freelancers who build on headless CMS." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('partners')" />
        <meta head-key="og:type" property="og:type" content="website" />
        <meta head-key="og:title" property="og:title" content="Partner Programme — Papevi CMS" />
        <meta head-key="og:description" property="og:description" content="Earn 30% in year one, 20% recurring after that. No quotas." />
        <meta head-key="og:url" property="og:url" :content="route('partners')" />
        <component :is="'script'" type="application/ld+json" v-text="JSON.stringify(structuredData)" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <!-- Header -->
            <section aria-labelledby="partners-heading" class="border-b border-gray-100 px-6 pb-16 pt-24 sm:px-8 lg:px-12 dark:border-white/5">
                <div class="mx-auto max-w-2xl">
                    <p class="kicker">Partner programme</p>
                    <Heading id="partners-heading" as="h1" display="lg" class="mt-5 text-balance">
                        Build on Papevi. Earn while you do.
                    </Heading>
                    <p class="mt-5 text-lg leading-relaxed text-gray-600 dark:text-gray-300">
                        If you're an agency or freelancer who builds sites and products on headless infrastructure, we'd like to pay you for the clients you bring to Papevi. No portal, no certification, no fuss — just a referral link and a commission.
                    </p>
                </div>
            </section>

            <!-- How it works -->
            <section aria-labelledby="how-it-works-heading" class="px-6 py-20 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-2xl">
                    <Heading id="how-it-works-heading" as="h2" class="text-gray-900 dark:text-white">How it works</Heading>

                    <ol class="mt-8 space-y-8" aria-label="Partner programme steps">
                        <li class="flex gap-5">
                            <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-gray-200 bg-gray-50 font-mono text-xs font-semibold text-gray-600 dark:border-white/10 dark:bg-white/5 dark:text-gray-300" aria-hidden="true">1</span>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Get in touch</p>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    Send us a short message below. We'll send you a personal referral link within a business day.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-5">
                            <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-gray-200 bg-gray-50 font-mono text-xs font-semibold text-gray-600 dark:border-white/10 dark:bg-white/5 dark:text-gray-300" aria-hidden="true">2</span>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Refer a client</p>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    Share your link. When a client signs up for any paid plan through it, you're credited automatically.
                                </p>
                            </div>
                        </li>
                        <li class="flex gap-5">
                            <span class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full border border-gray-200 bg-gray-50 font-mono text-xs font-semibold text-gray-600 dark:border-white/10 dark:bg-white/5 dark:text-gray-300" aria-hidden="true">3</span>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white">Earn monthly</p>
                                <p class="mt-1 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                                    30% of their subscription for the first 12 months. 20% every month after that, for as long as they stay subscribed.
                                </p>
                            </div>
                        </li>
                    </ol>
                </div>
            </section>

            <!-- Perks grid -->
            <section aria-labelledby="perks-heading" class="border-t border-gray-100 bg-gray-50 px-6 py-20 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900">
                <div class="mx-auto max-w-2xl">
                    <Heading id="perks-heading" as="h2" class="text-gray-900 dark:text-white">What you get</Heading>
                    <dl class="mt-8 grid gap-6 sm:grid-cols-2">
                        <div
                            v-for="perk in perks"
                            :key="perk.title"
                            class="rounded-xl border border-gray-200 bg-white p-5 dark:border-white/10 dark:bg-gray-950"
                        >
                            <dt class="text-sm font-semibold text-gray-900 dark:text-white">{{ perk.title }}</dt>
                            <dd class="mt-1.5 text-sm leading-relaxed text-gray-500 dark:text-gray-400">{{ perk.body }}</dd>
                        </div>
                    </dl>
                </div>
            </section>

            <!-- Contact -->
            <section id="contact" aria-labelledby="contact-heading" class="border-t border-gray-100 px-6 py-20 sm:px-8 lg:px-12 dark:border-white/5">
                <div class="mx-auto max-w-2xl">
                    <Heading id="contact-heading" as="h2" class="text-gray-900 dark:text-white">Interested?</Heading>
                    <p class="mt-3 text-sm leading-relaxed text-gray-500 dark:text-gray-400">
                        Drop us a line at <a href="mailto:partners@papevi.com" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">partners@papevi.com</a> with a short intro — what you build and who your clients are. We'll take it from there.
                    </p>
                    <div class="mt-6">
                        <Button as="a" href="mailto:partners@papevi.com" variant="brand" size="lg" aria-label="Email partners@papevi.com to apply">
                            Get in touch
                        </Button>
                    </div>
                    <p class="mt-5 text-xs text-gray-400 dark:text-gray-500">
                        We review applications manually. Commissions are paid monthly via bank transfer or Stripe. Minimum payout €50.
                    </p>
                </div>
            </section>
        </main>

        <MarketingFooter />
    </div>
</template>
