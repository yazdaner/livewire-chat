<div class="row my-5">
    <table class="table table-hover table-responsive">
        <thead>
          <tr>
            <th>Product</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
        @foreach (\Cart::getContent()->sort() as $product)
        <tr>
            <td class="align-middle">
                <div class="row">
                    <div class="col-lg-2">
                        <img class="w-100" src="{{env('PRODUCTS_IMAGE_PATH').$product->associatedModel->image}}" alt="">
                    </div>
                    <div class="col-lg-10">
                        <h4>{{$product->name}}</h4>
                        <p class="text-break">{{$product->associatedModel->description}}</p>
                    </div>
                </div>
            </td>
            <td class="align-middle">{{number_format($product->price)}}</td>
            <td class="align-middle">
                <div class="d-flex">
                    <button type="button" class="btn btn-sm btn-dark" wire:click='decrement({{$product->id}})'>-</button>
                    <span class="mx-2">{{$product->quantity}}</span>
                    <button type="button" class="btn btn-sm btn-dark" wire:click='increment({{$product->id}})'>+</button>
                </div>
            </td>
            <td class="align-middle">{{number_format($product->price * $product->quantity)}}</td>
            <td class="align-middle"><button type="button" class="btn btn-sm btn-danger" wire:click='remove({{$product->id}})'>Delete</button></td>
          </tr>
        @endforeach

        </tbody>
      </table>
      <div class="d-flex justify-content-between">
        <button class="btn btn-dark" wire:click='clearCart()'>Clear Cart</button>
        <div class="d-flex align-items-center;">
            <h5>Total : {{number_format(Cart::getTotal())}}</h5>
            <button class="btn btn-success ms-3">Checkout</button>
        </div>
      </div>
</div>
