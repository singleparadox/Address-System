<?php

namespace App\Http\Controllers;

use App\RegionModel;
use App\ProvinceModel;
use App\MunicipalityModel;
use App\BarangayModel;

use Illuminate\Http\Request;

use function PHPSTORM_META\map;

class CrudController extends Controller
{

    public function regions() { // Read Regions
        $read_data = RegionModel::all();

        $i = 0;
        $regions = array();
        foreach ($read_data as $data) {
            $regions[$i] = [$data->reg_id , $data->reg_name];
            $i++;
        }

        return view('root', compact('regions'));
    }

    public function create_region() { // Create a Region Page
        return view('create_region_form');
    }

    public function create_region_send(Request $request) { // Create a Region in database
        if($request->ajax())
        {
            //$data = json_decode($request);
            $region_model = new RegionModel;
            $region_model->reg_name = $request->input('value');
            $region_model->saveOrFail();

            return 'success';
        }
    }

    public function edit_region($region_id, $old_name) { // Create a Region Page
        return view('edit_region_form', compact('region_id', 'old_name'));
    }

    public function edit_region_send(Request $request) {
        if($request->ajax())
        {
            //$data = json_decode($request);
            $region_model = new RegionModel;
            $region_model
                ->where('reg_id', $request
                ->input('reg_id'))
                ->limit(1)->update(array('reg_name'=> ($request->input('value') )));

            return 'success';
        }
    }

    public function delete_region(Request $request) {
        if($request->ajax()) {
            $prov_model = new ProvinceModel;
            $region_model = new RegionModel;

            $count = $prov_model->where('reg_id', $request->input('value'))->count();

            if ($count > 0) {
                return 'has_children';
            } elseif ($count == 0){
                $region_model->where('reg_id', $request->input('value'))->delete();
                return 'success';
            } else {
                return 'fail';
            }

        }
    }


    // PROVINCES
    public function provinces ($region_id) {
        $get_provinces = ProvinceModel::all()->where('reg_id', '==', $region_id);

        $i = 0;
        $provinces = array();
        foreach ($get_provinces as $province){
            $provinces[$i] = [$province->prov_id, $province->prov_name];
            $i++;
        }
        return view('provinces', compact('region_id', 'provinces'));
    }

    public function create_province($region_id) { // Create a Province Page
        return view('create_province_form',compact('region_id'));
    }

    public function create_province_send(Request $request) { // Create a Province in database
        if($request->ajax())
        {
            //$data = json_decode($request);
            $prov_model = new ProvinceModel;
            $prov_model->prov_name = $request->input('value');
            $prov_model->reg_id = $request->input('reg_id');
            $prov_model->saveOrFail();

            return 'success';
        }
    }

    public function edit_province($region_id, $prov_id, $old_name) { // Create a Region Page
        return view('edit_province_form', compact('region_id', 'prov_id', 'old_name'));
    }

    public function edit_province_send(Request $request) { // Create a Region in database
        if($request->ajax())
        {
            //$data = json_decode($request);
            $prov_model = new ProvinceModel;
            $prov_model
                ->where('prov_id', $request
                ->input('prov_id'))
                ->limit(1)->update(array('prov_name'=> ($request->input('value') )));

            return 'success';
        }
    }

    public function delete_province(Request $request) {
        if($request->ajax()) {
            $muni_model = new MunicipalityModel;
            $prov_model = new ProvinceModel;

            $count = $muni_model->where('prov_id', $request->input('value'))->count();

            if ($count > 0) {
                return 'has_children';
            } elseif ($count == 0){
                $prov_model->where('prov_id', $request->input('value'))->delete();
                return 'success';
            } else {
                return 'fail';
            }

        }
    }

    public function municipalities ($region_id, $province_id) { // Fetch Municipalities
        $get_muni = MunicipalityModel::all()->where('prov_id', '==', $province_id);

        $i = 0;
        $munis = array();
        foreach ($get_muni as $muni){
            $munis[$i] = [$muni->munici_id, $muni->munici_name];
            $i++;
        }
        return view('municipality', compact('region_id', 'province_id', 'munis'));
    }

    public function edit_municipality($region_id, $prov_id, $muni_id, $old_name) {
        return view('edit_municipality_form', compact('region_id', 'prov_id', 'muni_id', 'old_name'));
    }

    public function edit_municipality_send(Request $request) {
        if($request->ajax())
        {
            //$data = json_decode($request);
            $prov_model = new MunicipalityModel();
            $prov_model
                ->where('munici_id', $request
                ->input('muni_id'))
                ->limit(1)->update(array('munici_name'=> ($request->input('value') )));

            return 'success';
        }
    }

    public function create_muni($region_id, $prov_id) { // Create a Municipality Page
        return view('create_muni_form',compact('region_id', 'prov_id'));
    }

    public function create_muni_send(Request $request) { // Create a Municipality in database
        if($request->ajax())
        {
            //$data = json_decode($request);
            $muni_model = new MunicipalityModel();
            $muni_model->munici_name = $request->input('value');
            $muni_model->prov_id = $request->input('prov_id');
            $muni_model->saveOrFail();

            return 'success';
        }
    }

    public function delete_municipality(Request $request) {
        if($request->ajax()) {
            $barangay_model = new BarangayModel;
            $muni_model = new MunicipalityModel;

            $count = $barangay_model->where('munici_id', $request->input('value'))->count();

            if ($count > 0) {
                return 'has_children';
            } elseif ($count == 0){
                $muni_model->where('munici_id', $request->input('value'))->delete();
                return 'success';
            } else {
                return 'fail';
            }

        }
    }

    public function barangay ($region_id, $province_id, $muni_id) {
        $get_bara = BarangayModel::all()->where('munici_id', '==', $muni_id);

        $i = 0;
        $barangays = array();
        foreach ($get_bara as $bara){
            $barangays[$i] = [$bara->barangay_id, $bara->barangay_name];
            $i++;
        }
        return view('barangay', compact('region_id', 'province_id', 'muni_id', 'barangays'));
    }

    public function edit_barangay($region_id, $prov_id, $muni_id, $barangay_id, $old_name) {
        return view('edit_barangay_form', compact('region_id', 'prov_id', 'muni_id', 'barangay_id', 'old_name'));
    }

    public function edit_barangay_send(Request $request) {
        if($request->ajax())
        {
            //$data = json_decode($request);
            $barangay_model = new BarangayModel();
            $barangay_model
                ->where('barangay_id', $request
                ->input('barangay_id'))
                ->limit(1)
                ->update(array('barangay_name'=> ($request->input('value') )));

            return 'success';
        }
    }

    public function create_barangay($region_id, $prov_id, $muni_id) { // Create a Region Page
        return view('create_barangay_form',compact('region_id', 'prov_id', 'muni_id'));
    }

    public function create_barangay_send(Request $request) { // Create a Region in database
        if($request->ajax())
        {
            //$data = json_decode($request);
            $barangay_model = new BarangayModel();
            $barangay_model->barangay_name = $request->input('value');
            $barangay_model->munici_id = $request->input('muni_id');
            $barangay_model->saveOrFail();

            return 'success';
        }
    }

    public function delete_barangay(Request $request) { // Create a Region in database
        if($request->ajax())
        {
            //$data = json_decode($request);
            $barangay_model = new BarangayModel;
            /*$region_model
                ->where('reg_id', $request
                ->input('reg_id'))
                ->limit(1)->update(array('reg_name'=> ($request->input('value') )));
            */
            $barangay_model
                ->where('barangay_id', $request->input('value'))
                ->delete();
            return 'success';
        }
    }



}
