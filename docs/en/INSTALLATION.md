## Installation

### Requirements
- **PHP**: 8.1+
- **Contao**: 5.5+

### Using Composer (Packagist)

```bash
composer require greeneffect/contao-content-visibility
```

### Using Contao Manager
- Add `greeneffect/contao-content-visibility` and run the update.

### Database migration

After installation run:

```bash
php vendor/bin/contao-console contao:migrate
```

This adds two columns to `tl_content`:
- `hide_content` — `char(1) NOT NULL default ''`
- `hide_from_groups` — `blob NULL`

