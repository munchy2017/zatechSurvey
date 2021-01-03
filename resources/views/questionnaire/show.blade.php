@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
       
        <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

            <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                {{$questionnaire->title }}
            </header>

            <div class="flex flex-wrap  m-4 space-x-2 space-y-2">
                <button
                  class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-900 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-600 focus:outline-none">
                  <a  href="/questionnaires/{{$questionnaire->id}}/questions/create" class="btn btn-dark"> {{ __('Add New Question') }}</a>
                 
                </button>

                <button
                class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded-full shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none">
                <a  href="/surveys/{{$questionnaire->id}}-{{ Str::slug($questionnaire->title)}}" class="btn btn-dark">{{ __('Take Survey') }}</a>
               
              </button>
              </div>
        </section>  
        
        

        <section class="mt-4 flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
           <div class="grid gap-3 mb-4 md:grid-cols-2 mx-5 pt-3">
                @foreach ($questionnaire->questions as $question)
                       <div class="min-w-0 p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800">
                        <header class="font-semibold bg-blue-900 text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                            {{$question->question }}
                        </header> 
                        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300 ">
                            Answers:
                         </h4>
                         <ul class="list-group">
                            @foreach ($question->answers as $answer)
                            <li class="list-group-item d-flex justify-content-between">
                                <div>{{$answer->answer}}</div>
                                @if($question->responses->count())
                                <div class="text-right"> {{intval(($answer->responses->count()*100)/$question->responses->count())}}%</div>
                               
                                @endif
                            
                            
                            </li>
                                
                            @endforeach

                            <div class="mt-4">
                                <form action="/questionnaires/{{$questionnaire->id}}/questions/{{$question->id}}" method="post">
                                    @method('DELETE')
                                    @csrf
                   
                   
                                    <button type="submit" class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-red-500 rounded-full shadow ripple hover:shadow-lg hover:bg-red-600 focus:outline-none">{{ __('Delete Question') }}</button>
                                    
                                   </form>
                            </div>
                         </ul>
                        
                       </div>
                       @endforeach
             </div>
           </section>  

        
    </div>
</main>
@endsection
