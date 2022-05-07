@include('templates/top')
<div class="content-wrapper" style="min-height: 1345.52px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/">Home</a></li>
              <li class="breadcrumb-item active">Edit User</li>
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
                <h3 class="card-title">Edit User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method='post'  action="../edit-user"  name="add-user" id="add-user" >
                @csrf 
                <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                     
                        <label for="firstName">User Type</label>
                        <div class="form-group">
                          <div class="icheck-primary d-inline p-r-20">
                            <input {{ $User['user_type'] == "Administrator" ? 'checked='.'"'.'checked'.'"' : '' }} type="radio" id="Administrator" value="Administrator" name="user_type">
                            <label for="Administrator">
                              Administrator
                            </label>
                          </div>
                          <div class="icheck-primary d-inline p-r-20">
                            <input {{ $User['user_type'] == "Coach" ? 'checked='.'"'.'checked'.'"' : '' }}  type="radio" id="Coach" value="Coach" name="user_type">
                            <label for="Coach">
                              Coach
                            </label>
                          </div>
                          <div class="icheck-primary d-inline p-r-20">
                            <input {{ $User['user_type'] =="Parent" ? 'checked='.'"'.'checked'.'"' : '' }}  type="radio" id="Parent" value="Parent" name="user_type">
                            <label for="Parent">
                              Parent
                            </label>
                          </div>
                          <div class="icheck-primary d-inline p-r-20">
                            <input {{ $User['user_type'] =="Swimmer" ? 'checked='.'"'.'checked'.'"' : '' }} type="radio" id="Swimmer" value="Swimmer" name="user_type">
                            <label     for="Swimmer">
                              Swimmer
                            </label>
                          </div>
                      </div>    
                  </div>
                </div>  
                <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="first_name">First Name <code>*</code></label>
                        <input required type="text" id="first_name" name='first_name' value="{{ $User->first_name }}"  class="form-control"  placeholder="Enter First Name">
                        <code>@error('first_name'){{$message}}@enderror</code> 
                      </div>
                    </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="last_name">Last Name <code>*</code></label>
                      <input type="text" id="last_name" name='last_name' required  value="{{ $User->last_name }}" class="form-control" placeholder="Enter Last Name">
                      <code>@error('last_name'){{$message}}@enderror</code> 
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phone_number">Phone Number <code>*</code></label>
                      <input type="tel" name="phone_number" id="phone_number"  value="{{ $User->phone_number }}" minlength='10' maxlength='12' required class="form-control" placeholder="Enter Phone Number">
                      <code>@error('phone_number'){{$message}}@enderror</code> 
                    </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                        <label for="dob">Date of Birth <code>*</code></label>
                        <input required type="date" class="form-control"  value="{{ $User->dob }}" name="dob" id="dob" placeholder="Select DOB">
                        <code>@error('dob'){{$message}}@enderror</code>  
                      </div>
                    </div> 
                  
                </div>
                 <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                      <label for="post_code">Post Code <code>*</code></label>
                      <input required type="text" class="form-control" minlength='6' maxlength='7'  value="{{ $User->post_code }}" name="post_code" id="post_code" placeholder="Enter Post Code">
                      <code>@error('post_code'){{$message}}@enderror</code> 
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">Address </label>
                      <input type="text" class="form-control" value="{{ $User->address }}" name="address"id="address" placeholder="Enter Address">
                    </div>
                  </div>
                </div> 
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email">Email <code>*</code></label>
                        <input required type="email" class="form-control" value="{{ $User->email }}" name="email" id="email" placeholder="Enter email">
                        <code>@error('email'){{$message}}@enderror</code> 
                      </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label for="password">Password <code>*</code></label>
                      <input requiredtype="password" class="form-control" value="" name="password" id="password" placeholder="Password">
                      <code>@error('password'){{$message}}@enderror</code> 
                      </div>
                    </div>
                  </div>  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <input type="hidden" value='{{ $User->id }}' name='id' name='id'>
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
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
        $.validator.setDefaults({
        submitHandler: function () { 
            return true
            }
        });
        
        $.validator.addMethod( "post_code", function( value, element ) {
            return this.optional( element ) || /^((([A-PR-UWYZ][0-9])|([A-PR-UWYZ][0-9][0-9])|([A-PR-UWYZ][A-HK-Y][0-9])|([A-PR-UWYZ][A-HK-Y][0-9][0-9])|([A-PR-UWYZ][0-9][A-HJKSTUW])|([A-PR-UWYZ][A-HK-Y][0-9][ABEHMNPRVWXY]))\s?([0-9][ABD-HJLNP-UW-Z]{2})|(GIR)\s?(0AA))$/i.test( value );
        }, "Please specify a valid UK postcode" );

        jQuery.validator.addMethod('phoneUK', function(phone_number, element) {
            return this.optional(element) || phone_number.length > 9 &&
            phone_number.match(/^(\(?(0|\+44)[1-9]{1}\d{1,4}?\)?\s?\d{3,4}\s?\d{3,4})$/);
        }, 'Please specify a valid phone number'); 
  
        $('#add-user').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            }, 
            phone_number: { 
                minlength:10,
                maxlength:13,
                phoneUK:true,
            },
            post_code: { 
                minlength:6,
                maxlength:6,
                post_code: true
            },
            user_type: { 
                required:true,
            },
        },
        messages: {
            email: {
                required: "Please enter a email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            }, 
            user_type: {
                required: "Please check User Type", 
            }, 
            phone_number: {
                phoneUK: "Example: 07XXXXXXXXX, +44XXXXXXXX ", 
            },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>



