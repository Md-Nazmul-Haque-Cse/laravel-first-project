<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;
    private $detail;
    private $orderDetail;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->customer = $details['customer'];
        $this->order = $details['order'];
        $this->orderDetail = $details['orderDetail'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject('This is order notification mail')->view('mail.order',[
            'customer'=>$this->customer,
            'order'   => $this->order,
            'orderDetail'=> $this->orderDetail
        ]);
    }
}
