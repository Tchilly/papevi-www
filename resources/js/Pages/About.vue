<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import AboutSection from '@/Components/Marketing/Sections/AboutSection.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();
</script>

<template>
    <Head title="About — Papevi CMS" />

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader :can-login="canLogin" :can-register="canRegister" />

        <main>
            <AboutSection />
            <CtaSection :can-login="canLogin" :can-register="canRegister" />
        </main>

        <MarketingFooter :laravel-version="laravelVersion" :php-version="phpVersion" />
    </div>
</template>
