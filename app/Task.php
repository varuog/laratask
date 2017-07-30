<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    private $priority;
    private $dueDate;
    private $completetionDate;
    private $title;
    private $content;
    private $sheet;
}
