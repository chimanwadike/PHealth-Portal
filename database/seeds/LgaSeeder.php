<?php

use Illuminate\Database\Seeder;
use App\Model\Lga;
use Flynsarmy\CsvSeeder\CsvSeeder;

class LgaSeeder extends CsvSeeder
{
	public function __construct()
	{
		$this->table = 'lgas';
		$this->filename = base_path().'/database/seeds/Excel/new-lgas.xlsx';
	}

    public function run()
    {
    	DB::statement("SET FOREIGN_KEY_CHECKS=0");
        Lga::truncate();
        DB::statement("SET FOREIGN_KEY_CHECKS=1");

        // Recommended when importing larger CSVs
		// DB::disableQueryLog();

		parent::run();
    }
}
