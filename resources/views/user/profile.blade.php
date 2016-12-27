@extends('layouts.master')
@section('title')
{{'User profile'}}
@endsection
@section('content')
<div class="row">
   <div class="col-md-4 col-md-offset-4">
      <h1>User profile</h1>
      <div class="form-group">
         <label for="ime">Ime</label>
         <input type="text" id="ime" name="ime" class="form-control" value="{{$user->name}}">
       </div>
         <div class="form-group">
         <label for="prezime">Prezime</label>
         <input type="text" id="prezime" name="prezime" class="form-control" value="{{$user->surname}}">
       </div>
         <div class="form-group">
         <label for="adresa">Adresa</label>
         <input type="text" id="adresa" name="adresa" class="form-control" value="{{$user->address}}">
       </div>
         <div class="form-group">
           <label for="email">E-mail</label>
           <input disabled type="text" id="email" name="email" class="form-control" value="{{$user->email}}">
           <input type='hidden' id='userId' value="{{$user->id}}">
         </div>
       
       <button type="button" id='izmeniBtn' class="btn btn-primary">Update</button>
       {{ csrf_field() }}
   </div>
</div>
<div class="row">
     <div class="col-md-4 col-md-offset-4">
         <h2>Products</h2>
        @foreach($products as $product)
        {{ $product->name }} <br>
        @endforeach
        
        @if(empty($products->items))
           {{ 'No products.' }}
        @endif
    </div>
</div>
<script>
   window.onload=function(){
       $("#izmeniBtn").click(function(){
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        })
       // alert(('meta[name="_token"]').attr('content'));
         var formData = {
            name: $('#ime').val(),
            surname: $('#prezime').val(),
            address: $('#adresa').val(),
            userId: $('#userId').val()
        }
        $.ajax({

            type: 'POST',
            url: '/update',
            data: formData,
            dataType: 'json',
           // method:'POST',
            success: function (data) {
               // console.log(data);
               alert(data.message);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
       })
   }
</script>
@endsection