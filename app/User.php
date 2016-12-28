<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','surname','address', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
     public function getProductByUser(){
       
       return $this->hasMany('App\Product', 'user_id')->orderBy('id', 'DESC');
    }
    
    public function getAllUsersProducts(){
        return $this->belongsToMany('App\Product', 'user_product', 'user_id', 'product_id');
    }
    
    public static function getAll(){
         $products = DB::table('user_product')
          ->join('users', 'users.id', '=', 'user_product.user_id')
          ->join('products', 'products.id', '=', 'user_product.product_id')
          ->select('users.name as ime','users.surname', 'users.address', 'users.email', 'products.name as ime_proizvoda' )
          ->paginate(3);
         return $products;
    }
}
