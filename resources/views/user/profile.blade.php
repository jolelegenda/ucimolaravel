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
<div class="row products">
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
</div>
@endsection

@section('scripts')
<script>
       $("#izmeniBtn").click(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('[name="_token"]').val()
            }
        })
      
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
            success: function (data) {
               alert(data.message);

            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    })
    
    $('body').on('click', '.pagination a', function(e) {
        e.preventDefault();

        $('#load a').css('color', '#dfecf6');
        $('#load').append('<img style="position: absolute; left: 0; top: 0; z-index: 100000;" src="/images/loading.gif" />');

        var url = $(this).attr('href');
        getArticles(url);
        window.history.pushState("", "", url);
    });

    function getArticles(url) {
        $.ajax({
            url : url
        }).done(function (data) {
            $('.products').html(data);
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
     
</script>
@endsection
