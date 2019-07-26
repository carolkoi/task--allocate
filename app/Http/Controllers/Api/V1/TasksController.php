<?php

namespace App\Http\Controllers\Api\V1;

use App\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\Task as TaskResource;
use App\Http\Requests\Admin\StoreTasksRequest;
use App\Http\Requests\Admin\UpdateTasksRequest;
use Illuminate\Http\Request;



class EmployeesController extends Controller
{
    public function index()
    {
        return new TaskResource(Task::with(['employee'])->get());
    }

    public function show($id)
    {
        $task = Task::with(['employee'])->findOrFail($id);

        return new TaskResource($task);
    }

    public function store(StoreTasksRequest $request)
    {
        $task = Task::create($request->all());
        

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(201);
    }

    public function update(UpdateTasksRequest $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        

        return (new TaskResource($task))
            ->response()
            ->setStatusCode(202);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response(null, 204);
    }
}
