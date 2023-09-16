<div class="d-flex align-items-center justify-content-center mt-5">
    <div style="width: 25rem;">
        <form wire:submit.prevent='store'>
            <div class="mb-3">
                <h4>create product : </h4>
            </div>
            <div class="mb-3">
                <label class="form-label" for="title">title</label>
                <input type="text" wire:model.defer='title' id="title" class="form-control @error('title') is-invalid @enderror">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="price">price</label>
                <input type="number" wire:model.defer='price' id="price" class="form-control @error('price') is-invalid @enderror">
                @error('price')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="description">description</label>
                <textarea rows='3' wire:model.defer='description' id="description" class="form-control @error('description') is-invalid @enderror"></textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">image</label>
                <input type="file" wire:model.defer='image' id="image" class="form-control @error('image') is-invalid @enderror">
                @error('image')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
                <div wire:loading wire:target='image' class="mt-3">Uploading ...</div>
                @if ($image)
                    <img width="200" class="mt-3" src="{{$image->temporaryUrl()}}">
                @endif
            </div>

            <button wire:loading.attr='disabled' class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
