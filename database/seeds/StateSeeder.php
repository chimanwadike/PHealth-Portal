<?php

use Illuminate\Database\Seeder;
use App\Model\State;
use Flynsarmy\CsvSeeder\CsvSeeder;

class StateSeeder extends CsvSeeder
{
	public function __construct()
	{
		$this->table = 'states';
		$this->filename = base_path().'/database/seeds/Excel/new-states1.csv';
	}

    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        State::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        // Recommended when importing larger CSVs
		// DB::disableQueryLog();

		parent::run();
    }
}
