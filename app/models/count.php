<?php
/**
 * Count Model
 * 
 * @package groupcount
 * @author Dirk Brünsicke
 * @copyright brünsicke.com GmbH
 * @link http://groupcount.net
 **/
class Count extends AppModel
{
	public $name = 'Count';

	public $belongsTo = array(
		'Collection' => array(
			'counterCache' => 'counts_count',
		),
		// 'User',
	);

	function get($slug)
	{
		$conditions = array('Count.slug' => $slug);
		$result = $this->find('all', compact('conditions'));
		return $result;
	}

}
