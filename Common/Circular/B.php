<?php

namespace BankiruSchool\DI\Common\Circular;

final class B
{
    /**
     * @var C
     */
    private $c;

    /**
     * @return C
     */
    public function getC(): C
    {
        return $this->c;
    }

    /**
     * @required
     * @param C $c
     */
    public function setC(C $c)
    {
        $this->c = $c;
    }
}
