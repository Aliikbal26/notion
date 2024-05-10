<?php

namespace App\Http\Controllers;

use App\Models\Priority;
use App\Services\PriorityService;
use Illuminate\Http\Request;

class PriorityController extends Controller
{
    //
    private PriorityService $prioritySerice;

    public function __construct(PriorityService $prioritySerice)
    {
        $this->prioritySerice = $prioritySerice;
    }

    public function priority()
    {
        $prioriy = Priority::all();
        return view('priority.priority', [
            "title" => "Halaman Priority",
            "priority" => $prioriy
        ]);
    }

    public function addPriority(Request $request)
    {
        $name = $request->input("name");
        $description = $request->input("description");
        if (empty($name)) {
            $prioriy = $this->prioritySerice->getPriority();
            return response()->view("priority.priority", [
                "title" => "Priority",
                "priority" => $prioriy,
                "error" => "Todo is required"
            ]);
        }
        $this->prioritySerice->savePriority($name, $description);
        return redirect()->action([PriorityController::class, 'priority']);
    }
    public function removePriority()
    {
        return view('priority.priority', [
            "title" => "Halaman Priority"
        ]);
    }
}
