<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Événement</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'gradient-x': 'gradientX 6s ease infinite',
                        'float': 'float 4s ease-in-out infinite',
                    },
                    keyframes: {
                        gradientX: {
                            '0%, 100%': { 'background-size': '200% 200%', 'background-position': 'left center' },
                            '50%': { 'background-size': '200% 200%', 'background-position': 'right center' },
                        },
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-5px)' },
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#F8FAFC] text-slate-800 min-h-screen font-sans antialiased relative overflow-x-hidden flex items-center justify-center p-4 py-12">

    <!-- Ambient Dynamic Backgrounds -->
    <div class="fixed top-[-10%] left-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-200/40 via-sky-200/40 to-pink-200/40 rounded-full blur-[100px] -z-10 pointer-events-none animate-float"></div>
    <div class="fixed bottom-[-10%] right-1/4 w-[400px] h-[400px] bg-gradient-to-br from-emerald-200/30 to-blue-200/40 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <!-- Event Form Card Container -->
    <div class="w-full max-w-2xl my-auto">
        
        <div class="relative rounded-[2.5rem] bg-white/80 backdrop-blur-xl border border-white p-8 md:p-10 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] overflow-hidden">
            
            <!-- Top Decorative Gradient Blob -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-indigo-400/20 to-pink-400/20 rounded-full blur-2xl pointer-events-none"></div>

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-50 border border-indigo-100/80 text-indigo-600 mb-4 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 3V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Créer un Nouvel Événement</h1>
                <p class="text-xs text-slate-400 font-medium mt-1">Remplissez les informations ci-dessous pour publier un événement</p>
            </div>

            <!-- Form -->
                <form action="{{ isset($event) ? route('events.update', $event->id) : route('stor_event') }}" method="POST">
                @csrf
                @isset($event)
                @method('PUT')
                @endisset
                <!-- Title Field -->
                <div class="space-y-1.5">
                    <label for="title" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Titre de l'événement</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </span>
                        <input type="text" id="title" name="title" value="{{ $event->title ?? '' }}"  placeholder="Ex: Conférence Tech 2026"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300">
                    </div>
                @error('title')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                </div>

                <!-- Description Field -->
                <div class="space-y-1.5">
                    <label for="description" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Description</label>
                    <div class="relative">
                        <input id="description" value="{{ $event->description ?? ''  }}" name="description" rows="4"   placeholder="Décrivez l'événement..."
                            class="w-full p-4 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300 resize-none"></textarea>
                    </div>
                @error('description')
                    <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                @enderror
                </div>

                <!-- Date & Times Row -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <!-- Date -->
                    <div class="space-y-1.5">
                        <label for="event_date" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Date</label>
                        <div class="relative">
                            <input type="date" id="event_date" name="event_date" value="{{ $event->event_date ?? '' }}"
                                class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300 cursor-pointer">
                        </div>
                    @error('event_date')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    </div>


                    <!-- Start Time -->
                    <div class="space-y-1.5">
                        <label for="starr_time" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Heure de début</label>
                        <div class="relative">
                            <input type="time" id="starr_time" name="starr_time" value="{{ $event->start_time ?? '' }}"
                                class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300 cursor-pointer">
                        </div>
                    @error('starr_time')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    </div>

                    <!-- End Time -->
                    <div class="space-y-1.5">
                        <label for="end_time" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Heure de fin</label>
                        <div class="relative">
                            <input type="time" id="end_time" name="end_time" value="{{ $event->end_time ?? '' }}"
                                class="w-full px-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300 cursor-pointer">
                        </div>
                    @error('end_time')
                        <div class="text-red-500 text-xs mt-1">{{ $message }}</div>
                    @enderror
                    </div>
                </div>

                <!-- Location Field -->
                <div class="space-y-1.5">
                    <label for="location" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Lieu (Location)</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </span>
                        <input type="text" id="location" name="location" value="{{ $event->location ?? '' }}"  placeholder="Ex: Casablanca, Hôtel X"
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300">
                    </div>
                </div>

                <!-- Price & Capacity Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Price -->
                    <div class="space-y-1.5">
                        <label for="price" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Prix (DH)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400 font-bold text-xs">
                                DH
                            </span>
                            <input type="number" value="{{ $event->price ?? '' }}" id="price" name="price" step="0.01" min="0"  placeholder="DEFAULT: 0.00"
                                class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300">
                        </div>
                    </div>

                    <!-- Capacity -->
                    <div class="space-y-1.5">
                        <label for="capacity" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Capacité (Places)</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </span>
                            <input type="number" value="{{ $event->capacity ?? '' }}" id="capacity" name="capacity" min="1"  placeholder="100"
                                class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300">
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" 
                        class="w-full group relative inline-flex items-center justify-center gap-2 py-4 px-6 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition-all duration-300 shadow-lg shadow-slate-900/10 hover:shadow-xl hover:shadow-slate-900/20 hover:-translate-y-0.5 active:translate-y-0 overflow-hidden">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-violet-600 via-indigo-600 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-gradient-x"></span>
                        <span class="relative z-10 tracking-wide">Ajouter l'événement</span>
                        <svg class="w-4 h-4 relative z-10 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                    </button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>