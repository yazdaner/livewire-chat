<div>
    <div wire:ignore.self class="modal fade" id="editModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Task</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent='update'>
                <div class="modal-body">


                        <div class="mb-3 mt-4">
                            <input type="text" wire:model.defer="title"
                                class="form-control @error('title') is-invalid @enderror" name="title"
                                placeholder="Title">
                            @error('title')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <textarea name="description" wire:model.defer='description'
                                class="form-control @error('description') is-invalid @enderror" rows="5"
                                placeholder="Description"></textarea>
                            @error('description')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <select name="status" wire:model.defer='status'
                                class="form-select @error('status') is-invalid @enderror">
                                <option value=''>status</option>
                                <option value="pending">pending</option>
                                <option value="completed">completed</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>
