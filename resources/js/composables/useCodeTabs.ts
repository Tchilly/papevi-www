import { type InjectionKey, type Ref, computed, inject, provide, ref } from 'vue';

import { useFrameworkPreference } from './useFrameworkPreference';

export interface CodeTabItem {
    label: string;
    code: string;
    language: string;
}

interface CodeTabsContext {
    readonly activeLabel: Ref<string>;
    register: (item: CodeTabItem) => void;
    readonly items: Ref<CodeTabItem[]>;
    setActive: (label: string) => void;
}

const CodeTabsKey: InjectionKey<CodeTabsContext> = Symbol('CodeTabs');

export function provideCodeTabs() {
    const items = ref<CodeTabItem[]>([]);
    const { preference } = useFrameworkPreference();

    const activeLabel = computed(() => {
        const labels = items.value.map((i) => i.label);
        return labels.includes(preference.value) ? preference.value : (labels[0] ?? '');
    });

    function register(item: CodeTabItem) {
        if (!items.value.some((i) => i.label === item.label)) {
            items.value.push(item);
        }
    }

    function setActive(label: string) {
        preference.value = label;
    }

    provide(CodeTabsKey, { activeLabel, register, items, setActive });

    return { items, activeLabel, setActive };
}

export function useCodeTabsContext() {
    return inject(CodeTabsKey, null);
}
