<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use LDAP\Result;
use Livewire\Component;

class Edit extends Component
{
    public $title,$description,$status;
    public $task;

    protected $listeners = ['showEditForm'];

    public function showEditForm(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->status = $task->status;
        $this->description = $task->description;
        $this->emit('showEditModal');
    }
    protected $rules = [
        'title' => 'required|max:255|string',
        'description' => 'required|string',
        'status' => 'required|string',
    ];
    public function update()
    {
        $this->validate();
        $this->task->update([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
        ]);
        $this->emitTo('task.index','refresh');
        $this->emit('hideEditModal');
        $this->emitTo('task.notification','flashMessage','success','Task Edited');

    }

    public function render()
    {
        return view('livewire.task.edit');
    }
}
