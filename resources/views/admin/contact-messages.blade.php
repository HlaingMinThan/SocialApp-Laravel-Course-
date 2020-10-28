<x-adminlayout>
  <h1>Contact Messages page</h1>
  <table class="table table-hover">
    <thead class="green white-text">
      <tr>
        <th scope="col">Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Messages</th>
        <th scope="col">update</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($messages as $message)
        <tr>
          <td>{{$message->id}}</td>
          <td>{{$message->username}}</td>
          <td>{{$message->email}}</td>
          <td>{{$message->messages}}</td>

          {{-- admin/contact-messages/edit/id --}}
          <td><a class="btn btn-sm green white-text" href="{{route('editMessage',$message->id)}}" >update</a></td>
          <td><a class="btn btn-sm red white-text" href="{{route("deleteMessage",$message->id)}}">Delete</a></td>
        </tr>
    @endforeach
        
        
    
    </tbody>
  </table>
</x-adminlayout>