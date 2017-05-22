<?php

namespace BankiruSchool\DI\Common\Circular;

final class A
{
    /**
     * @var B
     */
    private $b;

    /**
     * @return B
     */
    public function getB(): B
    {
        return $this->b;
    }

    /**
     * @required
     * @param B $b
     */
    public function setB(B $b)
    {
        $this->b = $b;
    }
}
