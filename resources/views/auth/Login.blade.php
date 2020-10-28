<x-authlayout>
<div class="container">
    <div class="col-md-4 offset-4 mt-5">
        <!-- Default form login -->
    <form class="text-center border border-light p-5" action="{{route('post_login')}}" method="post">
        @csrf
        <p class="h4 mb-4 pink-text">Sign in</p>
        @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif
        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" name="password">
        @error('password')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="d-flex justify-content-around">
           
            <div>
                <!-- Forgot password -->
                <a href="">Forgot password?</a>
            </div>
        </div>
    
        <!-- Sign in button -->
        <button class="btn pink white-text btn-block my-4" type="submit">Sign in</button>
    
        <!-- Register -->
        <p>Not a member?
            <a href="{{route("register")}}">Register</a>
        </p>
    
    </form>
    <!-- Default form login -->
        
    </div>
</div>
</x-authlayout>