<?php

namespace SymfonyTasks\DI\Common\Circular;

use Symfony\Contracts\Service\Attribute\Required;

final class A
{
    private B $b;

    public function getB(): B
    {
        return $this->b;
    }

    #[Required]
    public function setB(B $b): void
    {
        $this->b = $b;
    }
}
