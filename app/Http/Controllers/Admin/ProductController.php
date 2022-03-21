<?php

namespace App\Http\Controllers\Admin;
use App\Components\Recusive;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Support\Facades\Log;
class ProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    public function __construct(Category $category, Product $product)
    {
        $this -> category = $category;
        $this -> product = $product;
    }
    public function list(){
        $product = $this ->product->paginate(5);
        return view('Admin.product.list',compact('product'));
    }
    public function create(){
        $htmlOption = $this -> getCategory($parent_id ='');
        return view('Admin.product.add',compact('htmlOption'));
    }
    public function getCategory($parent_id){
        $data = $this -> category -> all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parent_id);
        return $htmlOption;
      }
      public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',  
        ],[
            'name.required'=>'Chưa nhập tên sản phẩm',   
        ]);
          $dataUploadCreate=[
              'name' => $request -> name,
              'price' => $request -> price,
              'content' => $request -> content,
              'user_id'=>  $request->id,
              'category_id' => $request -> category_id
          ];
          $dataUpload = $this ->storageTraitUpload($request,'feature_image_path','product');
         
              
        $dataUploadCreate['feature_image_path']=$dataUpload['file_path'];
         
          $product = $this ->product -> create($dataUploadCreate);
          return redirect('admin/product/create');
      }
      public function edit($id){
          $product = $this -> product -> find($id);
          $htmlOption = $this -> getCategory($product -> category_id);
          return view('admin.product.edit',compact('htmlOption','product'));
      }
      public function update(Request $request,$id){
        $dataUploadproduct=[
            'name' => $request -> name,
            'price' => $request -> price,
            'content' => $request -> content,
            'user_id'=>  $request->id,
            'category_id' => $request -> category_id
        ];
        $dataUpload = $this ->storageTraitUpload($request,'feature_image_path','product');
        $dataUploadproduct['feature_image_path']=$dataUpload['file_path'];
        $product = $this ->product ->find($id)-> update($dataUploadproduct);
       
         
        return redirect('admin/product/list');
      }
      public function delete($id){
         try{
          $this -> product -> find($id)->delete();
          return response()->json([
              'code' => 200,
              'message' => 'success'
          ],200);
         }catch(Exception $exception){
           Log::error('Message:'.$exception->getMessage().'--- Line:' .$exception->getLine());
           return response()->json([
               'code' => 500,
               'message' => 'fail'
           ],500);
         }
      }
}
