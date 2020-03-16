<?php
/**
---------------------------------------------------------------------------------------------------

				  THANK YOU FOR CHOOSING WEATHER PRESS

---------------------------------------------------------------------------------------------------
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://www.weather-press.com
 * @since      4.5
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/public/layouts/default
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
?>
<script type='text/javascript'>
// This function is needed to get the arabic time and date, please leave it here as it may cause problems once in the JS file

navig = navigator.appName;

versn = parseInt(navigator.appVersion);

if ( (navig == "Netscape" && versn >= 3) || (navig == "Microsoft Internet Explorer" && versn >= 4)) 
	info = "true";

else info = "false";

function Ar_Date() {
	
   if (info == "true") {

        var info3 = new Date();
        var info4=info3.getDay();
        var info5=info3.getMonth();
        var info6=info3.getDate();
        var info7=info3.getFullYear();
        var info8 = new Array('&#1604;&#1571;&#1581;&#1583;','&#1575;&#1604;&#1573;&#1579;&#1606;&#1610;&#1606;','&#1575;&#1604;&#1579;&#1604;&#1575;&#1579;&#1575;&#1569;','&#1575;&#1604;&#1571;&#1585;&#1576;&#1593;&#1575;&#1569;','&#1575;&#1604;&#1582;&#1605;&#1610;&#1587;','&#1575;&#1604;&#1580;&#1605;&#1593;&#1577;','&#1575;&#1604;&#1587;&#1576;&#1578;');
        var info9 = info8[info4];
        var info10 = new Array('&#1580;&#1575;&#1606;&#1601;&#1610;','&#1601;&#1610;&#1601;&#1585;&#1610;','&#1605;&#1575;&#1585;&#1587;','&#1571;&#1601;&#1585;&#1610;&#1604;','&#1605;&#1575;&#1610;','&#1580;&#1608;&#1575;&#1606;','&#1580;&#1608;&#1610;&#1604;&#1610;&#1577;','&#1571;&#1608;&#1578;','&#1587;&#1576;&#1578;&#1605;&#1576;&#1585;','&#1571;&#1603;&#1578;&#1608;&#1576;&#1585;','&#1606;&#1608;&#1601;&#1605;&#1576;&#1585;','&#1583;&#1610;&#1587;&#1605;&#1576;&#1585;');
        var info11 = info10[info5];
        //var info12=info9+'&#1548; '+info6+' '+info11+' '+info7;
        var info12=info9+'&#1548; '+info6+' '+info11;
		
        document.write(info12);

   }

}
</script>

<div id='weather-press-layoutContainer' class='weather-press-layoutContainer'>

    <div id="weather-press-loader" class="weather-press-loader animated flipOutX">
		
	    <div class="weather-press-closeIcon" data-weatherpressclose="weather-press-loader"></div>
		<div style='clear:both'></div>
		
		<div class="weather-press-signature">Weather Press</div>
		
		<div class="weather-press-outputs">
			
			<span class="weather-press-outputs-content" style=""><?php echo $weather_press_Translation['loading']; ?></span>

            <span class="weather-press-outputs-notice">

            </span>			
			
			<span class="weather-press-outputs-toPremium">

				<a href="https://goo.gl/nQBz6O" target="blank">Go Premium Now ?</a>
			
			</span>
		
		</div>
	
	</div>

    <div class='weather-press-block-top'>
	
	    <div class='weather-press-cities-nav-container'>
		
		    <div class='weather-press-cities-nav-sub-container'>
		
		        <div class='weather-press-arrows-container'>
				
				    <ul class='weather-press-cities-navs'>
					
					    <li id='weather-press-cities-navs-top'></li>
						<li id='weather-press-cities-navs-bottom'></li>
					
					</ul>
				
				</div>
			
			    <span id='weather-press-city-name' title='Main city'>Main city</span>
			
			    <span id='weather-press-display-image' title='current location image'></span>
			
			</div>
		
		</div>
		
		<div class='weather-press-cities-list-container'>
		
		    <ul class='weather-press-cities-list'>
		
		        <li class='deep'></li>
		        <li></li>
		        <li class='main-location' data-city='<?php echo $wpress_Main_Location_id; ?>'><?php echo $wpress_Main_Location_city_name; ?></li><!-- Main location -->
		        <li data-city='<?php echo $wpress_Secondary_Location_Bottom_id; ?>'><?php echo $wpress_Secondary_Location_Bottom_city_name; ?></li><!-- secondary location -->
		        <li class='deep'></li>

		    </ul>
		
		</div>
	
	</div>

    <div class='weather-press-block-bottom'>

		<div id='weather_press_scene_container' class='weather_press_scene_container'></div>

		<div class='weather-press-forecast-nav-container'>
		
		    <ul class='weather-press-forecast-navs'>
					
			    <li id='weather-press-forecast-navs-left'></li>
				<li id='weather-press-forecast-navs-right'></li>
					
			</ul>
		
		</div>
	
		<div class='weather-press-forecast-list-container'>
		
		    <ul class='weather-press-forecast-list'>

		        <li id='weather_press_forecast_node_0'><!-- forecast item -->
				
				    <ul class='weather-press-forecast-item'>
					
					    <li class='weather-press-date'>
						
							<?php
                                if( $weather_press_Current_Language == 'AR' ) {echo '<script language=javascript>Ar_Date();</script>';}

                                else if( $weather_press_Current_Language == 'EN' ) { echo date('l \t\h\e jS'); }

								else { echo '???'; }
                            ?>
						
						</li>
						
						<li class='weather-press-temp'>00°</li>

					    <li  class='weather-press-condition-img'>
						    <img src='<?php echo WEATHER_PRESS_PATH . '/public/images/demo-1.svg' ; ?>' alt='current condition'/>
						</li>

					    <li class='weather-press-minMax'>
						
						    <ul>

							    <li class='weather-press-min-temp'>00°</li>
							    <li class='weather-press-temp-gauge'><div class='weather-press-gauge-gradient'></div></li>
							    <li class='weather-press-max-temp'>00°</li>

							</ul>
						
						</li>
					
					</ul>
				
				</li>

                <div id="weather-press-forecast-loader" class="weather-press-forecast-loader"></div>				
				
		    </ul>
		
		</div>
	
	</div>
	
    <div class='weather-press-block-middle'>
	
	    <img src='<?php echo WEATHER_PRESS_PATH . '/public/images/sample.gif' ; ?>' alt='city image'/>
	
	</div>

    <div id='weather_press_brand' class='weather_press_brandy'><a href='https://goo.gl/4rmB8o' title='weather press' target='_blank'>weather press &copy; </a></div>

</div><!-- main container -->