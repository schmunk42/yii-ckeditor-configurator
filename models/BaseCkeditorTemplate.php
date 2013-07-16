<?php

/**
 * This is the model base class for the table "ckeditor_template".
 *
 * Columns in table "ckeditor_template" available as properties of the model:
 * @property integer $id
 * @property string $title
 * @property string $image
 * @property string $description
 * @property string $html
 *
 * There are no model relations.
 */
abstract class BaseCkeditorTemplate extends CActiveRecord{
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function tableName()
	{
		return 'ckeditor_template';
	}

	public function rules()
	{
		return array_merge(
		    parent::rules(), array(
			array('title, image, description, html', 'default', 'setOnEmpty' => true, 'value' => null),
			array('title, image', 'length', 'max'=>128),
			array('description, html', 'safe'),
			array('id, title, image, description, html', 'safe', 'on'=>'search'),
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
			'title' => Yii::t('crud', 'Title'),
			'image' => Yii::t('crud', 'Image'),
			'description' => Yii::t('crud', 'Description'),
			'html' => Yii::t('crud', 'Html'),
		);
	}


	public function search($criteria = null)
	{
        if (is_null($criteria)) {
    		$criteria=new CDbCriteria;
        }

		$criteria->compare('t.id', $this->id);
		$criteria->compare('t.title', $this->title, true);
		$criteria->compare('t.image', $this->image, true);
		$criteria->compare('t.description', $this->description, true);
		$criteria->compare('t.html', $this->html, true);

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
