<?php

namespace App\Constants;

enum Progress: int {
    case RUNNING = 0;
    case FINISHED = 1;
    case CANCELED = 2;
}
