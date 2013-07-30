WP Cache Bucket
=================
Contributors: voceplatforms, prettyboymp, csloisel  
Tags: cache, caching, performance, optimization  
Requires at least: 3.0  
Tested up to: 3.5  
Stable tag: 1.0  
License: GPLv2 or later  
License URI: http://www.gnu.org/licenses/gpl-2.0.html

## Description
Allows cache items to be tied to a single validation key so they can all be expired at once without having to stick all of them into a single cache key.

Cache bucket uses the build-in Wordpess wp_cache but contains methods to associate multiple items with a single cache group or 'bucket'. This is helpful when you have multiple items that need to be updated when one item is modified.

## Installation

### As standard plugin:
> See [Installing Plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

### As theme or plugin dependency:
> After dropping the plugin into the containing theme or plugin, add the following:

    require_once( $path_to_voce_cached_nav . '/voce-cached-nav.php' );

## Usage
Use ```wp_cache_bucket_add()```to add a cache bucket.  
Use ```wp_cache_bucket_set()``` to set a cache bucket.  
Use ```wp_cache_bucket_get()``` to get a cache bucket.  
Use ```wp_cache_bucket_flush()``` to destroy a cached bucket.  

## Frequently Asked Questions

* **How is this different than WordPress Cache?**
  * *This plugin isn't much different from the built-in WordPress object cache methods, in fact it still uses them, it just groups keys before storing them*

# Changelog
**1.01**  
*Updating readme*  

**1.0**  
*Initial release.*  