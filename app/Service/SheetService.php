<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use App\Sheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Description of TaskService
 *
 * @author gourav sarkar
 */
class SheetService {

    const ITEM_PER_PAGE = 15;
    private $taskService;
    
    public function __construct(TaskService $taskService) {
        $this->taskService=$taskService;
    }
    
    public function show($priority, $sheet)
    {
       return $this->taskService->show($priority, $sheet);
    }

    public function fetchAll() {

        $sheets = Sheet::where('user', '=', Auth::id())->get();
        return $sheets;
    }

    public function getTaskCount($sheet) {
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
