<script setup lang="ts">
import { Form } from '@inertiajs/vue3';

import Button from '@/Components/Ui/Button.vue';
import Heading from '@/Components/Ui/Heading.vue';

const subjects = ['General enquiry', 'Partnership', 'Press & media', 'Technical question', 'Enterprise sales', 'Other'];
</script>

<template>
    <section
        id="contact"
        class="border-t border-gray-100 bg-white px-6 py-24 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-950"
    >
        <div class="mx-auto max-w-2xl">
            <!-- Header -->
            <div class="mb-12 text-center">
                <p class="kicker">Get in touch</p>
                <Heading
                    as="h2"
                    display="lg"
                    class="mt-5 text-balance"
                >
                    We'd love to hear from you.
                </Heading>
                <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                    Have a question, a partnership idea, or just want to say hello? Drop us a message and we'll get back
                    to you.
                </p>
            </div>

            <!-- Form -->
            <Form
                :action="route('contact')"
                method="post"
                :preserve-scroll="true"
                #default="{ errors, processing, wasSuccessful }"
            >
                <!-- Success state -->
                <div
                    v-if="wasSuccessful"
                    role="status"
                    aria-live="polite"
                    class="rounded-2xl border border-green-500/20 bg-green-500/5 px-8 py-10 text-center"
                >
                    <svg
                        class="mx-auto size-8 text-green-500"
                        viewBox="0 0 24 24"
                        fill="none"
                        aria-hidden="true"
                    >
                        <circle
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="1.5"
                        />
                        <path
                            d="M8 12.5l2.5 2.5 5-5.5"
                            stroke="currentColor"
                            stroke-width="1.8"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                        />
                    </svg>
                    <p class="mt-4 font-medium text-green-700 dark:text-green-300">
                        Your message has been sent. We'll be in touch soon.
                    </p>
                </div>

                <!-- Fields -->
                <template v-else>
                    <div class="space-y-5">
                        <!-- Name -->
                        <div>
                            <label
                                for="contact-name"
                                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >
                                Name
                                <span
                                    class="text-red-500"
                                    aria-hidden="true"
                                    >*</span
                                >
                            </label>
                            <input
                                id="contact-name"
                                type="text"
                                name="name"
                                autocomplete="name"
                                required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 focus:border-brand-400 focus:ring-2 focus:ring-brand-400/20 focus:outline-none dark:border-white/10 dark:bg-gray-900 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-brand-400"
                                placeholder="Your name"
                                :aria-describedby="errors.name ? 'contact-name-error' : undefined"
                            />
                            <p
                                v-if="errors.name"
                                id="contact-name-error"
                                class="mt-1.5 text-sm text-red-600 dark:text-red-400"
                            >
                                {{ errors.name }}
                            </p>
                        </div>

                        <!-- Email -->
                        <div>
                            <label
                                for="contact-email"
                                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >
                                Email
                                <span
                                    class="text-red-500"
                                    aria-hidden="true"
                                    >*</span
                                >
                            </label>
                            <input
                                id="contact-email"
                                type="email"
                                name="email"
                                autocomplete="email"
                                required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 focus:border-brand-400 focus:ring-2 focus:ring-brand-400/20 focus:outline-none dark:border-white/10 dark:bg-gray-900 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-brand-400"
                                placeholder="you@example.com"
                                :aria-describedby="errors.email ? 'contact-email-error' : undefined"
                            />
                            <p
                                v-if="errors.email"
                                id="contact-email-error"
                                class="mt-1.5 text-sm text-red-600 dark:text-red-400"
                            >
                                {{ errors.email }}
                            </p>
                        </div>

                        <!-- Subject -->
                        <div>
                            <label
                                for="contact-subject"
                                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >
                                Subject
                                <span
                                    class="text-red-500"
                                    aria-hidden="true"
                                    >*</span
                                >
                            </label>
                            <select
                                id="contact-subject"
                                name="subject"
                                required
                                class="w-full rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-900 focus:border-brand-400 focus:ring-2 focus:ring-brand-400/20 focus:outline-none dark:border-white/10 dark:bg-gray-900 dark:text-white dark:focus:border-brand-400"
                                :aria-describedby="errors.subject ? 'contact-subject-error' : undefined"
                            >
                                <option
                                    value=""
                                    disabled
                                    selected
                                >
                                    Select a subject
                                </option>
                                <option
                                    v-for="subject in subjects"
                                    :key="subject"
                                    :value="subject"
                                >
                                    {{ subject }}
                                </option>
                            </select>
                            <p
                                v-if="errors.subject"
                                id="contact-subject-error"
                                class="mt-1.5 text-sm text-red-600 dark:text-red-400"
                            >
                                {{ errors.subject }}
                            </p>
                        </div>

                        <!-- Message body -->
                        <div>
                            <label
                                for="contact-body"
                                class="mb-1.5 block text-sm font-medium text-gray-700 dark:text-gray-300"
                            >
                                Message
                                <span
                                    class="text-red-500"
                                    aria-hidden="true"
                                    >*</span
                                >
                            </label>
                            <textarea
                                id="contact-body"
                                name="body"
                                rows="6"
                                required
                                class="w-full resize-y rounded-xl border border-gray-200 bg-white px-4 py-3 text-gray-900 placeholder:text-gray-400 focus:border-brand-400 focus:ring-2 focus:ring-brand-400/20 focus:outline-none dark:border-white/10 dark:bg-gray-900 dark:text-white dark:placeholder:text-gray-500 dark:focus:border-brand-400"
                                placeholder="Tell us a bit more… (min. 20 characters)"
                                :aria-describedby="errors.body ? 'contact-body-error' : undefined"
                            />
                            <p
                                v-if="errors.body"
                                id="contact-body-error"
                                class="mt-1.5 text-sm text-red-600 dark:text-red-400"
                            >
                                {{ errors.body }}
                            </p>
                        </div>

                        <!-- Submit -->
                        <div class="pt-2">
                            <Button
                                type="submit"
                                variant="brand"
                                size="lg"
                                :loading="processing"
                                class="w-full sm:w-auto"
                            >
                                Send message
                            </Button>
                        </div>
                    </div>
                </template>
            </Form>
        </div>
    </section>
</template>
