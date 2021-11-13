<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Modified Yii 2 Advanced Project Template</h1>
    <ul>
    <li>Queue</li>
    <li>Mongo</li>
    <li>Redis</li>
    <li>Phone Number</li>
    <li>User Login/Register</li>
    <li>Admin LTE</li>
    <li>Article</li>
    <li>Category</li>
    <li>User Type</li>
    <li>I18n from DB</li>
    </ul>
    <br>
</p>

Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes three tiers: front end, back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Build Status](https://travis-ci.org/yiisoft/yii2-app-advanced.svg?branch=master)](https://travis-ci.org/yiisoft/yii2-app-advanced)


# Docker Commands
first of all, you need to copy all statment from ```docker-compose.yml``` and then
paste it to ```docker-compose-local.yml``` and change your custom configuration (Make sure its in ignore files)
- ```composer install```
- ```docker-compose -f docker-compose-local.yml build```
- ```docker-compose -f docker-compose-local.yml up -d```
- ```docker-compose -f docker-compose-local.yml exec backend php init```
- ```docker-compose -f docker-compose-local.yml exec backend php yii migrate```

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
api
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```


NGINX
-----
```
server {
    charset utf-8;
    client_max_body_size 128M;
    listen 80; ## listen for ipv4
    server_name wiba.local;
    root        /var/www/html/app/frontend/web/;
    index       index.php;

    access_log  /var/log/nginx/wiba_fe_access.log;
    error_log   /var/log/nginx/wiba_fe_error.log;
    
    # for cloudflare ssl
    #if ($http_x_forwarded_proto = "http") {
    #     return 301 https://$server_name$request_uri;
    #}


    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }
}
server {
    charset utf-8;
    client_max_body_size 128M;
    listen 80; ## listen for ipv4
    server_name back.app.test;
    root        /var/www/html/app/backend/web/;
    index       index.php;

    access_log  /var/log/nginx/wiba_be_access.log;
    error_log   /var/log/nginx/wiba_be_error.log;
    
    # for cloudflare ssl
    #if ($http_x_forwarded_proto = "http") {
    #     return 301 https://$server_name$request_uri;
    #}
    
    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }
}
server {
    charset utf-8;
    client_max_body_size 128M;
    listen 80; ## listen for ipv4
    server_name api.app.test;
    root        /var/www/html/app/api/web/;
    index       index.php;

    access_log  /var/log/nginx/wiba_ae_access.log;
    error_log   /var/log/nginx/wiba_ae_error.log;

    # for cloudflare ssl
    #if ($http_x_forwarded_proto = "http") {
    #     return 301 https://$server_name$request_uri;
    #}
    
    location / {
        # Redirect everything that isn't a real file to index.php
        try_files $uri $uri/ /index.php$is_args$args;
    }

    # deny accessing php files for the /assets directory
    location ~ ^/assets/.*\.php$ {
        deny all;
    }

    location ~ \.php$ {
        include fastcgi_params;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        fastcgi_pass 127.0.0.1:9000;
        #fastcgi_pass unix:/var/run/php/php7.2-fpm.sock;
        try_files $uri =404;
    }

    location ~* /\. {
        deny all;
    }
}


```

Install
-----
```
sudo apt-get install composer zip php-mbstring imagemagick php-fpm php-mysql php-common php-curl php-gd  php-imagick php-intl php-json php-mbstring php-memcache php-mongodb php-pgsql php-redis php-soap php-sockets php-sqlite3 php-xml php-zip 
sudo apt-get install build-essential
sudo apt install curl
sudo apt-get install supervisor
enable short tag for php_short tag
```

Apache
------
```
<VirtualHost *:80>
        ServerName app.test
        DocumentRoot "/var/www/html/app/frontend/web/"

        <Directory "/var/www/html/app/frontend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted

            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
    </VirtualHost>

 <VirtualHost *:80>
        ServerName back.app.test
        DocumentRoot "/var/www/html/app/backend/web/"

        <Directory "/var/www/html/app/backend/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted

            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
    </VirtualHost>

 <VirtualHost *:80>
        ServerName api.app.test
        DocumentRoot "/var/www/html/app/api/web/"

        <Directory "/var/www/html/app/api/web/">
            # use mod_rewrite for pretty URL support
            RewriteEngine on
            # If a directory or a file exists, use the request directly
            RewriteCond %{REQUEST_FILENAME} !-f
            RewriteCond %{REQUEST_FILENAME} !-d
            # Otherwise forward the request to index.php
            RewriteRule . index.php

            # use index.php as index file
            DirectoryIndex index.php

            # ...other settings...
            # Apache 2.4
            Require all granted

            ## Apache 2.2
            # Order allow,deny
            # Allow from all
        </Directory>
    </VirtualHost>

 <VirtualHost *:80>
        ServerName cdn.app.test
        DocumentRoot "/var/www/html/app/cdn/"

        <Directory "/var/www/html/app/cdn/">
        </Directory>
    </VirtualHost>

```
CRONTAB
-------
```
* * * * * /var/www/html/app/yii cron
```

QUEUE
--------------
Supervisor config files are usually available in /etc/supervisor/conf.d. You can create any number of config files there.

```
[program:yii-sms-queue]
process_name=%(program_name)s_%(process_num)02d
command=/usr/bin/php /var/www/html/app/yii sms-queue/index
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/tmp/yii-sms-queue.log


[program:yii-mail-queue]
process_name=%(program_name)s_%(process_num)02d
command=/usr/bin/php /var/www/html/app/yii mail-queue/index
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/tmp/yii-mail-queue.log

[program:yii-queue-worker]
process_name=%(program_name)s_%(process_num)02d
command=/usr/bin/php /var/www/html/app/yii  queue/listen --verbose=1 --color=0
autostart=true
autorestart=true
user=www-data
numprocs=4
redirect_stderr=true
stdout_logfile=/tmp/yii-queue-worker.log

