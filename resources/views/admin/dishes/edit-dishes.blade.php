@extends('admin/layouts/master')
@section('url') Edit Dishes @endsection
@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content container ">
       <div class="row mt-5">
           <div class="col-md-9 mx-auto">
                <form action="{{ route('dishes.update', $row->id) }}" method="POST" id="editDish" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Category Name</label>
                        <select class="form-control category-name" name="category_id">
                            @foreach ($categories as $item)
                            <option value="{{ $item->id }}" @if($item->id === $row->category->id) selected @endif>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Dish Name</label>
                        <input type="text" class="form-control" name="name"  id="formGroupExampleInput2" placeholder="Dish Name" value="{{ $row->name }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Dish Price</label>
                        <input type="text" class="form-control" name="price"  id="formGroupExampleInput2" placeholder="Dish Price" value="{{ $row->price }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="formGroupExampleInput2">Dish Quantity</label>
                        <input type="text" class="form-control" name="quantity"  id="formGroupExampleInput2" placeholder="Dish Quantity" value="{{ $row->quantity }}">
                    </div>

                    <div class="form-group mb-4">
                        <label for="dishContent">Dish Content</label>
                        <textarea name="content"  class="form-control" id="dishContent" cols="30" rows="10" placeholder="Dish Content">{{ $row->content }}</textarea>
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
        var ss1 = $(".branch-name").select2({
            tags: true,
        });
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

        $('#editDish').submit(function(e){
            e.preventDefault();
            var editAction = $(this).attr('action');
            
            $.ajax({
                url: editAction,
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