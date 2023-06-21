<?php
namespace App\Services;

class ApiDanger
{
    function hashedKey($key): bool
    {

        if ($key == '0919232991') {
            return true;
        } else {
            return false;
        }
    }
}
