<div class="col-md-4 col-md-offset-4">
         <h2>Products</h2>
        @foreach($products->getCollection()->all() as $product)
        {{ $product->name }} <br>
        @endforeach
        
        @if($products->isEmpty())
           {{ 'No products.' }}
        @endif
        
        {{ $products->links() }}
</div>