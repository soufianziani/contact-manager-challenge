<?php

namespace App\Enums;

enum OrganizationStatus: string
{
    case Client = 'Client';
    case Prospect = 'Prospect';
    case Lead = 'Lead';

    public static function values(): array
    {
        return [
            self::Client->value,
            self::Prospect->value,
            self::Lead->value,
        ];
    }

    public static function color(string $status): string
    {
        return match ($status) {
            self::Client->value => 'text-custom-dark-green bg-custom-light-green',
            self::Prospect->value => 'text-custom-dark-red bg-custom-light-orange',
            self::Lead->value => 'text-custom-status-blue bg-custom-status-blue-bg ',
            default => '',
        };
    }
}
