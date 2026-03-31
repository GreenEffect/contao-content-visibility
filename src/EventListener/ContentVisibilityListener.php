<?php

declare(strict_types=1);

namespace Greeneffect\ContaoContentVisibility\EventListener;

use Contao\BackendUser;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\StringUtil;

#[AsHook('loadDataContainer')]
class ContentVisibilityListener
{
    public function __invoke(string $table): void
    {
        if ($table !== 'tl_content') {
            return;
        }

        $user = BackendUser::getInstance();

        if ($user->isAdmin) {
            return;
        }

        $userGroups = $user->groups;
        if (empty($userGroups) || !\is_array($userGroups)) {
            return;
        }

        // Contao sérialise les groupes via StringUtil::serialize() :
        // le résultat est a:N:{i:0;s:X:"ID";...} — les IDs sont des strings.
        // Le bon pattern LIKE est donc s:X:"ID"; où X = longueur de l'ID en chars.
        $conditions = [];
        foreach ($userGroups as $groupId) {
            $groupId  = (string) (int) $groupId;
            $len      = \strlen($groupId);
            // Exemple pour groupId=3 : LIKE '%s:1:"3";%'
            $conditions[] = sprintf("hide_from_groups LIKE '%%s:%d:\"%s\";%%'", $len, $groupId);
        }

        $excludeCondition = implode(' OR ', $conditions);

        $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['filter'][] = [
            'NOT (hide_content = 1 AND (' . $excludeCondition . ')) AND 1=?',
            1,
        ];
    }
}