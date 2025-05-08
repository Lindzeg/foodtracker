<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Unit;
use App\Models\Entries;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function getProductsInfo(Request $request)
    {
        $products = Product::all();
        $units = Unit::all();


    /* ai generated, my brain couldn't handle this..yet */
        if ($request->has(['products', 'amount', 'units'])) {

            $product = Product::find($request->input('products'));
            $unit = Unit::find($request->input('units'));
            $amount = $request->input('amount');

            $newEntry = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'unit_label' => $unit->label,
                'amount' => $amount,
                'kcal' => $product->kcal,
                'total_kcal' => $totalKcal = $product->kcal * $amount,
            ];
            $entries = session('entries', []);
            $updated = false;

            foreach ($entries as &$entry) {
                if (isset($entry['product_id']) && $entry['product_id'] === $newEntry['product_id']) {
                    $entry['amount'] += $newEntry['amount'];
                    $entry['total_kcal'] += $newEntry['total_kcal'];
                    $updated = true;
                    break;
                }
            }

            if(! $updated){
                $entries[] = $newEntry;
            }

            session(['entries' => $entries]);
        }

        $entries = session('entries', []);
        return view('home', compact('products', 'units', 'entries'));
    }
}




