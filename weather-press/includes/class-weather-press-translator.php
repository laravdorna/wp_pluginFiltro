<?php
/*
---------------------------------------------------------------------------------------------------
                  THANK YOU FOR CHOOSING WEATHER PRESS
				  
				      www.weather-press.com
---------------------------------------------------------------------------------------------------

    Please Note that Exceptions are thrown by  short name code  in order to handle translation

----------------------------------------------------------------------------------------------------
*/
/**
 * The file that defines the translated outputs
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://www.weather-press.com
 * @since      2.7
 *
 * @package    Weather_Press
 * @subpackage Weather_Press/includes
 * @author     Zied Bouzidi <geagoir@gmail.com>
 */
class Weather_Press_Translator {
	 
	/**
	 * The appropriate returned translation array.
	 *
	 * @since    2.7
	 * @access   public
	 * @var      array    $weather_press_returned_Translation   The appropriate returned translation array.
	 */	
	public $weather_press_returned_Translation;
	
 	/**
	 * The arabic tab language for the administrator panel and public facing errors.
	 *
	 * @since    2.7
	 * @var      array    $weather_press_Translation_AR        The arabic tab language for the administrator panel and public facing errors.
	 */
    public $weather_press_Translation_AR = array(
 
    'lang' => 'إختر اللغة',
    'unit' => 'إختر الوحدة',
	'xml' => 'تحميل ملف XML',
	'xml_Explanation' => 'حمل الملف اللذي تحصلت عليه هنا',
	'xml_only_free' => 'فقط في النسخة المجانية  عليك تحميل هذا الملف',
	'OpenWeatherMap_sign_up' => 'احصل على مفتاح برمجة مجاني هنا',
    'auto_switch' => 'التحول التلقائي إلى',
	'shared_key' => 'مفتاح برمجة مشترك بين كل المستخدمين للنسخة الحالية',	
	'API_key' => 'أدخل مفتاح البرمجة الخاص بك',
	'API_key_placeholder' => 'مفتاح البرمجة',
	'cache' => 'حدد مدة ذاكرة بيانات الطقس',
    'days' => 'إختر عدد أيام التكهنات',
    'mainLocation' => 'الموقع الرئيسي',
    'hover' => 'المحتوى عند مرور الفأرة',
    'secondaryLocation' => 'المواقع الثانوية',
    'new_SLocation' => 'أضف موقعاً ثانوياً جديداً',
    'theme' => 'إختر المظهر',
    'layout' => 'إختر التصميم',
    'icon' => 'إختر حزمة صور الطقس',
    'addNew' => 'تثبيت اظافة جديدة',
  
    'mainL_Explanation' => 'الموقع الرئيسي المطلوب',
	'location_id_generation' => 'أدخل رمز الموقع اللذي تحصلت عليه هنا',
	'not_set' => 'غير محدد بعد',
    'alternativeCountry_Explanation' => 'هنا إختر إسم البلد الذي سيكون ظاهراً',
    'alternativeCity_Explanation' => 'هنا إختر إسم المدينة الذي سيكون ظاهراً',
    'hover_SLocation_Explanation' => 'المحتوى عند مرور الفأرة فوق المواقع الثانوية',
    'hover_Forecasts_Explanation' => 'المحتوى عند مرور الفأرة فوق التكهنات',
    'hover_geoloc_Explanation' => 'المحتوى عند مرور الفأرة فوق خيار تحديد الموقع',
    'upload_Explanation' => 'تحميل اظافة جديدة',
    'upload_image' => 'تحميل صورة جديدة',
    'use_image' => 'إستعمل هذه الصورة؟', 
    'valid_icons' => 'حزمة صور الطقس ليست حزمة سليمة',
    'menu_language' => 'إختيار اللغة',
    'menu_ML' => 'الموقع الرئيسي',
    'menu_SL' => 'المواقع الثانوية',
    'menu_theme' => 'إختيار المظهر',
    'menu_layouts' => 'إختيار التصميم',
    'menu_icons' => 'صور الطقس',
    'menu_install' => 'تثبيت اظافة جديدة',
    'save' => 'حفظ التغييرات',
	'menu_unit' => 'إختيار الوحدة',
	'menu_Locations' => 'تحديد المواقع',
	'menu_API' => 'مفتاح البرمجة',
	'menu_cache' => 'مدة الذاكرة',
	'menu_forecasts' => 'التكهنات',

	'save_failure' => 'وقع خطأ ما، الرجاء المحاولة ثانيةً',
	'save_successful' => 'تم حفظ البيانات بنجاح',
    'limit' => 'الملف تجاوز الحد الأقصى للتحميل',
    'type' => 'نوع الملف المحول غير مسموح',	
    'unknown' => 'حدث خطأ أثناء التحميل، الرجاء إعادة المحاولة',
    'empty' => 'إسم المدينة غير مدون',
	'connect' => 'الرجاء التثبت من الانترنات وإعادة المحاولة',
	'notvalid' => 'إسم المدينة غير صالح',
    'loadxml' => 'وقع خطأ أثناء تحميل ملف التعديلات',
	'nonce'  => 'فشل أثناء التحقق الأمني !',
	'success_xml' => 'تم تحميل ملف التعديلات بنجاح',
	'free_api' => ' لا يستجيب OpenWeatherMap !',
	'loading' => 'تحميل...'
   );

	/**
	 * The english tab language for the administrator panel and public facing errors.
	 *
	 * @since    2.7
	 * @var      array    $weather_press_Translation_EN        The english tab language for the administrator panel and public facing errors.	 
	 */
   public $weather_press_Translation_EN = array(

    'lang' => 'Choose your language',
    'unit' => 'Choose the temperature unit',
	'xml' => 'Upload your XML LOCATIONS file',
	'xml_Explanation' => 'Upload your XML LOCATIONS file generated here.',
	'xml_only_free' => 'Only free users need to Upload the XML file!',
	'OpenWeatherMap_sign_up' => 'Get Your Free API key with a simple sign up to',
	'auto_switch' => 'Automatically switched to',
	'shared_key' => 'This is a shared API key between all premium users.',
	'API_key' => 'Your own OpenWeatherMap API Key',
	'API_key_placeholder' => 'API KEY',
	'cache' => 'Maximum Lifetime of Cache',	
    'days' => 'Number of days ( Forecasts )',
    'mainLocation' => 'Set your Main location',
    'hover' => 'On hover texts',
    'secondaryLocation' => 'Secondaries locations',
    'new_SLocation' => 'Set your Secondary location',
    'theme' => 'Choose your skin',
    'layout' => 'Choose your layout',
    'icon' => 'Choose your icons package',
    'addNew' => 'Install a new extensions',
  
    'mainL_Explanation' => 'Here you can choose the main displayed location',
    'location_id_generation' => 'Enter your location ID generated here',
    'not_set' => 'Not set yet',
    'alternativeCountry_Explanation' => 'Here you can set the Country name that will appear using any possible language',
    'alternativeCity_Explanation' => 'Here you can set the City name that will appear using any possible language',
    'hover_SLocation_Explanation' => 'This is the text that will be shown when you hover the Secondaries locations',
    'hover_Forecasts_Explanation' => 'This is the text that will be shown when you hover the Forecasts option',
    'hover_geoloc_Explanation' => 'This is the text that will be shown when you hover the \'Locate me\' option',
    'upload_Explanation' => 'Upload a new extension (zip/css file)',
    'upload_image' => 'Upload a new image (png, jpg, jpeg, gif)',
    'use_image' => 'Use this image ?',   
    'valid_icons' => 'This  icons package is not a valid weather press package !',
    'menu_language' => 'Language Setting',
    'menu_ML' => 'Main Location',
    'menu_SL' => 'Secondaries Locations',
    'menu_theme' => 'Themes',
    'menu_layouts' => 'Layouts',
    'menu_icons' => 'Icons package',
    'menu_install' => 'Install new extension',
    'save' => 'Save changes',
    'menu_unit' => 'Unit Setting',
    'menu_Locations' => 'Setup locations',
    'menu_API' => 'API Key',
    'menu_cache' => 'Cache Lifetime',
    'menu_forecasts' => 'Forecasts',
	
	'save_failure' => 'An error occurred, please try again.',
	'save_successful' => 'Data saved successfully, Enjoy !',
    'limit' => 'Exceeded file size limit.',
    'type' => 'The type of the file you are trying to upload is not allowed.',	
    'unknown' => 'An unknown error occurred during the file upload, please try again.',
    'empty' => 'No locaion name was given, only premium users can set more locations.',
	'connect' => 'Please check your internet connection and try again.',
	'notvalid' => 'This city name / ID is not valid or OpenWeatherMap does not respond !',
	'loadxml' => 'Seems like a problem occurred trying to load the XML file.',
	'nonce'  => 'Failed security check !',
	'success_xml' => 'The XML file was uploaded successfully !',
	'free_api' => 'OpenWeatherMap does not respond !',
	'loading' => 'Loading ...'
   );

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    2.7
	 * @param      string    $weather_press_current_Language    The current language of this plugin.
	 */	 
	public function __construct( $weather_press_current_Language ) {

		   if( $weather_press_current_Language == 'AR' ) {
			   
			   $this->weather_press_returned_Translation = $this->weather_press_Translation_AR;

			} elseif( $weather_press_current_Language == 'EN' ) {
				
			   $this->weather_press_returned_Translation = $this->weather_press_Translation_EN;
				
			} else {
				
				$this->weather_press_returned_Translation = $this->weather_press_Translation_EN; // default
				
			}

	}
	
	
}