<div class="modal fade" id="new_issue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">New Issue</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <style>
                #bu_code_chosen{
                    width: 100% !important;
                }
            </style>
            <form  method='POST' action='add-account' onsubmit='show();'  >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            Engagement Title :
                            <input class='form-control' name='engagement_title' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-9'>
                            Issue :
                            <input class='form-control' name='issue' required>
                        </div>
                        <div class='col-md-3'>
                            Priority Rating :
                            <select class='form-control' name='rating'>
                                <option value=''></option>
                                @foreach($ratings as $rating)
                                <option value='{{$rating->id}}'>{{$rating->rating_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            BU Responsible :
                            <select class='form-control' name='bu_code[]' required>
                                <option value=''></option>
                                @foreach($bu_codes as $bu_code)
                                <option value='{{$bu_code->id}}'>{{$bu_code->bu_name}} - {{$bu_code->bu_code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='col-md-6'>
                            Action Owner :
                            <select class='form-control' name='action_owner[]' required>
                                <option value=''></option>
                                @foreach($accounts as $account)
                                <option value='{{$account->user_id}}'>{{$account['employee_info']->first_name}} {{$account['employee_info']->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id='' class="btn btn-primary" >Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
