<?php

echo "<?php\n";
echo "\nnamespace {$generator->moduleId}\migrate;\n";
?>

use yii\db\Migration;

/**
* Handles the creation of table `<?= $generator->getMigrateName() ?>`.
*/
class <?= $generator->getMigrateName(); ?> extends Migration
{
    /**
    * @inheritdoc
    */
    public function up()
    {

        $this->createTable('{{%<?= $generator->getLowName() ?>}}', [
    <?php foreach ($generator->getProperty() as $property): ?>
        <?= $property, "\n" ?>
    <?php endforeach; ?>
    ]);

    }

    /**
    * @inheritdoc
    */
    public function down()
    {
        $this->dropTable('{{%<?= $generator->getLowName() ?>}}');
    }
}
