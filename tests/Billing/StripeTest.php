<?php

namespace Tests\Feature;

use App\Http\Controllers\Billing\StripeWebhooksController;
use App\Subscription;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StripeTest extends TestCase
{
    use RefreshDatabase ;

    /** @test */
    public function it_converts_event_name_to_method_name(){

        $webhook = new StripeWebhooksController();
        $methodName = $webhook->eventToMethod('customer.subscription.deleted');

        $this->assertEquals('onCustomerSubscriptionDeleted', $methodName);
    }

   /** @test */
    public function it_gets_user_by_stripe_customer_id(){

        $newUser = factory(User::class)->create();
        $sub  = factory(Subscription::class)->create(['stripe_customer_id' => 'cus_000111222333', 'user_id' => $newUser->id]);
        $user = User::byStripeCustomerId($sub->stripe_customer_id);

        $this->assertEquals($user->id, $newUser->id);
    }

    /** @test */

    public function it_deactivates_user(){
        $newUser = factory(User::class)->create();
        $sub  = factory(Subscription::class)->create(['stripe_customer_id' => 'cus_000111222333', 'user_id' => $newUser->id]);
        $user = User::byStripeCustomerId($sub->stripe_customer_id);

        $user->deactivate();

        $this->assertEquals('canceled', $user->subscription->sub_status);
    }

}
