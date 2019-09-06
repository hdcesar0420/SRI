<?php

use App\Role;
use App\User;
use App\Profession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$professions = DB::select('SELECT id FROM professions WHERE title = ?', ['Desarrollador back-end']);

        $professionId = Profession::where('title', 'Desarrollador back-end')->value('id');

        $roleAId= Role::where('name', 'admin')->value('id');
        $roleUId= Role::where('name', 'user')->value('id');

        $admin=factory(User::class)->create([
            'name' => 'hdcesar ',
            'email' => 'hdcesar@dev.com',
            'password' => md5('123456'),
            'profession_id' => $professionId,
            'is_admin' => true,
            
        ]);
        $admin->roles()->attach($roleAId);

      

        $user=factory(User::class)->create([
            'profession_id' => $professionId
        ]);
        $user->roles()->attach($roleUId);

        $user=factory(User::class)->create([
            'profession_id' => $professionId
        ]);
        $user->roles()->attach($roleUId);
        
    }
}
