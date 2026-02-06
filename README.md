# HamroNiti WordPress Theme (Classic)

This theme is based on the demo UI design and turns it into dynamic WordPress templates (posts, categories, search, author pages).

## Quick install
1. Copy the folder `wp-content/themes/hamroniti/` into your WordPress site.
2. In WP Admin: **Appearance → Themes → HamroNiti → Activate**.

## Content setup (recommended for demo)
- Create **at least 8 Posts** with:\n
  - Featured Image (optional but recommended)\n
  - Categories (create categories like Policy, Economy, Tech, Society)\n
  - Excerpts (or WP will auto-generate)
- Mark **one post as Sticky** (it becomes the homepage “Featured Story”).\n
  WP Admin: Posts → Quick Edit → “Make this post sticky”

## Smoke test checklist (prevents regressions)
- Home (`front-page.php`)\n
  - Hero section renders\n
  - Trending Topics chips show top categories\n
  - Featured Story shows sticky post (or latest if none)\n
  - Latest Articles list excludes the featured post\n
- Primary navigation\n
  - If a menu is assigned to “Primary Menu”, it appears in the header (desktop) and drawer (mobile)\n
  - Menu button opens/closes the drawer on mobile; Esc closes it\n
  - On desktop (≥1024px), hamburger is hidden and the top nav is used instead\n
- Single post (`single.php`)\n
  - Title + date + author + reading time renders\n
  - Reading progress bar moves when you scroll\n
- Archives (`archive.php`)\n
  - Category page shows list + pagination\n
- Search (`search.php`)\n
  - `/ ?s=keyword` shows results + pagination\n
- Author (`author.php`)\n
  - Author name, bio (if set), and post list\n
- Static pages (`page.php`)\n
  - About/Contact renders with site chrome\n
- 404 (`404.php`)\n
  - Missing page shows “Back to Home” button

## Footer checklist
- Footer shows brand + description text\n
- Social icons (Facebook/Instagram/TikTok/LinkedIn) render and are clickable\n
  - Icons render without needing Font Awesome (inline SVG)\n
  - Icons have hover state (color change / subtle background)\n

## Responsive / Desktop checklist (desktop optimization)
- Desktop widths (test at ~1024px and ~1280px)\n
  - Content is no longer capped to a narrow 480px “mobile shell”\n
  - Bottom nav is hidden at desktop widths (it’s mobile-only UI)\n
  - Post lists switch to a 2-column grid on tablet+ and 3-column grid on large desktop\n
  - Hero text and spacing scale up appropriately (no tiny typography on desktop)\n
  - Single/page content stays readable (line length constrained; not full-bleed)\n
- Mobile widths (test at ~375px)\n
  - Bottom nav is visible and does not overlap content\n
  - Lists remain single-column and readable

## Notes
- “Saved” and “Profile” in the bottom nav are **placeholders** in v1.\n
  If you want real Saved posts, we can integrate a bookmark plugin or build a simple custom feature.

