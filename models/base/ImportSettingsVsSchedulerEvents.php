<?php

namespace execut\importScheduler\models\base;

use execut\importScheduler\models\ImportSettings;
use execut\importScheduler\models\SchedulerEvents;

use Yii;
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
class ImportSettingsVsSchedulerEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'import_settings_vs_scheduler_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['created', 'updated'], 'safe'],
            [['scheduler_event_id', 'import_setting_id'], 'required'],
            [['scheduler_event_id', 'import_setting_id'], 'integer'],
            [['import_setting_id'], 'exist', 'skipOnError' => true, 'targetClass' => ImportSettings::className(), 'targetAttribute' => ['import_setting_id' => 'id']],
            [['scheduler_event_id'], 'exist', 'skipOnError' => true, 'targetClass' => SchedulerEvents::className(), 'targetAttribute' => ['scheduler_event_id' => 'id']],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'id' => Yii::t('execut.importScheduler.models.base.ImportSettingsVsSchedulerEvents', 'ID'),
            'created' => Yii::t('execut.importScheduler.models.base.ImportSettingsVsSchedulerEvents', 'Created'),
            'updated' => Yii::t('execut.importScheduler.models.base.ImportSettingsVsSchedulerEvents', 'Updated'),
            'scheduler_event_id' => Yii::t('execut.importScheduler.models.base.ImportSettingsVsSchedulerEvents', 'Scheduler Event ID'),
            'import_setting_id' => Yii::t('execut.importScheduler.models.base.ImportSettingsVsSchedulerEvents', 'Import Setting ID'),
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getImportSetting()
    {
        return $this->hasOne(\execut\importScheduler\models\ImportSettings::className(), ['id' => 'import_setting_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSchedulerEvent()
    {
        return $this->hasOne(\execut\importScheduler\models\SchedulerEvents::className(), ['id' => 'scheduler_event_id']);
    }
}
