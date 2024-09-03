<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use App\Models\Audit;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonTimeZone;
use App\Http\Controllers\AuditController;
class UpdateUserMetadata
{
    /**
     * Create the event listener.
     */
    //
    protected $request;
    public function __construct()
    {
        //

        $this->request = request();
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedIn $event): void
    {
       // dd(request()->ip());

        $timezone = CarbonTimeZone::create('America/New_York'); // timezone
        $currentTime = Carbon::now($timezone);
        //get current time
        $existingRecord = Audit::find($event->user->id);


        //bad logic pa
        if($existingRecord){

            $audit = Audit::find($event->user->id);

            $audit->LastLoginTime = $currentTime->toDateTimeString();
            $audit->Status = "Active";
            $audit->IpAddress = $this->request->ip();
            $audit->save();
        
        }
        else
        {
            //Model
            $Audit = new Audit; 

            $Audit->Name = $event->user->name;
            $Audit->Email = $event->user->email;
            $Audit->LastLoginTime = $currentTime->toDateTimeString();
            $Audit->LastLoginOutTime = "";
            $Audit->Status = "Active";
            $Audit->Verified = $event->user->email_verified_at?"Verified":"Not Verified";
            $Audit->IpAddress = $this->request->ip();
            $Audit->save();
        }

        //hapit na
        // $user = User::where('email', $event->user->email)->first();  
        // $user->save();
    }
}
