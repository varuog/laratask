<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\Service\TaskService;

class TaskController extends Controller {

    private $taskService;

    /**
     * Authenticate each action
     * @param TaskService $taskService
     */
    public function __construct(TaskService $taskService) {
        $this->taskService = $taskService;
        //All Task controler action should be taken from authenticated user
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sheet, $priority='any') {
        /* @var $tasks \Illuminate\Database\Eloquent\Builder */
        $tasks=$this->taskService->show($priority, $sheet);
        $totalCountByPriority= $this->taskService->getPriorityCount($sheet);
        return view('tasks', ['tasks' => $tasks, 'totalByPriority' => $totalCountByPriority]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
