<?php

namespace SymfonyTasks\DI\Common;

final class Greeter
{
    private $greeted = [];

    public function greet(string $name): string
    {
        if (in_array($name, $this->greeted, true)) {
            return 'I\'ve already greet you, ' . $name;
        }

        $this->greeted[] = $name;

        return 'Greetings, ' . $name;
    }
}
