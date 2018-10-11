<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    // show
    public function show(Category $category, Request $request, Topic $topic)
    {
        $topics = $topic->withorder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        return view('topics.index', compact('topics', 'category'));
    }
}
