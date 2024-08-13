<?php

namespace App\Http\Controllers;
use App\Models\Product; //import this
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 

class ProductController extends Controller
{
    //here create all crud logic
    public function loadAllProducts(){
        $all_products = Product::all();
        return view('products',compact('all_products'));
    }
    
    public function loadAddProductForm(){
        return view('add-product');
    }

    public function AddProduct(Request $request){
        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'details' => 'required',
            'company_id' => 'required',
            'expiration_date' => 'required',
        ]);
        try {
             // register product here
            $new_product = new Product;
            $new_product->name = $request->name;
            $new_product->company_id = $request->company_id;
            $new_product->details = $request->details;
            $new_product->expiration_date = $request->expiration_date;
            $new_product->save();

            return redirect('/products')->with('success','Product Added Successfully');
        } catch (\Exception $e) {
            return redirect('/add/product')->with('fail',$e->getMessage());
        }
       
        
    }

    public function EditProduct(Request $request){
        // perform form validation here
        $request->validate([
            'name' => 'required|string',
            'details' => 'required',
            'expiration_date' => 'required',
        ]);
        try {
             // update product here
            $update_product = Product::where('id',$request->id)->update([
                'name' => $request->name,
                'details' => $request->details,
                'expiration_date' => $request->expiration_date,
            ]);

            return redirect('/products')->with('success','Product Updated Successfully');
        } catch (\Exception $e) {
            return redirect('/edit/product')->with('fail',$e->getMessage());
        }
    }

    public function loadEditForm($id){
        $product= Product::find($id);

        return view('/edit-product',compact('product'));
    }

    public function deleteProduct($id){
        try {
            Product::where('id',$id)->delete();
            return redirect('/products')->with('success','Product Deleted successfully!');
        } catch (\Exception $e) {
            return redirect('/products')->with('fail',$e->getMessage());
            
        }
    }
}
