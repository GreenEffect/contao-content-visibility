## Internationalisation (i18n) et badge

### Pourquoi un “système de label multi-langue” ?
Certaines informations affichées dans les listes backend (ex: “badges” ajoutés par callback) ne passent pas automatiquement par les fichiers de langue Contao.

Ce bundle utilise donc des **clés de langue** dans `tl_content.php` pour rendre le badge traduisible.

### Clés de langue utilisées
Dans `contao/languages/<lang>/tl_content.php`:
- `content_visibility_badge_label`
- `content_visibility_badge_groups` (attend un `%s` avec la liste des groupes)
- `content_visibility_badge_some_groups`

Langues incluses:
- **FR**: `contao/languages/fr/tl_content.php`
- **EN**: `contao/languages/en/tl_content.php`
- **DE**: `contao/languages/de/tl_content.php`

### Style du badge
Le badge est rendu avec la classe CSS:
- `.content-visibility-badge`

Le CSS est chargé en back office via:
- `contao/config/config.php` → `bundles/contaocontentvisibility/backend.css`

Vous pouvez surcharger ce style via vos propres assets backend si besoin.

