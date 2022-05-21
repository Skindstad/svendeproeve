<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class UpdateUser extends AbstractMigration
{

    public function change(): void
    {
        $this->table('users', ['signed' => false])
        ->addColumn('role', 'enum', ['values' => 'user,admin,maintenance', 'default' => 'user'])
        ->update();
    }
}
