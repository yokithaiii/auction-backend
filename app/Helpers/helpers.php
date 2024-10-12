<?php

function normalizePhone($phone): string|null
{
    if($phone == null) {
        return null;
    }
    $phone = preg_replace('/[^+0-9]/', '', $phone);

    if (!str_starts_with($phone, '+')) {
        $phone = '+' . $phone;
    }
    if (str_starts_with($phone, '+77')) {
        $phone = substr($phone,0, 3);
        $phone = '+7' . $phone;
    }
    if (substr($phone, 1, 1) == 8) {
        $phone = substr($phone, 2);
        $phone = '+7' . $phone;
    }
    return $phone;
}

function isHttpCode(int $code): bool
{
    return $code < 600;
}
