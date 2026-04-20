<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import Heading from '@/Components/Ui/Heading.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>Privacy Policy — Papevi CMS</title>
        <meta head-key="description" name="description" content="Privacy policy for Papevi CMS. How we collect, use, and protect your data." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('privacy')" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main id="main-content">
            <div class="mx-auto max-w-3xl px-6 py-24 sm:px-8 lg:px-12">
                <!-- Header -->
                <p class="kicker">Legal</p>
                <Heading as="h1" display="md" class="mt-5">Privacy Policy</Heading>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Last updated: April 20, 2026</p>
                <p class="mt-6 leading-relaxed text-gray-600 dark:text-gray-300">
                    Papevi CMS ("Papevi", "we", "us") is committed to protecting your personal data. This policy explains what we collect, why we collect it, how we use it, and your rights. We have written it to be readable — not to obscure anything.
                </p>

                <div class="mt-12 space-y-12 [&_h2]:border-t [&_h2]:border-gray-100 [&_h2]:pt-8 [&_h2]:dark:border-white/5">

                    <section aria-labelledby="who-we-are">
                        <Heading id="who-we-are" as="h2">1. Who we are</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>Papevi CMS is the controller of the personal data you provide when using our website and platform. For questions about this policy or your data, contact us at <a href="mailto:privacy@papevi.com" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">privacy@papevi.com</a>.</p>
                        </div>
                    </section>

                    <section aria-labelledby="what-we-collect">
                        <Heading id="what-we-collect" as="h2">2. What we collect</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>We collect the minimum data required to provide the service:</p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Account data:</strong> name, email address, and password hash when you register.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Billing data:</strong> invoicing details and payment method. Card numbers are handled entirely by Stripe and never stored on our servers.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Usage data:</strong> API request logs (method, endpoint, response code, timestamp, IP address). Retained for 90 days for security and billing purposes.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Content data:</strong> the pages, media, and structured content you create inside Papevi. This is your data — we do not read, analyse, or use it for any purpose other than serving it back to you.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Communications:</strong> messages you send to our support or sales addresses.</li>
                            </ul>
                            <p class="mt-3">We do not use tracking pixels, third-party analytics scripts, or advertising networks on this website.</p>
                        </div>
                    </section>

                    <section aria-labelledby="legal-basis">
                        <Heading id="legal-basis" as="h2">3. Legal basis for processing</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Contract performance:</strong> account data and billing data are processed to provide and bill you for the service you have signed up for.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Legitimate interest:</strong> usage logs are retained for security monitoring, abuse prevention, and billing reconciliation.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Legal obligation:</strong> we retain invoices and billing records as required by applicable tax law.</li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="how-we-use">
                        <Heading id="how-we-use" as="h2">4. How we use your data</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li>To provision, operate, and improve the Papevi platform.</li>
                                <li>To send transactional emails (account confirmation, invoices, password reset). We do not send marketing email without your explicit opt-in.</li>
                                <li>To detect and prevent abuse, fraud, and security incidents.</li>
                                <li>To comply with legal obligations.</li>
                            </ul>
                            <p>We do not sell, rent, or trade your personal data to third parties.</p>
                        </div>
                    </section>

                    <section aria-labelledby="subprocessors">
                        <Heading id="subprocessors" as="h2">5. Subprocessors</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>We use a small number of trusted third parties to operate the service:</p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Stripe</strong> — payment processing. Stripe is PCI DSS Level 1 certified.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">AWS / Hetzner</strong> — cloud infrastructure and object storage (EU regions).</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Postmark</strong> — transactional email delivery.</li>
                            </ul>
                            <p>All subprocessors are bound by data processing agreements and are prohibited from using your data for their own purposes.</p>
                        </div>
                    </section>

                    <section aria-labelledby="data-location">
                        <Heading id="data-location" as="h2">6. Data location &amp; transfers</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>By default, all customer data is stored and processed within the European Union. Customers on the Scale or Enterprise plan can select EU data residency as a hard guarantee in their contract.</p>
                            <p>Where data is transferred outside the EU, we rely on Standard Contractual Clauses (SCCs) approved by the European Commission.</p>
                        </div>
                    </section>

                    <section aria-labelledby="retention">
                        <Heading id="retention" as="h2">7. Retention</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Account &amp; content data:</strong> retained for the duration of your subscription, then deleted within 30 days of account closure.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">API logs:</strong> 90 days.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Billing records:</strong> 7 years as required by EU tax law.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Support communications:</strong> 2 years from the date of the last message.</li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="your-rights">
                        <Heading id="your-rights" as="h2">8. Your rights</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>Under GDPR you have the right to:</p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Access</strong> the personal data we hold about you.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Rectification</strong> — correct inaccurate data.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Erasure</strong> — request deletion of your data (subject to legal retention obligations).</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Portability</strong> — receive your content data in a machine-readable format.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Objection</strong> — object to processing based on legitimate interest.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Restriction</strong> — request we restrict processing in certain circumstances.</li>
                            </ul>
                            <p>To exercise any of these rights, email <a href="mailto:privacy@papevi.com" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400 dark:text-white dark:hover:text-brand-400">privacy@papevi.com</a>. We will respond within 30 days. You also have the right to lodge a complaint with your national data protection authority.</p>
                        </div>
                    </section>

                    <section aria-labelledby="cookies">
                        <Heading id="cookies" as="h2">9. Cookies</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>We use strictly necessary cookies only:</p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Session cookie:</strong> keeps you authenticated during a browser session. Expires when you close your browser or log out.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">CSRF token:</strong> protects form submissions from cross-site request forgery. Session-scoped.</li>
                                <li><strong class="font-semibold text-gray-800 dark:text-gray-100">Appearance preference:</strong> stores your dark/light mode choice in localStorage on your device. Never transmitted to our servers.</li>
                            </ul>
                            <p>We do not use advertising cookies, analytics cookies, or any cookies requiring consent under ePrivacy.</p>
                        </div>
                    </section>

                    <section aria-labelledby="changes">
                        <Heading id="changes" as="h2">10. Changes to this policy</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>If we make material changes to this policy, we will notify you by email at least 14 days before the changes take effect. The current version is always available at <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-white/10">papevi.com/privacy</code>.</p>
                        </div>
                    </section>

                </div>
            </div>
        </main>

        <MarketingFooter />
    </div>
</template>
