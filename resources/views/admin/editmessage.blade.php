<x-adminlayout>
<form class="text-center border border-light p-5" action="{{route('updateMessage',$updateData->id)}}" method="post">
        @csrf
        <p class="h4 mb-4">Update Message</p>

        <!-- username -->
        <input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="username" name='username' value="{{$updateData->username}}">
        @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email"  value="{{$updateData->email}}">
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <!-- message -->
        <textarea  id="" cols="30" rows="10"  class="form-control mb-4" placeholder="your message" name="message">{{$updateData->messages}}</textarea>
        @error('message')
            <p class="text-danger">{{$message}}</p>
        @enderror
        
        <!-- send message button -->
        <button class="btn btn-info btn-block my-4" type="submit">update</button>

    
    </form>
</x-adminlayout>