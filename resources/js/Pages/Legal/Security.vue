<script setup lang="ts">
import { Head } from '@inertiajs/vue3';

import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import Heading from '@/Components/Ui/Heading.vue';
</script>

<template>
    <Head>
        <title>Security Policy — Papevi CMS</title>
        <meta
            head-key="description"
            name="description"
            content="Papevi CMS security policy. How we protect your data, our disclosure process, and how to report vulnerabilities."
        />
        <meta
            head-key="robots"
            name="robots"
            content="index, follow"
        />
        <link
            head-key="canonical"
            rel="canonical"
            :href="route('security')"
        />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main id="main-content">
            <div class="mx-auto max-w-3xl px-6 py-24 sm:px-8 lg:px-12">
                <p class="kicker">Legal</p>
                <Heading
                    as="h1"
                    display="md"
                    class="mt-5"
                    >Security Policy</Heading
                >
                <p class="mt-3 text-sm text-gray-500 dark:text-gray-400">Last updated: April 20, 2026</p>
                <p class="mt-6 leading-relaxed text-gray-600 dark:text-gray-300">
                    Security is a core responsibility, not a marketing claim. This page describes how the Papevi
                    platform is secured, how we respond to incidents, and how to responsibly disclose a vulnerability.
                </p>

                <div
                    class="mt-12 space-y-12 [&_h2]:border-t [&_h2]:border-gray-100 [&_h2]:pt-8 [&_h2]:dark:border-white/5"
                >
                    <section aria-labelledby="reporting">
                        <Heading
                            id="reporting"
                            as="h2"
                            >Reporting a vulnerability</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>
                                If you believe you have found a security vulnerability in Papevi, please disclose it
                                responsibly:
                            </p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li>
                                    Email
                                    <a
                                        href="mailto:security@papevi.com"
                                        class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-white dark:hover:text-brand-400 dark:focus-visible:ring-brand-400"
                                        >security@papevi.com</a
                                    >
                                    with a clear description of the issue, steps to reproduce, and your assessment of
                                    the impact.
                                </li>
                                <li>
                                    Do not disclose the issue publicly until we have had a reasonable opportunity to
                                    investigate and patch it.
                                </li>
                                <li>
                                    We will acknowledge your report within 2 business days and provide a resolution
                                    timeline within 7.
                                </li>
                            </ul>
                            <p>
                                We do not pursue legal action against researchers who act in good faith under this
                                policy. We will credit you by name in our security changelog if you would like.
                            </p>
                        </div>
                    </section>

                    <section aria-labelledby="infrastructure">
                        <Heading
                            id="infrastructure"
                            as="h2"
                            >Infrastructure &amp; hosting</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li>
                                    All services run inside private VPCs with no public access except via defined
                                    ingress points.
                                </li>
                                <li>
                                    Data is encrypted at rest (AES-256) and in transit (TLS 1.2+). TLS 1.0 and 1.1 are
                                    disabled.
                                </li>
                                <li>
                                    Database servers are not publicly reachable. Access is restricted to application
                                    servers by network policy.
                                </li>
                                <li>
                                    Secrets and credentials are managed via a secrets manager — never stored in
                                    environment files or version control.
                                </li>
                                <li>Infrastructure is provisioned as code and change-controlled.</li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="application">
                        <Heading
                            id="application"
                            as="h2"
                            >Application security</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li>
                                    <strong class="font-semibold text-gray-800 dark:text-gray-100"
                                        >Authentication:</strong
                                    >
                                    passwords are hashed with bcrypt (cost factor 12+). API tokens are high-entropy
                                    random strings stored as hashes.
                                </li>
                                <li>
                                    <strong class="font-semibold text-gray-800 dark:text-gray-100">Sessions:</strong>
                                    HTTP-only, Secure, SameSite=Strict cookies. Sessions are invalidated on password
                                    change and explicit logout.
                                </li>
                                <li>
                                    <strong class="font-semibold text-gray-800 dark:text-gray-100"
                                        >CSRF protection:</strong
                                    >
                                    all state-changing requests require a CSRF token.
                                </li>
                                <li>
                                    <strong class="font-semibold text-gray-800 dark:text-gray-100"
                                        >Input validation:</strong
                                    >
                                    all API inputs are validated server-side before processing. User content is never
                                    executed.
                                </li>
                                <li>
                                    <strong class="font-semibold text-gray-800 dark:text-gray-100"
                                        >Rate limiting:</strong
                                    >
                                    authentication endpoints and the public API are rate-limited. Brute force attempts
                                    trigger automated lockout.
                                </li>
                                <li>
                                    <strong class="font-semibold text-gray-800 dark:text-gray-100"
                                        >Dependencies:</strong
                                    >
                                    automated dependency scanning runs on every commit. Critical CVEs are patched within
                                    24 hours.
                                </li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="access-controls">
                        <Heading
                            id="access-controls"
                            as="h2"
                            >Access controls</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li>
                                    Production access is restricted to engineers who require it for their role, via
                                    MFA-gated SSO.
                                </li>
                                <li>All production access is logged and audited.</li>
                                <li>
                                    Papevi staff cannot read your content data in normal operation. Access for support
                                    purposes requires your explicit consent and is logged.
                                </li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="backups">
                        <Heading
                            id="backups"
                            as="h2"
                            >Backups &amp; recovery</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <ul class="list-disc space-y-2 pl-5">
                                <li>
                                    Database backups run daily, with point-in-time recovery available for the last 7
                                    days on all paid plans and 30 days on Scale and Enterprise.
                                </li>
                                <li>Backups are encrypted and stored in a separate region from the primary data.</li>
                                <li>Recovery procedures are tested quarterly.</li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="incident-response">
                        <Heading
                            id="incident-response"
                            as="h2"
                            >Incident response</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>In the event of a security incident affecting your data:</p>
                            <ul class="mt-3 list-disc space-y-2 pl-5">
                                <li>
                                    We will notify affected customers within 72 hours of confirming the breach, as
                                    required by GDPR Article 33.
                                </li>
                                <li>
                                    Notification will include: nature of the incident, data affected, likely
                                    consequences, and steps we are taking.
                                </li>
                                <li>We will notify the relevant supervisory authority where required by law.</li>
                            </ul>
                        </div>
                    </section>

                    <section aria-labelledby="third-party-audits">
                        <Heading
                            id="third-party-audits"
                            as="h2"
                            >Third-party audits</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>
                                We conduct annual third-party penetration tests of the Papevi platform. Results and
                                remediation status are shared with Enterprise customers on request under NDA.
                            </p>
                        </div>
                    </section>

                    <section aria-labelledby="contact-security">
                        <Heading
                            id="contact-security"
                            as="h2"
                            >Contact</Heading
                        >
                        <div class="mt-4 space-y-3 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                            <p>
                                Security issues:
                                <a
                                    href="mailto:security@papevi.com"
                                    class="font-medium text-gray-900 underline underline-offset-2 hover:text-brand-600 focus:outline-none focus-visible:rounded focus-visible:ring-2 focus-visible:ring-brand-600 dark:text-white dark:hover:text-brand-400 dark:focus-visible:ring-brand-400"
                                    >security@papevi.com</a
                                ><br />
                                PGP key available on request.
                            </p>
                        </div>
                    </section>
                </div>
            </div>
        </main>

        <MarketingFooter />
    </div>
</template>
