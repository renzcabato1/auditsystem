<div class="modal fade" id="new_bu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class='col-md-10'>
                    <h5 class="modal-title" id="exampleModalLabel">New Business Unit</h5>
                </div>
                <div class='col-md-2'>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <style>
                
                #roles_chosen{
                    width: 100% !important;
                }
            </style>
            <form  method='POST' action='add-business' onsubmit='show();'  >
                <div class="modal-body">
                    {{ csrf_field() }}
                    <div class='row'>
                        <div class='col-md-12'>
                            Cluster :
                            <select class='form-control' name="cluster[]" required>
                                <option></option>
                                @foreach($clusters as $cluster)
                                <option value='{{$cluster->id}}'>{{$cluster->cluster_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            Business Unit:
                            <input class='form-control' name='bu_name' required>
                        </div>
                    </div>
                    <div class='row'>
                        <div class='col-md-12'>
                            Code:
                            <input class='form-control' name='bu_code' required>
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
