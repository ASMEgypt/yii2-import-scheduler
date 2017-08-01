<?php

namespace execut\importScheduler\models;
use yii\helpers\ArrayHelper;

/**
* This is the model class for table "import_settings_vs_scheduler_events".
*
    * @property integer $id
    * @property string $created
    * @property string $updated
    * @property integer $scheduler_event_id
    * @property integer $import_setting_id
    *
        * @property \execut\importScheduler\models\ImportSettings $importSetting
        * @property \execut\importScheduler\models\SchedulerEvents $schedulerEvent
    */
class ImportSettingsVsSchedulerEvents extends \execut\importScheduler\models\base\ImportSettingsVsSchedulerEvents
{
    /**
    * @inheritdoc
    */
    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), []);
    }

    /**
    * @inheritdoc
    */
    public function rules() {
        return ArrayHelper::merge(parent::rules(), []);
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels() {
        return ArrayHelper::merge(parent::attributeLabels(), []);
    }
}
