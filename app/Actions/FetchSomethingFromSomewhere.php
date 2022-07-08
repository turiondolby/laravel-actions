<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class FetchSomethingFromSomewhere
{
    use AsAction;

    public function handle()
    {
        return [
            'id' => 1
        ];
    }
}
