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
            <form  method='POST' action='new-issue' onsubmit='show();'  >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            Engagement Title :
                            <input class='form-control' name='engagement_title' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
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
                        <div class='col-md-3'>
                            Target Date:
                            <input type='date' class='form-control' name='date_target' min='{{date('Y-m-d')}}' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-6'>
                            BU Responsible :
                            <select class='form-control' onchange='view_account()' name='bu_code' id='bu_code' required>
                                <option value=''></option>
                                @foreach($bu_codes as $bu_code)
                                <option value='{{$bu_code->id}}'>{{$bu_code->bu_name}} - {{$bu_code->bu_code}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class='col-md-6'>
                            Action Owner :
                            <select class='form-control' name='action_owner' id='action_owner' required>
                                {{-- <option value=''></option>
                                @foreach($accounts as $account)
                                <option value='{{$account->user_id}}'>{{$account['employee_info']->first_name}} {{$account['employee_info']->last_name}}</option>
                                @endforeach --}}
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
<script>
    function view_account()
    {
        var bu_code = document.getElementById("bu_code").value;
        $('#action_owner').empty();
        document.getElementById("myDiv").style.display="block";
        $.ajax({    //create an ajax request to load_page.php
            
            type: "GET",
            url: "{{ url('/get-process-owner/') }}",            
            data: {
                "bu_code" : bu_code,
            }     ,
            dataType: "json",   //expect html to be returned
            success: function(data){    
                document.getElementById("myDiv").style.display="none";
                console.log(data);
                $('#action_owner').append('<option ></option>');
                if(data.cluster_head != null)
                {   
                    var cluster_head_role = "2";
                    $('#action_owner').append('<option value='+data.cluster_head+'-'+cluster_head_role+'  >'+ data.cluster_head_info.first_name + ' '+data.cluster_head_info.last_name + ' - CLUSTER HEAD</option>');
                }
                if(data.bu_head != null)
                {
                    var bu_head_role = "3";
                    $('#action_owner').append('<option value='+ data.bu_head+'-'+bu_head_role+' >'+ data.bu_head_info.first_name + ' '+data.bu_head_info.last_name + ' - BU HEAD</option>');
                }
                if(data.managers_data != null)
                {
                    var manager_head_role = "4";
                    jQuery.each(data.managers_data, function(id) {
                        //now you can access properties using dot notation
                        $('#action_owner').append('<option value='+ data.managers_data[id].manager_id+'-'+manager_head_role+' > '+ data.managers_data[id].employee_info.first_name+' '+  data.managers_data[id].employee_info.last_name +' - MANAGER</option>');
                    });
                }
            },
            error: function(e)
            {
                alert(e);
            }
        });
    }
</script>
