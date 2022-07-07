<?php

namespace App\Actions;

use App\Models\Order;
use Lorisleiva\Actions\Action;
use App\Mail\OrderCreatedMail;
use App\Events\OrderCreatedEvent;
use Illuminate\Support\Facades\Mail;

class SendOrderEmail extends Action
{
    public function handle(Order $order)
    {
        Mail::to($order->user)->send(new OrderCreatedMail($order));
    }

    public function asListener(OrderCreatedEvent $event): void
    {
        $this->handle($event->order);
    }
}
