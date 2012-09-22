# JREAM Library - Utilities for PHP
## 

The JREAM Library is an Open Source PHP library licensed under the GPLv3 (http://www.gnu.org/licenses/).

## Minimum Requirements
- PHP 5.3
- For Database: MySQL PDO Enabled

##Namespaces

I find namespaces ugly in PHP, but they are necessary so you don't conflict with other libraries. 

It's easiest to just define a `use` case at the top of your file if you are not planning on prefixing every class, eg:

    <?php
    use jream\Output, use jream\Autoload;

    require 'jream/autoload.php';
    new Autoload('jream/');
    Output::success('It worked!');

##MVC

- To access urls go to http://localhost/index.php/controller/method
- To use mod_rewrite with .htaccess use:

    RewriteEngine On
    
    RewriteBase /
    RewriteCond %{REQUEST_FILENAME} !-f
    
    RewriteCond %{REQUEST_FILENAME} !-d

    RewriteRule ^(.+)$ index.php?$1 [QSA,L]

***
## 
Copyright (C), 2011-12 Jesse Boyer (<http://jream.com>)
GNU General Public License 3 (<http://www.gnu.org/licenses/>)