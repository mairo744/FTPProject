<?php
/**
 * Created by PhpStorm.
 * User: mairo744
 * Date: 18.7.2014
 * Time: 14:37
 */

class WebsiteController extends CController
{
    public $message = '';

    public function accessRules()
    {
        return array(
            array('allow',
                'actions'=>array('index', 'view', 'page'),
                      'users'=>array('@'),
            ),
         );
    }

    public function actionView($alias)
    {
        echo "Showing post with alias $alias.";
    }

    public function actionIndex()
    {
        $role = Role::model()->findByPk(1);
        $this->message = $role->description;
        $this->render('index',array('sprava' => $this->message));
    }

    public function actionPage($alias = 'not defined')
    {
        echo "Page is $alias.";
    }
}

?>