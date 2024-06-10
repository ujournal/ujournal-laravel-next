<?php

namespace App\Enums;

enum TagType: string
{
    case GENERIC = "generic";
    case TOPIC = "topic";
    case MODERATION = "moderation";
    case NSFW = "nsfw";
}
