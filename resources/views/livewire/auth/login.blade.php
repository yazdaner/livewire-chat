<div>

    <h5 class="text-center mb-4">Login</h5>
    <form wire:submit.prevent='login'>

        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{session('error')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

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
            <input type="checkbox" wire:model="rememberme" class="form-check-input" name="rememberme" id="rememberme">
            <label class="form-check-label" for="rememberme">
                Remember Me
              </label>
        </div>

        <div wire:click="$emitUp('showRegisterFormEvent',true)" class="mb-3 text-center" style="cursor: pointer">
           <span>Dont have account ? </span>
        </div>



        <button type="submit" class="btn btn-dark d-flex m-auto">
            Login
            <div wire:loading wire:target="login">
                <div class="spinner-border spinner-border-sm ms-2" role="status"></div>
            </div>
        </button>
    </form>
</div>
