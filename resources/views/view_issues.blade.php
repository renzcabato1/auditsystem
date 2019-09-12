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
                        <table id='issues_view' class="table">
                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#new_issue" data-toggle="new_issue"><i class='nc-icon nc-simple-add'></i> New Issue</button>
                            <thead class=" text-primary">
                                <th>
                                    Audit Team
                                </th>
                                <th>
                                    Engagement Title
                                </th>
                                <th>
                                    Issue
                                </th>
                                <th>
                                    Priority Rating
                                </th>
                                <th>
                                    BU Responsible
                                </th>
                                <th >
                                    Action Owner
                                </th>
                                <th >
                                    Committed Date
                                </th>
                                <th >
                                    Action
                                </th>
                            </thead>
                            <tbody>
                                @foreach($issues as $issue)
                                <th>
                                    {{$issue['team_name']->team_name}}
                                </th>
                                <th>
                                    {{$issue->engagement_title}}
                                </th>
                                <th>
                                    {{$issue->issue}}
                                </th>
                                <th>
                                    {{$issue['rating_value']->rating_name}}
                                </th>
                                <th>
                                    {{$issue['bu_code_info']->bu_code}}
                                </th>
                                <th >
                                    {{$issue['employee_info']->first_name.' '.$issue['employee_info']->last_name}}
                                </th>
                                <th >
                                    {{date('M. d, Y',strtotime($issue->committed_date))}}
                                </th>
                                <th >
                                    Action
                                </th>
                                @endforeach
                            </tbody>
                        </table>
                        @include('new_issue')
                        <script  type="text/javascript">
                            
                            $(document).ready(function() {
                                $('#issues_view').DataTable(
                                {
                                    // scrollX: true,
                                }
                                );
                            } );
                        </script>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
