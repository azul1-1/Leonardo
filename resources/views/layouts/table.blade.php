<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
        footer{
            position: relative;
            margin-bottom: 0;
            width: 100%;
        }
    </style>

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <!-- <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">-->
    <link href="fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               @include('partials._topbar')
                <!--table start-->

                <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary d-flex justify-content-center">Customer Database</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    <th>#</th>
                      <th>Name</th>
                      <th>email</th>
                      <th>date</th>
                      <th>Delete</th>
                      <th>Edit</th>
                      
                    </tr>
                  </thead>
                  
                  <tbody>
                  @foreach($dates as $book)
<tr class="border border-slate-300"  >
<td class="border border-slate-300" >{{$book['id']}}</td>
    <td class="border border-slate-300" >{{$book['name']}}</td>
    <td class="border border-slate-300" >{{$book['email']}}</td>
    <td class="border border-slate-300" >{{$book['book']}}</td>
    <td class="border border-slate-300" ><a href="{{ url('/item/delete',$book->id) }}" class="btn btn-primary rounded-button">Delete</a></td>
    <td class="border border-slate-300" ><a href="{{ url('/item/edit',$book->id) }}" class="btn btn-primary rounded-button">edit</a></td>
</tr>
@endforeach
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!--table finish-->



            
     

<div class="d-flex  justify-content-center"> <a href="{{ url('/booking') }}" class="btn btn-primary rounded-button">booking</a></div>


    

     <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
  


                

                
                                        <!-- Bootstrap core JavaScript-->
                                        <script src="jquery/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>


                
    



<!--cambio-->
    </body>

</html>

