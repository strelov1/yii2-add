<?php

echo "<?php\n";
?>

namespace <?= $generator->getModelNamespace() ?>;

use Yii;

/**
* Article model
* This is the model class for table "<?= $generator->getLowName() ?>".
*
* @property integer $id
* @property string $create_at
* @property string $update_at
*/
class <?= $generator->getUpperName() ?> extends \yii\db\ActiveRecord<?= "\n" ?>
{
    /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return '<?= $generator->getLowName() ?>';
    }

    /**
    * @inheritdoc
    */
    public function rules()
    {
        return [];
    }

    /**
    * @inheritdoc
    */
    public function attributeLabels()
    {
        return [];
    }

}
