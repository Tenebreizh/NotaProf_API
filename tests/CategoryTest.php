<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test to see if we retrieve more than 1 category
     *
     * @return void
     */
    public function testIndexCategory()
    {
        $this->get('/api/categories');

        $this->seeJson([
            'id' => 1
        ]);
        $this->seeJson([
            'id' => 2
        ]);      
    }

    /**
     * Test to see if we retrieve a category
     *
     * @return void
     */
    public function testShowCategory()
    {
        $this->get('/api/categories/1');

        $this->seeJson([
            "id" => 1,
            "name" => "Niveau"
        ]);
    }

    /**
     * Test to see if we retrieve a category
     *
     * @return void
     */
    public function testShowCategory2()
    {
        $this->get('/api/categories/2');

        $this->seeJson([
            "id" => 2,
            "name" => "Travail"
        ]);
    }

    /**
     * Test to see if we retrieve an error message if we use an impossible id
     *
     * @return void
     */
    public function testCategoryNotFound()
    {
        $this->get('/api/categories/998');

        $this->seeJson([
            "message" => "error",
        ]);
    }

    /**
     * Test to see if we retrieve an error message if we use an impossible id
     *
     * @return void
     */
    public function testCategoryNotFound2()
    {
        $this->get('/api/categories/999');

        $this->seeJson([
            "message" => "error",
        ]);
    }
    
    /**
     * Test to see if we retrieve a success message after deleting a category
     *
     * @return void
     */
    public function testCategoryDelete()
    {
        $this->delete('/api/categories/1');

        $this->seeJson([
            'message' => "success"
        ]);
    }

    /**
     * Test to see if we retrieve a success message after deleting a category
     *
     * @return void
     */
    public function testCategoryDelete2()
    {
        $this->delete('/api/categories/2');

        $this->seeJson([
            'message' => "success"
        ]);
    }

    /**
     * Test to see if we retrieve a error message after deleting a fake category
     *
     * @return void
     */
    public function testCategoryDeleteFail()
    {
        $this->delete('/api/categories/998');

        $this->seeJson([
            'message' => "error"
        ]);
    }

    /**
     * Test to see if we retrieve a error message after deleting a fake category
     *
     * @return void
     */
    public function testCategoryDeleteFail2()
    {
        $this->delete('/api/categories/999');

        $this->seeJson([
            'message' => "error"
        ]);
    }

    /**
     * Test to see if we retrieve the category updated after PUT request
     *
     * @return void
     */
    public function testAppreciationUpdate()
    {
        $this->put('/api/categories/1', ['name' => 'TEST']);

        $this->seeJson([
            'name' => 'TEST'
        ]);
    }

    /**
     * Test to see if we retrieve the category updated after PUT request
     *
     * @return void
     */
    public function testAppreciationUpdate2()
    {
        $this->put('/api/categories/2', ['name' => 'Hello']);

        $this->seeJson([
            'name' => 'Hello'
        ]);
    }

    /**
     * Test to see if we retrieve an error after putting fake data
     *
     * @return void
     */
    public function testAppreciationUpdateFail()
    {
        $this->put('/api/categories/999', ['name' => 'TEST']);

        $this->seeJson([
            'message' => 'error'
        ]);
    }

    /**
     * Test to see if we retrieve an error after putting fake data
     *
     * @return void
     */
    public function testAppreciationUpdateFail2()
    {
        $this->put('/api/categories/965', ['name' => 'Hello']);

        $this->seeJson([
            'message' => 'error'
        ]);
    }
    
}
