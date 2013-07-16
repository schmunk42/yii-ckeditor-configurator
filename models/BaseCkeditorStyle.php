<?php

/**
 * This is the model base class for the table "ckeditor_style".
 *
 * Columns in table "ckeditor_style" available as properties of the model:
 * @property integer $id
 * @property string $name
 * @property string $element
 * @property string $class
 * @property string $attributes_json
 *
 * There are no model relations.
 */
abstract class BaseCkeditorStyle extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'ckeditor_style';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('name, element, class, attributes_json', 'default', 'setOnEmpty' => true, 'value' => null),
			array('name, element, class', 'length', 'max'=>128),
			array('attributes_json', 'safe'),
			array('id, name, element, class, attributes_json', 'safe', 'on'=>'search'),
		    )
		);
	}

	public function behaviors()
	{
		return array_merge(
		    parent::behaviors(), array(
			'savedRelated' => array(
				'class' => 'gii-template-collection.components.CSaveRelationsBehavior'
			)
		    )
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('crud', 'ID'),
			'name' => Yii::t('crud', 'Name'),
			'element' => Yii::t('crud', 'Element'),
			'class' => Yii::t('crud', 'Class'),
			'attributes_json' => Yii::t('crud', 'Attributes Json'),
		);
	}


	public function search($criteria = null)
	{
        if (is_null($criteria)) {
    		$criteria=new CDbCriteria;
        }

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.name', $this->name, true);
		$criteria->compare('t.element', $this->element, true);
		$criteria->compare('t.class', $this->class, true);
		$criteria->compare('t.attributes_json', $this->attributes_json, true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns a model used to populate a filterable, searchable
	 * and sortable CGridView with the records found by a model relation.
	 *
	 * Usage:
	 * $relatedSearchModel = $model->getRelatedSearchModel('relationName');
	 *
	 * Then, when invoking CGridView:
	 * 	...
	 * 		'dataProvider' => $relatedSearchModel->search(),
	 * 		'filter' => $relatedSearchModel,
	 * 	...
	 * @returns CActiveRecord
	 */
	public function getRelatedSearchModel($name)
	{

		$md = $this->getMetaData();
		if (!isset($md->relations[$name]))
			throw new CDbException(Yii::t('yii', '{class} does not have relation "{name}".', array('{class}' => get_class($this), '{name}' => $name)));

		$relation = $md->relations[$name];
		if (!($relation instanceof CHasManyRelation))
			throw new CException("Currently works with HAS_MANY relations only");

		$className = $relation->className;
		$related = new $className('search');
		$related->unsetAttributes();
		$related->{$relation->foreignKey} = $this->primaryKey;
		if (isset($_GET[$className]))
		{
			$related->attributes = $_GET[$className];
		}
		return $related;
	}

}
