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
                        <table id='business_units' class="table">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#new_bu" data-toggle="new_account"><i class='nc-icon nc-simple-add'></i> New Business Unit</button>
                            <thead class=" text-primary">
                                <th>
                                    Cluster
                                </th>
                                <th>
                                    Business Unit
                                </th>
                                <th>
                                    Code
                                </th>
                                <th >
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach($codes as $code)
                                <tr>
                                    <td>
                                            {{$code['cluster_info']->cluster_name}}
                                    </td>
                                    <td>
                                        {{$code->bu_name}}
                                    </td>
                                    <td>
                                            {{$code->bu_code}}
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <script  type="text/javascript">
                            
                            $(document).ready(function() {
                                $('#business_units').DataTable(
                                {
                                    // scrollX: true,
                                }
                                );
                            } );
                        </script>
                    </div>
                    @include('new_bu')
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
