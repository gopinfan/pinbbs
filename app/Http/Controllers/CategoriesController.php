<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    // show
    public function show(Category $category, Request $request, Topic $topic)
    {
        $topics = $topic->withorder($request->order)
            ->where('category_id', $category->id)
            ->paginate(20);

        $activeUsers = (new User())->getActiveUsers();

        return view('topics.index', compact('topics', 'category', 'activeUsers'));
    }
}
