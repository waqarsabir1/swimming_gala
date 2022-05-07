@include('templates/top')
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Races</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">View Races</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      @if(session()->has('message'))
          <div class="alert alert-success">
              {{ session()->get('message') }}
          </div>
        @endif
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">View Races</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Length</th> 
                    <th>Start Date</th>
                    <th>Start Time</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($rows as $row)
                    <tr>
                      <td>{{$row->id}}</td>
                      <td>{{$row->title}}</td>
                      <td>{{$row->length}} M</td>
                      
                      <td>{{$row->start_date}}</td>
                      <td>{{$row->start_time}}</td>
                      <td class="text-center">
                      @if(Auth::user()->user_type == 'Administrator')
                        <a href="/edit-race/{{$row->id}}" title="Edit " type="button" class="btn btn-default btn-sm">
                          <i class="fa-solid fa-pencil"></i>
                        </a>
                        <a href="delete-race/{{$row->id}}"  title="Delete" type="button" class="btn bg-gradient-danger btn-sm">
                          <i class="fa-solid fa-trash-can"></i>
                        </a> 
                        @endif
                        <a href="race-details/{{$row->id}}"  title="Race Detail" type="button" class="btn btn-default btn-sm">
                          <i class="fa-solid fa-square-poll-horizontal"></i>
                        </a>  
                        
                       
                      
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
<script>
  $('#example1').dataTable();
</script>