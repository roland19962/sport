<?php
/*
 * getFolders
 *
 * DESCRIPTION
 *
 * This Snippet creates an array of arrays representing the folder structure of the "path"
 * and returns a placeholder containing that array
 *
 * PARAMETERS:
 *
 * &getFolders_path string - The name of the path to search. optional. Default: assets
 *
 * version 2.0.3-pl
 * author J. Mercer (ultravision.net)
 *
 * USAGE:
 *
 * [[!getFolders? 
 * &getFolders_path=`assets` 
 * ]]
 *
 */

$path = $modx->getOption('getFolders_path', $scriptProperties, 'assets');

function globDir($path)
{
   $folders = glob("$path/*", GLOB_ONLYDIR);
   if(!empty($folders))
   {
      foreach($folders as $folder)
      {
	 $items = array();
	 $items[] = $folder;
         $items[] = globDir($folder);
	 $list[] = $items;
      }
   }
   return $list;
}

$list = globDir($path);
$modx->setPlaceholder('getFolders_array',$list);