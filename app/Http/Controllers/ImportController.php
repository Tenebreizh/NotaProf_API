<?php

namespace App\Http\Controllers;
use App\Category;
use App\Appreciation;

class ImportController extends Controller
{
    /**
     * Get the base appreciations in a json file and push them into the database
     *
     * @return void
     */
    public function storeBaseAppreciations()
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
}
