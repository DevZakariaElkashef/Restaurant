@extends('admin/layouts/master')
@section('content')
        
     <!--  BEGIN CONTENT AREA  -->
     <div id="content" class="main-content">
        <div class="layout-px-spacing">                
            <form id="editRestaurant" action="{{ route('restaurant.update', $restaurant->id) }}" method="POST">
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
                                                                <input name="logo" type="file" id="input-file-max-fs" class="dropify" data-default-file="{{ asset('img/'. $restaurant->logo) }}" data-max-file-size="2M" />
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> Upload Picture</p>
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="fullName">Site Name</label>
                                                                            <input type="text" name="name" class="form-control mb-4" id="fullName" placeholder="Site Name" value="{{ $restaurant->name }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="siteemail">Site Email</label>
                                                                            <input type="email" name="email" class="form-control mb-4" id="siteemail" placeholder="Site Email" value="{{ $restaurant->email }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="siteAddress">Site Address</label>
                                                                            <input type="text" name="address" class="form-control mb-4" id="siteAddress" placeholder="Site Address" value="{{ $restaurant->address }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label for="secondAddress">Another Address</label>
                                                                            <input type="text" name="another_address" class="form-control mb-4" id="secondAddress" placeholder="Another Address" value="{{ $restaurant->another_address }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="sitePhone">Site Phone</label>
                                                                            <input type="text" name="phone" class="form-control mb-4" id="sitePhone" placeholder="Site Phone" value="{{ $restaurant->phone }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <div class="form-group">
                                                                            <label for="another_phone">Another Phone</label>
                                                                            <input type="text" name="another_phone" class="form-control mb-4" id="another_phone" placeholder="Another Phone" value="{{ $restaurant->another_phone }}">
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

                            </div>
                        </div>
                    </div>

                    <div class="account-settings-footer">
                        
                        <div class="as-footer-container">

                            <a id="multiple-reset" class="btn btn-primary">Reset All</a>
                            
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

        $('#editRestaurant').submit(function(e){
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