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
        <h4 class="mb-3 mb-md-0">Coupon</h4>
    </div>
</div>
<form action="{{ route('create-coupon') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12 col-xl-12 grid-margin stretch-card">
            <div class="card overflow-hidden">
                <div class="card-body">
                    <h6 class="card-title">Add New Coupon</h6>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input id="phone" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Value</label>
                                <input id="phone" type="number"
                                    class="form-control @error('value') is-invalid @enderror"
                                    placeholder="Ex: 500.00 LKR / 25%" name="value" autocomplete="" autofocus>
                                @error('value')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ActivityStatus">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="active">Active</option>
                                    <option value="inactive">Deactive</option>
                                </select>
                                @error('status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Number of users</label>
                                <input id="phone" type="number"
                                    class="form-control @error('number_of_users') is-invalid @enderror"
                                    name="number_of_users" autocomplete="email" autofocus>
                                @error('number_of_users')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Start Date</label>
                                <input id="phone" type="date"
                                    class="form-control @error('start_date') is-invalid @enderror" name="start_date"
                                    autocomplete="email" autofocus>
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">End Date</label>
                                <input id="phone" type="date"
                                    class="form-control @error('end_date') is-invalid @enderror" name="end_date"
                                    autocomplete="email" autofocus>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-12">
                            <div class="form-group">
                                <label for="ActivityStatus">Type</label>
                                <select name="type" class="form-control @error('type') is-invalid @enderror">
                                    <option value="percentage">Percentage</option>
                                    <option value="fixed">Fixed</option>
                                </select>
                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Start Time</label>
                                <input id="phone" type="time"
                                    class="form-control @error('start_time') is-invalid @enderror" name="start_time"
                                    autocomplete="email" autofocus>
                                @error('start_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">End Time</label>
                                <input id="phone" type="time"
                                    class="form-control @error('end_time') is-invalid @enderror" name="end_time"
                                    autocomplete="email" autofocus>
                                @error('end_time')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary mr-2 mb-2 mb-md-0 text-white">Add</button>
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
                <h6 class="card-title">Coupon List</h6>
                <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Number of Users
                                </th>
                                <th>
                                    Used
                                </th>
                                <th>
                                    Type
                                </th>
                                <th>
                                    Value
                                </th>
                                <th>
                                    Start
                                </th>
                                <th>
                                    End
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
                            @foreach ($coupons as $key => $coupon)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $coupon->name }}</td>
                                <td>{{ $coupon->number_of_users }}</td>
                                <td></td>
                                <td>{{ $coupon->type }}</td>
                                <td>{{ $coupon->value }}</td>
                                <td>{{ $coupon->start_date }} | {{ $coupon->start_time }}</td>
                                <td>{{ $coupon->end_date }} | {{ $coupon->end_time }}</td>
                                <td>
                                    @if ($coupon->status == 'active')
                                    <span class="badge badge-primary">Active</span>
                                    @else
                                    <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <table>
                                        <tr style="border: 0">
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- report view --}}
                                                <button type="button" class="btn btn-info btn-icon" title="View"
                                                    data-toggle="modal" data-target="#exampleModal">
                                                    <i data-feather="file-text"></i>
                                                </button>
                                            </td>
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- view --}}
                                                <button type="button" class="btn btn-warning btn-icon" title="View">
                                                    <i data-feather="eye"></i>
                                                </button>
                                            </td>
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- edit --}}
                                                <button type="button" class="btn btn-success btn-icon" title="Edit">
                                                    <i data-feather="edit"></i>
                                                </button>
                                            </td>
                                            <td style="padding:0 2px ; border: 0">
                                                {{-- Delete --}}
                                                <form action="{{ route('delete-coupon', $coupon->coupon_id) }}"
                                                    method="post">
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
                                @endforeach
                        </tbody>
                    </table>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5>Black Friday
                                        <span class="badge badge-primary mx-3">Active</span>
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>
                                                    #
                                                </th>
                                                <th>
                                                    Customer Name
                                                </th>
                                                <th>
                                                    Products
                                                </th>
                                                <th>
                                                    Spent
                                                </th>
                                                <th>
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1
                                                </td>
                                                <td>
                                                    John Doe
                                                </td>
                                                <td>
                                                    Charger, Handfree
                                                </td>
                                                <td>
                                                    100,000
                                                </td>
                                                <td>
                                                    {{-- view --}}
                                                    {{-- redirect to user bill --}}
                                                    <button type="button" class="btn btn-danger btn-icon"
                                                        title="View Bill">
                                                        <i data-feather="eye"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
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