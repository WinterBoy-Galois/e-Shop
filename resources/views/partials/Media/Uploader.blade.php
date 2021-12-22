@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
           <!-- Modal -->
          <div id="uploader" class="modal fade " data-backdrop="static"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog  modal-xl" role="document">
              <div class="modal-content Theme ">
                <div class="modal-header Theme">
                  <h5 class="modal-title" >Select Image To upload <i class="fas fa-upload    "></i></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="text-danger" aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body Theme">
                  <div class="row">
                    <div class="col-3">
                      <img src="/Images/8Pad.jpg"  class="img-thumbnail">
                    </div>
                    <div class="col-3">
                      <img src="/Images/Ball.jpg"  class="img-thumbnail">
                    </div>
                    <div class="col-3">
                      <img src="/Images/Ball.jpg"  class="img-thumbnail">
                    </div>
                    <div class="col-3">
                      <img src="/Images/Ball.jpg"  class="img-thumbnail">
                    </div>
                    <div class="col-3">
                      <img src="/Images/Ball.jpg"  class="img-thumbnail">
                    </div>
                    <div class="col-3">
                      <img src="/Images/Ball.jpg"  class="img-thumbnail">
                    </div>
                    <div class="col-3">
                      <img src="/Images/Ball.jpg"  class="img-thumbnail">
                    </div>
                  </div>
                </div>
                <div class="modal-footer cTheme">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection