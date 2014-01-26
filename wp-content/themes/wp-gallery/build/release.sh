#!/bin/bash
cd ../js
rm -r publish
mkdir publish
rm main.min.js
echo "Minifying js..."
minify main.js
echo "Concatenating js..."
cat libs/jquery-1.11.0.min.js libs/min/bootstrap.min.js libs/min/jquery.magnific-popup.min.js libs/min/jquery.touchSwipe.min.js main.min.js > publish/onepost.js
cat libs/jquery-1.11.0.min.js libs/min/bootstrap.min.js main.min.js > publish/multipost.js
cd ../css
rm -r publish
mkdir publish
rm main.min.css
echo "Minifying css..."
minify main.css
echo "Concatenating css..."
cat libs/min/bootstrap-all.min.css libs/min/magnific-popup.min.css main.min.css > publish/onepost.css
cat libs/min/bootstrap-all.min.css main.min.css > publish/multipost.css
