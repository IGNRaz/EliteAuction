
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h2 class="text-2xl font-bold mb-6">Edit Auction</h2>

                    <form action="{{ route("updateAuction",[$auction->id]) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" value="Title" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                :value="old('title', $auction->title)" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" value="Description" />
                            <textarea id="description" name="description" rows="4"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required>{{ old('description', $auction->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        <!-- Price Fields -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div>
                                <x-input-label for="price" value="Starting Price" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <x-text-input id="price" name="price"  step="0.01"
                                        class="pl-7 block w-full" :value="old('price', $auction->price)" required />
                                </div>
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="entery_fee" value="Entry Fee" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <x-text-input id="entery_fee" name="entery_fee"  step="0.01"
                                        class="pl-7 block w-full" :value="old('entery_fee', $auction->entery_fee)" required />
                                </div>
                                <x-input-error :messages="$errors->get('entery_fee')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="minumum_bid" value="Minimum Bid" />
                                <div class="mt-1 relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">$</span>
                                    </div>
                                    <x-text-input id="minumum_bid" name="minumum_bid"  step="0.01"
                                        class="pl-7 block w-full" :value="old('minumum_bid', $auction->minumum_bid)" required />
                                </div>
                                <x-input-error :messages="$errors->get('minumum_bid')" class="mt-2" />
                            </div>
                        </div>

                        <!-- End Date -->
                        <div>
                            <x-input-label for="end_date" value="End Date" />
                            <x-text-input id="end_date" name="end_date" type="datetime-local"
                                class="mt-1 block w-full" :value="old('end_date', date('Y-m-d\TH:i', strtotime($auction->end_date)))" required />
                            <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                        </div>

                        <!-- Image -->
                        <div>
                            <x-input-label for="image" value="Product Image" />
                            <div class="mt-2 flex items-center gap-4">
                                @if($auction->image)
                                    <img src="{{ asset('storage/' . $auction->image) }}" alt="Current Image"
                                        class="h-20 w-20 object-cover rounded-lg">
                                @endif
                                <input type="file" id="image" name="image" accept="image/*"
                                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" />
                            </div>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>



                        <!-- Submit Button -->
                        <div class="flex items-center gap-4">
                            <x-primary-button>Update Auction</x-primary-button>
                            <a href="{{ route("myAcutions") }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
