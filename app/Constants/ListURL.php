<?php

namespace App\Constants;

use Illuminate\Support\Facades\Route;

class ListURL
{
    public array $users;
    public array $coaches;

    public function __construct()
    {
        $this->users = [];
        $this->coaches = [];

        $lists = Route::getRoutes();

        foreach ($lists as $list)
        {
            if(str_contains($list->uri, 'admin'))
            {
                continue;
            }

            else if(str_contains($list->uri(), 'user'))
            {
                array_push($this->users, $list->uri());
            }

            else if(str_contains($list->uri(), 'coach'))
            {
                array_push($this->coaches, $list->uri());
            }

            else
            {
                array_push($this->users, $list->uri());
            }
        }

        array_push($this->users, 'home', 'about');
    }

    public function coach(string $url): bool
    {
        foreach ($this->coaches as $coach)
        {
            if(str_contains($coach, $url))
            {
                return true;
            }
        }
        return false;
    }

    public function user(string $url): bool
    {
        foreach ($this->users as $user)
        {
            if(str_contains($user, $url))
            {
                return true;
            }
        }
        return false;
    }
}
