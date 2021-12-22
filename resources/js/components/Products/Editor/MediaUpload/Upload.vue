<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
               <!-- Modal -->
              <div id="uploader" class="modal fade " data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog " role="document">
                  <div class="modal-content Theme ">
                    <div class="modal-header Theme">
                      <h5 class="modal-title" >Select Image To upload <i class="fas fa-upload    "></i></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-danger" aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body Theme">
                     <!--Image Upload-->     
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
                          </div>
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer cTheme">
                      <button type="button" class="btn btn-success text-white" data-dismiss="modal">Upload Image</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</template>

<style >
    .modal{
       margin: 0 auto; 
    }
</style>

<script>
export default {
    data() {
      return {
         image: '',
            /**
             * Display Upload
             * msg while image
             * is not uploaded
            */
            img_uploaded: false,
            img_uploaded: false,
            /**
             * Store images
             * uploaded
            */
           img_upload: [{
             image: ''
           }],
           imgShow: ''
      }
    },
    methods: {
/**
  * updates the image
  * in image upload 
  * container
 */
uploadImage(e){
  try {
  // console.log(event);

  this.$Uploader.setUploadedImage(null);

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
    this.$Uploader.setUploadedImage(document.getElementById("img-upload").value.replace("C:\\fakepath\\", ""))
   //alert(document.getElementById("img-upload").value)
   Event.$emit('img_uploaded')
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
  
    },
}
</script>