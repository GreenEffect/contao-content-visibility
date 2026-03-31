## Configuration et utilisation

### Objectif
Ce bundle permet de **masquer certains éléments de contenu (`tl_content`) dans le back office** pour des utilisateurs backend appartenant à des groupes définis.

### Comportement
- **Uniquement back office**: aucune incidence sur le front office.
- **Admins**: les utilisateurs `isAdmin = true` ne sont jamais filtrés.
- **Filtrage**: les éléments marqués comme restreints et ciblant un des groupes de l’utilisateur sont **retirés de la liste**.

### Mise en place dans le back office
1. Éditez un élément de contenu.
2. Dans la légende **« Visibilité dans l'administration »**, cochez **« Masquer l'administration de ce contenu »**.
3. Sélectionnez un ou plusieurs groupes dans **« Groupes n'ayant pas accès à ce contenu »**.
4. Enregistrez.

### Captures d’écran
- Légende + case à cocher: `../screenshots/01-content-visibility-fieldset.png`
- Sélection des groupes: `../screenshots/02-content-visibility-groups.png`
- Badge dans la liste: `../screenshots/03-content-visibility-badge.png`

### Résultat attendu
Les utilisateurs backend appartenant aux groupes sélectionnés ne voient plus l’élément dans les listes `tl_content` (mode parent/enfant).

