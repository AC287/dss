jQuery(document).ready(function($) {
  console.log("jquery is running...this is dss-step2a.js");
  $("#step4").click(function(event) {
    //This is individual
    event.preventDefault();
    var teampass = prompt("Enter passcode to access individual score result. Please see Ian Howe for passcode.", "");
    console.log(teampass);
    if(teampass == "42") {
      $("#step4data").submit();
    } else {
      var tryagain = alert("Please try again.");
    }
  })
});
