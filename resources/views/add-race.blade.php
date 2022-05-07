@include('templates/top')
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Race</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Race</li>
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
                <h3 class="card-title">Add Race</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
              <form method='post'  action="add-race"  name="add-race-form" id="add-race-form" method="post">
              @csrf 
                <div class="card-body"> 
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name='title' placeholder="Enter Title">
                      </div>
                   </div> 
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="race_length">Race Length (Mins)</label>
                        <input type="number" class="form-control" id="length" name='length' placeholder="Race Length">
                      </div>
                   </div> 
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="date">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name='start_date' placeholder="Select Date">
                      </div>
                   </div> 
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="time">Start Time</label>
                        <input type="time" class="form-control" id="start_time" name='start_time' placeholder="Select time">
                      </div>
                   </div> 

                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="end_date">End Date</label>
                        <input type="date" class="form-control" id="end_date" name='end_date' placeholder="Select Date">
                      </div>
                   </div> 
                   <div class="col-md-6">
                      <div class="form-group">
                        <label for="end_time">End Time</label>
                        <input type="time" class="form-control" id="end_time" name='end_time' placeholder="Select time">
                      </div>
                   </div> 
                </div>
                <div class="row"> 
                    <div class="col-12 col-sm-12">
                      <div class="form-group">
                        <label>Swimmers</label>
                        <div class="select2-purple">
                          <select name='swimmer_ids[]' id='swimmer_ids'class="select2" multiple="multiple" data-placeholder="Select  Swimmers" data-dropdown-css-class="select2-purple" style="width: 100%;">
                          @foreach($Users as $user)  
                            <option value='{{$user->id}}'>{{$user->first_name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <!-- /.form-group -->
                    </div>
                </div> 
                </div>
                <!-- /.card-body --> 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
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
 
@include('templates/footer');

<script>
    $(function () {
    //Initialize Select2 Elements
      $('.select2').select2()
    });
</script>


