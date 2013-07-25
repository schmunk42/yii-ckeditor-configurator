<?php

class CkeditorStyleController extends Controller
{
    public $layout='//layouts/column1';
    public $defaultAction = "admin";
    public $scenario = "crud";

    public function filters() {
	return array(
			'accessControl',
			);
}

public function accessRules() {
	return array(
			array('allow',
				'actions'=>array('create','editableSaver','update','delete','admin','view'),
				'roles'=>array('CkeditorConfigurator.CkeditorStyle.*'),
				),
			array('deny',
				'users'=>array('*'),
				),
			);
}

    public function beforeAction($action){
        parent::beforeAction($action);
        // map identifcationColumn to id
        if (!isset($_GET['id']) && isset($_GET['id'])) {
            $model=CkeditorStyle::model()->find('id = :id', array(
            ':id' => $_GET['id']));
            if ($model !== null) {
                $_GET['id'] = $model->id;
            } else {
                throw new CHttpException(400);
            }
        }
        if ($this->module !== null) {
            $this->breadcrumbs[$this->module->Id] = array('/'.$this->module->Id);
        }
        return true;
    }

    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $this->render('view',array('model' => $model,));
    }

    public function actionCreate()
    {
        $model = new CkeditorStyle;
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'ckeditor-style-form');
    
        if(isset($_POST['CkeditorStyle'])) {
            $model->attributes = $_POST['CkeditorStyle'];

            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        } elseif(isset($_GET['CkeditorStyle'])) {
            $model->attributes = $_GET['CkeditorStyle'];
        }

        $this->render('create',array( 'model'=>$model));
    }


    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        $model->scenario = $this->scenario;

                $this->performAjaxValidation($model, 'ckeditor-style-form');
        
        if(isset($_POST['CkeditorStyle']))
        {
            $model->attributes = $_POST['CkeditorStyle'];


            try {
                if($model->save()) {
                    if (isset($_GET['returnUrl'])) {
                        $this->redirect($_GET['returnUrl']);
                    } else {
                        $this->redirect(array('view','id'=>$model->id));
                    }
                }
            } catch (Exception $e) {
                $model->addError('id', $e->getMessage());
            }
        }

        $this->render('update',array('model'=>$model,));
    }

    public function actionEditableSaver()
    {
        Yii::import('EditableSaver'); //or you can add import 'ext.editable.*' to config
        $es = new EditableSaver('CkeditorStyle');  // classname of model to be updated
        $es->update();
    }

    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            try {
                $this->loadModel($id)->delete();
            } catch (Exception $e) {
                throw new CHttpException(500,$e->getMessage());
            }

            if(!isset($_GET['ajax']))
            {
                if (isset($_GET['returnUrl'])) {
                    $this->redirect($_GET['returnUrl']);
                } else {
                    $this->redirect(array('admin'));
                }
            }
        }
        else
            throw new CHttpException(400,Yii::t('crud', 'Invalid request. Please do not repeat this request again.'));
    }

    public function actionIndex()
    {
        $dataProvider=new CActiveDataProvider('CkeditorStyle');
        $this->render('index',array('dataProvider'=>$dataProvider,));
    }

    public function actionAdmin()
    {
        $model=new CkeditorStyle('search');
        $model->unsetAttributes();

        if(isset($_GET['CkeditorStyle'])) {
            $model->attributes = $_GET['CkeditorStyle'];
        }

        $this->render('admin',array('model'=>$model,));
    }

    public function loadModel($id)
    {
        $model=CkeditorStyle::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,Yii::t('crud', 'The requested page does not exist.'));
        return $model;
    }

    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='ckeditor-style-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
