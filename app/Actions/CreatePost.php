<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Action;
use Illuminate\Http\RedirectResponse;
use Lorisleiva\Actions\Concerns\AsAction;

class CreatePost extends Action
{
    use AsAction;

    public function handle(User $user, array $data)
    {
        return $user->posts()->create($data);
    }

    public function asController(Request $request): RedirectResponse
    {
        $this->handle($request->user(), $request->only('body'));

        return back();
    }

    public function rules(): array
    {
        return [
            'body' => 'required'
        ];
    }

    public function getValidationMessages(): array
    {
        return [
            'body.required' => 'We need a body'
        ];
    }
}
