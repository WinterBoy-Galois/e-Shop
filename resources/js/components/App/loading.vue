<template>
<div class="modal main fade" id="loader" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="main m-0" >
         <div class="row ">
             <div class="col-12 logo-pos-center">
                 <img id="e-shop-logo" src="/Images/e-shop.png" class="img-fluid" alt="" srcset="">
             </div>
         </div>
         <div class="load-circle"></div>
         <ul>
            <li>E</li>
            <li>-</li>
            <li>S</li>
            <li>H</li>
            <li>O</li>
            <li>P</li>
        </ul>    
  </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            loaded: localStorage.getItem("loaded") ? localStorage.getItem("loaded") : 0,
        }
    },
    methods: {
        hideLoader(){
            $("#loader").hide();
            $('#loader').modal('hide');
        }
    },
    mounted() {
        /**
         * Check if the application
         * is loading for the first time
         * 
        */
        if (this.loaded==0) {
        $('#loader').modal('show');
            /**
             *Hide Loading annimation
             *after five seconds
            */
           setTimeout(() => {
               //set loaded to true/1
               localStorage.setItem("loaded", 1);
               this.hideLoader();
               //reset loaded after 1 hour
               setTimeout(() => {
                   localStorage.setItem("loaded", 0);
               }, 3600000);
           }, 10000);
        }
    },
}
</script>

<style scoped>
/*center logo*/
.logo-pos-center{
    position: absolute;
    top: calc(25% - 24px);
    left: calc(50% - 66px);
}
/*e-shop logo*/
#e-shop-logo{
   height: 100px;
   width: 100px;
}
   .main{
        background-color:rgba(0, 0, 0, 0.4);
        margin: 0px;
        padding: 0px;
        height: 100vh;
   }
   .load-circle{
    position: absolute;
    top: calc(25% - 24px);
    left: calc(50% - 54px);
    transform: translate(-50%,-50%);
    width: 100px;
    height: 100px;
    border: 4px solid transparent;
    border-bottom: 4px solid #fff958;
    border-top: 4px solid #b858ff;
    border-radius: 50%;
    animation: animate-circ 2s linear infinite;
    
   }
   .load-circle::before{
       content: '';
       position: absolute;
       top: 10px;
       left: 10px;
       bottom:10px;
       right: 10px;
       border: 4px solid transparent;
       border-bottom: 4px solid #e74c3c;
       border-top: 4px solid #3ce7d8;
       border-radius: 50%;
       animation: animate-circ 2s linear infinite;
   }
      .load-circle::after{
       content: '';
       position: absolute;
       top: 24px;
       left: 24px;
       bottom: 24px;
       right: 24px;
       border: 4px solid transparent;
       border-bottom: 4px solid #39ff8d;
       border-top: 4px solid #ff67ad;
       border-radius: 50%;
       animation: animate-circ 4s linear infinite;
   }
   @keyframes animate-circ {
       0%{
           transform: rotate(0deg);
       }
       100%{
           transform: rotate(360deg);
       }
   }
    ul{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-50%);
        margin: 0 ;
        padding: 0;
        display: flex;
    }
    ul li{
        list-style: none;
        font-family: 'Times New Roman', Times, serif;
        font-size: 5em;
        letter-spacing: 15px;
        color:#484848;
        text-shadow: none;
        animation: animate 1s infinite linear;

    }

    @keyframes animate{
        0%{
         transform: rotate(0deg);

        }
        100%{
         transform: rotate(360deg);

        }
    }
    @keyframes animate{
        0%{
           color:#484848;
           text-shadow: none;

        }
        18%{
           color:#484848;
           text-shadow: none;
           
        }
        20%{
           color:#484848;
           text-shadow: none;
           
        }
        20%{
           color:#fff900;
           text-shadow: 0 0 7px #fff900, 0 0 20px #ff6c00;
           
        }
        30%{
           color:#484848;
           text-shadow: none;

        }
        35%{
           color:#fff900;
           text-shadow: 0 0 7px #fff900, 0 0 20px #ff6c00;
           
        }
        70%{
           color:#484848;
           text-shadow: none;

        }
        85%{
           color:#fff900;
           text-shadow: 0 0 7px #fff900, 0 0 20px #ff6c00;
           
        }
        90%{
           color:#484848;
           text-shadow: none;

        }
        100%{
           color:#484848;
           text-shadow: none;

        }

    }
    ul li:nth-child(1){
        animation-delay: .2s;
    }

    ul li:nth-child(2){
        animation-delay: .2s;
    }
    ul li:nth-child(3){
        animation-delay: .4s;
    }
    ul li:nth-child(4){
        animation-delay: .6s;
    }
    ul li:nth-child(5){
        animation-delay: .8s;
    }
    ul li:nth-child(6){
        animation-delay: .10s;
    }
</style>
