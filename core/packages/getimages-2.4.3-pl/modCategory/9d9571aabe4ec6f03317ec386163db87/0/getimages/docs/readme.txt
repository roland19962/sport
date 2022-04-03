MModx Revolution Photo Gallery Snippet
====================
Version 2.4.2
Author: J. Mercer <jm@ultravision.net> jerry325
Date:   Nov. 5 2016
====================
getImages


DESCRIPTION

This Snippet retrieves image files from a directory, processes them through 
template chunks and returns the resulting gallery.

PARAMETERS:

&getImages_Folder string - The name of the image folder to search. optional. Default: assets/photos
&getImages_Ext string - The extension of the images. optional. Default: jpg
&getImages_Sort string - the way you would like the images sorted. optional Default: filemtime
&getImages_Image_Tpl string - The name of a Chunk used to format Images. optional. Default: getImages_Image_Tpl
&getImages_Page_Tpl string - The name of a Chunk used to format the page. optional. Default: getImages_Page_Tpl
&getImages_Width integer - A number representing the width images to return. optional. Default: 150
&getImages_Height integer - A number representing the height images to return. optional. Default: 100
&getImages_Border integer - A number representing the border width. optional. Default: 0
&getImages_Class string - A class name to pass. optional. Default: ''
&getImages_PageClass string - A class name to pass. optional. Default: ''
&getImages_InfoClass string - A class name to pass. optional. Default: ''
&getImages_ExifClass string - A class name to pass. optional. Default: ''
&getImages_Id string - An id name to pass. optional. Default: ''
&getImages_PageId string - An id name to pass. optional. Default: ''
&getImages_InfoId string - An id name to pass. optional. Default: ''
&getImages_ExifId string - An id name to pass. optional. Default: ''
&getImages_Paging boolean - 1 to split images between pages. 2 for no split. optional. Default: 1
&getImages_Random boolean - 1 to sort results randomly. 0 for no 1 for less. optional. Default: 0
&limit string - A number representing the number of images to display per page (see getPage). optional. Default: 6
&pageLimit string - A number representing the number of page links to display (see getPage). optional. Default: 3

USAGE:
Place the following snippet call into the page or chunk where you would like the images to
appear. You can use the getImages_Folder parameter or the _Get to pull a folder name from the URL.
When used with getFoldersList and getPage it becomes a complete Photo Gallery solution that will 
grab all the images from a given folder structure and return Gallery pages based on that folder 
structure.


[[!getImages]]

*All variables are optional (if the 2 required chunks are named the default names and the images are placed in a 
folder named photos under assets folder or the Folder is pulled from URL by changing the $folder var in the snippet.)

There are more examples in the assets/components/getimages/docs folder
along with Step By Step instructions.

Release Notes
This sprang out of my rewrite of my "myGallery" Snippet. I was disappointed with the Gallery packages out 
there as I wanted to be able to simply add images and/or thumbnails to a directory via FTP and have them show 
up. It worked well but as I added more and more directories I found I had to create new pages and I'm far 
too lazy for that. I wanted to be able to make a page by simply scanning the folder structure that was 
uploaded via FTP and use the folder names as page names. I used my getFolders Snippet to get the folder 
structure and my getFoldersList Snippet to create a menu from that folder structure. I then used my 
getImagesFolder Snippet to pull the needed folder from the URL that the menu passed and then fed the results 
through Jason Coward's great getPage Snippet and I was in business. It sounds far more complicated than it 
is and it works like a dream. As of version 2.0 there is no longer a need for the getImagesFolder snippet 
(don't know what I was thinking with that kludge). As always I would be grateful for any and all suggestions 
for improvements. Support/Comments should be posted here:
http://forums.modx.com/thread/81713/support-comments-for-getimages


