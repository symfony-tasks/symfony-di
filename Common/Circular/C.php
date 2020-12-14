<?php

namespace SymfonyTasks\DI\Common\Circular;

use Symfony\Contracts\Service\Attribute\Required;

final class C
{
    private A $a;

    public function getA(): A
    {
        return $this->a;
    }

    #[Required]
    public function setA(A $a): void
    {
        $this->a = $a;
    }
}
