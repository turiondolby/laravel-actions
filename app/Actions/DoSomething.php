<?php

namespace App\Actions;

use Lorisleiva\Actions\Concerns\AsAction;

class DoSomething
{
    use AsAction;

    public function handle()
    {
        $data = FetchSomethingFromSomewhere::run();

        //do something

        return $data;
    }
}
