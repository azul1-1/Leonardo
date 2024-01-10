<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      <!--sidebar-->
      @include('partials._sidebar')

      <!--endsidebar-->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('partials._topbar')

                <div>{{$slot}}</div>


    

     <!-- Footer -->
 <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
  


                

                
@include('partials._assets')


                
    




    </body>

</html>