@extends('layouts.dashboard.main')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropzone/dropzone.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/dropify/css/dropify.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Variations</h4>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <p>Add Attribute</p>
    </div>
    <div class="card-body">
        <form action="{{ route('create-variation') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id">
            <input type="hidden" name="attribute_id" value="{{ $attribute_id }}">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Attribute :</label>
                    <input type="text" class="form-control" value="{{ $attributeName }}" disabled>
                    <input type="hidden" name="attribute_id" value="{{ $attribute_id }}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Variation Name :</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="">Price Presentage :</label>
                    <input type="number" name="percentage" id="percentage" class="form-control @error('percentage') is-invalid @enderror">
                    @error('percentage')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-md-4">
                    <div class="mb-3">
                        <label class="form-label" for="formFile">Upload an image for variation :</label>
                        <input class="form-control-file @error('file') is-invalid @enderror" name="file" type="file" id="formFile">
                        @error('file')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12 text-right">
                    <button type="submit" id="add-btn" class="btn btn-primary">Add Attribute</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card mt-4">
    <div class="card-header">
        <p>Attribute List</p>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Presentage (%)</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($variations as $index => $variation)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $variation->name }}</td>
                        <td>{{ $variation->percentage }}</td>
                        <td>


                            <form action="{{ route('delete-variation', $variation->variation_id) }}" method="post">
                                <button type="button" class="btn btn-warning btn-sm btn-icon" title="View Image">
                                    <i data-feather="eye"></i>
                                </button>
                                <button type="button" data-id="{{ $variation->variation_id }}" data-name="{{ $variation->name }}" data-percentage="{{ $variation->percentage }}" class="btn btn-success btn-sm btn-icon edit" title="Edit">
                                    <i data-feather="edit"></i>
                                </button>
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-sm btn-icon delete" title="Delete">
                                    <i data-feather="trash-2"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
    $('.edit').click(function() {
        $('#id').val($(this).data('id'));
        $('#name').val($(this).data('name'));
        $('#percentage').val($(this).data('percentage'));
        $('#add-btn').text('Update Attribute');
    });
</script>
@endpush