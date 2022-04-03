Modx Revolution Folder Utility Snippet
====================
Version 2.0.3
Author: J. Mercer <jm@ultravision.net> jerry325
Date:   Nov. 08 2016
====================
getFolders
 
DESCRIPTION

This Snippet creates an array of arrays representing the folder structure of the path you provide
and returns a placeholder named getFolders_array containing that array. When used with
getFoldersList(included) and a bit of css it can create a nice menu from your existing file structure.

PARAMETERS:

&getFolders_path string - The name of the path to search. optional. Default: assets

USAGE:

Place the following snippet call into the page or chunk before calling the results with
the getFolders_array placeholder.

[[!getFolders? 
&getFolders_path=`assets` 
]]

*All variables are optional (If of course you want to create an array from your assets directory).

*Note Please remember to rename the example template chunks. They have example_ prepended to their name 
so your working files will not be over written during an upgrade.

Release Notes
This sprang out of my rewrite of my "myGallery" Snippet. I was disappointed with the Gallery packages out 
there as I wanted to be able to simply add images and thumbnails to a directory via FTP and have them show 
up. It worked well but as I added more and more directories I found I had to create new pages and I'm far 
too lazy for that. I wanted to be able to make a page by simply scanning the folder structure that was 
uploaded via FTP and use the folder names as page names. I needed to scan the folder structure to make this 
happen and this is the solution I came up with. I did look at FileLister by Shaun McCormick but could not 
figure out how to get the folders only and recursively. (That does not mean it won't do that. It just means
I couldn't make it.) In any case I thought this might be useful to others so here it is. As always 
I would be grateful for any and all suggestions for improvements.
Support/Comments should be posted here:
https://forums.modx.com/thread/101124/supports-comments-for-getfolders