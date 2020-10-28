<x-pagelayout>
    <div class="container-fluid">
        <h1 class="mt-4">Contact Us</h1>
        <div class="row">
            <div class="col-md-6">
                <!-- map here -->
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d488797.79263107065!2d95.9006911824387!3d16.839608859527115!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1949e223e196b%3A0x56fbd271f8080bb4!2sYangon!5e0!3m2!1sen!2smm!4v1602572367819!5m2!1sen!2smm" width="600" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
            <div class="col-md-6">
                <!-- Default form login -->
    <form class="text-center border border-light p-5" action="{{route('post_contact_messaage')}}" method="post">
        @csrf
        <p class="h4 mb-4">Contact Us</p>

        <!-- username -->
        <input type="text" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="username" name='username'>
        @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" name="email">
        @error('email')
            <p class="text-danger">{{$message}}</p>
        @enderror
        <!-- message -->
        <textarea  id="" cols="30" rows="10"  class="form-control mb-4" placeholder="your message" name="message"></textarea>
        @error('message')
            <p class="text-danger">{{$message}}</p>
        @enderror
        
        <!-- send message button -->
        <button class="btn btn-info btn-block my-4" type="submit">send message</button>

    
    </form>
    <!-- Default form login -->
            </div>
        </div>
    </div>
</x-pagelayout>