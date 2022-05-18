<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateResult extends AbstractMigration
{
    public function change(): void
    {
        $this->table('result', ['signed' => false])
        ->addColumn('measurement_id', 'integer', ['signed' => false])
        ->addColumn('result', 'integer')
        ->addColumn('dato', 'datetime')
        ->addForeignKey('measurement_id', 'measurement', 'id')
        ->addTimestamps()
        ->create();
    }
}
