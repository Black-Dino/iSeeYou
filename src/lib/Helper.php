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
}
