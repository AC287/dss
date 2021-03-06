<!--  Template Name: Step 1 -->
<?php
wp_enqueue_script('step1js', get_template_directory_uri().'/js/dss-step1.js', array('jquery'));
get_header();
?>

<?php
  global $wp_query, $wpdb;
  // print_r($_POST);
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $teamname = $_POST['teamname'];

  $userexist = $wpdb->get_results("SELECT * FROM wpii_indidata WHERE firstname LIKE '%$firstname%' AND lastname LIKE '%$lastname%' AND team LIKE '%$teamname';");
  $getquestions = $wpdb->get_results("SELECT * FROM wpii_questions;");
  // print_r($userexist);
  if(!$userexist) {
    // print_r("value exist");
    // $wpdb->query("INSERT INTO wpii_indidata (firstname, lastname, teamname) VALUES ('$firstname', '$lastname','$teamname')");
    $wpdb->insert(
      'wpii_indidata',
      array (
          'firstname' => $firstname,
          'lastname' => $lastname,
          'team'=> $teamname
      ),
      array (
        '%s',
        '%s',
        '%s'
      )
    );
  } else {
    // print_r("user already exist");
  }

?>

<div class="container">
  <h3>Hello <?php echo $firstname;?>, you are with <?php echo $teamname?>.</h3>
  <p>This is the first step of the simulation. </p>
  <div class='form-container'>
  <form action="<?php echo home_url();?>/step1a" method="post" autocomplete="off" id="individualdata">
    <table class="table table-sm table-dark">
      <thead>
        <tr>
          <th scope="col"><h3>Salvaged items</h3></th>
          <th scope="col"><h3>Individual Rank</h3><th>
        </tr>
      </thead>
      <tbody>
    <?php
      // print_r($getquestions);

      for($q=1; $q <=15; $q++) {
        $userentry = "iq".$q;
        $qtitle = "q".$q;
        echo "<tr>";
          echo "<th scope='row'>".$getquestions[0]->$qtitle."</th>";
          echo "<td>";
            echo "<select class='form-control step1selection' required id='iqvalue$q' name='i$qtitle' required>";
            if(!$userexist[0]->$userentry) {
              echo "<option selected value=''> - </option>";
            }else {
              echo "<option value='' disabled> - </option>";
            }
            for($c=1; $c<=15; $c++) {
              if($userexist[0]->$userentry){
                if($userexist[0]->$userentry == $c) {
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
