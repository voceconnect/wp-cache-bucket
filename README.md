WP Cache Bucket
=================
Contributors: voceplatforms, prettyboymp, csloisel, kevinlangleyjr  
Tags: cache, caching, performance, optimization  
Requires at least: 3.0  
Tested up to: 3.8.1  
Stable tag: 1.1.3  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description
Allows cache items to be tied to a single validation key so they can all be expired at once without having to stick all of them into a single cache key.

Cache bucket uses the built-in WordPress wp_cache but contains methods to associate multiple items with a single cache group or 'bucket'. This is helpful when you have multiple items that need to be updated when one item is modified.

## Installation

### As standard plugin:
> See [Installing Plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

### As theme or plugin dependency:
> After dropping the plugin into the containing theme or plugin, add the following:
```php
if( ! class_exists( 'WP_Cache_Bucket' ) ) {
    require_once( $path_to_wp_cache_bucket . '/wp-cache-bucket.php' );
}
```

## Usage
Use `wp_cache_bucket_add( $bucket, $key, $data, $group = '', $expire = 0 )` to add a cache bucket.  
Use `wp_cache_bucket_set( $bucket, $key, $data, $group = '', $expire = 0 )` to set a cache bucket.  
Use `wp_cache_bucket_get( $bucket, $key, $group = '', $force = false )` to get a cache bucket.  
Use `wp_cache_bucket_flush( $bucket, $group = '' )` to destroy a cached bucket.  

## Frequently Asked Questions

* **How is this different than WordPress Cache?**
  * *This plugin isn't much different from the built-in WordPress object cache methods, in fact it still uses them. The biggest advantage of this plugin is the ability to flush all data associated with a bucket.*

## Changelog
**1.1.2**  
* Adding Capistrano deploy scripts

**1.1.1**  
* Updating readme with function parameters

**1.1**  
* Updating readme
* Conversion to class

**1.0**  
* Initial release
