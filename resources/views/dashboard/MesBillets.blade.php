<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Billets - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 4s ease-in-out infinite',
                    },
                    keyframes: {
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
<body class="bg-[#F8FAFC] text-slate-800 min-h-screen font-sans antialiased relative overflow-x-hidden">

    <!-- Subtle Ambient Glows -->
    <div class="fixed top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-200/40 via-sky-200/40 to-pink-200/40 rounded-full blur-[100px] -z-10 pointer-events-none animate-float"></div>
    <div class="fixed bottom-0 right-1/4 w-[400px] h-[400px] bg-gradient-to-br from-emerald-200/30 to-blue-200/40 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto p-4 md:p-8 flex flex-col lg:flex-row gap-8">

        <!-- ================= ASIDE: User Profile Sidebar ================= -->
        <aside class="w-full lg:w-80 flex-shrink-0">
            <div class="sticky top-8 bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2.5rem] shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] flex flex-col items-center text-center">
                
                <!-- Avatar with Online Badge -->
                <div class="relative mb-4">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-1 shadow-md">
                        <div class="w-full h-full bg-white rounded-full flex items-center justify-center overflow-hidden">
                            <span class="text-2xl font-black text-indigo-600">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                            </span>
                        </div>
                    </div>
                    <span class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>
                </div>

                <!-- User Details -->
                <h3 class="text-xl font-bold text-slate-900 mb-1">
                    {{ auth()->user()->name ?? 'Utilisateur' }}
                </h3>
                <p class="text-xs font-semibold text-indigo-600 bg-indigo-50/80 px-3 py-1 rounded-full mb-6">
                    {{ auth()->user()->role ?? 'Participant' }}
                </p>

                <div class="w-full space-y-3 pt-4 border-t border-slate-100 text-left text-xs font-medium text-slate-500 mb-6">
                    <div class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50/80 border border-slate-100">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="truncate text-slate-700 font-semibold">{{ auth()->user()->email ?? 'user@example.com' }}</span>
                    </div>

                    <div class="flex items-center justify-between p-3 rounded-2xl bg-slate-50/80 border border-slate-100">
                        <span class="text-slate-400">Billets Réservés</span>
                        <span class="font-extrabold text-indigo-600 text-sm">{{ count($ticket) }}</span>
                    </div>
                </div>

                <!-- Logout Button -->
                <form action="{{ route('logout') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="w-full group inline-flex items-center justify-center gap-2 px-4 py-3 rounded-2xl bg-white hover:bg-rose-50 text-slate-600 hover:text-rose-600 font-semibold text-sm border border-slate-200/80 hover:border-rose-200 transition-all duration-300 shadow-sm">
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                        <span>Déconnexion</span>
                    </button>
                </form>

            </div>
        </aside>

        <!-- ================= MAIN CONTENT ================= -->
        <main class="flex-1 space-y-6">

            <!-- Top Header -->
            <header class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 p-5 rounded-3xl bg-white/70 backdrop-blur-2xl border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                <div>
                    <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Mes Billets & Réservations</h1>
                    <p class="text-xs text-slate-400 font-medium mt-0.5">Retrouvez tous vos billets d'événements</p>
                </div>

                <!-- Return Button -->
                <a href="{{ url()->previous() }}" 
                   class="inline-flex items-center justify-center gap-2 px-5 py-3 rounded-2xl bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-xs border border-slate-200/60 transition-all duration-300 shadow-sm hover:-translate-y-0.5 shrink-0">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    <span>Retour aux événements</span>
                </a>
            </header>

            <!-- Flash Message -->
            @if(session('message'))
                <div class="flex items-center gap-3 p-4 rounded-2xl bg-emerald-50/80 backdrop-blur-md border border-emerald-200/60 text-emerald-800 text-sm font-semibold shadow-sm">
                    <svg class="w-5 h-5 text-emerald-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span>{{ session('message') }}</span>
                </div>
            @endif

            <!-- Tickets Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($ticket as $item)
                    <article class="group relative rounded-[2.5rem] bg-white/80 backdrop-blur-xl border border-white p-7 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_-10px_rgba(79,70,229,0.12)] hover:border-indigo-100 flex flex-col justify-between overflow-hidden">
                        
                        <!-- Light Blob on Hover -->
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-indigo-400/20 to-pink-400/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>

                        <div>
                            <!-- Header: Title & Status -->
                            <div class="flex justify-between items-start mb-3 gap-3">
                                <h3 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors duration-300 leading-snug">
                                    {{ $item->title }}
                                </h3>
                                <span class="bg-emerald-50 text-emerald-700 text-xs font-black px-3 py-1.5 rounded-xl border border-emerald-100 whitespace-nowrap shadow-sm flex items-center gap-1.5">
                                    <span class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></span>
                                    Valide
                                </span>
                            </div>

                            <!-- Codes Badges (Ticket Code & Reservation Code) -->
                            <div class="flex flex-wrap gap-2 mb-5">
                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-indigo-50 border border-indigo-100 text-[11px] font-mono font-bold text-indigo-700">
                                    <svg class="w-3.5 h-3.5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                                    </svg>
                                    <span>Ticket: {{ $item->ticket_code }}</span>
                                </div>

                                <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-xl bg-slate-100 border border-slate-200/60 text-[11px] font-mono font-bold text-slate-600">
                                    <span>Réservation: {{ $item->reservation_code }}</span>
                                </div>
                            </div>

                            <!-- Event Details -->
                            <div class="space-y-2.5 text-xs text-slate-600 mb-6 bg-slate-50/60 p-4 rounded-2xl border border-slate-100/80">
                                <!-- Date -->
                                <div class="flex items-center gap-2.5">
                                    <span class="p-1 rounded-lg bg-white border border-slate-100 shadow-2xs">📅</span>
                                    <span class="font-bold text-slate-700">Date:</span>
                                    <span class="text-slate-500 font-medium">{{ $item->event_date }}</span>
                                </div>

                                <!-- Horaire -->
                                <div class="flex items-center gap-2.5">
                                    <span class="p-1 rounded-lg bg-white border border-slate-100 shadow-2xs">⏰</span>
                                    <span class="font-bold text-slate-700">Horaire:</span>
                                    <span class="text-slate-500 font-medium">{{ $item->start_time }} - {{ $item->end_time }}</span>
                                </div>

                                <!-- Lieu -->
                                <div class="flex items-center gap-2.5">
                                    <span class="p-1 rounded-lg bg-white border border-slate-100 shadow-2xs">📍</span>
                                    <span class="font-bold text-slate-700">Lieu:</span>
                                    <span class="text-slate-500 font-medium truncate">{{ $item->location }}</span>
                                </div>
                            </div>
                        </div>

                    </article>
                @empty
                    <!-- Empty State -->
                    <div class="col-span-full py-16 text-center bg-white/60 backdrop-blur-xl rounded-[2.5rem] border border-white p-8">
                        <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-indigo-50 text-indigo-500 flex items-center justify-center">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-slate-800">Aucun billet trouvé</h3>
                        <p class="text-xs text-slate-400 mt-1">Vous n'avez pas encore de billets réservez.</p>
                    </div>
                @endforelse
            </div>

        </main>

    </div>

</body>
</html>