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
        <h4 class="mb-3 mb-md-0">Attributes</h4>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <p>Add Attribute</p>
    </div>
    <div class="card-body">
        <form action="{{ route('create-attribute') }}" method="post">
            @csrf
            <input type="hidden" name="id" id="id">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Name :</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Description :</label>
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
                    @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
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
                        <th>Description</th>
                        <th>Number of variations</th>
                        <th width="15%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($attributes as $index => $attribute)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $attribute->name }}</td>
                        <td>{{ $attribute->description }}</td>
                        <td>{{ $attribute->variation->count() }}</td>
                        <td>

                            <form action="{{ route('delete-attribute', $attribute->attribute_id) }}" method="post">
                                <button type="button" data-id="{{ $attribute->attribute_id }}" data-name="{{ $attribute->name }}" data-description="{{ $attribute->description }}" class="btn btn-success btn-sm btn-icon edit" title="Edit">
                                    <i data-feather="edit"></i>
                                </button>
                                @csrf
                                @method('delete')
                                <button type="button" class="btn btn-danger btn-sm btn-icon delete" title="Delete">
                                    <i data-feather="trash-2"></i>
                                </button>
                                <button onclick="location.href='{{ route('variations', $attribute->attribute_id) }}'" type="button" class="btn btn-primary btn-sm btn-icon" title="Add Variations">
                                    <i data-feather="cloud"></i>
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
        $('#description').val($(this).data('description'));
        $('#add-btn').text('Update Attribute');
    });
</script>
@endpush