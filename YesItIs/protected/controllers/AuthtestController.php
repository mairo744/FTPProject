<?php

class AuthtestController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}
	
	public function actionAdminonly()
	{
		$this->render('message', array('msg'=>'Only admin can view this!'));
	}
	
	public function actionTrainersonly()
	{
		$this->render('message', array('msg'=>'Only trainers (and admin) can view this!'));
	}
	
	public function actionAuthonly()
	{
		$this->render('message', array('msg'=>'Only authentificated users can view this!'));
	}

	public function filters()
	{
		return array(
			'accessControl',
		);
	}

	public function accessRules()
	{
		return array(
			array('allow',
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow',
				'actions'=>array('adminonly'),
				'roles'=>array('administrator'),
			),
			array('allow',
				'actions'=>array('trainersonly'),
				'roles'=>array('administrator', 'trainer'),
			),
			array('allow',
				'actions'=>array('authonly'),
				'users'=>array('@'),
			),
			array('deny',
				'users'=>array('*'),
			),
		);
	}
}