@include('templates/top')
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Coaches</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">View Coaches</li>
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
                <h3 class="card-title">View Coaches</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>User Type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>John</td>
                    <td>john@test.com</td>
                    <td>0751242567</td>
                    <td>Administrator</td>
                    <td class="text-center">
                      <a href="edit-user?id=" title="Edit" type="button" class="btn btn-default btn-sm"><i class="fa-solid fa-pencil"></i></a>
                      <a title="Delete" type="button" class="btn bg-gradient-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a> 
                    </td>
                  </tr> 
                  <tr>
                    <td>2</td>
                    <td>Johnson</td>
                    <td>Johnson@staffs.ac.uk</td>
                    <td>0751422367</td>
                    <td>Coach</td>
                    <td class="text-center">
                      <a href="edit-user?id=" title="Edit" type="button" class="btn btn-default btn-sm"><i class="fa-solid fa-pencil"></i></a>
                      <a title="Delete" type="button" class="btn bg-gradient-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a> 
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Davison</td>
                    <td>davison@live.co.uk</td>
                    <td>0751234567</td>
                    <td>Parent</td>
                    <td class="text-center">
                      <a href="edit-user?id=" title="Edit" type="button" class="btn btn-default btn-sm"><i class="fa-solid fa-pencil"></i></a>
                      <a title="Delete" type="button" class="btn bg-gradient-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a> 
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Waqar</td>
                    <td>waqar@staffs.ac.uk</td>
                    <td>075121437</td>
                    <td>Swimmer</td>
                    <td class="text-center">
                      <a href="edit-user?id=" title="Edit" type="button" class="btn btn-default btn-sm"><i class="fa-solid fa-pencil"></i></a>
                      <a title="Delete" type="button" class="btn bg-gradient-danger btn-sm"><i class="fa-solid fa-trash-can"></i></a> 
                    </td>
                  </tr>
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