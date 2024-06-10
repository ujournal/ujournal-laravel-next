<?php

namespace App\Enums;

enum EmbedType: string
{
    case WEBPAGE = "webpage";
    case IMAGE = "image";
    case VIDEO = "video";
    case AUDIO = "audio";
    case YOUTUBE = "youtube";
}
