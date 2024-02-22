<?php 
namespace App\Services;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductService
{

    public function productImage($data ,$request)
    {
        if (!empty($data['image'])) {
            $image = $request['image'];
            $imageName = Str::slug($request['name'], '-') . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('admin/images/admin_photos/products/small/')) {
                Storage::disk('public')->makeDirectory('admin/images/admin_photos/products/small/');
            }
            if (!Storage::disk('public')->exists('admin/images/admin_photos/products/medium/')) {
                Storage::disk('public')->makeDirectory('admin/images/admin_photos/products/medium/');
            }
            if (!Storage::disk('public')->exists('admin/images/admin_photos/products/large/')) {
                Storage::disk('public')->makeDirectory('admin/images/admin_photos/products/large/');
            }
            $largeImage = Image::make($image)->fit(1600, 1600, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();
            $mediumImage = Image::make($image)->fit(256, 256, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();
            $smallimage = Image::make($image)->fit(66, 66, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->stream();

            Storage::disk('public')->put('admin/images/admin_photos/products/large/' . $imageName, $largeImage);
            Storage::disk('public')->put('admin/images/admin_photos/products/medium/' . $imageName, $mediumImage);
            Storage::disk('public')->put('admin/images/admin_photos/products/small/' . $imageName, $smallimage);
        } else {
            $imageName = 'default.jpg';
        }
        return $imageName;
    }

  

}
