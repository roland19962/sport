<?php
/*
 * getImages
 *
 * DESCRIPTION
 *
 * This Snippet retrieves image files from a directory, processes them through 
 * template chunks and returns the resulting gallery.
 *
 * PARAMETERS:
 *
 * &getImages_Folder string - The name of the image folder to search. optional. Default: assets/photos
 * &getImages_Ext string - The extension of the images. optional. Default: jpg
 * &getImages_Sort string - the way you would like the images sorted. optional Default: filemtime
 * &getImages_Image_Tpl string - The name of a Chunk used to format Images. optional. Default: getImages_Image_Tpl
 * &getImages_Page_Tpl string - The name of a Chunk used to format the page. optional. Default: getImages_Page_Tpl
 * &getImages_Width integer - A number representing the width images to return. optional. Default: 150
 * &getImages_Height integer - A number representing the height images to return. optional. Default: 100
 * &getImages_Border integer - A number representing the border width. optional. Default: 0
 * &getImages_Class string - A class name to pass. optional. Default: ''
 * &getImages_PageClass string - A class name to pass. optional. Default: ''
 * &getImages_InfoClass string - A class name to pass. optional. Default: ''
 * &getImages_ExifClass string - A class name to pass. optional. Default: ''
 * &getImages_Id string - An id name to pass. optional. Default: ''
 * &getImages_PageId string - An id name to pass. optional. Default: ''
 * &getImages_InfoId string - An id name to pass. optional. Default: ''
 * &getImages_ExifId string - An id name to pass. optional. Default: ''
 * &getImages_Paging boolean - 1 to split images between pages. 0 for no split. optional. Default: 1
 * &getImages_Random boolean - 1 to sort results randomly. 0 for no 1 for less. optional. Default: 0
 * &limit string - A number representing the number of images to display per page (see getPage). optional. Default: 10
 * &pageLimit string - A number representing the number of page links to display (see getPage). optional. Default: 5
 *
 * version 2.4.0
 * author Jerry Mercer (ultravision.net)
 *
 * USAGE:
 *
 * [[!getImages? 
 * &getImages_Folder=`assets/photos` 
 * &getImages_Ext =`jpg,gif,png,JPG,GIF,PNG`
 * &getImages_Sort = `filemtime`
 * &getImages_Image_Tpl =`getImages_Image_Tpl`
 * &getImages_Page_Tpl =`getImages_Page_Tpl`
 * &getImages_Width =`150`
 * &getImages_Heigth=`100`
 * &getImages_Border=`2`
 * &getImages_Class =`imgClass`
 * &getImages_PageClass =`section`
 * &getImages_InfoClass =`info`
 * &getImages_ExifClass =`exif`
 * &getImages_Id =`imgId`
 * &getImages_PageId =`section`
 * &getImages_InfoId =`info`
 * &getImages_ExifId =`exif`
 * &getImages_Paging =`1`
 * &getImages_Random =`1`
 * &limit =`6`
 * &pageLimit=`3`
 * ]]
 *
 */

/***** SET VARIABLES *****/
// $folder = isset($_GET['folder']) ? $_GET['folder'] : ''; // use to get folder from URL
$folder = $modx->getOption('getImages_Folder', $scriptProperties, 'assets/photos'); // use to get default folder, or from parameters
$ext = $modx->getOption('getImages_Ext', $scriptProperties, 'jpg'); // What extension(s) do we use
$fileSort = $modx->getOption('getImages_Sort', $scriptProperties, 'filemtime'); // What to sort the images by
$image_tpl = $modx->getOption('getImages_Image_Tpl', $scriptProperties, 'getImages_Image_Tpl'); // template for each image
$page_tpl = $modx->getOption('getImages_Page_Tpl', $scriptProperties, 'getImages_Page_Tpl'); // template for completed page 
$width = $modx->getOption('getImages_Width', $scriptProperties, 300); // Width to use
$height = $modx->getOption('getImages_Height', $scriptProperties, 225);// Height to use
$border = $modx->getOption('getImages_Border', $scriptProperties, 0); // Border to use
$class = $modx->getOption('getImages_Class', $scriptProperties, ''); // class name
$pageClass = $modx->getOption('getImages_PageClass', $scriptProperties, ''); // class name
$infoClass = $modx->getOption('getImages_InfoClass', $scriptProperties, ''); // class name
$exifClass = $modx->getOption('getImages_ExifClass', $scriptProperties, ''); // class name
$id = $modx->getOption('getImages_Id', $scriptProperties, ''); // id name
$pageId = $modx->getOption('getImages_PageId', $scriptProperties, ''); // id name
$infoId = $modx->getOption('getImages_InfoId', $scriptProperties, ''); // id name
$exifId = $modx->getOption('getImages_ExifId', $scriptProperties, ''); // id name
$paging = $modx->getOption('getImages_Paging', $scriptProperties, 1); // Do we use paging
$rSort = $modx->getOption('getImages_Random', $scriptProperties, 0); // Do we use random sorting

$fPath = ''; // initialize full path to image variable
$imgFile = ''; // initialize full file name of image variable
$imgName = ''; // initialize image name variable
$path = ''; // initialize fPath less file name variable
$pPath = ''; // initialize path to parent folder variable
$tPath = ''; // initialize path strip-parent folder variable
$parent = ''; // initialize parent folder variable
$fHTML = ''; // initialize formatted HTML from template chunk variable
$c = 1; // initialize counter for foreach loop variable

/***** CREATE IMAGE ARRAY *****/
$allImages = glob($folder.'/*.{'.$ext.'}', GLOB_BRACE); // get images($images) from image folder($folder)
array_multisort(array_map($fileSort, $allImages), SORT_DESC, $allImages); // sort the array 
$tot = count($allImages);	        // counter for all images in folder

if ($paging > 0) {
	$images = array_slice($allImages, $offset, $limit);// Type your code here
}
else {
	$images = $allImages;
}

if ($rSort > 0) {
	shuffle($images);
}

/***** CREATE THE IMAGE SECTION FOR OUR PAGE *****/
foreach ($images as $image) // loop through the images array
{
	$modx->setPlaceholder('id', $id); // set id place-holder for use in template chunk
	$modx->setPlaceholder('count', $c); // set count place-holder
	$fPath = $image; // set full path to image
	$imgFile = basename($fPath); // strip to just image file name
	$imgName = rtrim($imgFile, ".".substr(strrchr($imgFile, "."), 1)); // strip extension
	$path = preg_replace('/'. preg_quote($imgFile, '/') . '$/', '', $fPath); // get path without file name	
	$fold = basename($path); // strip to get image folder
	$pPath = preg_replace('/'. preg_quote($fold, '/') . '\/$/', '', $path); // get path to parent folder 
	$tPath = substr($path, strpos($path, '/') + 1); //get path without root folder
	$parent = basename($pPath); // strip to get just parent folder
	$exif_data = exif_read_data ($fPath ,'IFD0' ,0 ); // read the exif data from the image
	$modx->setPlaceholder('imgLink', $fPath); // set imgLink place-holder
	$modx->setPlaceholder('imgName', $imgName); // set imgName place-holder
	$modx->setPlaceholder('path', $path); // set path place-holder
	$modx->setPlaceholder('pPath', $pPath); // set parent path place-holder
	$modx->setPlaceholder('tPath', $tPath); // set tPath place-holder
	$modx->setPlaceholder('parent', $parent); // set parent place-holder
	$modx->setPlaceholder('imgFile', $imgFile); // set imgFile place-holder
	$modx->setPlaceholder('folder', $fold); // set folder place-holder
	$modx->setPlaceholder('imgCamera', $exif_data['Model']); // set imgCamera place-holder
	$modx->setPlaceholder('imgDate', $exif_data['DateTime']); // set imgDate place-holder
	$fHTML = $modx->getChunk($image_tpl); //call the formatting chunk
	$photos .= $fHTML; // insert completed image sections into a string
	$c = $c+1; // increment the counter	
}

/***** COMPLETE THE PAGE *****/
$modx->setPlaceholder('width', $width); // set width place-holder
$modx->setPlaceholder('height', $height); // set height place-holder
$modx->setPlaceholder('border', $border); // set border place-holder
$modx->setPlaceholder('class', $class); // set class place-holder
$modx->setPlaceholder('pageClass', $pageClass); // set class place-holder
$modx->setPlaceholder('infoClass', $infoClass); // set class place-holder
$modx->setPlaceholder('exifClass', $exifClass); // set class place-holder
$modx->setPlaceholder('id', $id); // set id place-holder
$modx->setPlaceholder('pageId', $pageId); // set id place-holder
$modx->setPlaceholder('infoId', $infoId); // set id place-holder
$modx->setPlaceholder('exifId', $exifId); // set id place-holder
$modx->setPlaceholder('total', $tot); // set total place-holder
$modx->setPlaceholder('photos', $photos); // set photos place-holder
$page = $modx->getChunk($page_tpl); //call the formatting chunk and fill with the results

/***** RETURN COMPLETED PAGE *****/
return $page;