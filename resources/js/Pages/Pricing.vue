<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import Heading from '@/Components/Ui/Heading.vue';
import Button from '@/Components/Ui/Button.vue';
import { Head, Link, usePage } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();

const page = usePage();

const plans = [
    {
        name: 'Starter',
        price: 'Free',
        period: '',
        description: 'For side projects and personal sites.',
        features: [
            '1 site',
            '3 users',
            '5 page types',
            'REST API access',
            'Community support',
        ],
        cta: 'Get started',
        highlighted: false,
    },
    {
        name: 'Pro',
        price: '$49',
        period: '/month',
        description: 'For growing teams that need collaboration and workflow.',
        features: [
            'Unlimited sites',
            '15 users',
            'Unlimited page types',
            'Workflow & approvals',
            'Priority support',
            'Audit history',
        ],
        cta: 'Start free trial',
        highlighted: true,
    },
    {
        name: 'Enterprise',
        price: 'Custom',
        period: '',
        description: 'For organizations that need scale, compliance, and SLAs.',
        features: [
            'Everything in Pro',
            'Unlimited users',
            'SSO & SAML',
            'GDPR media controls',
            'Dedicated support',
            'Custom SLA',
        ],
        cta: 'Contact us',
        highlighted: false,
    },
];
</script>

<template>
    <Head title="Pricing — Papevi CMS" />

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader :can-login="canLogin" :can-register="canRegister" />

        <main>
            <section class="px-6 py-24 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="kicker mx-auto">Pricing</p>
                    <Heading as="h1" display="lg" class="mt-5 text-balance">
                        Transparent pricing, no surprises.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                        Start free and scale as your team grows. Every plan includes
                        the core CMS, API access, and editorial workflow.
                    </p>
                </div>

                <div class="mx-auto mt-20 grid max-w-5xl gap-8 lg:grid-cols-3">
                    <div
                        v-for="plan in plans"
                        :key="plan.name"
                        :class="[
                            'flex flex-col rounded-2xl border p-8',
                            plan.highlighted
                                ? 'border-brand-400/50 bg-brand-500/5 ring-1 ring-brand-400/25 dark:border-brand-400/30 dark:bg-brand-500/5'
                                : 'border-gray-200 bg-white dark:border-white/10 dark:bg-gray-900',
                        ]"
                    >
                        <p class="text-xs font-semibold uppercase tracking-[0.18em] text-brand-600 dark:text-brand-400">
                            {{ plan.name }}
                        </p>
                        <div class="mt-4 flex items-baseline gap-1">
                            <span class="font-serif text-4xl font-bold text-gray-900 dark:text-white">{{ plan.price }}</span>
                            <span v-if="plan.period" class="text-sm text-gray-500 dark:text-gray-400">{{ plan.period }}</span>
                        </div>
                        <p class="mt-3 text-sm text-gray-600 dark:text-gray-300">{{ plan.description }}</p>

                        <ul class="mt-8 flex-1 space-y-3">
                            <li
                                v-for="feature in plan.features"
                                :key="feature"
                                class="flex items-start gap-3 text-sm text-gray-700 dark:text-gray-200"
                            >
                                <span class="mt-0.5 inline-flex size-4 shrink-0 items-center justify-center rounded-full bg-brand-100 text-brand-700 dark:bg-brand-500/20 dark:text-brand-400">
                                    <svg class="size-3" viewBox="0 0 12 12" fill="none" aria-hidden="true">
                                        <path d="M2.5 6.5l2.5 2.5 4.5-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                                <span>{{ feature }}</span>
                            </li>
                        </ul>

                        <div class="mt-8">
                            <Button
                                v-if="canLogin && !page.props.auth.user"
                                :as="Link"
                                :href="route(canRegister ? 'register' : 'login')"
                                :variant="plan.highlighted ? 'brand' : 'outline'"
                                size="lg"
                                class="w-full"
                            >
                                {{ plan.cta }}
                            </Button>
                            <Button
                                v-else-if="canLogin"
                                :as="Link"
                                :href="route('dashboard')"
                                :variant="plan.highlighted ? 'brand' : 'outline'"
                                size="lg"
                                class="w-full"
                            >
                                Open dashboard
                            </Button>
                        </div>
                    </div>
                </div>
            </section>

            <CtaSection :can-login="canLogin" :can-register="canRegister" />
        </main>

        <MarketingFooter :laravel-version="laravelVersion" :php-version="phpVersion" />
    </div>
</template>
