@extends('admin/layouts/master')
@section('url')Edit Categories @endsection
@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content container ">
       <div class="row mt-5">
           <div class="col-md-9 mx-auto">
                <form action="{{ route('categories.update', $row->id) }}" method="POST" id="editCategory">
                    @method('PUT')
                    @csrf
                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Category Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $row->name }}" id="formGroupExampleInput2" placeholder="Meal Category">
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
        var ss1 = $(".branch-name").select2({
            tags: true,
        });
    </script>
    
    <script>
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }

        $('#editCategory').submit(function(e){
            e.preventDefault();
            var addAction = $(this).attr('action');
            var addData = $(this).serialize();
            
            $.ajax({
                url:addAction,
                type: "POST",
                data: addData,
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