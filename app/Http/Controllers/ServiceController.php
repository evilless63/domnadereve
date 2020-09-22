<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Exception;
use Illuminate\Support\Facades\Log;
use ElForastero\Transliterate\Transliterator;

class ServiceController extends Controller
{
    public function postRequestCategoryFrom1c(Request $request) {
        //Обработка категорий

        // if($request->headers->has('categories')){
            try {
                $stack = $request->toArray(); 
                // Log::info($stack);  
                foreach($stack as $s) {
                    $category = Category::where('category_id', $s['category_id'])->first();
                    $transliterator = new Transliterator('ru', 'common_ru');
                    $s['name-translite'] = $transliterator->make($s['name']);
                    if($category == null) {
                        $category = new Category();
                        $category->save($s);
                    } else {
                        $category->update($s);
                    }
                }

                return 'all ok';
                
            } catch (Exception $e) {
                Log::info($e); 
                abort(500);
            }
            
        // }

        // //Обработка товаров
        // if($request->headers->has('products')) {

        // }
    }
}
