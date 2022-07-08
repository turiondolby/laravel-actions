<?php

namespace App\Actions;

use App\Models\Order;
use App\Mail\OrderCreatedMail;
use Illuminate\Console\Command;
use App\Events\OrderCreatedEvent;
use Illuminate\Support\Facades\Mail;
use Lorisleiva\Actions\Concerns\AsAction;

class SendOrderEmail
{
    use AsAction;

    public function handle(Order $order)
    {
        Mail::to($order->user)->send(new OrderCreatedMail($order));
    }

    public function asListener(OrderCreatedEvent $event): void
    {
        $this->handle($event->order);
    }

    public function asCommand(Command $command)
    {
        $this->handle(Order::findOrFail($command->argument('order_id')));

        $command->info('Email sent');
    }

    public function getCommandSignature(): string
    {
        return 'orders:send-order-email {order_id}';
    }
}
