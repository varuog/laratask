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

    public function show($priority) {

        if ($priority != 'any') {
            $tasks = Task::where('priority', '=', $priority);
        } else {
            $tasks = Task::all();
        }

        $tasks = $tasks->paginate(static::ITEM_PER_PAGE);
        return $tasks;
    }

    public function getPriorityCount($sheet) {
        $defaultTotalCount = ['urgent' => 0, 'high' => 0, 'medium' => 0, 'low' => 0, 'all' => 0];
        $totalCountByPriority = DB::table('tasks')
                ->select('priority', DB::raw('COUNT(*) as totalTask'))
                ->where('sheet_id', '=', $sheet)
                ->groupBy('priority')
                ->get()
                ->toArray();


        if (!empty($totalCountByPriority)) {
            $totalCountByPriority = array_column($totalCountByPriority, 'totalTask', 'priority');
            if (!empty($totalCountByPriority)) {
                $totalCountByPriority['all'] = array_sum($totalCountByPriority);
                return array_merge($defaultTotalCount, $totalCountByPriority);
            }
        }
        return $defaultTotalCount;
    }

    public function create($sheet, array $taskData) {
        if (!empty($taskData['completionDate'])) {
            $taskData['completionDate'] = \Carbon\Carbon::now();
        }
        return \App\Sheet::find($sheet)
                        ->tasks()
                        ->create($taskData);
    }

}
