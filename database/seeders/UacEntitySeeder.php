<?php

namespace Database\Seeders;

use App\Models\UacEntity;
use Illuminate\Database\Seeder;

class UacEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entities = [
            'Ifri',
            'Enam',
            'Eneam',
            'Faseg',
        ];

        foreach ($entities as $key => $entity) {
            UacEntity::create([
                'name'  =>  $entity
            ]);
        }
    }
}
