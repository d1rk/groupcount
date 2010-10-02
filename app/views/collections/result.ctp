<?php
echo $this->Html->link( __('Enter data for this Collection', true), array('controller' => 'collections', 'action' => 'view', $this->data['Collection']['slug']));

$groups = $values = $results = array();

foreach($this->data['Count'] as $item)
{
	extract($item);
	if(!array_key_exists($group, $values))
	{
		$values[$group] = array();
	}
	$values[$group][] = $val;
}

foreach($values as $group => $vals)
{
	echo '<div class="result item">';
	echo $this->Html->tag('h4', String::insert( __('Nummer: :group', true), array('group' => $group)));
	if(!array_key_exists($group, $results))
	{
		$results[$group] = 0;
	}
	echo $this->Html->nestedList($vals, array('class' => 'result rows'));
	foreach($vals as $val)
	{
		$results[$group] += $val;
		// echo $this->Html->tag('code', $val).'<br />';
	}
	echo $this->Html->tag('code', $results[$group], array('class' => 'result'));
	echo '</div>';
}

debug($results);
debug($values);

// debug($this->data);
?>
<style>
div.result.item {
	border-top: 1px solid #ccc;
	padding: 10px 0;
	
}
code.result { text-align: right; display: block; width: 200px; border-top: 1px solid #333; border-bottom: 3px double #000; }
ul.result.rows {
	list-style: none;
	text-align: right;
	width: 200px;
}
</style>