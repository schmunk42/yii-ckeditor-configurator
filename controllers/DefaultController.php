<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCkstyles() {
        $this->render('ckstyles');
    }

    public function actionCktemplates() {
        $models = CkeditorTemplate::model()->findAll();
        $templates = array();
        foreach($models AS $model) {
            $templates[] = $model->attributes;
        }
        header("Content-type: text/javascript");
        $this->renderPartial('cktemplates', array('templatesJson'=>CJSON::encode($templates)));
    }

}