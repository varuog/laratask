<?php

namespace App\Http\Controllers;

use App\Sheet;
use Illuminate\Http\Request;
use App\Service\SheetService;
use App\Service\TaskService;

class SheetController extends Controller
{
    
    private $sheetService;
    private $taskService;
    
    public function __construct(SheetService $sheetService, TaskService $taskService) {
        $this->sheetService = $sheetService;
        $this->taskService =$taskService;
        //All Task controler action should be taken from authenticated user
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($sheet, $priority)
    {
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function show(Sheet $sheet, $priority)
    {
         $tasks=$this->sheetService->show($priority, $sheet->id);
        $totalCountByPriority= $this->taskService->getPriorityCount($sheet->id);
        $sheets= $this->sheetService->fetchAll();
        return view('tasks', ['tasks' => $tasks, 'totalByPriority' => $totalCountByPriority, 'sheets' => $sheets]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function edit(Sheet $sheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sheet $sheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sheet  $sheet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sheet $sheet)
    {
        //
    }
}
