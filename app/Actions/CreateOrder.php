<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Action;

class CreateOrder extends Action
{
    public function rules(): array
    {
        return [];
    }

    public function handle(User $user)
    {
        $user->orders()->create([]);
    }

    public function asController(User $user)
    {
        $this->handle($user);
    }
}
