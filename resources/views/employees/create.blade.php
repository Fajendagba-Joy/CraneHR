@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            
            <form action="{{ route('employee') }}" method="post">
                @csrf
                <div class="mb-4">
                    <label for="first_name" class="sr-only">Name</label>
                    <input type="text" name="first_name" id="first_name" placeholder="First Name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('first_name') border-red-500 @enderror" value="{{ old('first_name') }}" required autocomplete="first_name">
                    @error('first_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="middle_name" class="sr-only">Middle Name</label>
                    <input type="text" name="middle_name" id="middle_name" placeholder="Middle name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('middle_name') border-red-500 @enderror" value="{{ old('middle_name') }}" required autocomplete="middle_name">
                    @error('middle_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input type="text" name="last_name" id="last_name" placeholder="Last Name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('last_name') border-red-500 @enderror" value="{{ old('last_name') }}" required autocomplete="last_name">
                    @error('last_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="sex" class="sr-only">Sex</label>
                    <input type="text" name="sex" id="sex" placeholder="Sex" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('sex') border-red-500 @enderror" value="{{ old('sex') }}" required autocomplete="sex">
                    @error('sex')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="sr-only">Your Password</label>
                    <input type="text" name="phone" id="phone" placeholder="Enter your Mobile Number" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror" value="{{ old('phone') }}">
                    @error('phone')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="designation" class="sr-only">Designation</label>
                    <input type="text" name="designation" id="designation" placeholder="Designation" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('designation') border-red-500 @enderror" value="{{ old('designation') }}">
                    @error('designation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>}
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="sr-only">Employees Email Address</label>
                    <input type="email" name="email" id="email" placeholder="Employees email address" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="sr-only">Address</label>
                    <input type="text" name="address" id="address" placeholder="Employees Address" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('address') border-red-500 @enderror" value="{{ old('address') }}" required autocomplete="address">
                    @error('address')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="state" class="sr-only">State</label>
                    <input type="text" name="state" id="state" placeholder="Employees State" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('state') border-red-500 @enderror" value="{{ old('state') }}" required autocomplete="state">
                    @error('state')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="city" class="sr-only">City</label>
                    <input type="text" name="city" id="state" placeholder="Employees City" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('city') border-red-500 @enderror" value="{{ old('city') }}" required autocomplete="city">
                    @error('city')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="country" class="sr-only">Country</label>
                    <input type="text" name="country" id="state" placeholder="Employees Country" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('country') border-red-500 @enderror" value="{{ old('country') }}" required autocomplete="country">
                    @error('country')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="blood_group" class="sr-only">Blood Group</label>
                    <input type="text" name="blood_group" id="blood_group" placeholder="Blood Group" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('blood_group') border-red-500 @enderror" value="{{ old('blood_group') }}" required autocomplete="blood_group">
                    @error('blood_group')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="dob" class="sr-only">Date of Birth</label>
                    <input type="text" name="dob" id="dob" placeholder="Date of Birth" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('dob') border-red-500 @enderror" value="{{ old('dob') }}" required autocomplete="dob">
                    @error('dob')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Picture here --}}

                <div class="mb-4">
                    <label for="guarantors_name" class="sr-only">Guarantors Name</label>
                    <input type="text" name="guarantors_name" id="guarantors_name" placeholder="Guarantors Name" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('guarantors_name') border-red-500 @enderror" value="{{ old('guarantors_name') }}" required autocomplete="guarantors_name">
                    @error('guarantors_name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>      

                <div class="mb-4">
                    <label for="guarantors_address" class="sr-only">Guarantors Address</label>
                    <input type="text" name="guarantors_address" id="guarantors_address" placeholder="Guarantors Address" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('guarantors_address') border-red-500 @enderror" value="{{ old('guarantors_address') }}" required autocomplete="guarantors_address">
                    @error('guarantors_address')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="guarantors_phone" class="sr-only">Guarantors Mobile Number</label>
                    <input type="text" name="guarantors_phone" id="guarantors_phone" placeholder="Guarantors Mobile Number" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('guarantors_phone') border-red-500 @enderror" value="{{ old('guarantors_phone') }}" required autocomplete="guarantors_phone">
                    @error('guarantors_phone')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="guarantors_status" class="sr-only">Guarantors Status</label>
                    <input type="text" name="guarantors_status" id="guarantors_status" placeholder="Guarantors Status (active / inactive)" 
                    class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('guarantors_status') border-red-500 @enderror" value="{{ old('guarantors_status') }}" required autocomplete="guarantors_status">
                    @error('guarantors_status')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded 
                    font-medium w-full">Add Employee</button>
                </div>
            </form>

        </div>
    </div>
@endsection
