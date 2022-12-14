@extends('layouts.main')

@section('content')
<style>
    .grid-cols-12 {
    grid-template-columns: repeat(3, minmax(0, 1fr));
}
</style>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            E-Form Management
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Add E-Form Type
                    </h2>
                </div>
                <form  method="POST" action="{{ route('e_form_type.store') }}" >
                    @csrf
                <div id="inline-form" class="p-5">
                    <div class="preview">
                        <div class="grid grid-cols-12 gap-2">
                            <div >
                                <label for="regular-form-1" class="form-label">Product Category  <span style="color: red">*</span></label>
                                    <select name="product_category_id" data-placeholder="Select your favorite actors" class="tom-select w-full tomselected" id="tomselect-1" tabindex="-1" hidden="hidden" onchange="productA(this.value)">
                                        <option value="0" selected="true">Select Product Category </option>
                                        @for($i=0; $i < count($productCategory); $i++)
                                        <option value="{{$productCategory[$i]->id}}" >{{ucwords($productCategory[$i]->fullname)}}</option>
                                        @endfor
                                    </select>
                            </div>
                            <div >
                                <label for="regular-form-1" class="form-label">Product  <span style="color: red">*</span></label>
                                <select  name="product_id"  class="form-select " id="product"  required >
                                    <option value="" selected="true">Select product</option>
                                </select>
                            </div>
                            <div>
                            <label for="regular-form-1" class="form-label">E-Form Type <span style="color: red">*</span></label>
                            <input type="text" name="type" class="form-control col-span-4" placeholder="E-Form Type" aria-label="default input inline 2">
                            <div class="form-help">Note: Enter values in hours.</div>
                        </div>
                        
                       
                        {{-- <div class="form-check form-switch  mt-3 sm:mt-0">
                            <label for="regular-form-1" class="form-label">Subcription</label>
                            <input id="show-example-3" name="is_subscription" data-target="#header" value="1" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                        </div> --}}
                        {{-- <div class="flex flex-col sm:flex-row mt-2">
                            <label for="regular-form-1" class="form-label" style="margin-right: 14px;">Operation Mode</label>
                            <div class="form-check mr-2">
                                <input id="radio-switch-4" class="form-check-input" type="radio" checked name="operation_mode" value="1" onclick="assignee(this.value)">
                                <label class="form-check-label"  for="radio-switch-4">Auto</label>
                            </div>
                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                <input id="radio-switch-5" class="form-check-input" type="radio" name="operation_mode" value="0" onclick="assignee(this.value)">
                                <label class="form-check-label"  for="radio-switch-5">Manual</label>
                            </div>
                        </div> --}}
                        {{-- <div class="mt-3" id='aaa' >
                            <label for="regular-form-1" class="form-label">Assignee  </label>
                                <select name="group_id" class="tom-select w-full tomselected "  tabindex="-1" hidden="hidden">
                                    <option value="0" selected="true">Select Assignee </option>
                                    @for($i=0; $i < count($group); $i++)
                                    <option value="{{$group[$i]->id}}" >{{ucwords($group[$i]->group_name)}}</option>
                                    @endfor
                                </select>
                        </div> --}}
                        <div class="mt-3">
                            <label for="regular-form-1" class="form-label">Turn Around Time <span style="color: red">*</span></label>
                            <input type="text" name="tat" id="tat" class="form-control col-span-4"  onkeypress="return validateNumbers(event)" placeholder="Turn Around Time" aria-label="default input inline 2" required>
                            <div class="form-help" id='tat_text'>Turn Around Time Should be greater than 23 hours</div>
                        </div>
                        <div class="form-check form-switch  mt-3 sm:mt-0">
                            <label for="regular-form-1" class="form-label">IsActive</label>
                            <input id="show-example-3" name="is_active" checked data-target="#header" value="1" class="show-code form-check-input mr-0 ml-3" type="checkbox">
                        </div>
                        
                        </div>
                        {{-- @for($j=1; $j <= 5; $j++)
                        <div class="grid grid-cols-12 gap-2" id='clonediv'> --}}
                            {{-- <div class="mt-3" >
                                <label for="regular-form-1" class="form-label">Escalation Time Period {{$j}}</label>
                                    <select  class="form-select" name="escalation_time{{$j}}"  >
                                         @for($i = 0; $i <= 100; $i += 10)
                                        <option value="{{$i}}" >{{$i}}%</option>
                                        @endfor
                                        
                                    </select>
                            </div> --}}

                            {{-- <div class="mt-3" >
                                <label for="crud-form-2-tomselected" class="form-label" id="crud-form-2-ts-label">Level {{$j}}</label>
                                <select data-placeholder="Select your favorite actors" name="level{{$j}}[]" class="tom-select w-full tomselected" id="crud-form-2" multiple="multiple">
                                    @for($i=0; $i < count($user); $i++)
                                    <option value="{{$user[$i]->id}}" >{{ ucwords($user[$i]->user_name) }}</option>
                                    @endfor

                                </select>
                            </div> --}}
                            {{-- <div style="margin-top: 39px;">
                                <button class="btn btn-primary mr-1 mb-2"  onclick="appendDiv(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="activity" data-lucide="activity" class="lucide lucide-activity w-5 h-5"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg> </button>
                                <button class="btn btn-danger mr-1 mb-2" style="display: none"  onclick="removeDiv(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="trash" data-lucide="trash" class="lucide lucide-trash w-5 h-5"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path></svg> </button>
                            </div> --}}
                        {{-- </div>
                        @endfor --}}
                    <div id='appenddiv'>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Save</button>
                        
                    </div>
                   
                </div>
                </form>
           
        </div>
     
     
    </div>
@push('scripts')
{{-- <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script> --}}
<script>
    $("#tat").keyup(function(){
        if($("#tat").val() < 24)
        {
            $("#tat_text").css("color", "red");
        }
        else
        {
            $("#tat_text").css("color", "");
        }
    });
  function productA(val) {
        let value = {
            product_category_id: val,
        };
        $.ajax({
            type: 'GET',
            url: "{{ route('get_product_category_eform') }}",
            data: value,
            success: function(result) {
                
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


    function removeDiv(obj)
    {
        obj.parentElement.parentElement.remove()
        i--;
    }
    var i=0;
    function appendDiv(obj)
    {
        if(i== 4)
        {
            alert('Limit is 5');
            return false;
        }
        ids=obj.parentElement.parentElement.id;
        aa=$('#'+ids).clone();
        aa[0].children[2].children[0].remove();
        aa[0].children[2].children[0].style.display='block';
        aa[0].id='';
        aa.appendTo("#appenddiv");
        i++;


    }

   function assignee(val)
    {
        if(val == '1')
        {
            $('#aaa').show();
        }
        if(val == '0')
        {
            $('#aaa').hide();
        }
    }
</script>
@endpush
    


@endsection
