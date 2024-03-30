<?php

namespace App\Actions\Components;

enum MeasurementEnum: string
{
    case BUAH = 'buah';
    case LITER = 'liter';
    case KALI = 'kali';
    case DOS = 'dos';
    case BOTOL = 'botol';
    case DRUM = 'drum';
    case SET = 'set';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }
}
