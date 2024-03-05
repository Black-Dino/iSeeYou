<?php

namespace iSeeYou;

class iSeeYou
{
    public function __construct()
    {
    }

    public function PreventSqlInjection($data)
    {
    }

    public function PreventXSS($data)
    {
    }

    public function PreventRCE($data)
    {
    }

    public function RemoveDangrousHttpHeaders()
    {
    }

    // public $SecurityHeaders = [
    //     'X-XSS' => 
    // ];

    CONST Header_X_XSS_PROTECTION = "X-XSS-Protection: sddad";
    CONST Header_SQLI_PROTECTION= "X-XSS-Protection: sddad";
    CONST Header_CSRF_PROTECTION= "X-XSS-Protection: sddad";


    public function setSecurityHeaders(){

    }

    public function LogingSuspiciousData()
    {
        // $channel = Log::build([
        //     'driver' => 'single',
        //     'path' => storage_path('logs/SuspiciousData.log'),
        // ]);

        // // get err data in $err 
        // // fill this var in another function
        // Log::stack(['slack', $channel])->notice('dsa');
    }
}
