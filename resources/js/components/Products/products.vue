<template>
<div class="container-fluid">
    <div class="row justify-content-center mt-1">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 card shadow-sm p-1 mb-1 ml-1 bg-white rounded">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-primary">
              <i class="fas fa-newspaper text-primary float-icons"></i>
          <div class="col-xs col-sm col-md col-lg">100</div> 
               <p>Total Products</p> 
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 card shadow-sm p-1 mb-1 ml-1 bg-white rounded">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-primary">
              <i class="fas fa-newspaper text-primary float-icons"></i>
          <div class="col-xs col-sm col-md col-lg">3</div> 
               <p>Total Product Categories</p> 
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 card shadow-sm p-1 mb-1 ml-1 bg-white rounded">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-primary">
              <i class="fas fa-newspaper text-primary float-icons"></i>
          <div class="col-xs col-sm col-md col-lg">3</div> 
               <p>Featured News</p> 
          </div>
        </div>
     </div>
    <div class="row justify-content-center ">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="tags-tbl-header">
                       <div class="tags-table-header-elements">
                         <p class="text-primary heading-style">Products</p>
                       </div> 
                       <div class="tags-table-header-elements">
                         <button @click="createProducts()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-tag"> <i class="fa fa-plus" aria-hidden="true"></i> Add Product </button>
                       </div> 
                    </div>
                  </div>
             <table class="table table-striped">
               <thead>
                 <tr class="bg-primary">
                   <th scope="col" class="text-white">id</th>
                   <th scope="col" class="text-white">Title</th>
                   <th scope="col" class="text-white">Image</th>
                   <th scope="col" class="text-white">Price</th>
                   <th scope="col" class="text-white">description</th>
                   <th scope="col" class="text-white">Category</th>
                   <th scope="col" class="text-white">Action</th>
                 </tr>
               </thead>
               <tbody>
                <tr v-for="(product, index) in products" :key="index" >
                    <th scope="row"> {{product.id}}  </th>
                    <td> {{product.title}}  </td>
                    <td> <img  :src="'Images/' + product.imagePath" alt="" srcset="" class="img-fluid bg-primary img-thumbnail product-img-size"> </td>
                    <td> {{product.price}}  </td>
                    <td> {{product.description}}  </td>
                    <td> {{product.category_id}} </td>
                    <td class=""> 
                        <a href="#" @click="editProduct(product)" type="button" class="btn btn-info float-left mb-1 mr-1 text-white"  data-toggle="modal" data-target="#edit-tag"> <i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                        <button @click="deleteProduct(product,product.id)" class="btn btn-danger text-white float-left" > Delete</button>  
                        <button @click="editProductAbout(product.id)" class="btn mt-2 btn-success text-white float-left" > Edit About</button>  
                     </td> 
                </tr>    
               </tbody>
             </table>
            </div>
        </div>
    </div>
    <pagination :meta="meta" v-on:pagination="getProducts"></pagination>
<!--create product or edit product-->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms"> {{editmode ? 'Edit Product' : 'Create Product' }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="editmode ? UpdateProduct() : addProduct()" >
          <div class="row justify-content-center">
            <div class="col">
              <div class="form-group">
                <label  class="text-white" for="name">Product Name</label>
                <input v-model="createProduct.title" type="text" name="title" class="form-control" >
                <div class="bg-danger mt-1 f-errors ml-3 mr-3 text-center"><p id="title"  class="bg-danger title text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.title" :key="index"> {{error}} </p></div>
              </div>       
       
            </div>
            <!--price-->
            <div class="col">
              <div class="form-group">
                <label  class="text-white" for="price">Product price</label>
                <input v-model="createProduct.price" type="text"   name="price" class="form-control" >
                <div class="bg-danger mt-1 f-errors ml-3 mr-3 text-center"><p  class="bg-danger price-error text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.price" :key="index"> {{error}} </p></div>
              </div>
            </div>
          </div>
          <!--Product Image-->     
            <div class="card text-center ml-5 mr-5 m-2 row">
              <div class="card-body">
                <div v-if="img_uploaded" class=" img-cont-el col-sm-12">
                  <img  v-for="(image, index) in img_upload" :key="index" :src="'/Images/' + image.image"  class="img-fluid">
                </div>
                <div v-else-if="!img_uploaded" class="card-text text-center col-sm-12 img-cont-el">
                    <p><i class="fa fa-upload display-4  text-primary" aria-hidden="true"></i></p> 
                    <p class="text-primary"> Upload Your image</p>
                </div>
              </div>
                <div class="card-footer bg-success">
                  <div class="form-group">
                    <input v-on:change="uploadImage" id="img-upload" type="file"  name="imagePath"  >
                    <div class="bg-danger mt-1 ml-3 mr-3 text-center"><p  class="bg-danger f-errors image text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.image" :key="index"> {{error}} </p></div>
                  </div>
                </div>
            </div> 
          <!--Product Category -->  
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="inputGroupSelect01">Options</label>
            </div>
             <select v-model="createProduct.category"  name="category" class="custom-select" id="inputGroupSelect01">
               <option v-for="(category, index) in categories" :key="index" :value="category.id"><img :src="'Images/' + category.image " alt="test" srcset="" class="img-fluid category-img">  {{category.category}}  </option>    
            </select>
          </div>
          <div class="col-sm-9">
            <div class="bg-danger mt-1 f-errors ml-3 mr-3 text-center"><p  class="bg-danger category text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.category" :key="index"> {{error}} </p></div>           
          </div>               
          <div class="form-group">
            <label  class="text-white" for="description">Description</label>
            <textarea v-model="createProduct.description" name="description" id="" cols="30" rows="4" class="form-control"></textarea>
            <div class="bg-danger mt-1 ml-3 mr-3 text-center"><p  class="bg-danger f-errors description text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.description" :key="index"> {{error}} </p></div>
          </div>                    
          <div class="modal-footer">
           <button v-if="editmode==true" type="submit" class="btn btn-success">Update Product</button> 
           <button v-if="editmode==false" type="submit" class="btn btn-primary">Create Product</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</template>

<style >
    
</style>

<script>

import {mapActions} from 'vuex';
import {mapGetters} from 'vuex';

export default {
    data() {
        return {
            /**
             * reuse modal -> create
             * and edit product using same
             * model
            */
            editmode: false, //show modal as create
            products: [],
            createProduct:{
               id: '',
               title: '',
               imagePath: '',
               description: '',
               category: '',
               price: '',
            },
            categories: [],
            image: '',
            /**
             * Display Upload
             * msg while image
             * is not uploaded
            */
            img_uploaded: false,
            /**
             * Store images
             * uploaded
            */
           img_upload: [{
             image: ''
           }],
           errors:{
             title: [],
             price: [],
             category: [],
             description: [],
             image: []
           },
           url:'',
           pagination: [],
           meta: {},
           imgShow: ''
        }
    },
    methods: {
      /**
     * Launch Rich Text-editor
     * and Edit Product About
    */
   editProductAbout(id){
this.$swal
      let timerInterval
      this.$swal({
        html: '<p class="text-success">Launching Editor in <b></b> seconds.</p>',
        timer: 5000,
        timerProgressBar: true,

        onBeforeOpen: () => {
          this.$swal.showLoading()
                     setTimeout(() => {
            window.location.assign('/Editor')
          }, 5000);

          timerInterval = setInterval(() => {
            const content = this.$swal.getContent()
            if (content) {
              const b = content.querySelector('b')
              if (b) {
                b.textContent = this.$swal.getTimerLeft()
              }
            }
          }, 100)
        },
        onClose: () => {
          clearInterval(timerInterval)
        }
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === this.$swal.DismissReason.timer) {
          console.log('I was closed by the timer')
        }
      })
      this.$Editor.setCurrentProductid(id);

      setTimeout(() => {
        //window.location.assign('/Editor')
      }, 5000);
   },
 /**
  * Create Product
 */

 createProducts(){
    this.editmode = false;
  $('#productModal').modal('show');
},

/**
 * edit Product
*/

 editProduct(product){
   this.editmode = true;
   this.createProduct = product;
   this.createProduct.imagePath = product.imagePath;
   this.img_upload.image = product.imagePath;
   this.uploadImage();

  $('#productModal').modal('show');

  try {
   
  } catch (error) {
    console.log(error);
  }

},
/**
 * Send axios request
 * to get products
*/
 getProducts(page){
   try {
            axios.get('/getproducts',{
              params:{page}
            }).then((res)=>{
                this.products = res.data.data;
                this.meta = res.data.meta;
            })
     //const products = await this.callApi('get','/getproducts',{
     //  params:{page}
     //});
     //console.log( products.data.meta);
     //this.products = products.data.data;
     //this.meta = products.data.meta;
     
   } catch (error) {
     console.log('Get Products error:' + error);
   }

},
 /**
  * updates the image
  * in image upload 
  * container
 */
uploadImage(e){
  try {
  // console.log(event);

  if (document.getElementById("img-upload").value) {
   let files = e.target.files || e.dataTransfer.files;
    
      if (!files.length)
       return;
   this.createImage(files[0]);
  }
   if (this.editmode==true) {
     this.img_upload.pop();
     this.img_upload.unshift({
         image: this.createProduct.imagePath
     });

   }else{
      this.img_upload.pop();
      this.img_upload.unshift({
      image: document.getElementById("img-upload").value.replace("C:\\fakepath\\", "")
   });

   }
   this.img_uploaded = true;
  } catch (error) {
    
  }
},
//create image
   createImage(file) {
     console.log(file)
       let reader = new FileReader();
       let vm = this;
       reader.onload = (e) => {
        vm.image = e.target.result;
           console.log(vm.image)
            
       };
       //alert(vm.image)
       reader.readAsDataURL(file);
      
   },
    /**
     * Create Product
     * store in the database
    */
    async addProduct(){
      try {

        this.createProduct.imagePath = document.getElementById("img-upload").value.replace("C:\\fakepath\\", "");
        this.createProduct.imagePath = this.image;
        //validate product data
        this.productFormValidation();
       /**
        * send axios request
        *  after successfull 
        *  front-end validation
        */
        if(this.errors.title.length==0 && this.errors.image.length==0 && this.errors.description.length==0 && this.errors.price.length==0 && this.errors.category.length==0){
          const res = await this.callApi('post','createproduct',this.createProduct);
          if (res.status===200) {
            $('#productModal').modal('hide');
               this.feedbackMessages.successMsg('Creating ' + this.createProduct.title + ' Product Was Successfull');
            this.products.unshift(this.createProduct);
            setTimeout(() => {
              window.location.reload();
            }, 3000);1
          }else{
             this.feedbackMessages.errorMsg('Creating ' + this.createProduct.title + ' Failed');
          }         
       }
      } catch (error) {
         this.reportErrors(error);
      }
    },
    /**
     * delete Product
    */
   deleteProduct(Product,id){
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
              var res = this.deleterRequest(Product,id);
           }
         });
     } catch (error) {
       this.reportErrors(error);
     }
  },
  async deleterRequest(Product,id){
     const res = await this.callApi('get','deleteproduct/' + id);
            if (res.status===200) {
                 
               this.$swal({
                 position: 'top-end',
                 icon: 'success',
                 title: Product.title + ' Has Been Deleted Successfully',
                 showConfirmButton: false,
                 timer: 1500
               });

                 this.products.splice(0,1);
       
            }else{
       
            }
  },
  //Validate product form data entry on submit
  productFormValidation(){
        this.errors.title = []; //empty title errors on submit
        this.errors.image = [];  //empty image errors on submit
        this.errors.description = []; //empty description errors on submit
        this.errors.category = []; //empty category errors on submit
        this.errors.price = []; //empty price errors on submit
      /**
       * get image name ->v-model not
       * is not supported in file input
       */
      //this.createProduct.imagePath = document.getElementById('img-upload').value.replace("C:\\fakepath\\", "");  
      //Product title front-end validation
      if (!this.createProduct.title) {
        this.errors.title.push('Product title is required');
      }
      //Product image front-end validation
      if (this.editmode==false && !this.createProduct.imagePath) {
        this.errors.image.push('Product image is required');
      }

      //Product category front-end validation
      if (!this.createProduct.category) {
        this.errors.category.push('Product category is required');
      }

      //Product description front-end validation
      if (!this.createProduct.description) {
        this.errors.description.push('Product description is required');
      }

      //Product price front-end validation
      if (!this.createProduct.price) {
        this.errors.price.push('Product Price is required');
      }
  }, 
  /**
     * Update Product
     * store in the database
    */
    async UpdateProduct(){
      try {
        //validate product data
        
        
        this.productFormValidation();
       /**
        * send axios request
        *  after successfull 
        *  front-end validation
        */
  
       //alert('pid: ' + this.createProduct.id + ', cid: ' + this.createProduct.category);
        if(this.errors.title.length ==0 && this.errors.image.length ==0 && this.errors.description.length ==0 && this.errors.price.length ==0 && this.errors.category.length ==0){
          const res = await this.callApi('post','editproduct/' + this.createProduct.id ,this.createProduct);
          if (res.status===200) {
            this.products.unshift(this.createProduct);
          $('#productModal').modal('hide');
          this.feedbackMessages.successMsg('Updating ' + this.createProduct.title + ' Product Was Successfull');
            var refresh = setTimeout(() => {
              window.location.reload();
            }, 1000);
              
              //clearTimeout(refresh);

          }else{
           
           this.feedbackMessages.errorMsg('Updating ' + this.createProduct.title + ' Product Failed');
          }         
       }
      } catch (error) {
        this.reportErrors(error);
      }
    },
    reportErrors(error){
        this.$swal({
         icon: 'error',
         title: 'error',
         text: error
       })
    },
    //pagination
    makePagination(){
      let pagination = {
        current_page: data.current_page,
        last_page: data.last_page,
        next_page_url: data.next_page,
        prev_page_url: data.prev_page,
    }
    this.pagination = pagination;
    },
    //get product categories 
    async getCategories(){
       try {
         const categories = await this.callApi('get','/getallcategories');
         this.categories = categories.data;
         console.log(this.categories);
       } catch (error) {
         console.log('Get categories error:' + error);
       }
    },
},

created(){
      $('#myModal').modal('show')
     this.getProducts();
          Event.$on('pagination',(page)=>{
            axios.get('/getproducts',{
              params:{
                page
                }
            }).then((res)=>{
                this.products = res.data.data;
                this.meta = res.data.meta;
            })
       //alert(page)
     });
     this.getCategories();
 }
}
</script>

<style >
  .f-errors{
    font-size: 16px;
    font-weight: 600;
    font-family: 'Times New Roman', Times, serif;
  }

 
 .wait-request-bg{
   background-color: transparent;
 }

  .wait-request{
    top: 25vh;
    background-color: rgba(4, 27, 61, 0.1);
  }
</style>