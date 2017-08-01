<?php
class m161123_125709_updateEventsTable extends \execut\yii\migration\Migration
{
    // Use safeUp/safeDown to run migration code within a transaction
    public function initInverter(\execut\yii\migration\Inverter $i)
    {
        $i->table('import_settings_vs_scheduler_events')->create($this->defaultColumns())
            ->addForeignColumn('scheduler_events', true)
            ->addForeignColumn('import_settings', true);
    }
}
