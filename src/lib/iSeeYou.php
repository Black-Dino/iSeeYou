<?php

namespace BlackDino\iSeeYou;

use BlackDino\iSeeYou\Helper\Helper;
// use BlackDino\iSeeYou\Helper;

require_once('../iSeeYou/src/lib/Helper.php');


class iSeeYou extends Helper
{
    private $vulnerabilities = 0;
    private $messages = [];

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

        if ($isMatch) {
            $this->vulnerabilities += 1;
            $this->messages[] = $this->Xss_Log($data);
            return true;
        }

        return false;
    }

    public function PreventRCE($data)
    {
        $pattern = "/(pHp|pHP5|PhAr|php[1-9]|php|.php.jpg|.php.png)/i";
        $isMatch = preg_match($pattern, $data);

        if ($isMatch) {
            $this->vulnerabilities += 1;
            return true;
        }

        return false;
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
        $path = 'storage/logs/iSeeYou.log';
        $path = "log.log";

        if ($this->isDangrous()) {
            foreach ($this->messages as $message) {
                $this->write_in_file($path, $message);
            }
        }
    }

    /**
     * this is return is vulnerabilities is find or not
     * 
     */
    public function isDangrous()
    {
        if ($this->vulnerabilities > 0) {
            return true;
        }

        return false;
    }
}
