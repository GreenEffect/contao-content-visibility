## Installation

### Prérequis
- **PHP**: 8.1+
- **Contao**: 5.5+

### Via Composer (Packagist)

```bash
composer require greeneffect/content-visibility
```

### Via Contao Manager
- Ajoutez le paquet `greeneffect/content-visibility` puis lancez la mise à jour.

### Migration de base de données

Après installation, exécutez:

```bash
php vendor/bin/contao-console contao:migrate
```

Cela ajoute deux colonnes à `tl_content`:
- `hide_content` — `char(1) NOT NULL default ''`
- `hide_from_groups` — `blob NULL`

