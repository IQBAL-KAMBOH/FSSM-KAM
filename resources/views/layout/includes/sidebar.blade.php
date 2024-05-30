
<!--  BEGIN MAIN CONTAINER  -->

<style>
    #menubar {
        background: linear-gradient(to right, #E0E0E0, #C0C0C0, #A0A0A0, #808080, #606060);  
}
.sidebar-wrapper {
  position: fixed;
  top: 0;
  height: 100%;
  overflow: auto;
  width: 260px; /* adjust this value as needed */
  z-index: 1040;
  transition: all 0.3s;
  -webkit-transition: all 0.3s;
  -moz-transition: all 0.3s;
  -ms-transition: all 0.3s;
  -o-transition: all 0.3s;
  background: linear-gradient(to right, #E0E0E0, #C0C0C0, #A0A0A0, #808080, #606060);

}

@media (max-width: 100px) {
  .sidebar-wrapper {
    width: 100%;
    height: auto;
    position: relative;
  }
}

</style>
<div class="main-container" id="container">

<div class="overlay"></div>
<div class="search-overlay"></div>

<!--  BEGIN SIDEBAR  -->
<div class="sidebar-wrapper sidebar-theme" id="menubar">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center"  id="menubar">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="/dashboard">
                        <img src="assets/src/assets/img/logo.svg" style="margin-right:20px !important;" class="" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="/dashboard" class="nav-link">FSSM</a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <!-- <div class="shadow-bottom"></div> -->
        <!--- Menu ---> 
        @include('layout.includes.menu')
        <!--- Ending Menu --->
        
    </nav>

</div>
<!--  END SIDEBAR  -->

<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
