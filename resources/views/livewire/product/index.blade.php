<div class="my-5">
    <div class="row">
        <div>
            <a href="{{route('product.create')}}" class="btn btn-dark mb-4">Create Product</a>
        </div>
        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{env('PRODUCTS_IMAGE_PATH').$product->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">{{$product->title}}</h5>
                    <p class="card-text">{{$product->description}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <button class="btn btn-success" wire:click='addToCart({{$product->id}})' wire:loading.attr='disabled' wire:target='addToCart({{$product->id}})'>
                                Add to cart
                                <div wire:loading wire:target='addToCart({{$product->id}})' class="spinner-border text-white spinner-border-sm ms-2" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </button>
                            <div class="">{{number_format($product->price)}}</div>
                        </div>
                </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
