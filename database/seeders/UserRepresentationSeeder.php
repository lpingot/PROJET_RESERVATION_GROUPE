<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Representation;

class UserRepresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('user_representation')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $userRepresentations = [
            [
                'user_mail'=>'bob@sull.com',
                'id'=>'1',
            ],
            [
                'user_mail'=>'bob@sull.com',
                'id'=>'2',
            ],
            [
                'user_mail'=>'bob@sull.com',
                'id'=>'3',
            ],     
            [
                'user_mail'=>'anna.lyse@sull.com',
                'id'=>'4',
            ],
            [
                'user_mail'=>'anna.lyse@sull.com',
                'id'=>'3',
            ],                   
        ];
//Prepare the data
foreach ($userRepresentations as &$data) {
    $user = User::where('email', $data['user_mail'])->first();
    $representation = Representation::firstWhere('id', $data['id']);
    
    // Remplacez les données par les ID correspondants
    $data['user_id'] = $user->id;
    $data['representation_id'] = $representation->id;

    // Supprimez les anciennes clés qui ne correspondent pas aux colonnes de la base de données
    unset($data['user_mail'], $data['id']); // Assurez-vous de supprimer 'user_mail' et 'role'
}
unset($data); // Detach the last reference

//Insert data in the table
DB::table('user_representation')->insert($userRepresentations);
    }
}
