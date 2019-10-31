<?php

namespace App\Http\Controllers;

use App\Family;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function foo\func;


class FamilyController extends Controller
{
    public  function  save(Request $request)
    {
        $validateRule=[
            'first_name'=>'required|string|max:255',
            'middlen_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            'gender'=>'required|numeric|min:0|max:1',
            'relationship'=>'required|numeric|min:1|max:3',




        ];
        $validator = Validator::make($request->all(), $validateRule);
        if ($validator->fails())
        {
            return $validator;

        }
        else
        {

            $family=Family::create($request->all());


        }
        return $family;
    }
    public  function  update(Request $request,$id)
    {
        $validateRule=[
            'first_name'=>'string|max:255',
            'middlen_name'=>'string|max:255',
            'last_name'=>'string|max:255',
            'gender'=>'numeric|min:0|max:1',
            'relationship'=>'numeric|min:1|max:3',




        ];

        $member=Family::find($id);
        if ($member!=null)
        {
            $member->first_name=$request->first_name;
            $member->middlen_name=$request->middlen_name;
            $member->last_name=$request->last_name;
            $member->gender_name=$request->gender_name;
            $member->relationship=$request->relationship;
            $member->family_member=$request->family_member;
            $member->save();


        }
        return $member;


    }
    public  function  show($id)
    {
        return Family::where('id',$id);


    }
    public  function  delete_member($id){
        $members=Family::where('id',$id)->orWhere(function ($q) use($id) {
        $q->where('family_member', $id)
            ->andWhere('relationship','>','1');
        })->get();
        foreach ($members as $member)
        {
            $member->delete();
        }

    }
    public  function  showlist ()
    {
        $family=Family::get()->toArray();
        return view('welcome')->with('family',$family);
    }

}
