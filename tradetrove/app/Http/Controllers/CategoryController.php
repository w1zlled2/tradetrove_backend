<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return [
            'data' => Category::all()
        ];
    }

    public function store(CategoryAddRequest $request)
    {
        return Category::create($request->all());
    }

    public function show(Category $category)
    {
        return [
            'data'=>$category
        ];
    }

    public function update(Request $request, Category $category)
    {
        return "Изменение категории";
    }

    public function destroy(Category $category)
    {
        return "Удаление категории";
    }
}
