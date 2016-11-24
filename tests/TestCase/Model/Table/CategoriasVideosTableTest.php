<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CategoriasVideosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CategoriasVideosTable Test Case
 */
class CategoriasVideosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CategoriasVideosTable
     */
    public $CategoriasVideos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.categorias_videos',
        'app.categorias',
        'app.videos',
        'app.users_videos',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('CategoriasVideos') ? [] : ['className' => 'App\Model\Table\CategoriasVideosTable'];
        $this->CategoriasVideos = TableRegistry::get('CategoriasVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CategoriasVideos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
