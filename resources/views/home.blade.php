@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                My Questionnaires
            </header>


            <div class="flex flex-wrap  m-6 space-x-2 space-y-2">
              <button
                class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-900 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">
                <a  href="/questionnaires/create" class="btn btn-dark"> {{ __('Create New Questionnaire') }}</a>
               
              </button>
            </div>
              
               
           
                   
                    <div class="grid gap-3 mb-4 md:grid-cols-2 mx-5 pt-3">
                        @foreach ($questionnaires as $questionnaire)
                               <div class="min-w-0 p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800">
                                <header class="font-semibold bg-blue-900 text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                                    <a href="{{$questionnaire->path()}}"> {{$questionnaire->title}}</a>
                                </header> 
                                
                                 <ul class="list-group">
                                 <li class="list-group-item" >
                                  
                                    <div class="md-2">
                                        <small class="font-bold"> Share Url</small>
                                        <p>
                                          <a href="{{$questionnaire->publicPath()}}"> 
                                              {{$questionnaire->publicPath()}}</a>
                                        </p><br>
            
                                </li>
                                 </ul>
                               </div>
                               @endforeach
                             </div>
                            
               
               
            </div>
        </section>

    </div>
   

   
</main>
@endsection
