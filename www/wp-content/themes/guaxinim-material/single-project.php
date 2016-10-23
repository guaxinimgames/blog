<?php global $bodyClass;
$bodyClass = "";
 ?><?php /*Template Name: Single Projects*/ ?>
<!--Page header--><?php get_header(); ?><?php $category = get_the_category( $post->ID );
$wpb_all_query = new WP_Query(array('post_type'=>'project', 'post_status'=>'publish', 'posts_per_page'=>10, 'category_name' => $category[0]->name, 'post__not_in'=> array($post->ID) ));
 ?>
<!--Page styles-->
<link type="text/css" rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/library/css/pages/projects/projects.css"/>
<!--Page content	-->
<section id="projects" itemscope="itemscope" itemprop="mainContentOfPage" itemtype="http://schema.org/Blog"><?php $banners = get_field('banner'); ?><?php if ( $banners ) :	shuffle($banners); ?>
  <div class="main-banner wrap no-padding">
    <div class="loader"></div>
    <ul><?php foreach($banners as $banner): ?>
      <li style="background-image: url(<?=$banner['imagem'];?>); background-color:<?=$banner['banner_background_color'];?>">
        <!--.background(style!="background-image: url(<?=$banner['imagem'];?>);")-->
        <div class="logo <?=$banner['banner_logo_position']?>"><?php if($banner['banner_logo'] != ""): ?><img src="<?=$banner['banner_logo']?>" alt="<?=the_title();?>"/><?php endif;
 ?>
        </div>
      </li><?php endforeach; ?>
    </ul>
  </div><?php endif; ?>
  <article role="article" itemscope="itemscope" itemprop="blogPost" itemtype="http://schema.org/BlogPosting" class="wrap internal-content">
    <div class="row"><?php if ( have_posts() ) : while ( have_posts() ) : the_post();  ?><?php $title = get_the_title($post);
 ?>
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <section itemprop="articleBody"><?php the_content() ?>
        </section>
      </div>
      <div class="hidden-xs hidden-sm col-md-1 col-lg-1"></div>
      <div class="right col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <div class="row">
          <h3>Ficha Técnica</h3>
          <div class="technical">
            <h4>Nome: </h4>
            <p><?php the_title(); ?>
            </p>
            <div class="clear"></div>
            <h4>Ano: </h4>
            <p><?php echo get_field('project_year'); ?>
            </p>
            <div class="clear"></div>
            <h4>Categorias: </h4>
            <p><?php $terms = get_the_terms($post, "project_categories");
$termsString = "";
 ?><?php foreach( $terms as $term ) : ?><?php $termsString .= $term->name . ", "; ?><?php endforeach; ?><?php echo '<a href="'. get_term_link($term) .'">' . rtrim($termsString, ", ") .'</a>'; ?>
            </p>
            <div class="clear"></div>
            <h4>Atividades: </h4>
            <p><?php echo get_field('project_activities'); ?>
            </p>
            <div class="stroke"></div><a href="<?=get_field('project_url')?>" title="<?=get_field('project_url')?>" target="_blank"> <?php echo get_field('project_url'); ?></a>
          </div>
        </div>
      </div>
      <div class="clear"></div>
      <div class="row project-images"><?php $images = get_field('project_images');
 ?><?php if(sizeof($images)): ?>
        <ul><?php foreach ( $images as $image ) : ?><?php switch($image['image_type'])
{
	case "desktop":
		$class = "hidden-xs hidden-sm col-md-12 col-lg-12";
		break;
	case "tablet":
		$class = "hidden-xs col-sm-12 col-md-6 col-lg-6";
		break;
	case "mobile":
		$class = "col-xs-12 col-sm-6 col-md-3 col-lg-3"; 
		break;
}
 ?>
          <li class="<?=$image['image_type'] . ' ' . $class; ?>">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"><img src="<?=$image['image'];?>" alt="<?=the_title();?>"/></div>
            </div>
          </li><?php endforeach;  ?>
        </ul><?php endif; ?>
      </div><?php if ( $wpb_all_query->have_posts() ) : ?>
      <div class="clear"></div>
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div class="stroke"></div>
      </div>
      <h2 class="col-xs-12 col-sm-12 col-md-12 col-lg-12">Outros projetos</h2>
      <div class="clear"></div>
      <ul><?php $count = 1;
$total = sizeof($wpb_all_query->get_posts());
 ?><?php while ( $wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?><?php $currentTitle = get_the_title($post);
$class = $total % 2 > 0 && $count == $total ? 'col-xs-12 col-sm-12 col-md-12 col-lg-12' : 'col-xs-12 col-sm-6 col-md-6 col-lg-6';
$count ++;
 ?><?php if( $title != $currentTitle)	: ?>
        <div class="<?= $class; ?>">
          <div itemscope="itemscope" itemtype="http://schema.org/Article" style="background-color:<?php the_field('project_background_color'); ?>;background-image: url('<?php the_field('project_logo'); ?>');" class="project <?php the_field('project_logo_type'); ?>"><a href="<?= the_permalink(); ?>" title="<?php the_title();?>"><?php the_title(); ?></a></div>
        </div><?php endif; ?><?php endwhile; ?>
      </ul><?php endif; ?><?php endwhile;  ?><?php else: ?>
      <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5"><?php $title = _e( 'Oops, Post Not Found!', 'bonestheme' ); ?>
        <h2><?php echo $title; ?>
        </h2>
        <section itemprop="articleBody"><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?>
        </section>
      </div><?php endif; ?>
    </div>
  </article>
</section>
<!--Page footer--><?php get_footer(); ?>