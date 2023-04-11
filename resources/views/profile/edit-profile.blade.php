@extends('layouts.dashboard.main')

@section('content')
<div class="card">
    <div class="card-header bg-dark text-white">
        <p>Edit profile</p>
    </div>
    <div class="card-body">
        <form action="" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">First name :</label>
                    <input type="text" name="" id="" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Last name :</label>
                    <input type="text" name="" id="" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Email address :</label>
                    <input class="form-control mb-4 mb-md-0" data-inputmask-alias="email"/>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Contact Number :</label>
                    <input class="form-control mb-4 mb-md-0" data-inputmask-alias="(+99) 99-999-9999"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">National identity card (NIC) number :</label>
                    <input type="text" name="" id="" class="form-control">
                </div>
                <div class="form-group col-md-6">
                    <label for="">Gender :</label>
                    <select name="" id="" class="form-control">
                        <option selected disabled>Select...</option>
                        <option value="">Male</option>
                        <option value="">Female</option>
                        <option value="">Other</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Address :</label>
                    <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection