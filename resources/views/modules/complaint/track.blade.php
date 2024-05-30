<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Complaint Tracking</title>
    <link rel="icon" type="image/x-icon" href="/assets/src/assets/img/favicon.ico"/>
    <link href="/assets/layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/assets/layouts/vertical-dark-menu/loader.js"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="/assets/src/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-dark-menu/css/light/plugins.css" rel="stylesheet" type="text/css" />
    <link href="/assets/layouts/vertical-dark-menu/css/dark/plugins.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link href="/assets/src/assets/css/light/pages/contact_us.css" rel="stylesheet" type="text/css" />

    <link href="/assets/src/assets/css/dark/pages/contact_us.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
     <!--  BEGIN CUSTOM STYLE FILE  -->
     <link rel="stylesheet" type="text/css" href="/assets/src/plugins/src/stepper/bsStepper.min.css">

<link rel="stylesheet" type="text/css" href="/assets/src/assets/css/light/scrollspyNav.css"/>
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/light/stepper/custom-bsStepper.css">

<link rel="stylesheet" type="text/css" href="/assets/src/assets/css/dark/scrollspyNav.css"/>
<link rel="stylesheet" type="text/css" href="/assets/src/plugins/css/dark/stepper/custom-bsStepper.css">
<!--  END CUSTOM STYLE FILE  -->
</head>
<body class=" layout-boxed">

    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <div class="contact-us layout-top-spacing container">
        <div class="cu-contact-section">

            <div class="row m-4">
                <div class="col-xxl-8 col-xl-8 col-lg-12 col-md-12 mx-auto">

                    <div class="card m-4 p-4">
                        <div class="card-body">
    
                            <div class="row m-4 p-4">
                                <div class="col-md-12 col-12 mb-4">
                                    
                                    <h2 class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg></h2>
                                    <h3>Complaints Tracking</h3>
                                    <p class="mb-0">Submit your queries and we will get back to you as soon as possible.</p>
                                      <br>
                                    @if($error==1)
                                    <div class="alert alert-danger">
                                      Complaint Not Found!
                                    </div>
                                    <br>
                                    @endif
                                    @if($comp)
                                   
                                    
                                   

                                   
                                    

                                    <div id="wizard_Icons" class="col-lg-12 layout-spacing mt-4">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Complaints Status</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <div class="bs-stepper stepper-icons">
                                        <div class="bs-stepper-header" role="tablist">
                                            
                                            
                                            <div class="step" data-target="#withIconsStep-two">
                                                <button type="button" class="step-trigger" role="tab"  >
                                                    <span class="bs-stepper-circle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg></span>
                                                    <span class="bs-stepper-label">{{$comp->status}}</span>
                                                    <br>
                                                    <p>------------------------</p>
                                                    <hr>
                                                    <label for="">Description</label>
                                                    <textarea name="" id="" class="form-control" cols="10" rows="5">
                                                    {{$comp->description}}
                                                    </textarea>
                                                   
                                                </button>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                        @endif

                                             <div id="withIconsStep-three" class="content" role="tabpanel" >
                                                <form class="row g-3" action="track-complaint" method="GET">
                                                    <div class="col-12">
                                                        <label for="withIconsInputAddress" class="form-label">Tracking ID</label>
                                                        <input type="text" required class="form-control" name="tid" placeholder="Enter Tracking Id">
                                                    </div>
                                                    <div class="button-action mt-3">
                                                    <input type="submit" class="btn btn-success me-3" value="Track" name="" id="">
                                                    
                                                   </div>
                                                   
                                                    
                                                    
                                                </form>

                                               
                                            </div>

                        




                        




                                </div>

                                
                                
                               
                                
                            </div>
                            
                        </div>
                    </div>

                </div>
            </div>
            
        </div>
    </div>

    

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <script src="/assets/src/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/src/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="/assets/src/plugins/src/mousetrap/mousetrap.min.js"></script>
    <script src="/assets/layouts/vertical-dark-menu/app.js"></script>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="/assets/src/plugins/src/stepper/bsStepper.min.js"></script>
    <script src="/assets/src/plugins/src/stepper/custom-bsStepper.min.js"></script>
    <!-- END PAGE LEVEL SCRIPTS --> 

</body>
</html>