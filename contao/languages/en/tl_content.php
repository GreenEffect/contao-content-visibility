<?php

declare(strict_types=1);

// Fields
$GLOBALS['TL_LANG']['tl_content']['hide_content'] = [
    'Hide administration of this content',
    'If checked, this content element will be hidden for the selected back-office user groups.',
];

$GLOBALS['TL_LANG']['tl_content']['hide_from_groups'] = [
    'Groups with no access to this content',
    'Select the back-office user groups that will not be able to see or edit this element.',
];

// Legend
$GLOBALS['TL_LANG']['tl_content']['visibility_legend'] = 'Administration visibility';

// Badges / labels (back end lists)
$GLOBALS['TL_LANG']['tl_content']['content_visibility_badge_label'] = '🔒 Restricted';
$GLOBALS['TL_LANG']['tl_content']['content_visibility_badge_groups'] = 'Not visible for: %s';
$GLOBALS['TL_LANG']['tl_content']['content_visibility_badge_some_groups'] = 'Not visible for some groups';
