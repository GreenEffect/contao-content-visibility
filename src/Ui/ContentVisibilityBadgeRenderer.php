<?php

declare(strict_types=1);

namespace Greeneffect\ContaoContentVisibility\Ui;

use Contao\StringUtil;

class ContentVisibilityBadgeRenderer
{
    /**
     * @param array<string, mixed> $language
     * @param list<string>         $groupNames
     */
    public function render(array $language, array $groupNames): string
    {
        $label = (string) ($language['content_visibility_badge_label'] ?? '🔒 Restricted');

        if (!empty($groupNames)) {
            $pattern = (string) ($language['content_visibility_badge_groups'] ?? 'Not visible for: %s');
            $title = sprintf($pattern, implode(', ', $groupNames));
        } else {
            $title = (string) ($language['content_visibility_badge_some_groups'] ?? 'Not visible for some groups');
        }

        return sprintf(
            '<span class="content-visibility-badge" title="%s">%s</span>',
            StringUtil::specialchars($title),
            StringUtil::specialchars($label)
        );
    }
}

