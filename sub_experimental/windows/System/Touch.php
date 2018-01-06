<script type="text/javascript">
  $(document).ready(function(){
    touch_events();
  });
  
  function touch_events(){
    if(Modernizr.touchevents){
      $(".touch_element").show();
    }else{
      $(".touch_element").hide();
    }
  }
</script>