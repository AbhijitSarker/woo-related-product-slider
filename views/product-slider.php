<?php
global $post;

$terms = get_the_terms($post->ID, 'product_cat');

$related_products_array = array();
foreach ($terms as $term) {

    $cat_id = $term->term_id;

    $cat_name = get_the_category_by_ID($cat_id);

    $all_product_ids = get_posts(array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $cat_name, /*category name*/
                'operator' => 'IN',
            )
        ),
    ));


    foreach ($all_product_ids as $single_product_id) {
        array_push($related_products_array, $single_product_id);
    }
}



?>








<div class="bbb_viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bbb_main_container">
                    <div class="bbb_viewed_title_container">
                        <h3 class="bbb_viewed_title">Best selling products</h3>
                        <div class="bbb_viewed_nav_container">
                            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="bbb_viewed_slider_container">
                        <div class="owl-carousel owl-theme bbb_viewed_slider">

                            <?php
                            foreach ($related_products_array as $product_id) {
                                $product_info = wc_get_product($product_id);

                                $product_name = get_the_title($product_id);

                                $permalink = get_permalink($product_id);

                                $reg_price = $product_info->get_regular_price($product_id);

                                $product_price = $product_info->get_price($product_id);

                                $product_image = wp_get_attachment_image_src(get_post_thumbnail_id($product_id), 'single-post-thumbnail');
                            ?>
                                <div class="owl-item">
                                    <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="bbb_viewed_image"><img src="<?php echo $product_image[0]; ?>" alt=""></div>
                                        <div class="bbb_viewed_content text-center">
                                            <div class="bbb_viewed_price"><?php echo $product_price; ?><span><?php echo $reg_price; ?></span></div>
                                            <div class="bbb_viewed_name"><a href="<?php echo $permalink; ?>"><?php echo $product_name; ?></a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">Sale</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>