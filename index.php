<?php 

get_header(); 

global $paged;
$max_page = $wp_query->max_num_pages;
$results = $wp_query->found_posts;
?>

<div class="content-wrapper">
    <div class="container">

        <?php if (is_archive()): ?>
            <h1 class="page-title"><?php the_archive_title(); ?></h1>
        <?php else: ?>
            <h1 class="page-title">Search</h1>
            <form class="search-box" method="get">
                <div class="search-box__field">
                    <label for="s">Search information, advice and guidance</label>
                    <input id="s" name="s" placeholder="eg. autism" value="<?php the_search_query(); ?>"/>
                </div>
                <button class="search-box__button">Search</button>
            </form>
        <?php endif; ?>

        <div class="layout-sidebar-right">
            <article class="layout-sidebar-right__main-content">
            <?php if(have_posts()): ?>
                <?php if (!is_archive()): ?>
                    <p><?php echo $results; ?> results found</p>
                <?php endif; ?>
                <ol class="search-results-list">
                    <?php while(have_posts()): the_post(); ?>
                    <li class="search-results-list__result">
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <?php the_excerpt(); ?>
                        <small>Last updated <?php the_modified_time(" j F Y") ?></small>
                    </li>
                    <?php endwhile; ?>
                </ol>

                <?php if(1 < $max_page): ?>
                    <nav class="guide-navigation">
                        <ul class="guide-navigation__list">  
                            <?php if($paged > 1): ?>
                            <li class="guide-navigation__item guide-navigation__item--previous">
                                <a class="guide-navigation__link" href="<?php echo previous_posts(); ?>">
                                    <span>Previous</span>    
                                    <span>Page <?php echo $paged - 1 ?> of <?php echo $max_page ?></span>
                                </a>
                            </li>
                            <?php endif; ?>

                            <?php if(($paged + 1) < $max_page): ?>
                            <li class="guide-navigation__item guide-navigation__item--next"> 
                                <a class="guide-navigation__link" href="<?php echo next_posts(); ?>">
                                    <span>Next</span>   
                                    <span>Page <?php echo $paged + 1 ?> of <?php echo $max_page ?></span>
                                </a>
                            </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <p class="no-results">No results match your search. Try widening your query.</p>
            <?php endif; ?>
            </article>
        </div>

    </div>
</div>

<?php get_footer(); ?>



