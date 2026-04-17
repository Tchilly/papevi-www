---
name: reka-ui
description: "Use when building, refactoring, or reviewing Reka UI (Radix Vue) components, wrappers, primitives, asChild composition, controlled state, or accessibility behavior in Vue. Use official Reka LLM docs first."
---

# Reka UI Skill

Use this workflow for any task involving `reka-ui` components, wrappers, or accessibility behavior.

## Source of Truth

1. Read `DESIGN.md` first for product visual and UX direction.
2. Read official Reka UI docs in this order:
    - `https://www.reka-ui.com/llms.txt`
    - `https://www.reka-ui.com/llms-full.txt`
    - `https://www.reka-ui.com/docs/overview/getting-started.md`
    - `https://www.reka-ui.com/docs/overview/installation.md`
    - `https://www.reka-ui.com/docs/overview/accessibility.md`
    - `https://www.reka-ui.com/docs/guides/composition.md`
    - `https://www.reka-ui.com/docs/guides/styling.md`
    - `https://www.reka-ui.com/docs/guides/controlled-state.md`

## LLM-Specific Rules

1. Prefer `llms.txt` for index/context and `llms-full.txt` for deep API details.
2. Prefer markdown doc endpoints when linking or fetching docs:
    - Component pages: `https://www.reka-ui.com/docs/components/<component>.md`
    - Guide pages: `https://www.reka-ui.com/docs/guides/<guide>.md`
    - Utility pages: `https://www.reka-ui.com/docs/utilities/<utility>.md`
3. If a behavior is uncertain, verify it from official Reka docs before implementing.

## Implementation Rules

1. Use Reka UI primitives as the accessibility/interaction base, then wrap in project components.
2. Keep WAI-ARIA behavior intact: keyboard navigation, focus management, labeling, and roles.
3. Use `is` composition when integrating with custom button/link components.
4. Support controlled and uncontrolled patterns according to component API.
5. Reuse existing design tokens and wrappers before adding new visual patterns.
