<p align="center">
  <img src="./logo.svg" width="140" height="140" alt="Contao Content Visibility">
</p>

## Contao Content Visibility

Bundle Contao 5 permettant de **restreindre l'affichage des éléments de contenu (`tl_content`) dans le back office** selon les groupes de l'utilisateur backend.

---

## Fonctionnalités

- **Case à cocher** « Masquer l'administration de ce contenu » dans chaque élément de contenu.
- **Sélection de groupes** : liste de cases à cocher pour choisir les groupes d'utilisateurs back-office concernés.
- **Masquage complet** : les éléments masqués sont totalement absents des listes pour les utilisateurs ciblés.
- **Super-admins exemptés** : les utilisateurs `isAdmin = true` voient toujours tous les éléments.
- **Non-intrusif** : n'interfère pas avec le système natif de Contao (droits sur les types de contenu, groupes, etc.).

---

## Installation

### Via Composer (Packagist)

```bash
composer require greeneffect/contao-content-visibility
```

### Via Contao Manager

- Ajoutez le paquet, puis exécutez la mise à jour (ou laissez le Manager le faire).

---

## Documentation

Voir la documentation complète (FR) dans `docs/fr/README.md`.

---

## Migration de base de données

Après installation, lancez la migration via :

```bash
php vendor/bin/contao-console contao:migrate
```

Ou via le **Contao Manager** → « Maintenance » → « Mettre à jour la base de données ».

Deux colonnes seront ajoutées à `tl_content` :
- `hide_content` — `char(1) NOT NULL default ''`
- `hide_from_groups` — `blob NULL`

---

## Utilisation

1. Ouvrez un **élément de contenu** existant dans le back-office.
2. Une nouvelle section **« Visibilité dans l'administration »** apparaît en bas du formulaire.
3. Cochez **« Masquer l'administration de ce contenu »**.
4. Une liste de groupes d'utilisateurs apparaît : cochez les groupes devant être masqués.
5. Sauvegardez.

Les membres des groupes sélectionnés ne verront plus cet élément dans les listes d'éléments de contenu.

---

## Notes techniques

- Le filtrage s'applique uniquement dans le back-office, sur `tl_content`.
- Le contenu reste publié en front-office normalement.
- Compatible avec **Contao 5.5+** / **PHP 8.1+**.
- Namespace : `Greeneffect\ContaoContentVisibility`.

---

## Licence

CC BY-SA 4.0

