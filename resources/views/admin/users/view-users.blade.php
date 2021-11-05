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
    <div id="content" class="main-content container ">
       <div class="row mt-4">
           <div class="col-md-9 mx-auto">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">ِAddress</th>
                                <th class="text-center">ِRole</th>
                                <th class="text-center">ِSalary</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $row)
                                <tr id="{{ $row->id }}">
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{!! Str::substr($row->name, 0, 10) !!}</td>
                                    <td class="text-center">{!! Str::substr($row->email, 0, 10) !!}</td>
                                    <td class="text-center">{{ $row->phone }}</td>
                                    <td class="text-center">{{ $row->address }}</td>
                                    <td class="text-center">{{ $row->role }}</td>
                                    <td class="text-center">{{ $row->salary }}</td>
                                    <td class="text-center">
                                        <ul class="table-controls list-unstyled row justify-content-around align-items-center mx-1">
                                            <li><a href="{{ route('users.edit', $row->id) }}" title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a></li>
                                            <li><a id="delUser" href="{{ route('users.destroy', $row->id) }}" data-id="{{$row->id}}" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-center pagination">
                 {!! $rows->links(); !!}
             </div>
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