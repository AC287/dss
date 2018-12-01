<!--  Template Name: Step 2a -->
<?php
wp_enqueue_script('step1ajs', get_template_directory_uri().'/js/dss-step1a.js', array('jquery'));
get_header();
?>

<?php
  global $wp_query, $wpdb;
  // print_r($_POST);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $teamname = $_POST['teamname'];
  $tq = array();
  for($q=1; $q<=15; $q++) {
    $questionarr = "q".$q;
    $tqpostvar = "tq".$q;
    $tq[$questionarr] = $_POST[$tqpostvar];
  }
  $rankexist = $wpdb->get_results("SELECT * FROM wpii_teamdata WHERE team LIKE '%$teamname';");
  // print_r($rankexist[0]->tq1);
  // print_r($tq);
  if(!$rankexist) {
    // print_r("updating");
    $wpdb->insert(
      'wpii_teamdata',
      array (
          'team' => $teamname,
          'tq1' => $tq[q1],
          'tq2' => $tq[q2],
          'tq3' => $tq[q3],
          'tq4' => $tq[q4],
          'tq5' => $tq[q5],
          'tq6' => $tq[q6],
          'tq7' => $tq[q7],
          'tq8' => $tq[q8],
          'tq9' => $tq[q9],
          'tq10' => $tq[q10],
          'tq11' => $tq[q11],
          'tq12' => $tq[q12],
          'tq13' => $tq[q13],
          'tq14' => $tq[q14],
          'tq15' => $tq[q15],
      ),
      array(
        '%s','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d'
      )
    );
  } else {
    // print_r("user already exist");
    // print_r("data already exist");
  }
?>

<div class="container">
  <div class="row step2a">
    <form action="<?php echo home_url();?>/step4" method="post" id="step4data">
    <input type="hidden" name="firstname" value="<?php echo $firstname?>">
    <input type="hidden" name="lastname" value="<?php echo $lastname?>">
    <input type="hidden" name="teamname" value="<?php echo $teamname?>">
    <button type="submit" class="btn btn-primary btn-lg" id="step4" >Individual Score Result</button>
    </form>
  </div>
</div>



<?php get_footer();?>
