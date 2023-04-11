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
    <h4 class="mb-3 mb-md-0">Customer</h4>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title">Customer List</h6>
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
                  Contact
                </th>
                <th>
                  Address
                </th>
                <th>
                  Spent
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
              @foreach ($customers as $key => $customer)
              <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $customer->user->first_name }}</td>
                <td>{{ $customer->user->contact_number }}</td>
                <td>{{ $customer->address }}</td>
                <td>{{ Config::get('app.currency_code').$customer->user->order->sum('total_amount') }}</td>
                <td>
                  @if ( $customer->user->status == 'active' )
                  <span class="badge badge-primary">Active</span>
                  @else
                  <span class="badge badge-danger">Deative</span>
                  @endif
                </td>
                <td>
                  <table>
                    <tr style="border: 0">
                        <td style="padding:0 2px ; border: 0">
                          {{-- report view --}}
                          {{-- <button type="button" class="btn btn-info btn-sm btn-icon" title="Info" >
                            <i data-feather="file-text"></i>
                          </button> --}}
                        </td>
                        <td style="padding:0 2px ; border: 0">
                          {{-- edit --}}
                          <button type="button" class="btn btn-success btn-sm btn-icon" title="Edit" onclick="window.location.href='{{ route('edit-customer', $customer->customer_id) }}'">
                            <i data-feather="edit"></i>
                          </button>
                        </td>
                        <td style="padding:0 2px ; border: 0">
                          {{-- Delete --}}
                          <form action="{{ route('delete-customer', $customer->customer_id) }}" method="post">
                            @csrf
                            @method('delete')
                              <button type="submit" class="btn btn-danger btn-icon delete" title="Delete">
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
        </div>
      </div>
    </div>
  </div>
</div>


@endsection