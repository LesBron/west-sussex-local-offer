<?php 
/* Template Name: Pinboard */

$pins = unserialize(stripslashes($_COOKIE[COOKIE_KEY]));

$query = new WP_Query(array(
    "post_type" => "page",
    "post__in" => $pins,
    "orderby" => "modified"
) );

get_header(); ?>

<div class="content-wrapper">
    <div class="container">
        <h1 class="page-title">
            Your pinboard 
            <?php if($pins) echo "<span class='page-title__count'>(" . sizeof($pins) . ")</span>" ?>

        </h1>

        <?php 
            if($pins){ ?>
                <ul class="pinboard-list">
                <?php while ( $query->have_posts() ) { $query->the_post(); ?>
                    <li class="pinboard-list__item">
                        <h2>
                            <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                        </h2>
                        <p><?php the_excerpt() ?></p>

                        <form method="post" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>"> 
                            <input type="hidden" name="action" value="pinning"/>    
                            <input type="hidden" name="id" value="<?php echo get_the_ID(); ?>"/>
                            <?php 
                                if(is_array($pins) && in_array($post->ID, $pins)){
                                    echo "<button class='button'>Remove from pins</button>";
                                } else {
                                    echo "<button class='button'>Add to pins</button>";
                                }
                            ?>
                        </form>

                    </li>
                <?php } ?>
                </ul>
                <?php 
                wp_reset_postdata();
            } else {
                echo "<p>There's nothing on your pinboard yet</p>";
            }
        ?>

    </div>
</div>

<?php get_footer(); ?>