@extends('admin/layouts/master')
@section('url') Dishes @endsection
@section('style')
<style>
    .pagination > li > a,
    .pagination > li > span {
        background-color: #1111 !important;
    }
    
</style>
    
@endsection
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
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Dish Name</th>
                                        <th class="text-center">Dish Price</th>
                                        <th class="text-center">Dish Quantity</th>
                                        <th class="text-center">Dish Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dishes as $dish)
                                    <tr id="{{ $dish->id }}">
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ $dish->category->name }}</td>
                                        <td class="text-center">{{ $dish->name }}</td>
                                        <td class="text-center">{{ $dish->price }}</td>
                                        <td class="text-center">{{ $dish->quantity }}</td>
                                        <td class="text-center"><img width="100" src="{{ asset('img/dishes/'.$dish->image) }}" alt="{{ $dish->image }}"></td>
                                        <td class="text-center">
                                            <ul class="table-controls list-unstyled row justify-content-around align-items-center mx-1">
                                                <li><a href="{{ route('dishes.edit', $dish->id) }}" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                                <li><a id="delDish" href="{{ route('dishes.destroy', $dish->id) }}" data-id="{{$dish->id}}" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Category Name</th>
                                        <th class="text-center">Dish Name</th>
                                        <th class="text-center">Dish Price</th>
                                        <th class="text-center">Dish Quantity</th>
                                        <th class="text-center">Dish Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

            <div class="d-flex justify-content-center pagination">
                {!! $dishes->links(); !!}
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
        
            $('body').on('click','#delDish',function(e){
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