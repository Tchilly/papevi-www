<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { computed } from 'vue';

import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import Button from '@/Components/Ui/Button.vue';
import Heading from '@/Components/Ui/Heading.vue';

type Post = {
    slug: string;
    title: string;
    description: string;
    date: string;
    updated_at: string | null;
    category: string;
    author: string;
    reading_time: number | null;
    html: string;
};

const props = defineProps<{
    post: Post;
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

const canonicalUrl = computed(() => `https://papevi.com/blog/${props.post.slug}`);

const structuredData = computed(() => ({
    '@context': 'https://schema.org',
    '@type': 'Article',
    headline: props.post.title,
    description: props.post.description,
    datePublished: props.post.date,
    url: canonicalUrl.value,
    author: {
        '@type': 'Organization',
        name: 'Papevi',
        url: 'https://papevi.com',
    },
    publisher: {
        '@type': 'Organization',
        name: 'Papevi CMS',
        url: 'https://papevi.com',
    },
    image: 'https://papevi.com/images/og-social-card.png',
    isPartOf: {
        '@type': 'Blog',
        name: 'Papevi Blog',
        url: 'https://papevi.com/blog',
    },
}));
</script>

<template>
    <Head>
        <title>{{ post.title }} — Papevi Blog</title>
        <meta
            head-key="description"
            name="description"
            :content="post.description"
        />
        <meta
            head-key="robots"
            name="robots"
            content="index, follow"
        />
        <link
            head-key="canonical"
            rel="canonical"
            :href="canonicalUrl"
        />
        <meta
            head-key="og:type"
            property="og:type"
            content="article"
        />
        <meta
            head-key="og:site_name"
            property="og:site_name"
            content="Papevi CMS"
        />
        <meta
            head-key="og:title"
            property="og:title"
            :content="post.title"
        />
        <meta
            head-key="og:description"
            property="og:description"
            :content="post.description"
        />
        <meta
            head-key="og:url"
            property="og:url"
            :content="canonicalUrl"
        />
        <meta
            head-key="og:image"
            property="og:image"
            content="https://papevi.com/images/og-social-card.png"
        />
        <meta
            v-if="post.date"
            head-key="article:published_time"
            property="article:published_time"
            :content="post.date"
        />
        <meta
            head-key="twitter:card"
            name="twitter:card"
            content="summary_large_image"
        />
        <meta
            head-key="twitter:title"
            name="twitter:title"
            :content="post.title"
        />
        <meta
            head-key="twitter:description"
            name="twitter:description"
            :content="post.description"
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
            <!-- Article hero -->
            <header class="relative overflow-hidden bg-gray-950 px-6 py-20 sm:px-8 lg:px-12">
                <div
                    class="pointer-events-none absolute top-[-10%] right-[-5%] h-[600px] w-[600px] opacity-50 brand-glow"
                    aria-hidden="true"
                />
                <div
                    class="pointer-events-none absolute inset-0 hero-noise opacity-25"
                    aria-hidden="true"
                />
                <div
                    class="pointer-events-none absolute inset-0 atmos-grid"
                    aria-hidden="true"
                />

                <div class="relative mx-auto max-w-3xl">
                    <!-- Breadcrumb -->
                    <nav
                        aria-label="Breadcrumb"
                        class="mb-6 flex items-center gap-2 text-sm text-gray-500"
                    >
                        <Link
                            :href="route('blog')"
                            class="transition hover:text-gray-300"
                        >
                            Blog
                        </Link>
                        <span aria-hidden="true">/</span>
                        <span class="text-gray-400">{{ categoryLabel[post.category] ?? post.category }}</span>
                    </nav>

                    <!-- Category badge -->
                    <span
                        :class="categoryColour[post.category] ?? categoryColour['article']"
                        class="mb-5 inline-flex items-center rounded-full border px-3 py-1 text-xs font-medium"
                    >
                        {{ categoryLabel[post.category] ?? post.category }}
                    </span>

                    <Heading
                        as="h1"
                        display="lg"
                        class="mt-4 text-balance text-white"
                    >
                        {{ post.title }}
                    </Heading>

                    <p class="mt-5 text-lg leading-relaxed text-gray-400">
                        {{ post.description }}
                    </p>

                    <!-- Meta row -->
                    <div class="mt-8 flex flex-wrap items-center gap-4 text-sm text-gray-500">
                        <span>By {{ post.author }}</span>
                        <span
                            aria-hidden="true"
                            class="text-gray-700"
                            >·</span
                        >
                        <time
                            v-if="post.date"
                            :datetime="post.date"
                        >
                            {{ formatDate(post.date) }}
                        </time>
                        <template v-if="post.reading_time">
                            <span
                                aria-hidden="true"
                                class="text-gray-700"
                                >·</span
                            >
                            <span>{{ post.reading_time }} min read</span>
                        </template>
                    </div>
                </div>
            </header>

            <!-- Article body -->
            <div class="px-6 py-16 sm:px-8 lg:px-12">
                <div class="mx-auto max-w-3xl">
                    <!-- eslint-disable-next-line vue/no-v-html -- HTML is generated server-side from trusted markdown source -->
                    <article
                        class="article-body"
                        v-html="post.html"
                    />

                    <!-- Article footer: dates + disclaimer -->
                    <footer class="mt-16 space-y-6 border-t border-gray-200 pt-8 dark:border-white/8">
                        <!-- Published / updated dates -->
                        <dl class="flex flex-wrap gap-x-6 gap-y-1 text-sm text-gray-500 dark:text-gray-400">
                            <div
                                v-if="post.date"
                                class="flex gap-1.5"
                            >
                                <dt class="font-medium text-gray-700 dark:text-gray-300">Published</dt>
                                <dd>
                                    <time :datetime="post.date">{{ formatDate(post.date) }}</time>
                                </dd>
                            </div>
                            <div
                                v-if="post.updated_at"
                                class="flex gap-1.5"
                            >
                                <dt class="font-medium text-gray-700 dark:text-gray-300">Last updated</dt>
                                <dd>
                                    <time :datetime="post.updated_at">{{ formatDate(post.updated_at) }}</time>
                                </dd>
                            </div>
                        </dl>

                        <!-- Disclaimer -->
                        <p class="text-xs leading-relaxed text-gray-400 dark:text-gray-500">
                            <strong class="font-medium text-gray-500 dark:text-gray-400">Disclaimer:</strong>
                            The information in this article is provided for general informational purposes only. While
                            we strive for accuracy, pricing, features, and product details may change without notice.
                            Always verify details directly with the respective vendors before making any purchasing or
                            business decisions. Papevi accepts no liability for decisions made based on the content of
                            this article.
                        </p>
                    </footer>

                    <!-- Back link -->
                    <div class="mt-8">
                        <Link
                            :href="route('blog')"
                            class="inline-flex items-center gap-2 text-sm font-medium text-brand-600 transition hover:text-brand-700 dark:text-brand-400 dark:hover:text-brand-300"
                        >
                            <svg
                                class="size-4"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z"
                                    clip-rule="evenodd"
                                />
                            </svg>
                            All articles
                        </Link>
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <section
                class="border-t border-gray-100 bg-gray-50 px-6 py-20 sm:px-8 lg:px-12 dark:border-white/5 dark:bg-gray-900"
            >
                <div class="mx-auto max-w-2xl text-center">
                    <Heading
                        as="h2"
                        display="md"
                        class="text-balance"
                    >
                        Ready to try Papevi?
                    </Heading>
                    <p class="mt-4 text-lg text-gray-600 dark:text-gray-300">
                        Sign up for early access and be among the first to try Papevi CMS.
                    </p>
                    <div class="mt-8 flex flex-wrap justify-center gap-3">
                        <Button
                            as="a"
                            href="/#beta"
                            variant="brand"
                            size="lg"
                        >
                            Sign up for beta
                        </Button>
                        <Button
                            :as="Link"
                            :href="route('pricing')"
                            variant="outline"
                            size="lg"
                        >
                            View pricing
                        </Button>
                    </div>
                </div>
            </section>
        </main>

        <MarketingFooter />
    </div>
</template>
