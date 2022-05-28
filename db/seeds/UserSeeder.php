<?php


use Phinx\Seed\AbstractSeed;
use Faker\Factory;

class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [];

        $data[] = [
            'username' => 'admin',
            'firstname' => 'Administrator',
            'lastname' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@test.dk',
            'password' => password_hash('secret', PASSWORD_BCRYPT),
        ];

        $this->table('users')->insert($data)->saveData();
    }
}
