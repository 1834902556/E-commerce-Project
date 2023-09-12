<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoryModel extends Model
{
    use HasFactory;
    private static $category,$image,$imageName,$directory,$imageUrl;

    public static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'upload/category-image/';
        self::$image->move(self::$directory,self::$imageName);
        self::$imageUrl = self::$directory.self::$imageName;
        return self::$imageUrl;

    }

    public static function newCategory($request)
    {
        self::$category = new CategoryModel();
        self::$category->Category_Name	        = $request->name;
        self::$category->Category_Description	= $request->description;
        self::$category->Category_Image	        = self::getImageUrl($request);
        self::$category->Status	                = $request->status;
        self::$category->save();
    }

    public static function updatedCategory($request,$id)
    {
        self::$category = CategoryModel::find($id);
        if($request->file('image')){
            if(file_exists(self::$category->Category_Image)){
                unlink(self::$category->Category_Image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else{
            self::$imageUrl = self::$category->Category_Image;
        }
        self::$category->Category_Name	        = $request->name;
        self::$category->Category_Description	= $request->description;
        self::$category->Category_Image	        = self::$imageUrl;
        self::$category->Status	                = $request->status;
        self::$category->save();

    }

    public static function deleteCategory($id){
        self::$category = CategoryModel::find($id);
        if(file_exists(self::$category->Category_Image)){
            unlink(self::$category->Category_Image);
        }
        self::$category->delete();
    }

    public function subCategories(){
      return $this->hasMany(SubCategory::class,'category_id');
    }
}
