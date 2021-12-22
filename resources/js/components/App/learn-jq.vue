<template>
<!-- Modal -->
<div class="modal fade" id="learn-jq" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content Theme learn-jq-window">
        <div class="modal-header">
          <h5 class="modal-title heading-color heading-style" >Learning jQuery</h5>
        </div>
        <div class="modal-body">
         <button id="hide" type="button" class="btn btn-primary">Hide</button>
         <button id="show" type="button" class="btn btn-primary">Show</button>
         <button id="fadeto" type="button" class="btn btn-primary">fadeTo</button>
         <button id="slide" type="button" class="btn btn-primary"> annimate </button>
          <p id="p">Success is my only option</p>
          <p>Success is my only option</p>

        </div>
        <div id="flip">Click to slide down panel</div>
        <div id="panel">Sliders</div>
        <div id="diva" style="background:#98bf21;height:100px;width:100px;position:absolute;"></div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Understood</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
  },
    mounted() {
    $('#learn-jq').modal('show');

    $(document).ready(function(){
     $("#hide").click(function(){
         $("p").fadeOut('slow');
     });
     $("#show").click(function(){
         $("p").fadeIn('slow');
     });
     $("#fadeto").click(function(){
    $("#p").fadeTo("slow", 0.15);
    });
   $("#slide").click(function(){
        var div = $("#diva");
        div.animate({height: '300px', opacity: '0.4'}, "slow");
        div.animate({width: '300px', opacity: '0.8'}, "slow");
        div.animate({height: '100px', opacity: '0.4'}, "slow");
        div.animate({width: '100px', opacity: '0.8'}, "slow");
   });
    });

    },
}
</script>

<style >
#panel, #flip {
    padding: 5px;
    text-align: center;
    background-color: #e5eecc;
    border: solid 1px #c3c3c3;
}

#panel {
    padding: 50px;
}
</style>
