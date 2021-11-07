<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BillMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bill;
    public $staff;
    public $combo;
    public $service;
    public $discount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bill,$staff,$combo,$service,$discount)
    {
        //
        $this->bill = $bill;
        $this->staff = $staff;
        $this->combo = $combo;
        $this->service = $service;
        $this->discount = $discount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Hóa đơn đặt lịch')->view('admin.email.index');
    }
}
