<?php

namespace BankiruSchool\DI\Common;

final class GreetingController
{
    /** @var Greeter */
    private $greeter;

    /**
     * GreetingController constructor.
     *
     * @param Greeter $greeter
     */
    public function __construct(Greeter $greeter)
    {
        $this->greeter = $greeter;
    }

    public function greetAction($name): string
    {
        return $this->greeter->greet($name);
    }
}
