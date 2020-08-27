<?php

namespace Tests\Unit;

use App\Api\OneFoodApi;
use PHPUnit\Framework\TestCase;

class OneFoodApiTest extends TestCase
{
    /**
     * Test OneFoodApi connection
     *
     * @return void
     */
    public function testConnection()
    {
        $this->assertTrue((new OneFoodApi())->isConnected());
    }
}
