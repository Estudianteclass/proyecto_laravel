<?php

namespace App\Livewire;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TaskComponent extends Component
{
    public $user;
    public $tasks = [];
    public $modal = false;
    public $title;
    public $description;
    public $id;
    public $edittask;
    public $user_id;
    public $permission;

    public function render()
    {
        return view('livewire.task-component');
    }

    public function mount()
    {
        $this->users=User::where('id','!=',auth()->user()->id)->get();
        $this->user = Auth::user()->name;
        $this->getTask();
    }

    public function getTask()
    {
        $this->tasks = Auth::user()->tasks;

    }

    public function clearFields()
    {
        $this->title = '';
        $this->description = '';
    }

    public function openCreateModal()
    {
        $this->clearFields();
        $this->modal = true;
    }

    public function closeCreateModal()
    {
        $this->modal = false;
    }

    public function createTask()
    {
        Task::updateOrCreate(
            ['id' => $this->editingTask->id],
            [
                'user_id' => Auth::id(),
                'title' => $this->title,
                'description' => $this->description
            ]
        );
        $this->clearFields();
        $this->closeCreateModal();
        $this->getTask();
    }
    public function deleteTask(Task $task)
    {
        $task->delete();
        $this->clearFields();
        $this->closeCreateModal();
        $this->getTask();
    }
}
