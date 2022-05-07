@include('templates/top')
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">View Users</li>
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
                <h3 class="card-title">View Users</h3>
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
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Dat of Birth</th>
                    <th>User Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($Users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->first_name}} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone_number}}</td>
                    <td>{{$user->dob}}</td>
                    <td>
                        {{$user->user_type}}
                         
                    </td>
                    <td class="text-center">
                      <a href="{{url('/')}}/edit-user/{{$user->id}}" title="Edit" type="button" class="btn btn-default btn-sm"><i class="fa-solid fa-pencil"></i></a>
                      <a class='deletebtn btn bg-gradient-danger btn-sm'onclick="return confirm('Are you sure?')" href="{{url('/')}}/delete-user/del/{{$user->id}}"title="Delete" type="button">
                        <i class="fa-solid fa-trash-can"></i>
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
@include('templates/confirm-delete');
<script>
  $('#example1').dataTable();
   
</script>


