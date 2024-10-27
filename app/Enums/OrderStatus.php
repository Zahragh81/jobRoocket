<?php

namespace App\Enums;

enum OrderStatus: int
{
    case REJECT = 0;
    case PENDING = 1;
    case CANCELLED = 2;
    case COMPLETED = 3;
}
