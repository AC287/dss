<!--  Template Name: Step 1a -->
<?php get_header();?>

<?php
  global $wp_query, $wpdb;
  // print_r($_POST);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $teamname = $_POST['teamname'];
  $iq = array();
  for($q=1; $q<=15; $q++) {
    $questionarr = "q".$q;
    $iqpostvar = "iq".$q;
    $iq[$questionarr] = $_POST[$iqpostvar];
  }

  print_r($iq);
?>



<?php get_footer();?>
