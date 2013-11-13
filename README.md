# Plugin Maker

> **Current version** early development stages  
> **Author** Shade  

## Overwiew

Plugin Maker is a lightweight web application written in PHP which helps you to build clean and advanced MyBB plugins.

The whole code behind Plugin Maker has been written from scratch so for example the main class contains only the necessary functions to make it work, meaning that performances are 100% optimized.

It's in early stages development, therefore it shouldn't be tested as it does nothing other than creating the earlier structures of a MyBB plugin.

## To-do list

- [] Create a reliable file handling functions system
- [x] Create the first steps
- [] Create the hooks database and the hooks-picking system
- [] Add settings support
- [] Add templates support
- [] Add css stylesheets support
- [] Add PluginLibrary support
- [] Add custom functions support
- [] Other...

# Developers

## Just the required

Plugin Maker doesn't rely on a MySQL database but works exploiting PHP's session and a lightweight custom file cache. For example, settings are stored in a stand-alone file which is read upon initialization, turning settings management the easiest and the fastest process possible.

The whole interface has an Object Oriented style with plenty of clean and useful functions, so other developers interested into forking the project can use them and extend them as they may like. For example, here's a snippet which loads and updates settings on the fly:

```php
// settings are now available as an array ($PM->settings)
$PM->show_settings();
$PM->cache_settings();
```
