<?php

/* @var $this yii\web\View */
/* @var $generator add\module\Generator */


echo "<?php\n";
?>

namespace <?= $generator->getLowName() ?>;

/**
 * <?= $generator->getLowName() ?>Module module definition class
 */
class <?= $generator->getUpperName() ?>Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = '<?= $generator->getControllerNamespace() ?>';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
