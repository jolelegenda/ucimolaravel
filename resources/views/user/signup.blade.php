@extends('layouts.master')
@section('title')
{{'register'}}
@endsection
@section('content')
<div class="row">
   <div class="col-md-4 col-md-offset-4">
      <h1>Sign up</h1>

     @if(count($errors) > 0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
     @endif
      
  @if(session('message'))
  {{session('message')}}
  @endif
     <form action="{{ route('user.signup') }}" method="post">
         <div class="form-group">
         <label for="ime">Ime</label>
         <input type="text" id="ime" name="ime" class="form-control">
       </div>
         <div class="form-group">
         <label for="prezime">Prezime</label>
         <input type="text" id="prezime" name="prezime" class="form-control">
       </div>
         <div class="form-group">
         <label for="adresa">Adresa</label>
         <input type="text" id="adresa" name="adresa" class="form-control">
       </div>
         <div class="form-group">
           <label for="email">E-mail</label>
           <input type="text" id="email" name="email" class="form-control">
         </div>
       <div class="form-group">
         <label for="password">Password</label>
         <input type="password" id="password" name="password" class="form-control">
       </div>
         <div class="form-group">
         <label for="password">Re - Password</label>
         <input type="password" id="repassword" name="repassword" class="form-control">
       </div>
       <button type="submit" class="btn btn-primary">Sign up</button>
       {{ csrf_field() }}
     </form>
   </div>
</div>

@endsection