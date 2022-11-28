<?php

namespace App\Constants;

enum Status: int {
    case PENDING = 0;
    case PAID = 1;
    case CANCEL = 2;
}
