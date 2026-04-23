<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import Heading from '@/Components/Ui/Heading.vue';

type Post = {
    slug: string;
    title: string;
    description: string;
    date: string;
    category: string;
    author: string;
    reading_time: number | null;
};

const props = defineProps<{
    posts: Post[];
}>();

const categoryLabel: Record<string, string> = {
    comparison: 'Comparison',
    guide: 'Guide',
    news: 'News',
    article: 'Article',
};

const categoryColour: Record<string, string> = {
    comparison: 'bg-brand-400/10 text-brand-700 border-brand-400/30 dark:text-brand-300',
    guide: 'bg-green-400/10 text-green-700 border-green-400/30 dark:text-green-300',
    news: 'bg-orange-400/10 text-orange-700 border-orange-400/30 dark:text-orange-300',
    article: 'bg-gray-100 text-gray-600 border-gray-300 dark:bg-white/5 dark:text-gray-400 dark:border-white/10',
};

function formatDate(raw: string): string {
    if (!raw) return '';
    return new Date(raw).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' });
}

const structuredData = computed(() => ({
    '@context': 'https://schema.org',
    '@type': 'Blog',
    name: 'Papevi Blog',
    description: 'Guides, comparisons, and insights for teams building with headless CMS.',
    url: 'https://papevi.com/blog',
    publisher: {
        '@type': 'Organization',
        name: 'Papevi',
        url: 'https://papevi.com',
    },
    blogPost: props.posts.map((post) => ({
        '@type': 'BlogPosting',
        headline: post.title,
        description: post.description,
        datePublished: post.date,
        url: `https://papevi.com/blog/${post.slug}`,
    })),
}));
</script>

<template>
    <Head>
        <title>Blog — Papevi CMS</title>
        <meta
            head-key="description"
            name="description"
            content="Guides, comparisons, and insights for teams building with headless CMS. Compare Papevi to alternatives, learn best practices, and stay up to date."
        />
        <meta
            head-key="robots"
            name="robots"
            content="index, follow"
        />
        <link
            head-key="canonical"
            rel="canonical"
            :href="route('blog')"
        />
        <meta
            head-key="og:type"
            property="og:type"
            content="website"
        />
        <meta
            head-key="og:site_name"
            property="og:site_name"
            content="Papevi CMS"
        />
        <meta
            head-key="og:title"
            property="og:title"
            content="Blog — Papevi CMS"
        />
        <meta
            head-key="og:description"
            property="og:description"
            content="Guides, comparisons, and insights for teams building with headless CMS."
        />
        <meta
            head-key="og:url"
            property="og:url"
            :content="route('blog')"
        />
        <meta
            head-key="og:image"
            property="og:image"
            content="https://papevi.com/images/og-social-card.png"
        />
        <meta
            head-key="twitter:card"
            name="twitter:card"
            content="summary_large_image"
        />
        <meta
            head-key="twitter:title"
            name="twitter:title"
            content="Blog — Papevi CMS"
        />
        <meta
            head-key="twitter:description"
            name="twitter:description"
            content="Guides, comparisons, and insights for teams building with headless CMS."
        />
        <meta
            head-key="twitter:image"
            name="twitter:image"
            content="https://papevi.com/images/og-social-card.png"
        />
        <component
            :is="'script'"
            type="application/ld+json"
            v-text="JSON.stringify(structuredData)"
        />
    </Head>

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main id="main-content">
            <!-- Hero -->
            <section class="relative overflow-hidden bg-gray-950 px-6 py-24 sm:px-8 lg:px-12">
                <div
                    class="pointer-events-none absolute top-[-10%] right-[-5%] h-[600px] w-[600px] opacity-60 brand-glow"
                    aria-hidden="true"
                />
                <div
                    class="pointer-events-none absolute inset-0 hero-noise opacity-30"
                    aria-hidden="true"
                />
                <div
                    class="pointer-events-none absolute inset-0 atmos-grid"
                    aria-hidden="true"
                />

                <div class="relative mx-auto max-w-3xl text-center">
                    <p class="mx-auto kicker inline-flex">Blog</p>
                    <Heading
                        as="h1"
                        display="lg"
                        class="mt-6 text-balance text-white"
                    >
                        Guides, comparisons &amp; insights.
                    </Heading>
                    <p class="mx-auto mt-5 max-w-xl text-lg leading-relaxed text-gray-400">
                        Everything we know about headless CMS — how to choose one, how to use it, and how Papevi
                        compares to the alternatives.
                    </p>
                </div>
            </section>

            <!-- Posts grid -->
            <section class="px-6 py-20 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-6xl">
                    <!-- Empty state -->
                    <div
                        v-if="posts.length === 0"
                        class="py-20 text-center"
                    >
                        <p class="text-gray-500 dark:text-gray-400">No articles yet — check back soon.</p>
                    </div>

                    <div
                        v-else
                        class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3"
                    >
                        <Link
                            v-for="post in posts"
                            :key="post.slug"
                            :href="route('blog.show', { slug: post.slug })"
                            class="group flex flex-col glass-panel p-6 transition hover:border-brand-400/40 hover:shadow-md focus:outline-none focus-visible:ring-2 focus-visible:ring-brand-600 dark:focus-visible:ring-brand-400"
                        >
                            <!-- Category + reading time -->
                            <div class="flex items-center gap-2">
                                <span
                                    :class="categoryColour[post.category] ?? categoryColour['article']"
                                    class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-medium"
                                >
                                    {{ categoryLabel[post.category] ?? post.category }}
                                </span>
                                <span
                                    v-if="post.reading_time"
                                    class="text-xs text-gray-500 dark:text-gray-400"
                                    >{{ post.reading_time }} min read</span
                                >
                            </div>

                            <!-- Title -->
                            <Heading
                                as="h2"
                                class="mt-4 text-lg leading-snug font-semibold text-gray-900 transition group-hover:text-brand-700 dark:text-white dark:group-hover:text-brand-300"
                            >
                                {{ post.title }}
                            </Heading>

                            <!-- Description -->
                            <p class="mt-2 flex-1 text-sm leading-relaxed text-gray-600 dark:text-gray-400">
                                {{ post.description }}
                            </p>

                            <!-- Date + read more -->
                            <div class="mt-5 flex items-center justify-between">
                                <time
                                    :datetime="post.date"
                                    class="text-xs text-gray-500 dark:text-gray-500"
                                >
                                    {{ formatDate(post.date) }}
                                </time>
                                <span
                                    class="text-xs font-medium text-brand-600 transition group-hover:text-brand-700 dark:text-brand-400 dark:group-hover:text-brand-300"
                                    aria-hidden="true"
                                >
                                    Read →
                                </span>
                            </div>
                        </Link>
                    </div>
                </div>
            </section>

            <CtaSection />
        </main>

        <MarketingFooter />
    </div>
</template>
