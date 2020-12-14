<?php

namespace SymfonyTasks\DI\Common;

final class GreetingController
{
    private Greeter $greeter;

    public function __construct(Greeter $greeter)
    {
        $this->greeter = $greeter;
    }

    public function greetAction($name): string
    {
        return $this->greeter->greet($name);
    }
}
