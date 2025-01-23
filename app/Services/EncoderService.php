<?php

namespace App\Services;

class EncoderService
{
    public function encodeBase36($number)
    {
        return strtolower(base_convert($number, 10, 36));
    }

    public function decodeBase36($encoded)
    {
        return base_convert($encoded, 36, 10);
    }
}
