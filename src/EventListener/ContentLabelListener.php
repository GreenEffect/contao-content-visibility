<?php

declare(strict_types=1);

namespace Greeneffect\ContaoContentVisibility\EventListener;

use Greeneffect\ContaoContentVisibility\Ui\ContentVisibilityBadgeRenderer;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\Database;
use Contao\StringUtil;
use Contao\System;

/**
 * Wrappe le child_record_callback natif de tl_content (mode parent view)
 * pour y ajouter un badge "Restreint" sur les éléments masqués.
 */
#[AsCallback(table: 'tl_content', target: 'config.onload')]
class ContentLabelListener
{
    public function __construct(private readonly ContentVisibilityBadgeRenderer $badgeRenderer)
    {
    }

    public function __invoke(): void
    {
        $originalCallback = $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback'] ?? null;

        $GLOBALS['TL_DCA']['tl_content']['list']['sorting']['child_record_callback'] = function (
            array $row
        ) use ($originalCallback): string {
            // 1. Appel du callback original de Contao core
            $html = '';

            if ($originalCallback !== null) {
                if (\is_array($originalCallback) && isset($originalCallback[0], $originalCallback[1])) {
                    $class  = $originalCallback[0];
                    $method = $originalCallback[1];
                    $obj    = \is_object($class) ? $class : System::importStatic($class);
                    $html   = $obj->$method($row);
                } elseif ($originalCallback instanceof \Closure) {
                    $html = $originalCallback($row);
                }
            }

            // 2. Badge uniquement si hide_content est actif
            if (empty($row['hide_content'])) {
                return $html;
            }

            $groupNames = [];

            if (!empty($row['hide_from_groups'])) {
                $groupIds = StringUtil::deserialize($row['hide_from_groups'], true);

                if (!empty($groupIds)) {
                    $result = Database::getInstance()->execute(
                        'SELECT name FROM tl_user_group WHERE id IN ('
                        . implode(',', array_map('intval', $groupIds))
                        . ')'
                    );
                    while ($result->next()) {
                        $groupNames[] = $result->name;
                    }
                }
            }

            $badge = $this->badgeRenderer->render(
                $GLOBALS['TL_LANG']['tl_content'] ?? [],
                $groupNames
            );

            $updatedHtml = preg_replace_callback(
                '@(<div\\s+class="cte_type[^\"]*">)(.*?)(</div>)@si',
                static function (array $matches) use ($badge): string {
                    return $matches[1] . $matches[2] . ' ' . $badge . $matches[3];
                },
                $html,
                1
            );

            if (null === $updatedHtml || $updatedHtml === $html) {
                return $html . ' ' . $badge;
            }

            return $updatedHtml;
        };
    }
}