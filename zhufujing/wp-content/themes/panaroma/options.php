<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 */

function optionsframework_option_name() {
	// Change this to use your theme slug
	return 'optionsframework_panaroma';
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the 'id' fields, make sure to use all lowercase and no spaces.
 *
 * If you are making your theme translatable, you should replace 'panaroma'
 * with the actual text domain for your theme.  Read more:
 * http://codex.wordpress.org/Function_Reference/load_theme_textdomain
 */

function optionsframework_options() {

	$options = array();
	$imagepath =  get_template_directory_uri() . '/images/';
		
	
	//Basic Settings
	
	$options[] = array(
		'name' => __('Basic Settings', 'panaroma'),
		'type' => 'heading');
		
		$options[] = array(
		'name' => __('Logo', 'panaroma'),
		'desc' => __('Upload your logo here', 'panaroma'),
		'id' => 'logo',
		'class' => '',
		'std'	=> '',
		'type' => 'upload');
		
	$options[] = array(
		'name' => __('Copyright Text', 'panaroma'),
		'desc' => __('Some Text regarding copyright of your site, you would like to display in the footer.', 'panaroma'),
		'id' => 'footertext2',
		'std' => '',
		'type' => 'text');

	$options[] = array(
		'name' => __('Featured image as background', 'panaroma'),
		'desc' => __('Do not use featured image as background image.', 'panaroma'),
		'id' => 'featured_as_background',
		'type' => 'checkbox',
		'std' => '' );

	$options[] = array(
		'name' => __('Color Scheme', 'panaroma'),
		'desc' => __('Select the color scheme for theme', 'panaroma'),
		'id' => 'navigation_color',
		'std' => '#ff6600',
		'type' => 'color');

		
	$options[] = array(
		'name' => __('Pagination Gradient Color - Top', 'panaroma'),
		'desc' => __('Select the top gradient color for pagination links', 'panaroma'),
		'id' => 'pagin_grad_top_color',
		'std' => '#ff9b59',
		'type' => 'color');
		
	$options[] = array(
		'name' => __('Pagination Gradient Color - Bottom', 'panaroma'),
		'desc' => __('Select the bottom gradient color for pagination links', 'panaroma'),
		'id' => 'pagin_grad_bottom_color',
		'std' => '#ff6600',
		'type' => 'color');

	//Layout Settings
		
	$options[] = array(
		'name' => __('Layout Settings', 'panaroma'),
		'type' => 'heading');	
	
	$options[] = array(
		'name' => "Menu Layout",
		'desc' => "Select Layout for Menu position. It applies on inner pages only.",
		'id' => "sidebar-layout",
		'std' => "left",
		'type' => "images",
		'options' => array(
			'left' => $imagepath . '2cl.png',
			'right' => $imagepath . '2cr.png')
	);
	
	$options[] = array(
		'name' => __('Custom CSS', 'panaroma'),
		'desc' => __('Some Custom Styling for your site. Place any css codes here instead of the style.css file.', 'panaroma'),
		'id' => 'style2',
		'std' => '',
		'type' => 'textarea');
	
	//SLIDER SETTINGS
	$options[] = array(
		'name' => __('Homepage Slider', 'panaroma'),
		'type' => 'heading');

	$options[] = array(
		'name' => __('Slider Image 1', 'panaroma'),
		'desc' => __('First Slide', 'panaroma'),
		'id' => 'slide1',
		'class' => '',
		'std' => get_template_directory_uri()."/images/img/first-image.jpg",
		'type' => 'upload');

	$options[] = array(
		'desc' => __('Title', 'panaroma'),
		'id' => 'slidetitle1',
		'std' => 'Responsive Design',
		'type' => 'text');

	$options[] = array(
		'desc' => __('Description or Tagline', 'panaroma'),
		'id' => 'slidedesc1',
		'std' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam vel feugiat odio. Donec et mauris elit.',
		'type' => 'textarea');			

	$options[] = array(
		'desc' => __('Url', 'panaroma'),
		'id' => 'slideurl1',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');		
	
	$options[] = array(
		'name' => __('Slider Image 2', 'panaroma'),
		'desc' => __('Second Slide', 'panaroma'),
		'class' => '',
		'id' => 'slide2',
		'std' => get_template_directory_uri()."/images/img/second-image.jpg",
		'type' => 'upload');
	
	$options[] = array(
		'desc' => __('Title', 'panaroma'),
		'id' => 'slidetitle2',
		'std' => 'Awesome Features',
		'type' => 'text');	
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'panaroma'),
		'id' => 'slidedesc2',
		'std' => 'Proin commodo enim ultrices aliquet gravida. Proin vulputate ullamcorper justo sed lacinia.',
		'type' => 'textarea');		
		
	$options[] = array(
		'desc' => __('Url', 'panaroma'),
		'id' => 'slideurl2',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');	
		
	$options[] = array(
		'name' => __('Slider Image 3', 'panaroma'),
		'desc' => __('Third Slide', 'panaroma'),
		'id' => 'slide3',
		'class' => '',
		'std' => get_template_directory_uri().'/images/img/third-image.jpg',
		'type' => 'upload');	
	
	$options[] = array(
		'desc' => __('Title', 'panaroma'),
		'id' => 'slidetitle3',
		'std' => 'Easy to Use',
		'type' => 'text');	
		
	$options[] = array(
		'desc' => __('Description or Tagline', 'panaroma'),
		'id' => 'slidedesc3',
		'std' => 'Proin porta lacinia diam sit amet facilisis. Ut et turpis suscipit, convallis risus ut, tincidunt mi.',
		'type' => 'textarea');	
			
	$options[] = array(
		'desc' => __('Url', 'panaroma'),
		'id' => 'slideurl3',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');		
	
	$options[] = array(
		'name' => __('Slider Image 4', 'panaroma'),
		'desc' => __('Fourth Slide', 'panaroma'),
		'id' => 'slide4',
		'class' => '',
		'std' => get_template_directory_uri().'/images/img/fourth-image.jpg',
		'type' => 'upload');	
		
	$options[] = array(
		'desc' => __('Title', 'panaroma'),
		'id' => 'slidetitle4',
		'std' => '24x7 Support',
		'type' => 'text');
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'panaroma'),
		'id' => 'slidedesc4',
		'std' => 'Maecenas tincidunt mauris quis vulputate suscipit. Curabitur euismod magna vel dui venenatis, ut vulputate urna varius. Praesent rhoncus placerat massa, non eleifend arcu fermentum nec. Pellentesque viverra',
		'type' => 'textarea');			
		
	$options[] = array(
		'desc' => __('Url', 'panaroma'),
		'id' => 'slideurl4',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');		
	
	$options[] = array(
		'name' => __('Slider Image 5', 'panaroma'),
		'desc' => __('Fifth Slide', 'panaroma'),
		'id' => 'slide5',
		'class' => '',
		'std' => get_template_directory_uri().'/images/img/fifth-image.jpg',
		'type' => 'upload');	
		
	$options[] = array(
		'desc' => __('Title', 'panaroma'),
		'id' => 'slidetitle5',
		'std' => 'Free Themes',
		'type' => 'text');	
	
	$options[] = array(
		'desc' => __('Description or Tagline', 'panaroma'),
		'id' => 'slidedesc5',
		'std' => 'Mauris feugiat condimentum nibh bibendum euismod. Aliquam scelerisque nunc sit amet leo luctus, et finibus augue suscipit.',
		'type' => 'textarea');	
		
	$options[] = array(
		'desc' => __('Url', 'panaroma'),
		'id' => 'slideurl5',
		'std' => '#',
		'type' => 'text',
		'subtype' => 'url');
			
			
	//Social Settings
	$options[] = array(
		'name' => __('Social Settings', 'panaroma'),
		'type' => 'heading');
	
	$options[] = array(
		'desc' => __('Please set the value of following fields, as per the instructions given along. If you do not want to use an icon, just leave it blank. If some icons are showing up, even when no value is set then make sure they are completely blank, and just save the options once. They will not be shown anymore.', 'panaroma'),
		'type' => 'info');

	$options[] = array(
		'name' => __('Facebook', 'panaroma'),
		'desc' => __('Facebook Profile or Page URL i.e. http://facebook.com/username/ ', 'panaroma'),
		'id' => 'facebook',
		'std' => '',
		'class' => 'mini',
		'type' => 'text',
		'subtype' => 'url');
	
	$options[] = array(
		'name' => __('Twitter', 'panaroma'),
		'desc' => __('Twitter Username', 'panaroma'),
		'id' => 'twitter',
		'std' => '',
		'class' => 'mini',
		'type' => 'text');
	
	$options[] = array(
		'name' => __('Google Plus', 'panaroma'),
		'desc' => __('Google Plus profile url, including "http://"', 'panaroma'),
		'id' => 'google',
		'std' => '',
		'class' => 'mini',
		'type' => 'text',
		'subtype' => 'url');
		
	$options[] = array(
		'name' => __('Linkedin', 'panaroma'),
		'desc' => __('Linkedin URL', 'panaroma'),
		'id' => 'linkedin',
		'std' => '',
		'class' => 'mini',
		'type' => 'text',
		'subtype' => 'url');	

	
	// Contact Details
		$options[] = array(
		'name' => __('Contact Details for footer', 'panaroma'),
		'type' => 'heading');
	
		$options[] = array(
		'desc' => __('Company Name', 'panaroma'),
		'id' => 'contact1',
		'std' => 'PANAROMA',
		'type' => 'text');	
		
		$options[] = array(
		'desc' => __('Address 1', 'panaroma'),
		'id' => 'contact2',
		'std' => '123 Some Street',
		'type' => 'text');	
		
		$options[] = array(
		'desc' => __('Address 2', 'panaroma'),
		'id' => 'contact3',
		'std' => 'California, USA',
		'type' => 'text');
		
		$options[] = array(
		'desc' => __('Phone', 'panaroma'),
		'id' => 'contact4',
		'std' => '100 2000 300',
		'type' => 'text');
		
		$options[] = array(
		'desc' => __('Email', 'panaroma'),
		'id' => 'contact5',
		'std' => sanitize_email( 'info@example.com' ),
		'type' => 'text',
		'subtype' => 'email');	

	// Support					
		$options[] = array(
		'name' => __('Our Themes', 'panaroma'),
		'type' => 'heading');
		
	$options[] = array(
		'desc' => __('Panaroma WordPress theme has been Designed and Created by SKT Themes.', 'panaroma'),
		'type' => 'info');	
		
	 $options[] = array(
		'desc' => '<a href="'.esc_url(SKT_THEME_URL).'" target="_blank"><img src="'.get_template_directory_uri().'/images/sktskill.jpg"></a><p><em><a target="_blank" href="'.esc_url(SKT_THEME_URL_DIRECT).'">'.__('Buy PRO version for only $39 with more features.','panaroma').'</a></em></p>',
		'type' => 'info');	
	
	
	return $options;
}