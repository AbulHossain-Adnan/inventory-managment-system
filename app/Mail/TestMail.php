<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

  public $product;
    public function __construct()
    {
        
    }

 
    public function build()
    {
        return $this->view('email.test');
    }
}
