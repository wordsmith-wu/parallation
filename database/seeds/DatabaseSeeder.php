<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
				$this->call(LanguagesTableSeeder::class);
				$this->call(ParagraphsTableSeeder::class);
				$this->call(ProjectsTableSeeder::class);
				$this->call(DocumentsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
    }
}
