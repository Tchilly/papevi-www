# Design System Inspired by Linear

## 1. Visual Theme & Atmosphere

Papevi CMS is a dark-first product interface built for dense editorial workflows. The canvas is deep neutral gray (`gray-950`/`gray-900`) where content layers emerge through subtle luminance steps, translucent surfaces, and low-contrast borders. This is not a light UI inverted into dark mode; darkness is the default medium and visual hierarchy is controlled through neutral opacity, structured spacing, and semantic accents.

The typography system is built on IBM Plex families from `app.css`: `IBM Plex Sans` for UI/content and `IBM Plex Mono` for technical labels and keyboard hints. Weight usage follows product conventions (400 reading, 500 UI emphasis, 600–700 section emphasis) with clear, practical text scales optimized for management interfaces.

The color system remains tightly constrained to Papevi tokens from `app.css`: neutral `gray-*` for structure, `brand-*` for primary interaction, and semantic `red`, `orange`, `yellow`, `green` for state. Borders and surfaces rely on soft translucency and ring-based delineation (`white/10`, `black/10`, gray ramps) for depth without visual noise.

**Key Characteristics:**

- Dark-first core: `gray-950` canvas, `gray-900` panel layers, `gray-800` elevated surfaces
- IBM Plex Sans + IBM Plex Mono (from `--font-sans` / `--font-mono`)
- Weight hierarchy: 400 (reading), 500 (UI emphasis), 600–700 (strong emphasis)
- Brand-first interaction using `brand-*` tokens, not ad-hoc colors
- Semi-transparent border/ring treatments for structure (`white/10`, `black/10`, gray ramps)
- Reusable Vue component wrappers + Reka UI primitives as the foundation
- Semantic status colors: `green` (success), `yellow` (pending), `orange` (warning), `red` (destructive/error)

## 2. Color Palette & Roles

### Canonical Hex Tokens

These values are the canonical palette derived from `resources/css/app.css` in `repli-cms` and mirrored in this repository.

**Neutrals**

- `white`: `#EAEAEA`
- `black`: `#111111`
- `gray-50`: `#ECEEEE`
- `gray-100`: `#CED5D5`
- `gray-200`: `#C9CBCC`
- `gray-300`: `#C2C4C4`
- `gray-400`: `#A6A7A7`
- `gray-500`: `#7F8282`
- `gray-600`: `#3D3F3F`
- `gray-700`: `#323333`
- `gray-800`: `#222323`
- `gray-900`: `#1D1E1E`
- `gray-950`: `#171717`

**Brand**

- `brand-50`: `#59EDFC`
- `brand-100`: `#3FE6F5`
- `brand-200`: `#3AD4E2`
- `brand-300`: `#34C5D2`
- `brand-400`: `#2EB3BF`
- `brand-500`: `#29A2AD`
- `brand-600`: `#238B95`
- `brand-700`: `#1D757E`
- `brand-800`: `#135E64`
- `brand-900`: `#0D494F`
- `brand-950`: `#0C3F44`

**Semantic**

- Success: `green-600` `#00A63E`, `green-700` `#008236`
- Warning: `orange-600` `#CF5C0A`, `orange-700` `#AC4B07`
- Pending: `yellow-600` `#CA9500`, `yellow-700` `#A67A00`
- Error: `red-600` `#C21D26`, `red-700` `#A3171E`

### Background Surfaces

- **Canvas Base** (`gray-950` / `#171717`): Deepest background for app shell and immersive dark sections.
- **Panel Base** (`gray-900` / `#1D1E1E`): Sidebar/panel containers and section framing.
- **Elevated Surface** (`gray-800` / `#222323`): Cards, overlays, and raised modules.
- **Soft Surface** (`white/85` light, `gray-950/75` dark): Floating menus and translucent overlays.

### Text & Content

- **Primary Text** (`gray-900` `#1D1E1E` light / `gray-100` `#CED5D5` dark): Main labels, titles, body copy.
- **Secondary Text** (`gray-600` `#3D3F3F` light / `gray-300` `#C2C4C4` dark): Descriptions and helper copy.
- **Tertiary Text** (`gray-500` `#7F8282` light / `gray-400` `#A6A7A7` dark): Metadata, placeholders.
- **Quaternary Text** (`gray-400` `#A6A7A7` light / `gray-500` `#7F8282` dark): Subtle labels and low-priority details.

### Brand & Accent

- **Brand Primary** (`brand-800` / `#135E64`): Primary action background and high-intent CTAs.
- **Brand Interactive** (`brand-600` `#238B95` / `brand-500` `#29A2AD`): Focus ring and active interaction states.
- **Brand Subtle** (`brand-400/10` from `#2EB3BF`): Soft highlighted backgrounds and contextual accents.
- **Brand Deep** (`brand-950` / `#0C3F44`): Tinted featured surfaces in dark contexts.

### Status Colors

- **Success** (`green-600` `#00A63E` / `green-700` `#008236`): Positive confirmation, published/approved states.
- **Warning** (`orange-600` `#CF5C0A` / `orange-700` `#AC4B07`): Caution and warning states.
- **Pending** (`yellow-600` `#CA9500` / `yellow-700` `#A67A00`): In-review and pending statuses.
- **Error/Destructive** (`red-600` `#C21D26` / `red-700` `#A3171E`): Failure, danger, destructive actions.

### Border & Divider

- **Border Light** (`gray-200` `#C9CBCC`, `gray-300` `#C2C4C4`): Light mode field and panel outlines.
- **Border Dark** (`gray-600` `#3D3F3F`, `gray-700` `#323333`): Dark mode field and panel outlines.
- **Ring Subtle** (`ring-black/10`, `ring-white/10`): Overlay/card delineation.
- **Divider** (`gray-100` `#CED5D5` light / `gray-700` `#323333` dark): Section separators.

### Light Mode Neutrals (for light theme contexts)

- **Light Background** (`white` / `#EAEAEA`)
- **Light Surface** (`gray-50` `#ECEEEE`, `gray-100` `#CED5D5`)
- **Light Border** (`gray-200` `#C9CBCC`, `gray-300` `#C2C4C4`)
- **Text Strong** (`gray-900` / `#1D1E1E`)
- **Text Muted** (`gray-600` / `#3D3F3F`)

### Overlay

- **Overlay Primary** (`black/75` to `black/80`): Modal/dialog backdrop for focus isolation.

## 3. Typography Rules

### Font Family

| Token          | Family         | Role                                     |
| -------------- | -------------- | ---------------------------------------- |
| `--font-sans`  | IBM Plex Sans  | UI copy, body text, navigation, labels   |
| `--font-serif` | IBM Plex Serif | Headings (`Heading.vue`), form inputs    |
| `--font-mono`  | IBM Plex Mono  | Code blocks, keyboard hints, tech labels |

**CSS tokens:**

```css
--font-sans: "IBM Plex Sans", ui-sans-serif, system-ui, sans-serif;
--font-serif: "IBM Plex Serif", ui-serif, Georgia, serif;
--font-mono: "IBM Plex Mono", ui-monospace, SFMono-Regular, Menlo, monospace;
--heading-font-family: var(--font-serif);
```

**OpenType Features**: Use defaults from IBM Plex variable setup in `app.css` (cv01, ss03 on Sans).

### Hierarchy

| Role           | Font           | Size           | Weight | Line Height | Letter Spacing | Notes                                 |
| -------------- | -------------- | -------------- | ------ | ----------- | -------------- | ------------------------------------- |
| Display XL     | IBM Plex Sans  | 56px (3.50rem) | 700    | 1.00        | -0.04em        | Hero marketing emphasis               |
| Display Large  | IBM Plex Sans  | 48px (3.00rem) | 700    | 1.00        | -0.03em        | Primary section hero                  |
| Display        | IBM Plex Sans  | 40px (2.50rem) | 600    | 1.05        | -0.02em        | Section headlines                     |
| Heading 1      | IBM Plex Serif | 32px (2.00rem) | 700    | 1.10        | -0.025em       | Major section titles (`Heading.vue`)  |
| Heading 2      | IBM Plex Serif | 24px (1.50rem) | 700    | 1.25        | -0.015em       | Sub-section headings (`Heading.vue`)  |
| Heading 3      | IBM Plex Serif | 20px (1.25rem) | 600    | 1.33        | -0.01em        | Card and module headings              |
| Body Large     | IBM Plex Sans  | 18px (1.13rem) | 400    | 1.55        | normal         | Introductory copy                     |
| Body Emphasis  | IBM Plex Sans  | 17px (1.06rem) | 500    | 1.50        | normal         | Emphasized body lines                 |
| Body           | IBM Plex Sans  | 16px (1.00rem) | 400    | 1.50        | normal         | Standard content                      |
| Body Medium    | IBM Plex Sans  | 16px (1.00rem) | 500    | 1.50        | normal         | Navigation and controls               |
| Body Semibold  | IBM Plex Sans  | 16px (1.00rem) | 600    | 1.50        | normal         | Strong emphasis                       |
| Small          | IBM Plex Sans  | 15px (0.94rem) | 400    | 1.50        | normal         | Secondary body                        |
| Small Medium   | IBM Plex Sans  | 15px (0.94rem) | 500    | 1.50        | normal         | Emphasized small text                 |
| Small Semibold | IBM Plex Sans  | 15px (0.94rem) | 600    | 1.50        | normal         | Strong small text                     |
| Small Light    | IBM Plex Sans  | 15px (0.94rem) | 400    | 1.47        | normal         | De-emphasized copy                    |
| Caption Large  | IBM Plex Sans  | 14px (0.88rem) | 500    | 1.40        | normal         | Sub-labels, categories                |
| Caption        | IBM Plex Sans  | 13px (0.81rem) | 400    | 1.40        | normal         | Metadata, timestamps                  |
| Label          | IBM Plex Sans  | 12px (0.75rem) | 500    | 1.40        | normal         | Buttons and micro labels              |
| Micro          | IBM Plex Sans  | 11px (0.69rem) | 500    | 1.30        | normal         | Tiny labels                           |
| Tiny           | IBM Plex Sans  | 10px (0.63rem) | 500    | 1.30        | normal         | Overline text                         |
| Link Large     | IBM Plex Sans  | 16px (1.00rem) | 500    | 1.50        | normal         | Primary links                         |
| Link Medium    | IBM Plex Sans  | 15px (0.94rem) | 500    | 1.50        | normal         | Navigation links                      |
| Link Small     | IBM Plex Sans  | 14px (0.88rem) | 500    | 1.40        | normal         | Compact links                         |
| Link Caption   | IBM Plex Sans  | 13px (0.81rem) | 500    | 1.40        | normal         | Footer/meta links                     |
| Mono Body      | IBM Plex Mono  | 14px (0.88rem) | 400    | 1.50        | normal         | Code and technical blocks             |
| Mono Caption   | IBM Plex Mono  | 13px (0.81rem) | 400    | 1.40        | normal         | Code labels                           |
| Mono Label     | IBM Plex Mono  | 12px (0.75rem) | 500    | 1.40        | normal         | Keyboard and compact technical labels |

### Heading.vue Scale

All headings rendered via `Heading.vue` use `font-serif` (IBM Plex Serif). The `level` prop controls visual size independently of the semantic element.

| Level | Tailwind classes                                        |
| ----- | ------------------------------------------------------- |
| 1     | `text-4xl font-bold tracking-[-0.025em] leading-tight`  |
| 2     | `text-2xl font-bold tracking-[-0.015em] leading-snug`   |
| 3     | `text-xl font-semibold tracking-[-0.01em] leading-snug` |
| 4     | `text-lg font-semibold leading-snug`                    |
| 5     | `text-base font-medium leading-normal`                  |
| 6     | `text-sm font-medium leading-normal`                    |

When `level` is omitted, only `font-serif` is added — the caller controls sizing (used for marketing sections with responsive classes).

Applied via `@layer base`: `input` (excl. checkbox/radio/range), `textarea`, and `select` also use `font-serif`.

### Principles

- **Practical emphasis**: 500 is the primary UI emphasis weight.
- **Readable density**: 13–16px dominates operational interfaces.
- **Dark-safe contrast**: text roles use gray ramps to avoid eye strain.
- **Serif headings**: all heading elements use IBM Plex Serif via `Heading.vue`.
- **Mono separation**: IBM Plex Mono is reserved for technical/utility contexts.

## 4. Component Stylings

### Buttons

**Ghost Button (Default)**

- Background: `transparent` (hover `gray-100` light / `gray-800` dark)
- Text: `gray-700` light / `gray-300` dark
- Padding: size-driven (`xs` to `xl`)
- Radius: `rounded-sm` to `rounded-md`
- Border: none
- Focus: outline ring on brand
- Use: Secondary actions

**Subtle Button**

- Background: low-contrast neutral (`gray-100` light / `gray-700` dark)
- Text: `gray-700` light / `gray-300` dark
- Padding: compact
- Radius: `rounded-sm`
- Use: Toolbar/context actions

**Primary Brand Button**

- Background: `brand-800` (hover `brand-900`)
- Text: `white`
- Padding: size-driven from component scale
- Radius: `rounded` or `rounded-md`
- Use: Primary CTAs

**Icon Button (Circle)**

- Background: neutral translucent
- Text: neutral foreground
- Radius: circular in icon-only contexts
- Border: subtle neutral ring
- Use: Utility icon actions

**Pill Button**

- Background: transparent or low-opacity tint
- Text: semantic/neutral role color
- Padding: compact horizontal
- Radius: `9999px`
- Border: subtle neutral border
- Use: Filters, chips, status toggles

**Small Toolbar Button**

- Background: subtle neutral
- Text: muted neutral
- Radius: micro/comfortable
- Border: subtle ring
- Font: compact label
- Use: Dense toolbar controls

### Cards & Containers

- Background: neutral solid/tinted (`white`, `gray-800/900`, semantic 950 tints)
- Border/ring: neutral outlines (`gray-200/300` light, `gray-700/white-10` dark)
- Radius: `rounded-md` baseline (`--border-radius`)
- Shadow: restrained, mostly ring + subtle shadow
- Hover: subtle contrast step

### Inputs & Forms

**Text Area**

- Background: `form-field-base` tokenized field background
- Text: field foreground token
- Border/outline: tokenized outline (`gray` ramps)
- Padding: tokenized via `--spacing`
- Radius: `--border-radius`

**Search Input**

- Background: transparent in command/search contexts
- Text: primary foreground by mode
- Padding: icon-aware left padding

**Button-style Input**

- Text: secondary/tertiary neutral
- Padding: compact
- Radius: comfortable
- Focus: brand outline/ring

### Badges & Pills

**Success Pill**

- Background: green semantic token
- Text: light foreground
- Radius: rounded/pill based on component mode
- Font: compact label
- Use: Success/live indicators

**Neutral Pill**

- Background: neutral subtle tint or transparent
- Text: neutral foreground
- Padding: compact
- Radius: `9999px`
- Border: subtle neutral
- Use: Tags and chips

**Subtle Badge**

- Background: low-opacity semantic/neutral tint
- Text: semantic/neutral foreground
- Padding: compact
- Radius: compact rounded
- Border: optional inset ring
- Font: compact label
- Use: Inline status labels

### Navigation

- Dark panel-compatible shell with neutral contrast
- Brand identity left-aligned
- Links at compact UI sizes with medium emphasis
- Active/hover states increase contrast
- Primary CTA uses brand variant
- Mobile uses collapse pattern
- Search trigger uses command palette (`Cmd+K`)

### Image Treatment

- Content previews use subtle border/ring framing
- Rounded top corners for featured previews
- Neutral shadows and contrast-safe edges

## 5. Layout Principles

### Spacing System

- Base unit: `4px` (`--spacing: 0.25rem`)
- Rhythm: `4px, 8px, 12px, 16px, 24px, 32px`
- Dense CMS UI still preserves touch-accessible control spacing

### Grid & Container

- Typical content constraints around dashboard/editor widths
- Hero/marketing can use centered single-column composition
- Feature/content panels scale to 2–3 columns on desktop
- Management flows favor readable single-column tables/lists where needed

### Whitespace Philosophy

- Darkness and neutral contrast create separation in dark mode.
- Dense interfaces rely on spacing rhythm, not heavy decoration.
- Sections separate through spacing and divider tones, not harsh lines.

### Border Radius Scale

- Micro: 2px
- Standard: 4px
- Comfortable: 6px
- Card: 8px
- Panel: 12px
- Full Pill: 9999px
- Circle: 50%

## 6. Depth & Elevation

| Level              | Treatment                                       | Use                     |
| ------------------ | ----------------------------------------------- | ----------------------- |
| Flat (Level 0)     | Base neutral canvas (`gray-950` / white)        | Page background         |
| Subtle (Level 1)   | Minimal shadow + neutral contrast step          | Toolbar buttons         |
| Surface (Level 2)  | Neutral/tinted bg + subtle border/ring          | Cards, fields           |
| Inset (Level 2b)   | Mild inset effect where needed                  | Recessed controls       |
| Ring (Level 3)     | Ring-based delineation (`black/10`, `white/10`) | Floating containers     |
| Elevated (Level 4) | Soft shadow + ring                              | Dropdowns, popovers     |
| Dialog (Level 5)   | Dark overlay + elevated panel                   | Modals, command palette |
| Focus              | Brand outline/ring treatment                    | Keyboard focus          |

**Shadow Philosophy**: Papevi CMS prioritizes ring contrast, neutral luminance shifts, and semantic color discipline over heavy shadow stacks. Elevation is communicated by background step, outline/ring clarity, and restrained shadows.

## 7. Do's and Don'ts

### Do

- Use IBM Plex Sans / IBM Plex Serif / IBM Plex Mono from `app.css`
- Use `Heading.vue` for all heading elements — never raw `h1`–`h6`
- Use only project color families: `gray`, `brand`, `red`, `orange`, `yellow`, `green`
- Prefer existing variants/components before creating custom styling
- Keep dark and light mode behavior in parity
- Use semantic variants for status and action intent
- Use brand colors for interaction/focus/primary CTA

### Don't

- Don’t introduce unsupported palettes (blue, sky, cyan, purple, slate, arbitrary values)
- Don’t hardcode one-off styling where component variants exist
- Don’t bypass shared primitives for buttons, cards, badges, and form fields
- Don’t ship mode-incomplete UI (light-only or dark-only styling)
- Don’t overuse decorative shadows where ring/contrast is sufficient

## 8. Responsive Behavior

### Breakpoints

| Name          | Width       | Key Changes                           |
| ------------- | ----------- | ------------------------------------- |
| Mobile Small  | <600px      | Single column, compact spacing        |
| Mobile        | 600–640px   | Standard mobile stack                 |
| Tablet        | 640–768px   | Two-column opportunities begin        |
| Desktop Small | 768–1024px  | Full panel grids and wider nav        |
| Desktop       | 1024–1280px | Standard app desktop density          |
| Large Desktop | >1280px     | Increased spacing and expanded panels |

### Touch Targets

- Buttons keep comfortable height across sizes
- Compact controls remain tappable in dense toolbars
- Chips/pills preserve horizontal padding for touch
- Icon actions maintain accessible hit areas
- Command/search trigger stays prominent

### Collapsing Strategy

- Display headings scale down by breakpoint
- Navigation compresses to mobile menu patterns
- Grid layouts collapse 3 → 2 → 1 columns
- Table/list density adapts with overflow and stacking support
- Section spacing reduces on smaller viewports

### Image Behavior

- Preview cards maintain border/ring treatment responsively
- Featured visuals preserve radius and aspect integrity
- Dark backgrounds maintain stable contrast across sizes

## 9. Agent Prompt Guide

### Quick Color Reference

- Primary CTA: `brand-800` `#135E64` / `brand-900` `#0D494F`
- App Background: `gray-950` `#171717`
- Panel Background: `gray-900` `#1D1E1E`
- Elevated Surface: `gray-800` `#222323`
- Heading text: `gray-100` `#CED5D5` (dark) / `gray-900` `#1D1E1E` (light)
- Body text: `gray-300` `#C2C4C4` (dark) / `gray-600` `#3D3F3F` (light)
- Muted text: `gray-400` `#A6A7A7`
- Border (default): `gray-700` `#323333` dark / `gray-200` `#C9CBCC` light
- Focus ring: `brand-500` `#29A2AD` (light) / `brand-400` `#2EB3BF` (dark)

### Example Component Prompts

- "Create a hero section for Papevi CMS using `gray-950` background, IBM Plex Sans heading, and brand CTA (`brand-800`, hover `brand-900`) with an outline secondary button."
- "Design a card with neutral elevated surface, subtle ring, compact heading, and secondary descriptive copy using gray text ramps."
- "Build a pill badge using semantic status colors (`green`, `yellow`, `orange`, `red`) with compact spacing and rounded-full shape."
- "Create navigation with dark panel shell, compact medium-weight links, and a right-aligned brand CTA."
- "Design a command palette with dark overlay, elevated neutral panel, tokenized input styling, and keyboard hint footer using IBM Plex Mono."

### Iteration Guide

1. Start from existing components in `resources/js/components`.
2. Use only tokenized colors from `app.css`.
3. Keep semantic mapping: brand=primary, green=success, yellow=pending, orange=warning, red=danger.
4. Ensure dual-mode parity for every interactive and content surface.
5. Prefer ring/contrast depth over heavy decorative shadowing.
6. Keep typography IBM Plex-based with practical operational scales.
7. Preserve accessibility with focus-visible states and keyboard-friendly interactions.
