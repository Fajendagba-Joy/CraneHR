@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
                <img class="w-32 h-32 md:w-48 md:h-auto md:rounded-none rounded-full mx-auto" src="{{ asset('mirrorlogo.jpg') }}" alt="" width="384" height="512">
                <div class="pt-6 md:p-8 text-center md:text-left space-y-4">
                    <blockquote>
                        <p class="text-lg font-semibold">
                            Dashboard here
                        </p>
                    </blockquote>
                    <figcaption class="font-medium">
                        <div class="text-cyan-600">
                            @adding 
                        </div>
                        <div class="text-gray-500">
                            Dashboard details
                        </div>
                    </figcaption>
                </div>
            </figure>
        </div>
    </div>
@endsection
