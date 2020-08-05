<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MxTempMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $mesure;
    public $sensor;
    public $room;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user ,$mesure,$sensor,$room)
    {
        $this->user = $user;
        $this->mesure = $mesure ;
        $this->sensor = $sensor ;
        $this->room = $room ;

    
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('email.TempMail')
                    ->with([
                        'username'=> $this->user->Firstname,
                        'value'=> $this->mesure->value,
                        'measered_at'=> $this->mesure->created_at,
                        'maxvalue'=>$this->sensor->max_value,
                        'type'=>$this->sensor->type,
                        'room_name'=>$this->room->name,
                    ]);
    }
}
