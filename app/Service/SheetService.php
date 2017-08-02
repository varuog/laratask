<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Service;

use App\Sheet;
use App\Task;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

/**
 * Description of TaskService
 *
 * @author gourav sarkar
 */
class SheetService {

    const ITEM_PER_PAGE = 15;

    public function show($priority, $sheet) {
        $userID = Auth::id();
        $tasks = Sheet::where('user_id', '=', $userID)
                ->find($sheet)
                ->tasks();


        if ($priority != 'any') {
            $tasks = $tasks->where('priority', '=', $priority);
        }
        $tasks = $tasks->paginate(static::ITEM_PER_PAGE);
        return $tasks;
    }

    public function fetchAll() {

        $sheets = Sheet::where('user_id', '=', Auth::id())->get();
        return $sheets;
    }

    public function getTaskCount($sheet) {
        $totalTasks = $tasks = Sheet::find($sheet)->tasks()->count();
        return $totalTasks;
    }

    public function create(array $sheetData) {
        $sheet = new Sheet();
        $sheet->title = $sheetData['title'];
        $sheet->description = $sheetData['description'];
        $sheet->created_at = \Carbon\Carbon::now();
        $sheet->created_at = \Carbon\Carbon::now();
        $sheet->user_id = Auth::id();

        return $sheet->save();
    }

}
