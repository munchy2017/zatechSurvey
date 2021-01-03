@extends('layouts.app')

@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
    <div class="w-full sm:px-6">
       
            <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">

                <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                    {{ __('Create New Questionnaire') }}
                </header>

                <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                    action="{{ route('questionnaires/create') }}">
                    @csrf
                   <div >
                    <div class="flex flex-wrap">
                        <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                            {{ __('Title') }}:
                        </label>

                        <input id="title" type="text" class="form-input w-full @error('title')  border-red-500 @enderror"
                            name="title" value="{{ old('title') }}" required autocomplete="questionnaire title" autofocus>

                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="flex flex-wrap">
                        <label for="purpose" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4 mt-4">
                            {{ __('Purpose') }}:
                        </label>

                        <textarea id="purpose" type="text" class="form-input w-full @error('purpose')  border-red-500 @enderror"
                            name="purpose" value="{{ old('purpose') }}" required autocomplete="questionnaire purpose" autofocus></textarea>

                        @error('purpose')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                   
                    <div class="flex flex-wrap  m-6 space-x-2 space-y-2">
                        <button type="submit"
                            class="inline-block px-6 py-2 text-xs font-medium leading-6 text-center text-white uppercase transition bg-blue-900 rounded-full shadow ripple hover:shadow-lg hover:bg-blue-800 focus:outline-none">
                            {{ __('Create Questionnaire') }}
                        </button>

                    </div>
                </div>
                </form>

            </section>
     
    </div>
</main>
@endsection
