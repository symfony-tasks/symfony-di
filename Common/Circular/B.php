<?php

namespace SymfonyTasks\DI\Common\Circular;

use Symfony\Contracts\Service\Attribute\Required;

final class B
{
    private C $c;

    public function getC(): C
    {
        return $this->c;
    }

    #[Required]
    public function setC(C $c): void
    {
        $this->c = $c;
    }
}
