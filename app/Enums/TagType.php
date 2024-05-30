<?php

namespace App\Enums;

enum TagType: string
{
    case USER = "user";
    case TOPIC = "topic";
    case MODERATION = "moderation";
    case ADULT = "adult";
}
