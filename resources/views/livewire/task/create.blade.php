<div>
    <h5>Create :</h5>
    <form wire:submit.prevent='create'>


        <div class="mb-3 mt-4">
            <input type="text" wire:model.defer="title" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Title">
            @error('title')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <textarea name="description" wire:model.defer='description' class="form-control @error('description') is-invalid @enderror" rows="5" placeholder="Description"></textarea>
            @error('description')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <select name="status" wire:model.defer='status' class="form-select @error('status') is-invalid @enderror">
                <option value=''>status</option>
                <option value="pending">pending</option>
                <option value="completed">completed</option>
            </select>
            @error('status')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>

    </form>
</div>
