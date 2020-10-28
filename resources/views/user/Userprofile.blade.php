<x-pagelayout>
<div class="container">
    <h1 class="mt-4 mb-4">User Profile</h1>
    <!-- Default form login -->
<form class=" border border-light p-5" action="{{route('post_userProfile')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(session("success"))
    <div class="alert alert-success">
        {{session("success")}}
    </div>
    @endif
    @if(session("error"))
    <div class="alert alert-danger">
        {{session("error")}}
    </div>
    @endif
    <label for="">UserName</label>
    <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->name}}" name="name" >
    <label for="">Email</label>
    <input type="email" name="email"  id="defaultLoginFormEmail" class="form-control mb-4" value="{{auth()->user()->email}}">

    <label for="">Photo</label>
    <input type="file" name="image"  id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
    <img src="{{asset('images/profiles/'.auth()->user()->image)}}" width="300px" height="300px"><br>

    <label for="">Old Password</label>
    <input type="password"name="old_password"  id="defaultLoginFormEmail" class="form-control mb-4">
 

    <label for="">New Password</label>
    <input type="password" id="defaultLoginFormEmail" class="form-control mb-4" name="new_password">

    <!-- Add Post button -->
    <button class="btn btn-info btn-block my-4" type="submit">update profile</button>

   

</form>
<!-- Default form login -->
</div>
</x-pagelayout>