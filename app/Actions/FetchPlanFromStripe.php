<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class FetchPlanFromStripe
{
    use AsAction;

    public function handle($stripeId)
    {
        return [
            'interval' => 'month'
        ];
    }
}
