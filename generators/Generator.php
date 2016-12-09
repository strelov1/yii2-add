<?php

namespace add\generators;

use yii\gii\CodeFile;
use Yii;

class Generator extends \yii\gii\Generator
{
    public $name;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Module Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This generator helps you to generate the skeleton code needed by a Yii module.';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name'], 'filter', 'filter' => 'trim'],
            [['name'], 'required'],
            [['name'], 'match', 'pattern' => '/^[\w\\-]+$/', 'message' => 'Only word characters and dashes are allowed.'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => 'Module ID',
        ];
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return [
            'name' => 'This refers to the ID of the module, e.g., <code>admin</code>.',
        ];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $files[] = new CodeFile(
            $this->getLowName() . '\\' . $this->getUpperName() . '.php',
            $this->render("module.php")
        );
        $files[] = new CodeFile(
            $this->getLowName() . '/config/config.php',
            $this->render("config.php")
        );
        $files[] = new CodeFile(
            $this->getLowName() . '/controllers/DefaultController.php',
            $this->render("controller.php")
        );
        $files[] = new CodeFile(
            $this->getLowName() . '/views/layout/base.twig',
            $this->render("layout.php")
        );
        $files[] = new CodeFile(
            $this->getLowName() . '/views/default/index.twig',
            $this->render("view.php")
        );

        return $files;
    }

    public function getUpperName()
    {
        return ucfirst($this->name);
    }

    public function getLowName()
    {
        return strtolower($this->name);
    }

    /**
     * @return string the controller namespace of the module.
     */
    public function getControllerNamespace()
    {
        return $this->getLowName() . '\controllers';
    }
}
