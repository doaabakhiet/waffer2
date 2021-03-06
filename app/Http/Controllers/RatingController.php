<?php

namespace App\Http\Controllers;

use App\Rating;
use App\Search;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{

    public function insertsearch(Request $request){
        $id=$request->productid;
        $styleforicon="blue";
        $addtowishlistbefore=DB::table('wishlists')->
        where('userId','=',Auth::user()->id,'AND','productid','=',$id)->get();
        if($addtowishlistbefore->isEmpty()){
            $styleforicon="red";
        }
        $search= new Search();

        $search->searchName = $request->txtsearch;
        $search->save();

        $inputsearch=$request->txtsearch;
        $locations = DB::table('products')->select('productAddress')->get();


        $searchResult=DB::table('products')->where('productName','like','%'.$inputsearch.'%')->orderBy('productPrice')->get();
        return view('products',compact('searchResult','styleforicon'),compact('inputsearch'),compact('locations'));

    }




    public function dislike(Request $request)
    {
        $userid=Auth::user()->id;
        $inputsearch=$request->inputsearch;
        $searchResult=DB::table('products')->where
        ('productName','like','%'.$inputsearch.'%')
            ->orderBy('productPrice')->get();
        $id=$request->productid;
        $users=DB::table('ratings')->
        where('userId','=',$userid,'AND','productid','=',$id,'dislike','<>',1)->get();

        $rating= new Rating();
        $rating->like=0;
        $rating->dislike=1;
        $rating->userId=Auth::user()->id;
        $rating->productid=$request->productid;
        $rating->save();
        if($users==null){
        $flag=$request->flagtoupdate;
        if($flag==1){
            DB::table('products')->where('id',$id)->update(array('dislike'=>$request->dislike));

        }
        else if($flag==0)
        {
            $id=$request->productid;
            DB::table('products')->where('id',$id)->update(array('dislike'=>$request->dislike));
        }}

        return view('products',compact('searchResult'),compact('inputsearch'));
    }




    public function like(Request $request)
    {
        $userid=Auth::user()->id;
        $inputsearch=$request->inputsearch;
        $searchResult=DB::table('products')->where
        ('productName','like','%'.$inputsearch.'%')
            ->orderBy('productPrice')->get();
        $id=$request->productid;
        $users=DB::table('ratings')->
        where('userId','=',$userid,'AND','productid','=',$id,'like','<>',1)->get();

        if($users==null){
        $rating= new Rating();
        $rating->like=1;
        $rating->dislike=0;
        $rating->userId=Auth::user()->id;
        $rating->productid=$request->productidlike;
        $rating->save();


        $flag=$request->flagtoupdatelike;
        if($flag==1){
            $id=$request->productidlike;
            DB::table('products')->where('id',$id)->update(array('like'=>$request->like));

        }
        else if($flag==0)
        {
            $id=$request->productidlike;
            DB::table('products')->where('id',$id)->update(array('like'=>$request->like));
        }
        }

            return view('products',compact('searchResult'),compact('inputsearch'));
    }




}
