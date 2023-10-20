<?php

namespace App\Mail;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notification extends Mailable
{
    use Queueable, SerializesModels;
    public $imagesendbymailwithstore;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($imagesendbymailwithstore)
    {
        $this->imagesendbymailwithstore = $imagesendbymailwithstore;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(Request $request)
    {
        if ($request->attachment) {
            return $this->view('email-template')
                ->subject($this->imagesendbymailwithstore['subject'])
                ->with('data', $this->imagesendbymailwithstore)
                ->attach(
                    $this->imagesendbymailwithstore['attachment']->getRealPath(),
                    [
                        'as' => $this->imagesendbymailwithstore['attachment']->getClientOriginalName(),
                        'mime' => $this->imagesendbymailwithstore['attachment']->getClientMimeType(),
                    ]
                );
        } else {
            return $this->view('email-template')
                ->subject($this->imagesendbymailwithstore['subject'])
                ->with('data', $this->imagesendbymailwithstore);
        }
    }
}
