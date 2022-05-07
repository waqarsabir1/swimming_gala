<footer class="main-footer">
    <strong>Copyrights &copy; 2022/2023 <a target='_blank' href="https://staffs.ac.uk">Staffordshire University</a>.</strong>
    Waqar Sabir S030892L
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1
    </div>
  </footer>
 
</div>
<!-- jQuery -->
    <script src="{{ URL::asset('dist/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <!-- <script src="{{ URL::asset('dist/plugins/jquery-ui/jquery-ui.min.js') }}"></script> -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <!-- Bootstrap 4 -->
    <script src="{{ URL::asset('dist/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
    <script src="{{ URL::asset('dist/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ URL::asset('dist/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ URL::asset('dist/plugins/datatables/jquery.dataTables.min.js') }}"></script>
   <!-- Select2 -->
    <script src="{{ URL::asset('dist/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('dist/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('dist/plugins/toastr/toastr.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::asset('dist/js/main.js') }}">
    <script>
     $(function () { 
        $('.select2').select2();
      })
       
      function showToast(message){
        toastr.success(message)
      }
        
    </script>
    </body>
</html>
