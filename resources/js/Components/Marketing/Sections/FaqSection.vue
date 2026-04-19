<script setup lang="ts">
import Heading from '@/Components/Ui/Heading.vue';
import {
    AccordionContent,
    AccordionHeader,
    AccordionItem,
    AccordionRoot,
    AccordionTrigger,
} from 'reka-ui';

const items = [
    { value: 'faq-1', question: 'Who is Papevi for?', answer: 'Editorial teams, product organizations, and engineering groups that need a single CMS for multi-site, multi-tenant publishing with strong governance.' },
    { value: 'faq-2', question: 'Is it really headless?', answer: 'Yes. Authoring lives in a Vue + Inertia admin, and content is delivered through a parameter-driven REST API ready for any frontend.' },
    { value: 'faq-3', question: 'How does workflow and scheduling work?', answer: 'Pages move through draft, review, approved, and published. Status is computed live from publish and unpublish timestamps so scheduling is deterministic.' },
    { value: 'faq-4', question: 'What about compliance and security?', answer: 'Role-based access control, audit history, encrypted recovery codes, 2FA, and GDPR media controls are part of the platform — not add-ons.' },
    { value: 'faq-5', question: 'Can it scale?', answer: 'Cloudflare → Heroku Router → Octane/FrankenPHP → Redis → PostgreSQL is the target topology. Multi-tenant by design.' },
];
</script>

<template>
    <section
        id="faq"
        class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950"
    >
        <div class="mx-auto grid max-w-6xl gap-12 lg:grid-cols-[0.8fr_1.2fr] lg:gap-16">
            <div class="space-y-4">
                <p class="kicker">FAQ</p>
                <Heading as="h2" class="text-balance text-4xl font-bold tracking-[-0.025em] text-gray-900 sm:text-5xl dark:text-white">
                    Common questions, clearly answered.
                </Heading>
                <p class="text-base text-gray-600 dark:text-gray-300">
                    For anything else, the docs above go deeper into architecture,
                    APIs, and operational patterns.
                </p>
            </div>

            <AccordionRoot type="single" collapsible class="space-y-3">
                <AccordionItem
                    v-for="item in items"
                    :key="item.value"
                    :value="item.value"
                    class="glass-panel overflow-hidden"
                >
                    <AccordionHeader as="h3">
                        <AccordionTrigger
                            as="button"
                            class="group flex w-full items-center justify-between gap-4 px-5 py-4 text-left text-base font-medium text-gray-900 dark:text-white"
                        >
                            <span>{{ item.question }}</span>
                            <svg
                                class="size-4 shrink-0 text-brand-600 transition-transform duration-200 group-data-[state=open]:rotate-180 dark:text-brand-400"
                                viewBox="0 0 20 20"
                                fill="none"
                                aria-hidden="true"
                            >
                                <path d="M5 8L10 13L15 8" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </AccordionTrigger>
                    </AccordionHeader>
                    <AccordionContent class="px-5 pb-5 text-sm leading-relaxed text-gray-600 dark:text-gray-300">
                        {{ item.answer }}
                    </AccordionContent>
                </AccordionItem>
            </AccordionRoot>
        </div>
    </section>
</template>
