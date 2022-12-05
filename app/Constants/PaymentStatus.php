<?php

namespace App\Constants;

enum PaymentStatus: string {
    case PENDING = "pending";
    case CAPTURE = "capture";
    case SETTLEMENT = "settlement";
    case DENY = "deny";
    case CANCEL = "cancel";
    case EXPIRE = "expire";
    case FAILURE = "failure";
    case REFUND = "refund";
}
