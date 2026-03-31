<?php

declare(strict_types=1);

namespace Greeneffect\ContaoContentVisibility\Tests\Unit;

use Greeneffect\ContaoContentVisibility\Ui\ContentVisibilityBadgeRenderer;
use PHPUnit\Framework\TestCase;

final class ContentVisibilityBadgeRendererTest extends TestCase
{
    public function testRendersFallbackLabelAndTitleWhenNoLanguageKeys(): void
    {
        $renderer = new ContentVisibilityBadgeRenderer();
        $html = $renderer->render([], []);

        $this->assertStringContainsString('content-visibility-badge', $html);
        $this->assertStringContainsString('🔒 Restricted', $html);
        $this->assertStringContainsString('Not visible for some groups', $html);
    }

    public function testRendersGroupNamesInTitleAndEscapesHtml(): void
    {
        $renderer = new ContentVisibilityBadgeRenderer();

        $language = [
            'content_visibility_badge_label' => '🔒 Restricted',
            'content_visibility_badge_groups' => 'Not visible for: %s',
        ];

        $html = $renderer->render($language, ['Admins', '<script>alert(1)</script>']);

        $this->assertStringContainsString(
            'Not visible for: Admins, &lt;script&gt;alert(1)&lt;/script&gt;',
            $html
        );
    }
}

