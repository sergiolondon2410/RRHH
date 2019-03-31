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
                                        <a href="{{ route('users.create') }}">Nuevo Usuario</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('imports.index') }}">Subida masiva</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i> Evaluaciones<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->user_type_id < 3)
                                    <li>
                                        <a href="{{ route('applications.filter') }}">Reporte de evaluaciones</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('applications.show') }}">Mis Evaluaciones</a>
                                    </li>
                                @endif
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-certificate fa-fw"></i> Compromisos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->user_type_id < 3)
                                    <li>
                                        <a href="{{ route('compromises.index') }}">Ver Compromisos</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('compromises.index') }}">Mis Compromisos</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        @if(Auth::user()->user_type_id < 3)
                            <li>
                                <a href="{{ route('processes.index') }}"><i class="fa fa-star fa-fw"></i> Procesos</a>
                            </li>
                        @endif
                        <li>
                            <a href="#"><i class="fa fa-trophy fa-fw"></i> Reconocimientos<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                @if(Auth::user()->user_type_id < 3)
                                    <li>
                                        <a href="{{ route('recognitions.index') }}">Ver Reconocimientos</a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('recognitions.index') }}">Mis Reconocimientos</a>
                                    </li>
                                @endif
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
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->