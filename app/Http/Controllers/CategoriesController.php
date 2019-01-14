<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;
class CategoriesController extends Controller
{
    public function show(Category $category)
    {
    		$documents = Document::where('category_id', $category->id)->paginate(20);

    		return view('documents.index',compact('documents','category'));
    }
}
