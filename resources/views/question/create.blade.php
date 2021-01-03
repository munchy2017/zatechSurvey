@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Create New Question') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                  action="/questionnaires/{{$questionnaire->id}}/questions">
                @csrf
                <div >

                <div class="form-group">
                    <label for="question" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                        {{ __('Question') }}:
                    </label>

                    <input id="question" type="text" class="form-input w-full @error('question')  border-red-500 @enderror"
                        name="question[question]" aria-describedby="questionHelp" value="{{ old('question.question') }}" re>
                        <small id="questionHelp" class="form-text text-muted">Ask simple questions.</small>
                       
                    @error('question.question')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="form-group">
                    <fieldset>
                        <legend>Choices</legend>
                        <small id="choicesHelp" class="form-text text-muted">Give choices that give you the most insight into your question .</small>
                        
                         <div>
                        <div class="form-group">
                            <label for="answer1">Choice 1</label>
                           <input name="answers[][answer]"  type="text"
                           value="{{ old('answers.0.answer')}}"
                           class="form-input w-full "    id="answer1" aria-describedby="choiceHelp" placeholder="Enter Choice 1" >

                    @error('answers.0.answer')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div></div>


                
                <div>
                    <div class="form-group">
                        <label for="answer2">Choice 2</label>
                 <input name="answers[][answer]"  type="text"
                  class="form-input w-full"  value="{{ old('answers.1.answer')}}" id="answer2" aria-describedby="choiceHelp" placeholder="Enter Choice 2" >

                   @error('answers.1.answer')
                  <p class="text-red-500 text-xs italic mt-4">
                    {{ $message }}
                    </p>
                 @enderror
                 </div>
                 </div>

                    <div>
                        <div class="form-group">
                            <label for="answer3">Choice 3</label>
                     <input name="answers[][answer]"  type="text"
                      class="form-input w-full" value="{{ old('answers.2.answer')}}" id="answer3" aria-describedby="choiceHelp" placeholder="Enter Choice 3"  >

                    @error('answers.2.answer')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label for="answer4">Choice 4</label>
                         <input name="answers[][answer]"  type="text"
                          class="form-input w-full" value="{{ old('answers.3.answer')}}" id="answer4" aria-describedby="choiceHelp" placeholder="Enter Choice 4" >

                        @error('answers.3.answer')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                        </div>
                        <div class="flex flex-wrap  m-6 space-x-2 space-y-2">
                    <button type="submit"
                    class= "inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-900 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">
                    {{ __('Add Question') }}
                    </button>
                        </div>
                    

                                    
                    </fieldset>
                </div>
                </div>
            </form>
     

            </section>
       
    </div>
    
</main>
@endsection
