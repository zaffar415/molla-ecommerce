<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductTerm;
use App\Models\ProductRelationship;
use Illuminate\Support\Facades\Hash;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;

class ProductController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $products = Product::orderBy('created_at')->paginate(10);        
        // return view('shop',['title'=> 'Shop', 'products' => $products]);
        return view('admin.products',['title'=> 'Products']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $terms = ProductTerm::all();
        $category = array();
        $sizes = array();
        $color = array();
        foreach($terms as $term) {
            if($term->term == 'size') {
                $sizes[$term->id] = $term->name;
            } else if($term->term == 'category') {
                $category[$term->id] = $term->name;
            } else if($term->term == 'color') {
                $color[$term->id] = $term->name;
            }
        }   
        
        return view('admin.add-product', ['title' => 'Add Product', 'category' => $category, 'sizes' => $sizes, 'color' => $color]);
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
            'images' => 'required',
            'title' => 'required',
            'slug' => 'required|unique',
            'small_description' => 'required',
            'description' => 'required',
            'additional_information' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'sometimes|numeric',
            'color' => 'required',
        ],[
            'price.numeric' => 'Please Enter a valid Amount for Price',
            'sale_price.numeric' => 'Please Enter a valid Amount for Sale Price'
        ]);

        $input = $request->all();
        $images = [];
        if(isset($input['images'])) {            
            foreach($input['images'] as $key=>$color) {
                foreach($color as $image) {
                    $fileName = rand().$image->getClientOriginalName();
                    $image->move(public_path('product/'), $fileName);                
                    $images[$input['color'][$key]][] = $fileName;
                }                
            }
        }

        // dd($images);

        $product = Product::create([
            'title' => $input['title'],
            'slug' => $input['slug'],
            'small_description' => $input['small_description'],
            'description' => $input['description'],
            'additional_information' => $input['additional_information'],
            'images' => json_encode($images),
            'price' => $input['price'],
            'sale_price' => $input['sale_price'],            
        ]);

        $terms = array_merge( $input['category'], $input['sizes'], $input['color'] ); 
        foreach($terms as $term_id) {
            ProductRelationship::create([
                'product_id' => $product->id,
                'term_id' => $term_id,
            ]);
        }

        
        return redirect(route('product.index'))->with(['success' => "Product Created Successfully"]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {   
        $cat_ids = [];
        foreach($product->terms as $term) {            
            if($term->terms->term == 'category') {
                $cat_ids[] = $term->terms->id;
            }            
        }
        $related_products = ProductRelationship::whereIn('term_id', $cat_ids)->whereNotIn('product_id', [$product->id])->select('product_id', 'term_id')->distinct()->limit(4)->with('product')->get();
        // dd($product->terms);
        return view('product', ['product' => $product, 'related_products' => $related_products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $terms = ProductTerm::all();
        $category = array();
        $sizes = array();
        $color = array();
        foreach($terms as $term) {
            if($term->term == 'size') {
                $sizes[$term->id] = $term->name;
            } else if($term->term == 'category') {
                $category[$term->id] = $term->name;
            } else if($term->term == 'color') {
                $color[$term->id] = $term->name;
            }
        }

        $selected_terms = [];
        foreach($product->terms as $term) {
            $selected_terms[] = $term->term_id;
        }

        return view('admin.edit-product',['product' => $product, 'category' => $category, 'sizes' => $sizes, 'color' => $color, 'selected_terms' => $selected_terms]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'title' => 'required',
            'slug' => "required|unique:products,slug,$product->id",
            'small_description' => 'required',
            'description' => 'required',
            'additional_information' => 'required',
            'category' => 'required',
            'price' => 'required|numeric',
            'sale_price' => 'sometimes|numeric',
            'images' => 'sometimes',
            'color' => 'required'
        ],[
            'price.numeric' => 'Please Enter a valid Amount for Price',
            'sale_price.numeric' => 'Please Enter a valid Amount for Sale Price'
        ]);

        $input = $request->all();
        $images = json_decode($product->images);
        if(isset($input['images'])) {            
            $images = [];            
            $oldImages = (array)json_decode($product->images);
            foreach($oldImages as $imageArray) {
                foreach($imageArray as $image) {
                    if(file_exists(public_path('product/').$image)) {
                        unlink(public_path('product/').$image);
                    }
                }
            }
            // foreach ($product->terms as $term) {
            //     if ($term->terms->term == 'color') {
            //         if(file_exists(public_path('product/').$oldImages[$term->terms->id])) {
            //             unlink(public_path('product/').$oldImages[$term->terms->id]);
            //         }
            //     }            
            // }    

            // if(!empty($product->images)) {
            //     foreach(json_decode($product->images) as $image) {
            //         if(file_exists(public_path('product/').$image)) {
            //             unlink(public_path('product/').$image);
            //         }
            //     }
            // }
            // if(isset($input['images'])) {            
                foreach($input['images'] as $key=>$color) {
                    foreach($color as $image) {
                        $fileName = rand().$image->getClientOriginalName();
                        $image->move(public_path('product/'), $fileName);                
                        $images[$input['color'][$key]][] = $fileName;
                    }                
                }
            // }
            // foreach($input['images'] as $image) {                
            //     $fileName = rand().$image->getClientOriginalName();
            //     $image->move(public_path('product/'), $fileName);                
            //     $images[] = $fileName;
            // }
        }

        $product->update([
            'title' => $input['title'],
            'slug' => $input['slug'],
            'small_description' => $input['small_description'],
            'description' => $input['description'],
            'additional_information' => $input['additional_information'],
            'images' => json_encode($images),
            'price' => $input['price'],
            'sale_price' => $input['sale_price'],            
        ]);

        
        ProductRelationship::where('product_id', $product->id)->delete();
        $terms = array_merge( $input['category'], $input['sizes'],  $input['color']); 
        foreach($terms as $term_id) {
            ProductRelationship::create([
                'product_id' => $product->id,
                'term_id' => $term_id,
            ]);
        }

        return redirect(route('product.index'))->with(['success' => "Product Updated Successfully"]);;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $oldImages = (array)json_decode($product->images);
        foreach($oldImages as $imageArray) {
            foreach($imageArray as $image) {
                if(file_exists(public_path('product/').$image)) {
                    unlink(public_path('product/').$image);
                }
            }
        }

        ProductRelationship::where('product_id', $product->id)->delete();

        $product->delete();

        return response()->json([
            'status' => 1,
        ]);
    }

    public function getProducts(Request $request) {
        return Datatables::make($this->getForDataTable($request->all()))
            ->escapeColumns(['id'])        
            ->editColumn('title', fn($product) => $product->title)
            ->editColumn('price', fn($product) => $product->price)       
            ->editColumn('sale_price', fn($product) => $product->sale_price)                             
            ->editColumn('created_at', fn($product) => Carbon::parse($product->created_at)->format('F d, Y'))
            ->addColumn('actions', function ($product) {
                return "<a href='".route('product.edit', $product->id)."' class='btn btn-tool'><i class='fas fa-pen'></i></a>
                <a href='javascript:;' class='btn btn-tool delete_" . $product->id . "' data-url='" . route('product.destroy', $product->id) . "'  onclick='deleteRecorded(" . $product->id . ")'><i class='fas fa-trash'></i></a>";
            })
            ->make(true);
    }

    public function getForDataTable($input)
    {
        $dataTableQuery = Product::query();


        if (isset($input['date']) && $input['date'] != '') {
            $from = explode(' - ', $input['date'])[0];
            $to = explode(' - ', $input['date'])[1];
            $from = date('Y-m-d',strtotime($from));
            $to = date('Y-m-d',strtotime($to));
            $dataTableQuery->whereBetween('products.created_at', [$from, $to]);
        }

        // if (isset($input['date']) && $input['date'] != '') {
        //     $dataTableQuery->whereDate('components.created_at', '=', $input['date']);
        // }        

        return  $dataTableQuery;
    }
}
