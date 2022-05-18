<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateMeasurement extends AbstractMigration
{
    public function change(): void
    {
        $this->table('measurement', ['signed' => false])
            ->addColumn('address_id', 'integer', ['signed' => false])
            ->addColumn('measurement_name', 'string')
            ->addColumn('measurement_type', 'string')
            ->addColumn('unit', 'string')
            ->addForeignKey('address_id', 'address', 'id')
            ->addTimestamps()
            ->create();
    }
}
