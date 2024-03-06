<?php

namespace BlackDino\iSeeYou;

class iSeeYou
{
    private $vulnerabilities = 0;

    public function __construct()
    {
    }

    public function PreventSqlInjection($data)
    {
    }

    /**
     * check vulnerabilities for a specific data
     * 
     * @param string $data - give data to check
     * @return bool - True if xss find and false otherwise 
     */
    public function PreventXSS($data)
    {
        // write regex to find xss vulnerabilities
        // and check that if the vulnerability found it
        $pattern = "/(script|cript|alert|%253E|svg|style|img|[<|>])/i";
        $isMatch = preg_match($pattern, $data);

        return var_export((bool)$isMatch);
    }

    public function PreventRCE($data)
    {
        $pattern = "/(pHp|pHP5|PhAr|php[1-9]|php|.php.jpg|.php.png)/i";
        $isMatch = preg_match($pattern,$data);

        return var_export((bool) $isMatch);
    }

    public function RemoveDangrousHttpHeaders()
    {
        $dangrous_headers = [
            "Server",
            "server",
            "Power-By"
        ];

        // remove header
        foreach ($dangrous_headers as $header) {
            header_remove($header);
        }
    }

    // public $SecurityHeaders = [
    //     'X-XSS' => 
    // ];

    const Header_X_XSS_PROTECTION = "X-XSS-Protection: sddad";
    const Header_SQLI_PROTECTION = "X-XSS-Protection: sddad";
    const Header_CSRF_PROTECTION = "X-XSS-Protection: sddad";


    public function setSecurityHeaders()
    {
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

    /**
     * this is return is vulnerabilities is find or not
     * 
     */
    public function isDangrous(){
        return var_export((bool)$this->vulnerabilities);
    }
}
