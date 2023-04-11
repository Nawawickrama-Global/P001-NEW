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
            <h4 class="mb-3 mb-md-0">Product</h4>
        </div>
        <div class="d-flex align-items-center flex-wrap text-nowrap">
            <a type="button" class="btn btn-primary btn-icon-text text-light mb-2 mb-md-0" href="{{ route('add-product') }}">
                <i class="btn-icon-prepend" data-feather="plus"></i>
                Add New Product
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Title
                                    </th>
                                    <th>
                                        SKU
                                    </th>
                                    <th>
                                        Stock
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Category
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
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>
                                            @foreach ($product->variant as $variant)
                                                <span class="badge badge-danger">{{ $variant->size.': '.$variant->stock }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($product->variant as $variant)
                                                <span class="badge badge-danger">{{ $variant->size.': '.Config::get('app.currency_code').$variant->sales_price }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            @if ($product->status == 'active')
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
                                                        <button type="button" class="btn btn-warning btn-sm btn-icon" title="View" data-toggle="modal" data-target="#productView">
                                                            <i data-feather="eye"></i>
                                                        </button>
                                                    </td>
                                                    <td style="padding:0 2px ; border: 0">
                                                        {{-- edit --}}
                                                        <button onclick="window.location.href='{{ route('edit-product', $product->product_id) }}'" type="button" class="btn btn-success btn-sm btn-icon" title="Edit">
                                                            <i data-feather="edit"></i>
                                                        </button>
                                                    </td>
                                                    <td style="padding:0 2px ; border: 0">
                                                        {{-- Delete --}}
                                                        <form action="{{ route('delete-product', $product->product_id) }}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger btn-icon delete"
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
                        <div class="modal fade" id="productView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Product Name</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    <div class="product-feature-image">
                                        <img src="" alt="" style="width: 100%">
                                    </div>
                                    <div class="product-details">
                                        <p> <span style="font-weight: 800 ;padding-right:5px">SKU</span> 12345 </p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Specification</span> 12345 </p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Shiping</span> 12345 </p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Product Sheet</span> 12345 </p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Clean and Care</span> 12345 </p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Status</span> <span class="badge badge-secondary">Active</span></p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Brand</span> <span class="badge badge-secondary">Active</span></p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Category</span> <span class="badge badge-secondary">Active</span></p>
                                        <p> <span style="font-weight: 800 ;padding-right:5px">Selected Attributes</span> 
                                            <span class="badge badge-secondary">attribute 1</span>
                                            <span class="badge badge-secondary">attribute 2</span>
                                            <span class="badge badge-secondary">attribute 3</span>
                                        </p>
                                        <hr>
                                        <span style="font-weight: 800 ;padding-right:5px">Custom Sizes</span> 
                                        <table class="table table-bordered">
                                            <tbody>
                                              <tr> 
                                                <th scope="row">XL</th>
                                                <td>200</td>
                                                <td>12</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">M</th>
                                                <td>300</td>
                                                <td>100</td>
                                              </tr>
                                            </tbody>
                                          </table>

                                    </div>
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
