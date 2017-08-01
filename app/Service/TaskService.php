<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use App\Task;
use Illuminate\Support\Facades\DB;

/**
 * Description of TaskService
 *
 * @author gourav sarkar
 */
class TaskService {

    const ITEM_PER_PAGE = 15;

    public function show($priority, $sheet) {

        $tasks = Task::where('sheet', '=', $sheet);
        if ($priority != 'any') {
            $tasks = $tasks->where('priority', '=', $priority);
        }
        $tasks = $tasks->paginate(static::ITEM_PER_PAGE);
        return $tasks;
    }

    public function getPriorityCount($sheet) {
        $totalCountByPriority = DB::table('tasks')
                ->select('priority', DB::raw('count(*) as totalTask'))
                ->groupBy('priority')
                ->where('sheet', '=', $sheet)
                ->get()
                ->toArray();


       $totalCountByPriority=array_column($totalCountByPriority, 'totalTask', 'priority');
       $totalCountByPriority['all']= array_sum($totalCountByPriority);
       return $totalCountByPriority;
    }

}
