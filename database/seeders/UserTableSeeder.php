<?php
namespace Database\Seeders;
use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrator = new User;
        $administrator->username = 'RIFKI';
        $administrator->role ='admin';
        $administrator->email = 'rifki@admin.com';
        $administrator->password = \Hash::make('admin');
        
        $administrator->save();

        $this->command->info('User Admin sudah diinsert');
    }
}
