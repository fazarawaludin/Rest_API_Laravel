<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request){

        //Validasi input
        $validator = Validator::make($request->all(),[
            'product_name' => 'required|max:50',
            'product_type' => 'required|in:snack,drink,makeup,drugs',
            'product_price' => 'required|numeric',
            'expaired_date' => 'required|date'
        ]);

        //false validasi
        if($validator ->fails()){
            return response() -> json($validator->messages())->setStatusCode(422);
        }

        $validated = $validator->validate();

        //Proses Input data
        Product::create([
            'product_name' => $validated['product_name'],
            'product_type' => $validated['product_type'],
            'product_price' => $validated['product_price'],
            'expaired_date' => $validated['expaired_date']

        ]);

        return response()->json('Product Berhasil Disimpan')->setStatusCode(201);

    }

    public function view(){
        //Proses Lihat Data
        $products = Product::all();

        return response()->json($products)->setStatusCode(200);
    }

    public function update(Request $request, $id){

        $validator = Validator::make($request->all(),[
            'product_name' => 'required|max:50',
            'product_type' => 'required|in:snack,drink,makeup,drugs',
            'product_price' => 'required|numeric',
            'expaired_date' => 'required|date'
        ]);

        //false validasi
        if($validator ->fails()){
            return response() -> json($validator->messages())->setStatusCode(422);
        }

        $validated = $validator->validate();

        $checkData = Product::find($id);

        if($checkData){

            Product::where('id',$id)->update([
                'product_name' => $validated['product_name'],
                'product_type' => $validated['product_type'],
                'product_price' => $validated['product_price'],
                'expaired_date' => $validated['expaired_date']
            ]);
    
            return response()->json([
                "messages" => "Data Berhasil diUpdate"
            ])->setStatusCode(201);
        }

        return response()->json([
            "messages" => "Data Tidak diTemukan"
        ])->setStatusCode(404);

    }

    public function delete($id){
        $checkData = Product::find($id);

        if($checkData){
            Product::destroy($id);

            return response()->json([
                "messages" => "Data Berhasil diHapus"
            ])->setStatusCode(200);
        }
        return response()->json([
            "messages" => "Data Tidak diTemukan"
        ])->setStatusCode(404);
    }
}