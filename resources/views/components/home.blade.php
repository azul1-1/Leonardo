<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body class="bg-gradient-primary">

    <!-- Page Wrapper -->
    <div id="wrapper bg-gradient-primary">

      
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            @include('partials._topbar')

                
             <div>{{$slot}}</div>

             
                </div>
    

     <!-- Footer -->
 
            <!-- End of Footer -->
            </div>
</div>
 

                


@include('partials._assets')    
</body>

</html>



