<?php
$default = <<<HTML
<span class="item clearfix" rel=":Count.id">
	<span style="float: right">:edit</span>
	<code>:Count.group - :Count.val</code><br />
</span>
HTML;

$row['edit'] = $this->Html->link( __('edit', true), array('controller' => 'counts', 'action' => 'edit', $row['Count']['id']));

echo String::insert($$template, Set::flatten($row));
