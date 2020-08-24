<?php get_header(); ?>

<section class="masthead" style="background-image: url('<?php echo wp_get_attachment_url( get_option("hero_image") ) ?>')">
    <div class="container">

        <h1 class="masthead__title"><?php echo get_option("hero_headline"); ?></h1>
        <p class="masthead__lede"><?php echo get_option("hero_lede"); ?></p>

        <form class="masthead__search" method="get">
            <div class="masthead__field">
                <label for="s">Search information, advice and guidance</label>
                <input name="s" type="search" placeholder="eg. autism"/>
            </div>
            <button class="masthead__button">Search</button>
        </form>

    </div>
</section>



<section class="trails">
    <h2 class="visually-hidden">Popular topics</h2>
    <?php 
        wp_nav_menu( array( 
            'container' => false,
            'theme_location' => 'trails-menu',
            'menu_class' => "container trails__list"
        ));
    ?>
</section>

<?php if(get_option("campaign_text")): ?>
    <section class="campaign">
        <div class="container">
            <h2><?php echo get_option("campaign_text"); ?></h2>
            <p><?php echo get_option("campaign_lede"); ?></p>
            <a class="button button--white" href="<?php echo get_the_permalink(get_option("campaign_link")); ?>"><?php echo get_option("campaign_link_text"); ?></a>
        </div>
    </section>
<?php endif ?>

<?php $query = new WP_Query(array(
    "posts_per_page" => 3,
    "post_type" => "post"
));
if($query->have_posts()): ?>
    <section class="blog-posts">
        <div class="container">
            <h2>Latest blog posts</h2>
            <div class="blog-posts__grid">
            <?php while($query->have_posts()): $query->the_post(); ?>

                <article>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    <p><?php the_excerpt(); ?></p>
                </article> 

            <?php endwhile; ?>
</div>
        </div>
    </section>
<?php endif; ?>

<section class="contact">
    <div class="container contact__inner">
        <div class="contact__panel">
            <h2>Give feedback on this website</h2>
            <p>This is a brand new website that we're developing with schools, educators, parent carers and others as part of the SEND and Inclusion Strategy.</p>
            <p>Please let us know how useful you find it and what further information you would like included.</p>
            <a class="button" href="mailto:toolsforschools@westsussex.gov.uk?subject=Feedback%20on%20Tools%20for%20Schools%20website">Give feedback</a>
        </div>

        <div class="contact__panel">
            <h2>Contact us</h2>
            <p>You can email the Tools for Schools team any time. We work part time but aim to respond as soon as we can to all enquiries. </p>
            <a class="button" href="mailto:toolsforschools@westsussex.gov.uk">Email us</a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
