@extends('admin/layouts/master')
@section('style')
<style>
    .pagination > li > a,
    .pagination > li > span {
        background-color: #1111 !important;
    }
    
</style>
    
@endsection
@section('url') Users @endsection
@section('content')
        
    <!--  BEGIN CONTENT AREA  -->
    <div id="content" class="main-content">
        <div class="layout-px-spacing">                
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container list">

                        <div class="row">
                            <div class="col-xl-4 col-lg-5 col-md-5 col-sm-7 filtered-list-search layout-spacing align-self-center">
                                <form class="form-inline my-2 my-lg-0">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                        <input type="text" class="form-control product-search" id="input-search" placeholder="Search Contacts...">
                                    </div>
                                </form>
                            </div>

                            <div class="col-xl-8 col-lg-7 col-md-7 col-sm-5 text-sm-right text-center layout-spacing align-self-center">
                                <div class="d-flex justify-content-sm-end justify-content-center">
                                    <a href="{{ route('admins.create') }}">
                                        <svg id="btn-add-contact" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                                    </a>

                                    <div class="switch align-self-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list view-list active-view"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3" y2="6"></line><line x1="3" y1="12" x2="3" y2="12"></line><line x1="3" y1="18" x2="3" y2="18"></line></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid view-grid"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                    </div>
                                </div>

                                

                            </div>
                        </div>

                        <div class="searchable-items list">
                            <div class="items items-header-section">
                                <div class="item-content">
                                    <div class="">
                                        <div class="n-chk align-self-center text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                              <input type="checkbox" class="new-control-input" id="contact-check-all">
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <h4>Name</h4>
                                    </div>
                                    <div class="user-email">
                                        <h4>Email</h4>
                                    </div>
                                    <div class="user-location">
                                        <h4 style="margin-left: 0;">Location</h4>
                                    </div>
                                    <div class="user-phone">
                                        <h4 style="margin-left: 3px;">Phone</h4>
                                    </div>
                                    <div class="action-btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2  delete-multiple"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                    </div>
                                </div>
                            </div>
                            @foreach ($admins as $admin)

                            <div class="items" id="{{ $admin->id }}">
                                <div class="item-content">
                                    <div class="user-profile">
                                        <div class="n-chk align-self-center text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                              <input type="checkbox" class="new-control-input contact-chkbox">
                                              <span class="new-control-indicator"></span>
                                            </label>
                                        </div>
                                        <img src="{{ asset('img/users/'.$admin->image) }}" class="img-thumbnail" alt="avatar">
                                        <div class="user-meta-info">
                                            <p class="user-name" data-name="{{ $admin->name }}">{{ $admin->name }}</p>
                                            <p class="user-work" data-occupation="{{ $admin->role }}">{{ $admin->role }}</p>
                                        </div>
                                    </div>
                                    <div class="user-email">
                                        <p class="info-title">Email: </p>
                                        <p class="usr-email-addr" data-email="{{ $admin->email }}">{{ $admin->email }}</p>
                                    </div>
                                    <div class="user-location">
                                        <p class="info-title">Location: </p>
                                        <p class="usr-location" data-location="{{ $admin->address }}">{{ $admin->address }}</p>
                                    </div>
                                    <div class="user-phone">
                                        <p class="info-title">Phone: </p>
                                        <p class="usr-ph-no" data-phone="{{ $admin->phone }}">{{ $admin->phone }}</p>
                                    </div>
                                    <div class="action-btn">
                                        <a href="{{ route('admins.edit', $admin->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                        </a>
                                        <a href="{{ route('admins.destroy', $admin->id) }}" id="delUser" data-id="{{$admin->id}}" title="Delete">
                                            <i class="fas fa-user-minus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center pagination">
            {!! $admins->links(); !!}
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
    
        $('body').on('click','#delUser',function(e){
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