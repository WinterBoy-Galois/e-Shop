<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
           <div class="col-sm-12">
             <div class="card Theme-two payment-page">
               <h5 class="card-header heading-color heading-style text-center">Complete Payment</h5>
               <div class="card-body">
                 <div id="addressbar" v-show="addressBarDisplayState==1" class="row justify-content-center">
                   <div class="col-sm-10">
                     <div class="card Theme">
                       <h5 class="card-header heading-color heading-style text-center">Details </h5>
                       <div class="card-body">
                        <form @submit.prevent="saveCustomerAdress()">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="name" class="link-color">Name</label>
                              <input v-model="profileDetails.name" type="text" class="form-control disabled" disabled>
                            </div>
                            <div class="form-group col-md-6">
                              <label for="email" class="link-color">Email</label>
                              <input v-model="profileDetails.email" type="email" class="form-control disabled" disabled>
                            </div>
                          </div>
                          <div class="form-group">
                            <label for="Address" class="link-color">Address</label>
                            <input name="address" v-model="customerAddress.Address" type="text" class="form-control" placeholder="1234 Main St">
                          </div>
                          <div class="form-group">
                            <label for="Address2" class="link-color">Address 2</label>
                            <input name="adress2" v-model="customerAddress.Address_2" type="text" class="form-control"  placeholder="Apartment, studio, or floor">
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label for="City" class="link-color">City</label>
                              <input name="city" v-model="customerAddress.City" type="text" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="State" class="link-color">State</label>
                              <select name="state" v-model="customerAddress.State" id="inputState" class="form-control">
                                <option selected>Choose...</option>
                                <option value="Kenya" >Kenya</option>
                              </select>
                            </div>
                            <div class="form-group col-md-2">
                              <label for="Zip" class="link-color">Zip</label>
                              <input v-model="customerAddress.Zip" type="text" class="form-control" id="inputZip">
                            </div>
                          </div>
                          <div class="form-group">
                          </div>
                          <button type="submit" class="btn btn-primary">Save Details</button>
                        </form>
                       </div>
                     </div>
                   </div>
                 </div>
                 <div class="row justify-content-center mt-1">
                   <div class="col-sm-10">
                     <div class="card Theme">
                        <h5 class="card-header heading-color heading-style text-center">Payment Method</h5>
                       <div class="card-body">
                        <div class="col-md-12">
                            <div class="card Theme">
                               <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                      <li class="nav-item mr-5"><a href="#paypal" class="nav-link heading-color link-color payment-method-link-color active show" data-toggle="tab">Pay With <i class="fab fa-paypal" aria-hidden="true"></i>yPal </a></li>
                                      <li class="nav-item"><a href="#stripe" class="nav-link heading-color link-color payment-method-link-color " data-toggle="tab">Pay With Stripe</a></li>
                                    </ul>
                               </div>
                               <!-- /.card-header -->
                               <div class="card-body">
                                 <div class="tab-content">
                                   <!-- Paypal Tab -->
                                   <div class="tab-pane active show" id="paypal">
                                  <div class="flex-center position-ref full-height">
                                        <div id="pay-pal"></div>
                                  </div>
                                   </div>
                                   <!-- Sripe Tab -->
                                   <div class="tab-pane " id="stripe">
                                     <div class='row justify-content-start'>
                                       <div class='col-sm-12'>
                                         <form @submit.prevent="payWithStripe()" class="form-horizontal" id="payment-form" role="form"  >
                                           <div class='form-row justify-content-center'>
                                             <div class='col-sm-6 form-group card Theme required'>
                                               <label class='control-label link-color text-center'>Card Number</label>
                                               <input v-model="stripePaymentDetails.cardNumber" autocomplete='off' class='form-control card-number'  type='text' name="card_no">
                                             </div>
                                           </div>
                                           <div class='form-row'>
                                            <div class='col-xs-4 col-sm-4 form-group cvc required'>
                                              <label class='control-label link-color'>CVV</label>
                                              <input v-model="stripePaymentDetails.cvv" autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvvNumber">
                                            </div>
                                            <div class='col-xs-4 col-sm-4 form-group expiration required'>
                                              <label class='control-label link-color'>Expiration</label>
                                              <input v-model="stripePaymentDetails.monthExpiry" class='form-control card-expiry-month' placeholder='MM' size='4' type='text' name="ccExpiryMonth">
                                            </div>
                                            <div class='col-xs-4 col-sm-4 form-group expiration required'>
                                             <label class='control-label link-color'> Year </label>
                                             <input v-model="stripePaymentDetails.yearExpiry" class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="ccExpiryYear">
                                             <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='hidden' name="amount" value="300">
                                            </div>
                                           </div>
                                           <div class='form-row justify-content-center'>
                                            <div class='col-sm-6' style="margin-left:-10px;">
                                             <button type="submit" class='form-control total btn btn-primary' >
                                               Pay Now<span class='amount'> ( <sup><i class="fas fa-dollar-sign    "></i></sup> {{cartProducts.totalPrice}} ) </span>
                                             </button>
                                            </div>
                                           </div>
                                         </form>
                                       </div>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                            </div>
                        </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
        </div>
 <!--Payment success message-->
<div class="modal fade mt-5" id="pay-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-success">
      <div class="modal-body bg-success">
        <div class="alert" role="alert">
         <p class=" pay-success-text text-white">Your payment was completed successfully</p>
         </div>
      </div>
    </div>
  </div>
</div>
<payloadspinner></payloadspinner>
    </div>
</template>
<script>
 import payloadspinner from '../App/spinner'
export default {
components:{
  payloadspinner,
},
  data() {
    return {
      profileDetails: [],
      cartProducts: [],
      customerAddress:{
        Address: '',
        Address_2: '',
        City: '',
        State: '',
        Zip:''
      },
      addressBarDisplayState: 1,
      stripePaymentDetails: {
        cardNumber: '',
        cvv:'',
        monthExpiry: '',
        yearExpiry: ''
      },
      totalPrice: ''

    }
  },
  methods: {
    /**
     * Get Buyer details
    */
    async getProfileDetails(){
      try {
        const res = await this.callApi('get','getprofiledetails');
        this.profileDetails = res.data;
        console.log(this.profileDetails);
      } catch (error) {
        console.log(error);
      }

    },
    //get Selected Products info
    async getSelectedProducts(){
           try {
               const res = await this.callApi('get','getcartproducts');
               this.cartProducts = res.data;
               return res.data;
           } catch (error) {
               console.log(error);
           }

    },
    //save Customer address
     saveCustomerAdress(){
           try {
               this.$swal({
                 title: 'Confirm Your Details',
                  text: 'Adress: ' + this.customerAddress.address + ' Adress 2: ' + this.customerAddress.address2 + 'City:  ' + this.customerAddress.city + ' State: ' + this.customerAddress.state + ' Zip: ' + this.customerAddress.zip,
                 icon: 'warning',
                 showCancelButton: true,
                 confirmButtonColor: '#3085d6',
                 cancelButtonCoolor: '#d33',
                 cancelButtonText: 'Edit Details',
                 confirmButtonText: 'Details are Correct'
               }).then((result) => {
                  this.saveAdress(result);
               })

           } catch (error) {
               console.log(error);
           }
          //Hide Adress Form if Buyer adress is saved
    },
    //save customer adress
     async saveAdress(result){
        if (result.value) {
            const res = await this.callApi('post','address',this.customerAddress);
            if (res.status==200) {
              this.$global.hideAdressBar();
              this.$swal({
                position: 'top-end',
                icon: 'success',
                title: 'Your Adress has been saved',
                showConfirmButton: false,
                timer: 1500
              })
            }
            else{
              this.feedbackMessages.errorMsg('Saving Your Adress Failed!');
            }
        }
     },
     displayAdressBar(){
       localStorage.setItem('hideAressForm',0);
     },
     getAdressBarDisplayState(){
       this.addressBarDisplayState =  Number(this.$global.getAdressBarDisplayState());
     },
     //stripe payment
     payWithStripe(){
      this.$swal({
        title: 'Confirm Your Details',
         text: 'Card Number: ' + this.stripePaymentDetails.cardNumber + ' CVV: ' + this.stripePaymentDetails.cvv + ' Month Expiry:  ' + this.stripePaymentDetails.monthExpiry + ' Year Expiry: ' + this.stripePaymentDetails.yearExpiry,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonCoolor: '#d33',
        cancelButtonText: 'Edit Details',
        confirmButtonText: 'Details are Correct'
      }).then((result) => {
         this.executeStripePayment(result);
      })
     },
     //execute Stripe Payment
     async executeStripePayment(result){
        if (result.value) {
            const res = await this.callApi('post','stripepayment',this.stripePaymentDetails);
            if (res.status==200) {
              this.$global.hideAdressBar();
              this.$swal({
                position: 'top-end',
                icon: 'success',
                title: 'Payment Successfull',
                showConfirmButton: false,
                timer: 1500
              })
              this.$global.resetAdressBarDisplayState();
            }
            else{
              this.feedbackMessages.errorMsg('Payment Failed!');
            }
        }
     },//Get Customer Default Adress
     async getDefaultAdress(){
        const res = await this.callApi('get','defaultadress');
        this.customerAddress = res.data;
     },

 //control payment
 managePayment(){
   try {
      axios.get('getcartproducts')
     .then((res)=>{
     localStorage.setItem("totalPrice",res.data.totalPrice);
 })
   } catch (error) {
     console.log(error);
   }

  try {
     this.$global.resetAdressBarDisplayState();
     window.price = toString(this.totalPrice);
     paypal.Buttons({
    createOrder (data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: localStorage.totalPrice
          }
        }]
      });
    },
    onApprove (data, actions) {
        $('#spinner').modal('show');
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        $('#spinner').modal('hide');
        $('#pay-success').modal('show');
          setTimeout(() => {
         $('#pay-success').modal('hide');
         window.location.assign('/');
       }, 2000);
        // This function shows a transaction success message to your buyer.
      axios.post('paypalpayment',details)
      .then(()=>{
      })
      });
    }
    }).render('#pay-pal');
  } catch (error) {
    console.log(error);
  }

 },
 paymentSuccess(){
    this.$swal({
      position: 'top-end',
      icon: 'success',
      title: 'Your work has been saved',
      showConfirmButton: false,
      timer: 1500
    })
 },
 //get the default address
   getDefaultAdress(){
     try{
        axios.get('getdefaultadress')
       .then((response)=>{
         if(response.data!=-1){
           this.customerAddress = response.data;
         }
       })
     }
     catch(error){
      console.log(error);
     }
   }
  },
  mounted() {
    this.getProfileDetails();
    this.getSelectedProducts();
    this.getAdressBarDisplayState();
    this.getDefaultAdress();
    this.managePayment();
    if (this.getAdressBarDisplayState() == 0) {
      window.location.reload();
    }
   this.getDefaultAdress();
  },
}
</script>

<style>
    .payment-page{
        min-height: 90vh;

    }
    .payment-method-link-color{
        font-size: 20px;
    }
    .pay-success-text{
      font-family: 'Times New Roman', Times, serif;
      font-size: 36px;
      font-weight: 100;
    }
</style>
