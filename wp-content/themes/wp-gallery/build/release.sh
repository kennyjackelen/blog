#!/bin/bash
cd ../js
rm -r publish
mkdir publish
rm main.min.js
minify main.js main.min.js
cat libs/jquery-1.10.2.min.js libs/min/bootstrap.min.js libs/min/jquery.magnific-popup.min.js libs/min/jquery.touchSwipe.min.js main.min.js > publish/onepost.js
cat libs/jquery-1.10.2.min.js libs/min/bootstrap.min.js main.min.js > publish/multipost.js
