<div>

    <h5 class="text-center mb-4">Register</h5>
    <form wire:submit.prevent='register'>
        <div class="mb-3">
            <input type="text" wire:model="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name">
            @error('name')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="text" wire:model="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email">
            @error('email')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="password" wire:model="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password">
            @error('password')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <input type="password" wire:model="confirmPassword" class="form-control" name="confirmPassword"  placeholder="Confirm Password">
        </div>


        <button type="submit" class="btn btn-dark d-flex m-auto">
            Register
            <div wire:loading wire:target="register">
                <div class="spinner-border spinner-border-sm ms-2" role="status"></div>
            </div>
        </button>
    </form>
</div>
