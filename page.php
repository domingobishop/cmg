<?php get_header(); ?>
<?php while (have_posts()) : the_post(); ?>
    <div class="banner-header">
    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
        <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
    <?php endif; ?>
        <div class="page-header">
            <h1>
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
    <main id="main" class="main" role="main">
        <div id="content" class="content-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-md-offset-1">
                            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
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