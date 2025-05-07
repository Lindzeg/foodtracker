<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use App\Models\Entries;
use Illuminate\Http\Request;





class HomeController extends Controller
{
    public function getProductsInfo(){
        $products = Product::all();
        $units = Unit::all();
        $entries = Entries::all();

        return view('home',[
            'products' => $products,
            'units' => $units,
            'entries' => $entries
        ]);

    }


}
