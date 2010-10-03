<?php
/**
 * CollectionsController
 *
 * @package groupcount
 * @author Dirk Brünsicke
 * @copyright brünsicke.com GmbH
 * @link http://groupcount.net
 */
App::import('Core', array('Security'));
class CollectionsController extends AppController {

	public $paginate = array(
		'Count' => array(
			'order' => 'Count.created DESC',
			'limit' => 40,
		)
	);

/**
 * Shows a button to create a new Collection
 *
 * @return void
 * @access public
 */
	public function index()
	{
		$this->data = $this->paginate('Collection');
	}

/**
 * Shows a button to create a new Collection
 *
 * @return void
 * @access public
 */
	public function view($slug)
	{
		//TODO: limit - it loads ALL associated counts (!)
		$this->Collection->recursive = 0;
		$this->data = $this->Collection->findBySlug($slug);
		$this->data['Count'] = $this->paginate('Count', array('Count.collection_id' => $this->data['Collection']['id']));
		if(empty($this->data))
		{
			$this->Flash->error(
				__('Collection :slug not found.', true), 
				'/'
			);
		}
	}

	public function add($slug = null)
	{
		$slug = $this->Collection->generate($slug);
		$this->data = array('slug' => $slug);
		$this->Flash->success(
			__('Collection :slug created.', true), 
			array('controller' => 'collections', 'action' => 'view', $slug)
		);
	}

	public function result($slug)
	{
		if(!empty($this->data))
		{
			$this->set('filter', $this->data['Count']['group']);
		}
		$this->data = $this->Collection->findBySlug($slug);
		if(empty($this->data))
		{
			$this->Flash->error(
				__('Collection :slug not found.', true), 
				'/'
			);
		}
	}

}
