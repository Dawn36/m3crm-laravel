
@extends('layouts.main')

@section('content')
<style>
    .grid-cols-12 {
    grid-template-columns: repeat(4, minmax(0, 1fr));
}
</style>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Administration
        </h2>
        
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Input -->
            <div class="intro-y box">
                <div class="flex flex-col sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                    <h2 class="font-medium text-base mr-auto">
                        Template listing
                    </h2>
                    <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                        <div class="w-56 relative text-slate-500">
                            <form method="GET" action="{{ route('template.index') }}">
                                <input type="text" name="search" class="form-control w-56 box pr-10" value="{{request()->search}}" placeholder="Search...">
                                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
                            </form>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto scrollbar-hidden">
                    <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                        <table class="table table-report sm:mt-2">
                            <thead>
                                <tr>
                                    <th class="whitespace-nowrap">Id</th>
                                    <th class="whitespace-nowrap">Template Name</th>
                                    <th class="whitespace-nowrap">Template Type</th>
                                    <th class="whitespace-nowrap">Modified Date</th>
                                    <th class="whitespace-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php 
                                    $a=$template->currentPage() == '1' ? '0' : $template->perPage()*($template->currentPage()-1);
                                @endphp
                                    @for ($i = 0; $i < count($template); $i++) @php  $a++; @endphp
                                <tr class="intro-x">
                                    <td class="text-left">{{$a}}</td>
                                    <td class="text-left">{{ucwords($template[$i]->template_name)}}</td>
                                    <td class="text-left">{{ucwords($template[$i]->template_type)}}</td>
                                    <td class="text-left">{{$template[$i]->update_date}}</td>
                                    <td class="text-left flex"> 
                                        <a class="flex items-center mr-3" href="{{route('template.edit',$template[$i]->id)}}"> <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                </tr>
                                 @endfor

                            </tbody>
                        </table>
                    </div>
                    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
                        {{ $template->links('paginate.paginate_ui') }}
                    </div>
                </div>

           
        </div>
     
     
    </div>
</div>

@endsection
