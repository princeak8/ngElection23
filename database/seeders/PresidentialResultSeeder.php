<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\PresidentialResult;
use App\Models\Party;

class PresidentialResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $presidentials = [
            [
                "party_id" => Party::LP()->id,
                "candidate" => 'Peter Obi',
                "candidate_photo" => "peter obi.jpg",
                "votes" => 0
            ],
            [
                "party_id" => Party::PDP()->id,
                "candidate" => 'Atiku Abubbakar',
                "candidate_photo" => "atiku.jpg",
                "votes" => 0
            ],
            [
                "party_id" => Party::APC()->id,
                "candidate" => 'Asiwaju Tinibu',
                "candidate_photo" => "tinibu.jpg",
                "votes" => 0
            ],
        ];

        foreach($presidentials as $candidate) {
            $presidentialResult = new PresidentialResult;
            $presidentialResult->party_id = $candidate['party_id'];
            $presidentialResult->candidate = $candidate['candidate'];
            $presidentialResult->candidate_photo = $candidate['candidate_photo'];
            $presidentialResult->votes = $candidate['votes']; 
            $presidentialResult->save();
        }
    }
}
