<div class="modal fade " id="sidebar" tabindex="-1" data-backdrop="static"  role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="ml-0 mt-0 mb-0 sidebar modal-dialog modal-dialog" role="document">
    <div class="col-sm-7">
      <div class="modal-content sidebar Theme">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle"><p class="heading-color link-size">Main Menu</p> </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span class=" text-danger" aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <!--manage products-->
           <ul class="list-unstyled"> 
            <p  class="heading-color mb-3 link-sb-style link-size"  role="button" aria-expanded="false" > <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}} </p>
            <hr class="bg-white">
             @can('access-dashboard')
               <a href=" {{route('dashboard')}} "  class="heading-color link-sb-style link-size" role="button"> Dashboard</a>
               <hr class="bg-white">
             @endcan
               
               <a href="{{route('products')}} " class="heading-color link-sb-style link-size"  >Products</a>
                 <hr class="bg-white">
               <p  class="heading-color link-sb-style link-size" data-toggle="collapse" href="#Cms" role="button" aria-expanded="false" aria-controls="multiCollapseExample1"><i class="fa fa-cogs" aria-hidden="true"></i>CMS</p>
                 <div class="collapse  multi-collapse" id="Cms">
                   <div class="col-sm"> 
                     <!--Edit Static Pages-->
                     <div class="btn-group">
                       <li class="link-color dropdown-toggle link-l-size m-2" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false"><i class="fas fa-edit icon-size text-primary   "></i>Edit Pages</li> 
                       <div class="dropdown-menu dropdown-menu-right Theme dropdown-menu-lg-left">
                         <button class="dropdown-item link-color" type="button" onclick="editpage('About Page')" >edit Home</button>
                         <button class="dropdown-item link-color" type="button" onclick="editpage('Terms Page')" >edit Terms</button>
                         <button class="dropdown-item link-color" type="button" onclick="editpage('Privacy Policy Page')" >edit Privacy Policy </button>
                       </div>
                     </div>                                                     
                   </div>
                 </div> 
                 <hr class="bg-white">
                 @can('manage-users')
                  <a  href="{{route('admin.users.index')}}" class="heading-color link-sb-style link-size" role="button" > <i class="fa fa-users" aria-hidden="true"></i> Users</a>  
                  <hr class="bg-white">
                 @endcan
                 
           </ul>        
          </div>
        </div>  
    </div>
    </div>
  </div>
