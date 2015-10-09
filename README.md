Audio Player

DESIGN
Built on top of  on top of - http://mediaelementjs.com/, customised the setup process to be able to use the audio files from “files and uploads” and  host the code on our own server so that’s it’s easier to fix bugs or add functionality for the audio players in all our courses.
Folder Structure - 
build: Media Element JS files (DO NOT EDIT)
www: JQuery, Fonts and CSS files 
media: ignore this folder as it’s used by Media Element JS hello world examples

File Structure for 3 main files you’ll be using -

load.js - 
* finds the div element with the data attributes that you put into an edx component and creates an iFrame with the data provided such as the location of the audio file, and other settings. 
* functions for play, pause, skipTo and status which uses POST to call the audio player’s functions in the iFrame. 

index.php - 
* creates the media element audio player using the POST data sent from load.js
* every 500 milliseconds sends a message back about current time and duration

highlight.js -
* currently adds background color to the audiohighlight and highlight elements at certain audio timestamps 

CONTACT
Ankith Konda / a.konda@uq.edu.au

HOW TO USE
Add files to a folder in your server. 
edit the following files to allow for use in an edX component:
index.php - 
uncomment line 38 and line 65 

load.js -
edit the origin and baseurl variables 

In you edx component add the following for basic functionlity:
<div id="myAudioContainer" style="height: 50px !important;" class="audioplayer" data-audiofile=“[use full URL from files and uploads]” data-hidetimeline="false" data-showsubtitles="false"></div>
<script type='text/javascript' src='load.js'></script> 
NOTE: data-audiofile must use the full url of the audio file “courses.edx.org/…” and update load.js location to where you are hosting the files. For additional functionality check red.php and read through load.js and index.php to customise

APPEARANCE
small rectangular audio player with basic play, pause and volume

