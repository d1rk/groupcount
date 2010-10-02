<?php
echo $this->Html->link( __('See results for this Collection', true), array('controller' => 'collections', 'action' => 'result', $this->data['Collection']['slug']));


echo $this->Form->create('Count', array('url' => array('action' => 'add')));
echo $this->Form->hidden('Count.collection_id', array(
	'value' => $this->data['Collection']['id'],
));
echo $this->Form->hidden('Collection.slug', array(
	'value' => $this->data['Collection']['slug'],
));

// echo $this->Form->input('Collection.name', array(
// 	'value' => '',
// 	'label' => 'Name your collection',
// ));

echo <<<HTML
<div class="container">
	<div class="span-24">
	<div class="span-6">
HTML;

echo $this->Form->input('Count.group', array(
	'type' => 'text',
	'class' => 'group big',
	'autocomplete' => 'off',
));

echo <<<HTML
	</div>
	<div class="span-6">
HTML;


echo $this->Form->input('Count.val', array(
	'type' => 'text',
	'class' => 'count big',
	'autocomplete' => 'off',
));

echo <<<HTML
	</div>
	<div class="span-12 last">
HTML;

echo $this->element('flour/iterator', array(
	'caption' => __('Counts', true),
	'element' => 'counts/item',
	'data' => $this->data['Count'],
	'plugin' => 'flour',
));

echo $this->Form->submit( __('Next', true));


echo <<<HTML
	</div>
	</div>
</div>
HTML;

echo $this->Form->end();

