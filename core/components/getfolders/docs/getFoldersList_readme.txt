Modx Revolution Folder Listing Utility Snippet
====================
Author: J. Mercer <jm@ultravision.net> jerry325
Date:   Nov. 05 2016
====================
getFoldersList

Description
This Snippet is a helper Snippet for getFolders and is little use by itself.
It creates a list from the folders found with getFolders and with a bit of css
it can make a nice menu from your existing file structure.

Parameters

&getFoldersList_array array - The array returned by getFolders

Usage
Place the following snippet call into the page or chunk where you would like to use the results.

<ul>
[[!getFoldersList?
&getFoldersList_array=`[[+getFold_array]]`
]]
</ul>
*Note You MUST call getFold first. The <ul> tags are optional and may be changed to fit your 
application. There are some examples in the docs/resources folder. Please remember to rename the example 
template chunks. They have example_ prepended to their name so your working files will not be 
over written during an upgrade.



Release Notes
see getFold Readme.txt


