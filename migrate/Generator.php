<?php

namespace strelov1\add\migrate;

use yii\gii\CodeFile;
use Yii;

class Generator extends \yii\gii\Generator
{
    public $moduleId;
    public $model;

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Migrate Generator';
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
            [['moduleId', 'model'], 'filter', 'filter' => 'trim'],
            [['moduleId', 'model'], 'required'],
            [['moduleId', 'model'], 'match', 'pattern' => '/^[\w\\-]+$/', 'message' => 'Only word characters and dashes are allowed.'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'moduleId' => 'Module ID',
            'model' => 'Model ID',
        ];
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return [
            'moduleId' => 'This refers to the ID of the module, e.g., <code>admin</code>.',
            'model' => 'This refers to the ID of the module, e.g., <code>admin</code>.',
        ];
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];
        $files[] = new CodeFile(
            $this->moduleId . '/migrate/' . $this->getMigrateName() . '.php',
            $this->render("migrate.php")
        );

        return $files;
    }

    public function getMigrateName()
    {
        return 'M' . gmdate('ymdHis') . $this->getLowName();
    }

    public function getProperty()
    {
        $objectName = $this->moduleId . '\models\\' . $this->getUpperName();
        $object = new $objectName;
        $reflection = new \ReflectionClass(get_class($object));
        $doc = $reflection->getDocComment();
        preg_match_all('/@property.+/', $doc, $match);

        $properties = [];
        foreach ($match[0] as $rule) {
            preg_match('/\$(.[^\s]*)/', $rule, $property);
            preg_match('/@property (.[^\s]+)/', $rule, $type);
            $properties[] = "'{$property[1]}' => {$this->getType($type[1])}";

        }
        return $properties;
    }

    public function getType($type)
    {
        if ($type == 'integer') {
            return '$this->integer(),';
        }
        if ($type == 'string') {
            return '$this->string(),';
        }
    }

    public function getUpperName()
    {
        return ucfirst($this->model);
    }

    public function getLowName()
    {
        return strtolower($this->model);
    }

    /**
     * @return string the controller namespace of the module.
     */
    public function getControllerNamespace()
    {
        return $this->getLowName() . '\controllers';
    }
}
