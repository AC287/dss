jQuery(document).ready(function($) {
  console.log("jquery is running...this is dss-step2.js");
  var originalval;
  $('.step2selection').on('focus', function() {
    /* Source: https://stackoverflow.com/questions/4076770/getting-value-of-select-dropdown-before-change*/
    originalval = this.value;
  }).change(function(){
    /* Source: http://jsfiddle.net/zq2pncuc/*/
    // console.log(originalval);
    if(originalval){
      $(".step2selection").find("option[value='"+originalval+"']").prop("disabled",false);
    }
    $(".step2selection").not($(this)).find("option[value='"+$(this).val()+"']").prop("disabled",true);
    $(".step2selection").find("option[value='']").prop("disabled",false);
  })
});
