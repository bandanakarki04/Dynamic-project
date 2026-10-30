<?php

namespace Tests\Feature;

use Tests\TestCase;

class ProblemTest extends TestCase
{
    public function test_problems_page_requires_login(): void
    {
        $response = $this->get('/problems');

        $response->assertRedirect('/login');
    }
}
