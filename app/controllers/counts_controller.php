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
					$this->Flash->success(
						__('Saved.', true),
						array('controller' => 'collections', 'action' => 'view', $this->data['Collection']['slug'])
					);
				}
			}
		}
	}

}
