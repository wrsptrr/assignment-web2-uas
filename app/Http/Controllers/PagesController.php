<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Size;
use App\Tmp;
use App\Purchase;
use App\PurchaseDetail;
use App\User;
use Auth;
use PDF;

class PagesController extends Controller
{
    // Public
    public function index()
    {
        $product    =   Product::orderBy('id', 'desc')->take(4)->get();
        $category   =   Category::orderBy('id', 'asc')->take(6)->get();
        return view('public/home', compact('product','category')); 
    }

    public function about()
    {
        return view('public/about');
    }

    public function product(Request $request)
    {
        $search     =   $request->search;
        $product    =   Product::orderBy('id', 'desc')->where('product_name','like',"%".$search."%")->paginate(20);
        return view('public/product', compact('product'));
    }

    public function productDetail($id)
    {
        $product    =   Product::all()->where('id', $id);
        $category   =   Product::select('category_id')->where('id', $id)->get();

        foreach ($category as $data) 
        {
            $cek = $data->category_id;
        }

        $size       =   Size::all()->where('category_id', $cek);
        return view('public/product-detail', compact('product','size'));
    }

    public function category()
    {
        $category    =   Category::all();
        return view('public/category', compact('category'));
    }

    public function categoryDetail($category)
    {
        $cat        =   Category::where('category', $category)->get();
        $data       =   $cat->first()->id;
        $categories =   $cat->first()->category;
        $product    =   Product::where('category_id', $data)->get();

        return view('public/category-detail', compact('product', 'categories'));
    }

    public function cart()
    {
        $user       =   Auth::user();
        $id_user    =   $user->id;
        $tmp        =   Tmp::all()->where('user_id', $id_user);

        return view('public/cart', compact('tmp'));
    }

    public function addCart(Request $request, $id)
    {
        $user       =   Auth::user();
        $id_user    =   $user->id;
        $form_data  =   array(
            'user_id'       =>  $id_user,
            'product_id'    =>  $id,
            'size'          =>  $request->size,
            'qty'           =>  $request->qty
            );

        Tmp::create($form_data);
        
        return redirect('cart')->with('success','Product has been added to cart !');
    }

    public function deleteCart($id)
    {
        Tmp::find($id)->delete();
        
        return redirect('cart')->with('success','Product has been removed from cart !');
    }

    public function checkout()
    {
        $user       =   Auth::user();
        $id_user    =   $user->id;
        $tmp        =   Tmp::all()->where('user_id', $id_user);
        
        return view('public/checkout', compact('user', 'tmp'));
    }
    public function checkoutFinish(Request $request)
    {
        $user       =   Auth::user();
        $id_user    =   $user->id;
        $date       =   date('Y-m-d');
        $form_data  =   array(
            'user_id'       =>  $id_user,
            'date'          =>  $date,
            'payment'       =>  $request->pm,
            'total'         =>  $request->total
            );

        $order      =   Purchase::create($form_data);
        $last_id    =   $order->id;

        $tmp        =   Tmp::all()->where('user_id', $id_user);
        
        if ($order) 
        {
            foreach ($tmp as $data) 
            {
                $data_tmp   =   array(
                    'purchase_id'   =>  $last_id,
                    'product_id'    =>  $data->product_id,
                    'size'          =>  $data->size,
                    'qty'           =>  $data->qty
                    );
                    
                PurchaseDetail::create($data_tmp);
            }
            
            Tmp::where('user_id', $id_user)->delete();

            return redirect('finish');
        }
        else
        {
            return back(); 
        }
        
        
    }
    public function finish()
    {
        return view('public/checkout-success');
    }

    public function account()
    {
        $user   =   Auth::user();
        return view('public/account', compact('user'));
    }

    public function editAccount()
    {
        $user   =   Auth::user();
        return view('public/account-edit', compact('user'));
    }

    public function updateAccount(Request $request)
    {
        $user           =   Auth::user();
        $id_user        =   $user->id;
        $current_email  =   $user->email;
        $new_email      =   $request->email;

        if ($current_email == $new_email) 
        {
            $this->validate($request,[
                'name'      => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255'],
                'phone'     => ['required', 'string', 'max:12'],
                'address'   => ['required', 'string', 'max:255'],
            ]);   
        }
        else
        {
            $this->validate($request,[
                'name'      => ['required', 'string', 'max:255'],
                'email'     => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'phone'     => ['required', 'string', 'max:12'],
                'address'   => ['required', 'string', 'max:255'],
            ]);
        }

        $form_data  =   array(
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'phone'     =>  $request->phone,
            'address'   =>  $request->address
            );

        User::whereId($id_user)->update($form_data);
        return redirect('account')->with('success','Account updated successfully !');
    }

    public function updatePictureAccount(Request $request)
    {
        $user       =   Auth::user();
        $id_user    =   $user->id;
        $image      =   $request->file('image');

        $new_name   =   rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image/user-image'), $new_name);

        $form_data  =   array(
            'image' =>  $new_name
            );

        User::whereId($id_user)->update($form_data);
        return redirect('account')->with('success','Account updated successfully !');
    }

    public function history()
    {
        $user       =   Auth::user();
        $id_user    =   $user->id;
        $purchase   =   Purchase::where('user_id', $id_user)->orderBy('id', 'desc')->get();

        return view('public/history', compact('purchase'));
    }

    public function historyDetail($id)
    {
        $user           =   Auth::user();
        $purchase       =   Purchase::all()->where('id', $id);
        $purchasedetail =   PurchaseDetail::all()->where('purchase_id', $id);

        return view('public/history-detail', compact('user','purchase', 'purchasedetail'));
    }

    public function print($id)
    {
        $user           =   Auth::user();
        $purchase       =   Purchase::all()->where('id', $id);
        $purchasedetail =   PurchaseDetail::all()->where('purchase_id', $id);

        $pdf    =   PDF::loadview('public/print', compact('user','purchase', 'purchasedetail'));

        return $pdf->stream();
    }

    // Dashboard
    public function dashboard()
    {
        $purchase   =   Purchase::count();
        $product    =   product::count();
        $category   =   category::count();
        $size       =   size::count();

        return view('/dashboard/dashboard', compact('purchase','product','category','size'));
    }

}
