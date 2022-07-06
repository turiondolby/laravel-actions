<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Action;
use Lorisleiva\Actions\Concerns\AsAction;

class CreatePost extends Action
{
    use AsAction;

    public function handle(User $user, array $data)
    {
        return $user->posts()->create($data);
    }
}
