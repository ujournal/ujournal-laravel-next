<?php

namespace App\Enums;

enum EmbedType: string
{
    case IMAGE = "image";
    case VIDEO = "video";
    case AUDIO = "audio";
    case YOUTUBE = "youtube";
    case WEBPAGE = "webpage";
}
