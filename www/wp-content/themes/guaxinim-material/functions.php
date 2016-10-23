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
GUIA JEANS FUNCTIONS
************************************/
function sendEmail() {
	$name       = isset($_POST['name']) ? $_POST['name'] : null;
	$email      = isset($_POST['email']) ? $_POST['email'] : null;
	$subject    = isset($_POST['subject']) ? $_POST['subject'] : 'Contato enviado pelo site';
	$message    = isset($_POST['message']) ? $_POST['message'] : null;
	$file       = isset($_FILES["attachment"]) ? $_FILES["attachment"] : null;
	$sendTo     = 'richard@tinpix.com.br';
	$mailSubject    = '[CONTATO SITE TINPIX] '.$subject;


	/* Medida preventiva para evitar que outros domínios sejam remetente da sua mensagem. */
	if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
					$emailsender='noreply@tinpix.com.br'; // Substitua essa linha pelo seu e-mail@seudominio
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

function get_segment($position) {
	$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // get the uri
	//split in array, remove the empties, reset indexes
	$uri_segments = array_values(array_filter(explode('/', $uri_path)));

	// get the desired position, backwards if negative
	$position = ($position < 0)? ((sizeof($uri_segments)-1) + $position) : $position;
	$position = ($position < 0)? 0 : $position;

	if(isset($uri_segments[$position]))
	{
		return $uri_segments[$position];
	}
	else
	{
		return null;
	}
}


function post_to_term($post_type) {
	switch ($post_type) {
		case 'companies':
			$result = 'companies_categories';
			break;
		case 'events':
			$result = 'events_categories';
			break;
		case 'looks':
			$result = 'looks_categories';
			break;
		case 'news':
			$result = 'news_categories';
			break;
		case 'shows':
			$result = 'shows_categories';
			break;
		case 'trends':
			$result = 'trends_categories';
			break;
		case 'videos':
			$result = 'videos_categories';
			break;
		default:
			$result = 'category';
			break;
	}

	return $result;
}

function generate_breadcrumbs($wp_query) {
	$breadcrumbs = array();
	$queryObj = $wp_query->get_queried_object();
	$queryType = gettype($queryObj);

	$className = get_class($queryObj);
	switch ($className) {
		case 'WP_Term':
			$postTypes = get_post_types();

			$ptypes = array();
			foreach($postTypes as $posttype)
			{
				$ptypeobj = get_post_type_object($posttype);
				if(!is_null($ptypeobj->rewrite['slug']))
				{
					$ptypes[ $ptypeobj->rewrite['slug']] = $ptypeobj;
				}
			}
			$postType = $ptypes[get_segment(-1)];

			$postTypeUrl = get_post_type_archive_link($postType->name);

			$breadcrumbs[] = (object) array(
				'name' => $postType->label,
				'url' => $postTypeUrl
			);

			$breadcrumbs[] = (object) array(
				'name' => $queryObj->name,
				'url' => get_term_link($queryObj)
			);
			break;
		case 'WP_Post_Type':
			$breadcrumbs[] = (object) array(
				'name' => $queryObj->label
			);
			break;
		case 'WP_Post':
			$posttype = get_post_type($queryObj);
			$breadcrumbs[] = (object) array(
				'name' => get_post_type_object($posttype)->label,
				'url' => get_post_type_archive_link($posttype)
			);

			$taxonomy = reset(wp_get_post_terms($queryObj->ID, "{$posttype}_categories"));
			$breadcrumbs[] = (object) array(
				'name' => $taxonomy->name,
				'url' => get_term_link($taxonomy)
			);
			break;
		default:
			break;
	}

	return $breadcrumbs;
}


/* DON'T DELETE THIS CLOSING TAG */ ?>
