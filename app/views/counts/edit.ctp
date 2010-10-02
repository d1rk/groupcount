<?php
echo $this->Form->create('Count', array('url' => array('action' => 'add')));
echo $this->Form->hidden('Count.id', array(
	'value' => $this->data['Count']['id'],
));
echo $this->Form->hidden('Count.collection_id', array(
	'value' => $this->data['Collection']['id'],
));
echo $this->Form->hidden('Collection.slug', array(
	'value' => $this->data['Collection']['slug'],
));

echo $this->Form->input('Count.group', array(
	'type' => 'text',
	'class' => 'group big',
	'autocomplete' => 'off',
));

echo $this->Form->input('Count.val', array(
	'type' => 'text',
	'class' => 'count big',
	'autocomplete' => 'off',
));

echo $this->Form->submit( __('Next', true));

echo $this->Form->end();

