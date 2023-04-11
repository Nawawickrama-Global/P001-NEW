@extends('layouts.dashboard.main')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}"
    rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Category</h4>
    </div>
</div>
<form action="{{ route('create-category') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="edit_category_id" value="" id="category_id">
    <input type="hidden" name="type" value="" id="type">
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title">Add New Category</h6>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text"
                                    class="form-control @error('email') is-invalid @enderror @error('name') is-invalid @enderror"
                                    name="name" id="name" autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ActivityStatus">Status</label>
                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                    name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Deactive</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description</label>
                                <textarea id="description"
                                    class="form-control @error('description') is-invalid @enderror" name="description"
                                    id="exampleFormControlTextarea1" rows="5"></textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Select Parent Category</label>
                                <select id="parent" name="category_id"
                                    class="form-control @error('category_id') is-invalid @enderror">
                                    <option value="none" default>None</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->category_id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Select Category Image</label>
                                <input type="file" name="image" id="myDropify"
                                    class="border @error('image') is-invalid @enderror" style="height: 300px" />
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" id="add-btn"
                                    class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- row -->
</form>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h6 class="card-title">Category List</h6>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Category Name
                                </th>
                                <th>
                                    Description
                                </th>

                                <th>
                                    Parent
                                </th>

                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allCategories as $key => $category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description }}</td>

                                <td>
                                    @if (isset($category->sub_category_id))
                                    {{ $category->parent->name }}
                                    @endif
                                </td>

                                <td>
                                    @if ($category->status == 'active')
                                    <span class="badge badge-primary">Active</span>
                                    @else
                                    <span class="badge badge-danger">Deative</span>
                                    @endif
                                </td>
                                <td>
                                    <table>
                                        <tr style="border: 0">
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- view --}}
                                                <button type="button" data-name="{{ $category->name }}"
                                                    data-description="{{ $category->description }}"
                                                    data-category_image="{{ URL::to('storage/images/' . $category->category_image) }}"
                                                    data-status="{{ $category->status }}"
                                                    class="btn btn-warning btn-sm btn-icon view" title="View">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- edit --}}
                                                <button type="button" @if (isset($category->sub_category_id))
                                                    data-id="{{ $category->sub_category_id }}"
                                                    data-category="sub"
                                                    data-parent="{{ $category->category_id }}"
                                                    @php
                                                    $catID = $category->sub_category_id;
                                                    $cat = "sub";
                                                    @endphp
                                                    @else
                                                    data-id="{{ $category->category_id }}"
                                                    data-category="category"
                                                    data-parent="none"
                                                    @php
                                                    $catID = $category->category_id;
                                                    $cat = "category";
                                                    @endphp @endif
                                                    data-name="{{ $category->name }}"
                                                    data-description="{{ $category->description }}"
                                                    data-category_image="{{ URL::to('storage/images/' .
                                                    $category->category_image)
                                                    }}"
                                                    data-status="{{ $category->status }}" class="btn btn-success btn-sm
                                                    btn-icon edit"
                                                    title="Edit">
                                                    <i data-feather="edit"></i>
                                                </button>
                                            </td>
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- Delete --}}
                                                <form action="{{ route('delete-category', [$cat, $catID]) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm btn-icon delete"
                                                        title="Delete">
                                                        <i data-feather="trash-2"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <span id="view-name"></span>
                                        <span id="view-status" class="badge badge-primary mx-3">Active</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <span id="view-description"></span>
                                    <hr class="my-2">
                                    <img id="view-image" src="{{ asset('assets/images/placeholder.jpg') }}"
                                        alt="display relavant image on here" style="width: 100%;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $('.view').click(function() {
            $('#view-name').text($(this).data('name'));
            $('#view-description').text($(this).data('description'));
            $('#view-image').attr('src', $(this).data('category_image'));
            if ($(this).data('status') == 'active') {
                $('#view-status').removeClass('badge badge-danger');
                $('#view-status').addClass('badge badge-primary');
                $('#view-status').text('Active');
            } else {
                $('#view-status').removeClass('badge badge-primary');
                $('#view-status').addClass('badge badge-danger');
                $('#view-status').text('Deactive');
            }
            $('#viewModal').modal('show');
        });

        $('.edit').click(function() {
            $('#name').val($(this).data('name'));
            $('#description').text($(this).data('description'));
            $('#category_id').val($(this).data('id'));
            $('#type').val($(this).data('category'));
            $("#status").val($(this).data('status')).change();
            $("#parent").val($(this).data('parent')).change();
            $("#add-btn").html('Update');
        });
</script>
@endpush