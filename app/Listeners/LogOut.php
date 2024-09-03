<?php

namespace App\Listeners;

use App\Events\UserLoggedOut;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Audit;
use Carbon\CarbonTimeZone;
use Carbon\Carbon;

class LogOut
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserLoggedOut $event): void
    {
        //
        $isExisting = DB::table('audit')->where('id', $event->user->id)->exists();
        if ($isExisting) {
            $timezone = CarbonTimeZone::create('America/New_York'); // timezone
            $currentTime = Carbon::now($timezone);
    
            $Audit = Audit::find($event->user->id);
            $Audit->LastLoginOutTime = $currentTime;
            $Audit->Status = "Inactive";
            $Audit->save();
        }
        // DB::table('audit')
        //       ->where('id', $event->user->id)
        //       ->update(['LastLogInOutTime' => $currentTime->toDateTimeString(),
        //        'Status' => "Inactive"]);
    }
}
