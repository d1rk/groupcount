<?php
/**
 * CountsController
 *
 * @package groupcount
 * @author Dirk Brünsicke
 * @copyright brünsicke.com GmbH
 * @link http://groupcount.net
 */
class CountsController extends AppController {

	public function add()
	{
		if(!empty($this->data))
		{
			$this->Count->create();
			$this->Count->set($this->data);
			if($this->Count->validates())
			{
				$result = $this->Count->save();
				if($result)
				{
					//TODO: enhance condition
					if(isset($this->data['Collection']['name']) && !empty($this->data['Collection']['name']))
					{
						$this->Count->Collection->read(null, $this->data['Count']['collection_id']);
						$this->Count->Collection->save(array(
							'name' => $this->data['Collection']['name'],
							'slug' => $this->data['Collection']['name'],
						));
						$this->data['Collection']['slug'] = $this->data['Collection']['name'];
					}
					
					$this->Flash->success(
						__('Saved.', true),
						array('controller' => 'collections', 'action' => 'view', $this->data['Collection']['slug'])
					);
				}
			}
		}
	}

	public function edit($id)
	{
		if(!empty($this->data))
		{
			$this->Count->create();
			$this->Count->set($this->data);
			if($this->Count->save($this->data))
			{
				$this->Flash->success(
					__('Saved.', true),
					array('controller' => 'collections', 'action' => 'view', $this->data['Collection']['slug'])
				);
			}
		}
		$this->data = $this->Count->read(null, $id);
	}

}
