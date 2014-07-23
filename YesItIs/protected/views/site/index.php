<?php $this->pageTitle=Yii::app()->name; ?>

<h2>Hello again</h2>
<p>Toto je demo k tretiemu tutoriálu ako sa stať PHP ninja s Yii.</p>

<p>Ako funguje autorizácia a role si <?php echo CHtml::link('pozri tu', array('/authtest/index')); ?>.</p>

Prihlásiť sa môžeš s týmito používateľmi (pôvodné heslo pre všetkých je <strong>bla</strong>):
<ul>
<?php foreach ($users as $email => $role) echo "<li>$email (rola <i>$role</i>)</li>\n"; ?>
</ul>