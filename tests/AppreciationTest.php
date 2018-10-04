<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class AppreciationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test to see if we retrieve more than 1 appreciation
     *
     * @return void
     */
    public function testIndexAppreciation()
    {
        $this->get('/api/appreciations');

        $this->seeJson([
            'id' => 1,
            "content" => "Bilan décevant",
            "level" => "-",
            "category_id" => 1
        ]);
        $this->seeJson([
            'id' => 2,
            "content" => "Réelles difficultés",
            "level" => "-",
            "category_id" => 1
        ]);      
    }

    /**
     * Test to see if we retrieve an appreciation
     *
     * @return void
     */
    public function testShowAppreciation()
    {
        $this->get('/api/appreciations/1');

        $this->seeJson([
            "id" => 1,
            "content" => "Bilan décevant",
            "level" => "-",
            "category_id" => 1
        ]);
    }

    /**
     * Test to see if we retrieve an appreciation
     *
     * @return void
     */
    public function testShowAppreciation2()
    {
        $this->get('/api/appreciations/2');

        $this->seeJson([
            "id" => 2,
            "content" => "Réelles difficultés",
            "level" => "-",
            "category_id" => 1
        ]);
    }

    /**
     * Test to see if we retrieve an error message if we use an impossible id
     *
     * @return void
     */
    public function testAppreciationShowFail()
    {
        $this->get('/api/appreciations/998');

        $this->seeJson([
            "message" => "error",
        ]);
    }

    /**
     * Test to see if we retrieve an error message if we use an impossible id
     *
     * @return void
     */
    public function testAppreciationShowFail2()
    {
        $this->get('/api/appreciations/999');

        $this->seeJson([
            "message" => "error",
        ]);
    }

    /**
     * Test to see if we retrieve the appreciation updated after PUT request
     *
     * @return void
     */
    public function testAppreciationUpdate()
    {
        $this->put('/api/appreciations/1', ['content' => 'TEST', 'level' => '+', 'category_id' => 2]);

        $this->seeJson([
            'content' => 'TEST', 
            'level' => '+', 
            'category_id' => 2
        ]);
    }

    /**
     * Test to see if we retrieve the appreciation updated after PUT request
     *
     * @return void
     */
    public function testAppreciationUpdate2()
    {
        $this->put('/api/appreciations/2', ['content' => 'Hello world !', 'level' => '=', 'category_id' => 3]);

        $this->seeJson([
            'content' => 'Hello world !', 
            'level' => '=', 
            'category_id' => 3
        ]);
    }

    /**
     * Test to see if we retrieve an error message after using fake info
     * [Using fake appreciation id]
     *
     * @return void
     */
    public function testAppreciationUpdateFail()
    {
        $this->put('/api/appreciations/998', ['content' => 'Hello world !', 'level' => '=', 'category_id' => 3]);

        $this->seeJson([
            'message' => 'error'
        ]);
    }

    /**
     * Test to see if we retrieve an error message after using fake info
     * [Using fake category_id]
     *
     * @return void
     */
    public function testAppreciationUpdateFail2()
    {
        $this->put('/api/appreciations/5', ['content' => 'Hello world !', 'level' => '=', 'category_id' => 9]);

        $this->seeJson([
            'message' => 'error'
        ]);
    }

    /**
     * Test to see if we receive a success message after requiring an appreciation delete
     *
     * @return void
     */
    public function testAppreciationDelete()
    {
        $this->delete('api/appreciations/1');

        $this->seeJson([
            'message' => "success"
        ]);
    }

    /**
     * Test to see if we receive a success message after requiring an appreciation delete
     *
     * @return void
     */
    public function testAppreciationDelete2()
    {
        $this->delete('api/appreciations/2');

        $this->seeJson([
            'message' => "success"
        ]);
    }

    /**
     * Test to see if we receive an error message after requiring an fake appreciation delete
     *
     * @return void
     */
    public function testAppreciationDeleteFail()
    {
        $this->delete('api/appreciations/998');

        $this->seeJson([
            'message' => "error"
        ]);
    }

    /**
     * Test to see if we receive an error message after requiring an fake appreciation delete
     *
     * @return void
     */
    public function testAppreciationDeleteFail2()
    {
        $this->delete('api/appreciations/999');

        $this->seeJson([
            'message' => "error"
        ]);
    }
}
