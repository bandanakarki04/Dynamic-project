<?php

namespace Database\Seeders;

use App\Models\Problem;
use App\Models\Solution;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed a demo user and sample data for Problem Search (User Story 1).
     *
     * One solution is deliberately linked to multiple problems to demonstrate
     * the many-to-many relationship implemented by the Solutions feature.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'),
            ]
        );

        $communication = Problem::firstOrCreate(
            ['name' => 'Poor communication'],
            ['description' => 'Important project information is not shared clearly or on time.']
        );

        $responsibilities = Problem::firstOrCreate(
            ['name' => 'Unclear responsibilities'],
            ['description' => 'Team members are unsure who owns specific tasks and decisions.']
        );

        $solution = Solution::firstOrCreate(
            ['name' => 'Weekly project coordination meeting'],
            [
                'description' => 'Share project updates, clarify task owners, and agree on action points.',
                'category' => 'Project management',
            ]
        );

        $solution->problems()->syncWithoutDetaching([
            $communication->id,
            $responsibilities->id,
        ]);
    }
}
