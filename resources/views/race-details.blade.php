@include('templates/top')
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1> Add Results of <b>{{$RaceData->title}}</b></h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active"> Add Results of <b>{{$RaceData->title}}</b></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Results of <b>{{$RaceData->title}}</b></h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <table id="dataTabe" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Title</th>
                                            <th>Email</th>
                                            <th>Time Spent</th>
                                            <th>Postion</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($swimmers as $swimmer)
                                        <tr>
                                            <td>{{  $swimmer->id}}</td>
                                            <td>{{  showName('users', $swimmer->id) }}</td>
                                            <td>{{  showEmail('users', $swimmer->id) }}</td>
                                            <td>{{  showTimeSpent($RaceData->id, $swimmer->id)['timespent'];    }}</td>
                                            <td>{{  showTimeSpent($RaceData->id, $swimmer->id)['position'];    }}</td> 
                                            <td class="text-center">
                                            @if(Auth::user()->user_type == 'Administrator')
                                                <a onClick="return showModal({{ $swimmer->id}} , {{ showTimeSpent($RaceData->id, $swimmer->id)['timespent'] }}  , {{ showTimeSpent($RaceData->id, $swimmer->id)['position']}}, '{{ showName('users', $swimmer->id) }}')" data-id='{{ $swimmer }}' title="Race Detail"
                                                    type="button" class="btn btn-default btn-sm">
                                                    Add Result <i class="fa-solid fa-square-poll-horizontal"></i>
                                                </a>
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tfoot>
                                </table>
                            </div> 
                            <!-- /.card-body -->
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@include('templates/footer')

<div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
      <form action="" id='resultForm' name='resultForm'>
        @csrf 
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Result for <span id="userTitle"></span></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="timeSpent">Time Spent</label>
                    <input type="text" class="form-control" name='timespent' id="timespent" placeholder="Enter Time in Mins">
                    <code style='display:none'  class='timeError'> Please enter Time Spent</code>
                </div>
                <div class="form-group">
                    <label for="position">Position</label>
                    <input type="text" class="form-control" name="position" id="position" placeholder="Enter Position">
                    <code style='display:none' class='positionError'> Please enter POsition</code>

                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <input type="hidden" id="race_id" name='race_id'>
                <input type="hidden" id="user_id" name='user_id'> 
                <button id='submitBtn' type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
      </form>
    </div>
</div>


<script>
$('#table').dataTable();
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
function showModal(user_id, time_spent, position, title){
  var url = $(location).attr('href'),
      parts = url.split("/"),
      race_id = parts[parts.length-1];
      $('#race_id').val(race_id);
      $('#user_id').val(user_id);
      $('#timespent').val(time_spent);
      $('#position').val(position);
      $('#userTitle').html(title);

      $('#modal-default').modal('show'); 
}

$('#submitBtn').click(function(){ 
  if($('#timeSpent').val()==''){
    $('.timeError').show();
    return false;
  }else if($('#position').val() ==''){
    $('.positionError').show();
    return false;
  }
  data = $('#resultForm').serialize(); 
    $.ajax({
        data: $('#resultForm').serialize(),  
        url: "{{ route('ajax.request.stores') }}",
        type: "POST",
        dataType: 'json', 
        success: function (response) {  
            //console.log(response);
            $('#modal-default').modal('hide'); 
            $('#resultForm').trigger("reset"); 
            showToast('Result Added Successfully'); 
            location.reload();
        },
        error: function (data) {
            console.log('Error:', data);
            $('#saveBtn').html('Save Changes');
        }
    });
})

</script>
