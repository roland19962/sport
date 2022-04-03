<?php
/*
 * getFoldersList
 *
 * DESCRIPTION
 *
 * This Snippet creates a list from the folders found with getFolders 
 *
 * PARAMETERS:
 *
 * &getFoldersList_array array - The array returned by getFolders
 *
 *version 2.0.3-pl
 * author J. Mercer (ultravision.net)
 *
 * USAGE:
 *
 * <ul>[[!getFoldersList]]</ul>
 * You MUST call getFolders first
 * 
 *
 */

$getFoldersList_array = $modx->getPlaceholder('getFolders_array');
$tplChild = $modx->getOption('tplChild', $scriptProperties, 'getFoldersList_Child_Tpl');
$tplParent = $modx->getOption('tplParent', $scriptProperties, 'getFoldersList_Parent_Tpl');

function populateList($curentArray, $modx, $tplChild, $tplParent, $level = 0)
{
	foreach ($curentArray as $directory)
	{
		if(empty($directory[1]))
		{
			$fPath = $directory[0];
			$folder = basename($fPath);
			$path = preg_replace('/'. preg_quote($folder, '/') . '$/', '', $fPath);
			$parent = basename($path);
			$modx->setPlaceholder('level', $level);
			$modx->setPlaceholder('parent', $parent);
			$modx->setPlaceholder('fPath', $fPath);
			$modx->setPlaceholder('path', $path);
			$modx->setPlaceholder('folder', $folder);
			$childChunk = $modx->getChunk($tplChild);
			$list .= $childChunk;
		}
		else
		{
			$children = populateList($directory[1], $modx, $tplChild, $tplParent, $level + 1);
			$path = $directory[0];
			$folder = basename($path);
			$modx->setPlaceholder('children', $children);
			$modx->setPlaceholder('path', $path);
			$modx->setPlaceholder('folder',$folder);
			$parentChunk = $modx->getChunk($tplParent);
			$list .= $parentChunk;

		}
	}

return $list;
}

$output = populateList($getFoldersList_array, $modx, $tplChild, $tplParent);

return $output;