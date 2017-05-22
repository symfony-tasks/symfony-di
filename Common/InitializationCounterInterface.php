<?php

namespace BankiruSchool\DI\Common;

interface InitializationCounterInterface
{
    public static function getInitializationsCount(): int;
}
