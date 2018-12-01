jQuery(document).ready(function($) {
  // console.log("jquery is running...this is dss-step4.js");
  var indExpTotal = 0;
  var teamExpTotal = 0;
  $('.t1-each-ind-exp').each(function(){
    console.log($(this));
    indExpTotal += Number($(this).html());
  });

  $('.t1-each-team-exp').each(function(){
    teamExpTotal += Number($(this).html());
  });

  $(".t1-total-ind-exp").html(indExpTotal);
  $(".t1-total-team-exp").html(teamExpTotal);

});
