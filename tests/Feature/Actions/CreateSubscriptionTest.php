<?php

namespace Tests\Feature\Actions;

use Tests\TestCase;
use App\Models\User;
use App\Actions\CreateSubscription;
use App\Actions\FetchPlanFromStripe;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSubscriptionTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_subscription()
    {
        FetchPlanFromStripe::mock()
            ->shouldReceive('handle')
            ->with('a-stripe-id')
            ->andReturn([
                'interval' => 'year'
            ]);

        $user = User::factory()->create();
        $action = new CreateSubscription();

        $action->run($user, 'a-stripe-id');

        $this->assertCount(1, $user->subscriptions);
        $this->assertEquals('year', $user->subscriptions->first()->interval);
    }
}
