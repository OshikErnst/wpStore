<?php

if ( function_exists('register_sidebar') )
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '',
		'after_title' => '',
	));



function show_brands($id){

    global $wpdb;

    $sidebar_brands = $wpdb->get_results("SELECT * FROM `".WPSC_TABLE_PRODUCT_CATEGORIES."` WHERE group_id =".$id." AND Active = 1 LIMIT 0 , 30",ARRAY_A);
    $output = "";
    $i = 1 ;

    if($sidebar_brands != null){

      foreach($sidebar_brands as $sidebar_brand) {

       $output .= "<li class='sidebar_brand".$i."'><a href='".wpsc_category_url($sidebar_brand['id'])."' />".$sidebar_brand['name']."</a></li>";

       $i++;
       

       }
      }
     echo $output;

    }	
    
    
    
    function show_cats($id){

    global $wpdb;

    $header_cats = $wpdb->get_results("SELECT * FROM `".WPSC_TABLE_PRODUCT_CATEGORIES."` WHERE group_id =".$id." AND Active = 1 LIMIT 0 , 30",ARRAY_A);
    $output = "";
    $i = 1 ;

    if($header_cats != null){

      foreach($header_cats as $header_cat) {

       $output .= "<li class='header_cat".$i."'><a href='".wpsc_category_url($header_cat['id'])."' />".$header_cat['name']."</a></li>";

       $i++;
       

       }
      }
     echo $output;

    }	
    
    
    
    
    function display_top_products(){
    global $wpdb;
	
	$top_products_ids = $wpdb->get_results("SELECT * FROM `".WPSC_TABLE_PRODUCT_CATEGORIES."` WHERE name = 'top products' LIMIT 0 , 30" ,ARRAY_A);
	if($top_products_ids != null){
	foreach($top_products_ids as $top_products_id) {
	$id = $top_products_id['id'];
	}
	}else{
	$id = '';	
	}
	
    $top_products = $wpdb->get_results("SELECT `".WPSC_TABLE_PRODUCT_LIST."`.id AS Pid, `".WPSC_TABLE_PRODUCT_LIST."`.name AS Pname FROM `".WPSC_TABLE_PRODUCT_LIST."` INNER JOIN `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."` ON `".WPSC_TABLE_PRODUCT_LIST."`.id = `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.product_id AND `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.category_id = ".$id." And `".WPSC_TABLE_PRODUCT_LIST."`.active = 1  LIMIT 5",ARRAY_A);
    $output = "";
    $i = 1 ;

    if($top_products != null){

      foreach($top_products as $top_product) {

       $output .= "<li class='top_product".$i."'><a href='".wpsc_product_url($top_product['Pid'])."' />".$top_product['Pname']."</a></li>";

       $i++;
       

       }
      }
     echo $output;
    }
    
    
    
    function display_latest_products(){
    global $wpdb;
    
    $latest_products_ids = $wpdb->get_results("SELECT * FROM `".WPSC_TABLE_PRODUCT_CATEGORIES."` WHERE name = 'latest products' LIMIT 0 , 30" ,ARRAY_A);
    
    if($latest_products_ids != null){
	foreach($latest_products_ids as $latest_products_id) {
	$id = $latest_products_id['id'];
	}
	}else{
	$id = '';
	}
	

    $latest_products = $wpdb->get_results("SELECT `".WPSC_TABLE_PRODUCT_LIST."`.id AS Pid, `".WPSC_TABLE_PRODUCT_LIST."`.name AS Pname, `".WPSC_TABLE_PRODUCT_LIST."`.price AS Pprice,`".WPSC_TABLE_PRODUCT_LIST."`.special_price AS Pspecial_price,`".WPSC_TABLE_PRODUCT_LIST."`.notax AS Pnotax  FROM `".WPSC_TABLE_PRODUCT_LIST."` INNER JOIN `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."` ON `".WPSC_TABLE_PRODUCT_LIST."`.id = `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.product_id AND `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.category_id = ".$id." And `".WPSC_TABLE_PRODUCT_LIST."`.active = 1 LIMIT 4",ARRAY_A);
    
    if(get_option('permalink_structure') != '') {
    $seperator ="?";
	} else {
		$seperator ="&amp;";
	}
	
    $output = "";
    

    if($latest_products != null){

      foreach($latest_products as $latest_product) {
      		$product_image_id = $wpdb->get_row("SELECT id FROM `".WPSC_TABLE_PRODUCT_IMAGES."` WHERE product_id = ".$latest_product['Pid']." order by id desc LIMIT 1 " ,ARRAY_A);
      		 
      		$image_id = $product_image_id['id'];

	
	
      	$output .= "<li class='latest_product'>";
       		$output .= "<form id='product_".$latest_product['Pid']."' name='product_".$latest_product['Pid']."' method='post' action='".get_option('product_list_url').$seperator."category=".$_GET['category']."' enctype='multipart/form-data'' class=''product_form' onsubmit='submitform(this);return false;'>";
					$output .= "<input type='hidden' name='wpsc_ajax_action' value='add_to_cart'/>
";
					$output .= "<input type='hidden' name='product_id' value='".$latest_product['Pid']."' />";
       $output .= "<a href='".wpsc_product_url($latest_product['Pid'])."' /><img class='product_image' src='index.php?image_id=".$image_id."&width=118&height=118' title='".$latest_product['Pname']."' alt='".$latest_product['Pname']."' /></a><br />\n\r";
       $output .= "<div class='product_info'><a href='".wpsc_product_url($latest_product['Pid'])."' />".$latest_product['Pname']."</a><br />";
	   $output .= nzshpcrt_currency_display(($latest_product['Pprice'] - $latest_product['Pspecial_price']), $latest_product['Pnotax'],false,$latest_product['Pid']);
	   $output .= "</div><input type='submit' id='product_".$latest_product['Pid']."_submit_button' class='wpsc_buy_button' name='Buy' value='".TXT_WPSC_ADDTOCART."'  />";
	   
	   $output .= "</li></form>";

       
       

       }
      }
     echo $output;
    }
    
    
    
    function display_homepage_products(){
    global $wpdb;
    
    $homepage_products_ids = $wpdb->get_results("SELECT * FROM `".WPSC_TABLE_PRODUCT_CATEGORIES."` WHERE name = 'homepage products' LIMIT 0 , 30" ,ARRAY_A);
    
    if($homepage_products_ids != null){
	foreach($homepage_products_ids as $homepage_products_id) {
	$id = $homepage_products_id['id'];
	}
	}else{
	$id = '';
	}
    

    $homepage_products = $wpdb->get_results("SELECT `".WPSC_TABLE_PRODUCT_LIST."`.id AS Pid, `".WPSC_TABLE_PRODUCT_LIST."`.name AS Pname, `".WPSC_TABLE_PRODUCT_LIST."`.price AS Pprice,`".WPSC_TABLE_PRODUCT_LIST."`.special_price AS Pspecial_price,`".WPSC_TABLE_PRODUCT_LIST."`.notax AS Pnotax  FROM `".WPSC_TABLE_PRODUCT_LIST."` INNER JOIN `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."` ON `".WPSC_TABLE_PRODUCT_LIST."`.id = `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.product_id AND `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.category_id = ".$id." And `".WPSC_TABLE_PRODUCT_LIST."`.active = 1  ORDER BY RAND() LIMIT 12",ARRAY_A);
    
    
    
    
    if(get_option('permalink_structure') != '') {
    $seperator ="?";
	} else {
		$seperator ="&amp;";
	}
	
    $output = "";
    

    if($homepage_products != null){

      foreach($homepage_products as $homepage_product) {
      	$Pid = $homepage_product['Pid'];
      	$product_image_id = $wpdb->get_row("SELECT id FROM `".WPSC_TABLE_PRODUCT_IMAGES."` WHERE product_id = ".$homepage_product['Pid']." order by id desc LIMIT 1 " ,ARRAY_A);
      		 
      		$image_id = $product_image_id['id'];
	


       $output .= "<li class='homepage_product'>";
       	$output .= "<form id='product_".$homepage_product['Pid']."' name='product_".$homepage_product['Pid']."' method='post' action='".get_option('product_list_url').$seperator."category=".$_GET['category']."' enctype='multipart/form-data'' class=''product_form' onsubmit='submitform(this);return false;'>";
					$output .= "<input type='hidden' name='wpsc_ajax_action' value='add_to_cart'/>
";
					$output .= "<input type='hidden' name='product_id' value='".$homepage_product['Pid']."' />";
       $output .= "<a href='".wpsc_product_url($homepage_product['Pid'])."' /><img class='product_image' src='index.php?image_id=".$image_id."&width=118&height=118' title='".$homepage_product['Pname']."' alt='".$homepage_product['Pname']."' /></a><br />\n\r";
       $output .= "<div class='product_info'><a href='".wpsc_product_url($homepage_product['Pid'])."' />".$homepage_product['Pname']."</a><br />";
	   $output .= nzshpcrt_currency_display(($homepage_product['Pprice'] - $homepage_product['Pspecial_price']), $homepage_product['Pnotax'],false,$homepage_product['Pid']);
	   $output .= "</div><input type='submit' id='product_".$homepage_product['Pid']."_submit_button' class='wpsc_buy_button' name='Buy' value='".TXT_WPSC_ADDTOCART."'  />";
	   
	   $output .= "</li></form>";

       
       

       }
      }
     echo $output;
    }
    
    
    
    
    function display_more_products(){
    global $wpdb;
    
    
    
    if ($_GET['category'] == ''){
	
	$id = 1;
	
	}else{
	$id = $_GET['category'];
	}
	
	if ($_GET['product_id'] == ''){

	$product_id = 1;

	}else{
	$product_id = $_GET['product_id'];
	}
	

    

    $more_products = $wpdb->get_results("SELECT `".WPSC_TABLE_PRODUCT_LIST."`.id AS Pid, `".WPSC_TABLE_PRODUCT_LIST."`.name AS Pname, `".WPSC_TABLE_PRODUCT_LIST."`.price AS Pprice,`".WPSC_TABLE_PRODUCT_LIST."`.special_price AS Pspecial_price,`".WPSC_TABLE_PRODUCT_LIST."`.notax AS Pnotax  FROM `".WPSC_TABLE_PRODUCT_LIST."` INNER JOIN `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."` ON `".WPSC_TABLE_PRODUCT_LIST."`.id = `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.product_id AND `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.product_id <> ".$product_id." AND `".WPSC_TABLE_ITEM_CATEGORY_ASSOC."`.category_id = ".$id." And `".WPSC_TABLE_PRODUCT_LIST."`.active = 1  ORDER BY RAND() LIMIT 4",ARRAY_A);
    
    if(get_option('permalink_structure') != '') {
    $seperator ="?";
	} else {
		$seperator ="&amp;";
	}
	
    $output = "";
    

    if($more_products != null){

      foreach($more_products as $more_product) {
      	$product_image_id = $wpdb->get_row("SELECT id FROM `".WPSC_TABLE_PRODUCT_IMAGES."` WHERE product_id = ".$more_product['Pid']." order by id desc LIMIT 1 " ,ARRAY_A);
      		 
      		$image_id = $product_image_id['id'];

       $output .= "<li class='homepage_product'>";
       	$output .= "<form id='product_".$more_product['Pid']."' name='product_".$more_product['Pid']."' method='post' action='".get_option('product_list_url').$seperator."category=".$_GET['category']."' enctype='multipart/form-data'' class=''product_form' onsubmit='submitform(this);return false;'>";
					$output .= "<input type='hidden' name='wpsc_ajax_action' value='add_to_cart'/>
";
					$output .= "<input type='hidden' name='product_id' value='".$more_product['Pid']."' />";
       $output .= "<a href='".wpsc_product_url($more_product['Pid'])."' /><img class='product_image' src='index.php?image_id=".$image_id."&width=118&height=118' title='".$more_product['Pname']."' alt='".$more_product['Pname']."' /></a><br />\n\r";
       $output .= "<div class='product_info'><a href='".wpsc_product_url($homepage_product['Pid'])."' />".$more_product['Pname']."</a><br />";
	   $output .= nzshpcrt_currency_display(($more_product['Pprice'] - $more_product['Pspecial_price']), $more_product['Pnotax'],false,$more_product['Pid']);
	   $output .= "</div><input type='submit' id='product_".$more_product['Pid']."_submit_button' class='wpsc_buy_button' name='Buy' value='".TXT_WPSC_ADDTOCART."'  />";
	   
	   $output .= "</li></form>";

       
       

       }
      }
     echo $output;
    }
    
    
    

?>
