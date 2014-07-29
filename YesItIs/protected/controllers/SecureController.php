<?php
/**
 * Created by PhpStorm.
 * User: mairo744
 * Date: 29.7.2014
 * Time: 15:08
 */

class SecureController extends Controller
{
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
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
}