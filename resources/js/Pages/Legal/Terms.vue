<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import Heading from '@/Components/Ui/Heading.vue';
import { Head } from '@inertiajs/vue3';
</script>

<template>
    <Head>
        <title>Terms of Service — Papevi CMS</title>
        <meta head-key="description" name="description" content="Terms of service for Papevi CMS. Your rights, our obligations, and how the platform works." />
        <meta head-key="robots" name="robots" content="index, follow" />
        <link head-key="canonical" rel="canonical" :href="route('terms')" />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <div class="mx-auto max-w-3xl px-6 py-24 sm:px-8 lg:px-12">
                <p class="kicker">Legal</p>
                <Heading as="h1" display="md" class="mt-5">Terms of Service</Heading>
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Last updated: April 20, 2026</p>
                <p class="mt-6 leading-relaxed text-gray-600 dark:text-gray-300">
                    These terms govern your use of the Papevi CMS platform and website. By creating an account you agree to them. We have tried to write them plainly — if something is unclear, ask us before signing up.
                </p>

                <div class="mt-12 space-y-12 [&_h2]:border-t [&_h2]:border-gray-100 [&_h2]:pt-8 [&_h2]:dark:border-white/5">

                    <section aria-labelledby="the-service">
                        <Heading id="the-service" as="h2">1. The service</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>Papevi CMS provides a hosted headless content management platform accessible via web interface and REST API. We provide the platform; you provide the content and the frontend.</p>
                            <p>We reserve the right to modify or discontinue features with reasonable notice. We will not remove core functionality from a plan tier you are actively paying for without giving you at least 60 days notice and the option to exit your subscription without penalty.</p>
                        </div>
                    </section>

                    <section aria-labelledby="accounts">
                        <Heading id="accounts" as="h2">2. Accounts</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>You must be at least 18 years old and able to form a binding contract in your jurisdiction to create an account. One person or legal entity may hold the account; you are responsible for all activity under it.</p>
                            <p>You must keep your credentials secure. Notify us immediately at <a href="mailto:security@papevi.com" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 dark:text-white dark:hover:text-brand-400">security@papevi.com</a> if you suspect unauthorised access.</p>
                        </div>
                    </section>

                    <section aria-labelledby="acceptable-use">
                        <Heading id="acceptable-use" as="h2">3. Acceptable use</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>You may use Papevi for any lawful purpose. You may not:</p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li>Use the platform to store, distribute, or publish illegal content, including content that infringes intellectual property rights, constitutes harassment, or is harmful to minors.</li>
                                <li>Attempt to probe, scan, or test the vulnerability of our systems without prior written authorisation.</li>
                                <li>Resell or sublicense access to the platform to third parties unless you are an authorised partner.</li>
                                <li>Circumvent API rate limits or usage quotas through technical means.</li>
                                <li>Use the platform to send unsolicited commercial communications.</li>
                            </ul>
                            <p>Violations may result in immediate suspension. We will contact you before taking action unless the violation poses an active security or legal risk.</p>
                        </div>
                    </section>

                    <section aria-labelledby="your-content">
                        <Heading id="your-content" as="h2">4. Your content</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>You own your content. You grant Papevi a limited, non-exclusive licence to store, replicate, and serve your content solely for the purpose of providing the platform to you.</p>
                            <p>We do not claim any ownership over your content and will never use it to train AI models or share it with third parties, except where required to provide the service (e.g. object storage, CDN delivery) or by law.</p>
                            <p>You are responsible for ensuring you have the right to store and publish all content you upload to the platform.</p>
                        </div>
                    </section>

                    <section aria-labelledby="billing">
                        <Heading id="billing" as="h2">5. Billing &amp; payment</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>Subscriptions are billed monthly or annually in advance. All prices are in euros and exclude VAT where applicable.</p>
                            <p>You may cancel at any time from your account settings. Cancellation takes effect at the end of the current billing period — you will not be charged again and you retain full access until the period ends. We do not offer prorated refunds for mid-period cancellations on monthly plans.</p>
                            <p>For annual plans, if you cancel within 14 days of your renewal date and have not used the new period, we will issue a full refund for that period.</p>
                            <p>If a payment fails we will retry over 7 days and notify you by email. If payment is not resolved, your account will be suspended (data retained) for 14 days, then scheduled for deletion.</p>
                        </div>
                    </section>

                    <section aria-labelledby="api-usage">
                        <Heading id="api-usage" as="h2">6. API usage &amp; limits</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>Each plan includes a monthly API request allowance. Requests exceeding your plan limit are billed at €10 per 500,000 additional requests, invoiced at the end of the billing period.</p>
                            <p>We will notify you by email when you reach 80% and 100% of your monthly allowance so you are never surprised by an overage charge.</p>
                            <p>We reserve the right to throttle requests that significantly exceed your plan limit without prior notice, to protect platform stability for all customers.</p>
                        </div>
                    </section>

                    <section aria-labelledby="uptime">
                        <Heading id="uptime" as="h2">7. Uptime &amp; SLA</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>We target 99.9% monthly uptime for all paid plans. Scheduled maintenance, force majeure events, and issues caused by third-party services are excluded from uptime calculations.</p>
                            <p>Scale and Enterprise plans are entitled to a formal SLA. Service credits are the sole remedy for downtime below the SLA threshold: 1 day credit for each hour below 99.9%, up to a maximum of 30 days credit per month.</p>
                            <p>Status and incident history are published at <code class="rounded bg-gray-100 px-1.5 py-0.5 font-mono text-xs dark:bg-white/10">status.papevi.com</code>.</p>
                        </div>
                    </section>

                    <section aria-labelledby="ip">
                        <Heading id="ip" as="h2">8. Intellectual property</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>The Papevi platform, including its software, design, and documentation, is owned by Papevi and licensed to you for use during your subscription. You may not copy, reverse-engineer, or create derivative works from the platform.</p>
                            <p>We will not claim any rights over integrations, themes, or tools you build on top of the Papevi API.</p>
                        </div>
                    </section>

                    <section aria-labelledby="limitation">
                        <Heading id="limitation" as="h2">9. Limitation of liability</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>The platform is provided "as is". To the maximum extent permitted by law, Papevi is not liable for indirect, incidental, or consequential damages including loss of revenue, data, or business opportunity.</p>
                            <p>Our total liability to you in any 12-month period is capped at the total fees you paid us in that period.</p>
                            <p>Nothing in these terms limits liability for death, personal injury, fraud, or any other liability that cannot lawfully be excluded.</p>
                        </div>
                    </section>

                    <section aria-labelledby="termination">
                        <Heading id="termination" as="h2">10. Termination</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>You may terminate your account at any time. We may terminate or suspend your account for material breach of these terms, after giving you reasonable notice and an opportunity to remedy the breach where practical.</p>
                            <p>On termination you may export your content data for 30 days. After that, your data is deleted from our systems within 30 days.</p>
                        </div>
                    </section>

                    <section aria-labelledby="governing-law">
                        <Heading id="governing-law" as="h2">11. Governing law</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>These terms are governed by the laws of Norway. Disputes shall be submitted to the exclusive jurisdiction of the courts of Norway, unless you are a consumer in an EU member state in which case mandatory local consumer protection laws apply.</p>
                        </div>
                    </section>

                    <section aria-labelledby="changes-to-terms">
                        <Heading id="changes-to-terms" as="h2">12. Changes to these terms</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>We will give you at least 30 days notice of material changes by email. Continued use of the platform after the effective date constitutes acceptance. If you disagree with a change, you may cancel without penalty before it takes effect.</p>
                        </div>
                    </section>

                    <section aria-labelledby="contact-terms">
                        <Heading id="contact-terms" as="h2">13. Contact</Heading>
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>Questions about these terms: <a href="mailto:legal@papevi.com" class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 dark:text-white dark:hover:text-brand-400">legal@papevi.com</a></p>
                        </div>
                    </section>

                </div>
            </div>
        </main>

        <MarketingFooter />
    </div>
</template>
