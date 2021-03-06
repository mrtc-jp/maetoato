<?php

if ( ! defined( '_VERSION' ) ) {
	define( '_VERSION', '1.2.5' );
}

function theme_enqueue_styles() {
	/* Style Sheet */
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
	wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/css/normalize.css',  array(), '8.0.1' );
	wp_enqueue_style( 'write-style', get_stylesheet_directory_uri() . '/style.css',  array(), _VERSION );
	if ( 'ja' == get_bloginfo( 'language' ) ) {
		/* wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@500;900&display=swap', array(), null ); */
		wp_enqueue_style( 'write-style-ja', get_stylesheet_directory_uri() . '/css/ja.css', array(), null );
	}
	if ( ! get_theme_mod( 'write_hide_navigation' ) ) {
		wp_enqueue_style( 'drawer-style', get_stylesheet_directory_uri() . '/css/drawer.css', array(), '3.2.2', 'screen and (max-width: 782px)' );
	}
	/* Javascript */
	wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), "3.5.1");
	if( is_page_template( 'page-popular.php' ) ) {
		wp_enqueue_script( 'jquery-ui', '//ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js', array(), "1.12.1");
	}
	if ( ! get_theme_mod( 'write_hide_navigation' ) ) {
		wp_enqueue_script( 'iscroll', get_template_directory_uri() . '/js/iscroll.js', array( 'jquery' ), '5.2.0', true );
		wp_enqueue_script( 'drawer', get_template_directory_uri() . '/js/drawer.js', array( 'jquery' ), '3.2.2', true );
		wp_enqueue_style( 'drawer-style', get_template_directory_uri() . '/css/drawer.css', array(), '3.2.2', 'screen and (max-width: 782px)', true );
		wp_enqueue_script( 'double-tap-to-go', get_template_directory_uri() . '/js/doubletaptogo.js', array( 'jquery' ), '1.0.0', true );
	}
	if ( is_active_sidebar( 'sidebar-2' ) ) {
		wp_enqueue_script( 'sticky-kit', get_template_directory_uri() . '/js/sticky-kit.min.js', array( 'jquery' ), '1.1.3', true );
	}
	wp_enqueue_script( 'write-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160525', true );
	wp_enqueue_script( 'write-functions', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20190226', true );
	wp_enqueue_script( 'original-js', get_stylesheet_directory_uri() . '/js/original.js', array(), _VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


/* Tag Cloud */
// style属性を取り除く
function wp_tag_cloud_customize( $output ) {
	$output = preg_replace( '/\s*?style="[^"]+?"/i', '',  $output);
	return $output;
}
add_filter( 'wp_tag_cloud', 'wp_tag_cloud_customize');

// フォーマットを変更
function widget_tag_cloud_args_customize($args) {
    $myargs = array(
		'number' => 30,
		'format' => 'list',
		'separator' => "\n",
        'orderby' => 'count',
        'order' => 'DESC',
        'single_text' => '%s post',
		'multiple_text' => '%s posts'
    );
    $args = wp_parse_args($args, $myargs);
    return $args;
}
add_filter('widget_tag_cloud_args', 'widget_tag_cloud_args_customize');


/* ページ送りのカスタマイズ */
if ( ! function_exists( 'write_post_nav' ) ) :
/**
 * Display navigation to next/previous post when applicable.
 */
function write_post_nav() {
	// Don't print empty markup if there's nowhere to navigate.
	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );

	if ( ! $next && ! $previous ) {
		return;
	}
	?>
	<nav class="navigation post-navigation">
		<h2 class="screen-reader-text"><?php esc_html_e( 'Post navigation', 'write-pro' ); ?></h2>
		<div class="nav-links">
			<?php
				previous_post_link( '<div class="nav-previous"><div class="post-nav-title">%link</div></div>', esc_html_x( '前の記事', 'Previous post link', 'write-pro' ) );
				next_post_link( '<div class="nav-next"><div class="post-nav-title">%link</div></div>', esc_html_x( '次の記事', 'Next post link', 'write-pro' ) );
			?>
		</div><!-- .nav-links -->
	</nav><!-- .post-navigation -->
	<?php
}
endif;

/* 投稿メタ情報のタグカスタマイズ */
if ( ! function_exists( 'write_footer_meta' ) ) :
/**
 * Display post footer meta when applicable.
 */
function write_footer_meta() {
	// Don't print empty markup if there's no Categories or Tags.
	$tags_list = get_the_tag_list( '', __( '', 'write-pro' ) );
	if ( get_theme_mod( 'write_hide_category' ) && '' == $tags_list ) {
		return;
	}
	?>
	<footer class="entry-footer">
		<div class="entry-footer-meta">
			<?php if ( ! get_theme_mod( 'write_hide_category' ) ) : ?>
			<div class="cat-links">
				<?php the_category( __( '', 'write-pro' ) ); ?>
			</div>
			<?php endif; ?>
			<?php if ( '' != $tags_list ) : ?>
			<div class="tags-links">
				<?php echo $tags_list; ?>
			</div>
			<?php endif; // End if $tags_list ?>
		</div>
	</footer><!-- .entry-footer -->
	<?php
}
endif;

// 投稿ページの分割ページの先頭と最後を判定
function is_post_page_end() {
    global $numpages;
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    return $paged == $numpages;
}
function is_post_page_start() {
    $paged = (get_query_var('page')) ? get_query_var('page') : 1;
    return $paged == 1;
}

//Pagenation
function pagination($pages = '') {
	
    global $paged, $numpages;
    if(empty($paged)) $paged = 1;

    if($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages) {
            $pages = 1;
        }
    }

    if(1 != $pages) {
		echo '<span class="page-number">' .$paged. '/' .$pages. '</span>';
    }
}

function page_number() {  
    global $pages, $page, $numpages;
    $paged = (get_query_var('page')) ? get_query_var('page') : 1; 
    if ( $numpages !== 1 ) {
    	echo '<span class="page-number">（' .$paged. '/' .$numpages. '）</span>';
	}
}

/**
 * アーカイブタイトルのカスタマイズ
 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('',false);
    } elseif (is_tag()) {
        $title = single_tag_title('#',false);
	} elseif (is_tax()) {
	    $title = single_term_title('',false);
	} elseif (is_post_type_archive() ){
		$title = post_type_archive_title('',false);
	} elseif (is_date()) {
	    $title = get_the_time('Y年n月');
	} elseif (is_search()) {
	    $title = '検索結果：'.esc_html( get_search_query(false) );
	} elseif (is_404()) {
	    $title = '「404」ページが見つかりません';
	} else {

	}
    return $title;
});

/**
 * Github
 */
require 'plugin-update-checker-4.9/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/mrtc-jp/maetoato/master/theme.json',
    __FILE__,
    'maetoato'
);

/**
 * SVGをアップロード
 */
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
}
add_action('upload_mimes', 'add_file_types_to_uploads');

/**
 * サイトアイコンを個別登録
 */
function my_site_icon_meta_tags($meta_tags) {
	$meta_tags[0] = '<link rel="icon" href="' .get_stylesheet_directory_uri(). '/icon/32x32.png" sizes="32x32" />';
	$meta_tags[1] = '<link rel="icon" href="' .get_stylesheet_directory_uri(). '/icon/192x192.png" sizes="192x192" />';
	$meta_tags[2] = '<link rel="apple-touch-icon" href="' .get_stylesheet_directory_uri(). '/icon/180x180.png" />';
	$meta_tags[3] = '<meta name="application-name" content="まえとあと" />';
	$meta_tags[4] = '<meta name="msapplication-square70x70logo" content="' .get_stylesheet_directory_uri(). '/icon/small.jpg" />';
	$meta_tags[5] = '<meta name="msapplication-square150x150logo" content="' .get_stylesheet_directory_uri(). '/icon/medium.jpg" />';
	$meta_tags[6] = '<meta name="msapplication-wide310x150logo" content="' .get_stylesheet_directory_uri(). '/icon/wide.jpg" />';
	$meta_tags[7] = '<meta name="msapplication-square310x310logo" content="' .get_stylesheet_directory_uri(). '/icon/large.jpg" />';
	$meta_tags[8] = '<meta name="msapplication-TileColor" content="#0000ff">';
	return $meta_tags;
}
add_filter( 'site_icon_meta_tags', 'my_site_icon_meta_tags' );

/**
 * 画像サイズの変更
 */
function maetoato_thumb_size() {
	add_image_size( 'write-post-thumbnail-large', 1200, 580, true );
	add_image_size( 'write-post-thumbnail-medium', 600, 375, true );
}
add_action( 'after_setup_theme', 'maetoato_thumb_size', 11);

/**
 * Set background of featured posts.
 */
if ( ! function_exists( 'write_featured_post_background' ) ) :
function write_featured_post_background( $image_size = 'write-post-thumbnail-large' ) {
	$featured_url = wp_get_attachment_image_src( get_post_thumbnail_id(), $image_size );
	if ( $featured_url ) {
		 echo ' style="background-image:url(\'' . esc_url( $featured_url[0] ) . '\')"';
	}
}
endif;

/**
 * 人気記事
 */
function theme_customize_register($wp_customize) {
	
	$wp_customize->add_panel( 'popular_posts_panel', array(
		'title'    => '人気記事',
		'priority' => 100
	));
	
    $wp_customize->add_section( 'popular_posts', array(
        'title'    => '人気記事の設定',
        'panel'    => 'popular_posts_panel',
        'priority' => 1
    ));
    
    $wp_customize->add_setting( 'popular_posts_ranking', array(
	    'type' => 'option',
    	'default' => true
	));
    $wp_customize->add_control( 'popular_posts_ranking', array(
		'settings'  => 'popular_posts_ranking',
		'label'     => 'ランキング表示',
		'section'   => 'popular_posts',
		'type'      => 'checkbox'
	));
	
	$wp_customize->add_setting( 'popular_posts_number', array(
		'type' => 'option',
    	'default' => 9
	));
    $wp_customize->add_control( 'popular_posts_number', array(
		'settings'  => 'popular_posts_number',
		'label'     => '表示件数（件）',
		'section'   => 'popular_posts',
		'type'      => 'number'
	));
	
	$wp_customize->add_setting( 'popular_posts_period', array(
		'type' => 'option',
    	'default' => 30
	));
    $wp_customize->add_control( 'popular_posts_period', array(
		'settings'  => 'popular_posts_period',
		'label'     => 'データ取得期間（日）',
		'section'   => 'popular_posts',
		'type'      => 'number'
	));
}
add_action( 'customize_register', 'theme_customize_register' );

/**
 * SmartNewsフィード追加
 */
remove_filter('do_feed_rss2', 'do_feed_rss2', 10);
function custom_feed_rss2(){
	$rss2_file = '/feed-rss2.php';
	load_template(get_stylesheet_directory() . $rss2_file);
}
add_action('do_feed_rss2', 'custom_feed_rss2', 10);

?>