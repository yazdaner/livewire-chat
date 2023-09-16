<div class="card-body">
    <form wire:submit.prevent='create'>
        <div class="mb-3">
            <textarea wire:model="text" class="form-control" rows="3"></textarea>
        </div>
        <div class="d-grid">
            <button class="btn btn-secondary btn-block" type="submit"> Send </button>
        </div>
    </form>
</div>
