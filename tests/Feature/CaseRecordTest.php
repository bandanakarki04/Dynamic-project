<?php

namespace Tests\Feature;

use App\Models\CaseRecord;
use App\Models\Kpi;
use App\Models\Problem;
use App\Models\Solution;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CaseRecordTest extends TestCase
{
    use RefreshDatabase;

    public function test_case_can_be_created(): void
    {
        $problem = Problem::create([
            'name' => 'Communication Issue',
        ]);

        $solution = Solution::create([
            'name' => 'Weekly Meeting',
            'category' => 'Management',
        ]);

        $kpi = Kpi::create([
            'name' => 'Customer Satisfaction',
        ]);

        $response = $this->post('/cases', [
            'client_name' => 'Test Client',
            'problem_id' => $problem->id,
            'solution_id' => $solution->id,
            'kpi_id' => $kpi->id,
            'notes' => 'Test case',
        ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('case_records', [
            'client_name' => 'Test Client',
        ]);
    }
    public function test_client_name_is_required(): void
    {
        $problem = Problem::create([
            'name' => 'Communication Issue',
        ]);

        $solution = Solution::create([
            'name' => 'Weekly Meeting',
            'category' => 'Management',
        ]);

        $kpi = Kpi::create([
            'name' => 'Customer Satisfaction',
        ]);

        $response = $this->post('/cases', [
            'client_name' => '',
            'problem_id' => $problem->id,
            'solution_id' => $solution->id,
            'kpi_id' => $kpi->id,
        ]);

        $response->assertSessionHasErrors('client_name');
    }
    public function test_create_case_page_loads(): void
    {
        $response = $this->get('/cases/create');

        $response->assertOk();
        $response->assertSee('Create Case');
    }

}