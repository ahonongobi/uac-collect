<?php

namespace Database\Seeders;

use App\Models\UacStructure;
use Illuminate\Database\Seeder;

class UacStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $structures = [
            'Rectorat',
            'Cours',
            'Bibliothèque',
        ];

        foreach ($structures as $key => $structure) {
            UacStructure::create([
                'name'  =>  $structure
            ]);
        }
    }
}
