<?php

namespace BlackDino\iSeeYou\Helper;

class Helper
{
    public function write_in_file($path, $data)
    {
        $file = fopen($path, 'a');
        fwrite($file, $data . PHP_EOL);
        fclose($file);
    }

    public function Xss_Log($request, $data)
    {
        $ip = header('IP_ADDR');
        $user_agent = header('USER_AGENT');

        $message = "xss-find -ip: $ip, user-agent: $user_agent, data: $data,";
        return $message;
    }
}
