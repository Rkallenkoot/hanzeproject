hanzemvc
========

Simple MVC Framework

Make sure mod_rewrite is enabled. ( currently only tested on Apache )

XAMPP for Windows has this enabled by default.

Make sure the webserver has read/write permissions to the /app/cache folder.

# How to get started:
- `git clone $this->repoUrl $this->location && cd $_`
- composer update
- Make sure `the webserver` has read/write permissions in app/cache

# Development
1.	clone the repo
2.	composer update
3.	./runDevServer.sh  (make sure it's executable)

# Unstable as fck
Currently reworking:

##### Routing
Currently Rewriting the URL to index.php?url=$1

Goal is to Rewrite the URL to index.php and route with $_SERVER['REQUEST_URI']
