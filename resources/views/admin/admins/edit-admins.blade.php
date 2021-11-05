@extends('admin/layouts/master')
@section('url') Add Users @endsection
@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content container ">
       <div class="row mt-5">
           <div class="col-md-9 mx-auto">
                <form action="{{ route('admins.update', $row->id) }}" method="POST" id="editChef" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Name</label>
                        <input type="text" class="form-control" name="name"  id="formGroupExampleInput2" placeholder="User Name" value="{{ $row->name }}">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="text" class="form-control" name="email"  id="formGroupExampleInput2" placeholder="User Email" value="{{ $row->email }}">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" class="form-control" name="password"  id="formGroupExampleInput2" placeholder="User Password">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Role</label>
                        <select class="form-control  role" name="role">
                            @foreach ($roles as $role)
                            <option value="{{ $role }}" @if($role == $row->role) selected @endif>{{ $role }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Phone</label>
                        <input type="text" class="form-control" name="phone"  id="formGroupExampleInput2" placeholder="User Phone" value="{{ $row->phone }}">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Address</label>
                        <input type="text" class="form-control" name="address"  id="formGroupExampleInput2" placeholder="User Address" value="{{ $row->address }}">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Salary</label>
                        <input type="text" class="form-control" name="salary"  id="formGroupExampleInput2" placeholder="Salary" value="{{ $row->salary }}">
                    </div>

                    <div class="custom-file mb-4">
                        <input type="file" name="image" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose Image</label>
                    </div>
 

                    <input type="submit" name="time" class="btn btn-primary">
                </form>
           </div>
       </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection

@section('js')
    <script>
        var ss = $(".role").select2({
            tags: true,
        });
    </script>
    
    <script>
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }

        $('#editChef').submit(function(e){
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