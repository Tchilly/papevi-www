<script setup lang="ts">
import { computed, useAttrs, useSlots, type Component } from 'vue';

defineOptions({ inheritAttrs: false });

const attrs = useAttrs();
const slots = useSlots();

const props = withDefaults(
    defineProps<{
        /** Rendered HTML element or Vue component (e.g. Inertia Link). */
        as?: 'button' | 'a' | 'span' | Component;
        /** Visual style variant. */
        variant?: 'brand' | 'gray' | 'danger' | 'success' | 'warning' | 'outline' | 'ghost' | 'link';
        /** Size scale. */
        size?: 'xs' | 'sm' | 'md' | 'lg' | 'xl';
        /** Native button type (ignored for non-button elements). */
        type?: 'button' | 'submit' | 'reset';
        /** Show a loading spinner and block all interaction. */
        loading?: boolean;
        /** Render in square icon-only layout. */
        iconOnly?: boolean;
        /** Position within a joined button group. */
        group?: 'first' | 'middle' | 'last';
    }>(),
    {
        as: 'button',
        variant: 'brand',
        size: 'md',
        type: 'button',
        loading: false,
        iconOnly: false,
    },
);

const hasLeadingIcon = computed(() => !!slots['icon-left']);
const hasTrailingIcon = computed(() => !!slots['icon-right']);
const hasIcons = computed(() => hasLeadingIcon.value || hasTrailingIcon.value);

const isDisabled = computed(() => props.loading || !!attrs.disabled);

const isNativeButton = computed(() => props.as === 'button' || props.as === undefined);

const tabIndex = computed(() => {
    if (isNativeButton.value) return undefined;
    return isDisabled.value ? -1 : 0;
});
</script>

<template>
    <component
        :is="as"
        v-bind="attrs"
        :type="isNativeButton ? type : undefined"
        :disabled="isNativeButton ? (isDisabled || undefined) : undefined"
        :aria-disabled="!isNativeButton ? (isDisabled || undefined) : undefined"
        :aria-busy="loading || undefined"
        :role="!isNativeButton ? 'button' : undefined"
        :tabindex="tabIndex"
        :class="[
            'button',
            `button-${size}`,
            `button-${variant}`,
            iconOnly && 'button-icon-only',
            group === 'first' && 'button-group-first',
            group === 'middle' && 'button-group-middle',
            group === 'last' && 'button-group-last',
        ]"
    >
        <Transition name="btn-label" mode="out-in">
            <span
                v-if="loading"
                key="loading"
                :class="['button-loading-spinner', `button-icon-${size}`]"
                aria-hidden="true"
            >
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    width="100%"
                    height="100%"
                >
                    <circle cx="12" cy="12" r="10" stroke-opacity="0.25" />
                    <path d="M12 2a10 10 0 0 1 10 10" />
                </svg>
            </span>
            <span
                v-else
                key="content"
                :class="['btn-label-inner', hasIcons && 'button-with-content']"
            >
                <span
                    v-if="hasLeadingIcon"
                    :class="[`button-icon-${size}`, 'button-icon-left']"
                    aria-hidden="true"
                >
                    <slot name="icon-left" />
                </span>
                <slot />
                <span
                    v-if="hasTrailingIcon"
                    :class="[`button-icon-${size}`, 'button-icon-right']"
                    aria-hidden="true"
                >
                    <slot name="icon-right" />
                </span>
            </span>
        </Transition>
    </component>
</template>

<style scoped>
/* ── Base ─────────────────────────────────── */
.button {
    font-weight: var(--font-weight-medium, 500);
    white-space: nowrap;
    justify-content: center;
    align-items: center;
    transition-property: color, background-color, border-color, text-decoration-color,
        fill, stroke, opacity, box-shadow, transform;
    transition-duration: 75ms;
    transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    display: inline-flex;
}

.button:disabled,
.button[aria-disabled='true'] {
    cursor: not-allowed;
    opacity: 0.75;
}

.button[aria-disabled='true'] {
    pointer-events: none;
}

/* ── Sizes ────────────────────────────────── */
.button-xs {
    border-radius: var(--radius-sm, 0.25rem);
    padding-inline: calc(var(--spacing, 0.25rem) * 2);
    padding-block: calc(var(--spacing, 0.25rem) * 1);
    font-size: var(--text-xs, 0.75rem);
    line-height: calc(var(--spacing, 0.25rem) * 4);
}

.button-sm {
    border-radius: var(--radius-sm, 0.25rem);
    padding-inline: calc(var(--spacing, 0.25rem) * 3);
    padding-block: calc(var(--spacing, 0.25rem) * 2);
    font-size: var(--text-sm, 0.875rem);
    line-height: calc(var(--spacing, 0.25rem) * 5);
}

.button-md {
    border-radius: var(--radius-sm, 0.25rem);
    padding-inline: calc(var(--spacing, 0.25rem) * 3.5);
    padding-block: calc(var(--spacing, 0.25rem) * 1.5);
    font-size: var(--text-sm, 0.875rem);
    line-height: calc(var(--spacing, 0.25rem) * 6);
}

.button-lg {
    border-radius: var(--radius-md, 0.375rem);
    padding-inline: calc(var(--spacing, 0.25rem) * 4);
    padding-block: calc(var(--spacing, 0.25rem) * 2);
    font-size: var(--text-sm, 0.875rem);
    line-height: calc(var(--spacing, 0.25rem) * 6);
}

.button-xl {
    border-radius: var(--radius-md, 0.375rem);
    padding-inline: calc(var(--spacing, 0.25rem) * 6);
    padding-block: calc(var(--spacing, 0.25rem) * 2.5);
    font-size: var(--text-sm, 0.875rem);
    line-height: calc(var(--spacing, 0.25rem) * 6);
}

/* ── Icon-only overrides ──────────────────── */
.button-icon-only.button-xs {
    padding: calc(var(--spacing, 0.25rem) * 1.5);
}

.button-icon-only.button-sm {
    padding: calc(var(--spacing, 0.25rem) * 1);
}

.button-icon-only.button-md,
.button-icon-only.button-lg,
.button-icon-only.button-xl {
    padding: calc(var(--spacing, 0.25rem) * 2);
}

/* ── Variants ─────────────────────────────── */

/* Brand */
.button-brand {
    border: 1px solid var(--color-brand-600, oklch(48.5% 0.158 22));
    background-color: var(--color-brand-600, oklch(48.5% 0.158 22));
    color: var(--color-white, #eaeaea);
    box-shadow:
        inset 0 0.5px rgb(255 255 255 / 9%),
        0 1px 3px rgb(0 0 0 / 10%),
        0 1px 2px -1px rgb(0 0 0 / 10%);
}

@media (hover: hover) {
    .button-brand:hover {
        border-color: var(--color-brand-800, oklch(31.5% 0.088 22));
        background-color: var(--color-brand-700, oklch(39.3% 0.122 22));
    }
}

.button-brand:focus-visible {
    outline: 2px solid var(--color-brand-700, oklch(48.5% 0.158 22));
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-brand:focus-visible {
    outline-color: var(--color-brand-300, oklch(84.8% 0.115 22));
}

.button-brand:active:not(:disabled) {
    box-shadow: inset 0 1px 3px rgb(0 0 0 / 15%);
}

/* Gray */
.button-gray {
    background-color: var(--color-gray-600, #3d3f3f);
    color: var(--color-white, #eaeaea);
    box-shadow:
        inset 0 0.5px rgb(255 255 255 / 9%),
        0 1px 3px rgb(0 0 0 / 10%),
        0 1px 2px -1px rgb(0 0 0 / 10%);
}

@media (hover: hover) {
    .button-gray:hover {
        background-color: var(--color-gray-700, #323333);
    }
}

.button-gray:focus-visible {
    outline: 2px solid var(--color-gray-700, #323333);
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-gray:focus-visible {
    outline-color: var(--color-gray-300, #c2c4c4);
}

.button-gray:active:not(:disabled) {
    box-shadow: inset 0 1px 3px rgb(0 0 0 / 15%);
}

/* Danger */
.button-danger {
    background-color: var(--color-red-600, oklch(48.7% 0.168 20));
    color: var(--color-white, #eaeaea);
    box-shadow:
        inset 0 0.5px rgb(255 255 255 / 9%),
        0 1px 3px rgb(0 0 0 / 10%),
        0 1px 2px -1px rgb(0 0 0 / 10%);
}

@media (hover: hover) {
    .button-danger:hover {
        background-color: var(--color-red-700, oklch(40.5% 0.138 20));
    }
}

.button-danger:focus-visible {
    outline: 2px solid var(--color-red-600, oklch(48.7% 0.168 20));
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-danger:focus-visible {
    outline-color: var(--color-red-400, oklch(72% 0.148 20));
}

.button-danger:active:not(:disabled) {
    box-shadow: inset 0 1px 3px rgb(0 0 0 / 15%);
}

/* Success */
.button-success {
    background-color: var(--color-green-700, oklch(43.5% 0.115 148));
    color: var(--color-white, #eaeaea);
    box-shadow:
        inset 0 0.5px rgb(255 255 255 / 9%),
        0 1px 3px rgb(0 0 0 / 10%),
        0 1px 2px -1px rgb(0 0 0 / 10%);
}

@media (hover: hover) {
    .button-success:hover {
        background-color: var(--color-green-800, oklch(34.5% 0.088 148));
    }
}

.button-success:focus-visible {
    outline: 2px solid var(--color-green-700, oklch(43.5% 0.115 148));
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-success:focus-visible {
    outline-color: var(--color-green-400, oklch(74.5% 0.135 148));
}

.button-success:active:not(:disabled) {
    box-shadow: inset 0 1px 3px rgb(0 0 0 / 15%);
}

/* Warning */
.button-warning {
    background-color: var(--color-orange-700, oklch(44.8% 0.122 56));
    color: var(--color-white, #eaeaea);
    box-shadow:
        inset 0 0.5px rgb(255 255 255 / 9%),
        0 1px 3px rgb(0 0 0 / 10%),
        0 1px 2px -1px rgb(0 0 0 / 10%);
}

@media (hover: hover) {
    .button-warning:hover {
        background-color: var(--color-orange-800, oklch(35.6% 0.094 56));
    }
}

.button-warning:focus-visible {
    outline: 2px solid var(--color-orange-700, oklch(44.8% 0.122 56));
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-warning:focus-visible {
    outline-color: var(--color-orange-400, oklch(75.6% 0.14 56));
}

.button-warning:active:not(:disabled) {
    box-shadow: inset 0 1px 3px rgb(0 0 0 / 15%);
}

/* Outline */
.button-outline {
    border: 1px solid var(--color-gray-300, #c2c4c4);
    background-color: var(--color-white, #eaeaea);
    color: var(--color-gray-900, #1d1e1e);
    box-shadow: 0 1px 2px rgb(0 0 0 / 5%);
}

@media (hover: hover) {
    .button-outline:hover {
        background-color: var(--color-gray-100, #ced5d5);
    }
}

.button-outline:focus-visible {
    outline: 2px solid var(--color-gray-700, #323333);
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-outline {
    border-color: var(--color-gray-600, #3d3f3f);
    background-color: transparent;
    color: var(--color-gray-100, #ced5d5);
}

@media (hover: hover) {
    :where(.dark, .dark *) .button-outline:hover {
        background-color: var(--color-gray-700, #323333);
        color: var(--color-white, #eaeaea);
    }
}

:where(.dark, .dark *) .button-outline:focus-visible {
    outline-color: var(--color-gray-300, #c2c4c4);
}

.button-outline:active:not(:disabled) {
    box-shadow: inset 0 1px 2px rgb(0 0 0 / 8%);
}

/* Ghost */
.button-ghost {
    background-color: transparent;
    color: var(--color-gray-700, #323333);
}

@media (hover: hover) {
    .button-ghost:hover {
        background-color: var(--color-gray-100, #ced5d5);
        color: var(--color-gray-900, #1d1e1e);
    }
}

.button-ghost:focus-visible {
    outline: 2px solid var(--color-gray-700, #323333);
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-ghost {
    color: var(--color-gray-200, #c9cbcc);
}

@media (hover: hover) {
    :where(.dark, .dark *) .button-ghost:hover {
        background-color: var(--color-gray-800, #222323);
        color: var(--color-gray-100, #ced5d5);
    }
}

:where(.dark, .dark *) .button-ghost:focus-visible {
    outline-color: var(--color-gray-300, #c2c4c4);
}

/* Link */
.button-link {
    color: var(--color-gray-600, #3d3f3f);
}

@media (hover: hover) {
    .button-link:hover {
        color: var(--color-brand-800, oklch(39.3% 0.122 22));
        text-decoration-line: underline;
    }
}

.button-link:focus-visible {
    outline: 2px solid var(--color-gray-700, #323333);
    outline-offset: 2px;
}

:where(.dark, .dark *) .button-link {
    color: var(--color-gray-200, #c9cbcc);
}

@media (hover: hover) {
    :where(.dark, .dark *) .button-link:hover {
        color: var(--color-brand-300, oklch(84.8% 0.115 22));
    }
}

:where(.dark, .dark *) .button-link:focus-visible {
    outline-color: var(--color-gray-300, #c2c4c4);
}

/* ── Icon sizing ──────────────────────────── */
.button-icon-xs {
    width: calc(var(--spacing, 0.25rem) * 3);
    height: calc(var(--spacing, 0.25rem) * 3);
}

.button-icon-sm {
    width: calc(var(--spacing, 0.25rem) * 4);
    height: calc(var(--spacing, 0.25rem) * 4);
}

.button-icon-md,
.button-icon-lg {
    width: calc(var(--spacing, 0.25rem) * 5);
    height: calc(var(--spacing, 0.25rem) * 5);
}

.button-icon-xl {
    width: calc(var(--spacing, 0.25rem) * 6);
    height: calc(var(--spacing, 0.25rem) * 6);
}

.button-icon-left {
    margin-inline-start: calc(var(--spacing, 0.25rem) * -0.5);
}

.button-icon-right {
    margin-inline-end: calc(var(--spacing, 0.25rem) * -0.5);
}

/* ── Content layout ───────────────────────── */
.button-with-content {
    display: inline-flex;
    align-items: center;
    column-gap: calc(var(--spacing, 0.25rem) * 1.5);
}

.btn-label-inner {
    display: inline-flex;
    align-items: center;
    gap: inherit;
}

/* ── Loading spinner ──────────────────────── */
.button-loading-spinner {
    animation: var(--animate-spin, spin 1s linear infinite);
}

/* ── Button group ─────────────────────────── */
.button-group-first.button {
    border-start-end-radius: 0 !important;
    border-end-end-radius: 0 !important;
}

.button-group-last.button {
    border-start-start-radius: 0 !important;
    border-end-start-radius: 0 !important;
}

.button-group-middle.button {
    border-radius: 0 !important;
}

/* ── Label transition ─────────────────────── */
.btn-label-leave-active {
    transition: opacity 90ms ease-in, transform 90ms ease-in;
}

.btn-label-enter-active {
    transition: opacity 150ms ease-out, transform 150ms ease-out;
}

.btn-label-leave-to {
    opacity: 0;
    transform: translateY(5px);
}

.btn-label-enter-from {
    opacity: 0;
    transform: translateY(-5px);
}
</style>
