<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Role;


class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('user_role')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $userRoles = [
            [
                'user_mail'=>'bob@sull.com',
                'role'=>'admin',
            ],
            [
                'user_mail'=>'bob@sull.com',
                'role'=>'member',
            ],
            [
                'user_mail'=>'bob@sull.com',
                'role'=>'affiliate',
            ],     
            [
                'user_mail'=>'anna.lyse@sull.com',
                'role'=>'member',
            ],
            [
                'user_mail'=>'anna.lyse@sull.com',
                'role'=>'affiliate',
            ],                   
        ];
//Prepare the data
foreach ($userRoles as &$data) {
    $user = User::where('email', $data['user_mail'])->first();
    $role = Role::firstWhere('role', $data['role']);
    
    // Remplacez les données par les ID correspondants
    $data['user_id'] = $user->id;
    $data['role_id'] = $role->id;

    // Supprimez les anciennes clés qui ne correspondent pas aux colonnes de la base de données
    unset($data['user_mail'], $data['role']); // Assurez-vous de supprimer 'user_mail' et 'role'
}
unset($data); // Detach the last reference

//Insert data in the table
DB::table('user_role')->insert($userRoles);
    }
}
