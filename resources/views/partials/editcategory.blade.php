<div class="modal fade" id="editcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static"  aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div id="create-height" class="modal-content  Theme ">
        <div class="modal-header">
          <h5 class="modal-title heading-color heading-style" id="createCms">Edit Category</h5>
          <div class="spinner-border ml-1 text-success" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span class="text-danger" aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="get" action=" {{route('editcategory',['id'=>1])}} ">
            <div class="row justify-content-center">
                <!--category name-->
              <div class="col">
                <div class="form-group">
                  <label  class="text-white" for="name">Category Name</label>
                  <input type="text" name="category" class="form-control" >
                </div> 
              </div>
            </div>
            <!--Category Image-->     
            <div class="form-group">
              <label  class="text-white" for="image">Category Image</label>
              <div class="card p-2 text-center img-container ml-5 mr-5 row">
                <div id="img-upload-create" class=" img-cont-el col-sm-10">
                  <img  id="u-img"  src=""  class="img-fluid product-img-size">
                </div>
                <div id="img-box-msg" class="card-text text-center col-sm-10 img-cont-el">
                    <p><i class="fa fa-upload display-4  text-primary" aria-hidden="true"></i></p> 
                    <p class="text-primary"> Upload Your image</p>
                </div>
              </div>
              <input id="uploaded-img" onchange="hideImgBoxMessage()" type="file"  name="imagePath">
            </div>                                       
            <div class="modal-footer">
              <button  type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>