<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
);
?>

<h1>Manage Users</h1>

<p>Hello call. <?php $this->hello()?></p>
<?php
$this->widget('zii.widgets.CMenu',array('items'=>array(
        array('label'=>'Home', 'url'=>array('index')),
        array('label'=>'Yiiframework home','url'=>'http://yiiframework.ru/'), ),
))?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->with('role')->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'id_role',
			'filter'=>CHtml::listData(Role::model()->findAll(), 'id','name'),
			'value'=>'$data->role->name',
		),
        array(
            'name'=>'id_role',
            'value'=>'$data->role->description',
        ),
		array(
			'name'=>'email',
			'type'=>'email',
		),
		//'password',
		'name',
		'member_since',
		array(
			'name'=>'status',
			'filter'=>array('active'=>'Active', 'blocked'=>'Blocked'),
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
));



?>



