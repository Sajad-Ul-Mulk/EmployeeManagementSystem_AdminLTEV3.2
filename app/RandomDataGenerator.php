<?php

namespace App;

class RandomDataGenerator
{
    public static function typesOfTaskStatus(): array
    {
        return [
            'open',
            'in progress',
            'on hold',
            'completed',
        ];
    }

    public static function typesOfRole(): array
    {
        return [
            'admin',
            'developer'
        ];
    }
}
