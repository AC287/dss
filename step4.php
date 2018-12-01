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

    // $scoreexist = $wpdb->get_results("SELECT * FROM wpii_scoregrid WHERE team LIKE '%$teamname%';");
    // $scoreall = $wpdb->get_results("SELECT * FROM wpii_scoregrid;");

    // if(!$scoreexist[0]->team){
    //   $wpdb->insert(
    //     'wpii_scoregrid',
    //     array('team'=>$teamname),
    //     array('%s')
    //   );
    // }

    $indidata = $wpdb->get_results("SELECT * FROM wpii_indidata WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND team LIKE '%$teamname';");
    $getquestions = $wpdb->get_results("SELECT * FROM wpii_questions;");
    $currteam = $wpdb->get_results("SELECT * FROM wpii_teamdata WHERE team LIKE '%$teamname%';");
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
    <p>At this stage, your teammembers should have completed individual ranking, as well as team ranking.</p>
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
      </thead>
      <tbody>
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

          $step4 = array_sum($indiExpArr);
          $step5 = array_sum($teamExpArr);

          if(!$indidata[0]->step4){
            $wpdb->update(
              'wpii_indidata',
              array(
                'step4'=>$step4,
                'step5'=>$step5,
              ),
              array(
                'firstname'=>$indidata[0]->firstname,
                'lastname'=>$indidata[0]->lastname,
                'team'=>$indidata[0]->team,
              ),
              array(
                '%d','%d'
              ),
              array(
                '%s','%s','%s'
              )
            );
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
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td class='table1-total-x-exp'><strong>Individual Score</strong><br/>(step 4)</td>
          <td class='table1-total-x-exp'><strong>Team Score</strong><br/>(step 5)</td>
        </tr>
      </tbody>
    </table>
  </div>

  <div class='container step4-table2'>
    <h3>Step 6</h3>
    <h4>Calculating the Average Individual Score for <?php echo $teamname;?></h4>
    <p>Please refresh the page if you do not see all your team members. If you see "Confirm Form Resubmission", it is okay to press "Continue".</p>
    <div class='step4-table2-container'>
      <table class="table table-sm table-dark">
        <thead>
          <tr>
          <th scope='col'><h3>Team Members' Names</h3></th>
          <th scope='col' class='table2-head-center'><h3>Individual Score</h3></th>
          </tr>
        </thead>
        <tbody>
          <?php
            $eachteamlist = $wpdb->get_results("SELECT firstname,lastname,step4 FROM wpii_indidata WHERE team LIKE '%$teamname';");
            $teamcounter = 0;
            $teamscoreArr = array();
            foreach ($eachteamlist as $eachteamlist0) {
              $teamcounter++;
              $teamscoreArr[] = $eachteamlist0->step4;
              echo "<tr>";
                echo "<td>";
                echo $eachteamlist0->firstname." ".$eachteamlist0->lastname;
                if($eachteamlist0->firstname == $firstname && $eachteamlist0->lastname == $lastname) {
                  echo " (self)";
                }
                echo "</td>";
                echo "<td class='table2-score'>";
                echo $eachteamlist0->step4;
                echo "</td>";
              echo "</tr>";
            }
            echo "<tr>";
              echo "<td class='table2-tis'>";
                echo "(Total individual score) &divide; (# of team members)";
              echo "</td>";
              echo "<td class='table2-score t2s-avg-num'>";
              echo array_sum($teamscoreArr);
              echo " &divide; ";
              echo $teamcounter;
              echo "</td>";
            echo "</tr>";

            $step6score = round(array_sum($teamscoreArr) / $teamcounter);
            $wpdb->update(
              'wpii_indidata',
              array(
                'individualscore'=>$step6score,
              ),
              array(
                'firstname'=>$indidata[0]->firstname,
                'lastname'=>$indidata[0]->lastname,
                'team'=>$indidata[0]->team,
              ),
              array('%d'),
              array('%s','%s','%s')
            );

            echo "<tr>";
              echo "<td class='table2-tis'>Average Individual Score for Step 6</td>";
              echo "<td class='table2-score t2s-avg-num t2s-step6-finale'>";
                echo $step6score;
              echo "</td>";
            echo "</tr>";
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <div class='container step4-table3'>
    <h3>Scoring Grid</h3>
    <p>Please refresh the page for latest update. If you see "Confirm Form Resubmission", it is okay to press "Continue".</p>
    <div class='step4-table3-container'>
      <table class='table table-sm table-dark'>
        <thead>
          <tr>
            <!-- <th scope='col'>DESCRIPTION \ TEAM LIST</th> -->
            <th scope='col'>DESCRIPTION</th>
            <th scope='col' class='step4-table3-center'>
            <?php
            echo $teamname;
            // foreach($allteam as $allteam0) {
            //   echo "<th scope='col'>".$allteam0->team."</th>";
            // }
            ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              Average Individual Score (Step 6)
            </td>
            <td class='step4-table3-center'>
              <?php echo $step6score?>
            </td>
          </tr>
          <tr>
            <td>
              Team Score (Step 7)
            </td>
            <td class='step4-table3-center'>
              <?php
              echo $step5;  //This is step 7.
              $step7 = $step5;
              ?>
            </td>
          </tr>
          <tr>
            <td>
              Gain (Loss) Score (Step 8)
            </td>
            <td class='step4-table3-center'>
              <?php
                $step8 = $step6score - $step5;
                echo $step8;  //This is step 8.
              ?>
            </td>
          </tr>
          <tr>
            <td>
              Percent Change (Step 9)
            </td>
            <td class='step4-table3-center'>
              <?php
              //This is step 9.
              $step9 = round(($step8 / $step6score) * 100);
              echo $step9;
              echo "&#37;";
              ?>
            </td>
          </tr>
          <tr>
            <td>
              Best Individual Score (Step 10)
            </td>
            <td class='step4-table3-center'>
              <?php echo min($teamscoreArr); ?>
            </td>
          </tr>
          <tr>
            <td>
              Number of members better than Team (Step 11)
            </td>
            <td class='step4-table3-center'>
              <?php
                $minscorecounter = 0;
                for($x=0; $x<count($teamscoreArr); $x++) {
                  if($teamscoreArr[$x] <= $step7) {
                    $minscorecounter ++;
                  }
                }
                echo $minscorecounter;
              ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

<?php get_footer();?>
