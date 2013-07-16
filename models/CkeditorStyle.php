<?php

// auto-loading
Yii::setPathOfAlias('CkeditorStyle', dirname(__FILE__));
Yii::import('CkeditorStyle.*');

class CkeditorStyle extends BaseCkeditorStyle
{
	// Add your model-specific methods here. This file will not be overriden by gtc except you force it.
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function init()
	{
		return parent::init();
	}

	public function get_label() {
		return (string) $this->name;

	}

	public function behaviors()
	{
		return array_merge(
			parent::behaviors(),
			array(
            ));
	}


	public function rules()
	{
		return array_merge(
		    parent::rules()
            /*, array(
			array('column1, column2', 'rule1'),
			array('column3', 'rule2'),
		    )*/
		);
	}

}
