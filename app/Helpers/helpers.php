<?php

function isHttpCode(int $code): bool
{
    return $code < 600;
}

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

function transliterate($text): string
{
    $converter = array(
        'а' => 'a',   'б' => 'b',   'в' => 'v',
        'г' => 'g',   'д' => 'd',   'е' => 'e',
        'ё' => 'yo',  'ж' => 'zh',  'з' => 'z',
        'и' => 'i',   'й' => 'j',   'к' => 'k',
        'л' => 'l',   'м' => 'm',   'н' => 'n',
        'о' => 'o',   'п' => 'p',   'р' => 'r',
        'с' => 's',   'т' => 't',   'у' => 'u',
        'ф' => 'f',   'х' => 'h',   'ц' => 'ts',
        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
        'ь' => '',    'ы' => 'y',   'ъ' => '',
        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        'А' => 'A',   'Б' => 'B',   'В' => 'V',
        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
        'Ё' => 'Yo',  'Ж' => 'Zh',  'З' => 'Z',
        'И' => 'I',   'Й' => 'J',   'К' => 'K',
        'Л' => 'L',   'М' => 'M',   'Н' => 'N',
        'О' => 'O',   'П' => 'P',   'Р' => 'R',
        'С' => 'S',   'Т' => 'T',   'У' => 'U',
        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'Ts',
        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
        'Ь' => '',    'Ы' => 'Y',   'Ъ' => '',
        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
    );

    $transliterated = strtr($text, $converter);
    if (preg_match('/\s/', $transliterated)) {
        $transliterated = preg_replace('/\s+/', '-', $transliterated);
    }

    return mb_strtolower($transliterated);
}
