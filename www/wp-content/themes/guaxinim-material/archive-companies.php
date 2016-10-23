<!DOCTYPE html><?php $taxonomy = 'companies_categories'; ?><?php $sub_header_items = isset($sub_header_items)? $sub_header_items : get_terms(array('taxonomy' => $taxonomy)); ?><?php $active_category = isset($active_category)? $active_category : $wp_query->get_queried_object(); ?>
<head>
  <title><?php echo bloginfo('name'); ?></title>
  <meta charset="<?php echo bloginfo('charset') ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <meta property="og:url" content="<?php echo get_site_url() ?>">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?php echo bloginfo("name") ?>">
  <meta property="og:description" content="<?php echo bloginfo("description") ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/library/images/share-image.jpg"><?php if(!get_option( 'site_icon' )): ?>
  <link href="<?php echo get_template_directory_uri(); ?>/library/images/favicon.ico" rel="shortcut icon"><?php endif ?><?php wp_head(); ?>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/library/css/pages/archive/archive.css">
</head>
<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>var FB_APP_ID = "<?php echo get_field('fb_app_id','options') ?>";</script>
  <div class="inner-content">
    <div class="menu-container">
      <div class="menu-overlay"></div>
      <div class="menu-content">
        <div class="navbar navbar-default">
          <div class="navbar-header">
            <button class="menu-toggle-btn navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <div class="nav navbar-nav"><a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="header-logo center-block"><img width="124" src="<?php echo get_template_directory_uri() ?>/library/images/logo.svg" class="img-responsive"></a></div>
            <div class="navbar-right">
              <form class="search-form pull-right">
                <input type="text" name="search" placeholder="O que você está procurando?"/>
                <button type="submit" name="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
              </form>
            </div>
          </div>
        </div>
        <ul id="aside-menu" class="menu-itens panel-group"><?php $menu = array();
foreach(wp_get_nav_menu_items('Main Menu') as $i=>$menu_item){
	$item = new stdClass();
	$item->title = $menu_item->title;
	$item->url = $menu_item->url;
	
	if($menu_item->menu_item_parent != 0){
		$last_index = sizeof($menu)-1;
		if(is_array($menu[$last_index]->subitens)){
			array_push($menu[$last_index]->subitens, $item);
		} else {
			$menu[$last_index]->subitens = array($item);
		}
	} else {
		array_push($menu, $item);
	}
} ?><?php foreach($menu as $i=>$item): ?>
          <li class="panel">
            <div class="panel-heading"><a href="<?php echo $item->url ?>" class="pull-left">
                <h4 class="panel-title"><?php echo $item->title; ?></h4></a><?php if(isset($item->subitens)): ?>
              <button href="<?php echo "#menu-{$i}" ?>" data-toggle="collapse" data-parent="#aside-menu" class="pull-right toggle collapsed"><span class="collapsed"><i aria-hidden="true" class="fa fa-plus"></i></span><span><i aria-hidden="true" class="fa fa-minus"></i></span></button><?php endif ?>
              <div class="cf"></div>
            </div><?php if(isset($item->subitens)): ?>
            <div id="<?php echo "menu-{$i}" ?>" class="panel-collapse collapse">
              <ul class="panel-body"><?php foreach($item->subitens as $k=>$subitem): ?>
                <li><a href="<?php echo $subitem->url ?>"><?php echo $subitem->title; ?></a></li><?php endforeach ?>
              </ul>
            </div><?php endif ?>
          </li><?php endforeach ?>
        </ul>
        <div class="social-block">
          <ul><?php $socials = ['facebook', 'twitter', 'pinterest', 'youtube', 'instagram', 'linkedin']; ?><?php $fa_icons = ['facebook', 'twitter', 'pinterest-p', 'youtube-play', 'instagram', 'linkedin']; ?><?php foreach($socials  as $i=>$social): ?>
            <li class="<?php echo $social ?>"><a href="<?php echo get_field("social_{$social}" ,"options") ?>" target="_blank"><i class="fa <?php echo "fa-{$fa_icons[$i]}" ?>"></i></a></li><?php endforeach ?>
          </ul>
        </div>
      </div>
    </div>
    <div class="main-container">
      <div class="main-content">
        <div class="hidden-xs hidden-sm">
          <div class="ad-block super-leaderboard">
            <div class="ad-inner center-block">
            </div>
            <label class="text-center ad-label center-block">Publicidade</label>
          </div>
        </div><?php wp_reset_postdata(); ?><?php wp_reset_query(); ?><?php $header_class = (get_the_title() !== 'Home')? "internal-header" : ""; ?>
        <header id="header" role="banner" class="<?= $header_class; ?>">
          <div class="top-menu navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="menu-toggle-btn navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
              </button>
              <div class="nav navbar-nav">
                <h1><a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="header-logo center-block"><img width="198" src="<?php echo get_template_directory_uri() ?>/library/images/logo.svg" class="img-responsive center-block"></a></h1>
              </div>
              <div class="navbar-right">
                        <div class="social-block hidden-xs hidden-sm">
                          <ul><?php $socials = ['facebook', 'twitter', 'pinterest', 'youtube', 'instagram', 'linkedin']; ?><?php $fa_icons = ['facebook', 'twitter', 'pinterest-p', 'youtube-play', 'instagram', 'linkedin']; ?><?php foreach($socials  as $i=>$social): ?>
                            <li class="<?php echo $social ?>"><a href="<?php echo get_field("social_{$social}" ,"options") ?>" target="_blank"><i class="fa <?php echo "fa-{$fa_icons[$i]}" ?>"></i></a></li><?php endforeach ?>
                          </ul>
                        </div>
                        <form class="search-form">
                          <input type="text" name="search" placeholder="O que você está procurando?">
                          <button type="submit" name="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
                        </form>
              </div>
            </div>
            <div class="cf"></div>
            <div class="navbar-menu hidden-xs">
              <div class="wrapper container-fluid"><?php wp_nav_menu(array(
	'theme_location' => 'main-nav',
	'depth' => 2,
	'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'container' => false,
	'menu_class' => 'nav navbar-nav text-center'
)); ?>
              </div>
            </div>
          </div>
          <div class="fixed-menu navbar-default">
            <div class="navbar-header">
              <button type="button" class="menu-toggle-btn navbar-toggle pull-left"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
              </button><a href="<?php echo esc_url( home_url( '/' ) ) ?>" class="navbar-brand"><img width="132" src="<?php echo get_template_directory_uri() ?>/library/images/logo.svg" class="img-responsive center-block"></a>
            </div>
            <div class="navbar menu-navbar"><?php wp_nav_menu(array(
	'theme_location' => 'main-nav',
	'depth' => 1,
	'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'container' => false,
	'menu_class' => 'nav navbar-nav text-center'
)); ?>
            </div>
            <div class="navbar-right">
                      <div class="social-block hidden-xs hidden-sm hidden-md">
                        <ul><?php $socials = ['facebook', 'twitter', 'pinterest', 'youtube', 'instagram', 'linkedin']; ?><?php $fa_icons = ['facebook', 'twitter', 'pinterest-p', 'youtube-play', 'instagram', 'linkedin']; ?><?php foreach($socials  as $i=>$social): ?>
                          <li class="<?php echo $social ?>"><a href="<?php echo get_field("social_{$social}" ,"options") ?>" target="_blank"><i class="fa <?php echo "fa-{$fa_icons[$i]}" ?>"></i></a></li><?php endforeach ?>
                        </ul>
                      </div>
                      <form class="search-form">
                        <input type="text" name="search" placeholder="O que você está procurando?">
                        <button type="submit" name="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
                      </form>
            </div>
            <div class="cf"></div>
          </div>
        </header>
        
        
        <header class="archive-header">
                  <ol class="breadcrumb text-center"><?php $breadcrumbs = isset($breadcrumbs)? $breadcrumbs : generate_breadcrumbs($wp_query) ?><?php foreach ($breadcrumbs as $k => $breadcrumb): ?><?php if ($k == (sizeof($breadcrumbs)-1)): ?>
                    <li class="active"><?php echo $breadcrumb->name; ?></li><?php else: ?>
                    <li class="hidden-xs"><a href="<?php echo $breadcrumb->url ?>"><?php echo $breadcrumb->name; ?></a></li><?php endif ?><?php endforeach ?><?php $breadcrumbs = null; ?>
                  </ol>
          <nav class="navbar navbar-default">
            <ul class="navbar-nav text-center"><?php foreach($sub_header_items as $key => $value): ?><?php $item_class = ($value->slug == $active_category->slug)? "current-menu-item": "" ?>
              <li class="<?php echo $item_class ?>"><a href="<?php echo get_term_link($value) ?>"><?php echo $value->name; ?></a></li><?php endforeach ?>
            </ul>
          </nav>
        </header>
        <div id="wrapper">
          <main id="content" tabindex="-1" role="main">
            <div class="container">
              <div class="row">
                <div class="col-md-3">
                  <h1>Filter por</h1>
                  <form name="filters">
                    <ul><?php $categories= get_terms(array('taxonomy'=>'companies_categories', 'hide_empty' => false)) ?><?php foreach($categories as $key => $category): ?>
                      <li class="col-md-6">
                        <input name="filters" type="checkbox" value="<?php echo $category->term_id ?>" id="<?php echo 'filter-' . $key ?>">
                        <label for="<?php echo 'filter-' . $key ?>"><?php echo $category->name; ?></label>
                      </li><?php endforeach ?>
                    </ul>
                    <select name="state">
                      <option selected hidden>Selecione</option>
                      <option value="">Teste</option>
                      <option value="">Teste</option>
                    </select>
                    <button type="reset" class="btn">Limpar Filtros</button>
                    <button type="submit" class="btn">Aplicar Filtros</button>
                    <input name="search" type="text" placeholder="Buscar por nome">
                    <button type="submit" class="btn">Buscar</button>
                  </form>
                  <div class="cf"></div>
                          <div class="ad-block tall-rectangle">
                            <div class="ad-inner center-block">
                            </div>
                            <label class="text-center ad-label center-block">Publicidade</label>
                          </div>
                </div>
                <div class="col-md-9">
                  <header>
                    <div class="col-md-9">
                      <label><?php echo "Total de {$wp_the_query->post_count} empresas encontradas"; ?></label>
                    </div>
                    <div class="col-md-3">
                      <select class="pull-right">
                        <option selected hidden>Ordernar</option>
                        <option>Teste</option>
                      </select>
                    </div>
                  </header>
                  <section class="results"><?php foreach($posts as $key => $row): ?>
                    <article id="<?php echo "post-". $row->ID ?>" class="col-md-4">
                      <div class="image">
                        <ul><?php foreach(get_field('company_images', $row) as $k => $image): ?>
                          <li style="<?php echo 'background-image:url('. reset($image) .')' ?>"></li><?php endforeach ?><?php $map = get_field('company_map', $row) ?><?php if(isset($map) && is_array($map)): ?>
                          <li>
                            <input name="map" type="hidden" data-lat="<?php echo $map['lat'] ?>" data-lng="<?php echo $map['lng'] ?>">
                          </li><?php endif ?>
                        </ul>
                        <div class="info">
                          <h3><?php echo get_the_title($row); ?><?php $activity = reset(get_the_terms($row, 'companies_categories')); ?></h3>
                          <label><?php echo $activity->name; ?></label>
                          <address>
                            <p><span>Endereço:</span><span><?php echo get_field('company_address', $row); ?></span></p>
                            <p><span>CEP:</span><span><?php echo get_field('company_zip', $row); ?></span></p>
                            <p><span>Telefone(s):</span><a href="<?php echo 'tel:'. get_field('company_phone', $row) ?>"><?php echo get_field('company_phone', $row); ?></a></p>
                          </address>
                          <p><a href="<?php echo 'mailto:'.get_field('company_email', $row) ?>"><?php echo get_field('company_email', $row); ?></a></p>
                          <p><a href="<?php echo get_field('company_website', $row) ?>" target="_blank"><?php echo get_field('company_website', $row); ?></a></p>
                        </div>
                      </div>
                    </article><?php endforeach ?>
                  </section><?php wp_reset_postdata(); ?>
                </div>
              </div>
            </div>
            <div class="cf"></div>
          </main>
        </div>
        <footer id="footer" role="contentinfo">
                  <div id="newsletter">
                    <div class="wrapper container-fluid">
                      <h2>Receba nossa newsletter</h2>
                      <form name="newsletter" class="col-xs-12 col-sm-8 col-md-6">
                        <input type="text" name="newsletter" placeholder="Digite seu endereço de e-mail" class="col-xs-12 col-sm-8 col-md-8 white">
                        <button type="submit" class="black-btn col-xs-12 col-sm-4 col-md-4">Assinar</button>
                      </form>
                    </div>
                    <div class="cf"></div>
                  </div>
          <div class="inner-footer">
            <div class="wrapper container-fluid">
                      <div class="instagram-feed">
                        <div class="title">
                          <div class="icon"><i class="fa fa-instagram"></i></div><span>SIGA o GUIA JEANS WEAR NO INSTAGRAM</span>
                        </div>
                        <div class="row">
                          <ul>
                            <li class="col-xs-12 col-sm-2 col-md-2"><a href="#" title="Título da imagem" target="_blank">
                                <div style="background-image: url('http://loremflickr.com/400/400')" class="image"></div></a></li>
                            <li class="col-xs-12 col-sm-2 col-md-2"><a href="#" title="Título da imagem" target="_blank">
                                <div style="background-image: url('http://loremflickr.com/400/400')" class="image"></div></a></li>
                            <li class="col-xs-12 col-sm-2 col-md-2"><a href="#" title="Título da imagem" target="_blank">
                                <div style="background-image: url('http://loremflickr.com/400/400')" class="image"></div></a></li>
                            <li class="col-xs-12 col-sm-2 col-md-2"><a href="#" title="Título da imagem" target="_blank">
                                <div style="background-image: url('http://loremflickr.com/400/400')" class="image"></div></a></li>
                            <li class="col-xs-12 col-sm-2 col-md-2"><a href="#" title="Título da imagem" target="_blank">
                                <div style="background-image: url('http://loremflickr.com/400/400')" class="image"></div></a></li>
                            <li class="col-xs-12 col-sm-2 col-md-2"><a href="#" title="Título da imagem" target="_blank">
                                <div style="background-image: url('http://loremflickr.com/400/400')" class="image"></div></a></li>
                          </ul>
                        </div>
                      </div>
            </div>
            <div class="menu-footer">
              <div class="wrapper container-fluid">
                <div class="row">
                  <div class="wrapper-footer col-xs-12 col-sm-10 col-md-10">
                    <div class="row">
                      <div class="footer-brand col-xs-12 col-sm-4 col-md-4"><a href="<?php echo home_url( '/' ); ?>" title="Guia Jeans Wear" id="logo-footer">Guia Jeans Wear</a></div>
                      <div class="footer-search col-xs-12 col-sm-6 col-md-6 pull-right">
                                <form class="search-form always-open">
                                  <input type="text" name="search" placeholder="O que você está procurando?">
                                  <button type="submit" name="submit"><i aria-hidden="true" class="fa fa-search"></i></button>
                                </form>
                      </div>
                      <div class="clear"></div><?php echo wp_nav_menu(
	array(
		'theme_location' => 'footer-links',
		'depth' => 2,
		'container' => false,
		'menu_class' => 'footer-links col-xs-12 col-sm-12 col-md-12'
	)
); ?>
                      <div class="clear"></div>
                              <div class="social-block">
                                <ul><?php $socials = ['facebook', 'twitter', 'pinterest', 'youtube', 'instagram', 'linkedin']; ?><?php $fa_icons = ['facebook', 'twitter', 'pinterest-p', 'youtube-play', 'instagram', 'linkedin']; ?><?php foreach($socials  as $i=>$social): ?>
                                  <li class="<?php echo $social ?>"><a href="<?php echo get_field("social_{$social}" ,"options") ?>" target="_blank"><i class="fa <?php echo "fa-{$fa_icons[$i]}" ?>"></i></a></li><?php endforeach ?>
                                </ul>
                              </div>
                    </div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <div id="copyright">
              <div class="wrapper container-fluid">
                <div class="row">
                  <div class="wrapper-footer col-xs-12 col-sm-10 col-md-10">
                    <p>&copy; Copyright 2005-<?php echo date('Y'); ?> Guia JeansWear. Todos os direitos reservados.</p><a href="http://www.tinpix.com" title="Tinpix Digital" target="_blank" id="tinpix-logo"></a>
                    <div class="clear"></div>
                  </div>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="container-fluid">
            <div class="menu">
            </div>
          </div>
        </footer><?php wp_footer(); ?>
      </div>
    </div>
  </div>
</body>