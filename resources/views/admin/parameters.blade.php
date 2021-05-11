@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->

    @include('includes.message')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Rellenar formulario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del decano</h3>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><i class="fas fa-user"></i> <strong>Nombre:</strong> <span id="nombredeca"></span> </li>
                        <li class="list-group-item"><i class="fas fa-id-card"></i> <strong>Cedula:</strong> <span id="ceduladeca"></span> </li>
                        <li class="list-group-item"><i class="far fa-envelope"></i> <strong>Correo:</strong> <span id="telefonodeca"></span> </li>
                        <li class="list-group-item"><i class="fas fa-phone"></i> <strong>Telefono:</strong> <span id="correodeca"></span> </li>
                      </ul>
                </div>
            </div>
        </div>

        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del Jefe de Escuela</h3>
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><i class="fas fa-user"></i> <strong>Nombre:</strong> <span id="nombreescue"></span> </li>
                        <li class="list-group-item"><i class="fas fa-id-card"></i> <strong>Cedula:</strong> <span id="cedulaescue"></span></li>
                        <li class="list-group-item"><i class="far fa-envelope"></i> <strong>Correo:</strong> <span id="correoescue"></span></li>
                        <li class="list-group-item"><i class="fas fa-phone"></i> <strong>Telefono:</strong> <span id="telefonoescue"></span></li>
                      </ul>
                </div>
            </div>
        </div>

        <!-- left column -->
        <div class="col-md">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Datos del docente</h3>
                </div>

                <div class="card-body" style="align-self: center;">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item"><i class="fas fa-user"></i> <strong>Nombre:</strong> <span id="nombredocen"></span> </li>
                        <li class="list-group-item"><i class="fas fa-id-card"></i> <strong>Cedula:</strong> <span id="ceduladocen"></span></li>
                        <li class="list-group-item"><i class="far fa-envelope"></i> <strong>Correo:</strong> <span id="correodocen"></span></li>
                        <li class="list-group-item"><i class="fas fa-phone"></i> <strong>Telefono:</strong> <span id="telefonodocen"></span></li>
                      </ul>
                </div>
            </div>
        </div>

    </div>

    

    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Todos los campos son obligatorios</h3>
                </div>

    
                <!-- /.card-header -->
                <!-- form start -->
                @if(Auth::user()->hasRole('admin'))
                        @php($role = 'admin')
                        
                    @else
                        @php($role = 'director')
                        
                    @endif
                <div>
                    @csrf
                    <input type="hidden" name="role" id="role" value="{{ $role }}">
                    <div class="card-body">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="decan_id">Decanato</label>
                                <select id="slt-decans" class="form-control" name="decan_id" required>

                                    <option data-nombredeca="" data-ceduladeca="" data-correodeca="" data-telefonodeca="" disabled selected>Selecione un decanato</option>
                                    @foreach ($decans as $decan)
                                        <option value="{{ $decan->id }}" data-nombredeca="{{ $decan->decan_name }}" data-ceduladeca="{{ $decan->document }}" data-correodeca="{{ $decan->phone }}" data-telefonodeca="{{ $decan->email }}">{{ $decan->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="school_id">Escuela</label>
                                <select id="slt-schools" data-nombreescue="" data-cedulaescue="" data-correoescue="" data-telefonoescue="" class="form-control test" name="school_id" required>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lapse_id">Lapso</label>
                                <select class="form-control" name="lapse_id" required>

                                    <option disabled selected>Selecione el lapso</option>
                                    @foreach ($lapses as $lapse)
                                        <option value="{{ $lapse->id }}">{{ $lapse->lapse }} | {{ $lapse->date_range }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            
                            <div class="form-group col-md-4">
                                <label for="user_id">Docente</label>
                                <select id="slt-users" class="form-control" name="user_id" required>
                                    <option data-nombredocen="" data-ceduladocen="" data-correodocen="" data-telefonodocen="" disabled selected>Selecione un docente</option>
                                    @foreach ($users->users as $user)
                                        <option data-nombredocen="{{ $user->name }} {{ $user->lastname }}" data-ceduladocen="{{ $user->document }}" data-correodocen="{{ $user->email }}" data-telefonodocen="{{ $user->phone }}" value="{{ $user->id }}">{{ $user->document }} - {{ $user->name }}
                                            {{ $user->lastname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="subject_id">Materia</label>
                                <select id="slt-subjects" class="form-control" name="subject_id" required>

                                </select>
                            </div>

                            <div class="form-group col-md-4">
                                <label for="stage_id">Bloque</label>
                                <select class="form-control" name="stage_id" id="stage_id" required>
                                    <option disabled selected>Selecione un bloque</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md">
                                <label for="section_id">Seccion</label>
                                <select id="section_id" class="form-control" name="section_id" required>

                                    <option disabled selected>Selecione la seccion</option>
                                    @foreach ($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->name }}</option>
                                    @endforeach

                                </select>
                            </div>

                            {{-- <div class="form-group col-md-6">
                                <label for="unit">Unidad</label>
                                <select class="form-control" name="unit" required>

                                    <option disabled selected>Selecione la unidad</option>
                                    <option>Unidad 0</option>
                                    <option>Unidad 1</option>
                                    <option>Unidad 2</option>
                                    <option>Unidad 3</option>
                                    <option>Unidad 4</option>
                                    <option>Unidad 5</option>
                                    <option>Unidad 6</option>
                                    <option>Unidad 7</option>
                                    <option>Unidad 8</option>
                                    <option>Unidad 9</option>
                                    <option>Unidad 10</option>
                                    <option>Unidad 11</option>
                                    <option>Unidad 12</option>
                                    <option>Unidad 13</option>
                                    <option>Unidad 14</option>
                                    <option>Unidad 15</option>
                                    <option>Unidad 16</option>
                                    <option>Unidad 17</option>
                                    <option>Unidad 18</option>
                                    <option>Unidad 19</option>
                                    <option>Unidad 20</option>
                                </select>
                            </div> --}}
                        </div>

                        <hr>
                        <div id="bloque_cero">

                        <h3 class="text-center">Bloque cero</h3>
                        <div class="form-row">
                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">
                                    <label>Perfil</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="perfil" id="perfil1"
                                                    value="si" disabled>
                                                <label class="form-check-label" for="perfil1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="perfil" id="perfil2"
                                                    value="no" checked disabled>
                                                <label class="form-check-label" for="perfil2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                            </div>

                            <!-- radio -->
                            <div class="col-md text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Foro de Informacion</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="forum_info" id="forum_info1"
                                                    value="si" disabled>
                                                <label class="form-check-label" for="forum_info1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="forum_info" id="forum_info2"
                                                    value="no" checked disabled>
                                                <label class="form-check-label" for="forum_info2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Bienvenida al curso</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="welcome_course"
                                                    id="welcome_course-1" value="si" disabled>
                                                <label class="form-check-label" for="welcome_course-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="welcome_course"
                                                    id="welcome_course-2" value="no" checked disabled>
                                                <label class="form-check-label" for="welcome_course-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Video de Bienvenida</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="welcome_video"
                                                    id="welcome_video-1" value="si" disabled>
                                                <label class="form-check-label" for="welcome_video-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="welcome_video"
                                                    id="welcome_video-2" value="no" checked disabled>
                                                <label class="form-check-label" for="welcome_video-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Carpeta</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="folder" id="folder-1"
                                                    value="si" disabled>
                                                <label class="form-check-label" for="folder-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate" type="radio" name="folder" id="folder-2"
                                                    value="no" checked disabled>
                                                <label class="form-check-label" for="folder-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                    </div>

                    <div id="bloque_corte">

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="entrega_nota">
                            <label class="form-check-label" for="entrega_nota">
                              Activar entrega de notas finales del corte
                            </label>
                          </div>

                        <h3 class="text-center"><span id="title_stage">Corte I</span></h3>
                        <div class="form-row">
                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Foro de Informacion</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="forum_info_use"
                                                    id="forum_info_use-1" value="si">
                                                <label class="form-check-label" for="forum_info_use-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="forum_info_use"
                                                    id="forum_info_use-2" value="no" checked>
                                                <label class="form-check-label" for="forum_info_use-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Foro de dudas</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="forum_doubts"
                                                    id="forum_doubts-1" value="si">
                                                <label class="form-check-label" for="forum_doubts-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="forum_doubts"
                                                    id="forum_doubts-2" value="no" checked>
                                                <label class="form-check-label" for="forum_doubts-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Entrega de nota segun reglamento</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="delivery_notes"
                                                    id="delivery_notes-1" value="si">
                                                <label class="form-check-label" for="delivery_notes-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="delivery_notes"
                                                    id="delivery_notes-2" value="no" checked>
                                                <label class="form-check-label" for="delivery_notes-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Uso de Zoom, Blue Bottom, pizarras</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="tools_use" id="tools_use-1"
                                                    value="si">
                                                <label class="form-check-label" for="tools_use-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="tools_use" id="tools_use-2"
                                                    value="no" checked>
                                                <label class="form-check-label" for="tools_use-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Interaccion Docente-Estudiante</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="interaction"
                                                    id="interaction-1" value="si">
                                                <label class="form-check-label" for="interaction-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="interaction"
                                                    id="interaction-2" value="no" checked>
                                                <label class="form-check-label" for="interaction-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-2 text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Realimentacion</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="feedback" id="feedback-1"
                                                    value="si">
                                                <label class="form-check-label" for="feedback-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate2" type="radio" name="feedback" id="feedback-2"
                                                    value="no" checked>
                                                <label class="form-check-label" for="feedback-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md text-center my-1">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Entrega de notas finales del corte</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="radio" name="final_notes"
                                                    id="final_notes-1" value="si" disabled>
                                                <label class="form-check-label" for="final_notes-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input" type="radio" name="final_notes"
                                                    id="final_notes-2" value="no" checked disabled>
                                                <label class="form-check-label" for="final_notes-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <hr>
                    </div>

                    <div id="bloque_final">

                        <h3 class="text-center">Preguntas finales</h3>
                        <div class="form-row">
                            <!-- radio -->
                            <div class="col-md-4 text-center">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Actualizo contenido</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate3" type="radio" name="updated" id="updated-1"
                                                    value="si"  disabled>
                                                <label class="form-check-label" for="updated-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate3" type="radio" name="updated" id="updated-2"
                                                    value="no" checked  disabled>
                                                <label class="form-check-label" for="updated-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <!-- radio -->
                            <div class="col-md-4 text-center">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Extracatedra</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate3" type="radio" name="extracathedral"
                                                    id="extracathedral-1" value="si"  disabled>
                                                <label class="form-check-label" for="extracathedral-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate3" type="radio" name="extracathedral"
                                                    id="extracathedral-2" value="no" checked  disabled>
                                                <label class="form-check-label" for="extracathedral-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <!-- radio -->
                            <div class="col-md-4 text-center">
                                <div class="border  rounded-lg h-100 bg-dark text-white">

                                    <label>Cumple con los lineamientos de la escuela</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate3" type="radio" name="accomplish" id="accomplish-1"
                                                    value="si" disabled>
                                                <label class="form-check-label" for="accomplish-1">
                                                    Si
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-check m-1">
                                                <input class="form-check-input activate3" type="radio" name="accomplish" id="accomplish-2"
                                                    value="no" checked disabled>
                                                <label class="form-check-label" for="accomplish-2">
                                                    No
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                    </div>

                        <hr>
                        <div class="form-group">
                            <label for="comments">Comentarios</label>
                            <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                          </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button onclick=proccess_form(); class="btn btn-uft">Guardar</button>

                        <button onclick=update_stage(); class="btn btn-uft">Actualizar cortes</button>
                    </div>

                    
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

@section('script')
    <script src="{{ asset('adminlte/js/main.js') }}"></script>

    

@if(Auth::user()->hasRole('admin'))
@php($role = 'admin')
<script type="text/javascript">

    function proccess_form(){
            // For adding the token to axios header (add this only one time).
            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            axios.post('parameters/save-admin',{
                decan_id: document.getElementsByName('decan_id')[0].value,
                school_id: document.getElementsByName('school_id')[0].value,
                stage_id: document.getElementsByName('stage_id')[0].value,
                user_id: document.getElementsByName('user_id')[0].value,
                subject_id: document.getElementsByName('subject_id')[0].value,
                lapse_id: document.getElementsByName('lapse_id')[0].value,
                section_id: document.getElementsByName('section_id')[0].value,
                perfil: $('input:radio[name=perfil]:checked').val(),
                forum_info: $('input:radio[name=forum_info]:checked').val(),
                welcome_course: $('input:radio[name=welcome_course]:checked').val(),
                welcome_video: $('input:radio[name=welcome_video]:checked').val(),
                folder: $('input:radio[name=folder]:checked').val(),
                forum_info_use: $('input:radio[name=forum_info_use]:checked').val(),
                forum_doubts: $('input:radio[name=forum_doubts]:checked').val(),
                delivery_notes: $('input:radio[name=delivery_notes]:checked').val(),
                tools_use: $('input:radio[name=tools_use]:checked').val(),
                interaction: $('input:radio[name=interaction]:checked').val(),
                feedback: $('input:radio[name=feedback]:checked').val(),
                final_notes: $('input:radio[name=final_notes]:checked').val(),
                updated: $('input:radio[name=updated]:checked').val(),
                extracathedral: $('input:radio[name=extracathedral]:checked').val(),
                accomplish: $('input:radio[name=accomplish]:checked').val(),
                comments: $('input:radio[name=comments]:checked').val(),
                role: document.getElementsByName('role')[0].value
            })
            .then(function (response) {
                // handle success
                alert(response.data);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    
    }

    function update_stage(){
            // For adding the token to axios header (add this only one time).
            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Guardamos el select de etapas
            var stages = stages = $("#stage_id");

            // Guardamos el select de materias
            var users = $("#slt-users");

            // Guardamos el select de usuarios
            var subjets = $('#slt-subjects');
            

            console.log(stages)
            console.log(users)
            console.log(subjets)
    
            users.prop('disabled', true);
                    subjets.prop('disabled', true);
            axios.get('parameters-stages-admin' + '/' + users.val() + '/' + subjets.val())
            .then(function (response) {
                // handle success
                console.log(response);
                
                users.prop('disabled', false);
                subjets.prop('disabled', false);

                // Limpiamos el select
                stages.find('option').remove();

                stages.append('<option disabled selected>Selecione un bloque</option>');

                $.each(response.data.stages, function (i, v) {
                    stages.append('<option value="' + v.id + '">' + v.stage + '</option>');
                });

                stages.prop('disabled', false);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    
    }
</script>
@else
@php($role = 'director')
<script type="text/javascript">

    function proccess_form(){
            // For adding the token to axios header (add this only one time).
            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    
            axios.post('parameters/save',{
                decan_id: document.getElementsByName('decan_id')[0].value,
                school_id: document.getElementsByName('school_id')[0].value,
                stage_id: document.getElementsByName('stage_id')[0].value,
                user_id: document.getElementsByName('user_id')[0].value,
                subject_id: document.getElementsByName('subject_id')[0].value,
                lapse_id: document.getElementsByName('lapse_id')[0].value,
                section_id: document.getElementsByName('section_id')[0].value,
                perfil: $('input:radio[name=perfil]:checked').val(),
                forum_info: $('input:radio[name=forum_info]:checked').val(),
                welcome_course: $('input:radio[name=welcome_course]:checked').val(),
                welcome_video: $('input:radio[name=welcome_video]:checked').val(),
                folder: $('input:radio[name=folder]:checked').val(),
                forum_info_use: $('input:radio[name=forum_info_use]:checked').val(),
                forum_doubts: $('input:radio[name=forum_doubts]:checked').val(),
                delivery_notes: $('input:radio[name=delivery_notes]:checked').val(),
                tools_use: $('input:radio[name=tools_use]:checked').val(),
                interaction: $('input:radio[name=interaction]:checked').val(),
                feedback: $('input:radio[name=feedback]:checked').val(),
                final_notes: $('input:radio[name=final_notes]:checked').val(),
                updated: $('input:radio[name=updated]:checked').val(),
                extracathedral: $('input:radio[name=extracathedral]:checked').val(),
                accomplish: $('input:radio[name=accomplish]:checked').val(),
                comments: $('input:radio[name=comments]:checked').val(),
                role: document.getElementsByName('role')[0].value
            })
            .then(function (response) {
                // handle success
                console.log(response);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    
    }

    function update_stage(){
            // For adding the token to axios header (add this only one time).
            var laravelToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Guardamos el select de etapas
            var stages = stages = $("#stage_id");

            // Guardamos el select de materias
            var users = $("#slt-users");

            // Guardamos el select de usuarios
            var subjets = $('#slt-subjects');
    
            axios.get('parameters-stages' + '/' + users.value + '/' + subjets.value)
            .then(function (response) {
                users.prop('disabled', false);
                subjets.prop('disabled', false);

                // Limpiamos el select
                stages.find('option').remove();

                stages.append('<option disabled selected>Selecione un bloque</option>');

                $.each(response.data.stages, function (i, v) {
                    stages.append('<option value="' + v.id + '">' + v.stage + '</option>');
                });

                stages.prop('disabled', false);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            });
    
    }
</script>
@endif
@endsection
