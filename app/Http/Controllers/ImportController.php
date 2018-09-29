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


        foreach ($data as $appreciation) 
        {
            // Create a new category for each element
            $category = Category::create([
                'name' => $appreciation['name']
            ]);

            // Create a new appreciation for each element in the 'content' array
            foreach ($appreciation['content'] as $text) 
            {
                Appreciation::create([
                    'content' => $text,
                    'category_id' => $category->id
                ]);
            }
        }

        return true;
    }
}
