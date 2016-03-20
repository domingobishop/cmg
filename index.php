<?php get_header(); ?>

<div class="bc-banner">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="intro-banner">
                    <h1>
                        <?php bloginfo('name'); ?>
                    </h1>

                    <h3>
                        <?php bloginfo('description'); ?>
                        <h3>
                </div>
            </div>
        </div>
    </div>
</div>
<main id="main" class="bc-main" role="main">
<div id="content" class="bc-content">
    <section id="post-loop" class="bc-post-loop">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="bc-post-loop-wrap">
                        <?php if (have_posts()) : ?>
                            <?php /* The loop */ ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <article id="post-<?php the_ID(); ?>">
                                    <?php if (has_post_thumbnail() && !post_password_required() && !is_attachment()) : ?>
                                        <div class="entry-thumbnail">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <h1 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h1>
                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </article>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <h1>No content</h1>
                        <?php endif; ?>
                        <nav>
                            <ul class="pager">
                                <li class="previous"><?php next_posts_link(__('&#8249; Older posts', 'blankcanvas')); ?></li>
                                <li class="next"><?php previous_posts_link(__('Newer posts &#8250;', 'blankcanvas')); ?></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- #content -->
</main>

<?php get_footer(); ?>
