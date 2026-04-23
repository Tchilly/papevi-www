<script setup lang="ts">
import { Link } from '@inertiajs/vue3';

import { editorHeroImage } from '@/Components/Marketing/marketingImages';
import ProductFrame from '@/Components/Marketing/ProductFrame.vue';
import Button from '@/Components/Ui/Button.vue';
import Heading from '@/Components/Ui/Heading.vue';
</script>

<template>
    <section class="relative overflow-hidden bg-gray-950">
        <!-- Brand glow — offset top-right -->
        <div
            class="pointer-events-none absolute top-[-10%] right-[-5%] h-[700px] w-[700px] opacity-70 brand-glow"
            aria-hidden="true"
        />

        <!-- Noise texture -->
        <div
            class="pointer-events-none absolute inset-0 hero-noise opacity-30"
            aria-hidden="true"
        />

        <!-- Subtle grid -->
        <div
            class="pointer-events-none absolute inset-0 atmos-grid"
            aria-hidden="true"
        />

        <!-- Bottom gradient fade -->
        <div
            class="pointer-events-none absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-gray-950 to-transparent"
            aria-hidden="true"
        />

        <div
            class="relative mx-auto grid max-w-7xl items-center gap-12 px-6 py-24 sm:px-8 lg:grid-cols-[1fr_1.15fr] lg:gap-16 lg:px-12 lg:py-32"
        >
            <!-- Left column: copy + CTAs -->
            <div class="flex flex-col">
                <!-- Kicker pill -->
                <div class="mb-6 flex">
                    <span
                        class="inline-flex items-center gap-2 rounded-full border border-brand-400/30 bg-brand-400/10 px-4 py-1.5 text-xs font-semibold tracking-[0.12em] text-brand-300 uppercase"
                    >
                        <span
                            class="size-1.5 animate-pulse rounded-full bg-brand-400"
                            aria-hidden="true"
                        />
                        Now in beta
                    </span>
                </div>

                <Heading
                    as="h1"
                    display="xl"
                    class="text-balance text-white"
                >
                    The content platform for
                    <span
                        class="bg-gradient-to-r from-brand-300 via-brand-400 to-brand-500 bg-clip-text text-transparent"
                    >
                        ambitious teams</span
                    >.
                </Heading>

                <p class="mt-6 max-w-lg text-lg leading-relaxed text-balance text-gray-400">
                    Papevi CMS gives editors a workspace they love and developers an API they trust — with workflow,
                    audit, and compliance built in from day one.
                </p>

                <div class="mt-10 flex flex-wrap gap-3">
                    <Button
                        as="a"
                        href="/#beta"
                        variant="brand"
                        size="lg"
                    >
                        <template #icon-right>
                            <svg
                                viewBox="0 0 20 20"
                                fill="none"
                                aria-hidden="true"
                            >
                                <path
                                    d="M4 10h12M11 5l5 5-5 5"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                            </svg>
                        </template>
                        Get early access
                    </Button>
                    <Button
                        :as="Link"
                        :href="route('docs')"
                        variant="outline"
                        size="lg"
                    >
                        Read the docs
                    </Button>
                </div>
            </div>

            <!-- Right column: product frame -->
            <ProductFrame
                url="papevi.app / editor"
                :src="editorHeroImage"
                alt="Papevi CMS editor interface"
                label="Editor preview"
                loading="eager"
            />
        </div>
    </section>
</template>
