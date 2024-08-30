@extends('frontend.layouts.app')
@section('title') CRICKET247BUZZ @endsection
@section('content')
 <!--Main Section-->
 <main>
    <div class="container">
        <h5 class="mt-2  text-white p-2"  style="background-color:#2d3387;" >Change Password</h5>
        <section class="section register d-flex flex-column align-items-center justify-content-center mt-5 ">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <!-- <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <img src="image/logo.png" alt="" width="250px" height="100px">
                            </a>
                        </div> -->
                        
                        <div class="card mb-5">
                            @include('frontend.message')
                            <div class="card-body">
                                <div class="">
                                    <h5 class="card-title text-center">
                                        <img src="https://media.istockphoto.com/id/1407633532/vector/forget-password-icon-account-protection-security-key-danger-warning-wrong-password-design.jpg?s=612x612&w=0&k=20&c=ndcQG3ade6MLqbFbD5-pGgJSM-I76IFxHXAUmeY9Bfw=" width="50px" height="50px">
                                    </h5>
                                </div>
                                <form action="{{ route('front.updatePassword') }}" method="post" class="row g-3 ">
                                    @csrf
                                    <div class="col-12">
                                        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror " value="{{ old('old_password') }}"  id="old_password" placeholder="Old Password">
                                        @error('old_password')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror  
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror " value="{{ old('new_password') }}"   id="new_password" placeholder="New Password">
                                        @error('new_password')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror 
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="confirm_password" class="form-control  @error('confirm_password') is-invalid @enderror " id="confirm_password" placeholder="Confirm New Password">
                                        @error('confirm_password')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                        @enderror 
                                    </div>
                                    <div class="col-12">
                                        <button class="btn text-white w-100 mb-3 " style="background-color:#2d3387;"  type="submit">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>
<!--Main Section-->
@endsection
@section('javascript')
    <script>
    </script>
@endsection