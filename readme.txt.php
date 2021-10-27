=== WP Modal Plugin ===
Contributors: jmucak
Tags: modal, custom modal, popup, custom popup
Requires at least: 4.7
Tested up to: 5.8
Stable tag: 1.0.9
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Convert pages, posts and custom post types to plugin

== Description ==

WP Modal Plugin is made to convert any custom post type, page or post to modal. Plugin
automatically adds rewrite rules so you can still have nice and relevant URL when popup is opened.
Take full control of modal and override modal templates. You can create custom modal
templates so each page can have different template. You can also override based on
post type.

= How this plugin works =

1. Simply go to WP Modal Options page and choose post type you want to convert to modal
2. Choose an archive page, page that will be displayed below this popup
3. Go to Settings -> Permalinks and save permalinks so rewrite rules can be rewritten
4. That's it, you are good to go, post type single page will open in modal when you visit URL

If you add links to modal pages somewhere it will go to that link and open popup/modal, but if you
want to stay on the same page and not actually go to different page then you can use

To your link you add class **js-wpbfml-modal-trigger** and post-data-id attribute with post id

Example:

`<a href="#" class="js-wpbfml-modal-trigger" data-post-data-id="12">
    This is a test post type Link
</a>`

If you want to convert pages to modal
1. Go to page you want to convert, find Modal Page options meta box
2. Set Is Modal to true and set your archive page
3. Settings -> Permalinks and save permalinks
4. Open your page and it will open as modal
