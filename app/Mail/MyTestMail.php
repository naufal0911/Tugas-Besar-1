<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyTestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    public $subject;
    public $view;

    /**
     * Create a new message instance.
     *
     * @param array $details
     * @param string $subject
     * @param string $view
     */
    public function __construct($details, $subject, $view)
    {
        $this->details = $details;
        $this->subject($subject);
        $this->view = $view;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->view)
                    ->with('details', $this->details);
    }
}

