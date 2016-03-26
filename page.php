<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
    <div class="banner-img">
        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
<!--        <img src="--><?php //bloginfo('stylesheet_directory'); ?><!--/img/home.jpg" class="img-responsive">-->
    </div>
    <?php endif; ?>
    <main id="main" class="bc-main" role="main">
        <div id="content" class="bc-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <div class="page-header">
                                    <h1>
                                        <?php the_title(); ?>
                                    </h1>
                                </div>
                                <div class="entry-content">
                                    <?php the_content(); ?>
                                </div>
                            </article>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php endwhile; ?>
<?php get_footer(); ?>