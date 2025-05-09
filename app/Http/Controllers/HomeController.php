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

    //get all products, entries, units from database
        $products = Product::all();
        $units = Unit::all();
        $entries = Entries::all();


    /* Next block processes form input and adds entries to the session */
        if ($request->has(['products', 'amount', 'units'])) {

        //find a specific product based and id based on form input
            $product = Product::find($request->input('products'));
            $unit = Unit::find($request->input('units'));
            $amount = $request->input('amount');
        //make new entry array with data
            $newEntry = [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'unit_label' => $unit->label,
                'amount' => $amount,
                'kcal' => $product->kcal,
                'total_kcal' => $product->kcal * $amount,
            ];
        //Remove existing entries from the session, or start with an empty array
            $entries = session('entries', []);
            $updated = false;

        //check if there's an existing product in session, update amount and kcal
            foreach ($entries as &$entry) {
                if ($entry['product_id'] === $newEntry['product_id']) {
                    $entry['amount'] += $newEntry['amount'];
                    $entry['total_kcal'] += $newEntry['total_kcal'];
                    $updated = true;
                    break;
                }
            }
        //If the product is not yet listed, add it as a new entry to the session
            if(! $updated){
                $entries[] = $newEntry;
            }

            session(['entries' => $entries]);
        }
        //update session with a new entry after old entry??what does this do
        $entries = session('entries', []);
        return view('home', compact('products', 'units', 'entries'));
    }
}




