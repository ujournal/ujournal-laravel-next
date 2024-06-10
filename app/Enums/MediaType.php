<?php

namespace App\Enums;

enum MediaType: string
{
    case IMAGE = "image";
    case GIF = "gif";
    case VIDEO = "video";
    case AUDIO = "audio";
}
