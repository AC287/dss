jQuery(document).ready(function($) {
  // console.log("jquery is running...");
  var originalval;
  $('.step1selection').on('focus', function() {
    /* Source: https://stackoverflow.com/questions/4076770/getting-value-of-select-dropdown-before-change*/
    originalval = this.value;
  }).change(function(){
    /* Source: http://jsfiddle.net/zq2pncuc/*/
    // console.log(originalval);
    if(originalval){
      $(".step1selection").find("option[value='"+originalval+"']").prop("disabled",false);
    }
    $(".step1selection").not($(this)).find("option[value='"+$(this).val()+"']").prop("disabled",true);
    $(".step1selection").find("option[value='']").prop("disabled",false);
  })
});
