<?php
    // this function helps to generate special sets of UUID for securing the ids from being guessed by anyone
    function uuid($data = null){
        // Generate 16 bytes (128 bits) of random data or use the data passed into the function.
        $data = $data ?? random_bytes(16);
        assert(strlen($data) == 16);

        // Set version to 0100
        $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
        // Set bits 6-7 to 10
        $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

        // Output the 36 character UUID.
        return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
    }

    function username($email)
    {
        $count_name = explode("@", strtolower($email));
        return substr($count_name[0],0);
    }

    function RandomUserID($parameter, $length){
        $base = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $random = substr(str_shuffle($base), 0, $length);
        return $parameter . $random;
    }
