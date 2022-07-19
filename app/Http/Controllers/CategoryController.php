<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Sanctum\Exceptions\MissingAbilityException;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  \App\Models\User  $user
     * @return User
     *
     * @throws MissingAbilityException
     */
    public function store(Request $request)
    {
        //return $user;
        $fields =  $request->validate([
            'title'=>'required|string|unique:categories,title'
        ]);

        $category = Category::create([
            'title' => $fields['title'],
            'slug' =>Str::snake( $fields['title'], '-')
            
        ]); 

        $response = [
            "error"=>"0",
            "message"=>"Category Sucessfully Created",
            "category"=>$category
        ];
    
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categoty  $categoty
     * @return \Illuminate\Http\Response
     */
    public function show(Category $categoty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Categoty  $categoty
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $categoty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $categoty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

        $category->title = $request->title ?? $category->title;
        $category->slug = Str::snake( $category->title, '-');
        $category->parent_category = $request->parent_category ?? $category->parent_category;
        $category->update();
        $response = [
            "error"=>"0",
            "message"=>"Category Sucessfully Updated",
            "category"=>$category
        ];
    
        return response($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $categoty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();

        $response = [
            "error"=>"0",
            "message"=>"Category Sucessfully Deleted",
        ];

        return response($response, 201);
    }
}
