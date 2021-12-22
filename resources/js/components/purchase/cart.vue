<template>
  <!--Filled cart-->
  <div  class="row justify-content-center mt-2 mb-2">
    <div class="col-sm-12" v-if="cartProducts.totalQty>0 ">
      <div class="card Theme-two cart-height">
       <div class="row justify-content-center">
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9  cart-items" >
              <div class="card-header Theme">
                <h1 class="heading-color heading-style">Your Cart<span class="badge ml-3 badge-secondary"> {{cartProducts.totalQty}} </span></h1>
              </div>
            <div class="card Theme-light shadow-lg p-3 mb-5 rounded" v-for="(cartProduct, index) in cartProducts.items" :key="index">
              <div class="card Theme-light-2 cart-bg-color">
                  <div class="row justify-content-center p-3">
                     <div class="col-sm-3 Theme shadow-sm m-1  mb-5  rounded">
                       <ul class="nav flex-column">
                         <li class="nav-item">
                            <h5 class="heading-color" > {{cartProduct.item.title}} </h5> 
                         </li>
                         <li class="nav-item">
                           <img :src="'Images/' + cartProduct.item.imagePath " class="img-fluid cart-image-size" alt="" srcset=""> 
                         </li>
                       </ul>
                     </div>                                
                     <div class="col-sm-3  Theme m-0 shadow-sm m-1  mb-5  rounded">
                       <ul class="nav flex-column">
                         <li class="nav-item">
                            <h5 class="heading-color" >Description</h5> 
                         </li>
                         <li class="nav-item">
                           <p class="text-white">{{cartProduct.item.description}}</p>
                         </li>
                       </ul>
                     </div>
                     <div class="col-sm-3 Theme m-0 shadow-sm m-1 cart-qty-height mb-5  rounded">
                       <ul class="nav flex-column">
                         <li class="nav-item">
                            <h5 class="heading-color" >Quantity</h5> 
                         </li>
                         <li class="nav-item">
                           <div class="input-group">
                             <input v-model="cartProduct.qty" type="text" class="form-control" aria-label="Text input with dropdown button">
                             <div class="input-group-append">
                               <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-plus text-success" aria-hidden="true"></i>/<i class="fa fa-minus text-danger" aria-hidden="true"></i></button>
                               <div class="dropdown-menu">
                                 <li><button class="btn btn-primary" @click="reduceProduct(cartProduct.item.id)">Reduce by 1</button></li>
                                 <div role="separator" class="dropdown-divider"></div>
                                 <li><a href="">Reduce by All</a></li>
                               </div>
                             </div>
                           </div>
                         </li>
                       </ul>
                     </div>
                     <div class="col-sm-2 Theme">
                       <div class="row content-justify-center">
                         <div  class="col-sm-12 m-0 cart-qty-height shadow-sm   mb-5 rounded">
                           <ul class="nav flex-column">
                             <li class="nav-item">
                                <h5 class="heading-color" > Price </h5> 
                             </li>
                             <li class="nav-item">
                                 <p class="text-white"> <sup> <i class="fas fa-dollar-sign    "></i> </sup> {{cartProduct.item.price}} </p>
                             </li>
                           </ul>
                         </div>
                         <div  class="col-sm-12 Theme m-0 cart-qty-height shadow-sm   mb-5 rounded">
                           <ul class="nav flex-column">
                             <li class="nav-item">
                                <h5 class="heading-color" > Subtotal </h5> 
                             </li>
                             <li class="nav-item">
                                 <p class="text-white"> <sup> <i class="fas fa-dollar-sign    "></i> </sup> {{cartProduct.price}} </p>
                             </li>
                           </ul>
                         </div>
                       </div>
                     </div>
                  </div>
                  <div class="row justify-content-end mr-2 mb-1">
                    <button @click="removeProduct(cartProduct.item.id)" type="button" class="col-sm-4 btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"></i> Remove</button>
                  </div>
              </div>
            </div>
           </div>
           <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3 cart-order-summary">
            <div class="card">
              <div class="card-header Theme">
                <h5 class="heading-color heading-style">order Summury</h5>
              </div>
              <div class="card-body Theme">
                  <div class="row">
                      <p class="col-sm-12 card-header heading-color">Do You Have A promo Code  <i class="fa fa-question" aria-hidden="true"></i></p>
                      <hr class="bg-white">
                      <h3 class="col-sm-12 card-header text-white">  Total <sup><i class="fas fa-dollar-sign    "></i></sup> {{cartProducts.totalPrice}} </h3>
                      <hr class="bg-white">
                      <div class="col-sm-12 card-header">
                          <a href="/pay" type="button" class="btn col-sm-12 btn-warning"> <i class="fa fa-check" aria-hidden="true"></i> Checkout </a>
                      </div>
                 </div> 
              </div>
            </div>
           </div>
       </div>
       <div class="card-footer">
           <div class="row justify-content-start">
               <a href="/shop" class="btn btn-secondary text-warning col-sm-4"> <i class="fa fa-shopping-basket" aria-hidden="true"></i> Continue Shopping</a>
           </div>
       </div>
      </div>         
    </div>
    <!--empty cart-->
    <div v-if="cartProducts.totalQty==0"  class="col-sm-12">
      <div class="card cart-height">
       <div class="row">
           <div class="col-sm-12 mr-1 cart-items" >
              <div class="card-header Theme">
                <h1 class="heading-color heading-style">Your Cart<span class="badge ml-3 badge-secondary"> {{cartProducts.totalQty}} </span></h1>
              </div>
            <div class="card shadow-lg p-3 mb-5 rounded">
              <div class="card cart-bg-color">
                  <div class="row justify-content-center p-3">
                     <div class="col-sm-12 text-xenter shadow-sm m-1  mb-5 bg-white rounded">
                        <p class="display-4 text-center heading-color">Your Cart Is Empty</p>   
                     </div>                                
                  </div>
              </div>
            </div>
           </div>
       </div>
       <div class="card-footer">
           <div class="row justify-content-start">
               <a href="/shop" class="btn btn-secondary text-warning col-sm-4"> <i class="fa mr-2 fa-shopping-basket" aria-hidden="true"></i>{{ cartProducts.totalQty>0 ? 'Continue Shopping' : 'Go To Shop' }} </a>
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
            cartProducts: []
        }
    },
  methods: {
      //get Products added to the cart
      async getCartProducts(){
           try {
               const res = await this.callApi('get','getcartproducts');
               this.cartProducts = res.data;
               console.log(this.cartProducts.totalQty);
           } catch (error) {
               console.log(this.cartProducts );
           }
      },
      //reduce product from cart
      reduceProduct(id){
        axios.get('reduce/' + id)
        .then((res)=>{
              this.feedbackMessages.successMsg('Product reduced successfully');
              setTimeout(() => {
                window.location.reload();
              }, 3000);
        })
      },
      removeProduct(id){
        axios.get('remove/' + id)
        .then((res)=>{
              this.feedbackMessages.successMsg('Product removed successfully');
              setTimeout(() => {
                window.location.reload();
              }, 3000);
        })
      }
  },
  mounted() {
      this.getCartProducts();
       
  },
  created() {
      
  },
}
</script>

<style>
    .cart-height{
        min-height: 50vh;
    }
    .cart-image-size{
        width: 150px;
        height: 150px;
    }
    .cart-bg-color{
        background-color: rgb(70,70,109);
    }
    .cart-qty-height{
        height: 100px;
    }
    .cart-order-summary{
        float: left;
        right: 0;
    }
    .cart-items{
        left: 0;
    }
    .Theme-light{
      background-color: rgb(78, 78, 126);
    }
    .Theme-light-2{
      background-color: rgb(71, 71, 138);
    }
</style>

