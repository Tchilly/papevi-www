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

type Plan = {
    name: string;
    price: string;
    period: string;
    description: string;
    limits: { label: string; value: string }[];
    features: string[];
    cta: string;
    highlighted: boolean;
};

const plans: Plan[] = [
    {
        name: 'Starter',
        price: '$19',
        period: '/month',
        description: 'For blogs, small businesses, and personal projects that need a reliable CMS.',
        limits: [
            { label: 'Sites', value: '1' },
            { label: 'Users', value: '3' },
            { label: 'API calls / month', value: '50 000' },
            { label: 'Bandwidth', value: '10 GB' },
            { label: 'Media storage', value: '5 GB' },
            { label: 'Roles', value: '2 (Admin, Editor)' },
            { label: 'Teams', value: '1' },
            { label: 'Revision retention', value: '30 days' },
        ],
        features: [
            'Unlimited page types',
            'REST API access',
            'Editorial workflow',
            'Community support',
        ],
        cta: 'Get started',
        highlighted: false,
    },
    {
        name: 'Pro',
        price: '$79',
        period: '/month',
        description: 'For growing businesses managing 1–2 sites with larger teams and advanced workflow.',
        limits: [
            { label: 'Sites', value: '2' },
            { label: 'Users', value: '15' },
            { label: 'API calls / month', value: '500 000' },
            { label: 'Bandwidth', value: '100 GB' },
            { label: 'Media storage', value: '50 GB' },
            { label: 'Roles', value: '5 (all built-in)' },
            { label: 'Teams', value: '5' },
            { label: 'Revision retention', value: '1 year' },
        ],
        features: [
            'Everything in Starter',
            'Workflow & approvals',
            'Audit history',
            'Scheduled publishing',
            'Priority support',
        ],
        cta: 'Start free trial',
        highlighted: true,
    },
    {
        name: 'Enterprise',
        price: 'Custom',
        period: '',
        description: 'For organizations running 2–5+ sites across multiple platforms with full compliance.',
        limits: [
            { label: 'Sites', value: '2 – 5+' },
            { label: 'Users', value: 'Unlimited' },
            { label: 'API calls / month', value: 'Unlimited' },
            { label: 'Bandwidth', value: 'Unlimited' },
            { label: 'Media storage', value: 'Unlimited' },
            { label: 'Roles', value: 'Custom + built-in' },
            { label: 'Teams', value: 'Unlimited' },
            { label: 'Revision retention', value: 'Unlimited' },
        ],
        features: [
            'Everything in Pro',
            'SSO & SAML',
            'GDPR media controls',
            'Multi-platform delivery',
            'Dedicated account manager',
            'Custom SLA',
        ],
        cta: 'Contact us',
        highlighted: false,
    },
];

const addOns = [
    {
        name: 'AI Editing',
        price: '$15',
        period: '/month',
        description: 'Smart rewriting, tone adjustment, and content suggestions powered by AI — available in the editor toolbar.',
    },
    {
        name: 'Extra Users',
        price: '$5',
        period: '/user/month',
        description: 'Add more seats beyond your plan limit. Works on Starter and Pro plans.',
    },
    {
        name: 'Advanced Metrics & Reports',
        price: '$25',
        period: '/month',
        description: 'Content performance dashboards, publish velocity tracking, and editorial throughput reports.',
    },
];
</script>

<template>
    <Head title="Pricing — Papevi CMS" />

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader :can-login="canLogin" :can-register="canRegister" />

        <main>
            <!-- Plans -->
            <section class="px-6 py-24 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="kicker mx-auto">Pricing</p>
                    <Heading as="h1" display="lg" class="mt-5 text-balance">
                        Transparent pricing, no surprises.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-lg text-gray-600 dark:text-gray-300">
                        Pick a base plan and add what you need. Every plan includes
                        the core CMS, API access, and editorial workflow.
                    </p>
                </div>

                <div class="mx-auto mt-20 grid max-w-6xl gap-8 lg:grid-cols-3">
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

                        <!-- Usage limits -->
                        <div class="mt-8 space-y-2.5">
                            <p class="text-xs font-semibold uppercase tracking-[0.16em] text-gray-500 dark:text-gray-400">
                                Usage limits
                            </p>
                            <dl class="space-y-2">
                                <div
                                    v-for="limit in plan.limits"
                                    :key="limit.label"
                                    class="flex items-center justify-between gap-4 border-b border-gray-100 pb-2 text-sm last:border-0 last:pb-0 dark:border-white/5"
                                >
                                    <dt class="text-gray-600 dark:text-gray-400">{{ limit.label }}</dt>
                                    <dd class="font-medium text-gray-900 dark:text-white">{{ limit.value }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Included features -->
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

            <!-- Add-ons -->
            <section class="border-t border-gray-100 bg-gray-50 px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900">
                <div class="mx-auto max-w-3xl text-center">
                    <p class="kicker mx-auto">Add-ons</p>
                    <Heading as="h2" display="md" class="mt-5 text-balance">
                        Extend any plan with what you need.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-2xl text-base text-gray-600 dark:text-gray-300">
                        Optional extras you can toggle on at any time — no plan change required.
                    </p>
                </div>

                <div class="mx-auto mt-16 grid max-w-5xl gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    <div
                        v-for="addon in addOns"
                        :key="addon.name"
                        class="glass-panel flex flex-col p-6"
                    >
                        <p class="text-sm font-semibold text-gray-900 dark:text-white">{{ addon.name }}</p>
                        <div class="mt-2 flex items-baseline gap-1">
                            <span class="font-serif text-2xl font-bold text-gray-900 dark:text-white">{{ addon.price }}</span>
                            <span class="text-xs text-gray-500 dark:text-gray-400">{{ addon.period }}</span>
                        </div>
                        <p class="mt-3 flex-1 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ addon.description }}</p>
                    </div>
                </div>
            </section>

            <CtaSection :can-login="canLogin" :can-register="canRegister" />
        </main>

        <MarketingFooter :laravel-version="laravelVersion" :php-version="phpVersion" />
    </div>
</template>
