<!DOCTYPE html>
<html lang="en">

  @include('partials.header')

  <body>

      <div id="wrapper">
          <div class="sidebar" data-color="purple" data-image="../../theme/img/sidebar-5.jpg">

          <!-- Navigation -->

          @include('partials.nav')

          </div>

          <div class="main-panel">
              <!-- Navbar -->
              <nav class="navbar navbar-expand-lg navbar-fixed">
                  <div class="container-fluid">
                      <div class="navbar-wrapper">
                          <div class="navbar-minimize">
                              <button id="minimizeSidebar" class="btn btn-danger btn-fill btn-round btn-icon d-none d-lg-block">
                                  <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
                                  <i class="fa fa-navicon visible-on-sidebar-mini"></i>
                              </button>
                          </div>
                          <a class="navbar-brand" href="#pablo"> @yield('title') </a>
                      </div>
                      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-bar burger-lines"></span>
                          <span class="navbar-toggler-bar burger-lines"></span>
                          <span class="navbar-toggler-bar burger-lines"></span>
                      </button>
                      <div class="collapse navbar-collapse justify-content-end">
                          <ul class="navbar-nav">
                              <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      <i class="nc-icon nc-bullet-list-67"></i>
                                  </a>
                                  @auth
                                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                      <a class="dropdown-item" href="{{ url('profile')}}">
                                          <i class="nc-icon nc-settings-90"></i> Settings
                                      </a>
                                      <a href="{{ url('/logout') }}" class="dropdown-item text-danger">
                                          <i class="nc-icon nc-button-power"></i> Log out
                                      </a>
                                  </div>
                                  @endauth
                              </li>
                          </ul>
                      </div>

                  </div>
              </nav>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  @yield('nav')
                </ol>
              </nav>
              <!-- End Navbar -->

              <div class="content">
                  <div class="container-fluid">
                    @yield('content')
                  </div>
              </div>

              <div class="modal fade" id="formEditorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Confirmation box</h4>
                        </div>
                        <div class="modal-body">
                            Are you sure, do you want to save this activity ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary" onclick="submitForm('thisForm')">Yes</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
              <!-- /.modal -->
          </div>

      </div>
      <!-- /#wrapper -->
      @include('partials.javascript')
  </body>

</html>
