<?php

namespace App\Constants;

enum Status: int {
    case PENDING = 1;
    case PAID = 2;
    case CANCEL = 3;
}
