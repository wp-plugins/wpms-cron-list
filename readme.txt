=== WPMS Cron List ===
Contributors: lakrisgubben,alfreddatakillen
Tags: cron
Requires at least: 3.7
Tested up to: 4.1.1
Stable tag: 0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Creates a list of url's to all wp-cron files in a WPMS installation. Useful if you've disabled wp-cron and are running an external cronjob.

== Description ==

There are some [inherent problems to the way wp-cron works.](https://tommcfarlin.com/wordpress-cron-jobs/) Sometimes you want to disable it and run your own (real) cron instead. This is usually quite simple, just disable wp-cron and set up a job that pings your sites wp-cron.php file on a regular interval. The problem comes when you have a multisite installation and need to ping alot of different sites wp-cron.php file. This plugin helps with that problem by creating a file with a list of url's to all wp-cron.php files in a WordPress multisite installation.

== Installation ==

1. Install the plugin either via the WordPress.org plugin directory, or by uploading the files to your server.
2. Activate it.
3. That's it. :)

== Frequently Asked Questions ==

= What does the plugin do? =

It generates a txt-file with a list of url's all wp-cron.php files in a WordPress multisite installation. The file will be found at: mydomain.com/wp-content/uploads/wpms_cron_list.txt

= How do I use the file created in a cronjob? =

See this [Gist](https://gist.github.com/alfreddatakillen/33642669507bb3eeab5f) for an example of how to use the file created by this plugin to ping all wp-cron.php files in a network.

= Does it work on a non-multisite installation? =

Nope. Nothing will happen if you activate it on a non-multisite installation.

= Are there any settings? =

Nope, there aren't any settings. Once you activate the plugin it creates the file with all url's. If you deactivate it the file get's deleted. Everytime you change the status of or create/delete a site in your network the file is updated.

= Where do I report bugs, contribute with code fixes etc..? =

On [GitHub](https://github.com/klandestino/wpms-cron-list)

== Changelog ==

= 0.1 =
* First version