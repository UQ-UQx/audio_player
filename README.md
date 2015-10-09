{\rtf1\ansi\ansicpg1252\cocoartf1348\cocoasubrtf170
{\fonttbl\f0\fnil\fcharset0 HelveticaNeue;\f1\fswiss\fcharset0 ArialMT;}
{\colortbl;\red255\green255\blue255;\red38\green38\blue38;\red50\green98\blue178;\red56\green110\blue255;
}
\paperw11900\paperh16840\margl1440\margr1440\vieww17920\viewh13940\viewkind0
\deftab720
\pard\pardeftab720\sl640\sa320

\f0\b\fs54 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Audio Player
\fs42 \cf3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec3 \
\pard\pardeftab720\sl500\sa320
\cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Design\
\pard\pardeftab720\sl512\sa320

\f1\b0\fs28 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 Built on top of  \cf0 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 on top of -\'a0{\field{\*\fldinst{HYPERLINK "http://mediaelementjs.com/"}}{\fldrslt \cf4 \expnd0\expndtw0\kerning0
\ul \ulc4 http://mediaelementjs.com/}}, customised the setup process to be able to use the audio files from \'93files and uploads\'94 and  host the code on our own server so that\'92s it\'92s easier to fix bugs or add functionality for the audio players in all our courses.\
Folder Structure - \
build: Media Element JS files (DO NOT EDIT)\
www: JQuery, Fonts and CSS files \
media: ignore this folder as it\'92s used by Media Element JS hello world examples\
\
File Structure for 3 main files you\'92ll be using -\
load.js - \
* finds the div element with the data attributes that you put into an edx component and creates an iFrame with the data provided such as the location of the audio file, and other settings. \
* functions for play, pause, skipTo and status which uses POST to call the audio player\'92s functions in the iFrame. \
index.php - \
* creates the media element audio player using the POST data sent from load.js\
* every 500 milliseconds sends a message back about current time and duration\
highlight.js\
* currently adds background color to the audiohighlight and highlight elements at certain audio timestamps 
\f0\fs32 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 \
\pard\pardeftab720\sl420

\b\fs36 \cf3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec3 \
\pard\pardeftab720\sl500\sa320
\cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Contact\
\pard\pardeftab720\sl512\sa320

\b0\fs32 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 Ankith Konda / {\field{\*\fldinst{HYPERLINK "mailto:uqadekke@uq.edu.au"}}{\fldrslt \cf3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec3 a.konda@uq.edu.au}}\
\pard\pardeftab720\sl420

\b\fs36 \cf3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec3 \
\pard\pardeftab720\sl500\sa320
\cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Implementation\
\pard\pardeftab720\sl512\sa320

\b0\fs32 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 Add files to a folder in your server. \
edit the following files to allow for use in an edX component:\
index.php - \
uncomment line 38 and line 65 \
\
load.js -\
edit the origin and baseurl variables \
\
In you edx component add the following for basic functionlity:\
<div id="myAudioContainer" style="height: 50px !important;" class="audioplayer" data-audiofile=\'93[use full URL from files and uploads]\'94 data-hidetimeline="false" data-showsubtitles="false"></div>\
<script type='text/javascript' src='load.js'></script> \
NOTE: data-audiofile must use the full url of the audio file \'93courses.edx.org/\'85\'94 and update load.js location to where you are hosting the files. For additional functionality check red.php and read through load.js and index.php to customise
\b\fs36 \cf3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec3 \
\pard\pardeftab720\sl420
\cf3 \
\pard\pardeftab720\sl500\sa320
\cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Appearance\
\pard\pardeftab720\sl512\sa320

\b0\fs32 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 small rectangular audio player with basic play, pause and volume\
\pard\pardeftab720\sl420

\b\fs36 \cf3 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec3 \
\pard\pardeftab720\sl500\sa320
\cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \strokec2 Course\
\pard\pardeftab720\sl512\sa320

\b0\fs32 \cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 IELTS\
\pard\pardeftab720\sl512
\cf2 \expnd0\expndtw0\kerning0
\outl0\strokewidth0 \
}