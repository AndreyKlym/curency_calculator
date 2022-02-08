<?php
/*
 * Plugin Name: Mydraft plugin
 * Plugin URI:  
 * Description: Plugin for adding and updating the exchange rate for the calculator
 * Version: 1.1.1
 * Author: Anklym
 *
 * Mydraft plugin is designed to add a form for entering exchange rates for calculating the cost in the admin 
 * part of the site. The exchange rate data is transferred to the database. Also added check for entering 
 * the correct values.
 * 
 * Network: true
 */


add_action( 'wp_enqueue_scripts', 'true_enqueue_styles', 25 );

class trueExcangePage{
	
	public $page_slug;
	public $option_group;
	
	function __construct()
	{
		$this->page_slug = 'true_exchange';
		$this->option_group = 'true_exchange_settings';

		add_action( 'admin_menu', array($this, 'add'));
		add_action( 'admin_init',  array($this, 'settings') );
		add_action( 'admin_notices',  array($this, 'notice') );
		
	}


 
	function add(){
	
		// add_menu_page 
		add_submenu_page( // добавляем в подменю в Настройки
			'options-general.php', // добавляем в Меню - Настройки - Курс валют для...
			'Настройки калькулятора для покупки юаней', // тайтл страницы
			'Курс валют для покупки юаней', // текст ссылки в меню
			'manage_options', // права пользователя, необходимые для доступа к странице
			$this->page_slug, // ярлык страницы
			array($this, 'display'),
			20 // добавление самым нижним элементом
		);
	}
 
	// function true_exchange_settings_page(){    // checking
	// 	echo 'checking pass';
	// }

	// Preparing the settings page for Settings API 
	function display(){
	// moved to constructor
		// echo 'checking pass'; 

		// page title output
		echo '<div class="wrap">
		<h1>' . get_admin_page_title() . '</h1> 
		<form method="post" action="options.php">';

			// settings_errors( 'true_exchange_settings_errors' ); // Вывод ошибок (дубль).  ярлык – любой, но одинаковый и для add_settings_error
	
			settings_fields( $this->option_group ); // для вывода скрытых полей страницы настроек,
			do_settings_sections( $this->page_slug ); // выводит секции и поля настроек,
			submit_button(); // функция для вывода кнопки сохранения настроек.
	
		echo '</form></div>';
	
	}
}

new trueExcangePage();

// Adding a field to a form

function settings(){
// function true_exchange_fields(){
 // register option type of curency
	register_setting($this->option_group, 'usd_rate', 'true_validate_usd_rate');

	register_setting($this->option_group, 'cny_rate', 'true_validate_cny_rate');

	register_setting($this->option_group,  'cny_rate1k', 'true_validate_cny_rate1k');

	register_setting($this->option_group, 'cny_rate2k', 'true_validate_cny_rate2k');

	register_setting($this->option_group, 'cny_rate3k', 'true_validate_cny_rate3k');

	register_setting($this->option_group, 'cny_rate5k', 'true_validate_cny_rate5k');

	register_setting($this->option_group, 'cny_rate10k', 'true_validate_cny_rate10k');

	register_setting($this->option_group, 'cny_rate15k', 'true_validate_cny_rate15k');

	register_setting($this->option_group, 'cny_rate20k', 'true_validate_cny_rate20k');

 
	// add section without title - will add a section (and subtitle if needed) to the settings page
	add_settings_section(
		// add_settings_section( $id, $title, $callback, $page ); все поля обязательные
		'slider_settings_section_id', // ID секции, пригодится ниже
		'Панель ввода курсов валют для расчета суммы доларов и гривны для покупки юаней (дробные числа вводить только через точку "." !)', // заголовок (не обязательно)
		'true_number_value', // функция для вывода HTML секции (необязательно) выполняется в начале секции, перед выводом полей. true_number_value
		$this->page_slug // ярлык страницы на которой выводить секцию // 'media'
	);

 
	// adding a field type of curency
	add_settings_field(
		'usd_rate',
		'Курс гривны к долару',
		array($this, 'field'), 
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'usd_rate', // выделение поля при наведении на тайтл
			'name' => 'usd_rate', // любые доп параметры в колбэк функцию
		)
	);

	add_settings_field(
		'cny_rate',
		'Курс юаня к долару',
		array($this, 'field'), // название функции - обратного вызова для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'cny_rate', // выделение поля при наведении на тайтл
			'name' => 'cny_rate', // любые доп параметры в колбэк функцию
		)
	);

	add_settings_field(
		'cny_rate1k',
		'Курс юаня к долару (для суммы 	1000$ +)',
		array($this, 'field'), // название функции - обратного вызова для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'cny_rate1k', // выделение поля при наведении на тайтл
			'name' => 'cny_rate1k', // любые доп параметры в колбэк функцию
		)
	);
 
	add_settings_field(
		'cny_rate2k',
		'Курс юаня к долару (для суммы 	2000$ +)',
		array($this, 'field'), // название функции - обратного вызова для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'cny_rate2k', // выделение поля при наведении на тайтл
			'name' => 'cny_rate2k', // любые доп параметры в колбэк функцию
		)
	);
 
	add_settings_field(
		'cny_rate3k',
		'Курс юаня к долару (для суммы 	3000$ +)',
		array($this, 'field'), // название функции - обратного вызова для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'cny_rate3k', // выделение поля при наведении на тайтл
			'name' => 'cny_rate3k', // любые доп параметры в колбэк функцию
		)
	);
 
	add_settings_field(
		'cny_rate5k',
		'Курс юаня к долару (для суммы 	5000$ +)',
		array($this, 'field'), // название функции - обратного вызова для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'cny_rate5k', // выделение поля при наведении на тайтл
			'name' => 'cny_rate5k', // любые доп параметры в колбэк функцию
		)
	);
 
	add_settings_field(
		'cny_rate10k',
		'Курс юаня к долару (для суммы 10000$ +)',
		array($this, 'field'), // название функции - обратного вызова для вывода
		$this->page_slug, // ярлык страницы
		'slider_settings_section_id', // // ID секции, куда добавляем опцию
		array( 
			'label_for' => 'cny_rate10k', // выделение поля при наведении на тайтл
			'name' => 'cny_rate10k', // любые доп параметры в колбэк функцию
		)
	);
 
}




function field($args){
	// get value from database
	$value_dol = get_option( $args[ 'name' ] );
 
	printf(   // function to display HTML fields
		'<input type="text" min="1" id="%s" name="%s" value="%f" />',
		esc_attr( $args[ 'name' ] ),
		esc_attr( $args[ 'name' ] ),
		floatval( $value_dol ) // absint( $value_dol )
	);

	?>
	<p>
      текущий курс 
	  <!-- <?php  echo $value_dol;  ?> -->
    </p>
	<?php 

	// checking
    // $result_usd_rate = get_option( 'usd_rate' );
    // echo 'Текущий курс долара '. $result_usd_rate;
	
    // $result_cny_rate = get_option( 'cny_rate' );
    // echo 'Текущий курс юаня '. $result_cny_rate;
 
}


 

function true_number_value(  ){

	$result_usd_rate = get_option( 'usd_rate' );

	echo 'Текущий курс долара к гривне '. $result_usd_rate. '<br>';

	$result_cny_rate = get_option( 'cny_rate' );

	echo 'Текущий курс юаня к долару '. $result_cny_rate. '<br>';
}


// Saving notice 
// add_action( 'admin_notices', 'true_custom_notice' );
 
function notice(){
	// getting errors
	$settings_errors = get_settings_errors( 'true_exchange_settings_errors' );
	// if they are, notification about saving will not display
	if ( ! empty( $settings_errors ) ) {
		return;
	}
 
	if(
		isset( $_GET[ 'page' ] )
		&& $this->page_slug == $_GET[ 'page' ]
		&& isset( $_GET[ 'settings-updated' ] )
		&& true == $_GET[ 'settings-updated' ]
	) {
		echo '<div class="notice notice-success is-dismissible"><p>Курс успешно сохранён!</p></div>';
	}
}


function true_validate_usd_rate( $input ) {
 	if( $input < 1 ) { // add your validation conditions
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides', // часть ID, добавляемый к сообщению об ошибке id="setting-error-malo-slides"
			'Курс гривны к долару не может быть меньше нуля, повторите попытку еше раз!',
			'error' // can be success, warning, info
		);
		// get and return the old value of the field if the validation fails
		$input = get_option( 'usd_rate' );
	}
 	return $input;
}

function true_validate_cny_rate( $input ) {
 	if( $input < 1 ) { 
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides', 
			'Курс юаня к долару не может быть меньше нуля, повторите попытку еше раз!',
			'error' 
		);
		$input = get_option( 'cny_rate' );
	}
 	return $input;
}
function true_validate_cny_rate1k( $input ) {
 	if( $input < 1 ) { 
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides',
			'Курс юаня к долару (для суммы 	1000$ +) не может быть меньше нуля, повторите попытку еше раз!',
			'error' 
		);
		$input = get_option( 'cny_rate1k' );
	}
 	return $input;
}

function true_validate_cny_rate2k( $input ) {
 	if( $input < 1 ) { 
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides',
			'Курс юаня к долару (для суммы 	2000$ +) не может быть меньше нуля, повторите попытку еше раз!',
			'error' 
		);
		$input = get_option( 'cny_rate2k' );
	}
 	return $input;
}

function true_validate_cny_rate3k( $input ) {
 	if( $input < 1 ) { 
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides', 
			'Курс юаня к долару (для суммы 	3000$ +) не может быть меньше нуля, повторите попытку еше раз!',
			'error' 
		);
		$input = get_option( 'cny_rate3k' );
	}
 	return $input;
}

function true_validate_cny_rate5k( $input ) {
 	if( $input < 1 ) { 
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides', 
			'Курс юаня к долару (для суммы 	5000$ +) не может быть меньше нуля, повторите попытку еше раз!',
			'error' 
		);
		$input = get_option( 'cny_rate5k' );
	}
 	return $input;
}

function true_validate_cny_rate10k( $input ) {
 	if( $input < 1 ) { 
		add_settings_error(
			'true_exchange_settings_errors',
			'malo-slides',
			'Курс юаня к долару (для суммы 	10 000$ +) не может быть меньше нуля, повторите попытку еше раз!',
			'error'
		);
		$input = get_option( 'cny_rate10k' );
	}
 	return $input;
}








