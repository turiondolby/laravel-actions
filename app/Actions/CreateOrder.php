<?php

namespace App\Actions;

use App\Models\User;
use Lorisleiva\Actions\Action;
use Lorisleiva\Actions\ActionRequest;

class CreateOrder extends Action
{
    public function handle(User $user)
    {
        $user->orders()->create([]);
    }

    public function asController(User $user)
    {
        $this->handle($user);

        return back();
    }

    public function authorize(ActionRequest $request)
    {
        return $request->user()->id === $request->route('user')->id;
    }
}
