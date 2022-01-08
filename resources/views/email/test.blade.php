@component('mail::message')

# Product Stock low Quantity Alert,




@component('mail::button', ['url' => 'http://127.0.0.1:8000/product'])

Product Stock

@endcomponent

   

Thanks,<br>

{{ config('app.name') }}

@endcomponent
