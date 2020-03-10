<?php

namespace App\Http\Controllers;

use App\form;
use App\User;
use App\UserPhone;
use validate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{


    public function index(){
        return view('form');
    }

    public function store(Request $request)
    {
//        $data = form::all();
//        if(array_key_exists('phone',$data)){
//            $phone = explode(',',$data['phone']);
//            $i = 0;
//            $test =[];
//            foreach ($phone as $ph){
//                $test[$i] = $ph;
//                $i++;
//            }
//            return $phone;
//        }

//        $valid = (array) DB::table('user_phones')->select('phone')->get();
//        foreach ($request->input('phone') as $list){
//           return $list;
//        }
//        foreach ($valid as $value) {
//            return $value;
//        }
//        $value ='';
//        $list ='';
//        if ($value === $list){
//            return $list.'number exists';
//        }

//        }
//        $request->validate(['phone.*'=>['required','distinct','unique:user_phones,phone','max:10']]);
//

//             $test = UserPhone::all()->pluck('phone')->toArray();
//             $d = $request->input('phone');
//            if(in_array($d,$test,true)) {
//                print_r($d);
//                die();
//            }
//            else{

//        $phone = implode(',',$request->input('phone'));
//        form::create($request->except('phone')+['phone'=>$phone]);
//            if ($validated->fails()) {
//                return redirect()->back()->withErrors($validated)->withInput();
//            }
//           dd('success');

        if($request->ajax()) {
            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required|email|unique:forms',
                'address'=> 'required|max:50',
                'phone.*'=>['required','distinct','unique:user_phones,phone','max:10']
            ]);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $form = new form();
            $form->name = $request->input('name');
            $form->email = $request->input('email');
            $form->address = $request->input('address');
//       dd($request->all());
            $form->save();
//            $data = $request->input('phone');
//        foreach ($data as $d) {
//            $form->phones()->create([
//                'phone' => $d
//            ]);
//        }
//        foreach (collect($data) as $phone=>$ph){
//            $phone = new UserPhone();
//            $phone->user_id = 1;
//            $phone->phone = $ph;
//            $phone->save();
//        }
//        foreach ($request->input('phone') as $phone=>$ph)
//          $data = $request->input('phone');
//          $ph = collect($data);
            $data = $request->input('phone');

            $form->phones()->createMany(collect($data)->map(function ($phone) {
                return ['phone' => $phone];
            }));
            return response()->json($form);
          }
//            return redirect()->back()->with('success', 'form submitted successfully');
        }

        public function edit($id){
        $uid = form::find($id);
        return response()->json($uid);

        }
        public function destroy($id){
        $uid = form::find($id);
        $uid->delete();
        return response()->json($uid);

        }

        /**
         * Updating data
         */
    public function update( Request $request)
    {
        dd($request->all());
     $id = $request->get('id');
     if($id)
     {
         try {
             $update_data = [
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'address' => $request->get('address'),
             ];

             form::where('id', $id)->update($update_data);

         }catch(\Exception $exception){
             return response()->json(['error' =>'Something went wrong'],500);
         }
     }
    }

}
