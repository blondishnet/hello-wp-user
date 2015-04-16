<?php
/**
 * @package Hello WP User
 * @version 1.0
 */
/*
Plugin Name: Hello WP User
Plugin URI: http://wordpress.org/extend/plugins/hello-wp-user/
Description: This plugin is inspired by the Hello Dolly plugin. It randomly shows tips at the top of the admin screen to help WordPress users with their website.
Author: Nile Flores
Version: 1.0
Author URI: http://blondishnet
*/

function hello_wpuser_tips() {
    /** These are WordPress tips */
    $tips = "Don't forget to backup your website.
Don't be afraid to update your WordPress installation.
Before upgrading themes and plugins, backup your website.
Have you secured your WordPress installation?
Is your password secure?
If your username is 'admin', for security reasons, you'll want to change it.
Make sure to configure your security plugin after you've installed it.
Use a contact form plugin instead of displaying your email address.
Need WordPress support? WordPress.org has a great support forum!
Have you set your permalink structure? 
Don't forget to share your own posts after you publish them.
Having a newsletter is a great idea to keep visitors informed of your website's latest news.
Blogging doesn't have to be perfect. Just write! You can edit it later.
Always keep your WordPress installation, theme, and plugins up-to-date.
If you don't want your post to publish right now, you can always schedule it for later.
Most problems to WordPress can be found by just 'Googling' it.
Have you given your visitors an easy way to share your posts?
A WordPress security plugin is great for throttling bad bots and scanning for malware.
Make sure your WordPress themes and plugins come from trusted sources.
Having a problem with comment spam? Akismet can help with that.
Blog what you know and love.
You can do anything with your WordPress website. All it takes is an ideal.
Don't forget to reply to those people who leave comments on your blog posts!
Using imagines, audio, and video can enhance your posts and pages.
Google and your visitors love a website with a clean and organized navigation.
Create content in as many mediums as possible to reach the most audience possible.
Do you have a site focus? If not, it's important to plan it.
Have fun writing!";

	// Here we split it into lines
	$tips = explode( "\n", $tips );

	// And then randomly choose a line
	return wptexturize( $tips[ mt_rand( 0, count( $tips ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_wpuser() {
	$chosen = hello_wpuser_tips();
	echo "<p id='wpuser-tips'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_wpuser' );

// We need some CSS to position the paragraph
function wpuser_tips_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#wpuser-tips {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'wpuser_tips_css' );

?>
