@extends('layouts.master')
@section('title')
{{'User profile'}}
@endsection
@section('content')

<div class="row products">
     <div class="col-md-4 col-md-offset-4">
        <h2>Products</h2>
        <div class="table-responsive">          
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
              <th>Lastname</th>
              <th>Product</th>
            </tr>
          </thead>
          <tbody>
            @foreach($users->getCollection()->all() as $user)    
                <tr>
                  <td>{{ $user->ime }}</td>
                  <td>{{ $user->surname}}</td>
                  <td>{{ $user->ime_proizvoda}}</td>
                </tr>
            @endforeach
          </tbody>
        </table>
        </div>
       
        
        @if($users->isEmpty())
           {{ 'No products.' }}
        @endif
        
        {{ $users->links() }}
    </div>
</div>
@endsection

@section('scripts')

@endsection
