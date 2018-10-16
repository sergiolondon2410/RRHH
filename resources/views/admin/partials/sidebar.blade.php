<div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ route('home') }}"><i class="fa fa-dashboard fa-fw"></i> Inicio</a>
                        </li>
                        @if(Auth::user()->user_type_id < 3)
                            <li>
                                <a href="#"><i class="fa fa-suitcase fa-fw"></i> Empresas<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ URL::action('OrganizationController@index') }}">Listado</a>
                                    </li>
                                    <li>
                                        <a href="{{ url("/empresas/nuevo")}}">Nueva empresa</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Usuarios<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ URL::action('UserController@index') }}">Listado</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('users.create')  }}">Nuevo Usuario</a>
                                    </li>
                                    <!-- <li>
                                        <a href="morris.html">Subida masiva</a>
                                    </li> -->
                                </ul>
                            </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Evaluaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ route('applications.show') }}">Mis Evaluaciones</a>
                                </li>
                                @if(Auth::user()->user_type_id < 3)
                                    <li>
                                        <a href="{{ route('applications.filter') }}">Reporte de evaluaciones</a>
                                    </li>
                                @endif
                                <!-- <li>
                                    <a href="{{ route('evaluations.index') }}">Listado Evaluaciones</a>
                                </li> -->
                                <!-- <li>
                                    <a href="{{ url("/implementacion")}}">Responder Evaluación</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-certificate fa-fw"></i> Compromisos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Mis Compromisos</a>
                                </li>
                                @if(Auth::user()->user_type_id < 3)
                                    <li>
                                        <a href="{{ route('compromises.organization') }}">Asignar compromiso</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @if(Auth::user()->user_type_id < 3)
                            <li>
                                <a href="{{ route('processes.index') }}"><i class="fa fa-star fa-fw"></i> Procesos</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Reportes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="flot.html">Gráficos</a>
                                    </li>
                                    <li>
                                        <a href="morris.html">PDF</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-trophy fa-fw"></i> Premios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->user_type_id < 3)
                                    <li>
                                        <a href="{{ route('awards.index') }}">Ver premios</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('awards.create') }}">Crear premio</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('accomplishments.create') }}">Otorgar reconocimiento</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('accomplishments.index') }}">Reconocimientos</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('accomplishments.index') }}">Reconocimientos</a>
                                    </li>
                                @endif
                                <li>
                                    <a href="#">Mis Reconocimientos</a>
                                </li>
                            </ul>
                        </li>
                        @if(Auth::user()->user_type_id < 3)
                            <li>
                                <a href="#"><i class="fa fa-cog fa-fw"></i> Ajustes<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{ route('scales.index')}}">Escalas de medición</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('competences.index')}}">Competencias & Indicadores</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('evaluationtypes.index')}}">Tipos de evaluaciones</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('processes.index')}}">Procesos evaluativos</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->