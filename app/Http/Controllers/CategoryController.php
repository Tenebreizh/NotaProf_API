<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    /**
     * Get all Categories
     *
     * @return Category
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Store new Category
     *
     * @param Request $request
     * @return Category $category
     */
    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);

        return $category;
    }

    /**
     * Get specific Category
     *
     * @param int $id
     * @return Category $category
     */
    public function show($id)
    {
        try
        {
            $category = Category::findOrFail($id);
            return $category;
        } 
        catch(\Exception $e) 
        {
            return response()->json([
                'message' => 'error',
                'description' => 'Not found...'
            ], 404);
        }
    }
    
    /**
     * Update specific Category
     *
     * @param int $id
     * @param Request $request
     * @return Category $category
     */
    public function update($id, Request $request)
    {
        try
        {
            $category = Category::findOrFail($id);

            $category->name = $request->name;
            $category->save();
            
            return $category;
        } 
        catch(\Exception $e) 
        {
            return response()->json([
                'message' => 'error',
                'description' => 'Not found...'
            ], 404);
        }
    }

    /**
     * Delete specific Category
     *
     * @param int $id
     * @return string
     */
    public function destroy($id)
    {
        try
        {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                'message' => 'success'
            ]);
        } 
        catch(\Exception $e) 
        {
            return response()->json([
                'message' => 'error',
                'description' => 'Not found...'
            ], 404);
        }
    }
}
