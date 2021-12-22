<template>
 <div class="card Theme-two ml-1 pl-1 customer-profile-pages">
  <div class="card-header customer-profile-bg-color text-center">
      <h4 class="heading-color heading-style">Your Recent Orders</h4>
  </div>
  <div class="row mt-1 m-0 justify-content-center mt-2">
      <div v-if="orders.length>0" class="col-sm-12">
        <div class="card customer-profile-bg-color">
          <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                 <div class="card Theme" v-for="(order, index) in items" :key="index">
                     <div class="card-header">
                         <div class="card-title heading-color heading-style">Order  </div>
                     </div>
                     <ul class="list-group Theme list-group-flush"  >
                       <li class="list-group-item Theme">
                        <table class="table Theme">
                          <thead>
                            <tr>
                              <th class="heading-color" scope="col">Product Id</th>
                              <th class="heading-color" scope="col">Product</th>
                              <th class="heading-color" scope="col">Price</th>
                              <th class="heading-color" scope="col">Quantity</th>
                              <th class="heading-color" scope="col">Subtotal</th>
                            </tr>
                          </thead>
                          <tbody v-for="(product, index) in order" :key="index">
                            <tr class="text-white">
                              <th scope="row"> {{product.item.id}}  </th>
                              <td>{{product.item.title}}</td>
                              <td>{{product.item.price}}</td>
                              <td>{{product.qty}}</td>
                              <td>{{product.price}}</td>
                            </tr>
                          </tbody>
                        </table>
                       </li>
                     </ul>
                 </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <div v-if="orders.length==0" class="col-sm-9 ">
        <div class="card customer-profile-bg-color">
          <div class="card-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                         <div class="card-text text-center text-info profile-credit-info">
                             <p> You currently have not made any Orders</p>
                         </div>
                         <div class="card-text text-center text-success profile-credit-info">
                             <p>All Your Orders  will be displayed here</p>
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
  watch: {
  },
    data() {
        return {
            orders: [],
            items: [],
        }
    },
    methods: {
    //fetch orders
    async getOrders(){
        const res = await this.callApi('get','getorders');
        this.orders = res.data;
        for (let index = 0; index < res.data.length; index++) {
            
           this.items.push(res.data[index].order.items);
           
        }

        
    },
    },
    mounted() {
        this.getOrders();
    },
}
</script>

<style>
    
</style>