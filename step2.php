<!--  Template Name: Step 2 -->
<?php
wp_enqueue_script('step2js', get_template_directory_uri().'/js/dss-step2.js', array('jquery'));
get_header();
?>

<?php
  global $wp_query, $wpdb;
  // print_r($_POST);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $teamname = $_POST['teamname'];

  $teamexist = $wpdb->get_results("SELECT * FROM wpii_teamdata WHERE team LIKE '%$teamname';");
  $getquestions = $wpdb->get_results("SELECT * FROM wpii_questions;");
  // print_r($userexist);

?>

<div class="container">
  <h3>Hello <?php echo $teamname;?> members.</h3>
  <p>This is where you will be collaborating with your fellow teammembers to enter ranking. </p>
  <div class='form-container'>
  <form action="<?php echo home_url();?>/step2a" method="post" autocomplete="off" id="individualdata">
    <table class="table table-sm table-dark">
      <thead>
        <tr>
          <th scope="col"><h3>Salvaged items</h3></th>
          <th scope="col"><h3>Team Rank</h3></th>
        </tr>
      </thead>
      <tbody>
    <?php
      // print_r($getquestions);

      for($q=1; $q <=15; $q++) {
        $teamentry = "tq".$q;
        $qtitle = "q".$q;
        echo "<tr>";
          echo "<th scope='row'>".$getquestions[0]->$qtitle."</th>";
          echo "<td>";
            echo "<select class='form-control step2selection' required id='iqvalue$q' name='t$qtitle' required>";
            if(!$teamexist[0]->$teamentry) {
              echo "<option selected value=''> - </option>";
            } else {
              echo "<option value='' disabled> - </option>";
            }
            for($c=1; $c<=15; $c++) {
              if($teamexist[0]->$teamentry){
                if($teamexist[0]->$teamentry == $c) {
                  echo "<option value='$c' selected>$c</option>";
                } else {
                  echo "<option value='$c' disabled>$c</option>";
                }
              } else {
                echo "<option value='$c'>$c</option>";
              }
            }
            echo "</select>";
          echo "</td>";
        echo "</tr>";
      }
    ?>
    </tbody>
    </table>
    <input type="hidden" name="firstname" value="<?php echo $firstname?>">
    <input type="hidden" name="lastname" value="<?php echo $lastname?>">
    <input type="hidden" name="teamname" value="<?php echo $teamname?>">
    <div class="form-group formbutton">
      <button type="submit" class="btn btn-primary btn-lg">Next</button>
    </div>
  </form>
  </div>  <!--  end form-container  -->

</div>


<?php get_footer();?>
