<?php

namespace App\Enums;

enum SubscriptionType: string
{
    case SUBSCRIBED = "subscribed";
    case UNSUBSCRIBED = "unsubscribed";
    case IGNORED = "ignored";
}
