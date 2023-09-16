<?php

namespace App\Http\Livewire\Task;

use App\Models\Task;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $title,$status;

    protected $listeners = ['refresh' => '$refresh'];

    protected $paginationTheme = 'bootstrap';

    public function delete(Task $task)
    {
        $task->delete();
        $this->emitTo('task.notification','flashMessage','success','Task Removed');
    }

    public function render()
    {
        $title = $this->title;
        $status = $this->status;

        return view('livewire.task.index',[
            'tasks' => Task::when($title,function($query,$title)
            {
                return $query->where('title','LIKE', '%'. $title .'%');
            })->when($status,function($query,$status)
            {
                return $query->where('status',$status);
            })->latest()->paginate(8)
        ]);
    }
}
