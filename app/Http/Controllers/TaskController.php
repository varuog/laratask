<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Service\TaskService;
use App\Service\SheetService;

class TaskController extends Controller {

    private $taskService;
    private $sheetService;

    /**
     * Authenticate each action
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService, SheetService $sheetService) {
        $this->taskService = $taskService;
        $this->sheetService = $sheetService;
        //All Task controler action should be taken from authenticated user
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sheet, $priority = 'any') {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($sheet) {

        $sheets = $this->sheetService->fetchAll();
        $priorityOptions = ['urgent', 'high', 'medium', 'low'];
        return view('task-create', ['sheets' => $sheets, 'priorityOptions' => $priorityOptions, 'sheet'=>$sheet]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $sheet) {
        $sheets = $this->sheetService->fetchAll();
        $priorityOptions = ['urgent', 'high', 'medium', 'low'];
        $this->taskService->create($sheet, $request->all());
        return view('task-create', ['sheets' => $sheets, 'priorityOptions' => $priorityOptions, 'sheet'=>$sheet]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task) {
        //
    }

}
