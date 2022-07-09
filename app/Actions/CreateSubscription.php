<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Arr;
use Lorisleiva\Actions\Concerns\AsAction;

class CreateSubscription
{
    use AsAction;

    public function handle(User $user, $stripeId)
    {
        $plan = FetchPlanFromStripe::run($stripeId);

        $user->subscriptions()->create([
            'stripe_id' => $stripeId,
            'interval' => Arr::get($plan, 'interval')
        ]);
    }
}
