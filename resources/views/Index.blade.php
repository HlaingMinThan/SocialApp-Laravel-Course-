<x-pagelayout>
    {{-- background image --}}
    <header></header>
    {{--posts--}}
    <div class="container">
        <h1 class="mt-3">All posts</h1>
        <div class="row">
    
            @foreach($posts as $post) {{--[1,2,3,4,5,6,7,8]}}
            {{-- post card --}}
            <div class="col-md-4 mt-3">
                <!-- Card -->
                <div class="card">

                    <!-- Card image -->
                    <div class="view overlay">
                    <img class="card-img-top" src="{{asset('images/posts/'.$post->image)}}"
                        alt="Card image cap">
                    <a href="#!">
                        <div class="mask rgba-white-slight"></div>
                    </a>
                    </div>
                
                    <!-- Card content -->
                    <div class="card-body">
                
                    <!-- Title -->
                    <h4 class="card-title">{{$post->title}} </h4><p>( posted by {{$post->user->name}}  )</p>
        
                    <!-- Button -->
                    <a href="{{url("/posts/$post->id")}}" class="btn btn-primary">See More</a>
                
                    </div>
                
                </div>
                <!-- Card -->
            </div>
            @endforeach
            
        </div>
    </div>
</x-pagelayout>