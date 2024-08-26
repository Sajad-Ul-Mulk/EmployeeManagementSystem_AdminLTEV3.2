<?php

namespace App;

use App\Models\Task;
use App\Models\User;

class UserFinder
{
    public static function findtask(string $id): string
    {
        return User::findOrFail($id)->getFullNameAttribute();
    }

    public static function findtaskname(string $id): string
    {
        return Task::findOrFail($id)->name;

    }
}
