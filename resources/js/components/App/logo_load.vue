<template>
  <div class="main m-0" >
         <ul>
            <li>E</li>
            <li>-</li>
            <li>S</li>
            <li>H</li>
            <li>O</li>
            <li>P</li>
        </ul>
  </div>
</template>

<script>
export default {
    mounted() {
        $('#load-app').modal('show');
    },
}
</script>

<style scoped>
   .main{
        background-color:#242323 ;
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
        font-size: 2em;
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
