<?php get_header() ?>

<section class="hero-wrap hero-wrap-2" style="background-image: url('<?php if (get_field('header_background', 'options')) : ?>
      <?php echo get_field('header_background', 'options'); ?>
   <?php endif; ?>');" data-stellar-background-ratio="0.5">
   <div class="overlay"></div>
   <div class="container">
      <div class="row no-gutters slider-text align-items-end">
         <div class="col-md-9 ftco-animate pb-5">
            <p class="breadcrumbs mb-2"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a href="blog.html">Blog <i class="ion-ios-arrow-forward"></i></a></span> <span>Blog single <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-0 bread"><?php the_title() ?></h1>
         </div>
      </div>
   </div>
</section>

<section class="ftco-section ftco-degree-bg">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 ftco-animate">
            <p>
               <img src="<?php the_post_thumbnail_url('large') ?>" alt="" class="img-fluid">
            </p>
            <h2 class="mb-3">
               <?php the_title(); ?>
            </h2>
            <p><?php the_content() ?></p>
            <!-- Showing post tags  -->
            <div class="tag-widget post-tag-container mb-5 mt-5">
               <div class="tagcloud">
                  <?php $post_tags = get_the_tags();
                  if ($post_tags) :
                     foreach ($post_tags as $tag) :  ?>
                        <a href="<?php the_permalink() ?>" class="tag-cloud-link"><?php echo $tag->name; ?></a>
                  <?php endforeach;
                  endif; ?>

               </div>
            </div>
            <!-- post author info  -->
            <div class="about-author d-flex p-4 bg-light">
               <div class="bio mr-5">
                  <img src="assets/images/person_1.jpg" alt="Image placeholder" class="img-fluid mb-4">
               </div>
               <div class="desc">
                  <!-- <?php $author_info =   get_the_author() ?>
                  <pre><?php print_r($author_info); ?></pre> -->

                  <h3><?php echo get_the_author_meta('user_email'); ?></h3>
                  <p><?php  ?></p>
               </div>
            </div>


            <h3><?php the_author_meta('ID');
                  // Use shortcode in a PHP file (outside the post editor).
                  echo do_shortcode('[rsshort]');
                  ?></h3>


            <?php comments_template() ?>


            <!-- Related posts  -->
            <?php
            $orig_post = $post;
            global $post;
            $tags = wp_get_post_tags($post->ID);

            if ($tags) {
               $tag_ids = array();
               foreach ($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
               $args = array(
                  'tag__in' => $tag_ids,
                  'post__not_in' => array($post->ID),
                  'posts_per_page' => 5, // Number of related posts that will be shown.
                  'ignore_sticky_posts' => 1
               );

               $my_query = new wp_query($args);
               if ($my_query->have_posts()) {

                  echo '<div id="relatedposts"><br><br><h3>Related Posts</h3><br><div class="row">';

                  while ($my_query->have_posts()) {
                     $my_query->the_post(); ?>


                     <div class="col-md-4">
                        <div class="relatedthumb"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><img src="<?php the_post_thumbnail_url(''); ?>" alt="" width="100%" height="auto"></a></div>
                        <div class="relatedcontent">
                           <h5><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></h5>
                           <?php the_time('M j, Y') ?>
                        </div>
                     </div>


            <?php }
                  echo '</div></div>';
               }
            }
            $post = $orig_post;

            wp_reset_query(); ?>






         </div>







         <!-- .col-md-8 -->
         <div class="col-lg-4 sidebar pl-lg-5 ftco-animate">
            <div class="sidebar-box">
               <form action="#" class="search-form">
                  <div class="form-group">
                     <span class="fa fa-search"></span>
                     <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                  </div>
               </form>
            </div>
            <div class="sidebar-box ftco-animate">
               <div class="categories">
                  <h3>Services</h3>
                  <li><a href="#">Market Analysis <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="#">Accounting Advisor <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="#">General Consultancy <span class="fa fa-chevron-right"></span></a></li>
                  <li><a href="#">Structured Assesment <span class="fa fa-chevron-right"></span></a></li>
               </div>
            </div>
            <div class="sidebar-box ftco-animate">
               <h3>Recent Blog</h3>
               <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(assets/images/image_1.jpg);"></a>
                  <div class="text">
                     <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                     <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> Mar. 31, 2020</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                     </div>
                  </div>
               </div>
               <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(assets/images/image_2.jpg);"></a>
                  <div class="text">
                     <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                     <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> Mar. 31, 2020</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                     </div>
                  </div>
               </div>
               <div class="block-21 mb-4 d-flex">
                  <a class="blog-img mr-4" style="background-image: url(assets/images/image_3.jpg);"></a>
                  <div class="text">
                     <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about the blind texts</a></h3>
                     <div class="meta">
                        <div><a href="#"><span class="icon-calendar"></span> Mar. 31, 2020</a></div>
                        <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                        <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="sidebar-box ftco-animate">
               <h3>Tag Cloud</h3>
               <div class="tagcloud">
                  <a href="#" class="tag-cloud-link">home</a>
                  <a href="#" class="tag-cloud-link">builder</a>
                  <a href="#" class="tag-cloud-link">build</a>
                  <a href="#" class="tag-cloud-link">create</a>
                  <a href="#" class="tag-cloud-link">make</a>
                  <a href="#" class="tag-cloud-link">construction</a>
                  <a href="#" class="tag-cloud-link">house</a>
                  <a href="#" class="tag-cloud-link">architect</a>
               </div>
            </div>
            <div class="sidebar-box ftco-animate">
               <h3>Paragraph</h3>
               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- .section -->
<section class="ftco-section ftco-no-pb ftco-no-pt bg-secondary">
   <div class="container py-5">
      <div class="row">
         <div class="col-md-7 d-flex align-items-center">
            <h2 class="mb-3 mb-sm-0" style="color:black; font-size: 22px;">Sign Up for Your Free 1st Accounting Consultation</h2>
         </div>
         <div class="col-md-5 d-flex align-items-center">
            <form action="#" class="subscribe-form">
               <div class="form-group d-flex">
                  <input type="text" class="form-control" placeholder="Enter email address">
                  <input type="submit" value="Subscribe" class="submit px-3">
               </div>
            </form>
         </div>
      </div>
   </div>
</section>

<?php get_footer(); ?>