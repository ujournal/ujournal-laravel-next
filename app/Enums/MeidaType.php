<?php

namespace App\Enums;

enum MediaType: string
{
    case JPEG = "jpeg";
    case PNG = "png";
    case GIF = "gif";
    case VIDEO = "video";
    case AUDIO = "audio";
}
