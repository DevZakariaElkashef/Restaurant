@extends('admin/layouts/master')
@section('url') Add Dishes @endsection
@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content container ">
       <div class="row mt-5">
           <div class="col-md-9 mx-auto">
                <form action="{{ route('dishes.store') }}" method="POST" id="addDish" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Category Name</label>
                        <select class="form-control category-name" name="category_id">
                            @foreach ($categories as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Dish Name</label>
                        <input type="text" class="form-control" name="name"  id="formGroupExampleInput2" placeholder="Dish Name">
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Dish Price</label>
                        <input type="text" class="form-control" name="price"  id="formGroupExampleInput2" placeholder="Dish Price">
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Dish Quantity</label>
                        <input type="text" class="form-control" name="quantity"  id="formGroupExampleInput2" placeholder="Dish Quantity">
                    </div>

                    <div class="form-group mb-4">
                        <label for="dishContent">Dish Content</label>
                        <textarea name="content"  class="form-control" id="dishContent" cols="30" rows="10" placeholder="Dish Content"></textarea>
                    </div>

                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>Upload (Dish Image) <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                        <label class="custom-file-container__custom-file" >
                            <input type="file" name="image" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <div class="custom-file-container__image-preview"></div>
                    </div>
                    
                    <input type="submit" name="submit" class="btn btn-primary">
                </form>
           </div>
       </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection

@section('js')
    <script>
        var ss1 = $(".category-name").select2({
            tags: true,
        });
    </script>
    
    <script>
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }

        $('#addDish').submit(function(e){
            e.preventDefault();
            var addAction = $(this).attr('action');
            var addData = $(this).serialize();
            
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

    <script>
        // Basic
        new SimpleMDE({
            element: document.getElementById("dishContent"),
            spellChecker: false,
        });

        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
    </script>
    
@endsection