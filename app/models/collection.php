<?php
/**
 * Collection Model
 * 
 * @package groupcount
 * @author Dirk Brünsicke
 * @copyright brünsicke.com GmbH
 * @link http://groupcount.net
 **/
class Collection extends AppModel
{
	public $name = 'Collection';

	public $belongsTo = array(
		// 'User',
	);

	public $hasMany = array(
		'Count',
	);

	public function generate($slug)
	{
		$slug = (isset($slug))
			? $slug
			: Security::hash(md5(microtime().String::uuid().Configure::read('Security.salt')));

		$this->create();
		$this->save(array(
			'slug' => $slug,
		));
		return $slug;
	}


}
