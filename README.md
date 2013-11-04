# Plugin Maker

> **Current version** alpha development  
> **Author** Shade et al  

## Overwiew

Plugin Maker is a lightweight web application written in PHP which helps you to build clean and advanced MyBB plugins.

The whole code behind Plugin Maker has been written from scratch so for example the main class contains only the necessary functions to make it work, meaning that performance is 100% optimized.

It's in early stages development, shouldn't be tested as it does nothing than creating the earlier structures of a MyBB plugin.

# Developers

## Just the required

Plugin Maker doesn't rely on a MySQL database but works exploiting PHP's session and a lightweight custom file cache. For example, settings are stored in a stand-alone file which is read upon initialization, making managing settings the easiest and fastest process.

The whole interface has an Object Oriented style with plenty of clean and useful functions, so other developers interested into forking the project can use them and extend them as they may like. Eg.:

```php
// settings are now available as $PM->settings['version'], ...
$PM->show_settings();
// saving settings is easy - cache_settings() automatically handles incoming data
$PM->cache_settings();
```
