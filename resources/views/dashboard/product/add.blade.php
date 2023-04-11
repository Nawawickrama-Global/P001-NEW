@extends('layouts.dashboard.main')

@push('plugin-styles')
<link href="{{ asset('assets/plugins/simplemde/simplemde.min.css') }}" rel="stylesheet" />
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
        <h4 class="mb-3 mb-md-0">Product</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <a type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0 text-light" href="./view-product">
            <i class="btn-icon-prepend" data-feather="list"></i>
            View Products
        </a>
    </div>
</div>
<form action="{{ route('add-new-product') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title">Add Product</h6>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input value="{{ old('title') }} " value="{{ old('title') }} " id="text" type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="email" autofocus>
                                @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">SKU</label>
                                <input value="{{ old('sku') }} " id="number" type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" autocomplete="email" autofocus>
                                @error('')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Feature Image</label>
                                <input value="{{ old('feature_img') }} " type="file" name="feature_img" id="myDropify" class="border @error('feature_img') is-invalid @enderror" style="height: 300px" />
                                @error('feature_img')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                    
                            <div class="form-group">
                                <label for="exampleInputPassword1">Specifications</label>
                                <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5">{{ old('short_description') }}</textarea>
                                @error('short_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- NEWLY ADDED -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Product Sheet</label>
                                <textarea name="product_sheet" class="form-control @error('product_sheet') is-invalid @enderror" id="" rows="5">{{ old('product_sheet') }}</textarea>
                                @error('product_sheet')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ActivityStatus">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="active">Active</option>
                                    <option value="inactive">Deactive</option>
                                </select>
                                @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- NEWLY ADDED -->
                            <div class="form-group" style="text-align: left">
                                <label for="">Select Attributes</label><br>
                                @foreach ($attributes as $index => $attribute)
                                <input type="checkbox" name="attr{{ $attribute->attribute_id }}" value="{{ $attribute->attribute_id}}" id="check{{ $index }}">
                                <label for="check{{ $index }}">{{ $attribute->name }}</label>
                                @endforeach
                                <input type="checkbox" name="faux_and_synthetic" value="1" id="f_and_s">
                                <label for="f_and_s">Faux & Synthetic Leather</label>
                            </div>

                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="">Product Images (Optional)</label>
                                <div class="input-group mb-1">
                                    <div class="custom-file">
                                      <input type="file" name="image1" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                      <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="custom-file">
                                      <input type="file" name="image2" class="custom-file-input" id="inputGroupFile02" aria-describedby="inputGroupFileAddon02">
                                      <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="custom-file">
                                      <input type="file" name="image3" class="custom-file-input" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03">
                                      <label class="custom-file-label" for="inputGroupFile03">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="input-group mb-1">
                                    <div class="custom-file">
                                      <input type="file" name="image4" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                                      <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                    </div>
                                  </div>
                                  <div class="input-group mb-4">
                                    <div class="custom-file">
                                      <input type="file" name="image5" class="custom-file-input" id="inputGroupFile05" aria-describedby="inputGroupFileAddon05">
                                      <label class="custom-file-label" for="inputGroupFile05">Choose file</label>
                                    </div>
                                  </div>
                                  
                                <div class="form-group">
                                    {{-- <input type="file" name="image1"/> --}}
                                    {{-- <input type="file" name="image2"/>
                                    <input type="file" name="image3"/>
                                    <input type="file" name="image4"/>
                                    <input type="file" name="image5"/> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Shipping</label>
                                <textarea name="long_description" class="form-control @error('title') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5">{{ old('long_description') }}</textarea>
                                @error('long_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <!-- NEWLY ADDED -->
                            <div class="form-group">
                                <label for="exampleInputPassword1">Clean & Care</label>
                                <textarea name="clean_and_care" class="form-control @error('clean_and_care') is-invalid @enderror" id="exampleFormControlTextarea1" rows="5">{{ old('clean_and_care') }}</textarea>
                                @error('clean_and_care')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Brand</label>
                                        <select name="brand_id" id="multiple" class="@error('brand_id') is-invalid @enderror">
                                            @foreach ($brands as $brand)
                                            <option value="{{ $brand->brand_id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('brand_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Category</label>
                                        <select name="sub_category_id" id="multiple" class="@error('category_id') is-invalid @enderror">
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->sub_category_id }}">
                                                {{ $category->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('sub_category_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- row -->

    <div class="row" id="varriant-area">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
                        <div>
                            <h6 class="card-title">Custom Sizes</h6>
                        </div>
                        <div class="d-flex align-items-center flex-wrap text-nowrap">
                            <button type="button" class="btn btn-primary btn-icon-text mb-md-0 add-variant">
                                <i class="btn-icon-prepend" data-feather="plus"></i>
                                Add Size
                            </button>
                        </div>
                    </div>
                    <div id="form-rows-container">
                        <input type="hidden" id="item-count" name="item_count" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group text-right">
                <button type="submit" class="btn btn-success mr-2 mb-2 mb-md-0 text-white">Reset</button>
                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Save</button>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    let att = [];
    let index = 1;
    addRow();
    $('#product_type').on('change', function() {
        if ($(this).val() == 'single') {
            $('#attribute-area').addClass('d-none');
            $('#varriant-area').addClass('d-none');
            $('#single-row').removeClass('d-none');

        } else {
            $('#attribute-area').removeClass('d-none');
            $('#varriant-area').removeClass('d-none');
            $('#single-row').addClass('d-none');
        }
    });

    $('.attribute').click(function() {
        let id = $(this).data('id');
        let attribute = [id, $(this).data('attributes')];
        if (jQuery.inArray(attribute, att) != -1) {
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-outline-primary');
            att = jQuery.grep(att, function(value) {
                return value != attribute;
            });
        } else {
            $(this).removeClass('btn-outline-primary');
            $(this).addClass('btn-primary');
            att.push(attribute);
        }
    });

    $('.add-variant').click(function() {
        addRow();
    });

    function addRow(){
        // Size
        let size =
            '<div class="col-md-4"><input type="text" required placeholder="Size" class="form-control" name="size' +
            index + '"></div>';
        // Sales price
        let salesPrice =
            '<div class="col-md-4"><input type="number" required placeholder="Price" class="form-control" name="sales_price' +
            index + '"></div>';
        // Stock price
        let stock =
            '<div class="col-md-3"><input type="number" required placeholder="Stock" class="form-control" name="stock' +
            index + '"></div>';
        // remove
        let remove =
            '<div class="col-md-1"><input type="button" data-id="row' + index +
            '" class="btn btn-danger rem" id="rem' + index + '" value="DELETE"></div>';

        $('#form-rows-container').append('<div id="row' + index + '" class="row mb-2">' + size + salesPrice + stock + remove + '</div>');
        $('#item-count').val(index);
        $('#rem' + (index - 1)).attr('disabled', true);
        index++;
    }

    $('#form-rows-container').on('click', '.rem', function() {
        $('#' + $(this).data('id')).remove();
        index--;
        $('#rem' + (index - 1)).attr('disabled', false);
    });
</script>
@endpush