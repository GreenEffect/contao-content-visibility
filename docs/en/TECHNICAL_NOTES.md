## Technical notes

### Where does the filtering apply?
- Hook: `loadDataContainer`
- Target table: `tl_content`
- Mechanism: adds a DCA filter to `list.sorting.filter`.

### Group storage
The `hide_from_groups` field stores a Contao-serialized list of back end group IDs (`tl_user_group.id`).

The listing filter uses a `LIKE` match on the serialized form `s:X:"ID";`.

### Compatibility
- **Contao**: 5.3+
- **PHP**: 8.1+

