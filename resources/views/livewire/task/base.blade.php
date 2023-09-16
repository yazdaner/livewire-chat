<div>
    @section('script')
    <script>
        const myModal = new bootstrap.Modal(document.getElementById('editModal'));

        Livewire.on('showEditModal', () => {
             myModal.show()
        });
        Livewire.on('hideEditModal', () => {
             myModal.hide()
        })

    </script>
    @endsection
    <div class="row">
        <div class="d-flex m-auto justify-content-center my-4">
            <livewire:task.notification />
        </div>
        <div class="row">
            <div class="col-md-4 mb-5">
                <livewire:task.create />
            </div>
            <div class="col-md-8">
                <livewire:task.index />
            </div>
        </div>
    </div>
    <livewire:task.edit />
</div>
