<div id="carrusel_logos" class="container">
<h3 class="text-center">Marcas que trabajamos</h3>

   <!--Slider--> 
   <div class="carousel slide col-12 col-md-12  mt-3 customer-logos">

         <?php $active = true;
         $temp = $wp_query;
         $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
         $post_per_page = 100; // -1 shows all posts
         $args = array(
            'post_type' => 'carrusel_logos',
            'orderby' => 'date',
            'order' => 'ASC',
            'paged' => $paged,
            'posts_per_page' => $post_per_page
         );
         $wp_query = new WP_Query($args);

         if (have_posts()) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>


               <?php
               $image = get_field('carrusel_uno_logo');
               if (!empty($image)) : ?>
                  <div class="carrusel-interior slidel" style="background-image: url('<?php echo esc_url($image['url']); ?>')">

                  <?php endif; ?>
                  </div>


                  <?php
                  $image = get_field('carrusel_dos_logo');
                  if (!empty($image)) : ?>
                     <div class="carrusel-interior slidel" style="background-image: url('<?php echo esc_url($image['url']); ?>')">

                     <?php endif; ?>
                     </div>


                     <?php
                     $image = get_field('carrusel_tres_logo');
                     if (!empty($image)) : ?>
                        <div class="carrusel-interior slidel" style="background-image: url('<?php echo esc_url($image['url']); ?>')">

                        <?php endif; ?>
                        </div>

                        <?php
                        $image = get_field('carrusel_cuatro_logo');
                        if (!empty($image)) : ?>
                           <div class="carrusel-interior slidel" style="background-image: url('<?php echo esc_url($image['url']); ?>')">

                           <?php endif; ?>
                           </div>

                           <?php
                           $image = get_field('carrusel_cinco_logo');
                           if (!empty($image)) : ?>
                              <div class="carrusel-interior slidel" style="background-image: url('<?php echo esc_url($image['url']); ?>')">

                              <?php endif; ?>
                              </div>



                           <?php endwhile;

                     else : ?>

                        <?php endif;
                     wp_reset_query();
                     $wp_query = $temp ?>




      


   </div>


</div>