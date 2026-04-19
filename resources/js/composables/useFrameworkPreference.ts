import { ref, watch } from 'vue';

const STORAGE_KEY = 'papevi-docs-framework';

const preference = ref<string>(localStorage.getItem(STORAGE_KEY) ?? 'Vue 3');

watch(preference, (value) => {
    localStorage.setItem(STORAGE_KEY, value);
});

export function useFrameworkPreference() {
    return { preference };
}
