## Configuration & usage

### Goal
This bundle **hides selected content elements (`tl_content`) in the Contao back end** for back end users belonging to specific groups.

### Behaviour
- **Back end only**: no effect on the front end.
- **Admins**: `isAdmin = true` users are never filtered.
- **Filtering**: elements marked as restricted and matching one of the user's groups are **removed from the listing**.

### Back end setup
1. Edit a content element.
2. In the **Administration visibility** legend, enable the restriction checkbox.
3. Select one or more groups in **Groups with no access to this content**.
4. Save.

### Screenshots
- Fieldset / legend and checkbox: `../screenshots/01-content-visibility-fieldset.png`
- Group selection: `../screenshots/02-content-visibility-groups.png`
- Listing badge: `../screenshots/03-content-visibility-badge.png`

### Expected result
Back end users belonging to the selected groups will no longer see the element in `tl_content` listings (parent/child view).

