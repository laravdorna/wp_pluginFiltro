<?php
/*
---------------------------------------------------------------------------------------------------
                  THANK YOU FOR CHOOSING WEATHER PRESS
				  
				       www.weather-press.com
---------------------------------------------------------------------------------------------------
*/
/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.weather-press.com
 * @since      1.1
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/admin/partials
 */
?>
<script type='text/javascript'>
window.onload = function() 
{
document.getElementById('weatherPressAdminLoader').style.display = 'none'; // onload hide the loader
}
</script>

<?php

$weather_press_db_mainLocation = json_decode( get_option('weather_press_mainLocation') );
$weather_press_db_secLocation  = json_decode( get_option('weather_press_secondary_location') );

?>

<div id="weather-press-admin-Container" class="weather-press-admin-Container">


    <div class='weather-press-admin-loader' id='weatherPressAdminLoader'></div>
	
	<div class="weather-press-admin-RightBlock">

        <div class="weather-press-admin-RightBlock-Top">
			
			<div class="weather-press-admin-Carousel-Container">
			
			<ul class="weather-press-admin-Carousel" id="weather-press-admin-Carousel">
			
			    <li class="" id="weather-press-admin-Carousel-item1">
    
                    <img src="https://drive.google.com/uc?id=0B3MRVuLsCZ-NUlNwS0V2Ry15Qlk" alt="weather press advertising" onerror="this.src='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-no-image.png' ; ?>'" />
					
					<div class="weather-press-red"><?php echo $weather_press_ads_1['red']; ?></div>
					
					<a href="<?php echo $weather_press_ads_1['link']; ?>" target="_blank">
					
					   <span>
					       <h2>
						        <?php echo $weather_press_ads_1['title1']; ?>
								<strong><?php echo $weather_press_ads_1['title2']; ?></strong>
						   </h2>
						   <figcaption>
						        <?php echo $weather_press_ads_1['description']; ?>
						   </figcaption>						   
					   </span>
					</a>
				
				</li>
				
			    <li id="weather-press-admin-Carousel-item2" class="middle">
    
                    <img src="https://drive.google.com/uc?id=0B3MRVuLsCZ-NODFEZXFLcUY2OFk" alt="weather press advertising" onerror="this.src='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-no-image.png' ; ?>'" />				    
					
					<div class="weather-press-red"><?php echo $weather_press_ads_2['red']; ?></div>
					
					<a href="<?php echo $weather_press_ads_2['link']; ?>" target="_blank">
					   
					   <span>
					       <h2>
						        <?php echo $weather_press_ads_2['title1']; ?>
								<strong><?php echo $weather_press_ads_2['title2']; ?></strong>
								
						   </h2>
						   <figcaption>
						        <?php echo $weather_press_ads_2['description']; ?>
						   </figcaption>						   
					   </span>

					</a>
				
				</li>
				
			    <li id="weather-press-admin-Carousel-item3" class="right">
    
                    <img src="https://drive.google.com/uc?id=0B3MRVuLsCZ-NQzVCeVFCVmNHV28" alt="weather press advertising" onerror="this.src='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-no-image.png' ; ?>'" />		    
					
					<div class="weather-press-red"><?php echo $weather_press_ads_3['red']; ?></div>
					
					<a href="<?php echo $weather_press_ads_3['link']; ?>" target="_blank">
					
					   <span>
					       <h2>
						        <?php echo $weather_press_ads_3['title1']; ?>
								<strong><?php echo $weather_press_ads_3['title2']; ?></strong>
						   </h2>
						   <figcaption>
						        <?php echo $weather_press_ads_3['description']; ?>
						   </figcaption>
					   </span>
					</a>

				</li>
			
			</ul>
			
			<div class='weather-press-admin-brand'></div>
			
			<div class="weather-press-admin-Carousel-BgLeft">WE</div>
			<div class="weather-press-admin-Carousel-BgMiddle">LOVE</div>
			<div class="weather-press-admin-Carousel-BgRight">Weather Press</div>

			
			</div>
			
			<div class='weather-press-admin-Carousel-navigation'>

			    <div class="weather-press-admin-Carousel-Dots">
			
			        <ul>
				
				        <li id="weather-press-admin-Carousel-Dots1"></li>

				        <li id="weather-press-admin-Carousel-Dots2" class="active"></li>

				        <li id="weather-press-admin-Carousel-Dots3"></li>
				
				    </ul>
			
			    </div>

			    <div class="weather-press-admin-Carousel-ArrowRight" id="weather-press-admin-Carousel-ArrowRight"></div>

			    <div class="weather-press-admin-Carousel-ArrowLeft" id="weather-press-admin-Carousel-ArrowLeft"></div>
			
			</div>
		
		</div>
		
        <!-- Main Block -->
		<div id="weather-press-admin-RightBlock-Main" class="weather-press-admin-RightBlock-Main">
		
		    <!-- Returned response from the form -->
            <?php if ( isset($_REQUEST['status']) ): ?>

	        <div class='<?php echo $_REQUEST['status'] == 'ok' ? 'updated' : 'failure'; ?> settings-error notice is-dismissible weather-press-top'>
		
		        <strong>
				
				    <?php 
					     if( $_REQUEST['status'] == 'ok' ) {
							 
							 echo $weather_press_Translation['save_successful'];
							 
							 if( $_REQUEST['response'] != 'empty' ) {
								 
								echo '</br>' . $weather_press_Translation[ $_REQUEST['response'] ];
							 }							 
						 
						 } else {
							 
							 echo $weather_press_Translation['save_failure'] .'</br>'. $weather_press_Translation[ $_REQUEST['response'] ];
						 }
					?> 
					
				</strong>

		        <button type="button" class="notice-dismiss"><span class="screen-reader-text">I Love Weather Press.</span></button>

		    </div> 

           <?php endif; ?>	   

			<div class="weather-press-top-info">

			    <span class="weather-press-current-version">Free Weather Press  &copy;  Control Panel V <?php echo $this->version; ?></span>

			    <span class="weather-press-slogon">

				    <a href="https://www.weather-press.com/weather-press-store" target="_blank">Go premium</a>, get 80% more, and experience the Excellence

				</span>

			</div>

		<!-- Weather Press admin form -->
			
		<form method="POST" enctype="multipart/form-data" name="weather_press_ControlPanelForm" id ='weather_press_ControlPanelForm' action="<?php echo admin_url(). 'admin-post.php'; ?>">
			
			    <?php wp_nonce_field( 'weather_press_form_nonce' ); ?>
				
				<input type="hidden" name="action" value="weather_press_save_options">
			
			<a name="language_setting" class="weather-press-anchor weather-press-langAnchor"> &nbsp; </a>

			<div class="weather-press-row">
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['lang']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <select class="" name="language" size="1">
				
	                        <option value="EN" <?php echo $weather_press_current_Language == 'EN' ? 'selected="selected"' : '' ?> >English</option>
	                        <option value="AR" <?php echo $weather_press_current_Language == 'AR' ? 'selected="selected"' : '' ?> >Arabic</option>
	                        <option value="FR" disabled="">French ( premium )</option>
	                        <option value="ES" disabled="">Spanish ( premium )</option>
					
	                    </select>				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span><?php echo $weather_press_current_Language; ?></span>
						
						</div>
					
					</div>
					
				</div>	

			</div>
			
            <!-- **************************************************** -->			
			
		    <a name="unit_setting" class="weather-press-anchor"> &nbsp; </a>
			
			<div class="weather-press-row">
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['unit']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
					    <select name="unit" size="1">
				
	                        <option value="metric" <?php echo $weather_press_current_Unit == 'metric' ? 'selected="selected"' : '' ?> >Metric</option>
	                        <option value="imperial" <?php echo $weather_press_current_Unit == 'imperial' ? 'selected="selected"' : '' ?> >Imperial</option>
					
	                    </select>				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span><?php echo $weather_press_current_Unit; ?></span>
						
						</div>					
					
					</div>
					
				</div>	

			</div>

            <!-- **************************************************** -->

		    <a name="locations_setting" class="weather-press-anchor"> &nbsp; </a>
			
			<div class="weather-press-row">
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['mainLocation']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description-upload-xml">
						    <a href="https://www.weather-press.com/weather-press-xml-generator" target="_blank">
							
							    <?php echo $weather_press_Translation['location_id_generation']; ?>
								
							</a>
						</span>
	 
				        <input class='weather-press-search-input' value='' name='weather_press_main_location' placeholder='<?php echo $weather_press_db_mainLocation[0]->location_id; ?>' type='text'>
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>
							    <?php if( $weather_press_db_mainLocation[0]->city_name == 'none' ): ?>

							        <?php echo $weather_press_Translation['not_set']; ?>

								<?php else: ?>

									<?php echo $weather_press_db_mainLocation[0]->city_name . ' | ' . $weather_press_db_mainLocation[0]->country_name; ?>

								<?php endif; ?>
							</span>
						
						</div>					
					
					</div>
					
				</div>

			</div>
			
			<div class="weather-press-row">
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['new_SLocation']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description-upload-xml">
						    <a href="https://www.weather-press.com/weather-press-xml-generator" target="_blank">
							
							    <?php echo $weather_press_Translation['location_id_generation']; ?>
								
							</a>
						</span>
				 
				        <input class="weather-press-search-input" value="" name="weather_press_secondary_location" placeholder="<?php echo $weather_press_db_secLocation[0]->location_id; ?>" type="text">
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>
							    <?php if( $weather_press_db_secLocation[0]->city_name == 'none' ): ?>

							        <?php echo $weather_press_Translation['not_set']; ?>

								<?php else: ?>

									<?php echo $weather_press_db_secLocation[0]->city_name . ' | ' . $weather_press_db_secLocation[0]->country_name; ?>

								<?php endif; ?>
							</span>
						
						</div>					
					
					</div>
					
				</div>

			</div>

			<input type="submit" value='' hidden /> 

		</form><!-- end of the free admin form -->			

            <div class="weather-press-admin-Divider"><div class="inside"></div></div>
			
			<div class='weather-press-social-media'>
			
                <ul>
              
			        <li>
                        <a class='weather-press-media-facebook' href='https://goo.gl/a26Ch2' target='_blank' title='facebook'></a>
                    </li>
					
                    <li>
                        <a class='weather-press-media-youtube' href='https://goo.gl/dwVBok' target='_blank' title='youtube'></a>
                    </li>
				
                    <li>
                        <a class='weather-press-media-google' href='https://goo.gl/MKBHrP' target='_blank' title='google'></a>
                    </li>
					
                </ul>
			
			</div>
			
			<div class="weather-press-admin-Divider"><div class="inside"></div></div>

            <!-- **************************************************** -->

		    <a name="api_setting" class="weather-press-anchor"> &nbsp; </a>
			
			<div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
							<span>
							    This option allow you to use your own OpenWeatherMap API, for far better results than the shared Key.
							</span>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['API_key']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <input value="" name="" placeholder="<?php echo $weather_press_Translation['API_key_placeholder']; ?> ?" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <div class="weather-press-admin-Menu-status weather-press-admin-Menu-statusMissed"></div>
						
						</div>					
					
					</div>
					
				</div>

				<div class="weather-press-row-level2 weather-press-top">
					
					<div class="weather-press-row-left">

					    <span class="weather-press-description">
					
                            <?php echo $weather_press_Translation['OpenWeatherMap_sign_up']; ?> &nbsp <a href="https://goo.gl/xUKJzV" target="_blank">OpenWeatherMap registration page</a>
					
					    </span>

					</div>
					
				</div>
				
				<div class="weather-press-admin-Divider"><div class="inside"></div></div>
				
				<div class="weather-press-row-level2">
				
					<div class="weather-press-row-left">

					    <span class="weather-press-title weather-press-margin">
					
					        <?php echo $weather_press_Translation['auto_switch']; ?> <a href="http://openweathermap.org/" target="_blank">OpenWeatherMap</a> API ( fallback )
					
					    </span>

					</div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <div class="weather-press-admin-Menu-status weather-press-admin-Menu-statusOkay"></div>
						
						</div>		
					
					</div>					
				
				</div>
				
				<div class="weather-press-row-level2 weather-press-top">
					
					<div class="weather-press-row-left">

					    <span class="weather-press-description">
					
					        <?php echo $weather_press_Translation['shared_key']; ?>
					
					    </span>

					</div>
					
				</div>				

			</div>

            <!-- **************************************************** -->			
			
		    <a name="cache_setting" class="weather-press-anchor"> &nbsp; </a>
			
			<div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text weather-press-row-premium-mark-text-short">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
						</a>
						
					</div>
				
				</div>			
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['cache']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
					    <select name="" size="1">
				
	                        <option value="30" selected="selected">30min</option>
	                        <option value="60">1h</option>
	                        <option value="90">1h 30min</option>
	                        <option value="120">2h</option>
	                        <option value="150">2h 30min</option>
	                        <option value="180">3h</option>
					
	                    </select>				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>30min</span>
						
						</div>					
					</div>
					
				</div>	

			</div>			
            
			<!-- **************************************************** -->
			
			<a name="forecasts_setting" class="weather-press-anchor"> &nbsp; </a>
			
			<div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text weather-press-row-premium-mark-text-short">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
							<span>
							    This option allow you to choose the number of forecast days displayed on your plugin
							</span>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['days']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <select name="" size="1">
              
                            <option value="2">2</option>
					
	                        <option value="3">3</option>
					
	                        <option value="4">4</option>
					
	                        <option value="5">5</option>
					
	                        <option value="6">6</option>
					
	                        <option value="7" selected="selected">7</option>
					
	                        <option value="8">8</option>
					
	                        <option value="9">9</option>
					
	                        <option value="10">10</option>
					
	                        <option value="11">11</option>
					
	                        <option value="12">12</option>
					
				            <option value="13">13</option>
					
	                        <option value="14">14</option>
					
	                        <option value="15">15</option>
					
	                        <option value="16">16</option>
					
	                    </select>				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>7</span>
						
						</div>					
					
					</div>
					
				</div>	

			</div>
			
			<!-- **************************************************** -->
			
			<a name="mainlocation_setting" class="weather-press-anchor"> &nbsp; </a>
			
		    <div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
							<span>
							    Choose your main location and/or affect any alternative name instead of the real one and/or set a location image
							</span>
						</a>
						
					</div>
				
				</div>
				
				<span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['mainLocation']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['mainL_Explanation']; ?></span>
				 
				        <input class="weather-press-search-input" value="" name="" placeholder="New main location" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>Miami, United States</span>
						
						</div>					
					
					</div>
					
				</div>

			    <div class="weather-press-admin-Divider"><div class="inside"></div></div>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCountry_Explanation']; ?></span>
				 
				        <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						</div>					
					
					</div>
					
				</div>
				
				<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCity_Explanation']; ?></span>
				 
				        <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						</div>					
					
					</div>
					
				</div>
				
				<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['upload_image']; ?></span>
				 
				        <input name="" value="" multiple="false" type="file">
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
					
					        <span class="weather-press-switcher-title"><?php echo $weather_press_Translation['use_image']; ?></span>
							
							<div class="weather-press-switcher-container"><!-- use image switcher -->
							
							    <div class="weather-press-switcher-on" data-weatherPressSwitcher='mainLocation' id='weatherPress_mainLocationOn'>ON</div>
							
							    <div class="weather-press-switcher-needle" data-weatherPressSwitcher='mainLocation' id='weatherPress_mainLocationNeedle'></div>
							
							    <div class="weather-press-switcher-off weather-press-off-active" data-weatherPressSwitcher='mainLocation' id='weatherPress_mainLocationOff'>OFF</div>
							
							    <input value="0" id="weatherPress_mainLocationInput" name="" type="hidden">
						
						    </div>
							
						</div>	
					
					</div>
					
				</div>	

			</div>

            <!-- **************************************************** -->
			
			<a name="secondarieslocations_setting" class="weather-press-anchor"> &nbsp; </a>

		    <div class="weather-press-row weather-press-row-premium weather-press-top">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text weather-press-row-premium-mark-text-short">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
							<span>
							    <br>Add a secondary location here
							</span>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['new_SLocation']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <input class="weather-press-search-input" value="" name="" placeholder="New secondary location" type="text">				 
				 
				    </div>
					
				</div>

			</div>			

            <!-- **************************************************** -->
			
		    <div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
							<span>
							    Here you can manage all your secondaries locations, delete and/or set alternatives names and/or locations images
							</span>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['secondaryLocation']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-secondaries-row weather-press-options-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li class="weather-press-delete">
						        <input class="weather-press-DelCheckbox" name="" value="1" id="weather-press-Del1" type="checkbox">
							</li>

                            <li>
                                <label for="weather-press-Del1">Berlin</label>
							</li>

                            <li>							
						        Germany
						    </li>
							
						</ul>

                        <span class="weather-press-secondaries-options" data-weatherPressTarget="weather-press-secondaries-options-row1"></span>						
				 
				    </div>
					
					<div class="weather-press-secondaries-options-row weather-press-bottom" id="weather-press-secondaries-options-row1">
				 
				        <div class="weather-press-row-level2">
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCountry_Explanation']; ?></span>
				 
				                <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
    							<div class="weather-press-row-right-relative">
						
						            <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						        </div>			
							
							</div>
					
				        </div>
						
						<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				        <div class="weather-press-row-level2">    
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCity_Explanation']; ?></span>
				 
				                <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
					            <div class="weather-press-row-right-relative">
						
						            <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						        </div>
								
							</div>
					
				        </div>
						
						<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				        <div class="weather-press-row-level2">    
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['upload_image']; ?></span>
				 
				                <input name="" value="" multiple="false" type="file">
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
					            <div class="weather-press-row-right-relative">
					
					                <span class="weather-press-switcher-title"><?php echo $weather_press_Translation['use_image']; ?></span>
							
							        <div class="weather-press-switcher-container"><!-- use image switcher -->
							
							            <div class="weather-press-switcher-on" data-weatherPressSwitcher='otion1' id='weatherPress_otion1On'>ON</div>
							
							            <div class="weather-press-switcher-needle" data-weatherPressSwitcher='otion1' id='weatherPress_otion1Needle'></div>
							
							            <div class="weather-press-switcher-off weather-press-off-active" data-weatherPressSwitcher='otion1' id='weatherPress_otion1Off'>OFF</div>
							
							            <input value="0" id="weatherPress_otion1Input" name="" type="hidden">
						
						            </div>
							
						        </div>
							
							</div>
					
				        </div>
					
					</div>
					
				</div>

				<div class="weather-press-row-level2">    
					
					<div class="weather-press-secondaries-row weather-press-options-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li class="weather-press-delete">
						        <input class="weather-press-DelCheckbox" name="" value="1" id="weather-press-Del2" type="checkbox">
							</li>

                            <li>
                                <label class="" for="weather-press-Del2">Tokyo</label>
							</li>

                            <li> 
                                Japan
						    </li>
							
						</ul>

                        <span class="weather-press-secondaries-options" data-weatherPressTarget="weather-press-secondaries-options-row2"></span>						
				 
				    </div>
					
					<div class="weather-press-secondaries-options-row weather-press-bottom" id="weather-press-secondaries-options-row2">
				 
				        <div class="weather-press-row-level2">
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCountry_Explanation']; ?></span>
				 
				                <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
    							<div class="weather-press-row-right-relative">
						
						            <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						        </div>			
							
							</div>
					
				        </div>
						
						<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				        <div class="weather-press-row-level2">    
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCity_Explanation']; ?></span>
				 
				                <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
					            <div class="weather-press-row-right-relative">
						
						            <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						        </div>
								
							</div>
					
				        </div>
						
						<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				        <div class="weather-press-row-level2">    
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['upload_image']; ?></span>
				 
				                <input name="" value="" multiple="false" type="file">
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
					            <div class="weather-press-row-right-relative">
					
					                <span class="weather-press-switcher-title"><?php echo $weather_press_Translation['use_image']; ?></span>
							
							        <div class="weather-press-switcher-container"><!-- use image switcher -->
							
							            <div class="weather-press-switcher-on" data-weatherPressSwitcher='otion2' id='weatherPress_otion2On'>ON</div>
							
							            <div class="weather-press-switcher-needle" data-weatherPressSwitcher='otion2' id='weatherPress_otion2Needle'></div>
							
							            <div class="weather-press-switcher-off weather-press-off-active" data-weatherPressSwitcher='otion2' id='weatherPress_otion2Off'>OFF</div>
							
							            <input value="0" id="weatherPress_otion2Input" name="" type="hidden">
						
						            </div>
							
						        </div>
							
							</div>
					
				        </div>
					
					</div>
					
				</div>

				<div class="weather-press-row-level2">    
					
					<div class="weather-press-secondaries-row weather-press-options-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li class="weather-press-delete">
						        <input class="weather-press-DelCheckbox" name="" value="1" id="weather-press-Del3" type="checkbox">
							</li>

                            <li>
                                <label class="" for="weather-press-Del3">London</label>
							</li>

                            <li>							
						        United Kingdom
						    </li>
							
						</ul>

                        <span class="weather-press-secondaries-options" data-weatherPressTarget="weather-press-secondaries-options-row3"></span>						
				 
				    </div>
					
					<div class="weather-press-secondaries-options-row weather-press-bottom" id="weather-press-secondaries-options-row3">
				 
				        <div class="weather-press-row-level2">
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCountry_Explanation']; ?></span>
				 
				                <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
    							<div class="weather-press-row-right-relative">
						
						            <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						        </div>			
							
							</div>
					
				        </div>
						
						<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				        <div class="weather-press-row-level2">    
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['alternativeCity_Explanation']; ?></span>
				 
				                <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
					            <div class="weather-press-row-right-relative">
						
						            <span><?php echo $weather_press_Translation['not_set']; ?></span>
						
						        </div>
								
							</div>
					
				        </div>
						
						<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				        <div class="weather-press-row-level2">    
					
					        <div class="weather-press-row-left">
				 
				                <span class="weather-press-description"><?php echo $weather_press_Translation['upload_image']; ?></span>
				 
				                <input name="" value="" multiple="false" type="file">
				 
				            </div>
					
					        <div class="weather-press-row-right">
							
					            <div class="weather-press-row-right-relative">
					
					                <span class="weather-press-switcher-title"><?php echo $weather_press_Translation['use_image']; ?></span>
							
							        <div class="weather-press-switcher-container"><!-- use image switcher -->
							
							            <div class="weather-press-switcher-on" data-weatherPressSwitcher='otion3' id='weatherPress_otion3On'>ON</div>
							
							            <div class="weather-press-switcher-needle" data-weatherPressSwitcher='otion3' id='weatherPress_otion3Needle'></div>
							
							            <div class="weather-press-switcher-off weather-press-off-active" data-weatherPressSwitcher='otion3' id='weatherPress_otion3Off'>OFF</div>
							
							            <input value="0" id="weatherPress_otion3Input" name="" type="hidden">
						
						            </div>
							
						        </div>
							
							</div>
					
				        </div>
					
					</div>
					
				</div>				

			</div>
			
			<!-- **************************************************** -->
			
			<div class="weather-press-admin-Divider"><div class="inside"></div></div>
			
			<a name="layout_setting" class="weather-press-anchor"> &nbsp; </a>

		    <div class="weather-press-row weather-press-row-premium weather-press-row-floatRight">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text weather-press-row-premium-mark-text-short">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['layout']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Layout1" name="weather-press-layout-box" value="" checked="checked" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Layout1">default-v-1.0</label>
							</li>

                            <li>
							
							    <div id='weather-press-view-Layout1' class="weather-press-preview weather-press-preview-active" data-weather-press-preview='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-layout-default-v-1.png' ; ?>' data-weather-press-preview-type='layout' data-weather-press-gift='no'></div>
							
							</li>
							
						</ul>						
				 
				    </div>
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Layout2" name="weather-press-layout-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Layout2">default-v-2.0</label>
							</li>

                            <li>
							
							    <div id='weather-press-view-Layout2' class="weather-press-preview" data-weather-press-preview='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-layout-default-v-2.png' ; ?>' data-weather-press-preview-type='layout' data-weather-press-gift='no'></div>
							
							</li>
							
						</ul>						
				 
				    </div>					
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Layout3" name="weather-press-layout-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Layout3">rainbow-v-8.0</label>
							</li>

                            <li>
							
							    <div id='weather-press-view-Layout3' class="weather-press-preview" data-weather-press-preview='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-layout-rainbow-v-8.png' ; ?>' data-weather-press-preview-type='layout' data-weather-press-gift='yes'></div>							
							
							</li>
							
						</ul>						
				 
				    </div>
					
				</div>

			</div>
							
			<div id="weather-press-preview-container-layouts" class="weather-press-preview-container">
				
				<div class='weather-press-red weather-press-red-gift' style='display:none;'>your premium gift</div>
				
				<img src="<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-layout-default-v-1.png'; ?>" alt="preview">
				
			</div>
			
			<div class="weather-press-admin-Divider"><div class="inside"></div></div>
			
			<!-- **************************************************** -->
			
			<a name="icons_setting" class="weather-press-anchor"> &nbsp; </a>

		    <div class="weather-press-row weather-press-row-premium weather-press-row-floatRight">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text weather-press-row-premium-mark-text-short">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['icon']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Icon1" name="weather-press-icon-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Icon1">default</label>
							</li>

                            <li>
							
							    <div id='weather-press-view-Icon1' class="weather-press-preview" data-weather-press-preview='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-icon-default.png' ; ?>' data-weather-press-preview-type='icon'></div>							
							
							</li>
							
						</ul>						
				 
				    </div>
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Icon2" name="weather-press-icon-box" value="" checked="checked" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Icon2">goldy-v-8.0</label>
							</li>

                            <li>
							
							    <div id='weather-press-view-Icon2' class="weather-press-preview  weather-press-preview-active" data-weather-press-preview='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-icon-goldy-v-8.png' ; ?>' data-weather-press-preview-type='icon'></div>							
							
							</li>
							
						</ul>						
				 
				    </div>

					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Icon3" name="weather-press-icon-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Icon3">rainbow-svg-v-8.0</label>
							</li>

                            <li>
							
							    <div id='weather-press-view-Icon3' class="weather-press-preview" data-weather-press-preview='<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-icon-rainbow-svg-v-8.png' ; ?>' data-weather-press-preview-type='icon'></div>							
							
							</li>
							
						</ul>						
				 
				    </div>
					
				</div>

			</div>

			<div id="weather-press-preview-container-icons" class="weather-press-preview-container">
				
				<img src="<?php echo WEATHER_PRESS_PATH . '/admin/images/weather-press-preview-icon-goldy-v-8.png'; ?>" alt="preview">
					
				<div class="weather-press-red weather-press-red-gift">awesome icons</div>
				
			</div>

            <div class="weather-press-admin-Divider"><div class="inside"></div></div>			
			
			<!-- **************************************************** -->
			
			<a name="skins_setting" class="weather-press-anchor"> &nbsp; </a>

		    <div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['theme']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Theme1" name="weather-press-style-box" value="" checked="checked" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Theme1">avada-green</label>
							</li>

                            <li>
							
							    <div class=""></div>
							
							</li>
							
						</ul>						
				 
				    </div>
					
					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Theme2" name="weather-press-style-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Theme2">default-blue</label>
							</li>

                            <li></li>
							
						</ul>						
				 
				    </div>

					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Theme3" name="weather-press-style-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Theme3">default</label>
							</li>

                            <li></li>
							
						</ul>						
				 
				    </div>

					<div class="weather-press-secondaries-row weather-press-bottom weather-press-leftRadius">
				 
				        <ul>
						
						    <li>
						        <input id="weather-press-Theme4" name="weather-press-style-box" value="" type="radio">
							</li>

                            <li>
                                <label for="weather-press-Theme4">My custom style</label>
							</li>

                            <li></li>
							
						</ul>						
				 
				    </div>
					
					
				</div>
				
				<div class="weather-press-row-level2">
					
					<div class="weather-press-row-left weather-press-top">
				 
				        <span class="weather-press-description weather-press-top">
						
						    Developers can easily change the way the <a href="#layout_setting" target='_self'>chosen layout</a> will look like, by <a href="#extensions_setting" target='_self'>installing</a> their own css file,which will be added to the <a href="#skins_setting" target='_self'>skins</a> options
						
						</span>			 
				 
				    </div>
					
				</div>

			</div>		

            <!-- **************************************************** -->
			
			<a name="hovertexts_setting" class="weather-press-anchor"> &nbsp; </a>

		    <div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['hover']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['hover_SLocation_Explanation']; ?></span>
				 
				        <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>المواقع الثانوية</span>
						
						</div>					
					
					</div>
					
				</div>
				
				<div class="weather-press-admin-Divider"><div class="inside"></div></div>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['hover_Forecasts_Explanation']; ?></span>
				 
				        <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>5 days Forecasts</span>
						
						</div>					
					
					</div>
					
				</div>
				
				<div class="weather-press-admin-Divider"><div class="inside"></div></div>

				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['hover_geoloc_Explanation']; ?></span>
				 
				        <input value="" name="" placeholder="White space + &crarr; Enter to delete the old value" type="text">				 
				 
				    </div>
					
					<div class="weather-press-row-right">
					
					    <div class="weather-press-row-right-relative">
						
						    <span>私を見つけます</span>
						
						</div>					
					
					
					</div>
					
				</div>

			</div>			

            <!-- **************************************************** -->
			
			<a name="extensions_setting" class="weather-press-anchor"> &nbsp; </a>

		    <div class="weather-press-row weather-press-row-premium">
			
			    <div class="weather-press-premium-border weather-press-premium-borderTop"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderRight"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderBottom"></div>
			    <div class="weather-press-premium-border weather-press-premium-borderLeft"></div>
				
				<div class="weather-press-row-premium-markContainer">
				
				    <div class="weather-press-row-premium-mark-mainRect"></div>
					
					<div class="weather-press-row-premium-mark-insideRect"></div>
					
					<div class="weather-press-row-premium-mark-text weather-press-row-premium-mark-text-short">
					
						<a href="https://www.weather-press.com/weather-press-store" target="_blank">    
							PREMIUM<em>FEATURE</em>
						    <div class="weather-press-row-premium-mark-text-stars"></div>
							<span>
							    Choose and install any weather press extension from the weather press store
							</span>
						</a>
						
					</div>
				
				</div>				
			
			    <span class="weather-press-title weather-press-margin"><?php echo $weather_press_Translation['addNew']; ?></span>
				 
				<div class="weather-press-row-level2">    
					
					<div class="weather-press-row-left">
				 
				        <span class="weather-press-description"><?php echo $weather_press_Translation['upload_Explanation']; ?></span>
				 
				        <input name="" value="" multiple="false" type="file">			 
				 
				    </div>
					
				</div>

			</div>

            <div class="weather-press-admin-Divider"><div class="inside"></div></div>
			
			<div class='weather-press-social-media'>
			
                <ul>
              
			        <li>
                        <a class='weather-press-media-facebook' href='https://goo.gl/a26Ch2' target='_blank' title='facebook'></a>
                    </li>
					
                    <li>
                        <a class='weather-press-media-youtube' href='https://goo.gl/dwVBok' target='_blank' title='youtube'></a>
                    </li>
				
                    <li>
                        <a class='weather-press-media-google' href='https://goo.gl/MKBHrP' target='_blank' title='google'></a>
                    </li>
					
                </ul>
			
			</div>

			<div class="weather-press-admin-Divider"><div class="inside"></div></div>
			
			<div class="weather-press-top-info weather-press-top">
			
			    <span class="weather-press-current-version">&copy; 2016-2017 Weather press. All rights reserved.</span>
				
			    <span class="weather-press-slogon">
				
				    <a href="https://www.weather-press.com/weather-press-store" target="_blank">Go premium</a>, get 80% more, and experience the Excellence
				
				</span>
			
			</div>
			
			<!--<div class="weather-press-top-info weather-press-top">
			
			    <span class="weather-press-current-version">
				
				    <a href="https://goo.gl/vLnhWH" target="_blank">1$ contribution to keep improving Weather Press.</a>
				
				</span>
			
			</div>-->
			
		
		</div>
		<!-- End of the main block -->

    </div>

    <!-- Weather Press Control panel left menu -->
	<div id="weather-press-admin-Menu" class="weather-press-admin-Menu weather-press-admin-Menu-absolute">
	
	    <ul>
		
		    <li id='weatherPressAdminSubmit' class="weather-press-admin-menu-link-save">
		      
			    <?php echo $weather_press_Translation['save']; ?>
				
		    </li>

		    <li>

			    <a class="weather-press-admin-menu-link" href="#language_setting" data-weatherpresstext="<?php echo $weather_press_Translation['menu_language']; ?>">
				
				    <?php echo $weather_press_Translation['menu_language']; ?>
				
				</a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link" href="#unit_setting" data-weatherpresstext="<?php echo $weather_press_Translation['menu_unit']; ?>">
				
				    <?php echo $weather_press_Translation['menu_unit']; ?>
					
				</a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link" href="#locations_setting" data-weatherpresstext="<?php echo $weather_press_Translation['menu_Locations']; ?>">
				
		            <?php echo $weather_press_Translation['menu_Locations']; ?>
					
		            <!-- case of no xml file found-->
                    <?php if( $weather_press_db_mainLocation[0]->location_id == 0 || $weather_press_db_secLocation[0]->location_id == 0 ): ?>

                        <div class="weather-press-admin-Menu-status weather-press-admin-Menu-statusMissed animated weatherpresstwenty flash"></div> 

			        <?php else : ?>

                        <div class="weather-press-admin-Menu-status weather-press-admin-Menu-statusOkay"></div>
						
					<?php endif; ?>	
			
		        </a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#api_setting" data-weatherpresstext="Premium Feature">

		            <?php echo $weather_press_Translation['menu_API']; ?>

			        <div class="weather-press-admin-Menu-status weather-press-admin-Menu-statusOkay"></div>
					
		        </a>
				
			</li>
		   
		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#cache_setting" data-weatherpresstext="Premium Feature">
				
		            <?php echo $weather_press_Translation['menu_cache']; ?>

			        <div class="weather-press-admin-Menu-info">15 min</div>
					
		        </a>
				
			</li>		   

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#forecasts_setting" data-weatherpresstext="Premium Feature">

		            <?php echo $weather_press_Translation['menu_forecasts']; ?>

			        <div class="weather-press-admin-Menu-info">7</div>
			   
		        </a>
				
			</li>
		   
		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#mainlocation_setting" data-weatherpresstext="Premium Feature">
				
				    <?php echo $weather_press_Translation['menu_ML']; ?>
					
				</a>
				
			</li>

		    <li>
		        
				<a class="weather-press-admin-menu-link-premium" href="#secondarieslocations_setting" data-weatherpresstext="Premium Feature">
				
		            <?php echo $weather_press_Translation['menu_SL']; ?>
					
			        <div class="weather-press-admin-Menu-info">3</div>
					
		        </a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#layout_setting" data-weatherpresstext="Premium Feature">
				
		            <?php echo $weather_press_Translation['menu_layouts']; ?>
					
			        <div class="weather-press-admin-Menu-info">2</div>
					
		        </a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#icons_setting" data-weatherpresstext="Premium Feature">
				
		            <?php echo $weather_press_Translation['menu_icons']; ?>
					
			        <div class="weather-press-admin-Menu-info">3</div>
					
		        </a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#skins_setting" data-weatherpresstext="Premium Feature">
				
		            <?php echo $weather_press_Translation['menu_theme']; ?>
					
			        <div class="weather-press-admin-Menu-info">3</div>

		        </a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#hovertexts_setting" data-weatherpresstext="Premium Feature">
				
				    <?php echo $weather_press_Translation['hover']; ?>
					
				</a>
				
			</li>

		    <li>
			
			    <a class="weather-press-admin-menu-link-premium" href="#extensions_setting" data-weatherpresstext="Premium Feature">
				   
				    <?php echo $weather_press_Translation['menu_install']; ?>
					
				</a>
				
			</li>
		
		</ul>
	
	</div>
	
	
</div>