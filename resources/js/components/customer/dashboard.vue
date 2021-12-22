<template>
  <div id="acc-dashboard" class="row justify-content-center">
    <div class="col-sm-12">
     <div class="card Theme-two">
       <div class="row justify-content-center">
          <div class="col-sm-3">
              <div class="card ">
                <ul class="nav mt-1 Theme-two flex-column customer-profile-sidebar">
                  <li class="nav-item mt-1 p-2 m-1 col-sm-12 Theme">
                    <p @click="$global.hideAccountOverview('profile#/account')" to="/account" class="nav-link sidebar-link link-color active" href="#"> <i class="fa fa-user" aria-hidden="true"></i> Account</p>
                  </li>
                  <li class="nav-item m-1 p-2 mr-3 col-sm-12 Theme">
                    <p @click="$global.hideAccountOverview('profile#/orders')" to="/orders" class="nav-link sidebar-link link-color" href="#"> Orders </p>
                  </li>
                  <li class="nav-item m-1 p-2 mr-3 col-sm-12 Theme">
                    <router-link @click.prevent="$global.hideAccountOverview('profile/reviews')" to="/reviews" class="nav-link sidebar-link link-color" href="#"> <i class="fa fa-cog" aria-hidden="true"></i> Pending Reviews </router-link>
                  </li>
                  <li class="nav-item m-1 p-2 mr-3 col-sm-12 Theme">
                    <p @click="$global.hideAccountOverview('profile#/credit')" to="/credit" class="nav-link sidebar-link link-color" href="#"> <i class="fa fa-credit-card mr-1" aria-hidden="true"> </i>e-shop credit </p>
                  </li>
                  <li class="nav-item m-1 p-2 mr-3 col-sm-12 Theme">
                    <p @click="$global.hideAccountOverview('profile#/saved-items')" to="/saved-items" class="nav-link sidebar-link link-color" href="/cart" tabindex="-1" > <i class="fas fa-save mr-1"></i> Saved Items </p>
                  </li>
                  <div class="card">
                    <li class="nav-item m-1 p-2 mr-3 col-sm-12 Theme">
                      <a class="nav-link sidebar-link text-danger" href="/profilelogout"> <i class="fa fa-power-off" aria-hidden="true"></i> Logout</a>
                    </li>
                    <li class="nav-item m-1 mr-3 col-sm-12 Theme text-danger">
                      <button @click="deleteAccount()" class="nav-link btn sidebar-link text-danger" > <i class="fa fa-trash" aria-hidden="true"></i> Delete Account</button>
                    </li>
                  </div>
                  </ul>
              </div>
          </div>
          <div  class="col-sm-9 p-1">
              <account v-show="acc_overview==1"></account>
              <router-view v-show="acc_overview!=1" ></router-view>
          </div>
       </div>
     </div>
    </div>

     <!-- Delete Account Reasons -->
     <div class="modal fade" id="delete-reasons" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content Theme">
           <div class="modal-header">
             <h5 class="modal-title heading-style heading-color" id="staticBackdropLabel">Please Tell Us Why You Are Leaving Us</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
           <div class="modal-body">
            <div class="form-check">
              <input v-model="saveDeleteAccountReasons.Reason1" class="form-check-input" type="radio" name="Reason1"  value="1">
              <label class="form-check-label link-color leave-reasons">
            {{deleteAccountReasons.Reason1}}
              </label>
            </div>
            <div class="form-check">
              <input v-model="saveDeleteAccountReasons.Reason2" class="form-check-input" type="radio" name="Reason2"  value="1">
              <label class="form-check-label link-color leave-reasons">
                {{deleteAccountReasons.Reason2}}
              </label>
            </div>
            <div class="form-check">
              <input v-model="saveDeleteAccountReasons.Reason3" class="form-check-input" type="radio" name="Reason3"  value="1">
              <label class="form-check-label link-color leave-reasons">
                {{deleteAccountReasons.Reason3}}
              </label>
            </div>
            <div class="form-check">
              <input v-model="saveDeleteAccountReasons.Reason4" class="form-check-input" type="radio" name="Reason4"  value="1">
              <label class="form-check-label link-color leave-reasons">
                {{deleteAccountReasons.Reason4}}
              </label>
            </div>
            <div class="form-check">
              <input v-model="saveDeleteAccountReasons.Reason5" class="form-check-input" type="radio" name="Reason5"  value="1">
              <label class="form-check-label link-color leave-reasons">
                {{deleteAccountReasons.Reason5}}
              </label>
            </div>
           </div>
           <div class="modal-footer">
             <button @click="saveDeleteAccountReasonsData()" type="button" class="btn btn-danger" data-dismiss="modal"> <i class="fa fa-trash" aria-hidden="true"></i>Delete Account </button>
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
      acc_overview: false,
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
    // $('.editModal').modal('show');
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

         if (data.default==0) {
           data.default += 1;
         }else{
           data.default -= 1;
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

  },
  mounted() {
    this.getProfileDetails();
    this.getAdresses();
    this.acc_overview = this.$global.showAccountOverview();
  },
}
</script>

<style >
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
