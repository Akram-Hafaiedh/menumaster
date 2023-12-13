<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MenuController extends Controller
{
    public function showCreateMenuForm(): View
    {
        return view('createMenu');
    }
    public function generateMeal(Request $request)
    {
        $target_calories = $request->input('calories');
        $items = Item::all();

        // Convert items to arrays for weights and values
        $weights = $items->pluck('calories')->toArray();
        $values = $items->pluck('quantity')->toArray();

        // Initialize memoization array and picked items array
        $memo = array();
        $pickedItems = array();

        // Call the knapsack function
        list($max_value, $picked_indices) = $this->knapSolveFast2($weights, $values, count($values) - 1, $target_calories, $memo, $pickedItems);

        // Get the picked items
        $picked_items = array_map(function ($index) use ($items) {
            return $items[$index];
        }, $picked_indices);

        return view('createMenu', ['suggestions' => $picked_items]);
    }
    private function knapSolveFast2($w, $v, $i, $aW, &$m, &$pickedItems) {
        // Return memo if we have one
        if (isset($m[$i][$aW])) {
            return array( $m[$i][$aW], $m['picked'][$i][$aW] );
        } else {
            // At end of decision branch
            if ($i == 0) {
                if ($w[$i] <= $aW) { // Will this item fit?
                    $m[$i][$aW] = $v[$i]; // Memo this item
                    $m['picked'][$i][$aW] = array($i); // and the picked item
                    return array($v[$i],array($i)); // Return the value of this item and add it to the picked list
                } else {
                    // Won't fit
                    $m[$i][$aW] = 0; // Memo zero
                    $m['picked'][$i][$aW] = array(); // and a blank array entry...
                    return array(0,array()); // Return nothing
                }
            }
            // Not at end of decision branch..
            // Get the result of the next branch (without this one)
            list ($without_i,$without_PI) = $this->knapSolveFast2($w, $v, $i-1, $aW,$m,$pickedItems);
            if ($w[$i] > $aW) { // Does it return too many?
                $m[$i][$aW] = $without_i; // Memo without including this one
                $m['picked'][$i][$aW] = array(); // and a blank array entry...
                return array($without_i,array()); // and return it
            } else {
                // Get the result of the next branch (WITH this one picked, so available weight is reduced)
                list ($with_i,$with_PI) = $this->knapSolveFast2($w, $v, ($i-1), ($aW - $w[$i]),$m,$pickedItems);
                $with_i += $v[$i];  // ..and add the value of this one..
                // Get the greater of WITH or WITHOUT
                if ($with_i > $without_i) {
                    $res = $with_i;
                    $picked = $with_PI;
                    array_push($picked,$i);
                } else {
                    $res = $without_i;
                    $picked = $without_PI;
                }
                $m[$i][$aW] = $res; // Store it in the memo
                $m['picked'][$i][$aW] = $picked; // and store the picked item
                return array ($res,$picked); // and then return it
            }
        }
    }

}
