---
name: design-ux
description: "Use when designing or refining UI components, UX flows, layouts, visual hierarchy, interaction states, or Reka UI-based product design. Always read DESIGN.md first."
---

# Design, UX, and Reka UI Workflow

1. Before any UI or UX proposal/implementation, read `DESIGN.md` (uppercase file name).
2. Treat `DESIGN.md` as the source of truth for typography, color tokens, spacing, component patterns, and interaction states.
3. Build components with Reka UI primitives first, then wrap them in project components where needed.
4. Reuse existing design tokens and shared components before introducing new visual patterns.
5. Keep accessibility intact when using Reka UI: keyboard support, focus states, semantics, and ARIA behavior must remain correct.
6. If a request conflicts with `DESIGN.md`, call out the conflict and ask whether to follow the request or the design spec.
