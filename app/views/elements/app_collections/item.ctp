<?php
$default = <<<HTML
<div class="item clearfix" rel=":Collection.id">
	<h3>:link - :Collection.counts_count</h3>
	<p>:Collection.name</p>
</div>
HTML;

$row['link'] = $this->Html->link($row['Collection']['slug'], array('controller' => 'collections', 'action' => 'view', $row['Collection']['slug']));

echo String::insert($$template, Set::flatten($row));
