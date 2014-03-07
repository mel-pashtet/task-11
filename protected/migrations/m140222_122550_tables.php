<?php

class m140222_122550_tables extends CDbMigration
{
	/*
	public function up()
	{
	}

	public function down()
	{
		echo "m140222_114043_create does not support migration down.\n";
		return false;
	}

	*/
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
		$this->createTable('users', array(
            'id' => 'pk',
            'username' => 'text',
            'password' => 'text',
            'last_login_time'=>'TIMESTAMP',
            
        ));

		$this->createTable('notes', array(
            'id' => 'pk',
            'notes_name' => 'text',
            'notes_value' => 'text',
            'notes_author'=>'text',
            'notes_update'=>'timestamp',
            'author_id'=>'integer NOT NULL',
           
        ));


		$this->createTable('comment', array(
            'id' => 'pk',
            'comment_author' => 'text',
            'comment_text' => 'text',
            'notes_id'=>'integer NOT NULL',
            'author_id'=>'integer NOT NULL',
            'time_comment'=>'timestamp',
           
        ));


       

        $this->addForeignKey('fk_author_id', 'notes','author_id','users', 'id','CASCADE','RESTRICT');
        $this->createIndex( 'fk_author_id_idx', 'notes', 'author_id' );
        
        $this->addForeignKey('fk_notes_id','comment','notes_id','notes', 'id', 'CASCADE', 'RESTRICT');
        $this->createIndex( 'fk_notes_id_idx', 'comment', 'notes_id' );

        
 
	

	}

	public function safeDown()
	{
		$this->dropForeignKey('fk_author_id', 'notes');
		$this->dropForeignKey('fk_notes_id','comment');
		$this->dropTable('users');
		$this->dropTable('notes');
		$this->dropTable('comment');
		
	}
	
}