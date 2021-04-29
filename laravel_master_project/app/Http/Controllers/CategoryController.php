<?php

namespace App\Http\Controllers;
use Session;
use App\Category;
use App\service;
use DB;
use App\review;
use Illuminate\Http\Request;
 use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // this code is for pagination 
        // $categories = DB::table('categories')->paginate(4);
        $categories = Category::all();
        return view('publicPages.catPublic', [
            'categories' => $categories,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('categories', [
            'categories' => $categories,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category            = new Category();
        $category->name   = $request->get('name');
        $category->image     = $request->get('image');

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/photo/', $filename);
            $category->image = $filename;
        } else {
            // return $request;
            $category->image = '';
        }

        $category->save();
        Session::flash('record_added', 'New service has been created successfully');

        return redirect()->route('Category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Category::where('id', '=', $id)->first();
        return view('dashboardPages.edit_category', [
            'categorie' => $categorie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        Category::where('id', '=', $category)
            ->update(['name' => $request->get('name')]);
        return redirect()->route('Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\admins  $admins
     * @return \Illuminate\Http\Response
     */
    public function delete($category)
    {
        Category::where('id', $category)->delete();
        // Session::flash('record_added', 'New service has been created successfully');

        return redirect()->route('Category');
    }



    public function showSubcat($id)
    {

        $subcat = Category::find($id);
        return view('publicPages.subCat', compact('subcat', 'id'));
    }



    //////////////////////////this is to show categories as selecting list in add_service page
    // public function categoryforservice()
    // {

    //   return view('provider.add_service',[
    //       'categories' => Category::all(),
    //   ]);
    // }


    ///////////////////////////////this is for relation one to many 
    /////////////////////////////////between cat and services (service is the method in category model)

    public function show1($id)
    {
        
      $x=  $serv = Category::find($id)->service;
        $serviesNo = count($serv);

    
    if(isset($_GET['sort'])  && !empty($_GET['sort'])){
        if($_GET['sort'] == "htl"){
    $x=  $serv->sortByDesc('price')->values();
    }elseif($_GET['sort'] == "lth"){
        $x=  $serv->sortBy('price')->values();
    }elseif($_GET['sort'] == "new"){
        $x=  $serv->sortByDesc('id')->values();
    }

             }


     foreach($serv as $xx){
         $id=$xx->id;
        $avg = review::where('service_id', '=', $id)->avg('rating'); 
        $reviewSum =round($avg);
     }
    //  dd ($reviewSum);
        
      

        return view('publicPages/PostsCategories', compact('x', 'serviesNo'));
    }
    /************************************************************************************* */

    // public function filter(Request $request)
    // {

    //     $Desc = service::all()->sortByDesc('price');
    //     return view('publicPages/PostsCategories', compact('Desc'));
    // }

    //////////////////////////this is to show categories as selecting list in provider profile page

    public function categoryforprofile()
    {
        return view('provider.profile', [
            'categories' => Category::all(),
        ]);
    }





   
}










