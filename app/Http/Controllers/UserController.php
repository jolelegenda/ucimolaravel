<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Product;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('user.signup');
    }
   public function postSignup(Request $request){
        $this->validate($request, [
            'ime'=>'required|min:4|max:50',
            'prezime'=>'required|min:4|max:50',
            'adresa'=>'required|min:5|max:50',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:6|max:25',
            'repassword' => 'required|min:6|max:25|same:password'
        ]);

        $user = new User([
            'name'=>$request->input('ime'),
            'surname'=>$request->input('prezime'),
            'address'=>$request->input('adresa'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        
        if($user->save()){
            Auth::login($user);
           return redirect()->route("user.profile");
           // return view('user.signup')->with('message', 'Success!');
        }
        //return redirect()->route("user.index")->with('message', 'Success!');
        else{
            return redirect()->route("user.index")->with('message', 'greska!');
        //return view('user.signup')->with('message', 'Greksa!');
        }

        //return redirect()->route('user.index');
       
    }
    public function  login()
    {
       return view('user.signin');
    }
    public function postLogin(Request $request)
    {
        $this->validate($request, [
            
            'email' => 'email|required',
            'password' => 'required|min:6|max:25',
            
        ]);
        if(Auth::attempt(["email"=>$request->input('email'),"password"=>$request->input('password')]))
        {
           return redirect()->route('user.profile');
        }
        return redirect()->back();
        
    }
    public function profile(Request $request)
    {
      //$products = User::find(Auth::user()->id)->getProductByUser;
      //var_dump(Product::find(3)->getProductByUser); die;
      //var_dump(User::find(Auth::user()->id)->getProductByUser()->paginate(1));
     // $products = User::find(Auth::user()->id)->getProductByUser()->paginate(1);
      //$products = User::all()->getAllUsersProducts()->paginate(10);
       // $products = User::with('getAllUsersProducts')->get();
       
       
      $products = User::find(Auth::user()->id)->getAllUsersProducts()->paginate(1);
       
       if ($request->ajax()) {
            return view('user.ajaxpagination', array('products' => $products))->render();
        }
      return view('user.profile',["user"=>Auth::user(),'products' => $products]);
    }
    
    public function getProducts(){
        $users = User::getAll();
        return view('user.products',["user"=>Auth::user(),'users' => $users]);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }
    public function updateUser(Request $request)
    {
          $user = User::findOrFail($request->input('userId'));
          $user->name=$request->input('name');
          $user->surname=$request->input('surname');
          $user->address=$request->input('address');
          $res=$user->save();
          if($res)
          {
              return response()->json(['error'=>false,'message'=>'uspesno izmenjeno']);
          }
          else
          {
              return response()->json(['error'=>true,'message'=>'doslo je do greske']);
          }
    }
}
