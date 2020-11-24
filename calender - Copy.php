<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>CRM Admin Panel</title>
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
      <!-- End Global Mandatory Style
         =====================================================================-->
      <!-- Start page Label Plugins 
         =====================================================================-->
      <!-- fullcalendar css -->
      <link href="assets/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" />
      <!-- fullcalendar print css -->
      <link href="assets/plugins/fullcalendar/fullcalendar.print.min.css" rel="stylesheet" media='print' />
      <!-- End page Label Plugins 
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

    <!-- header -->
  <?php 

      include 'assets/php/top-nav.php';
  ?>
  
      <!-- Site wrapper -->
      <div>
         <!-- Content Wrapper. Contains page content -->
         <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header" style="background: white;">
               <div class="header-icon"><i class="fa fa-calendar-o"></i></div>
               <div class="header-title">
                  <h1>Calender</h1>
                  <small>Show Events</small>
               </div>
            </section>
            <!-- Main content -->
            <section class="content">
                  <div class="col-sm-12 col-lg-9 col-md-12">
                     <div class="card">
                        <div class="card-body">
                           <!-- calender -->
                           <div id='calendar'></div>
                        </div>
                     </div>
                  </div>
               </div>
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
     <!-- NiceScroll -->
     <script src="assets/plugins/slimScroll/jquery.nicescroll.min.js" > </script>
      <!-- FastClick -->
      <script src="assets/plugins/fastclick/fastclick.min.js" ></script>
      <!-- CRMadmin frame -->
      <script src="assets/dist/js/custom.js" ></script>
      <!-- End Core Plugins
         =====================================================================-->
      <!-- Start Page Lavel Plugins
         =====================================================================-->
      <!-- fullcalendar js -->
      <script src="assets/plugins/fullcalendar/lib/moment.min.js" ></script>
      <script src="assets/plugins/fullcalendar/fullcalendar.min.js" ></script>
      <!-- End Page Lavel Plugins
         =====================================================================-->
      <!-- Start Theme label Script
         =====================================================================-->
      <!-- Dashboard js -->
      <script src="assets/dist/js/dashboard.js" ></script>
      <!-- End Theme label Script
         =====================================================================-->
      <script>
      function calndr() {         
         /* initialize the external events
          -----------------------------------------------------------------*/
           var calndr = $('#external-events .fc-event');
         
           $(calndr).each(function () {
             // store data so the calendar knows to render an event upon drop
             $(this).data('event', {
                 title: $.trim($(this).text()), // use the element's text as the event title
                 stick: true // maintain when user navigates (see docs on the renderEvent method)
             });
         
             // make the event draggable using jQuery UI
             $(this).draggable({
                 zIndex: 999,
                 revert: true, // will cause the event to go back to its
                 revertDuration: 0  //  original position after the drag
             });
         
         });
         
         /* initialize the calendar
          -----------------------------------------------------------------*/
          var calender = $('#calendar');
         $(calender).fullCalendar({
             header: {
                 left: 'prev,next today',
                 center: 'title',
                 right: 'month,agendaWeek,agendaDay,listMonth'
             },
             defaultDate: '2020-04',
             navLinks: true, // can click day/week names to navigate views
             businessHours: true, // display business hours
             editable: true,
             droppable: true, // this allows things to be dropped onto the calendar
             drop: function () {
                 // is the "remove after drop" checkbox checked?
                 if ($('#drop-remove').is(':checked')) {
                     // if so, remove the element from the "Draggable Events" list
                     $(this).remove();
                 }
             },
         });
         }
         calndr();
      </script>
   </body>
</html>

