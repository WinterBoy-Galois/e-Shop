<template>
 <div class="card Theme-two ml-1 pl-1 customer-profile-pages">
  <div class="card-header customer-profile-bg-color text-center">
      <h4 class="heading-color heading-style">Account Overview</h4>
  </div>
  <div class="row mt-1 m-0 justify-content-center">
      <div class="col " >
        <div class="card customer-profile-bg-color">
          <div class="card-header ">
            <div class="row justify-content-center">
                <div class="col-sm-6 heading-color">
                    Account Details
                </div>
               <button @click="launchEditModal('editAcount')" class="col-sm-5 btn btn-success"> <i class="fas fa-edit    "></i> Edit </button>
            </div>
          </div>
          <div class="card-body">
            <p class="card-text text-white"> {{profileDetails.name}} </p>
            <p class="card-text text-white"> {{profileDetails.email}} </p>
           
          </div>
        </div>
      </div>
      <div class="col ">
        <div class="card customer-profile-bg-color">
                <div class="card-header heading-color">
                  e-shop Pay balance 
                </div>
          <div class="card-body">
            <p class="card-text text-white"> <i class="fa fa-balance-scale" aria-hidden="true"></i> <sup><i class="fas fa-dollar-sign mr-2"></i></sup> 0.00 </p>
          </div>                             
        </div>
      </div>
      <div class="col ">
        <div class="card customer-profile-bg-color">
          <div class="card-header ">
            <div class="row justify-content-center">
                <div class="col-sm-7 heading-color">
                   Newsletter 
                </div>
               <div class="col-sm-5 btn btn-success"> <i class="fas fa-edit    "></i> Edit </div>
            </div>
          </div>
          <div class="card-body">
           <div class="form-check">
             <input v-on:change="manageSubscription('subscribe')" class="form-check-input" type="radio" name="subscription"  value="daily">
             <label class="form-check-label link-color" for="daily">
               Daily NewsLetter
             </label>
           </div>
           <div class="form-check">
             <input v-on:change="manageSubscription('unsubscribed')" class="form-check-input" type="radio" name="subscription"  value="weekly">
             <label class="form-check-label text-danger" for="weekly">
               Unsubscribe Daily Newsleter
             </label>
           </div>
          </div>
        </div>  
      </div>
  </div>
   
   <!--address book-->
  <div class="row mt-2 m-0 justify-content-center">
      <div  class="col-sm-12 ">
        <div  class="card customer-profile-bg-color">
          <div class="card-header ">
            <div class="row justify-content-center">
                <div class="col-sm-6 heading-color">
                    <i class="fa fa-address-book" aria-hidden="true"></i> Address Book
                </div>
            </div>
          </div>
          <div class="card-body">
            <div class="card Theme">
              <div class='row justify-content-start' >
                <div v-show="adresses.length==0" class="col-sm-12">
                  <div class="row justify-content-center">
                      <div class="col-sm-12">
                           <div class="card-text text-center text-info profile-credit-info">
                               <p>You Currently have no Addresses available</p>
                           </div>
                           <div class="card-text text-center text-success profile-credit-info">
                               <p>
                                 All Your order Adresses will be displayed here.
                                 You will Create Your adresses During Order
                                 </p>
           
                           </div>
                      </div>
                  </div>
                </div>
                <div v-show="adresses.length>0" class='col-sm-12'  v-for="(adress, index) in adresses" :key="index" :id="adress.id">
                  <div class="card-header row justify-content-start"> 
                    <h3 class="heading-color heading-style col-sm-6">Adress {{adress.id}} </h3> 
                    <button @click="launchEditModal('editAdress',adress)" class="col-sm-3 btn btn-success col-sm-4"> <i class="fas fa-edit    "></i> Edit </button>
                    <div class="form-check col-sm-3">
                      <input @change="makeAdressDefault(adress)" class="form-check-input" type="radio" name="type"  :value="adresses.default" >
                      <label class="form-check-label text-primary" >
                        Make This Adress Default
                      </label>
                    </div>
                   </div>
                 <table class="table table-hover table-dark">
                   <tbody>
                     <tr>
                       <th scope="row">Adress</th>
                       <td> {{adress.Address}} </td>
                     </tr>
                     <tr>
                       <th scope="row">Adress 2</th>
                       <td> {{adress.Address_2}} </td>
                     </tr>
                     <tr>
                       <th scope="row">City</th>
                       <td> {{adress.City}} </td>
                     </tr>
                     <tr>
                       <th scope="row">State</th>
                       <td> {{adress.State}} </td>
                     </tr> 
                     <tr>
                       <th scope="row">Zip</th>
                       <td> {{adress.Zip}} </td>
                     </tr>                            
                   </tbody>
                 </table>
                </div>
              </div>
            </div>
          </div>
        </div> 
      </div>
  </div>

       <!--Edit Modal -->
     <div  class="modal fade editModal" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header Theme">
             <h5 class="modal-title heading-color heading-style"> {{acc_editmode? 'Edit Account Details' : 'edit'}} 2 </h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span class="text-danger" aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body Theme">
            <form @submit.prevent="saveDetails()">
              <div id="account-e" v-if="acc_editmode==true" >
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right text-white">Name</label>
                    <div class="col-md-6">
                        <input v-model="profileDetails.name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  required autocomplete="name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right text-white">Email</label>

                    <div class="col-md-6">
                        <input v-model="profileDetails.email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right text-white">password </label>

                    <div class="col-md-6">
                        <input v-model="profileDetails.password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    </div>
                </div>

                <div v-show="profileDetails.password" class="form-group row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right text-white">Confirm Password</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
              </div>
              <div v-if="address_editmode==true" id="address-e">
                  <div class="form-group">
                    <label for="Address" class="link-color">Address</label>
                    <input name="address" v-model="addressEditData.Address" type="text" class="form-control" placeholder="1234 Main St">
                  </div>
                  <div class="form-group">
                    <label for="Address2" class="link-color">Address 2</label>
                    <input name="adress2" v-model="addressEditData.Address_2" type="text" class="form-control"  placeholder="Apartment, studio, or floor">
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="City" class="link-color">City</label>
                      <input name="city" v-model="addressEditData.City" type="text" class="form-control">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="State" class="link-color">State</label>
                      <select name="state" v-model="addressEditData.State" id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option value="Kenya" >Kenya</option>
                      </select>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="Zip" class="link-color">Zip</label>
                      <input v-model="addressEditData.Zip" type="text" class="form-control" id="inputZip">
                    </div>
                  </div>
                  <div class="form-group">
                  </div>
                  
              </div>
              <div class="modal-footer">
               <div class="form-group row justify-content-end">
                   <button type="submit" class="btn btn-primary col-sm-12">Update Details</button>
               </div>
              </div>
            </form>
           </div>
         </div>
       </div>
     </div>
 </div>
</template>

<script>
export default {
  props: ['current'],
  data() {
    return {
      profileDetails: [],
      acc_editmode: false,
      adresses: [],
      address_editmode: false,
      addressEditData:{
        id: '',
        Address: '',
        Address_2: '',
        City: '',
        State: '',
        Zip: '',
        default:'',
        
      },
      deleteAccountReasons:{
           Reason1: 'I dont get What I Want', 
           Reason2: 'e-shop app is slow',
           Reason3: 'It is difficult to use e-shop Application',
           Reason4: 'Poor Services',
           Reason5: 'I dont Have A reason',
      },
      saveDeleteAccountReasons:{
           Reason1: 0, 
           Reason2: 0,
           Reason3: 0,
           Reason4: 0,
           Reason5: 0,
      }
    }
  },
  methods: {
    async getProfileDetails(){
      try {
        const res = await this.callApi('get','getprofiledetails');
        this.profileDetails = res.data;
        console.log(this.profileDetails);
      } catch (error) {
        console.log(error);
      }   
    },
    launchEditModal(mode,data){
      if(mode=='editAcount'){
        this.acc_editmode = true;
      }
      else if(mode=='editAdress'){
         this.address_editmode = true;
         this.addressEditData = data;
         alert(data.City);
      }
     $('.editModal').modal('show');
    },
    //Update Account Details
     async saveDetails(){
      try {//store Account data
        if (this.acc_editmode) {
        const res = await this.callApi('post','editaccountdetails',this.profileDetails);
        if (res.status==200) {
              this.$swal({
                position: 'top-end',
                icon: 'success',
                title: 'Your Account Details was Updated Successfully',
                showConfirmButton: false,
                timer: 1500
              });
         $('.editModal').modal('hide');
        }else{
          this.feedbackMessages.errorMsg('Account edit Failed!');
        }
        }//store Adress data
        else if (this.address_editmode) {
          const res = await this.callApi('post','editaddress/' + this.addressEditData.id ,this.addressEditData);
          if (res.status==200) {
                this.$swal({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Your Address was Updated Successfully',
                  showConfirmButton: false,
                  timer: 1500
                });
           $('.editModal').modal('hide');
          }else{
            this.feedbackMessages.errorMsg('Updating Your Address Failed!');
          }
        }//store Adress data

      } catch (error) {
        console.log(error);
      }
     },
     async getAdresses(){
       try {
        const res = await this.callApi('get','getadresses');
        this.adresses = res.data;
       } catch (error) {
         console.log(error);
       }
     },
     //make address default
     async makeAdressDefault(data){
         if (data.default==null || data.default==-1) {
           data.default = 1;
         }else{
           data.default =  -1;
         }
       
       this.addressEditData = data;
          const res = await this.callApi('post','editaddress/' + this.addressEditData.id ,this.addressEditData);
          if (res.status==200) {
                this.$swal({
                  position: 'top-end',
                  icon: 'success',
                  title: 'This Address Has Been Made Your Default Address',
                  showConfirmButton: false,
                  timer: 1500
                });
           $('.editModal').modal('hide');
          }else{
            this.feedbackMessages.errorMsg('Updating Your Address Failed!');
          }
     },
    deleteAccount(){
     try {
         this.$swal({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         }).then((result) => {
           if (result.value) {
             
             $('#delete-reasons').modal('show');
           }
         });
     } catch (error) {
       this.reportErrors(error);
     }
    },
    async removeAccount(){
      const res = await this.callApi('post','deleteaccount');
      if (res.status==200) {
                this.$swal({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Your e-shop Account Has Been deleted successfully',
                  showConfirmButton: false,
                  timer: 2500
                });

      }
    },//save delete account reasons
    async saveDeleteAccountReasonsData(){
       const res = await this.callApi('post','deleteaccountreasons',this.saveDeleteAccountReasons);
          $('#delete-reasons').modal('show');
               this.removeAccount();
                setTimeout(() => {
                  window.location.assign('/');
                }, 2500);
          
    },
    //Manage subscription
    manageSubscription(value){
    const subscription ={
         type: value
    }
      axios.post('subscribe',subscription)
      .then((response)=>{
        if(value=='subscribe'){
        this.$swal({
          position: 'top-end',
          icon: 'success',
          title: 'You have subscribed to our Daily Newsletter',
          showConfirmButton: false,
          timer: 3000
        })
        }else{
        this.$swal({
          position: 'top-end',
          icon: 'success',
          title: 'You have unsubscribed to our Daily Newsletter',
          showConfirmButton: false,
          timer: 3000
        })
        }
      })
      .catch()
    }

  },
  mounted() {
    this.getProfileDetails();
    this.getAdresses();
  },
}
</script>

<style scoped>
    .customer-profile-bg{
       background-color: rgb(70,70,109);
       min-height: 100vh;
    }
    .customer-profile-sidebar{
      min-height: 100vh;
      width: 230px;
    }
    .customer-profile-pages{
        min-height: 100vh;
    }
    .sidebar-link{
        font-size: 22px;
        font-family: 'Times New Roman', Times, serif;
    }
    .customer-profile-bg-color{
       background-color: rgb(70,70,109);
    }  
    .leave-reasons{
      font-size: 26px;
    }
</style>
