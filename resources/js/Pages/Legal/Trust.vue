<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import Heading from '@/Components/Ui/Heading.vue';
import { Head, Link } from '@inertiajs/vue3';

const pillars = [
    {
        id: 'data-ownership',
        title: 'You own your data',
        body: 'Your content, your media, your structured data. We store it on your behalf — we never claim ownership, analyse it, or use it for any purpose other than serving it back to you through the API. You can export everything at any time, in a machine-readable format.',
    },
    {
        id: 'eu-data-residency',
        title: 'EU data residency',
        body: 'By default, all customer data is stored and processed within the European Union. Scale and Enterprise customers can require EU residency as a hard contractual guarantee. We do not transfer personal data outside the EU without Standard Contractual Clauses in place.',
    },
    {
        id: 'gdpr',
        title: 'GDPR compliance',
        body: 'We act as data processor for the content you store inside Papevi and as data controller for the account data you provide to us. We maintain a records-of-processing register, support all data subject rights, and will sign a Data Processing Agreement (DPA) with any customer who requires one.',
    },
    {
        id: 'nis2',
        title: 'NIS-2 readiness',
        body: 'We are implementing NIS-2 controls as part of our roadmap for customers in regulated industries. Current status is available on request. Enterprise customers can access our implementation timeline and technical documentation under NDA.',
    },
    {
        id: 'encryption',
        title: 'Encryption everywhere',
        body: 'All data is encrypted at rest with AES-256 and in transit with TLS 1.2+. API tokens are stored as hashes and never logged in plain text. TLS 1.0 and 1.1 are disabled.',
    },
    {
        id: 'no-tracking',
        title: 'No third-party tracking',
        body: 'We do not use advertising networks, third-party analytics scripts, or tracking pixels on this website. The only cookies we set are a session cookie, a CSRF token, and a localStorage appearance preference — all strictly necessary.',
    },
    {
        id: 'transparency',
        title: 'Transparency by default',
        body: 'We publish our privacy policy, terms, and security policy in plain English. We notify you before material changes, give you time to leave if you disagree, and do not bury important clauses in legalese.',
    },
    {
        id: 'uptime',
        title: 'Reliability you can hold us to',
        body: 'We target 99.9% monthly uptime and publish our incident history at status.papevi.com. Scale and Enterprise customers are covered by a formal SLA with service credits.',
    },
];
</script>

<template>
    <Head>
        <title>Trust &amp; Compliance — Papevi CMS</title>
        <meta head-key="description" name="description" content="How Papevi CMS approaches data privacy, GDPR, EU data residency, security, and compliance. Built to be trusted." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('trust')" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <!-- Header -->
            <section aria-labelledby="trust-heading" class="border-b border-gray-100 px-6 pb-16 pt-24 sm:px-8 lg:px-12 dark:border-white/5">
                <div class="mx-auto max-w-3xl">
                    <p class="kicker">Trust &amp; compliance</p>
                    <Heading id="trust-heading" as="h1" display="md" class="mt-5 text-balance">
                        Built for teams that need more than a checkbox.
                    </Heading>
                    <p class="mt-5 leading-relaxed text-gray-600 dark:text-gray-300">
                        Whether you are a startup evaluating GDPR requirements or an enterprise with a dedicated compliance team, this page explains how Papevi is built and what we commit to. We have tried to be specific — vague assurances are not useful.
                    </p>
                </div>
            </section>

            <!-- Pillars grid -->
            <section aria-labelledby="pillars-heading" class="px-6 py-20 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-6xl">
                    <h2 id="pillars-heading" class="sr-only">Trust pillars</h2>
                    <dl class="grid gap-8 sm:grid-cols-2 lg:grid-cols-2">
                        <div
                            v-for="pillar in pillars"
                            :id="pillar.id"
                            :key="pillar.id"
                            class="rounded-xl border border-gray-200 bg-gray-50 p-6 dark:border-white/10 dark:bg-gray-900"
                        >
                            <dt class="font-semibold text-gray-900 dark:text-white">{{ pillar.title }}</dt>
                            <dd class="mt-2 text-sm leading-relaxed text-gray-600 dark:text-gray-300">{{ pillar.body }}</dd>
                        </div>
                    </dl>
                </div>
            </section>

            <!-- DPA callout -->
            <section aria-labelledby="dpa-heading" class="border-t border-gray-100 bg-gray-50 px-6 py-16 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900">
                <div class="mx-auto max-w-3xl">
                    <Heading id="dpa-heading" as="h2">Data Processing Agreement</Heading>
                    <p class="mt-4 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                        If your organisation requires a signed DPA as part of your GDPR or vendor management process, we will sign one. Email <a href="mailto:legal@papevi.com" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">legal@papevi.com</a> with "DPA request" in the subject line. Standard turnaround is 2 business days.
                    </p>
                    <p class="mt-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                        Our standard DPA covers: subject matter and duration, nature and purpose of processing, categories of data, data subject rights, subprocessor management, and technical/organisational security measures.
                    </p>
                </div>
            </section>

            <!-- Related documents -->
            <section aria-labelledby="related-heading" class="border-t border-gray-100 px-6 py-16 sm:px-8 lg:px-12 dark:border-white/5">
                <div class="mx-auto max-w-3xl">
                    <Heading id="related-heading" as="h2">Related documents</Heading>
                    <ul class="mt-6 space-y-3 text-sm">
                        <li>
                            <Link :href="route('privacy')" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">Privacy Policy</Link>
                            <span class="ml-2 text-gray-500 dark:text-gray-400">— what data we collect, why, and your rights under GDPR</span>
                        </li>
                        <li>
                            <Link :href="route('terms')" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">Terms of Service</Link>
                            <span class="ml-2 text-gray-500 dark:text-gray-400">— your rights and ours, billing, acceptable use</span>
                        </li>
                        <li>
                            <Link :href="route('security')" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">Security Policy</Link>
                            <span class="ml-2 text-gray-500 dark:text-gray-400">— infrastructure security, incident response, and vulnerability disclosure</span>
                        </li>
                    </ul>
                </div>
            </section>
        </main>

        <MarketingFooter />
    </div>
</template>
