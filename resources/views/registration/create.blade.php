@extends('layouts.master') 
@section('content')
<div class="col-lg-8 col-md-12">
    <div class="card">
        <div class="card-header" data-background-color="custom-registration">
            <h4 class="title">Registration</h4>            
        </div>
        <div class="card-content">
            <form id="Registration-Form">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Member Name</label>
                            <input type="text" name="member_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Email Address</label>
                            <input type="email" name="member_email" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Mobile Number</label>
                            <input type="phone" name="member_contact" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Member IC Number</label>
                            <input type="phone" name="member_nid_no" class="form-control" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Address(Optional)</label>
                            <input type="phone" name="member_blood_group" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Department(Optional)</label>
                            <input type="text" name="member_dept" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Registration Number(Optional)</label>
                            <input type="text" name="member_reg_no" class="form-control">
                        </div>
                    </div>
                </div>
                @include('layouts.errors')
                <p class="error text-center alert alert-danger d-none"></p>
                <button type="button" class="btn add-Member btn-primary pull-right">Submit</button>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>
@endsection