<?php
/*
Author: Eddie Machado
URL: http://themble.com/bones/

This is where you can drop your custom functions or
just edit things like thumbnail sizes, header images,
sidebars, comments, etc.
*/

// LOAD BONES CORE (if you remove this, the theme will break)
require_once( 'library/bones.php' );
require_once ( 'ajax/ajax.php' );
// CUSTOMIZE THE WORDPRESS ADMIN (off by default)
// require_once( 'library/admin.php' );

/*********************
LAUNCH BONES
Let's get everything up and running.
*********************/

function bones_ahoy() {

	//Allow editor style.
	add_editor_style( get_stylesheet_directory_uri() . '/library/css/editor-style.css' );

	// let's get language support going, if you need it
	load_theme_textdomain( 'bonestheme', get_template_directory() . '/library/translation' );

	// USE THIS TEMPLATE TO CREATE CUSTOM POST TYPES EASILY
	require_once( 'library/custom-post-type.php' );

	// launching operation cleanup
	add_action( 'init', 'bones_head_cleanup' );
	// A better title
	add_filter( 'wp_title', 'rw_title', 10, 3 );
	// remove WP version from RSS
	add_filter( 'the_generator', 'bones_rss_version' );
	// remove pesky injected css for recent comments widget
	add_filter( 'wp_head', 'bones_remove_wp_widget_recent_comments_style', 1 );
	// clean up comment styles in the head
	add_action( 'wp_head', 'bones_remove_recent_comments_style', 1 );
	// clean up gallery output in wp
	add_filter( 'gallery_style', 'bones_gallery_style' );

	// enqueue base scripts and styles
	add_action( 'wp_enqueue_scripts', 'bones_scripts_and_styles', 999 );
	// ie conditional wrapper

	// launching this stuff after theme setup
	bones_theme_support();

	// cleaning up random code around images
	add_filter( 'the_content', 'bones_filter_ptags_on_images' );
	// cleaning up excerpt
	add_filter( 'excerpt_more', 'bones_excerpt_more' );

} /* end bones ahoy */

// let's get this party started
add_action( 'after_setup_theme', 'bones_ahoy' );


/************* OEMBED SIZE OPTIONS *************/

if ( ! isset( $content_width ) ) {
	$content_width = 680;
}

/************* THUMBNAIL SIZE OPTIONS *************/

// Thumbnail sizes
add_image_size( 'bones-thumb-600', 600, 150, true );
add_image_size( 'bones-thumb-300', 300, 100, true );

/*
to add more sizes, simply copy a line from above
and change the dimensions & name. As long as you
upload a "featured image" as large as the biggest
set width or height, all the other sizes will be
auto-cropped.

To call a different size, simply change the text
inside the thumbnail function.

For example, to call the 300 x 100 sized image,
we would use the function:
<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
for the 600 x 150 image:
<?php the_post_thumbnail( 'bones-thumb-600' ); ?>

You can change the names and dimensions to whatever
you like. Enjoy!
*/

add_filter( 'image_size_names_choose', 'bones_custom_image_sizes' );

function bones_custom_image_sizes( $sizes ) {
		return array_merge( $sizes, array(
				'bones-thumb-600' => __('600px by 150px'),
				'bones-thumb-300' => __('300px by 100px'),
		) );
}



/************************************
GUAXINIM FUNCTIONS
************************************/
function sendEmail() {
	$name       = isset($_POST['name']) ? $_POST['name'] : null;
	$email      = isset($_POST['email']) ? $_POST['email'] : null;
	$subject    = isset($_POST['subject']) ? $_POST['subject'] : 'Contato enviado pelo site';
	$message    = isset($_POST['message']) ? $_POST['message'] : null;
	$file       = isset($_FILES["attachment"]) ? $_FILES["attachment"] : null;
	$sendTo     = 'contato@guaxinimgames.com';
	$mailSubject    = '[CONTATO SITE] '.$subject;


	/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
	if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
					$emailsender='noreply@guaxinimgames.com'; // Substitua essa linha pelo seu e-mail@seudominio
	} else {
					$emailsender = "noreply@" . $_SERVER[HTTP_HOST];
					//    Na linha acima estamos forçando que o remetente seja 'webmaster@seudominio',
					// Você pode alterar para que o remetente seja, por exemplo, 'contato@seudominio'.
	}

	/* Verifica qual éo sistema operacional do servidor para ajustar o cabeçalho de forma correta.  */
	if(PATH_SEPARATOR == ";") $breakline = "\r\n"; //Se for Windows
	else $breakline = "\n"; //Se "nao for Windows"

	/* Montando a mensagem a ser enviada no corpo do e-mail. */
	$msg = "<p>Mensagem enviada pelo site.</p>
	<p><strong>Nome:</strong> {$name}</p>
	<p><strong>E-mail:</strong> {$email}</p>
	<p><strong>Mensagem:</strong><br>
	{$message}</p>";

	/* Montando o cabeçalho da mensagem */
	$headers = "MIME-Version: 1.1" .$breakline;
	$headers .= "Content-type: text/html; charset=UTF-8" .$breakline;
	// Perceba que a linha acima contém "text/html", sem essa linha, a mensagem não chegará formatada.
	$headers .= "From: " . $emailsender.$breakline;
	//$headers .= "Cc: " . $comcopia . $breakline;
	//$headers .= "Bcc: " . $comcopiaoculta . $breakline;
	$headers .= "Reply-To: " . $email . $breakline;
	// Note que o e-mail do remetente será usado no campo Reply-To (Responder Para)

	/*** VERIFICA SE EXISTE ANEXO ***/
	if(file_exists($file["tmp_name"]) and !empty($file)){
		$fp = fopen($file["tmp_name"],"rb");
		$attachment = fread($fp,filesize($file["tmp_name"]));
		$attachment = base64_encode($attachment);

		fclose($fp);

		$attachment = chunk_split($attachment);

		$boundary = "XYZ-" . date("dmYis") . "-ZYX";

		$mens = "--$boundary" . $breakline . "";
		$mens .= "Content-Transfer-Encoding: 8bits" . $breakline . "";
		$mens .= "Content-Type: text/html; charset=\"UTF-8\"" . $breakline . "" . $breakline . ""; //plain
		$mens .= "$msg" . $breakline . "";
		$mens .= "--$boundary" . $breakline . "";
		$mens .= "Content-Type: ".$file["type"]."" . $breakline . "";
		$mens .= "Content-Disposition: attachment; filename=\"".$file["name"]."\"" . $breakline . "";
		$mens .= "Content-Transfer-Encoding: base64" . $breakline . "" . $breakline . "";
		$mens .= "$attachment" . $breakline . "";
		$mens .= "--$boundary--" . $breakline . "";

		$headers = "MIME-Version: 1.0" . $breakline . "";
		$headers .= "From: $emailsender " . $breakline . "";
		$headers .= "Return-Path: $sendTo " . $breakline . "";
		$headers .= "Content-type: multipart/mixed; boundary=\"$boundary\"" . $breakline . "";
		$headers .= "$boundary" . $breakline . "";
	}
	else
	{
		$mens = $msg;
	}

	/* Enviando a mensagem */
	//É obrigatório o uso do parâmetro -r (concatenação do "From na linha de envio"), aqui na Locaweb:
	if(!mail($sendTo, $mailSubject, $mens, $headers ,"-r".$emailsender)){ // Se for Postfix
			$headers .= "Return-Path: " . $emailsender . $breakline; // Se "não for Postfix"
			mail($sendTo, $mailSubject, $mens, $headers );
	}

	echo 1;
	exit;
	die;

}

add_action('wp_ajax_sendEmail', 'sendEmail');
add_action('wp_ajax_nopriv_sendEmail', 'sendEmail');

function get_time_ago() {

	global $post;

	$date = get_post_time('G', true, $post);

	/**
	 * Where you see 'themeblvd' below, you'd
	 * want to replace those with whatever term
	 * you're using in your theme to provide
	 * support for localization.
	 */

	// Array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'ano', 'themeblvd' ), __( 'anos', 'themeblvd' ) ),
		array( 60 * 60 * 24 * 30 , __( 'mês', 'themeblvd' ), __( 'meses', 'themeblvd' ) ),
		array( 60 * 60 * 24 * 7, __( 'semana', 'themeblvd' ), __( 'semanas', 'themeblvd' ) ),
		array( 60 * 60 * 24 , __( 'dia', 'themeblvd' ), __( 'dias', 'themeblvd' ) ),
		array( 60 * 60 , __( 'hora', 'themeblvd' ), __( 'horas', 'themeblvd' ) ),
		array( 60 , __( 'minuto', 'themeblvd' ), __( 'minutos', 'themeblvd' ) ),
		array( 1, __( 'segundo', 'themeblvd' ), __( 'segundos', 'themeblvd' ) )
	);

	if ( !is_numeric( $date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $date ) );
		$date = gmmktime( (int)$time_chunks[1], (int)$time_chunks[2], (int)$time_chunks[3], (int)$date_chunks[1], (int)$date_chunks[2], (int)$date_chunks[0] );
	}

	$current_time = current_time( 'mysql', $gmt = 0 );
	$newer_date = strtotime( $current_time );

	// Difference in seconds
	$since = $newer_date - $date;

	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since )
		return __( 'sometime', 'themeblvd' );

	/**
	 * We only want to output one chunks of time here, eg:
	 * x years
	 * xx months
	 * so there's only one bit of calculation below:
	 */

	//Step one: the first chunk
	for ( $i = 0, $j = count($chunks); $i < $j; $i++) {
		$seconds = $chunks[$i][0];

		// Finding the biggest chunk (if the chunk fits, break)
		if ( ( $count = floor($since / $seconds) ) != 0 )
			break;
	}

	// Set output var
	$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];


	if ( !(int)trim($output) ){
		$output = '0 ' . __( 'seconds', 'themeblvd' );
	}

	// $output .= __(' atrás', 'themeblvd');
	$output = __('Há ', 'themeblvd') . $output;

	return $output;
}

// Filter our get_time_ago() function into WP's the_time() function
add_filter('get_time_ago', 'get_time_ago');



/*********************
AJAX POSTS
*********************/
function ajax_posts() {
	$index = isset($_POST['index'])? $_POST['index'] : 0;
	$number = isset($_POST['number'])? $_POST['number'] : get_option( 'posts_per_page' );
	$author = isset($_POST['author'])? $_POST['author'] : NULL;
	
	$posts = get_posts(
		array(
			'post_type' => 'post',
			'numberposts' => $number,
			'offset'=> $index,
			'author' => $author
		)
	);
	postcards($posts);
	die();
}
add_action( 'wp_ajax_nopriv_ajax_posts', 'ajax_posts' );
add_action( 'wp_ajax_ajax_posts', 'ajax_posts' );
/* DON'T DELETE THIS CLOSING TAG */
?>
