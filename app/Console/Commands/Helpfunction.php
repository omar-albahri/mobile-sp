<?php

namespace App\Console\Commands;
/**
 * Created by PhpStorm.
 * User: omar
 * Date: 13/03/2022
 * Time: 01:12 ص
 */
class Helpfunction{
    public function get_http_response_code($url) {
        $headers = get_headers($url);
        return substr($headers[0], 9, 3);
    }
}
