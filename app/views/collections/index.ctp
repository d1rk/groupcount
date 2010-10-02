<?php

echo $this->Html->link( __('Create new Collection', true), array('controller' => 'collections', 'action' => 'add'));

echo $this->element('flour/iterator', array(
	'caption' => __('Collections', true),
	'element' => 'app_collections/item',
	'plugin' => 'flour',
));

