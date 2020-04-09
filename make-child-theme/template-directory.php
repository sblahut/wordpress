<?php
/*
Template Name: Directory Page
*/
 get_header();?>


<link href="<?php bloginfo('stylesheet_directory');?>/css/directory.css" rel="stylesheet"/>


<div id="directory-page" class="container">

	<h1>Practitioner Directory</h1>
	<p align="center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean auctor ex porta, gravida tortor sed, semper tellus. Donec eget metus in neque interdum sagittis. Nam id rhoncus ligula.</p>
	<div id="search-box">
		<p>Search Entries</p>
		<input type="text" id="search">
		<input type="image" src="<?php bloginfo('stylesheet_directory');?>/images/search-btn.png"/>
	</div>
<form action="https://www.aiiore.com/directory/" method="POST">
<select name="field_to_sort" id="directory-sorting" onchange="this.form.submit()">
		<option value='none'>--select--</option>
		<option value="lastname_ascending">Last Name Ascending</option>
		<option value="lastname_descending">Last Name Descending</option>
		<option value="location_ascending">Location Ascending</option>
		<option value="location_descending">Location Descending</option>
		<option value="specialty_ascending">Specialty Ascending</option>
		<option value="speciaty_descending">Specialty Descending</option>
	
	</select>
</form>
<?php $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$fieldToSort = $_POST["field_to_sort"];

	function contains($whole, $subset)
	{
    	return strpos($subset, $whole) === false;
	}


	$columnName;
	if($fieldToSort == "lastname_ascending") {
		$columnName = "title";
		$sortType = "ASC";
	} else if($fieldToSort == "lastname_descending") {
		$columnName = "title";
		$sortType = "DESC";
	} else if($fieldToSort == "location_descending"){
		$columnName = "location";
		$sortType = "DESC";
	} else if($fieldToSort == "location_ascending"){
	 	$columnName = "location";
		$sortType = "ASC";
	} else if($fieldToSort == "specialty_ascending"){
	 	$columnName = "specialties";
		$sortType = "ASC";
	} else if($fieldToSort == "specialty_descending"){
	 	$columnName = "specialties";
		$sortType = "DESC";
	}


	if($columnName === "title") { //title
		$args = array(
			'post_type' => 'directory',
			'posts_per_page' => 4,
			'paged' => $paged,
			'order' => $sortType, //$("directory-sorting)
			'orderby' => $columnName
		);
	} else { //meta_key
		$args = array(
				'post_type' => 'directory',
				'posts_per_page' => 4,
				'paged' => $paged,
				'orderby' => 'meta_value',
				'meta_key' => $columnName, //$("directory-sorting").value()
				'order' => $sortType
			);
	}

	

	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) :?>
	<div id="directory_list">
	<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
			<div class="directory" data-filter="<?php the_title();?>">
				<div class="image"><img src="<?php bloginfo('stylesheet_directory');?>/images/placeholder.jpg"/></div>
				<div class="name"><h2>Name</h2><p><?php the_title();?></p></div>
				<div class="specialty">
					<h3>Specialties</h3>
					<p><?php the_field('specialties');?></p>
				</div>
				<div class="location"><p><?php the_field('location');?></div>
			</div>	
	<?php endwhile; ?></div>
	<?php endif; ?>
	<?php $big = 999999999; // need an unlikely integer

	echo "<div class='section_two_navigation'>";
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $the_query->max_num_pages,
		'next_text'          => __('<span class="dashicons dashicons-arrow-right-alt"></span>'),
		'prev_text'          => __('<span class="dashicons dashicons-arrow-left-alt"></span>'),
	) );
	echo "</div></div>" ;?>

</div>

<script>
jQuery(document).ready(function(){
  jQuery("#search").on("keyup", function() {
    var value = jQuery(this).val().toLowerCase();
    jQuery("#directory_list .directory").filter(function() {
      jQuery(this).toggle(jQuery(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
 <?php get_footer();?>