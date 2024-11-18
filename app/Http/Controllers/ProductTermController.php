<?php

namespace App\Http\Controllers;

use App\Models\ProductTerm;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ProductTermController extends Controller
{

    public $term_type;

    public function __construct() {
        $this->term_type = 'category';        
        if(preg_match('/size/',$_SERVER['REQUEST_URI'])) {
            $this->term_type = "size";
        }
        if(preg_match('/color/',$_SERVER['REQUEST_URI'])) {
            $this->term_type = "color";
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $terms = ProductTerm::where('term', $this->term_type)->paginate(10);
        return view('admin.terms',['title' => ucwords($this->term_type) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // default its category to add
        // if(stripos('category',$_SERVER['REQUEST_URI']) {
        //     $term_type = "category"
        // }
        return view('admin.add-term',['title' => ucwords($this->term_type), 'term_type' => $this->term_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'term' => 'required',
            'name' => 'required',
            'slug' => "required|unique:product_terms,slug",
        ]);

        $term = $request->all();        

        ProductTerm::create([
            'term' => $term['term'],
            'name' => $term['name'],
            'slug' => $term['slug'],
            'parent_id' => 0
        ]);

        return redirect(route($term['term'].'.index'))->with(['success' => ucfirst($term['term'])." Created Successfully"]);;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTerm  $productTerm
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTerm $productTerm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTerm  $productTerm
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productTerm = ProductTerm::find($id);        
        return view('admin.edit-term',['title' => ucwords('Edit '. $productTerm->term), 'term_type' => $productTerm->term, 'term' => $productTerm]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductTerm  $productTerm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'term' => 'required',
            'name' => 'required',
            'slug' => "required|unique:product_terms,slug,$id",
        ]);

        $term = $request->all();       
        
        ProductTerm::find($id)->update([
            'name' => $term['name'],
            'slug' => $term['slug'],
        ]);

        return redirect(route($term['term'].'.index'))->with(['success' => ucfirst($term['term'])." Updated Successfully"]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTerm  $productTerm
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $term = ProductTerm::find($id);
        $term->delete();
        
        return response()->json([
            'status' => 1,
        ]);
    }

    public function getTerms(Request $request) {
        return Datatables::make($this->getForDataTable($request->all()))
            ->escapeColumns(['id'])        
            ->editColumn('name', fn($term) => $term->name)
            ->editColumn('slug', fn($term) => $term->slug)                   
            ->editColumn('created_at', fn($term) => Carbon::parse($term->created_at)->format('F d, Y'))
            ->addColumn('actions', function ($term) {
                return "<a href='".route($term->term. '.edit', $term->id)."' class='btn btn-tool'><i class='fas fa-pen'></i></a>
                <a href='javascript:;' class='btn btn-tool delete_" . $term->id . "' data-url='" . route($term->term. '.destroy', $term->id) . "'  onclick='deleteRecorded(" . $term->id . ")'><i class='fas fa-trash'></i></a>";
            })
            ->make(true);
    }

    public function getForDataTable($input)
    {
        $dataTableQuery = ProductTerm::query()->where('term', $input['type']);


        if (isset($input['date']) && $input['date'] != '') {
            $from = explode(' - ', $input['date'])[0];
            $to = explode(' - ', $input['date'])[1];
            $from = date('Y-m-d',strtotime($from));
            $to = date('Y-m-d',strtotime($to));
            $dataTableQuery->whereBetween('product_terms.created_at', [$from, $to]);
        }

        // if (isset($input['date']) && $input['date'] != '') {
        //     $dataTableQuery->whereDate('components.created_at', '=', $input['date']);
        // }        

        return  $dataTableQuery;
    }
}
