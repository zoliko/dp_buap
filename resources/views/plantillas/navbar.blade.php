<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
            <!-- <a href="javascript:void(0)" class="site_title"><i class="fa fa-university"></i> <span>DP-BUAP</span></a>-->
             <img src="{{asset('images/escudo_negativo.png')}}" width="50" height="50"  class="center"/>   DP-BUAP
            <p><span>DESCRIPCION DE PUESTO</span></p>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
          
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <!-- Dependencias -->
                  @if(strcmp(\Session::get('categoria')[0],'FACILITADOR')==0 || strcmp(\Session::get('categoria')[0],'DIRECTOR_DRH')==0 || strcmp(\Session::get('categoria')[0],'CGA')==0)
                    <li><a><i class="fa fa-plus-square"></i> Dependencias <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/dependencias">Listado de dependencias</a></li>
                        @if(strcmp(\Session::get('categoria')[0],'FACILITADOR')==0)
                          <li><a href="/dependencias/nueva">Nueva dependencia</a></li>
                        @endif
                      </ul>
                    </li>
                  @endif
                  <!-- descripciones -->
                  @if(strcmp(\Session::get('categoria')[0],'DIRECTOR_D/UA')==0 || strcmp(\Session::get('categoria')[0],'ENCARGADO_D/UA')==0)
                    <li><a><i class="fa fa-file-text"></i>Descripciones<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="/descripciones">Listado de descripciones</a></li>
                      </ul>
                    </li>
                  @endif
                  <!-- Usuarios -->
                  @if(strcmp(\Session::get('categoria')[0],'FACILITADOR')==0)
                  <li><a><i class="fa fa-user"></i>Usuarios<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/usuarios">Gestionar usuarios</a></li>
                      <li><a href="/usuarios/facilitador">Crear usuario</a></li>
                    </ul>
                  </li>
                  @endif
                  <!-- Ayuda -->
                   <li><a><i class="fa fa-comment-o"></i>Ayuda<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/ayuda">Ver contacto</a></li>
                    </ul>
                  </li>
                  

                  
                </ul>
              </div>
                <p align="center"><span>Coordinación General Administrativa </span></p>
              <p align="center"><span>Dirección de Recursos Humanos</span></p>
              <p align="center"><span>Depto. de Ingreso y Evaluación</span></p>
            </div>
            <!-- /sidebar menu -->
              
            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              
              <!--<a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a> -->
              <a data-toggle="tooltip" data-placement="top" title="Cerrar Sesión" href="/usuarios/salir">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    @yield('nombre_usuario')
                    {{\Session::get('nombre')[0]}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <!--<li><a href="javascript:;"> Cuenta</a></li>-->
                    <li><a href="/usuarios/salir"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->