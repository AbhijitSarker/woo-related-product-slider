<?php
global $product;

$product_id = $product->get_id();

$product_name = $product->get_name();
$product_cat = $product->get_categories();
$product_img = $product->get_image();

$product_reg_price = $product->get_regular_price();
$product_price = $product->get_price();
$pro_cat_id = $product->get_category_ids();


// echo $product_name;
// echo $product_cat;
// echo $product_reg_price;
// echo $product_price;




$p_array = array('12', '16', '21', '17');
$prod_array = array();
foreach ($p_array as $key => $value) {

    $term_object = get_term($value);
    $cat_name = $term_object->slug;
    //echo $cat_name;
    $all_ids = get_posts(array(
        'post_type' => 'product',
        'numberposts' => -1,
        'post_status' => 'publish',
        'fields' => 'ids',
        'tax_query' => array(
            array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $cat_name,
                'operator' => 'IN',
            )
        ),
    ));
    foreach ($all_ids as $id) {
        array_push($prod_array, $id);
    }
}
// print_r($prod_array);


?>




<div class="bbb_viewed">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="bbb_main_container">
                    <div class="bbb_viewed_title_container">
                        <h3 class="bbb_viewed_title">Related Products</h3>
                        <div class="bbb_viewed_nav_container">
                            <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="bbb_viewed_slider_container">
                        <div class="owl-carousel owl-theme bbb_viewed_slider">
                            <?php foreach ($prod_array as $cat_pro) {
                                // global $product;
                                $cat_pro;

                                $productname = get_the_title($cat_pro);
                                $image = get_the_post_thumbnail($cat_pro, 'thumbnail');

                                $_product = wc_get_product($cat_pro);
                                $reg_price = $_product->get_regular_price($cat_pro);
                                $price = $_product->get_price($cat_pro);


                            ?>
                                <div class="owl-item">
                                    <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="bbb_viewed_image"><img src="<?php echo $image; ?>"></div>
                                        <div class="bbb_viewed_content text-center">
                                            <div class="bbb_viewed_price"><?php echo $price; ?><span><?php echo $reg_price; ?></span></div>
                                            <div class="bbb_viewed_name"><a href="#"><?php echo $productname; ?></a></div>
                                        </div>
                                        <ul class="item_marks">
                                            <li class="item_mark item_discount">-25%</li>
                                            <li class="item_mark item_new">new</li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>