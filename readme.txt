=== WP Cache Bucket ===
Contributors: voceplatforms, prettyboymp, csloisel, kevinlangleyjr
Tags: cache, caching, performance, optimization
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Allows cache items to be tied to a single validation key so they can all be expired at once.

== Description ==
Cache bucket uses the built-in WordPress `wp_cache` but contains methods to associate multiple items with a single cache object or 'bucket' without having to stick all of them into a single cache key. This is helpful when you have multiple items that need to be updated when one item is modified.

Because the key used to identify the cached item is dependent on other variables when it's being accessed, there is no easy way to identify all of the related keys that need to expire, and Memcached doesn't provide is a way to invalidate a group of data.  WP Cache Bucket provides a wrapper around the cache that gives a "bucket" interface, allowing us to easily expire the entire set of cached menus when an object changes.

**Please Note:**
This plugin does not do anything by itself on activation. It is meant to be a helper class for theme and plugin developers.

= Usage =
Cache Add:
`wp_cache_bucket_add( $bucket, $key, $data, $group = '', $expire = 0 )`

Cache Set:
`wp_cache_bucket_set( $bucket, $key, $data, $group = '', $expire = 0 )`

Cache Get:
`wp_cache_bucket_get( $bucket, $key, $group = '', $force = false )`

Cache Delete:
`wp_cache_bucket_flush( $bucket, $group = '' )`

== Installation ==

= As standard plugin: =
See [Installing Plugins](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins).

= As theme or plugin dependency: =
After dropping the plugin into the containing theme or plugin, add this snippet:

	if( ! class_exists( 'WP_Cache_Bucket' ) ) {
	    require_once( $path_to_wp_cache_bucket . '/wp-cache-bucket.php' );
	}

== Frequently Asked Questions ==

* **How is this different than WordPress Cache?**
  * *This plugin isn't much different from the built-in WordPress object cache methods, in fact it still uses them. The biggest advantage of this plugin is the ability to flush all data associated with a bucket.*

== Changelog ==

Please refer to the [Release History](https://github.com/voceconnect/wp-cache-bucket/releases)