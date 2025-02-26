@include('layouts.navbar')
@include('layouts.Sidebar')
<x-app-layout>
    @if($auction->is_active)
    <form action="{{ route('auctions.bid', $auction) }}" method="POST" class="space-y-4">
        @csrf
        <label class="block text-lg font-medium text-gray-700">أدخل قيمة المزايدة</label>
        <div class="relative">
            <input type="number" name="bid_amount"
                   min="{{ $auction->price + $auction->minumum_bid }}"
                   class="block w-full px-4 py-2 border rounded-lg focus:ring focus:ring-indigo-300"
                   required>
        </div>
        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700">
            تقديم مزايدة
        </button>
    </form>
@else
    <p class="text-red-500 text-center font-bold">هذا المزاد منتهي</p>
@endif

    <div class="container py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Auction Header -->
            <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                <div class="flex justify-between items-start">
                    <div>
                        <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $auction->title }}</h1>
                        <p class="text-lg text-gray-600">Listed by {{ $auction->user->name }}</p>
                    </div>
                    <div class="text-right bg-green-50 p-4 rounded-lg">
                        <div class="text-3xl font-bold text-green-600">${{ number_format($auction->current_price, 2) }}</div>
                        <p class="text-md text-green-700">Current Bid</p>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Left Column - Images -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-lg p-6">
                        <div class="mb-6">
                            <img src="{{ asset('storage/' . $auction->image) }}"
                                 alt="{{ $auction->title }}"
                                 class="w-full h-[500px] object-cover rounded-xl shadow-md">
                        </div>
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($auction->images as $image)
                            <div class="aspect-square">
                                <img src="{{ $image->image_path }}"
                                     alt="Additional image"
                                     class="w-full h-full object-cover rounded-lg shadow-sm hover:opacity-75 transition-opacity cursor-pointer">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Right Column - Auction Details -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-lg p-6 space-y-8">
                        <!-- Timer -->
                        <div class="text-center p-6 bg-indigo-50 rounded-xl">
                            <h4 class="text-lg font-semibold text-indigo-800 mb-3">Time Remaining</h4>
                            <div class="text-3xl font-bold text-indigo-600" x-data="timer('{{ $auction->end_date }}')" x-text="timeRemaining">
                            </div>
                        </div>

                        <!-- Auction Info -->
                        <div class="space-y-4 bg-gray-50 p-6 rounded-xl">
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 font-medium">Starting Price</span>
                                <span class="text-lg font-bold text-gray-900">${{ number_format($auction->price, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 font-medium">Entry Fee</span>
                                <span class="text-lg font-bold text-gray-900">${{ number_format($auction->entery_fee, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 font-medium">Minimum Bid</span>
                                <span class="text-lg font-bold text-gray-900">${{ number_format($auction->minumum_bid, 2) }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-700 font-medium">End Date</span>
                                <span class="text-lg font-bold text-gray-900">{{ \Carbon\Carbon::parse($auction->end_date)->format('M d, Y H:i') }}</span>
                            </div>
                        </div>

                        <!-- Bid Form -->
                        @if($auction->status === 'active')
                            <form action="{{ route('auctions.bid', $auction) }}" method="POST" class="space-y-6">
                                @csrf
                                <div>
                                    <label class="block text-lg font-medium text-gray-700 mb-2">Your Bid Amount</label>
                                    <div class="relative rounded-lg shadow-sm">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <span class="text-gray-500 text-lg">$</span>
                                        </div>
                                        <input type="number"
                                               name="bid_amount"
                                               step="0.01"
                                               min="{{ $auction->current_price + $auction->minumum_bid }}"
                                               class="focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-8 pr-12 py-3 text-lg border-gray-300 rounded-lg"
                                               placeholder="Enter your bid amount">
                                    </div>
                                </div>
                                <button type="submit" class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-indigo-700 transform transition-all duration-200 hover:scale-[1.02] focus:ring-4 focus:ring-indigo-200">
                                    Place Bid
                                </button>
                            </form>
                        @else
                            <div class="bg-red-50 p-6 rounded-xl text-center">
                                <p class="text-lg font-medium text-red-600">This auction has ended</p>
                            </div>
                        @endif

                        <!-- Bid History -->
                        <div class="bg-gray-50 p-6 rounded-xl">
                            <h4 class="text-xl font-bold mb-4 text-gray-900">Recent Bids</h4>
                            <div class="space-y-3">
                                @forelse($auction->bids()->latest()->take(5)->get() as $bid)
                                    <div class="flex justify-between items-center p-3 bg-white rounded-lg shadow-sm">
                                        <span class="text-gray-700">{{ $bid->user->name }}</span>
                                        <span class="font-bold text-indigo-600">${{ number_format($bid->bid_amount, 2) }}</span>
                                    </div>
                                @empty
                                    <p class="text-gray-500 text-center py-4">No bids yet</p>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        function timer(endDate) {
            return {
                timeRemaining: '',
                init() {
                    this.updateTimer();
                    setInterval(() => this.updateTimer(), 1000);
                },
                updateTimer() {
                    const end = new Date(endDate).getTime();
                    const now = new Date().getTime();
                    const distance = end - now;

                    if (distance < 0) {
                        this.timeRemaining = 'Auction Ended';
                        return;
                    }

                    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    this.timeRemaining = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                }
            }
        }
    </script>
    @endpush
</x-app-layout>
@include('layouts.footer')
