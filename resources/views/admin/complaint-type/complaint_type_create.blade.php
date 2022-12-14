@extends('layouts.main')

@section('content')
<style>
    .grid-cols-12 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
</style>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Complaint Management
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Add complaint type
                    </h2>
                </div>
                <form  method="POST" action="{{ route('complaint_type_create') }}" >
                    @csrf
                <div id="inline-form" class="p-5">
                    <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                            <div >
                                <label for="regular-form-1" class="form-label">Product Category  <span style="color: red">*</span></label>
                                    <select data-placeholder="Select your favorite actors" name='product_category' class="tom-select w-full tomselected" id="tomselect-1" tabindex="-1" hidden="hidden" onchange="productA(this.value)" required>
                                        <option value="0"  selected="true">Select Product Category </option>
                                        @for($i=0; $i < count($complaintCategory); $i++)
                                        <option value="{{$complaintCategory[$i]->id}}" >{{ucwords($complaintCategory[$i]->fullname)}}</option>
                                        @endfor
                                    </select>
                            </div>
                            <div >
                                <label for="regular-form-1" class="form-label">Product  <span style="color: red">*</span></label>
                                <select  name="product"  class="form-select " id="product"  required >
                                    <option value="" selected="true">Select product</option>
                                
                                </select>
                            </div>
                            <div>
                                <label for="regular-form-1" class="form-label">Complaint Type <span style="color: red">*</span></label>
                                <input type="text" class="form-control col-span-4" name="complaint_type" placeholder="Type name" aria-label="default input inline 2" required>
                            </div>
                            <div>
                            <label for="regular-form-1" class="form-label">Turn Around Time <span style="color: red">*</span></label>
                            <input type="text" class="form-control col-span-4" name="turn_around_time" onkeypress="return validateNumbers(event)" placeholder="Turn Around Time" aria-label="default input inline 2" required>
                            <div class="form-help">Note: Enter values in day(s).</div>
                        </div>
                        <div class="form-check form-switch  mt-3 sm:mt-0">
                            <label for="regular-form-1" class="form-label">IsActive</label>
                            <input id="show-example-3" data-target="#header" checked name='is_active' value="1" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                        </div>
                        
                        </div>
                       
                    <button type="submit" class="btn btn-primary mt-5">Save</button>

                    </div>
                   
                </div>
                </form>
           
        </div>
     
     
    </div>
</div>
@push('scripts')
<script>
  function productA(val) {
        let value = {
            product_category_id: val,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('get_product_category') }}",
            data: value,
            success: function(result) {
                console.log(result);
                
                document.getElementById('product').innerHTML =
                        '<option value="" selected="true">Select product</option>';
                    for (var i = 0; i < result.length; i++) {
                        var product = document.createElement('option');
                        product.value = result[i].id;
                        product.innerHTML = result[i].fullname;
                        document.getElementById('product').appendChild(product);
                    }
               
            }
        });
    }
</script>
@endpush


@endsection
