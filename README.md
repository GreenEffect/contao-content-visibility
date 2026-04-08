<p align="center">
  <img src="./logo.svg" width="140" height="140" alt="Contao Content Visibility">
</p>

## Contao Content Visibility

Contao 5 bundle to **restrict the visibility of content elements (`tl_content`) in the back end** based on the current back end user's groups.

---

## Features

- **Checkbox** to mark a content element as restricted.
- **Group selection**: pick the back end user groups that should not see the element.
- **Full hiding**: restricted elements are removed from the listing for targeted users.
- **Admins excluded**: `isAdmin = true` users always see everything.
- **Non-intrusive**: does not replace Contao's native permission system.

---

## Installation

### Using Composer (Packagist)

```bash
composer require greeneffect/contao-content-visibility
```

### Using Contao Manager

- Add the package, then run the update (or let the Manager handle it).

---

## Documentation

- English documentation: `docs/en/README.md`
- Documentation française: `docs/fr/README.md`

---

## Database migration

After installation, run:

```bash
php vendor/bin/contao-console contao:migrate
```

Or via **Contao Manager** → Maintenance → Database update.

Two columns will be added to `tl_content`:
- `hide_content` — `char(1) NOT NULL default ''`
- `hide_from_groups` — `blob NULL`

---

## Usage

1. Edit an existing content element in the back end.
2. In the **Administration visibility** legend, enable the restriction checkbox.
3. Select one or more back end user groups.
4. Save.

Users belonging to the selected groups will no longer see the element in `tl_content` listings.

---

## Technical notes

- The filtering is **back end only** and targets `tl_content`.
- The front end output/publication is not affected.
- Compatible with **Contao 5.3+** / **PHP 8.1+**.
- Namespace: `Greeneffect\ContaoContentVisibility`.

---

## License

CC BY-SA 4.0
