<x-pagelayout>
    <div class="container mt-5">
        <h1>{{$post->title}}</h1>
        <img src="{{asset('images/posts/'.$post->image)}}" width="1000px" height="600px" class="mr-3">
        <p class="mt-3">{{$post->content}}</p>
        <div class="text-center">
          
            @can("premiumAdminPostowner",$post->id)
                <a href="{{route('editPost',$post->id)}}" class="btn btn-success">Edit Post</a>
                <a href="{{route('deletePost',$post->id)}}" class="btn btn-danger ml-3">Delete Post</a>
            @endcan
          
        </div>
    </div>
</x-pagelayout>