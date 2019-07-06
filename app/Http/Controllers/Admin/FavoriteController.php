<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorite = new favorite;
        $category = new category;

        $favorites = $favorite->getFavoriteCount();
        $categories = $category->all();
        return view('favorite.adminIndex', compact('favorites', 'categories'));
    }

}
