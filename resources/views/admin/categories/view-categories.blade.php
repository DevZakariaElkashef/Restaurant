@extends('admin/layouts/master')
@section('style')
<style>
    .pagination > li > a,
    .pagination > li > span {
        background-color: #1111 !important;
    }
    
</style>
    
@endsection
@section('url') Categories @endsection
@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            
            <div class="row layout-top-spacing">
            
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="widget-content widget-content-area br-6">
                        <div class="table-responsive mb-4 mt-4">
                            <table id="zero-config" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="no-content text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                    <tr id="{{ $category->id }}">
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $category->name }}</td>
                                        <td class="text-center">
                                            
                                            <a class="mx-2" href="{{ route('categories.edit', $category->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                            </a>
                                            <a id="delCategory" class="mx-2" href="{{ route('categories.destroy', $category->id) }}" id="delUser" data-id="{{$category->id}}" title="Delete">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th class="text-center">Name</th>
                                        <th class="no-content text-center">Actions</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-center pagination">
                {!! $categories->links(); !!}
            </div>
        </div>
        <div class="footer-wrapper">
            <div class="footer-section f-section-1">
                <p class="">Copyright © 2020 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
            </div>
            <div class="footer-section f-section-2">
                <p class="">Coded with 
                    Zakaria Elkashef 
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                </p>
            </div>
        </div>
    </div>
    <!--  END CONTENT AREA  -->

@endsection

@section('js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
            $('body').on('click','#delCategory',function(e){
                e.preventDefault();
                var action= $(this).attr('href');
                var del_id= $(this).attr('data-id');
                $.ajax({
                    type:'DELETE',
                    url: action,
                    data:{'del_id':del_id},
                    success:function(data){
                        $('#'+data.id).remove();
                        toastr.success(data.message);
                    }
                })                
                
            })

    
    </script>
@endsection