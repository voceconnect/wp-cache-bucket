<?php
/*
Plugin Name: WP Cache Bucket
Plugin URI: https://github.com/voceconnect/wp-cache-bucket
Description: Allows cache items to be tied to a single validation key
Version: 1.1.4
Author: Mike Pretty, Curtis Loisel, Voce Platforms
Author URI: http://voceplatforms.com
License: GPL2
*/

if ( !class_exists('WP_Cache_Bucket') ) {

	/**
	 * WP Cache Bucket
	 * Allows cache items to be tied to a single validation key so they can all be
	 * expired at once without having to stick all of them into a single cache key
	 */
	class WP_Cache_Bucket {

		public static function bucket_add($bucket, $key, $data, $group = '', $expire = 0) {
			$structured_data = array(
				'key' => self::_get_cache_bucket_key($bucket, $group),
				'data' => $data
			);

			return wp_cache_add($key, $structured_data, $group, $expire);
		}

		public static function bucket_set($bucket, $key, $data, $group = '', $expire = 0) {
			$structured_data = array(
				'key' => self::_get_cache_bucket_key($bucket, $group),
				'data' => $data
			);

			return wp_cache_set($key, $structured_data, $group, $expire);
		}

		public static function bucket_get($bucket, $key, $group = '', $force = false) {
			$structured_data = wp_cache_get($key, $group, $force);
			if(is_array($structured_data) && isset($structured_data['key']) &&
				($structured_data['key'] === self::_get_cache_bucket_key( $bucket , $group))) {
				return $structured_data['data'];
			}
			return false;
		}

		public static function bucket_flush($bucket, $group = '') {
			wp_cache_delete('wpcb_key_'. $bucket, $group);
		}

		/**
		 * Returns the key that validates the bucket
		 * @param string $bucket
		 * @param string $group
		 * @return string
		 */
		private static function _get_cache_bucket_key($bucket, $group = '') {
			$key = wp_cache_get('wpcb_key_'. $bucket, $group);
			if(false === $key) {
				$key = md5( uniqid( microtime() . mt_rand(), true ) );
				wp_cache_set('wpcb_key_'. $bucket, $key, $group);
			}

			return $key;
		}

	}

	function wp_cache_bucket_add($bucket, $key, $data, $group = '', $expire = 0) {
		return WP_Cache_Bucket::bucket_add($bucket, $key, $data, $group, $expire);
	}

	function wp_cache_bucket_set($bucket, $key, $data, $group = '', $expire = 0) {
		return WP_Cache_Bucket::bucket_set($bucket, $key, $data, $group, $expire);
	}

	function wp_cache_bucket_get($bucket, $key, $group = '', $force = false) {
		return WP_Cache_Bucket::bucket_get($bucket, $key, $group, $force);
	}

	function wp_cache_bucket_flush($bucket, $group = '') {
		WP_Cache_Bucket::bucket_flush($bucket, $group);
	}

}
