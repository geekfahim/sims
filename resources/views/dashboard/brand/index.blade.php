@extends('layouts.master')
@section('title', 'Create Brands')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Brands') }}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{ __('Home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('Brands') }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">{{ __('Brands Table') }}</h3>
                <a href="{{ route('brand.create') }}" class="float-right btn btn-sm bg-gradient-primary"><i
                        class="fas fa-plus"></i>&nbsp;{{ __('Add New') }}</a>
            </div>
            <!-- /.card-header -->
            <!-- Table start -->
            <div class="card-body">
                <table class="table datatable table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Create At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $brand->name }}</td>
                                <td>{{ $brand->created_at }}</td>
                                <td>
                                    @if ($brand->status == 1)
                                        <span class="badge bg-gradient-warning">Active</span>
                                    @else
                                        <span class="badge bg-gradient-danger">Inactive</span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('brand.edit', $brand->id) }}"
                                        class="btn btn-sm bg-gradient-primary"><i
                                            class="far fa-edit"></i>&nbsp;{{ __('Edit') }}</a>
                                    <a href="" class="btn btn-sm bg-gradient-danger delete-btn" data-form-id="{{ $brand->id }}"
                                        ><i
                                            class="far fa-trash-alt"></i>&nbsp;{{ __('Delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.card -->
    </div>


@endsection

@push('scripts')
    <script>
        $('.datatable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        $('.delete-btn').on('click', function(e) {
            e.preventDefault();
            let form_id = $(this).data('form-id');
            swal({
                    title:"Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    var id = form_id;
                        $.ajax({
                            type:'DELETE',
                            url:'brand/' +id,
                            beforeSend: function(request) {
                                return request.setRequestHeader('X-CSRF-Token', $(
                                    "meta[name='csrf-token']").attr('content'));
                            },
                            success:function(response){
                                swal(response.success, {
                                    icon: "success",
                                });
                                location.reload();
                            }
                        })
                    } else {
                        swal("Your file is safe!");
                    }
                });
        })
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush
