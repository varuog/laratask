<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model {

    private $priority;
    private $dueDate;
    private $completetionDate;
    private $title;
    private $content;
    private $sheet;
    private $priorityClass;
    protected $perPage = 5;

    function getPriority() {
        return $this->priority;
    }

    function getDueDate() {
        return $this->dueDate;
    }

    function getCompletetionDate() {
        return $this->completetionDate;
    }

    function getTitle() {
        return $this->title;
    }

    function getContent() {
        return $this->content;
    }

    function getSheet() {
        return $this->sheet;
    }

    function setPriority($priority) {
        $this->priority = $priority;
    }

    function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }

    function setCompletetionDate($completetionDate) {
        $this->completetionDate = $completetionDate;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setContent($content) {
        $this->content = $content;
    }

    function setSheet($sheet) {
        $this->sheet = $sheet;
    }

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
