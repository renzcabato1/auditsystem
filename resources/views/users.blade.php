@extends('layouts.header')
@section('content')

<div class="content">
    @if(session()->has('status'))
    <div class="row">
        <div class="col-6">
            <div class="alert alert-success alert-with-icon alert-dismissible fade show" data-notify="container">
                <button type="button" aria-hidden="true" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="nc-icon nc-simple-remove"></i>
                </button>
                <span data-notify="icon" class="nc-icon nc-bell-55"></span>
                <span data-notify="message">{{session()->get('status')}}</span>
            </div>
        </div>
    </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> </h4>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#new_account" data-toggle="new_account"><i class='nc-icon nc-simple-add'></i> New User</button>
                            <thead class=" text-primary">
                                <th>
                                    Name
                                </th>
                                <th>
                                    Company
                                </th>
                                <th>
                                    Department
                                </th>
                                <th >
                                    Role
                                </th>
                                <th >
                                    Action
                                </th>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                @include('new_account')
            </div>
        </div>
        
    </div>
</div>

@endsection
