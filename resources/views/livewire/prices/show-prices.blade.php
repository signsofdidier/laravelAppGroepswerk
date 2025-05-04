<div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-6xl mx-auto p-10"> @foreach ($plans as $plan)
            <div class="bg-white shadow-md rounded-lg p-6 text-center"><h2
                    class="text-xl font-bold mb-2">{{ $plan->name }}</h2>
                <p class="text-gray-500 mb-4">{{ $plan->features }}</p>
                <p class="text-2xl font-semibold mb-6">€{{ number_format($plan->price, 2) }}</p> <a
                    href="{{ route('checkout', $plan->id) }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"> Abonneer nu </a></div>
        @endforeach </div>
</div>
