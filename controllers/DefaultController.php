<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionCkstyles() {
        $models = CkeditorStyle::model()->findAll(array(
            'order' => 'name'
        ));
        $style = array();

        foreach ($models AS $model) {

            // clean array %temp foreach new style data set
            $temp = array();

            $temp['name'] = "'" . $model->name . "'";
            $temp['element'] = "'" . $model->element . "'";

            // Set attributes->class only when used in this style
            if ($model->class !== NULL) {
                $temp['attributes'] = "{'class':'" . $model->class . "'}";
            }
            array_push($style, $temp);
        }

        $json_string = CJSON::encode($style);
        $styles = str_replace('"', '', $json_string);

        // Remove surrounding [] wich came from array_push
        $styles_json = substr($styles, 1, -1);

        header("Content-type: text/javascript");

        $this->renderPartial('ckstyles', array('stylesJson' => $styles_json));
    }

    public function actionCktemplates() {
        $models = CkeditorTemplate::model()->findAll(array(
            'order' => 'title'
        ));
        $templates = array();
        foreach($models AS $model) {
            $templates[] = $model->attributes;
        }
        header("Content-type: text/javascript");
        $this->renderPartial('cktemplates', array('templatesJson'=>CJSON::encode($templates)));
    }

}
