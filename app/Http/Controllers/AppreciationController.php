<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appreciation;
use App\Category;

class AppreciationController extends Controller
{
    /**
     * Get all appreciations
     *
     * @return Appreciation
     */
    public function index()
    {
        return Appreciation::all();
    }

    /**
     * Store new appreciation [No need right now]
     *
     * @param Request $request
     * @return Appreciation $appreciation
     */
    /* public function store(Request $request)
    {
        $appreciation = Appreciation::create([
            'content' => $request->content,
            'level' => $request->level,
            'category_id' => $request->category_id,
        ]);

        return $appreciation;
    } */
        
    /**
     * Store base appreciations in the database
     *
     * @return void
     */
    public static function storeAppreciations()
    {
        // Get the json file
        $json = file_get_contents(base_path('database/data/appreciations.json'));
        $data = json_decode($json, true);

        foreach ($data as $category) 
        {

            // Create a category
            $new_cat = Category::create([
                'name' => $category['name'],
            ]);

            foreach ($category['appreciations'] as $appreciation) 
            {
                // For each object create an appreciation
                Appreciation::create([
                    'level' => $appreciation['level'],
                    'content' => $appreciation['content'],
                    'category_id' => $new_cat->id
                ]);
            }
        }
    }

    /**
     * Get specific appreciation
     *
     * @param int $id
     * @return Appreciation $appreciation
     */
    public function show($id)
    {
        try
        {
            $appreciation = Appreciation::findOrFail($id);
            return $appreciation;
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
     * Update specific appreciation
     *
     * @param int $id
     * @param Request $request
     * @return Appreciation $appreciation
     */
    public function update($id, Request $request)
    {
        try
        {
            $appreciation = Appreciation::findOrFail($id);

            $appreciation->content = $request->content;
            $appreciation->level = $request->level;
            $appreciation->category_id = $request->category_id;
            $appreciation->save();
            
            return $appreciation;
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
     * Delete specific appreciation
     *
     * @param int $id
     * @return string
     */
    public function destroy($id)
    {
        try
        {
            $appreciation = Appreciation::findOrFail($id);
            $appreciation->delete();

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
