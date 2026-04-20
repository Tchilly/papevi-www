import { onMounted, ref, watch } from 'vue';

export type Appearance = 'light' | 'dark' | 'system';

const STORAGE_KEY = 'appearance';

const prefersDark = (): boolean =>
    typeof window !== 'undefined' && window.matchMedia('(prefers-color-scheme: dark)').matches;

const applyTheme = (value: Appearance): void => {
    if (typeof document === 'undefined') {
        return;
    }

    const isDark = value === 'dark' || (value === 'system' && prefersDark());

    document.documentElement.classList.toggle('dark', isDark);
    document.documentElement.style.colorScheme = isDark ? 'dark' : 'light';
};

const readStored = (): Appearance => {
    if (typeof window === 'undefined') {
        return 'dark';
    }

    const stored = window.localStorage.getItem(STORAGE_KEY) as Appearance | null;

    return stored ?? 'dark';
};

export function initAppearance(): void {
    applyTheme(readStored());
}

export function useAppearance() {
    const appearance = ref<Appearance>(readStored());

    onMounted(() => {
        appearance.value = readStored();
        applyTheme(appearance.value);

        const media = window.matchMedia('(prefers-color-scheme: dark)');
        const onSystemChange = () => {
            if (appearance.value === 'system') {
                applyTheme('system');
            }
        };

        media.addEventListener('change', onSystemChange);
    });

    watch(appearance, (value) => {
        if (typeof window !== 'undefined') {
            window.localStorage.setItem(STORAGE_KEY, value);
        }
        applyTheme(value);
    });

    return { appearance };
}
