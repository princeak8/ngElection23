<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Party;

class PartySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parties = [
                        ['name' => 'LP', 'logo' => 'LP.png'], 
                        ['name' => 'PDP', 'logo' => 'PDP.png'], 
                        ['name' => 'APC', 'logo' => 'APC.png']
                    ];

        foreach($parties as $party) {
            $partyObj = new Party;
            $partyObj->name = $party['name'];
            $partyObj->logo = $party['logo'];
            $partyObj->save();
        }
    }
}
