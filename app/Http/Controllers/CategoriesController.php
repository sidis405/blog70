<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function show(Category $category)
    {
        $category->load('posts');

        return $category;
    }
}
