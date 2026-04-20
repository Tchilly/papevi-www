# Design System Inspired by Linear

## 1. Visual Theme & Atmosphere

Papevi CMS is a dark-first product interface built for dense editorial workflows. The canvas is deep neutral gray (`gray-950`/`gray-900`) where content layers emerge through subtle luminance steps, translucent surfaces, and low-contrast borders. This is not a light UI inverted into dark mode; darkness is the default medium and visual hierarchy is controlled through neutral opacity, structured spacing, and semantic accents.

The typography system is built on IBM Plex families from `app.css`: `IBM Plex Serif` for headings (H1–H4) and form inputs, `IBM Plex Sans` for UI/content, and `IBM Plex Mono` for technical labels and keyboard hints. Weight usage follows product conventions (400 reading, 500 UI emphasis, 600–700 section emphasis) with clear, practical text scales optimized for management interfaces.

The color system remains tightly constrained to Papevi tokens from `app.css`: neutral `gray-*` for structure, `brand-*` for primary interaction, and semantic `red`, `orange`, `yellow`, `green` for state. The brand palette is a warm coral/salmon (OKLCH hue ≈22), providing energetic contrast against the neutral dark canvas without competing with status colors. Borders and surfaces rely on soft translucency and ring-based delineation (`white/10`, `black/10`, gray ramps) for depth without visual noise.

**Key Characteristics:**

- Dark-first core: `gray-950` canvas, `gray-900` panel layers, `gray-800` elevated surfaces
- IBM Plex Serif for headings + form inputs (from `--font-serif` / `--heading-font-family`)
- IBM Plex Sans + IBM Plex Mono for UI/content and technical contexts (from `--font-sans` / `--font-mono`)
- Weight hierarchy: 400 (reading), 500 (UI emphasis), 600–700 (strong emphasis)
- Warm coral/salmon brand accent (`brand-*` OKLCH hue ≈22) for primary interaction — energetic on dark, accessible on light
- Semi-transparent border/ring treatments for structure (`white/10`, `black/10`, gray ramps)
- Reusable Vue component wrappers + Reka UI primitives as the foundation
- Semantic status colors: `green` (success), `yellow` (pending), `orange` (warning), `red` (destructive/error)

## 2. Color Palette & Roles

### Background Surfaces

- **Canvas Base** (`gray-950`): Deepest background for app shell and immersive dark sections.
- **Panel Base** (`gray-900`): Sidebar/panel containers and section framing.
- **Elevated Surface** (`gray-800`): Cards, overlays, and raised modules.
- **Soft Surface** (`white/85` light, `gray-950/75` dark): Floating menus and translucent overlays.

### Text & Content

- **Primary Text** (`gray-900` light / `gray-100` dark): Main labels, titles, body copy.
- **Secondary Text** (`gray-600` light / `gray-300` dark): Descriptions and helper copy.
- **Tertiary Text** (`gray-500` light / `gray-400` dark): Metadata, placeholders.
- **Quaternary Text** (`gray-400` light / `gray-500` dark): Subtle labels and low-priority details.

### Brand & Accent

Brand palette is coral/salmon (OKLCH hue ≈22) — warm and expressive against the dark neutral canvas.

- **Brand Primary** (`brand-700` / `brand-800`): Button background and high-intent CTAs. `brand-700` (L=0.485) achieves ≥4.5:1 against white text.
- **Brand Interactive** (`brand-600` / `brand-500`): Focus rings and active interaction accents in light mode.
- **Brand Subtle** (`brand-400/10`): Soft highlighted backgrounds and contextual accents.
- **Brand Deep** (`brand-950`): Tinted featured surfaces in dark contexts.
- **Brand Light Ring** (`brand-300`): Focus ring in dark mode (high contrast against `gray-900`/`gray-950`).

### Status Colors

- **Success** (`green-600` / `green-700`): Positive confirmation, published/approved states. OKLCH hue ≈148 (natural green), mellow chroma (C500=0.158). `green-700` (L=0.435) safe for white text at ≥4.5:1.
- **Warning** (`orange-600` / `orange-700`): Caution and warning states. OKLCH hue ≈56 (warm amber-orange), mellow chroma (C500=0.162). `orange-700` (L=0.448) safe for white text at ≥4.5:1.
- **Pending** (`yellow-600` / `yellow-700`): In-review and pending statuses. OKLCH hue ≈92 (yellow-green), mellow chroma (C500=0.155). `yellow-700` (L=0.555) for text-on-light contexts; pair with dark text on light backgrounds.
- **Error/Destructive** (`red-600` / `red-700`): Failure, danger, destructive actions. "Deep Rausch" palette anchored on `#e00b41` (OKLCH hue ≈20, hot rose-red), mellow chroma (C500=0.190). `red-700` (L=0.405) safe for white text at ≥4.5:1.

### Border & Divider

- **Border Light** (`gray-200`, `gray-300`): Light mode field and panel outlines.
- **Border Dark** (`gray-600`, `gray-700`): Dark mode field and panel outlines.
- **Ring Subtle** (`ring-black/10`, `ring-white/10`): Overlay/card delineation.
- **Divider** (`gray-100` light / `gray-700` dark): Section separators.

### Light Mode Neutrals (for light theme contexts)

- **Light Background** (`white`)
- **Light Surface** (`gray-50`, `gray-100`)
- **Light Border** (`gray-200`, `gray-300`)
- **Text Strong** (`gray-900`)
- **Text Muted** (`gray-600`)

### Overlay

- **Overlay Primary** (`black/75` to `black/80`): Modal/dialog backdrop for focus isolation.

## 3. Typography Rules

### Font Family

- **Primary**: `IBM Plex Sans`, with fallbacks from `--font-sans`
- **Serif / Headings**: `IBM Plex Serif`, with fallbacks from `--font-serif` (referenced via `--heading-font-family`)
- **Monospace**: `IBM Plex Mono`, with fallbacks from `--font-mono`
- **OpenType Features**: IBM Plex static files per weight; no variable font axes in use.

### Hierarchy

| Role           | Font           | Size           | Weight | Line Height | Letter Spacing | Notes                                 |
| -------------- | -------------- | -------------- | ------ | ----------- | -------------- | ------------------------------------- |
| Display XL     | IBM Plex Serif | 56px (3.50rem) | 500    | 1.06        | -0.02em        | Hero marketing emphasis               |
| Display Large  | IBM Plex Serif | 48px (3.00rem) | 500    | 1.08        | -0.02em        | Primary section hero                  |
| Display        | IBM Plex Serif | 40px (2.50rem) | 500    | 1.12        | -0.01em        | Section headlines                     |
| Heading 1      | IBM Plex Serif | 32px (2.00rem) | 600    | 1.18        | -0.01em        | Major section titles                  |
| Heading 2      | IBM Plex Serif | 24px (1.50rem) | 500    | 1.30        | normal         | Sub-section headings                  |
| Heading 3      | IBM Plex Serif | 20px (1.25rem) | 500    | 1.33        | normal         | Card and module headings              |
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

### Principles

- **Practical emphasis**: 500 is the primary UI emphasis weight.
- **Readable density**: 13–16px dominates operational interfaces.
- **Dark-safe contrast**: text roles use gray ramps to avoid eye strain.
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

- Background: `brand-700` (hover `brand-800`) — coral/salmon
- Text: `white` (4.5:1+ contrast at `brand-700` L=0.485)
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

**General**: All form inputs (excluding checkbox, radio, range), textarea, and select use `IBM Plex Serif` (`--font-serif`) via `@layer base` in `app.css`.

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

- Use IBM Plex Serif for headings and form inputs, IBM Plex Sans / IBM Plex Mono from `app.css` for UI and technical contexts
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

- Primary CTA: `brand-700` (bg) / `brand-800` (hover) — coral/salmon, OKLCH hue ≈22
- App Background: `gray-950`
- Panel Background: `gray-900`
- Elevated Surface: `gray-800`
- Heading text: `gray-100` (dark) / `gray-900` (light)
- Body text: `gray-300` (dark) / `gray-600` (light)
- Muted text: `gray-400`
- Border (default): `gray-700` dark / `gray-200` light
- Focus ring (light): `brand-600` / `brand-500`
- Focus ring (dark): `brand-300`

### Example Component Prompts

- "Create a hero section for Papevi CMS using `gray-950` background, IBM Plex Serif heading, and brand CTA (`brand-700` bg, hover `brand-800`) with an outline secondary button."
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
