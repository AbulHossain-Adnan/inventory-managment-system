<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

class StockLowAlertMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

   
    public $product;

    public function __construct(Product $product)
    {
        $this->product=$product;
    }

  
    public function build()
    {
        return $this->markdown('email.stocklowalert')->with('products',$this->product);

    }
}
