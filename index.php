<?php get_header();?>

<div class="container">
  <form action="<?php echo home_url();?>/step1" method="post" autocomplete="off" id="initialstep">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" class="form-control" id="firstname" placeholder="Enter your first name." name="firstname" required>
    </div>
    <div class="form-group">
      <label for="lastname">Last Name</label>
      <input type="text" class="form-control" id="lastname" placeholder="Enter your last name." name="lastname" required>
    </div>
    <div class="form-group">
      <label for="teamname">Team Name</label>
      <select class="form-control" required id="teamname" name="teamname" required>
        <option selected value=""=>Choose your team...</option>
        <option value="Team Alpha">Team Alpha</option>
        <option value="Team Bravo">Team Bravo</option>
        <option value="Team Charlie">Team Charlie</option>
        <option value="Team Delta">Team Delta</option>
      </select>
    </div>
    <div class="form-group formbutton">
      <button type="submit" class="btn btn-primary btn-lg">Next</button>
    </div>
  </form>
</div>

<?php get_footer();?>
