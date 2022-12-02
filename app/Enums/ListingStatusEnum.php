<?php

namespace App\Enums;

enum ListingStatusEnum:int
{
    case ENDED = 0;
    case SOON_ENDING = 1;
    case ACTIVE = 2;
}
