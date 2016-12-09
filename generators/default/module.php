<?php

/* @var $this yii\web\View */
/* @var $generator add\generators\Generator */

$className = ucfirst($generator->name);

echo "<?php\n";
?>

namespace <?= $generator->name ?>;

/**
 * <?= $generator->name ?> module definition class
 */
class <?= $className ?> extends \yii\base\Module
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
