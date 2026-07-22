<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>


<div class="min-h-screen bg-gray-50 p-6">
    <!-- Header / Navbar section with Logout -->
    <header class="max-w-7xl mx-auto flex justify-between items-center bg-white p-4 rounded-xl shadow-sm border border-gray-100 mb-8">
        <h1 class="text-2xl font-bold text-gray-800">Événements</h1>
        
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" 
                class="bg-red-50 hover:bg-red-100 text-red-600 font-medium px-4 py-2 rounded-lg transition duration-200 border border-red-200 flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </header>
    <div class="max-w-7xl mx-auto bg-green-50 border border-green-100 text-green-700 px-4 py-3 rounded-lg mb-6">
        {{ session('message') }}
    </div>
    <!-- Events Grid Container -->
    <main class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($event as $event)
                <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition duration-300 flex flex-col justify-between overflow-hidden p-6">
                    <div>
                        <!-- Title & Price Badge -->
                        <div class="flex justify-between items-start mb-3 gap-2">
                            <h3 class="text-xl font-bold text-gray-900 leading-snug">
                                {{ $event->title }}
                            </h3>
                            <span class="bg-blue-50 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-full border border-blue-100 whitespace-nowrap">
                                {{ $event->price }} DH
                            </span>
                        </div>

                        <!-- Description -->
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                            {{ $event->description }}
                        </p>

                        <!-- Details (Date, Time, Location, Capacity) -->
                        <div class="space-y-2 text-xs text-gray-500 mb-6 border-t border-gray-100 pt-3">
                            <!-- Date -->
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-700">📅 Date:</span>
                                <span>{{ $event->event_date }}</span>
                            </div>

                            <!-- Time -->
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-700">⏰ Horaire:</span>
                                <span>{{ $event->start_time }} - {{ $event->end_time }}</span>
                            </div>

                            <!-- Location -->
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-700">📍 Lieu:</span>
                                <span class="truncate">{{ $event->location }}</span>
                            </div>

                            <!-- Capacity -->
                            <div class="flex items-center gap-2">
                                <span class="font-medium text-gray-700">👥 Capacité:</span>
                                <span>{{ $event->capacity }} places</span>
                            </div>
                        </div>
                    </div>

                    <!-- Action Button -->
                     <form action="{{ route('register-for-event', $event->id) }}" method="POST">
                        @csrf
                        <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2.5 px-4 rounded-lg shadow-sm transition duration-200 text-center">
                            Intégrer à l'événement
                        </button>
                    </form>
                </div>
            @endforeach
        </div>
    </main>
</div>