<?php

namespace App\Enums;

enum ListingStatusEnum:int
{
    case ENDED = 0;
    case SOON_ENDING = 1;
    case ACTIVE = 2;

    public static function getStatus(int $status): self
    {
        return match ($status) {
            0 => self::ENDED,
            1 => self::SOON_ENDING,
            default => self::ACTIVE,
        };
    }
}
