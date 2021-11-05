@extends('admin/layouts/master')

@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content container ">
        <div class="row mt-5">
            <div class="col-md-9 mx-auto">
                 <form action="{{ route('chefs.store') }}" method="POST" id="addChef" enctype="multipart/form-data">
                     @csrf
                     
                     <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Name</label>
                        <input type="text" class="form-control" name="name"  id="formGroupExampleInput2" placeholder="User Name">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Email</label>
                        <input type="text" class="form-control" name="email"  id="formGroupExampleInput2" placeholder="User Email">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Password</label>
                        <input type="password" class="form-control" name="password"  id="formGroupExampleInput2" placeholder="User Password">
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Phone</label>
                        <input type="text" class="form-control" name="phone"  id="formGroupExampleInput2" placeholder="User Phone">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Address</label>
                        <input type="text" class="form-control" name="address"  id="formGroupExampleInput2" placeholder="User Address">
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Description</label>
                        <textarea name="chef_description" class="form-control" id="formGroupExampleInput2" cols="30" rows="5"></textarea>
                    </div>

                    
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Salary</label>
                        <input type="text" class="form-control" name="salary"  id="formGroupExampleInput2" placeholder="Salary">
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
    toastr.options =
    {
        "closeButton" : true,
        "progressBar" : true
    }

    $('#addChef').submit(function(e){
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