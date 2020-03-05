<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

        $this->call(RolesAndPermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(SkillsTableSeeder::class);
        $this->call(HobbiesTableSeeder::class);
        $this->call(EducationTableSeeder::class);
        $this->call(WorkExTableSeeder::class);
        $this->call(PersonalInfoTableSeeder::class);
        $this->call(LinksTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(AchievementsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
    }

    private function cleanDatabase()
    {
        Schema::disableForeignKeyConstraints();

        collect(DB::select("SHOW FULL TABLES WHERE Table_Type = 'BASE TABLE'"))
            ->map(function ($tableProperties) {
                return get_object_vars($tableProperties)[key($tableProperties)];
            })
            ->reject(function (string $tableName) {
                return $tableName === 'migrations';
            })
            ->each(function (string $tableName) {
                DB::table($tableName)->truncate();
            });

        Schema::enableForeignKeyConstraints();
    }
}
