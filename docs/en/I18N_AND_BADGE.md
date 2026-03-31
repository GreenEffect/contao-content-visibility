## Internationalization (i18n) & badge

### Why a “multi-language label system”?
Some pieces of information displayed in back end listings (e.g. a “badge” added by a callback) are not automatically translated by Contao.

This bundle uses **language keys** in `tl_content.php` to make the badge translatable.

### Language keys
In `contao/languages/<lang>/tl_content.php`:
- `content_visibility_badge_label`
- `content_visibility_badge_groups` (expects a `%s` placeholder with the group list)
- `content_visibility_badge_some_groups`

Included languages:
- **FR**: `contao/languages/fr/tl_content.php`
- **EN**: `contao/languages/en/tl_content.php`
- **DE**: `contao/languages/de/tl_content.php`

### Badge styling
The badge is rendered with the CSS class:
- `.content-visibility-badge`

The CSS is loaded in the back end via:
- `contao/config/config.php` → `bundles/contaocontentvisibility/backend.css`

You can override the styling in your project if needed.

