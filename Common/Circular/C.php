<?php

namespace SymfonyTasks\DI\Common\Circular;

final class C
{
    /**
     * @var A
     */
    private $a;

    /**
     * @return A
     */
    public function getA(): A
    {
        return $this->a;
    }

    /**
     * @required
     * @param A $a
     */
    public function setA(A $a)
    {
        $this->a = $a;
    }
}
