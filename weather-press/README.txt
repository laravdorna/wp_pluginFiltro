=== weather press ===
Contributors: geagoir
Donate link: https://gum.co/oPzUn
Tags: weather, forecast, widgets, local weather, world weather
Requires at least: 3.3
Tested up to: 5.2.2
Stable tag: 4.7
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

You need an amazing wordpress weather plugin & widget ???
weather press offer you more !

== Description ==
<blockquote>

<H4>
Change the look and feel of your website with Weather Press,
</H4>
<H4>
Add the weather press Power and beauty to Your website.
</H4>

</blockquote>

<blockquote>

<p>
This is the Unique plugin that allow your visitors to get the weather data of as many cities as you wish inside a single, beautiful and powerful front-end Layout.
<br>
(Please See screenshots), or even Better : <a href="https://www.weather-press.com/weather-press-demos" target="_blank">the online demo</a>
</a>
</p>

</blockquote>
<strong>Weather Press Free Version</strong> come with a very basic administrator panel that allow you to
<ul>

<li>
   Set the plugin language,
</li>

<li>
   Set the temperature unit,
</li>

<li>
   Set the Main location (since V4.7),
</li>

<li>
   Set the Secondary location (since V4.7).
</li>

</ul>
   
<blockquote>
<ul>
<li>
   Please visit <strong><a href='https://www.weather-press.com/weather-press-how-to'>weather press, how to ?</a></strong> for installation purposes.
</li>
</ul>   
</blockquote>

<blockquote>

<a href="https://www.facebook.com/weather.press.page/" target="blank">Don't be shy! we are immediately available on facebook, just post your questions, ideas or feedbacks and we will be in touch..</a>
<p> 
<a href="https://www.facebook.com/weather.press.page/" target="blank"><strong>Like Us on Facebook, and start talking now!</strong></a>

<ul>
 
<li>
<strong> Read what Our premiums users shared about us on facebook :</strong>
</li>

</ul>

<ul>
<li>
<a href="https://www.facebook.com/weather.press.page/posts/723211037817289" target='blank'>
<strong>

Awesome support! Great plugin! I highly recommend using this plugin and if you want added functionalities, buy the pro version. It's awesome

</strong>
</a>
</li>

<li>
<a href="https://www.facebook.com/weather.press.page/posts/701477789990614" target='blank'>
<strong>

I just installed the NEW Weather Press plugin for a client who is in the heating and air conditioning industry. The plugin looks fantastic on their website and offers so many customizations! The upgrade was well worth the money! What's even better than this app is the customer service. I had a tiny issue with an error when I saved my customizations so I sent an e-mail and received a reply within the hour. EXCELLENT customer service! Thank you Weather Press!!

</strong>
</a>
</li>

</ul>
</blockquote>

== Installation ==

<strong>How to install and use Weather Press :</strong>

1. Upload `weather-press` unzipped folder to the `/wp-content/plugins/` directory or simply use the WordPress installer to install the zipped plugin file,
2. Activate the plugin through the 'Plugins' menu in WordPress,
3. Go to https://www.weather-press.com/weather-press-xml-generator <strong> to generate your two (2) locations IDs </strong>,
4. Now go to your weather press administration panel, under "Setup Locations" and enter your generated IDs.

5. Now you are ready to use your weather press as a plugin or as a widget. Enjoy !
6. To use weather press <strong>as a plugin</strong> just put the shortcode below anywhere in your theme's PHP files:

<h4>Shortcode:</h4>

			<?php
			include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

			if ( is_plugin_active( 'weather-press/weather-press.php' ) ) {

			    echo do_shortcode( '[weather_press]' );
				
			}	
			?>
			
			
7. To use weather press	<strong>as widget</strong> just go to your WordPress 
</br><strong> >>administrator dashbord</strong> 
</br><strong> >> appearance </strong>
</br><strong> >> widget </strong> and choose in which part of your current theme you want to integrate your weather press widget <strong>whith the possiblity to set a Title</strong>.

== Frequently Asked Questions ==

Don't be shy! we are immediately available on facebook, just post your questions, ideas or feedbacks and we will be in touch..
<ul>
<li>
Just Go to : https://www.facebook.com/weather.press.page/
</li>

<li>
Like Us on Facebook, and start talking !
</li>

<li>
<strong> Read what Our premiums users shared about us on facebook :</strong>
</li>

</ul>

<blockquote>
<ul>
<li>
<a href="https://www.facebook.com/weather.press.page/posts/723211037817289" target='blank'>
<strong>

Awesome support! Great plugin! I highly recommend using this plugin and if you want added functionalities, buy the pro version. It's awesome

</strong>
</a>
</li>

<li>
<a href="https://www.facebook.com/weather.press.page/posts/701477789990614" target='blank'>
<strong>

I just installed the NEW Weather Press plugin for a client who is in the heating and air conditioning industry. The plugin looks fantastic on their website and offers so many customizations! The upgrade was well worth the money! What's even better than this app is the customer service. I had a tiny issue with an error when I saved my customizations so I sent an e-mail and received a reply within the hour. EXCELLENT customer service! Thank you Weather Press!!

</strong>
</a>
</li>

</ul>
</blockquote>


== Screenshots ==
1. Everybody has its weather, a weather for everybody
2. The Premium Default Layout is 77% Better than the free one !!
3. Smartly responsive
4. Are we ready for Excellence ??
5. Weather press widget

== Changelog ==

= 4.7 =
* XML file removal for better hosting support

= 4.6 =
* Performance improvement

= 4.5 =
* Get The All New weather press Layout !
* Ajax calls, bugs correction !

= 4.4 =
* Important transient bugs correction

= 4.3 =
* bugs correction

= 4.2 =
* wordpress transients introduction
* improved translation
* minify css and js resources for better speed

= 4.1 =
* link the plugin to the new weather press website
* improved layout

= 4.0 Rises =
* The Weather Press REBUILT considering the user experience.
* ALL Features are improved !

= 2.7 =
* Default Layout improvement ( CSS/JS/PHP Classes )
* Adding the XML upload field to the admin panel
* Ajax call improvement

= 2.4 =
* Smartly responsive layout

= 2.3 =
* Change the openweathermap API KEY for better results.
* Establishing the 10% donation for humanitarian organizations.

= 2.2 =
* Enhance security with the WordPress  nonce check
* Reorganize the folders structure ( All main classes and the XML configuration file are now located in weather-press/includes folder )
* Use of the wp_localize_script to inject javascript variables( wich is the best way ).
* CSS and PHP code optimization.
* Better commented code.
* Addition of the weather press translater class.
* Addition of undefined.png icon.

= 1.1 =
* Stable release.

== Upgrade Notice ==

= 4.7 =
* If you update to this version you must set up your locations again as the XML configuration file is no longer used in weather press!

= 4.6 =
* If you update to this version you must generate a NEW XML configuration file !

= 4.5 =
important update, Get The All New weather press Layout !
important update, Ajax calls, bugs correction !

= 4.4 =
important update, worpress transients, bugs correction !