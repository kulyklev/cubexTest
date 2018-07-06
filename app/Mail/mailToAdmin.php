<?php

namespace App\Mail;

use App\Models\Bid;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class mailToAdmin extends Mailable
{
    use Queueable, SerializesModels;

    protected $bid;

    /**
     * Create a new message instance.
     *
     * @param \App\Models\Bid
     * @return void
     */
    public function __construct(Bid $bid)
    {
        $this->bid = $bid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        var_dump($this->bid);
        return $this->from('newbid@cubextest.com', $this->bid->user->name)
                    ->to('email@example.com')
                    ->subject('You have new bid from '.$this->bid->user->name)
                    ->attach(public_path('storage/files/'.$this->bid->file))
                    ->view('emails.emailToAdmin')
                    ->with(['theme' => $this->bid->theme,
                            'content' => $this->bid->message,
                            'createdAt' => $this->bid->created_at,
                            'userName' => $this->bid->user->name]);
    }
}
