<x-adminlayout>
<h1>manage premium users page</h1>
<table class="table table-hover">
  <thead class="green white-text">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">isAdmin</th>
      <th scope="col">isPremium</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
   @foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->email}}</td>
        <td><b>{{$user->isAdmin=='0'? "FALSE":"TRUE" }}</b></td>
        <td><b>{{$user->isPremium=='0'?"FALSE":"TRUE"}}</b></td>
      
        <td><a class="btn btn-sm green white-text" href="{{route('editUser',$user->id)}}">update</a></td>
        <td><a class="btn btn-sm red white-text" href="{{route('deleteUser',$user->id)}}">Delete</a></td>
    </tr>
   @endforeach
      
      
  
  </tbody>
</table>
</x-adminlayout>