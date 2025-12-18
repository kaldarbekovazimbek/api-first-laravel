<?php

namespace App;

enum TaskPriorityEnum:int
{
    case Low = 3;
    case Medium = 2;
    case High = 1;
    case Urgent = 0;
}
