@extends('admin/layouts/master')
@section('content')
        
     <!--  BEGIN CONTENT AREA  -->
     <div id="content" class="main-content">
        <div class="layout-px-spacing">                
            <form id="editAccount" action="{{ route('account.update', Auth::user()->id) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="account-settings-container layout-top-spacing">
                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                        <div class="info">
                                            <h6 class="">General Information</h6>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input name="image" type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('img/users/'. Auth::user()->image) }}" data-max-file-size="2M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Full Name</label>
                                                                            <input type="text" name="name" class="form-control mb-4" id="fullName" placeholder="Full Name" value="{{ Auth::user()->name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <label class="dob-input">Date of Birth</label>
                                                                        <div class="d-sm-flex d-block">
                                                                            <div class="form-group mr-1">
                                                                                <input type="text" name="day" class="form-control " placeholder="Day" value="{{ Auth::user()->day }}">
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                                <input type="text" name="mounth" class="form-control " placeholder="Mounth" value="{{ Auth::user()->mounth }}">
                                                                            </div>
                                                                            <div class="form-group mr-1">
                                                                                <input type="text" name="year" class="form-control " placeholder="Year" value="{{ Auth::user()->year }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="password">Password</label>
                                                                        <input type="password" name="password" class="form-control mb-4" id="profession" placeholder="New Password ?">
                                                                    </div>
                                                                    <div class="form-group col-sm-6">
                                                                        <label for="profession">Profession</label>
                                                                        <input type="text" name="jop" class="form-control mb-4" id="profession" placeholder="Your Jop" value="{{ Auth::user()->jop }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    
                                        <div class="info">
                                            <h5 class="">About</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="form-group">
                                                        <label for="aboutBio">Bio</label>
                                                        <textarea name="bio" class="form-control" id="aboutBio" placeholder="Tell something interesting about yourself" rows="10">{{ Auth::user()->bio }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>


                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    
                                        <div class="info">
                                            <h5 class="">Contact</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="country">Country</label>
                                                                <input type="text" name="country" class="form-control" value="{{ Auth::user()->country }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="address">Address</label>
                                                                <input type="text" name="address" class="form-control mb-4" id="address" placeholder="Address" value="{{ Auth::user()->address }}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Location</label>
                                                                <input type="text" name="location" class="form-control mb-4" id="location" placeholder="Location" value="{{ Auth::user()->location }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" name="phone" class="form-control mb-4" id="phone" placeholder="Write your phone number here" value="{{ Auth::user()->phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Email</label>
                                                                <input type="text" name="email" class="form-control mb-4" id="email" placeholder="Write your email here" value="{{ Auth::user()->email }}">
                                                            </div>
                                                        </div>                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1">Website</label>
                                                                <input type="text" name="website" class="form-control mb-4" id="website1" placeholder="Write your website here" value="{{ Auth::user()->website }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing mb-5">
                                    
                                        <div class="info">
                                            <h5 class="">Social</h5>
                                            <div class="row">

                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-linkedin mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="linkedin"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-linkedin"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path><rect x="2" y="9" width="4" height="12"></rect><circle cx="4" cy="4" r="2"></circle></svg></span>
                                                                </div>
                                                                <input type="text" name="instagram" class="form-control" placeholder="Instagram Link" aria-label="Username" aria-describedby="instagram" value="{{ Auth::user()->instagram }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group social-tweet mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="tweet"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg></span>
                                                                </div>
                                                                <input type="text" name="twitter" class="form-control" placeholder="Twitter Link" aria-label="Username" aria-describedby="tweet" value="{{ Auth::user()->twiiter }}">
                                                            </div>
                                                        </div>                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="input-group social-fb mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="fb"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg></span>
                                                                </div>
                                                                <input type="text" name="facebook" class="form-control" placeholder="Facebook Link" aria-label="Username" aria-describedby="fb" value="{{ Auth::user()->facebook }}">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input-group social-github mb-3">
                                                                <div class="input-group-prepend mr-3">
                                                                    <span class="input-group-text" id="github"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg></span>
                                                                </div>
                                                                <input type="text" name="github" class="form-control" placeholder="Github Link" aria-label="Username" aria-describedby="github" value="{{ Auth::user()->github }}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">

                            <button id="multiple-reset" class="btn btn-primary">Reset All</button>
                            
                            <button class="btn btn-dark" type="submit">Save Changes</button>

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection

@section('js')
    <script>
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }

        $('#editAccount').submit(function(e){
            e.preventDefault();
            var addAction = $(this).attr('action');
            
            $.ajax({
                url: addAction,
                type: 'POST',
                data: new FormData( this ),
                processData: false,
                contentType: false,
                success: function (data) {
                    toastr.success(data.message);
                },error:function(err){
                    $.each(err.responseJSON.errors,function(key,item){
                        toastr.error(item);
                    })

                }
                
            });
        })
    </script>
    
@endsection