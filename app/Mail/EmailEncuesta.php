<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class EmailEncuesta extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data=[])
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('mails.email_encuestas')
            ->subject('Contestar encuesta')
            ->attach($this->data['document']->getRealPath(),
                [
                    'as' => $this->data['document']->getClientOriginalName(),
                    'mime' => $this->data['document']->getClientMimeType(),
                ]);;
    }
}
