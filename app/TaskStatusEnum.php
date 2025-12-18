<?php

namespace App;

enum TaskStatusEnum:int
{
    case New = 0;
    case InProgress = 1;
    case Completed = 2;
    case Cancelled = 3;
    case InPause = 4;
}
