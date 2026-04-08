## Notes techniques

### Où s’applique le filtrage ?
- Hook: `loadDataContainer`
- Table ciblée: `tl_content`
- Mécanisme: ajout d’un filtre DCA sur `list.sorting.filter`.

### Stockage des groupes
Le champ `hide_from_groups` stocke une liste sérialisée (Contao) d’IDs de groupes backend (`tl_user_group.id`).

Le filtrage côté liste utilise un `LIKE` qui matche la forme sérialisée `s:X:"ID";`.

### Compatibilité
- **Contao**: 5.3+
- **PHP**: 8.1+

