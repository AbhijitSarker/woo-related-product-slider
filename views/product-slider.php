<?php
global $post;

$terms = get_the_terms($post->ID, 'product_cat');

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
        echo $single_product_id;
    }
}












// global $wp_query;
// global $post;

// $terms_post = get_the_terms($post->cat_ID, 'product_cat');
// // var_dump($terms_post);

// $product_cat_arr = array();
// foreach ($terms_post as $term_cat) {
//     $term_cat_id = $term_cat->term_id;
//     // echo $term_cat_id;
//     array_push($product_cat_arr, $term_cat_id);
// }
// // var_dump($product_cat_arr);

// $categories = get_categories('orderby=name&hide_empty=0');
// var_dump($categories);
// foreach ($categories as $category) :
//     $catids = $category->term_id;
//     $catname = $category->name;
// endforeach;


// $cat_name = get_the_category_by_ID($product_cat_arr);
// echo $cat_name;




// $all_products = get_posts(array(
//     'post_type' => 'product',
//     'numberposts' => -1,
//     'post_status' => 'publish',
//     'tax_query' => array(
//         array(
//             'taxonomy' => 'product_cat',
//             'field' => 'slug',
//             'terms' => $product_cat_arr, /*category name*/
//             'operator' => 'IN',
//         )
//     ),
// ));
// var_dump($all_products);














// $term_arr_lists = get_the_terms($product_id, 'product_cat');

// $cat_slug_arr = array();





// foreach ($term_arr_lists as $term_arr_list) {

//     // echo '</pre>';
//     $taxonomy_id = $term_arr_list->slug;

//     array_push($cat_slug_arr, $taxonomy_id);
// }

// $cat_arrs = json_encode(array_values($cat_slug_arr));

// // Get shirts.
// $args = array(
//     'category' => array('hoodie'),
// );
// $products = wc_get_products($args);
// //$products_query = new WP_Query($args);
// echo '<pre>';
// print_r($products);
// echo '</pre>';


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
                            <div class="owl-item">
                                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924153/alcatel-smartphones-einsteiger-mittelklasse-neu-3m.jpg" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price">₹12225<span>₹13300</span></div>
                                        <div class="bbb_viewed_name"><a href="#">Alkatel Phone</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924221/51_be7qfhil.jpg" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price">₹30079</div>
                                        <div class="bbb_viewed_name"><a href="#">Samsung LED</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price">₹22250</div>
                                        <div class="bbb_viewed_name"><a href="#">Samsung Mobile</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="bbb_viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924275/images.jpg" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price">₹1379</div>
                                        <div class="bbb_viewed_name"><a href="#">Huawei Power</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="bbb_viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924361/21HmjI5eVcL.jpg" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price">₹225<span>₹300</span></div>
                                        <div class="bbb_viewed_name"><a href="#">Sony Power</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="owl-item">
                                <div class="bbb_viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="bbb_viewed_image"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560924241/8fbb415a2ab2a4de55bb0c8da73c4172--ps.jpg" alt=""></div>
                                    <div class="bbb_viewed_content text-center">
                                        <div class="bbb_viewed_price">₹13275</div>
                                        <div class="bbb_viewed_name"><a href="#">Speedlink Mobile</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>