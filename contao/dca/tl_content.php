<?php

declare(strict_types=1);

use Contao\CoreBundle\DataContainer\PaletteManipulator;

// -----------------------------------------------------------------------
// 1. Déclaration des champs
// -----------------------------------------------------------------------
$GLOBALS['TL_DCA']['tl_content']['fields']['hide_content'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['hide_content'],
    'exclude'   => true,
    'inputType' => 'checkbox',
    'eval'      => [
        'submitOnChange' => true,
        'tl_class'       => 'w50 m12',
    ],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['hide_from_groups'] = [
    'label'      => &$GLOBALS['TL_LANG']['tl_content']['hide_from_groups'],
    'exclude'    => true,
    'inputType'  => 'checkbox',
    'foreignKey' => 'tl_user_group.name',
    'eval'       => [
        'multiple' => true,
        'tl_class' => 'clr',
    ],
    'sql'        => 'blob NULL',
    'relation'   => ['type' => 'hasMany', 'load' => 'lazy'],
];

// -----------------------------------------------------------------------
// 2. Enregistrement du sélecteur + sous-palette
// -----------------------------------------------------------------------
$GLOBALS['TL_DCA']['tl_content']['palettes']['__selector__'][] = 'hide_content';
$GLOBALS['TL_DCA']['tl_content']['subpalettes']['hide_content'] = 'hide_from_groups';

// -----------------------------------------------------------------------
// 3. Injection dans toutes les palettes
// -----------------------------------------------------------------------
foreach (array_keys($GLOBALS['TL_DCA']['tl_content']['palettes']) as $palette) {
    if ($palette === '__selector__') {
        continue;
    }

    PaletteManipulator::create()
        ->addLegend('visibility_legend', 'expert_legend', PaletteManipulator::POSITION_AFTER, true)
        ->addField('hide_content', 'visibility_legend', PaletteManipulator::POSITION_APPEND)
        ->applyToPalette($palette, 'tl_content');
}