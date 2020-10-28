<x-pagelayout>
    <div class="container">
        <h1 class="mt-4 mb-4">Edit Post</h1>

    <form class=" border border-light p-5" action="{{route("updatePost",$updateData->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Title</label>
        <input type="text" id="defaultLoginFormEmail" class="form-control mb-4" name="title" value="{{$updateData->title}}">

        <label for="">Photo</label>
        <input type="file" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="image">
        <img src="{{asset('images/posts/'.$updateData->image)}}" width="300px" height="300px"><br>


        <label for="">Content</label>
        <textarea name="content" id="" cols="30" rows="10" class="form-control mb-4" >
            {{$updateData->content}}
        </textarea>

        <!-- Add Post button -->
        <button class="btn btn-info btn-block my-4" type="submit" id="alert-target" type="submit">update Post</button>
    </form>
    </div>
</x-pagelayout>