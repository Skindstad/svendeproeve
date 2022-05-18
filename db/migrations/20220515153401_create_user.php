<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateUser extends AbstractMigration
{
    public function change(): void
    {
        $this->table('users', ['signed' => false])
            ->addColumn('firstname', 'string')
            ->addColumn('lastname', 'string')
            ->addColumn('username', 'string')
            ->addColumn('email', 'string')
            ->addColumn('password', 'string')
            ->addTimestamps()
            ->addIndex(['username'], ['unique' => true])
            ->addIndex(['email'], ['unique' => true])
            ->create();
    }
}
