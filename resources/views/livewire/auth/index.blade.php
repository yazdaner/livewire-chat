<div class="d-flex align-items-center justify-content-center">
    <div class="card mt-5 shadow" style="width: 25rem;">
        <div class="card-body">
            @if ($showRegisterForm)
                <livewire:auth.register />
            @else
                <livewire:auth.login />
            @endif
        </div>
    </div>
</div>
