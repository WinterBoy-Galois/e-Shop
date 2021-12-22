@extends('layouts.app')
@section('content')
<div class="card Theme user-mgt">
  <div class="card-header">
    <h1 class="text-center heading-color heading-style">User Authentication Roles Management</h1>
  </div>
  <div class="card-body">
    <div class="container">
      <div class="row justify-content-center">
       <div class="col-sm-12">
      
           <table class="table table-hover table-dark">
             <thead>
               <tr>
                 <th scope="col">User ID</th>
                 <th scope="col">Name</th>
                 <th scope="col">Email</th>
                 <th scope="col" >Roles</th>
                 <th scope="col">Actions</th>            
               </tr>
             </thead>
             <tbody>
             @foreach($users as $user)
               <tr>
                 <th scope="row"> {{$user->id}} </th>
                 <td> {{$user->name}} </td>
                 <td> {{$user->email}} </td>
                 <th> {{ implode(', ', $user->roles()->get()->pluck('name')->toArray())}}</th>
                 <td> 
                 <a href="{{route('admin.users.edit',$user->id)}}"><button type="button" class="btn-primary float-left"><span> <i class="fas fa-edit"></i>Edit </span></button></a>
                 <form action="{{route('admin.users.destroy',$user)}}" method="POST" class="float-left">
                 @csrf
                 {{ method_field('DELETE') }}
                 <button  type="submit" class="btn-warning"> <span> <i class="fa fa-trash" aria-hidden="true"></i>Delete</span> </button>
                 </form>
                 </td>
               </tr>      
             @endforeach
             </tbody>
           </table>      
       </div>
      </div>
     </div>
  </div>
</div>
@endsection