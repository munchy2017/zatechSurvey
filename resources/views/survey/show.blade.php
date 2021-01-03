@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6"> 

     <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
        <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            {{$questionnaire->title }}
        </header>
        <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
            @csrf
        <div class="grid gap-3 mb-4 md:grid-cols-2 mx-5 pt-3">
            @foreach ($questionnaire->questions as $key=>$question)
                    <div class="min-w-0 p-4 bg-gray-200 rounded-lg shadow-xs dark:bg-gray-800">
                     <header class="font-semibold bg-blue-900 text-white py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                         {{$question->question }}
                     </header> 
                     <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300 ">
                         Answers:
                      </h4>
                      <ul class="list-group">
                        @foreach ($question->answers as $answer)
                        <label for="answer{{$answer->id}}">
                        <li class="list-group-item">
                            <input type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}"
                            {{(old('responses.'. $key.'.answer_id')== $answer->id) ? 'checked': ''}} 
                            class="mr-2" value="{{$answer->id}}">
                             {{$answer->answer}}

                             <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                        </li>
                    </label>
                            
                        @endforeach
                       </ul>
                     
                    </div>
                    @endforeach
          </div>
         
          <h4 class="mr-2 font-semibold text-gray-600 dark:text-gray-300 ">
            {{ __(' Your Information') }}:
        </h4>
        <div class="grid gap-3 mb-4 md:grid-cols-1 mx-5 pt-3">
            <div class="flex flex-wrap">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                    {{ __('Name') }}:
                </label>

                <input id="name" type="text" class="form-input w-full @error('name')  border-red-500 @enderror"
                    name="survey[name]" value="{{ old('name') }}" required autocomplete="your name" autofocus>

                @error('name')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <div class="flex flex-wrap">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                    {{ __('Email') }}:
                </label>

                <input id="email" type="email" class="form-input w-full @error('email')  border-red-500 @enderror"
                    name="survey[email]" value="{{ old('email') }}" required autocomplete="your email" autofocus>

                @error('purpose')
                <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                </p>
                @enderror
            </div>

        <div>
        <button class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-green-500 rounded-full shadow ripple hover:shadow-lg hover:bg-green-600 focus:outline-none" type="submit">{{ __('Complete Survey') }}</button>
       </div>
        </div>
       

        </form>
        </section>  
       
     


















    </div>
           
       
    
</main>
@endsection
