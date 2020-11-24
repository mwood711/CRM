   <!DOCTYPE html>
   <html lang="en">
   <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Event Report</title>
   <!-- Favicon and touch icons -->
   <link rel="shortcut icon" href="assets/dist/img/ico/ksu-favicon.png" type="image/x-icon">
   <!-- Start Global Mandatory Style
   =====================================================================-->
   <!-- lobicard tather css -->
   <link rel="stylesheet" href="assets/plugins/lobipanel/css/tether.min.css" />
   <!-- Bootstrap -->
   <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <!-- lobicard tather css -->
   <link rel="stylesheet" href="assets/plugins/lobipanel/css/jquery-ui.min.css" />
   <!-- lobicard min css -->
   <link href="assets/plugins/lobipanel/css/lobicard.min.css" rel="stylesheet" />
   <!-- lobicard github css -->
   <link href="assets/plugins/lobipanel/css/github.css" rel="stylesheet" />
   <!-- Pace css -->
   <link href="assets/plugins/pace/flash.css" rel="stylesheet" />
   <!-- Font Awesome -->
   <link href="assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
   <!-- Pe-icon -->
   <link href="assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet" />
   <!-- Themify icons -->
   <link href="assets/themify-icons/themify-icons.css" rel="stylesheet" />
   <!-- dataTables css -->
   <link href="assets/plugins/datatables/dataTables.min.css" rel="stylesheet" />
   <!-- End Global Mandatory Style
   =====================================================================-->
   <!-- Start Theme Layout Style
   =====================================================================-->
   <!-- Theme style -->
   <link href="assets/dist/css/stylecrm.css" rel="stylesheet" />
   <!-- Theme style rtl -->
   <!--<link href="assets/dist/css/stylecrm-rtl.css" rel="stylesheet" />-->
   <!-- End Theme Layout Style
   =====================================================================-->
   </head>
   <body class="hold-transition sidebar-mini">
  
   <?php 

      include 'assets/php/top-nav.php';
   ?>
   <div>

   <section class="container-fluid">
   <div class="header-icon">
   <i class="fa fa-users"></i>
   </div>
   <div class="header-title">
   <h1>Events Reports</h1>
   <small>Event Detail List</small>
   </div>
   </section>
   <!-- Main content -->
   <section class="content">
   <div class="row">
   <div class="col-lg-12 pinpin">
   <div class="card lobicard"  data-sortable="true">
   <div class="card-header">
   <div class="card-title custom_title">
   </div>
   </div>
   <div class="card-body">
   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
   <div class="btn-group">
   <button class="btn btn-exp btn-sm"  data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
   <ul class="dropdown-menu exp-drop" role="menu">
   <li class="dropdown-divider"></li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
   <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
   </li>
   <li class="dropdown-divider"></li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
   <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
   </li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
   <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
   </li>
   </ul>
   </div>
   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
   <div class="table-responsive">
   <table id="dataTableExample1" class="table table-bordered table-striped table-hover" >
   <thead class="back_table_color">
   <tr class="info">
   <th>Event Name</th>
   <th>Client Attended</th>
   <th>Company</th>
   <th>Event Date</th>
   <th>Faculty</th>
   <th>Event Location</th>
   <th>Notes by Faculty</th>
   </tr>
   </thead>
   <tbody>
   <?php
         require('dbconfig.php');
         $sql = "select evt_name 'Event Name', concat(fname,' ',lname) As 'Client Attended', cname 'Company',  date , concat(firstname,' ', lastname) As Faculty, place, SUBSTRING(notes, 1, 50) 'Notes by Faculty'
            from contact
            join eventdetails on eventdetails.c_id = contact.c_id
            Join eventtype on eventtype.evt_id = eventdetails.e_type
            join faculty on faculty.f_id = eventdetails.f_attending
            join company on company.company_id = contact.company
            group by fname, lname, company, evt_name, firstname,lastname,place,date, cname, notes";
         $stmt = sqlsrv_query( $conn, $sql );
         if( $stmt === false) {
         die( print_r( sqlsrv_errors(), true) );
         }
         while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
         $date = $row['date'];
         $stringdate = $date->format('Y-m-d');

         echo "<tr>
         <td>".$row['Event Name']."</td>
         <td>".$row['Client Attended']."</td>
         <td>".$row['Company']."</td>
         <td>".$stringdate."</td>
         <td>".$row['Faculty']."</td>
         <td>".$row['place']."</td>
          <td>".$row['Notes by Faculty']."</td>
         </tr>";
         }
         sqlsrv_free_stmt( $stmt);
   ?>
   </tbody>
   </table>
   </div>
   </div>
   </div>
   </div>
   </div>
   <!-- customer Modal1 -->
   <div class="modal fade" id="customer1" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content">
   <div class="modal-header modal-header-primary">
   <h3><i class="fa fa-user m-r-5"></i> Update Customer</h3>
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   </div>
   <div class="modal-body">
   <div class="row">
   <div class="col-md-12">
   <form class="form-horizontal">
   <div class="row">
   <!-- Text input-->
   <div class="col-md-4 form-group">
   <label class="control-label">Customer Name:</label>
   <input type="text" placeholder="Customer Name" class="form-control">
   </div>
   <!-- Text input-->
   <div class="col-md-4 form-group">
   <label class="control-label">Email:</label>
   <input type="email" placeholder="Email" class="form-control">
   </div>
   <!-- Text input-->
   <div class="col-md-4 form-group">
   <label class="control-label">Mobile</label>
   <input type="number" placeholder="Mobile" class="form-control">
   </div>
   <div class="col-md-6 form-group">
   <label class="control-label">Address</label><br>
   <textarea name="address" rows="3"></textarea>
   </div>
   <div class="col-md-6 form-group">
   <label class="control-label">type</label>
   <input type="text" placeholder="type" class="form-control">
   </div>
   <div class="col-md-12 form-group user-form-group">
   <div class="float-right">
   <button type="button" class="btn btn-danger btn-sm">Cancel</button>
   <button type="submit" class="btn btn-add btn-sm">Save</button>
   </div>
   </div>
   </div>
   </form>
   </div>
   </div>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
   </div>
   </div>
   <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   <!-- Modal -->    
   <!-- Customer Modal2 -->
   <div class="modal fade" id="customer2" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog">
   <div class="modal-content">
   <div class="modal-header modal-header-primary">
   <h3><i class="fa fa-user m-r-5"></i> Delete Customer</h3>
   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   </div>
   <div class="modal-body">
   <div class="row">
   <div class="col-md-12">
   <form class="form-horizontal">
   <div class="row">
   <div class="col-md-12 form-group user-form-group">
   <label class="control-label">Delete Customer</label>
   <div class="float-right">
   <button type="button" class="btn btn-danger btn-sm">NO</button>
   <button type="submit" class="btn btn-add btn-sm">YES</button>
   </div>
   </div>
   </div>
   </form>
   </div>
   </div>
   </div>
   <div class="modal-footer">
   <button type="button" class="btn btn-danger float-left" data-dismiss="modal">Close</button>
   </div>
   </div>
   <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
   </div>
   <!-- /.modal -->
   </section>
   <!-- /.content -->
   </div>
   <!-- footer -->
   <?php 
         include 'assets/php/footer.php';
   ?>
   </div>
   <!-- ./wrapper -->
   <!-- Start Core Plugins
   =====================================================================-->
   <!-- jQuery -->
   <script src="assets/plugins/jQuery/jquery-1.12.4.min.js" ></script>
   <!-- Bootstrap proper -->
   <script src="assets/bootstrap/js/popper.min.js" ></script>
   <!-- lobicard ui min js -->
   <script src="assets/plugins/lobipanel/js/jquery-ui.min.js" ></script>
   <!-- lobicard ui touch-punch-improved js -->
   <script src="assets/plugins/lobipanel/js/jquery.ui.touch-punch-improved.js"></script>
   <!-- lobicard tether min js -->
   <script src="assets/plugins/lobipanel/js/tether.min.js" ></script>
   <!-- Bootstrap -->
   <script src="assets/bootstrap/js/bootstrap.min.js" ></script>
   <!-- lobicard js -->
   <script src="assets/plugins/lobipanel/js/lobicard.js" ></script>
   <!-- lobicard highlight js -->
   <script src="assets/plugins/lobipanel/js/highlight.js" ></script>
   <!-- Pace js -->
   <script src="assets/plugins/pace/pace.min.js" ></script>
   <!-- table-export js -->
   <script src="assets/plugins/table-export/tableExport.js" ></script>
   <script src="assets/plugins/table-export/jquery.base64.js" ></script>
   <script src="assets/plugins/table-export/html2canvas.js" ></script>
   <script src="assets/plugins/table-export/sprintf.js" ></script>
   <script src="assets/plugins/table-export/jspdf.js" ></script>
   <script src="assets/plugins/table-export/base64.js" ></script>
   <!-- dataTables js -->
   <script src="assets/plugins/datatables/dataTables.min.js" ></script>
   <!-- NiceScroll -->
   <script src="assets/plugins/slimScroll/jquery.nicescroll.min.js" > </script>
   <!-- FastClick -->
   <script src="assets/plugins/fastclick/fastclick.min.js" ></script>
   <!-- CRMadmin frame -->
   <script src="assets/dist/js/custom.js" ></script>
   <!-- End Core Plugins
   =====================================================================-->
   <!-- Start Theme label Script
   =====================================================================-->
   <!-- Dashboard js -->
   <script src="assets/dist/js/dashboard.js" ></script>
   <!-- End Theme label Script
   <=====================================================================-->
    <script>
        $(document).ready(function() {
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataTableExample1 tbody tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
        </script>
   </body>
   </html>

