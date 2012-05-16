<?php defined('C5_EXECUTE') or die("Access Denied."); ?>

<?
$list = $category->getPendingWorkflowProgressList();
$items = $list->getPage();
if (count($items) > 0) { ?>

<table class="ccm-results-list">
<tr>
	<th class="<?=$list->getSearchResultsClass('cvName')?>"><a href="<?=$list->getSortByURL('cvName', 'asc')?>"><?=t('Page Name')?></a></th>
	<th><?=t('URL')?></th>
	<th class="<?=$list->getSearchResultsClass('wpDateLastAction')?>"><a href="<?=$list->getSortByURL('wpDateLastAction', 'desc')?>"><?=t('Last Action')?></a></th>
</tr>
<? foreach($items as $it) { 
	$p = $it->getPageObject();
	$wp = $it->getWorkflowProgressObject();
	?>
<tr>
	<td><?=$p->getCollectionName()?></td>
	<td><a href="<?=Loader::helper('navigation')->getLinkToCollection($p)?>"><?=$p->getCollectionPath()?></a>
	<td><?=date(DATE_APP_GENERIC_MDYT_FULL, strtotime($wp->getWorkflowProgressDateLastAction()))?></td>
<? } ?>
</table>

<? } else { ?>
	<p>None.</p>
<? } ?>