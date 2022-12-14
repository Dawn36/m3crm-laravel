@extends('layouts.main')

@section('content')
<style>
    .grid-cols-12 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
</style>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Product Management
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Edit Product E-Form
                    </h2>
                </div>
                <form  method="POST" action="{{ route('e_form_product_edit',$eFormProduct->id) }}" >
                    @csrf
                <div id="inline-form" class="p-5">
                    <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                            <div>
                            <label for="regular-form-1" class="form-label">Product Code<span style="color: red">*</span></label>
                            <input type="text" class="form-control col-span-4" name="product_code" value="{{$eFormProduct->product_code}}" placeholder="Product Code" aria-label="default input inline 2" required>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Product Category<span style="color: red">*</span></label>
                                <select data-placeholder="Select your favorite actors" name='product_category_id' class="tom-select w-full tomselected" id="tomselect-1" tabindex="-1" hidden="hidden" required>
                                    <option value="0" selected="true">Select Product Category</option>
                                    @for ($i = 0; $i < count($eFormCategory); $i++)
                                    <option value="{{$eFormCategory[$i]->id}}" {{$eFormProduct->product_category == $eFormCategory[$i]->id ? 'Selected' : ''}}>{{ucwords($eFormCategory[$i]->fullname)}}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="">
                                <label for="regular-form-1" class="form-label">Product Name<span style="color: red">*</span></label>
                                <input type="text" class="form-control col-span-4" name="product_name" value="{{$eFormProduct->fullname}}" placeholder="Product Name" aria-label="default input inline 2" required>
                                </div>
                      
                        <div class="form-check form-switch  sm:mt-0" style="margin-top: 15px;">
                            <label for="regular-form-1" class="form-label">Is Active</label>
                            <input id="show-example-3" data-target="#header" name='is_active' value="1" {{$eFormProduct->isactive == '1' ? "Checked" : '' }} class="show-code form-check-input mr-0 ml-3" type="checkbox">
                        </div>
                        </div>
                        
                    </div>
                   
                    <button type="submit" class="btn btn-primary mt-5">Update</button>
                </div>
                </form>
           
        </div>
     
     
    </div>
</div>
@endsection
