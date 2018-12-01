<!--  Template Name: Step 1a -->
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
  $iq = array();
  for($q=1; $q<=15; $q++) {
    $questionarr = "q".$q;
    $iqpostvar = "iq".$q;
    $iq[$questionarr] = $_POST[$iqpostvar];
  }
  $rankexist = $wpdb->get_results("SELECT * FROM wpii_indidata WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND team LIKE '%$teamname';");
  // print_r($rankexist[0]->iq1);
  // print_r($iq);
  if($rankexist[0]->iq1=="" || $rankexist[0]->iq1==NULL) {
    // print_r("updating");
    $wpdb->update(
      'wpii_indidata',
      array (
          'iq1' => $iq[q1],
          'iq2' => $iq[q2],
          'iq3' => $iq[q3],
          'iq4' => $iq[q4],
          'iq5' => $iq[q5],
          'iq6' => $iq[q6],
          'iq7' => $iq[q7],
          'iq8' => $iq[q8],
          'iq9' => $iq[q9],
          'iq10' => $iq[q10],
          'iq11' => $iq[q11],
          'iq12' => $iq[q12],
          'iq13' => $iq[q13],
          'iq14' => $iq[q14],
          'iq15' => $iq[q15],
      ),
      array(
        'firstname' => $rankexist[0]->firstname,
        'lastname' => $rankexist[0]->lastname,
        'team' => $rankexist[0]->team
      ),
      array(
        '%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d','%d'
      ),
      array(
        '%s','%s','%s'
      )
    );
  } else {
    // print_r("user already exist");
    // print_r("data already exist");
  }
?>

<div class="container">
  <div class="row step1a">
    <form action="<?php echo home_url();?>/step4" method="post" id="step4data">
    <input type="hidden" name="firstname" value="<?php echo $firstname?>">
    <input type="hidden" name="lastname" value="<?php echo $lastname?>">
    <input type="hidden" name="teamname" value="<?php echo $teamname?>">
    <button type="submit" class="btn btn-primary btn-lg" id="step4" >Individual Score Result</button>
    </form>
    <form action="<?php echo home_url();?>/step2" method="post" id="step2data">
    <input type="hidden" name="firstname" value="<?php echo $firstname?>">
    <input type="hidden" name="lastname" value="<?php echo $lastname?>">
    <input type="hidden" name="teamname" value="<?php echo $teamname?>">
    <button type="submit" class="btn btn-danger btn-lg" id="step2" >To Team Ranking</button>
    </form>
  </div>
  </form>
</div>



<?php get_footer();?>
