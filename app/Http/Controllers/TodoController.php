<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function create(Request $request)
    {
        $caretakerId = $request->input('caretaker_id');
        return view('todos.create', compact('caretakerId'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'caretaker_id' => 'required|integer',
            'task_1' => 'nullable|string',
            'task_2' => 'nullable|string',
            'task_3' => 'nullable|string',
            'task_4' => 'nullable|string',
            'task_5' => 'nullable|string',
            'task_6' => 'nullable|string',
            'task_7' => 'nullable|string',
            'task_8' => 'nullable|string',
            'task_9' => 'nullable|string',
            'task_10' => 'nullable|string',
            'task_11' => 'nullable|string',
            'task_12' => 'nullable|string',
            'task_13' => 'nullable|string',
            'task_14' => 'nullable|string',
            'task_15' => 'nullable|string',
            'task_16' => 'nullable|string',
            'task_17' => 'nullable|string',
            'task_18' => 'nullable|string',
            'task_19' => 'nullable|string',
            'task_20' => 'nullable|string',
        ]);

        $validatedData['user_id'] = auth()->id();

        Todo::create($validatedData);

        return redirect()->route('userdashboard')->with('success', 'To-Do list has been created successfully.');
    }

    // In TodoController.php
    public function showClientTodoList($id)
    {
        // Fetch to-do tasks for the given user ID
        $todos = Todo::where('user_id', $id)->get();
    
       
        // Pass both todos and clientId to the view
        return view('client_todo_list', ['todos' => $todos, 'clientId' => $id]);
    }
    
    }



