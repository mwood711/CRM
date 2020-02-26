   <!DOCTYPE html>
   <html lang="en">
   <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>CRM Admin Panel</title>
   <!-- Favicon and touch icons -->
   <link rel="shortcut icon" href="assets/dist/img/ico/favicon.png" type="image/x-icon">
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
   <!--preloader-->
   <div id="preloader">
   <div id="status"></div>
   </div>
   <!-- Site wrapper -->
   <div class="wrapper">
   <header class="main-header">
   <a href="index.html" class="logo">
   <!-- Logo -->
   <span class="logo-mini">
   <img src="assets/dist/img/mini-logo.png" alt="">
   </span>
   <span class="logo-lg">
   <img src="assets/dist/img/logo.png" alt="">
   </span>
   </a>
   <!-- Header Navbar -->
   <nav class="navbar navbar-expand py-0">
   <a href="#" class="sidebar-toggle" data-toggle="offcanvas" >
   <!-- Sidebar toggle button-->
   <span class="sr-only">Toggle navigation</span>
   <span class="pe-7s-angle-left-circle"></span>
   </a>
   <!-- searchbar-->
   <a href="#search"><span class="pe-7s-search"></span></a>
   <div id="search">
   <button type="button" class="close">×</button>
   <form>
   <input type="search" value="" placeholder="Search.." />
   <button type="submit" class="btn btn-add">Search...</button>
   </form>
   </div>
   <div class="collapse navbar-collapse navbar-custom-menu" >
   <ul class="navbar-nav ml-auto">

   <!-- Help -->
   <li class="nav-item dropdown  dropdown-help">
   <a class="nav-link hidden_hidden" href="#"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <i class="pe-7s-settings"></i></a>

   <div class="dropdown-menu drop_down" >
   <div class="menus">
   <a class="dropdown-item" href="#"> <i class="fa fa-line-chart"></i> Networking</a>
   <a class="dropdown-item" href="#"><i class="fa fa fa-bullhorn"></i> Lan settings</a>
   <a class="dropdown-item" href="#"><i class="fa fa-bar-chart"></i> Settings</a>
   <a class="dropdown-item" href="#"><i class="fa fa-wifi"></i> wifi</a>
   </div>
   </div>
   </li>
   <!-- User -->
   <li class="nav-item dropdown dropdown-user">
   <a class="nav-link" href="#"   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
   <img src="assets/dist/img/avatar5.png" class="rounded-circle" width="50" height="50" alt="user"></a>

   <div class="dropdown-menu drop_down" >
   <div class="menus">
   <a class="dropdown-item" href="#"><i class="fa fa-user"></i> User Profile</a>
   <a class="dropdown-item" href="#"><i class="fa fa-inbox"></i> Inbox</a>
   <a class="dropdown-item" href="#"><i class="fa fa-sign-out"></i> Signout</a>
   </div>
   </div>
   </li>
   </ul>
   </div>
   </nav>
   </header>
   <!-- =============================================== -->
   <!-- Left side column. contains the sidebar -->
   <aside class="main-sidebar">
   <!-- sidebar -->
   <div class="sidebar">
   <!-- sidebar menu -->
   <ul class="sidebar-menu">
   <li>
   <a href="index.html"><i class="fa fa-tachometer"></i><span>Dashboard</span>
   <span class="pull-right-container">
   </span>
   </a>
   </li>
   <li class="treeview">
   <a href="#">
   <i class="fa fa-users"></i><span>Client</span>
   <span class="pull-right-container">
   <i class="fa fa-angle-left float-right"></i>
   </span>
   </a>
   <ul class="treeview-menu">
   <li><a href="addclient.html">Add New Client</a></li>
   <li class="active"><a href="clientlist.php">Client List</a></li>
   <!-- <li><a href="group.html">Groups</a></li> -->
   </ul>
   </li>
   <li> 
   <a href="faculty.php">
   <i class="fa fa-user-circle"></i><span>Faculty</span>
   <span class="pull-right-container">
   </span>
   </a>
   </li>
   <li>
   <a href="events.php">
   <i class="fa fa-tree"></i><span>Events</span>
   <span class="pull-right-container">
   </span>
   </a>
   </li>
   <li>
   <a href="document.html">
   <i class="fa fa-file-text"></i> <span>Documents</span>
   <span class="pull-right-container">
   </span>
   </a>
   </li>
   </ul>
   </div>
   <!-- /.sidebar -->
   </aside>
   <!-- =============================================== -->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <div class="header-icon">
   <i class="fa fa-users"></i>
   </div>
   <div class="header-title">
   <h1>Client</h1>
   <small>Client List</small>
   </div>
   </section>
   <!-- Main content -->
   <section class="content">
   <div class="row">
   <div class="col-lg-12 pinpin">
   <div class="card lobicard"  data-sortable="true">
   <div class="card-header">
   <div class="card-title custom_title">
   <h4>Add client</h4>
   </div>
   </div>
   <div class="card-body">
   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
   <div class="btn-group d-flex" role="group">
   <div class="buttonexport" id="buttonlist"> 
   <a class="btn btn-add" href="addclient.html"> <i class="fa fa-plus"></i> Add Client
   </a>  
   </div>
   </div> 
   <div class="btn-group">
   <button class="btn btn-exp btn-sm"  data-toggle="dropdown"><i class="fa fa-bars"></i> Export Table Data</button>
   <ul class="dropdown-menu exp-drop" role="menu">
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false'});"> 
   <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON</a>
   </li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});">
   <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (ignoreColumn)</a>
   </li>
   <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'json',escape:'true'});">
   <img src="assets/dist/img/json.png" width="24" alt="logo"> JSON (with Escape)</a>
   </li>
   <li class="dropdown-divider"></li>
   <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'xml',escape:'false'});">
   <img src="assets/dist/img/xml.png" width="24" alt="logo"> XML</a>
   </li>
   <li><a href="#" onclick="$('#dataTableExample1').tableExport({type:'sql'});"> 
   <img src="assets/dist/img/sql.png" width="24" alt="logo"> SQL</a>
   </li>
   <li class="dropdown-divider"></li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'csv',escape:'false'});"> 
   <img src="assets/dist/img/csv.png" width="24" alt="logo"> CSV</a>
   </li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'txt',escape:'false'});"> 
   <img src="assets/dist/img/txt.png" width="24" alt="logo"> TXT</a>
   </li>
   <li class="dropdown-divider"></li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'excel',escape:'false'});"> 
   <img src="assets/dist/img/xls.png" width="24" alt="logo"> XLS</a>
   </li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'doc',escape:'false'});">
   <img src="assets/dist/img/word.png" width="24" alt="logo"> Word</a>
   </li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'powerpoint',escape:'false'});"> 
   <img src="assets/dist/img/ppt.png" width="24" alt="logo"> PowerPoint</a>
   </li>
   <li class="dropdown-divider"></li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'png',escape:'false'});"> 
   <img src="assets/dist/img/png.png" width="24" alt="logo"> PNG</a>
   </li>
   <li>
   <a href="#" onclick="$('#dataTableExample1').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});"> 
   <img src="assets/dist/img/pdf.png" width="24" alt="logo"> PDF</a>
   </li>
   </ul>
   </div>
   <!-- Plugin content:powerpoint,txt,pdf,png,word,xl -->
   <div class="table-responsive">
   <table id="dataTableExample1" class="table table-bordered table-striped table-hover">
   <thead class="back_table_color">
   <tr class="info">
   <th>Customer ID</th>
   <th>First Name</th>
   <th>Last Name</th>
   <th>Title</th>
   <th>Spouse Name</th>
   <th>Child info</th>
   <th>Company Name</th>
   <th>Office Phone</th>
   <th>Action</th>
   </tr>
   </thead>
   <tbody>
   <?php
   $serverName = "localhost\\SQLEXPRESS";
   $connectionInfo = array( "Database"=>"ksu_crm");
   $conn = sqlsrv_connect( $serverName, $connectionInfo );
   if( $conn === false ) {
   die( print_r( sqlsrv_errors(), true));
   }

   $sql = "SELECT c_id, fname, lname, title, sname, cinfo, cname, officephone FROM contact,company  WHERE company.company_id = contact.company";
   $stmt = sqlsrv_query( $conn, $sql );
   if( $stmt === false) {
   die( print_r( sqlsrv_errors(), true) );
   }

   while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
   echo "<tr  onclick=\"window.location='ClientDetails.php?custid=".$row["c_id"]."'\">
   <td>".$row['c_id']."</td>
   <td>".$row['fname']."</td>
   <td>".$row['lname']."</td>
   <td>".$row['title']."</td>
   <td>".$row['sname']."</td>
   <td>".$row['cinfo']."</td>
   <td>".$row['cname']."</td>
   <td>".$row['officephone']."</td>
   <td><a href=\"editclient.php?c_id=".$row["c_id"]."\" style=\"text-decoration: none\">Edit</a></td>  
   </tr>" ;

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
   <!-- /.content-wrapper -->
   <footer class="main-footer">
   <strong>Copyright &copy; 2016-2017 <a href="#">thememinister</a>.</strong> All rights reserved.
   </footer>
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
   =====================================================================-->
   </body>
   </html>

