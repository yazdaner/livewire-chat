<div>
    <form class="row g-3" wire:submit.prevent='$refresh'>
        <div class="col-auto">
          <input type="text" class="form-control" placeholder="title" wire:model.defer='title'>
        </div>
        <div class="col-auto">
            <select class="form-select" wire:model.defer='status'>
                <option value="" selected>status</option>
                <option value="pending">pending</option>
                <option value="completed">completed</option>
              </select>
        </div>
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-3">Filter</button>
        </div>
      </form>

    <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
         @foreach ($tasks as $index => $task)
         <tr>
            <th>{{$tasks->firstItem() + $index}}</th>
            <td>{{$task->title}}</td>
            <td>{{$task->description}}</td>
            <td>{{$task->status}}</td>
            <td>
                <div class="d-flex ">
                    <button class="btn btn-sm btn-success me-3"  wire:click="$emitTo('task.edit','showEditForm',{{$task->id}})">Edit</button>
                    <button type="button" class="btn btn-sm btn-danger" wire:click='delete({{$task->id}})'>Delete</button>
                </div>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
      {{$tasks->links()}}
</div>
