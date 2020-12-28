<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Product::where([
            ['category', '!=', Null],
            [function ($query) use ($request){
                if (($term = $request->term)) {
                    $query->orWhere('category', 'LIKE', '%' . $term . '%')->get();
                }    
            }]
        ])
            ->orderBy("id", "desc")
            ->paginate(10);
            
        return view('products.index', compact('data'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Title'         =>  'required',
            'Description'   =>  'required',
            'image'         =>  'required|image|max:2048',
            'Category'      =>  'required',
            'Price'         =>  'required',
            'Location'      =>  'required',
            'User_id'       =>  'required',
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'Title'            =>   $request->Title,
            'Description'      =>   $request->Description,
            'image'            =>   $new_name,
            'Category'         =>   $request->Category,
            'Price'            =>   $request->Price,
            'Location'         =>   $request->Location,
            'User_id'          =>   $request->User_id,
        );

        Product::create($form_data);

        return redirect('/products')->with('success', 'Product added successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::findOrFail($id);
        return view('products.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        return view('products.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {
            $request->validate([
                'Title'         =>  'required',
                'Description'   =>  'required',
                'image'         =>  'image|max:2048',
                'Category'      =>  'required',
                'Price'         =>  'required',
                'Location'      =>  'required',
                'User_id'       =>  'required',
            ]);

            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'Title'         =>  'required',
                'Description'   =>  'required',
                'Category'      =>  'required',
                'Price'         =>  'required',
                'Location'      =>  'required',
                'User_id'       =>  'required',
            ]);
        }

        $form_data = array(
            'Title'          =>   $request->Title,
            'Description'    =>   $request->Description,
            'image'          =>   $image_name,
            'Category'       =>   $request->Category,
            'Price'          =>   $request->Price,
            'Location'       =>   $request->Location,
            'User_id'          =>   $request->User_id,
        );
  
        Product::whereId($id)->update($form_data);

        return redirect('/products')->with('success', 'Product is successfully updated');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);

        $image_name = $data->image;
        if(file_exists(public_path('images/'.$image_name))){
            unlink(public_path('images/'.$image_name));
        }     
        $data->delete();

        return redirect('/products')->with('success', 'Product is successfully deleted');
    
    }


    //create one method for viewing the product from user_id
    //might need to create one view in the resources too
}
