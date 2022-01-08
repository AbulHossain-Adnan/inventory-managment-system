@component('mail::message')

# Product Stock low Quantity Alert,

  Product ID:{{ $products->id }}<br>
  Category ID:{{ $products->category_id }}<br>
  SubCategory ID:{{ $products->subcategory_id }}<br>
  Product Name:{{ $products->name }}<br>
  Product price:{{ $products->price }}<br>
 Product Quantity:{{ $products->quantity }}<br>


@component('mail::button', ['url' => 'http://127.0.0.1:8000/product'])

Product Stock

@endcomponent

   

Thanks,<br>

{{ config('app.name') }}

@endcomponent
