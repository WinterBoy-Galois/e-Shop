<template>
 <div class="card Theme-two ml-1 pl-1 customer-profile-pages">
  <div class="card-header customer-profile-bg-color text-center">
      <h4 class="heading-color heading-style">e-shop credit</h4>
  </div>
  <div class="row mt-1 m-0 justify-content-center mt-5">
      <div class="col-sm-9 ">
        <div class="card Theme">
          <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div  class="offset-sm-3 profile-credit-logo text-center">
                            <i class="fa fa-credit-card mt-5 text-primary" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                         <div class="card-text text-center text-info profile-credit-info">
                             <p>You Currently have no e-shop credit available</p>
                         </div>
                         <div class="card-text text-center text-success profile-credit-info">
                             <p>All Your available e-shop credit and coupuns will be displayed here</p>
                         </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                         <div class="card-text text-center text-success profile-credit-info">
                             <a href="/shop" class="btn btn-secondary text-warning col-sm-7"> <i class="fa mr-2 fa-shopping-basket" aria-hidden="true"></i> Continue Shopping </a>
                         </div>
                    </div>
                </div>
          </div>
        </div>
      </div>
  </div>
 </div>  
</template>

<script>
export default {
    data() {
        return {
            current: false,
            showAccOverView: false
        }
    },
}
</script>

<style>
    .profile-credit-logo{
        height: 100px;
        width: 100px;
        border-radius: 100%;
        background-color: rgb(86, 214, 214);
        font-size: 22px;
    }
    .profile-credit-info{
         font-size: 18px;
         font-family: 'Times New Roman', Times, serif;
    }
</style>