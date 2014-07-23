<?php
$this->breadcrumbs=array(
	'Authtest',
);?>
<h1>Authorization test</h1>

<p><?php echo CHtml::link('Admin only', array('/authtest/adminonly')); ?></p>
<p><?php echo CHtml::link('Trainers (+ admin) only', array('/authtest/trainersonly')); ?></p>
<p><?php echo CHtml::link('Authentificated only', array('/authtest/authonly')); ?></p>
