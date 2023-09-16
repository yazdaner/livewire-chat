<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;

class Create extends Component
{

    public $title,$description,$status;

    protected $rules = [
        'title' => 'required|max:255|string',
        'description' => 'required|string',
        'status' => 'required|string',
    ];

    public function create()
    {
        $this->validate();
        Task::create([
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status
        ]);
        $this->emitTo('task.notification','flashMessage','success','Task Created');
        $this->emitTo('task.index','refresh');
        $this->reset(['title','description','status']);
    }
    public function render()
    {
        return view('livewire.task.create');
    }
}
