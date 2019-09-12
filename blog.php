<html>
<head>
<link href="webfonts/stylesheet.css" rel="stylesheet" type="text/css">
<link href="skin/frontend/cavetcosmeticsV3/default/css/styles.css" rel="stylesheet" type="text/css">
<!--<link href="skin/frontend/cavetcosmeticsV3/default/css/blog.css" rel="stylesheet" type="text/css">-->
<base target="_parent" />
<style>
html,body {overflow:hidden;padding:0px; margin:0px; background-color:#fff !important; }
.home-blog {
	font-family:'museo_sans100', Helvetica, Arial, sans-serif;
	font-size: 16px;
	text-align:center !important;
	color:#000;
	display:block;
	line-height:1;
	letter-spacing:1px;
}
.home-blog:hover {color:#000 !important;}
.home-bottom-blogimg { margin-bottom:25px !important;}
</style>
<script>
var w = parent.window.innerWidth;
if (w > 1024) {
	document.write("<style>.home-bottom-link {padding-top:0px !important;} .home-bottom-content{padding:0px 40px !important;} .home-bottom-title {margin-bottom:20px !important;}</style>")} 
else {
	document.write("<style>.home-bottom-link {padding-top:20px !important;} .home-bottom-content p {font-size:14px !important;} .home-bottom-content{padding:0px 20px !important;}</style>")};
</script>
</head>
<body>
<?php
require('blog/wp-blog-header.php');
?>
<?php
global $post;
$args = array( 'posts_per_page' => 1 );
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post); ?>


<a class="home-blog" href="<?php the_permalink() ?>">

<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<div class="home-bottom-image home-bottom-blogimg" style="background-image:url(<?php echo $image[0]; ?>);"></div>
<?php endif; ?>
<div class="home-bottom-title"><?php the_title(); ?></div>
<div class="home-bottom-content"><p><?php echo str_ireplace('<p>','',(substr(get_the_excerpt(), 0,76))); ?></p></div>
<div class="home-bottom-link">KEEP READING >></div>

</a>

<?php endforeach; ?>
</body>
</html>