<!--  Template Name: Step 4  -->

<?php
// wp_enqueue_script('step4js',get_template_directory_uri().'/js/dss-step4.js',array('jquery'));
get_header();
?>
  <?php
    global $wp_query, $wbdb;
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $teamname = $_POST['teamname'];

    $indidata = $wpdb->get_results("SELECT * FROM wpii_indidata WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND team LIKE '%$teamname';");
    $getquestions = $wpdb->get_results("SELECT * FROM wpii_questions;");
    $currteam = $wpdb->get_results("SELECT * FROM wpii_teamdata WHERE team LIKE '%$teamname';");
    $allteam = $wpdb->get_results("SELECT * FROM wpii_teamdata;");
    $expertrank = array();

    $expertrank[q1] = 4;
    $expertrank[q2] = 6;
    $expertrank[q3] = 12;
    $expertrank[q4] = 7;
    $expertrank[q5] = 11;
    $expertrank[q6] = 10;
    $expertrank[q7] = 8;
    $expertrank[q8] = 5;
    $expertrank[q9] = 15;
    $expertrank[q10] = 3;
    $expertrank[q11] = 13;
    $expertrank[q12] = 9;
    $expertrank[q13] = 14;
    $expertrank[q14] = 2;
    $expertrank[q15] = 1;


  ?>
  <div class="container">
    <h3>Hello <?php echo $firstname;?>, you are with <?php echo $teamname?>.</h3>
  </div>
  <div class="container step4-table1">
    <table class="table table-sm">
      <thead>
        <tr>
          <th scope="col"><h3>Salvaged items</h3></th>
          <th class='table1-data' scope="col"><h3>Individual Rank</h3></th>
          <th class='table1-data' scope="col"><h3>Team Rank</h3></th>
          <th class='table1-data' scope="col"><h3>Expert Rank</h3></th>
          <th class='table1-data' scope="col"><h4>Individual-Expert</h4></th>
          <th class='table1-data' scope="col"><h4>Team-Expert</h4></th>
        </tr>
        <?php
        $indiExpArr = array();
        $teamExpArr = array();
        for($q=1; $q <= 15; $q++) {
          // print_r($getquestions);
          $tempvarQ = 'q'.$q;
          $questions = $getquestions[0]->$tempvarQ;

          $tempvarI = 'iq'.$q;
          $indidata0 = $indidata[0]->$tempvarI;
          // print_r($indidata0);
          $tempvarT = 'tq'.$q;
          $teamdata0 = $currteam[0]->$tempvarT;
          $expertrank0 = $expertrank[$tempvarQ];

          $tempIndiExp = abs($indidata0 - $expertrank0);
          $indiExpArr[] = $tempIndiExp;

          $tempTeamExp = abs($teamdata0 - $expertrank0);
          $teamExpArr[] = $tempTeamExp;

          echo "<tr>";
          echo "<td><strong>".$questions."</strong></td>";
          echo "<td class='table1-data'>".$indidata0."</td>";
          echo "<td class='table1-data'>".$teamdata0."</td>";
          echo "<td class='table1-data'>".$expertrank0."</td>";
          echo "<td class='table1-data t1-each-ind-exp'>".$tempIndiExp."</td>";
          echo "<td class='table1-data t1-each-team-exp'>".$tempTeamExp."</td>";
          echo "</tr>";
          }
        ?>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td class='table1-data'><strong>TOTAL</strong></td>
          <td class='table1-data'><span class='t1-total-ind-exp'><?php echo array_sum($indiExpArr)?></span></td>
          <td class='table1-data'><span class='t1-total-team-exp'><?php echo array_sum($teamExpArr)?></span></td>
        </tr>
      </thead>
    </table>
  </div>

<?php get_footer();?>
