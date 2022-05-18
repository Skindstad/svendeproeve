<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateAddress extends AbstractMigration
{
    public function change(): void
    {
        $this->table('address', ['signed' => false])
            ->addColumn('user_id', 'integer', ['signed' => false])
            ->addColumn('address', 'string')
            ->addColumn('zip_code', 'string')
            ->addForeignKey('user_id', 'users', 'id')
            ->addTimestamps()
            ->create();
    }
}
