@extends('admin.layouts.auth')
@section('title')
Signup | Chatbots
@endsection
@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-xl-8 col-10 d-flex justify-content-center">
                        <div class="card bg-authentication rounded-0 mb-0">
                            <div class="row m-0">
                                <div class="col-lg-6 d-lg-block d-none text-center align-self-center pl-0 pr-3 py-0">
                                    <img style="width:400px;" src="{{ asset('public/app-assets/images/pages/register.jpg')}}" alt="branding logo">
                                </div>
                                <div class="col-lg-6 col-12 p-0">
                                    <div class="card rounded-0 mb-0 p-2">
                                        <div class="card-header pt-50 pb-1">
                                            <div class="card-title">
                                                <h4 class="mb-0">Create Account</h4>
                                            </div>
                                        </div>

                                        @if ($message = Session::get('success'))
                    <div class="alert alert-success" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @elseif ($message = Session::get('danger'))
                    <div class="alert alert-danger" id="msg">
                        <p>{{ $message }}</p>
                    </div>
                  @endif


                                        <p class="px-2">Fill the below form to create a new account.</p>
                                        <div class="card-content">
                                            <div class="card-body pt-0">
                                                <form method="POST" action="{{ route('sign-up.store') }}">
                                                    @csrf
                                                    <input type="hidden" value="2" name="role_id">
                                                    <div class="form-label-group">

                                                    <div class="form-label-group">
                                                        <input type="text" id="inputName" class="form-control" placeholder="Full Name" name="name" required>
                                                        <label for="inputName">Full Name</label>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="email" required>
                                                        <label for="inputEmail">Email</label>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="phone" id="inputContact" class="form-control" placeholder="Contact Number" name="phone" required>
                                                        <label for="inputContact">Contact Number</label>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required>
                                                        <label for="inputUsername">Username</label>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                                                        <label for="inputPassword">Password</label>
                                                    </div>

                                                    <div class="form-label-group">
                                                        <input type="password" id="inputConfPassword" class="form-control" placeholder="Confirm Password" name="password2" required>
                                                        <label for="inputConfPassword">Confirm Password</label>
                                                    </div>
                                                    
                                                    <a href="{{ URL::to('/log-in') }}" class="btn btn-outline-primary float-left btn-inline mb-50">Login</a>
                                                    <button type="submit" class="btn btn-primary float-right btn-inline mb-50">Register</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    

<script type="text/javascript">
$('#inputIndustry').select2();

</script>

@endsection