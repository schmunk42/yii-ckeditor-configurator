<?php

class m130716_134508_init_tables extends EDbMigration
{
    public function up()
    {
        if (Yii::app()->db->schema instanceof CMysqlSchema) {
            $options = 'ENGINE=InnoDB DEFAULT CHARSET=utf8';
        } else {
            $options = '';
        }

        $this->createTable(
            "ckeditor_style",
            array(
                 "id"              => "pk",
                 "name"            => "varchar(128)",
                 "element"         => "varchar(128)",
                 "class"           => "varchar(128)",
                 "attributes_json" => "text",
            ),
            $options
        );

        $this->createTable(
            "ckeditor_template",
            array(
                 "id"          => "pk",
                 "title"       => "varchar(128)",
                 "image"       => "varchar(128)",
                 "description" => "text",
                 "html"        => "text",
            ),
            $options
        );
    }

    public function down()
    {
        $this->dropTable('ckeditor_style');
        $this->dropTable('ckeditor_template');
    }

    /*
    // Use safeUp/safeDown to do migration with transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}