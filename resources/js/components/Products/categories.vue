<template>
<div class="container-fluid">
    <div class="row mt-2">
        <div class="col-xs col-sm col-md col-lg card shadow-sm p-3 mb-5 ml-1 bg-white rounded">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-primary">
              <i class="fas fa-newspaper text-primary float-icons"></i>
          <div class="col-xs col-sm col-md col-lg">100</div> 
               <p>Total Products</p> 
          </div>
        </div>
        <div class="col-xs col-sm col-md col-lg card shadow-sm p-3 mb-5 ml-1 bg-white rounded">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-primary">
              <i class="fas fa-newspaper text-primary float-icons"></i>
          <div class="col-xs col-sm col-md col-lg">3</div> 
               <p>Total Product Categories</p> 
          </div>
        </div>
        <div class="col-xs col-sm col-md col-lg card shadow-sm p-3 mb-5 ml-1 bg-white rounded">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-primary">
              <i class="fas fa-newspaper text-primary float-icons"></i>
          <div class="col-xs col-sm col-md col-lg">3</div> 
               <p>Featured News</p> 
          </div>
        </div>
     </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="tags-tbl-header">
                       <div class="tags-table-header-elements">
                         <p class="text-primary heading-style">Categoiies</p>
                       </div> 
                       <div class="tags-table-header-elements">
                         <button @click="createCategories()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-tag"> <i class="fa fa-plus" aria-hidden="true"></i> Add Category </button>
                       </div> 
                    </div>
                  </div>
             <table class="table table-striped">
               <thead>
                 <tr class="bg-primary">
                   <th scope="col" class="text-white">id</th>
                   <th scope="col" class="text-white">Category</th>
                   <th scope="col" class="text-white">Image</th>
                   <th scope="col" class="text-white">Action</th>
                 </tr>
               </thead>
               <tbody>
                <tr v-for="(category, index) in categories" :key="index" >
                    <th scope="row"> {{category.id}}  </th>
                    <td> {{category.category}}  </td>
                    <td> <img  :src="'Images/' + category.image" alt="" srcset="" class="img-fluid bg-primary img-thumbnail product-img-size"> </td>
                    <td> 
                        <div class="row content-justify-center">
                            <a href="#" @click="editCategory(category)" type="button" class="btn btn-info float-left mb-1 text-white col" size="small" data-toggle="modal" data-target="#edit-tag"> <i class="fa fa-edit" aria-hidden="true"></i> Edit</a> 
                        <button @click="deleteCategory(category,category.id)" class="btn btn-danger text-white float-left col mb-1" > Delete</button>  
                        </div>
                     </td> 
                </tr>    
               </tbody>
             </table>
            </div>
        </div>
    </div>
   <pagination :meta="meta" v-on:pagination="getCategories"></pagination>
<!--create category or edit category-->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div id="create-height" class="modal-content  Theme ">
      <div class="modal-header">
        <h5 class="modal-title heading-color heading-style" id="createCms"> {{editmode ? 'Edit category' : 'Create category' }} </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-danger" aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="editmode ? UpdateCategory() : addCategory()" >
          <div class="row justify-content-center">
            <div class="col">
              <div class="form-group">
                <label  class="text-white" for="name">Category Name</label>
                <input v-model="createCategory.category" type="text" name="category" class="form-control" >
                   <div class="bg-danger mt-1 f-errors ml-3 mr-3 text-center"><p  class="bg-danger category text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.category" :key="index"> {{error}} </p></div>           
              </div>       
            </div>
          </div>
          <!--category Image-->     
            <div class="card text-center ml-5 mr-5 m-2 row">
              <div class="card-body">
                <div v-if="img_uploaded" class=" img-cont-el col-sm-12">
                  <img  v-for="(image, index) in img_upload" :key="index" :src="'/images/' + image.image"  class="img-fluid">
                </div>
                <div v-else-if="!img_uploaded" class="card-text text-center col-sm-12 img-cont-el">
                    <p><i class="fa fa-upload display-4  text-primary" aria-hidden="true"></i></p> 
                    <p class="text-primary"> Upload Your image</p>
                </div>
              </div>
                <div class="card-footer bg-success">
                  <div class="form-group">
                    <input v-on:change="uploadImage" id="img-upload" type="file"  name="image"  >
                    <div class="bg-danger mt-1 ml-3 mr-3 text-center"><p  class="bg-danger f-errors image text-white" data-toggle="tooltip" data-placement="top" :title="error" v-for="(error, index) in errors.image" :key="index"> {{error}} </p></div>
                  </div>
                </div>
            </div>                                  
          <div class="modal-footer">
           <button v-if="editmode==true" type="submit" class="btn btn-success">Update category</button> 
           <button v-if="editmode==false" type="submit" class="btn btn-primary">Create category</button>
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
export default {
    data() {
        return {
            /**
             * reuse modal -> create
             * and edit category using same
             * model
            */
            editmode: false, //show modal as create
            createCategory:{
               id: '',
               image: '',
               category: '',
            },
            categories: [],
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
             category: [],
             image: []
           },
           meta: {},
           pagination: [],
           image: ''
        }
    },
    methods: {
 /**
  * Launch modal to Create category 
 */
 createCategories(){    
   /**
    *Clear the Category Data object
    *to create new data 
   */   
    this.createCategory.id = ''; 
    this.createCategory.image = ''; 
    this.createCategory.category = ''; 

    this.editmode = false; //Set Category create mode
  $('#categoryModal').modal('show'); //launch modal 
 },
/**
 * Launch modal to edit category
*/
 editCategory(category){ 
   //document.getElementById("img-upload").value = "C:\\fakepath\\" + category.image;

   this.editmode = true; //Set Category edit mode
    
    /**
     * fill the category data
     *  object with category data
     * to be edited then prefill the 
     * form ->easier with v-form
    */
   this.createCategory = category; 

   this.img_upload.image = category.image;

   this.uploadImage();

  $('#categoryModal').modal('show');
  try {
   
  } catch (error) {
    console.log(error);
  }

},
 /**
  * updates the image
  * in image upload 
  * container
 */
uploadImage(e){
  try {
   //get path

  // console.log(event);
    if (e) {
   let files = e.target.files || e.dataTransfer.files;
    
      if (!files.length)
       return;
   this.createImage(files[0]);
     }

   if (this.editmode==true) {
     this.img_upload.pop();
     this.img_upload.unshift({
         image: this.createCategory.image
     });
   }else{
      this.img_upload.pop();
      this.img_upload.unshift({
      image: document.getElementById("img-upload").value.replace("C:\\fakepath\\", "")
   });
   }
   this.img_uploaded = true; 

  } catch (error) {
    this.reportErrors(error)
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
//get product categories for consuming
 getCategories(page){
   try {

             axios.get('/getcategories',{
               params:{
                 page
               }
             }).then((res)=>{
                this.categories = res.data;
                //this.meta = res.data.meta;

            })
   } catch (error) {
     console.log('Get categories error:' + error);
   }
},
    /**
     * Create Product
     * store in the database
    */
    async addCategory(){
      try {
        
        //validate Category data
        this.createCategory.image = this.image;
        this.categoryFormValidation();
       /**
        * send axios request
        *  after successfull 
        *  front-end validation
        */
        if(this.errors.image.length==0 && this.errors.category.length==0){
         $('#categoryModal').modal('hide');
          const res = await this.callApi('post','createcategory',this.createCategory);
          if (res.status===200) {
            this.feedbackMessages.successMsg('Creating ' + this.createCategory.category + ' Category Was Successfull');
            this.categories.unshift(res.data);
          }else{
              this.feedbackMessages.errorMsg('Creating ' + this.createCategory.category + ' Failed');
          }         
       }
      } catch (error) {
        this.reportErrors(error);
      }
    },
    /**
     * delete Category
    */
  async deleteCategory(Category,id){

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
              var res = this.deleterRequest(Category,id);
           }
         });
     
     } catch (error) {
             this.reportErrors(error);
     }
  },
  async deleterRequest(Category,id){
     const res = await this.callApi('get','deletecategory/' + id); //delete request
            if (res.status===200) {
               this.$swal({
                 position: 'top-end',
                 icon: 'success',
                 title: Category.category + ' Has Been Deleted Successfully',
                 showConfirmButton: false,
                 timer: 1500
               });

                 this.products.splice(0,1);
       
            }else{
       
            }
  },
  //Validate category form data entry on submit
  categoryFormValidation(){
        this.errors.category = []; //empty category name errors on submit
        this.errors.image = [];  //empty image errors on submit
      /**
       * get image name ->v-model not
       * is not supported in file input
       */
     // this.createCategory.image = document.getElementById('img-upload').value.replace("C:\\fakepath\\", "");  
      //category Name front-end validation
      if (!this.createCategory.category) {
        this.errors.category.push('Category Name is required');
      }
      //Category image front-end validation
      if ( this.editmode==false && !this.createCategory.image) {
        this.errors.image.push('category image is required');
      }

      //Category image front-end validation
      if (this.editmode==true ) {
        if (!this.createCategory.image && !this.img_upload.image) {
          this.errors.image.push('category image is required');
        }
      }

      
  }, 
  /**
     * Update Product
     * store in the database
    */
    async UpdateCategory(){
      try {
        //validate product data
        this.categoryFormValidation();
       /**
        * send axios request
        *  after successfull 
        *  front-end validation
        * 
        */
       if (document.getElementById("img-upload").value) {
          this.createCategory.image = this.image;
       }else{
         
       }
        if(this.errors.category && this.errors.image){
          //$('#waitingrequest').modal('show');
         this.isAdding = true;         
          const res = await this.callApi('post','editcategory/' + this.createCategory.id ,this.createCategory);
          if (res.status===200) {
            $('#categoryModal').modal('hide');
            this.feedbackMessages.successMsg('Updating ' + this.createCategory.category + ' Category Was Successfull');
            this.categories.unshift(res.data);
          }else{
            this.feedbackMessages.successMsg('Updating ' + this.createCategory.category + ' Category Failed');
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
    }
},
created(){
     this.getCategories();
 }
}
</script>

<style >
 /*style errors*/
  .f-errors{
    font-size: 16px;
    font-weight: 600;
    font-family: 'Times New Roman', Times, serif;
  }
 /*request wait style*/
 .wait-request-bg{
   background-color: transparent;
 }
 
 .wait-request{
    top: 25vh;
    background-color: rgba(4, 27, 61, 0.1);
 }
</style>