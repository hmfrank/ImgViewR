# ImgViewR
This is a simple, minimalistic, non-javascript, image viewer that I use to share pictures with friends.
Follow the steps below, to use it on your own web server.

## Prerequisites
* Your server has to run Linux.
* PHP has to be installed on your server (obviously).
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
* Thats it, have fun!  
  If you wanna add or remove images later on or if you wanna have multiple galaries on one server, take a look at the section _Caching_.

## Caching
On every request, the PHP-script has to obtain the same image list.
The eaziest way to do this is to read the directory content, filter out non-image files, and then sort by name.
To improve performance however, this is only done on the first request, then the list is cached in memory.
Specifically it is stored in `/dev/shm/imgviewr_cache.txt`. Btw. `/dev/shm/` is a memory-mounted file system.

There are two problems with this approach, you have to consider:
1. When you add or remove images to your galery, the cache file is not updated.  
   **Solution:** Just call `rc.php` once, which will reset the cache file.
2. You can only have one galery on one web server.  
   **Solution:** Change the name of the cache file, by changing the constant `CACHE_FILE` in `ls.php`.
   By giving each galery a different cache file name, they will all use their own cache file.
