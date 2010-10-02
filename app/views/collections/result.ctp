<?php
echo $this->Html->link( __('Enter data for this Collection', true), array('controller' => 'collections', 'action' => 'view', $this->data['Collection']['slug']));

$numFormat = array(
	'places' => 2,
	'thousands' => '.',
	'decimals' => ',',
	'before' => '',
	'after' => ' EUR',
);
$groups = $values = $results = array();
$sumMax = 0;

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
	// echo $this->Html->nestedList($vals, array('class' => 'result rows'));
	foreach($vals as $val)
	{
		$results[$group] += $val;
		$sumMax += $val;
		// echo $this->Html->tag('code', $val, array('class' => 'result'));
		echo $this->Html->tag('code', $this->Number->format($val, $numFormat), array('class' => 'count'));
	}
	echo $this->Html->tag('code', $this->Number->format($results[$group], $numFormat), array('class' => 'result'));
	$result = $results[$group];
	$provision = $result / 100 * 20;
	$remainder = $result - $provision;
	echo $this->Html->tag('code', String::insert( 
		__(':result - :provision = :remainder', true), array(
			'result' => $this->Number->format($result, $numFormat),
			'provision' => $this->Number->format($provision, $numFormat),
			'remainder' => $this->Number->format($remainder, $numFormat),
		)), array('class' => 'calc'));
	echo '</div>';
}

echo $this->Html->tag('h2', __('Endergebnis', true));

$numMax = count($results);
$sumMax = $this->Number->format($sumMax, $numFormat);
echo $this->Html->para('stat', "Anzahl Nummern: $numMax");
echo $this->Html->para('stat', "Summe Gesamt: $sumMax");

// debug($this->data);
?>
<style>
code { margin: 0; }
div.result.item {
	border-top: 1px solid #ccc;
	padding: 10px 0;
	
}
code.count { text-align: right; display: block; width: 200px; }
code.result { text-align: right; display: block; width: 200px; border-top: 1px solid #333; border-bottom: 3px double #000; }
code.calc { text-align: right; display: block; width: 200px; color: #666; }
ul.result.rows {
	list-style: none;
	text-align: right;
	width: 200px;
}
</style>