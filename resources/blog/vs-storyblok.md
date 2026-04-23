---
title: "Papevi vs Storyblok: Visual Editor vs Workflow-First CMS"
description: "Storyblok is the visual headless CMS with a live preview editor loved by marketing teams. Papevi brings structured editorial workflow, compliance controls, and multi-site governance. Here is the full comparison."
date: "2026-04-20"
category: comparison
author: Papevi Team
reading_time: 9
---

Storyblok built its reputation on the visual editor — a live preview panel that lets marketers and editors see exactly how their content will look on the page as they type. For teams where the bridge between content and visual presentation is important, this is a genuinely compelling feature.

Papevi is designed around a different use case: structured content with editorial workflow, approval routing, and compliance controls. The two products serve overlapping but distinct audiences.

## Quick comparison

| Feature | Papevi | Storyblok |
|---|---|---|
| Pricing | From €39/month | Free tier, from $23/month |
| Visual preview editor | No | Yes — core feature |
| Component library (blocks) | Structured fields | Visual block editor |
| REST API | Yes | Yes |
| GraphQL | No | Yes |
| Editorial workflow | From Scale (€199/mo) | Available on Team+ plans |
| Approval routing | Included | Enterprise |
| Audit log | Included from Scale | Team+ plans |
| Multi-site / spaces | Included from Scale | Per-space pricing model |
| GDPR / EU data residency | EU by default | EU available |
| Digital Asset Management | Full DAM (variants, GDPR, licences) | Built-in image CDN, no licence / GDPR controls |
| Branching / staging | Roadmap | Content staging available |

## The visual editor

Storyblok's live visual editor is its defining product feature. Editors work in a split-screen or side-by-side interface where changes appear rendered in the actual frontend as they type. For marketing teams that want to see the exact output — layout, typography, imagery — before publishing, this reduces back-and-forth with developers significantly.

The tradeoff is architectural. Storyblok's content model is built around composable visual blocks, which works beautifully for page-building use cases but can create complexity for deeply structured content models with multiple content types, relationships, and validation requirements.

Papevi does not currently offer a visual preview editor. Content is edited in a structured form interface. A visual preview pane is on the roadmap. For teams whose content is data-driven or API-served across multiple surfaces (website, app, digital signage, email), the absence of a live preview editor is often not a blocker.

**Bottom line:** If your primary publisher persona is a marketer building visual pages, Storyblok's editor is a meaningful advantage. If your content is structured data consumed across multiple channels, the visual editor matters less.

## Editorial workflow

Storyblok introduced workflow states in its Team plan, and approval management in Enterprise. These cover the basic content lifecycle needs for most teams, though approval routing and review stage configuration require Enterprise pricing.

Papevi's editorial workflow is designed as a first-class feature. Draft → review → approved → published, configurable approval routing, inline comment threads, scheduled publish and unpublish, and revision history with one-click restore are all available on the Scale plan at €199/month. No Enterprise conversation required.

**Bottom line:** For teams with multi-stakeholder review requirements and publishing deadlines, Papevi provides more workflow structure at a lower price point.

## Content modelling

Storyblok's block and component system is ideal for page-building — marketers can compose pages from pre-built visual components, and the structure enforces a component-based architecture. The field types cover most requirements, though complex nested relationships between content types can be harder to manage.

Papevi provides a traditional content type builder with field-level validation, relationship fields, conditional logic, and required fields. It maps well to editorial content structures: articles, product pages, author profiles, taxonomy, media.

**Bottom line:** Storyblok is better suited to visual page-building CMS use cases. Papevi is better suited to structured editorial content with defined types and relationships.

## Multi-site

Storyblok uses a spaces model. Each site or locale is typically a separate space. Pricing applies per space. Larger multi-site implementations can become expensive as the space count grows.

Papevi's Scale plan (€199/month) includes multi-site management within a single subscription. Sites share a content model and user base with configurable per-site permissions.

**Bottom line:** For organisations running five or more sites, Papevi's multi-site inclusion in the Scale plan is significantly more cost-effective than Storyblok's per-space model.

## Images and media

Storyblok includes its own image CDN and transformation pipeline — automatic optimisation, resizing, and format conversion on the fly. This is excellent for marketing teams working with heavy visual content and wanting minimal frontend image handling.

Papevi handles media storage and delivery via standard CDN without on-the-fly transformation built in. Image transformation integrations (Imgix, Cloudinary) are available via the API.

**Bottom line:** Storyblok's built-in image CDN is convenient for image-heavy marketing sites. Teams already using a dedicated image CDN will not notice the difference.

## Compliance and pricing

Both platforms are GDPR-compliant. Storyblok has EU infrastructure options. Papevi stores all data in the EU by default across all plans.

Storyblok's per-space pricing can scale unpredictably for larger organisations. Papevi's flat-rate Scale plan covers unlimited sites, users, and content types.

**Bottom line:** Regulated organisations get EU data residency on Papevi without an Enterprise upgrade. Multi-site organisations get more predictable pricing on Papevi's flat-rate Scale plan.

## Digital Asset Management

Storyblok includes a built-in image CDN and transformation pipeline. Images can be resized, cropped, and reformatted on the fly via URL parameters — convenient for marketing teams building visual pages. There is no licence management system, no per-person GDPR consent tracking, and no asset-level retention policies.

Papevi ships a full DAM as part of the platform:

- **Automatic image processing** — WebP and AVIF variants generated on upload at site-configured quality, with Spatie optimisers reducing file size a further 20–40%
- **Named variants** — per-site size presets returned in the API `variants` map, ready for `<picture>` or `srcset` without URL hacking
- **GDPR consent per person** — track individuals appearing in photos, record consent, set retention expiry, action right-to-be-forgotten requests through the admin review queue
- **Licence management** — CC0, CC-BY, CC-BY-NC, proprietary, and custom licence types per asset, with commercial use and derivative work restrictions
- **Folder structure and bulk upload** — with a media picker embedded in the page editor, not a separate tab

**Bottom line:** Storyblok's image CDN is better for visual page-building use cases that rely on on-the-fly transforms. Papevi's DAM is the stronger choice when asset governance, licence compliance, and GDPR controls are requirements.

## When to choose Papevi

- Editorial workflow and approval routing are requirements
- Multi-site governance at scale needs to be cost-effective
- Content is structured data served to multiple surfaces, not visual page-building
- EU data residency and GDPR compliance must be provable without an Enterprise contract

## When Storyblok might be the right choice

- Marketing teams need a live visual editor to work independently
- Your use case is primarily page-building with composable visual blocks
- You need the built-in image CDN and transformation pipeline
- Your content structure maps well to the block/component model

---

Papevi is currently in public beta. [Sign up for early access](/#beta) — no credit card required.
