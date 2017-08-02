<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    private $sheet;
    
    protected $fillable = [
        'dueDate'
        , 'priority'
        , 'title'
        , 'content'
    ];

    /**
     * getter for priorityClass attribute
     * @param type $value
     * @return string
     */
    public function getPriorityClassAttribute($value) {
        switch ($this->getAttribute('priority')) {
            case 'urgent':
                return 'danger';
            case 'high':
                return 'warning';
            case 'medium':
                return 'success';
        }

        return 'info';
    }

}
