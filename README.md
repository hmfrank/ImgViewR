# ImgViewR
This is a simple, minimalistic, image viewer that I use to share pictures with friends.
Follow the steps below, to use it on your own web server.

## Prerequisites
* PHP has to be installed on your server.
* You need three versions of your images:  
  <sup>(I might add a little script in the future, to create them automatically)</sup>
  * full resolution
  * low resolution (about the size of a normal computer screen (like 1920 x 1080))
  * thumbnails (96 x 96)

## Deploying
* Clone the repository into some folder on your webserver.
* (optional) Delete all non-PHP files.
* Move your full resolution images into this folder.
* Create the folders `low/` and `thumbs/`.
* Move your low resolution images into `low/` and your thumbnails into `thumbs/`.  
  All these images have to have the same name in their folder.
* Adapt the sites, for your needs (change the heading, etc.).
