<html>
<head>
<link href="webfonts/stylesheet.css" rel="stylesheet" type="text/css">
<link href="skin/frontend/cavetcosmeticsV2/default/css/styles.css" rel="stylesheet" type="text/css">
<link href="skin/frontend/cavetcosmeticsV2/default/css/blog.css" rel="stylesheet" type="text/css">
<base target="_parent" />
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
<div class="home-blog">


<?php if (has_post_thumbnail( $post->ID ) ): ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
<a class="home-blog-image" style="background-image: url('<?php echo $image[0]; ?>');" href="<?php the_permalink() ?>">
 &nbsp;
</a>
<?php endif; ?>

<div class="home-blog-title"><strong><?php the_title(); ?></strong></div>
<div class="home-blog-excerpt"><?php the_excerpt(); ?></div>
<div class="home-blog-link"><a href="<?php the_permalink() ?>"><strong>KEEP READING >></strong></a></div>


</div>
<?php endforeach; ?>
</body>
</html>