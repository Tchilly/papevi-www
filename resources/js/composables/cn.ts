import { twMerge } from 'tailwind-merge';

/**
 * Merges Tailwind class strings, with later values winning over earlier ones.
 * Use this in components to allow consumers to override default utility classes.
 */
export function cn(...classes: (string | false | null | undefined)[]): string {
    return twMerge(...(classes.filter(Boolean) as string[]));
}
