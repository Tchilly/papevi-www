<script setup lang="ts">
import MarketingFooter from '@/Components/Marketing/MarketingFooter.vue';
import MarketingHeader from '@/Components/Marketing/MarketingHeader.vue';
import AboutSection from '@/Components/Marketing/Sections/AboutSection.vue';
import BetaSignupSection from '@/Components/Marketing/Sections/BetaSignupSection.vue';
import CapabilitiesSection from '@/Components/Marketing/Sections/CapabilitiesSection.vue';
import DocsSection from '@/Components/Marketing/Sections/DocsSection.vue';
import FaqSection from '@/Components/Marketing/Sections/FaqSection.vue';
import FeaturesSection from '@/Components/Marketing/Sections/FeaturesSection.vue';
import HeroSection from '@/Components/Marketing/Sections/HeroSection.vue';
import PlatformSection from '@/Components/Marketing/Sections/PlatformSection.vue';
import TrustSection from '@/Components/Marketing/Sections/TrustSection.vue';
import WorkflowSection from '@/Components/Marketing/Sections/WorkflowSection.vue';
import { Head } from '@inertiajs/vue3';

defineProps<{
    betaSuccess?: string;
}>();
</script>

<template>
    <Head title="Papevi CMS — The content platform for ambitious teams" />

    <div class="flex min-h-screen flex-col bg-white text-gray-900 antialiased dark:bg-gray-950 dark:text-white">
        <MarketingHeader />

        <main>
            <HeroSection />
            <FeaturesSection />
            <CapabilitiesSection />
            <WorkflowSection />
            <AboutSection />
            <PlatformSection />
            <DocsSection />
            <FaqSection />
            <TrustSection />
            <BetaSignupSection />
        </main>

        <MarketingFooter />
    </div>
</template>
