<?php

namespace Tests\Feature;

use App\Models\Problem;
use App\Models\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProblemTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_can_access_problems_page(): void
    {
        $response = $this->get('/problems');

        $response->assertOk();
    }

    public function test_guest_can_search_problems_and_see_related_solutions(): void
    {
        $problem = Problem::create([
            'name' => 'Poor communication',
            'description' => 'Project updates are not shared on time.',
        ]);

        $solution = Solution::create([
            'name' => 'Weekly status meeting',
            'description' => 'Share updates and action points every week.',
            'category' => 'Communication',
        ]);

        $problem->solutions()->attach($solution);

        Problem::create([
            'name' => 'Budget overrun',
            'description' => 'Project costs are higher than planned.',
        ]);

        $response = $this->get('/problems?search=communication');

        $response->assertOk();
        $response->assertSee('Poor communication');
        $response->assertSee('Weekly status meeting');
        $response->assertDontSee('Budget overrun');
    }

    public function test_guest_can_search_by_problem_description(): void
    {
        Problem::create([
            'name' => 'Unclear ownership',
            'description' => 'Team members do not know who is responsible.',
        ]);

        $response = $this->get('/problems?search=responsible');

        $response->assertOk();
        $response->assertSee('Unclear ownership');
    }

    public function test_database_seeder_links_one_solution_to_multiple_problems(): void
    {
        $this->seed();

        $solution = Solution::where(
            'name',
            'Weekly project coordination meeting'
        )->firstOrFail();

        $this->assertEqualsCanonicalizing(
            ['Poor communication', 'Unclear responsibilities'],
            $solution->problems()->orderBy('name')->pluck('name')->all()
        );
    }
}
