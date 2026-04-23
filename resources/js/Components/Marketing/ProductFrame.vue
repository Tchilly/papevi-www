<script setup lang="ts">
withDefaults(
    defineProps<{
        /** Text shown in the mock browser address bar */
        url: string;
        /** Image source */
        src: string;
        /** Image alt text; also used as placeholder label when `label` is omitted */
        alt: string;
        /** Mono fallback label shown over the placeholder background */
        label?: string;
        /** Aspect ratio of the image area */
        aspect?: '4/3' | '16/9';
        /** Native image loading strategy */
        loading?: 'eager' | 'lazy';
    }>(),
    {
        aspect: '4/3',
        loading: 'lazy',
    },
);

const onImageLoad = (event: Event) => {
    (event.target as HTMLImageElement).dataset.loaded = 'true';
};

const onImageError = (event: Event) => {
    (event.target as HTMLImageElement).remove();
};
</script>

<template>
    <figure class="product-frame">
        <div class="product-frame-bar">
            <span class="product-frame-dot" />
            <span class="product-frame-dot" />
            <span class="product-frame-dot" />
            <span class="ml-3 font-mono text-[11px] text-gray-600 dark:text-gray-400">{{ url }}</span>
        </div>
        <div
            class="relative w-full overflow-hidden product-placeholder"
            :class="aspect === '16/9' ? 'aspect-[16/9]' : 'aspect-[4/3]'"
        >
            <img
                :src="src"
                :alt="alt"
                class="absolute inset-0 h-full w-full object-cover opacity-0 transition data-[loaded=true]:opacity-100"
                :loading="loading"
                @load="onImageLoad"
                @error="onImageError"
            />
            <div class="absolute inset-0 flex items-center justify-center text-sm text-gray-400 dark:text-gray-500">
                <span class="font-mono">{{ label ?? alt }}</span>
            </div>
        </div>
    </figure>
</template>
