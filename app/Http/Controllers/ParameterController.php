<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parameter;
use App\Decan;
use App\School;
use App\User;
use App\Subject;
use App\Lapse;
use App\Stage;
use App\Role;
use App\Section;
use Illuminate\Support\Facades\DB;


class ParameterController extends Controller
{
    public function index(Request $request)
    {
        $decan = new Decan();
        $lapse = new Lapse();
        $stage = new Stage();
        $section = new Section();
        $users = Role::find(3);

        // Obtener todos los datos
        $decans = $decan->all();
        $lapses = $lapse->all();
        $stages = $stage->all();
        $sections = $section->all();

        return view('admin.parameters', [
            'decans' => $decans,
            'lapses' => $lapses,
            'stages' => $stages,
            'sections' => $sections,
            'users' => $users
        ]);
    }

    public function getSchoolsByDecan(Request $request, $id)
    {

        if ($request->ajax()) {
            $school = new School();

            $schools = $school->where('decan_id', $id)->get();



            return response()->json([
                'schools' => $schools
            ]);
        }
    }

    public function getSubjectsByUser(Request $request, $id)
    {

        if ($request->ajax()) {

            $user = User::find($id);

            $subjects = $user->subjects;

            return response()->json([
                'subjects' => $subjects
            ]);
        }
    }

    public function getStagesByUser(Request $request, $user_id, $subject_id)
    {

        

            $stage = new Stage();

            $stages = [];

            $stage0 = Parameter::where('user_id', $user_id)->where('stage_id', 1)->where('subject_id', $subject_id)->get();
            $stage1 = Parameter::where('user_id', $user_id)->where('stage_id', 2)->where('subject_id', $subject_id)->get();
            $stage2 = Parameter::where('user_id', $user_id)->where('stage_id', 3)->where('subject_id', $subject_id)->get();
            $stage3 = Parameter::where('user_id', $user_id)->where('stage_id', 4)->where('subject_id', $subject_id)->get();

            $stages[] = $stage->find(1);

            if($stage0 && count($stage0) >= 1){
                $stages[] = $stage->find(2);
			}

            if($stage1 && count($stage1) >= 1){
                $stages[] = $stage->find(3);
			}

            if($stage2 && count($stage2) >= 1){
                $stages[] = $stage->find(4);
			}

            if($stage3 && count($stage3) >= 1){
                $stages[] = $stage->find(5);
			}

            

            return response()->json([
                'stages' => $stages
            ]);
        
    }



    public function save(Request $request)
    {

        // Validación
        $validate = $this->validate($request, [
            'decan_id' => 'required',
            'school_id' => 'required',
            'stage_id' => 'required',
            'user_id' => 'required',
            'subject_id' => 'required',
            'lapse_id' => 'required',
            'section_id' => 'required',
            'perfil' => 'string',
            'forum_info' => 'string',
            'welcome_course' => 'string',
            'welcome_video' => 'string',
            'folder' => 'string',
            'forum_info_use' => 'string',
            'forum_doubts' => 'string',
            'delivery_notes' => 'string',
            'tools_use' => 'string',
            'interaction' => 'string',
            'feedback' => 'string',
            'final_notes' => 'string',
            'updated' => 'string',
            'extracathedral' => 'string',
            'accomplish' => 'string',
            'comments' => 'string|nullable',
            'role' => 'string'
        ]);



        // Recoger datos
        $decan_id = $request->input('decan_id');
        $school_id = $request->input('school_id');
        $stage_id = $request->input('stage_id');
        $lapse_id = $request->input('lapse_id');
        $user_id = $request->input('user_id');
        $section_id = $request->input('section_id');
        $subject_id = $request->input('subject_id');
        $unit = 'algo';
        $perfil = $request->input('perfil');
        $forum_info = $request->input('forum_info');
        $welcome_course = $request->input('welcome_course');
        $welcome_video = $request->input('welcome_video');
        $folder = $request->input('folder');
        $forum_info_use = $request->input('forum_info_use');
        $forum_doubts = $request->input('forum_doubts');
        $delivery_notes = $request->input('delivery_notes');
        $tools_use = $request->input('tools_use');
        $interaction = $request->input('interaction');
        $feedback = $request->input('feedback');
        $final_notes = $request->input('final_notes');
        $updated = $request->input('updated');
        $extracathedral = $request->input('extracathedral');
        $accomplish = $request->input('accomplish');
        $comments = $request->input('comments');
        $role = $request->input('role');

        
        // Asignar nuevos valores al objeto del usuario
        $parameter = new Parameter();

        

        $parameter->user_id = $user_id;
        $parameter->decan_id = $decan_id;
        $parameter->school_id = $school_id;
        $parameter->subject_id = $subject_id;
        $parameter->lapse_id = $lapse_id;
        $parameter->stage_id = $stage_id;
        $parameter->unit = $unit;
        $parameter->section_id = $section_id;
        $parameter->comments = $comments;

        if ($stage_id == '1') {
            $parameter->perfil = $perfil;
            $parameter->forum_info = $forum_info;
            $parameter->welcome_course = $welcome_course;
            $parameter->welcome_video = $welcome_video;
            $parameter->folder = $folder;
        } elseif($stage_id == '2' || $stage_id == '3' ||$stage_id == '4') {
            $parameter->forum_info_use = $forum_info_use;
            $parameter->forum_doubts = $forum_doubts;
            $parameter->delivery_notes = $delivery_notes;
            $parameter->tools_use = $tools_use;
            $parameter->interaction = $interaction;
            $parameter->feedback = $feedback;
            $parameter->final_notes = $final_notes;
        } elseif ($stage_id == '5') {
            $parameter->updated = $updated;
            $parameter->extracathedral = $extracathedral;
            $parameter->accomplish = $accomplish;
        }

        

        // Guardar en la bd
        $parameter->save();

        // Redirección

        if ($role == 'admin') {
            return 'Se ha guardado correctamente correctamente!!';
        } else {
            return 'Se ha guardado correctamente correctamente!!';
        }
        
    }

    public function reportComplete()
    {
        
        $parameters = Parameter::get()->load('user')->load('stage')->load('lapse')->load('subject')->load('section')->load('decan')->load('school');

        return view('admin.reportComplete', [
            'parameters' => $parameters,
        ]);
        
        
    }

    public function reportByOperative($id)
    {
        if ($id != 'false') {
            $user = User::find($id);
        } else {
            $user = \Auth::user();
            $id = $user->id;
        }
        $parameters = Parameter::where('user_id', $id)->get()->load('user')->load('stage')->load('lapse')->load('subject')->load('section')->load('decan')->load('school');

        return view('admin.reportOperative', [
            'parameters' => $parameters,
            'user' => $user
        ]);
        
        
    }

    public function reportByDecan($id)
    {
        $user = Decan::find($id);
        $parameters = Parameter::where('decan_id', $id)->get()->load('user')->load('stage')->load('lapse')->load('subject')->load('school');

        return view('admin.decanReport', [
            'parameters' => $parameters,
            'user' => $user
        ]);
        
        
    }

    public function reportBySchool($id)
    {
        $user = School::find($id);
        $parameters = Parameter::where('school_id', $id)->get()->load('user')->load('stage')->load('lapse')->load('subject')->load('decan');

        return view('admin.schoolReport', [
            'parameters' => $parameters,
            'user' => $user
        ]);
        
        
    }

    public function reportBySubject($id)
    {
        $user = Subject::find($id);
        $parameters = Parameter::where('subject_id', $id)->get()->load('user')->load('stage')->load('lapse')->load('subject')->load('decan')->load('school');

        return view('admin.subjectReport', [
            'parameters' => $parameters,
            'user' => $user
        ]);
        
    }

    public function statistics()
    {
        
        $rows_0 = Parameter::where('stage_id', 1)->count();
        $rows_1 = Parameter::where('stage_id', 2)->count();
        $rows_2 = Parameter::where('stage_id', 3)->count();
        $rows_3 = Parameter::where('stage_id', 4)->count();

        $percentages_0 = $this->getStatistics(1, $rows_0);
        $percentages_1 = $this->getStatistics(2, $rows_1);
        $percentages_2 = $this->getStatistics(3, $rows_2);
        $percentages_3 = $this->getStatistics(4, $rows_3);

        return view('admin.statistics', [
            'percentages_0' => $percentages_0,
            'percentages_1' => $percentages_1,
            'percentages_2' => $percentages_2,
            'percentages_3' => $percentages_3
        ]);
    }

    public function getStatistics($id, $rows)
    {
        $fields = array('perfil', 'forum_info', 'welcome_course', 'welcome_video', 'folder', 'forum_info_use', 'forum_doubts', 'delivery_notes', 'tools_use', 'interaction', 'feedback', 'final_notes', 'updated', 'extracathedral', 'accomplish');

        foreach ($fields as $field) {
            $new[] = Parameter::where($field, 'si')->where('stage_id', $id)->count();
        }

        $names = ['Perfil', 'Foro de Informacion', 'Bienvenida al curso', 'Video de Bienvenida', 'Carpeta', 'Foro de Informacion', 'Foro de dudas', 'Entrega de nota segun reglamento', 'Uso de Zoom, Blue Bottom, pizarras', 'Interaccion Docente-Estudiante', 'Realimentacion', 'Entrega de notas finales del corte', 'Actualizo contenido', 'Extracatedra', 'Cumple con los lineamientos de la escuela'];

        $totals = array_combine($names, $new);

        
        foreach ($totals as $key => $total) {
            if ($rows != 0) {
                $result = ($total * 100) / $rows;
                $percentages[$key] = $result;
            } else {
                $percentages[$key] = 0;
            }
        }
        

        return $percentages;
    }
}
