<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import CapabilitiesSection from '@/Components/Marketing/Sections/CapabilitiesSection.vue';
import CtaSection from '@/Components/Marketing/Sections/CtaSection.vue';
import DocsSection from '@/Components/Marketing/Sections/DocsSection.vue';
import FaqSection from '@/Components/Marketing/Sections/FaqSection.vue';
import FeaturesSection from '@/Components/Marketing/Sections/FeaturesSection.vue';
import HeroSection from '@/Components/Marketing/Sections/HeroSection.vue';
import PlatformSection from '@/Components/Marketing/Sections/PlatformSection.vue';
import WorkflowSection from '@/Components/Marketing/Sections/WorkflowSection.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    canLogin?: boolean;
    canRegister?: boolean;
    laravelVersion: string;
    phpVersion: string;
}>();
</script>

<template>
    <Head title="Papevi CMS — The content platform for ambitious teams" />

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader :can-login="canLogin" :can-register="canRegister" />

        <main>
            <HeroSection :can-login="canLogin" :can-register="canRegister" />
            <FeaturesSection />
            <CapabilitiesSection />
            <WorkflowSection />
            <PlatformSection />
            <DocsSection />
            <FaqSection />
            <CtaSection :can-login="canLogin" :can-register="canRegister" />
        </main>

        <MarketingFooter :laravel-version="laravelVersion" :php-version="phpVersion" />
    </div>
</template>
