<?php namespace App\Entity\Blogpost;

use App\Entity\User\User;


class BlogpostModel extends \Phlex\RedFox\Model{

	public function repository(){ return $this->repositoryFactory('blogpost', 'database'); }

	protected function fields(){
		$this->hasField('id', (new \Phlex\RedFox\Fields\IdField("int(11) unsigned"))->notNullable()->constant());
		$this->hasField('title', (new \Phlex\RedFox\Fields\StringField("varchar(255)")));
		$this->hasField('body', (new \Phlex\RedFox\Fields\StringField("longtext")));
		$this->hasField('authorId', (new \Phlex\RedFox\Fields\IdField("int(11) unsigned")));
	}

	protected function relations(){
	    $this->belongsTo('author', User::class, 'authorId');
	}

	protected function attachments(){
		$this->hasAttachmentGroup('images')	->acceptExtensions('jpg', 'png');
	}

}


/**
 * px: @method \App\Entity\Blogpost\Blogpost[] collect($limit = null, $offset = null)
 * px: @method \App\Entity\Blogpost\Blogpost pick()
 */
class Request extends \Phlex\Database\Request{
    // no one uses this class, it exists only to help the IDE code completion
}