<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\MxTempMail;
use Illuminate\Support\Facades\Mail;
use App\Sensor;
use App\Room;
use App\User;
use App\Temperatureval;
use App\Humidityval;
use App\Motionval;
use Carbon\Carbon;

class alert extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to user when the temperature or humidity value pass the max value ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        
        $now = carbon::now();
        // get the last 30 minute measure 
        $last30min = Temperatureval:: where('created_at' ,'>',$now->subMinutes(30)->toDateTimeString())->get();

        foreach($last30min as $mesure){
            //get the max_value from sensors table 
            $sensor=Sensor::where('sensor_id',$mesure->sensor_id )->first(); 

            //figure out if the temperature value measured passed the max value defined in the sensors table
            if($mesure->value >= $sensor->max_value ){
                $room=Room::where('room_id',$sensor->room_id)->first();
                $user=User::where('id',$room->user_id)->first();
                //send email to user 
                Mail::to($user->email)->send(new MxTempMail($user,$mesure,$sensor,$room));
            }
        }

        $last30min = Humidityval:: where('created_at' ,'>',$now->subMinutes(30)->toDateTimeString())->get();

        foreach($last30min as $mesure){
            //get the max_value from sensors table 
            $sensor=Sensor::where('sensor_id',$mesure->sensor_id )->first(); 

            //figure out if the temperature value measured passed the max value defined in the sensors table
            if($mesure->value >= $sensor->max_value ){
                $room=Room::where('room_id',$sensor->room_id)->first();
                $user=User::where('id',$room->user_id)->first();
                //send email to user 
                Mail::to($user->email)->send(new MxTempMail($user,$mesure,$sensor,$room));
            }
        }
        
    }
}
