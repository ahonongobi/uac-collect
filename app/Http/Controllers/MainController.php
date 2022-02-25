<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\ImpactStructure;
use App\Models\ObjectParteners;
use App\Models\Others;
use App\Models\Partner;
use App\Models\UacEntity;
use App\Models\UacStructure;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function storeData(Request $request){
        // dd($request);
        $request->validate([
            'partner_name' => 'required',
            'partner_type' => 'required',
            'year_signature' => 'required',
            'object' => 'required'
        ]);

        $parters = new Partner();

        $parters->name = $request->partner_name;
        $parters->type = $request->partner_type;
        $parters->partnership_purpose = $request->object;
        $parters->year_signature = $request->year_signature;
        $parters->save();
        $entier = "";
        $nb = 0;
        $j = count($request->request);
        $words = $request;
        // dd($request);
        foreach($request->request as $key => $mot){
            $entities = $entier. ','.$key;
            if(str_contains($key, 'activity_')){
                $nb = $nb+1;
            }
        }

            if($nb >= 1){
                $structures = "";
                $entities = "";
                $activite = new Activity();
                $activite->entitled = $request->activity_1['title'];
                $activite->year_of_execution = $request->activity_1['year'];
                $tab = $request->activity_1['uacStructure'];
                $tab2 = $request->activity_1['uacEntity'];

                for ($i=0; $i < count($tab); $i++){
                    $structures = $structures. ','.$tab[$i];
                }

                for ($i=0; $i < count($tab2); $i++){
                    $entities = $entities. ','.$tab2[$i];
                }
                $activite->structures = $structures;
                $activite->entities = $entities;
            }


            if($nb >= 2){
                $structures = "";
                $entities = "";
                $activite = new Activity();
                $activite->entitled = $request->activity_2['title'];
                $activite->year_of_execution = $request->activity_2['year'];
                $tab = $request->activity_2['uacStructure'];
                $tab2 = $request->activity_2['uacEntity'];

                for ($i=0; $i < count($tab); $i++){
                    $structures = $structures. ','.$tab[$i];
                }

                for ($i=0; $i < count($tab2); $i++){
                    $entities = $entities. ','.$tab2[$i];
                }
                $activite->structures = $structures;
                $activite->entities = $entities;
                $activite->save();

            }

            if($nb >=  3){
                $structures = "";
                $entities = "";
                $activite = new Activity();
                $activite->entitled = $request->activity_3['title'];
                $activite->year_of_execution = $request->activity_3['year'];
                $tab = $request->activity_3['uacStructure'];
                $tab2 = $request->activity_3['uacEntity'];

                for ($i=0; $i < count($tab); $i++){
                    $structures = $structures. ','.$tab[$i];
                }

                for ($i=0; $i < count($tab2); $i++){
                    $entities = $entities. ','.$tab2[$i];
                }
                $activite->structures = $structures;
                $activite->entities = $entities;
                $activite->save();

            }

            if($nb >= 4){
                $structures = "";
                $entities = "";
                $activite = new Activity();
                $activite->entitled = $request->activity_4['title'];
                $activite->year_of_execution = $request->activity_4['year'];
                $tab = $request->activity_4['uacStructure'];
                $tab2 = $request->activity_4['uacEntity'];

                for ($i=0; $i < count($tab); $i++){
                    $structures = $structures. ','.$tab[$i];
                }

                for ($i=0; $i < count($tab2); $i++){
                    $entities = $entities. ','.$tab2[$i];
                }
                $activite->structures = $structures;
                $activite->entities = $entities;
                $activite->save();

            }



        $uacEntities = UacEntity::all();
        $uacStructures = UacStructure::all();
        $objects = ObjectParteners::all();

        //return view('main.index', compact('uacEntities', 'uacStructures', 'objects'));
        $request->session()->flash('message', 'Vos informations ont été soumis avec succès!');

        return back();

    }

    public function addObject(){
        $objects = ObjectParteners::all();
        return view('main.add-object', compact('objects'));
    }

    public function addStruct(){
        $uac_structures = UacStructure::all();
        return view('main.add-struct', compact('uac_structures'));
    }

    public function storeStructure(Request $request){
        $request->validate(['uac_structure' => 'required']);

        $struct = new UacStructure();
        $struct->name = $request->uac_structure;
        $struct->save();
        $uac_structures = UacStructure::all();
        return view('main.add-struct', compact('uac_structures'));
    }

    public function addFormation(){
        $formations = UacEntity::all();
        return view('main.formation', compact('formations'));
    }

    public function storeFormation(Request $request){
        $request->validate(['formation' => 'required']);

        $formation = new UacEntity();
        $formation->name = $request->formation;
        $formation->save();
        $formations = UacEntity::all();
        return view('main.formation', compact('formations'));
    }

    public function storeObjectParteners(Request $request){
        $request->validate(['object' => 'required']);
        $object = new ObjectParteners();
        $object->name = $request->object;
        $object->save();
        $objects = ObjectParteners::all();
        return view('main.add-object', compact('objects'));
    }

    public function index(Request $request)
    {
        // if ($request->isMethod('POST')) {
        //     $partner = Partner::firstOrCreate([
        //         'name'  =>  $request->partner_name,
        //     ], [
        //         'name'  =>  $request->partner_name,
        //         'type'  =>  $request->partner_type,
        //         'partnership_purpose'  => json_encode($request->partnership_purpose),
        //         'year_signature' => $request->year_signature,
        //     ]);



        //     $request->collect()->filter(function ($value, $key) use ($partner) {
        //         if (str_starts_with($key, 'activity_')) {
        //             $activity = Activity::create([
        //                 'entitled'          =>  $value['title'],
        //                 'year_of_execution' =>  $value['year'],
        //                 'partner_id'        =>  $partner->id
        //             ]);

        //             $activity->uacStructures()->sync($value['structureUac']);

        //             $activity->uacEntities()->sync($value['structureEntity']);

        //             $activity->otherUacStructuresImplies()->sync($value['otherEntities']);

        //             foreach ($value['impactStructure'] as $key => $impactStructure) {
        //                 if (!empty($impactStructure)) {
        //                     $activity->impactStructures()->create([
        //                         'entitled'  =>  $impactStructure
        //                     ]);
        //                 }
        //             }

        //             foreach ($value['falloutStructure'] as $key => $falloutStructure) {
        //                 if (!empty($falloutStructure)) {
        //                     $activity->falloutStrucures()->create([
        //                         'entitled'  =>  $falloutStructure
        //                     ]);
        //                 }
        //             }

        //             foreach ($value['impactUac'] as $key => $impactUac) {
        //                 if (!empty($impactUac)) {
        //                     $activity->impactUacs()->create([
        //                         'entitled'  =>  $impactUac
        //                     ]);
        //                 }
        //             }

        //             foreach ($value['falloutUac'] as $key => $falloutUac) {
        //                 if (!empty($falloutUac)) {
        //                     $activity->falloutUacs()->create([
        //                         'entitled'  =>  $falloutUac
        //                     ]);
        //                 }
        //             }
        //             foreach ($value['structureEntity'] as $key => $impactUac) {
        //                 if (!empty($impactUac)) {
        //                     $activity->impactUacs()->create([
        //                         'entitled'  =>  $impactUac
        //                     ]);
        //                 }
        //             }

        //         }

        //     });

        //     $partner->suggestions()->create([
        //         'suggestion' => $request->suggestion
        //     ]);

        //     $request->session()->flash('message', 'Vos informations ont été soumis avec succès!');

        //     return back();
        // }

        $uacEntities = UacEntity::all();
        $uacStructures = UacStructure::all();
        $objects = ObjectParteners::all();

        return view('main.index', compact('uacEntities', 'uacStructures' ,'objects'));
    }




    // public function store(Request $request)
    // {
    //     if ($request->isMethod('POST')) {
    //         $partner = Partner::firstOrCreate([
    //             'name'  =>  $request->partner_name,
    //         ], [
    //             'name'  =>  $request->partner_name,
    //             'type'  =>  $request->partner_type,
    //             'partnership_purpose'  => json_encode($request->partnership_purpose),
    //             'year_signature' => $request->year_signature,
    //         ]);



    //         $request->collect()->filter(function ($value, $key) use ($partner) {
    //             if (str_starts_with($key, 'activity_')) {
    //                 $activity = Activity::create([
    //                     'entitled'          =>  $value['title'],
    //                     'year_of_execution' =>  $value['year'],
    //                     'partner_id'        =>  $partner->id,

    //                 ]);




    //                 // $activity->uacStructures()->sync($value['structureUac']);

    //                 //$activity->uacEntities()->sync($value['structureEntity']);

    //                 //$activity->otherUacStructuresImplies()->sync($value['otherEntities']);

    //                 /**foreach ($value['impactStructure'] as $key => $impactStructure) {
    //                     if (!empty($impactStructure)) {
    //                         $activity->impactStructures()->create([
    //                             'entitled'  =>  $impactStructure
    //                         ]);
    //                     }
    //                 }

    //                 foreach ($value['falloutStructure'] as $key => $falloutStructure) {
    //                     if (!empty($falloutStructure)) {
    //                         $activity->falloutStrucures()->create([
    //                             'entitled'  =>  $falloutStructure
    //                         ]);
    //                     }
    //                 }

                    // foreach ($value['structureEntity'] as $key => $impactUac) {
                    //     if (!empty($impactUac)) {
                    //         $activity->impactUacs()->create([
                    //             'entitled'  =>  $impactUac
                    //         ]);
                    //     }
                    // } **/
    //                 // a noter  ces informations sont stockées dans la table impact_uacs
    //                 foreach ((array)$value['structureEntity'] as $key => $impactUac) {
    //                     if (!empty($impactUac)) {
    //                         $activity->impactUacs()->create([
    //                             'entitled'  =>  $impactUac
    //                         ]);
    //                     }
    //                 }
    //                 foreach ($value['falloutUac'] as $key => $falloutUac) {
    //                     if (!empty($falloutUac)) {
    //                         $activity->falloutUacs()->create([
    //                             'entitled'  =>  $falloutUac
    //                         ]);
    //                     }
    //                 }

    //             }

    //         });

    //         $partner->suggestions()->create([
    //             'suggestion' => $request->suggestion,
    //             'difficulte' => $request->diffulte
    //         ]);
    //         $partner->other()->create([
    //             'email' => $request->email,
    //             'tel'=> $request->tel,
    //             'identite' => $request->identite,
    //             'poste' => $request->poste,
    //         ]);


    //         $request->session()->flash('message', 'Vos informations ont été soumis avec succès!');

    //         return back();
    //     }

    //     $uacEntities = UacEntity::all();
    //     $uacStructures = UacStructure::all();

    //     return view('main.index', compact('uacEntities', 'uacStructures'));
    // }


    // public function storess(Request $request){
    //     $partner = Partner::firstOrCreate([
    //         'name'  =>  $request->partner_name,
    //     ], [
    //         'name'  =>  $request->partner_name,
    //         'type'  =>  $request->partner_type,
    //         'partnership_purpose'  => json_encode($request->partnership_purpose),
    //         'year_signature' => $request->year_signature,
    //     ]);

    //     foreach($request->activity_1 as $key => $value){
    //         Activity::create($value);

    //     }


    // }

    public function viewDashboard(){
        $partners = Partner::all();
        return view('main.dashboard', compact('partners'));
    }
}


