<?php

declare(strict_types=1);

namespace Greeneffect\ContaoContentVisibility;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class ContaoContentVisibilityBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
