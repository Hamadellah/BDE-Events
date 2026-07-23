<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Events</title>
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
<body class="bg-[#F8FAFC] text-slate-800 min-h-screen font-sans antialiased relative overflow-x-hidden">

    <!-- Ambient Dynamic Backgrounds -->
    <div class="fixed top-0 left-1/4 w-[500px] h-[500px] bg-gradient-to-tr from-indigo-200/40 via-sky-200/40 to-pink-200/40 rounded-full blur-[100px] -z-10 pointer-events-none animate-float"></div>
    <div class="fixed bottom-0 right-1/4 w-[400px] h-[400px] bg-gradient-to-br from-emerald-200/30 to-blue-200/40 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <div class="max-w-7xl mx-auto p-4 md:p-8 flex flex-col lg:flex-row gap-8">

        <!-- ================= ASIDE: User Profile Sidebar ================= -->
        <aside class="w-full lg:w-80 flex-shrink-0">
            <div class="sticky top-8 bg-white/80 backdrop-blur-xl border border-white p-6 rounded-[2.5rem] shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] flex flex-col items-center text-center">
                
                <!-- User Avatar with Status Indicator -->
                <div class="relative mb-4">
                    <div class="w-24 h-24 rounded-full bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-1 shadow-md">
                        <div class="w-full h-full bg-white rounded-full flex items-center justify-center overflow-hidden">
                            <!-- Display User Initials or Avatar Image -->
                            <span class="text-2xl font-black text-indigo-600">
                                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 2)) }}
                            </span>
                        </div>
                    </div>
                    <span class="absolute bottom-1 right-1 w-4 h-4 bg-emerald-500 border-2 border-white rounded-full"></span>
                </div>

                <!-- User Main Info -->
                <h3 class="text-xl font-bold text-slate-900 mb-1">
                    {{ auth()->user()->name ?? 'Othmane' }}
                </h3>
                <p class="text-xs font-semibold text-indigo-600 bg-indigo-50 px-3 py-1 rounded-full mb-6">
                    {{ auth()->user()->role ?? 'Event Manager' }}
                </p>

                <!-- User Metadata Details -->
                <div class="w-full space-y-3 pt-4 border-t border-slate-100 text-left text-xs font-medium text-slate-500">
                    <div class="flex items-center gap-3 p-2.5 rounded-xl bg-slate-50/80 border border-slate-100">
                        <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <span class="truncate text-slate-700 font-semibold">{{ auth()->user()->email ?? 'user@example.com' }}</span>
                    </div>

                    <div class="flex items-center justify-between p-2.5 rounded-xl bg-slate-50/80 border border-slate-100">
                        <span class="text-slate-400">Total Événements</span>
                        <span class="font-extrabold text-slate-800 text-sm">{{ count($event1) }}</span>
                    </div>
                </div>

                <!-- Logout Button inside Aside -->
                <form action="{{ route('logout') }}" method="POST" class="w-full mt-6">
                    @csrf
                    <button type="submit" class="w-full group inline-flex items-center justify-center gap-2 px-4 py-3 rounded-2xl bg-white hover:bg-rose-50 text-slate-600 hover:text-rose-600 font-semibold text-sm border border-slate-200/80 hover:border-rose-200 transition-all duration-300 shadow-sm">
                        <span>Déconnexion</span>
                        <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1m0-10V5"/>
                        </svg>
                    </button>
                </form>

            </div>
        </aside>

        <!-- ================= MAIN CONTENT: Events ================= -->
        <main class="flex-1 space-y-8">

            <!-- Top Header Action -->
            <header class="flex items-center justify-between p-4 rounded-3xl bg-white/70 backdrop-blur-2xl border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
                <div>
                    <h1 class="text-xl font-bold text-slate-900">Mes Événements</h1>
                    <p class="text-xs text-slate-400">Gérez vos réservations et capacités</p>
                </div>

                <form method="POST" action="{{ route('create-event') }}">
                    @csrf
                    <button type="submit" class="group relative inline-flex items-center gap-2.5 px-6 py-3 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-semibold text-sm transition-all duration-300 shadow-lg shadow-slate-900/10 hover:shadow-xl hover:shadow-slate-900/20 hover:-translate-y-0.5 overflow-hidden">
                        <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-violet-600 via-indigo-600 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-gradient-x"></span>
                        <svg class="w-5 h-5 relative z-10 transition-transform duration-300 group-hover:rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="relative z-10 tracking-wide">Créer un Événement</span>
                    </button>
                </form>
            </header>

            <!-- Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach($event1 as $event)
                    @php
                        $remaining = $event->capacity - $event->reservation_count;
                    @endphp

                    <article class="group relative rounded-[2.5rem] bg-white/80 backdrop-blur-xl border border-white p-7 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] transition-all duration-500 hover:-translate-y-2 hover:shadow-[0_20px_50px_-10px_rgba(79,70,229,0.12)] hover:border-indigo-100 flex flex-col justify-between overflow-hidden">
                        
                        <div class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-indigo-400/20 to-pink-400/20 rounded-full blur-2xl group-hover:scale-150 transition-transform duration-700 pointer-events-none"></div>

                        <div>
                            <!-- Title -->
                            <h2 class="text-xl font-bold text-slate-900 group-hover:text-indigo-600 transition-colors duration-300 line-clamp-2 leading-tight mb-5">
                                {{ $event->title }}
                            </h2>

                            <!-- Capacity Grid -->
                            <div class="grid grid-cols-2 gap-3 mb-5">
                                <div class="bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100/80">
                                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-0.5">Capacité</span>
                                    <span class="text-lg font-extrabold text-slate-800">{{ $event->capacity }}</span>
                                </div>
                                <div class="bg-slate-50/80 p-3.5 rounded-2xl border border-slate-100/80">
                                    <span class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-0.5">Réservés</span>
                                    <span class="text-lg font-extrabold text-indigo-600">{{ $event->reservation_count }}</span>
                                </div>
                            </div>


                        <!-- Footer Badge -->
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-xs font-bold uppercase tracking-wider text-slate-400">Places Restantes</span>

                            @if($remaining > 0)
                                <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-2xl bg-emerald-50 text-emerald-700 font-bold text-xs border border-emerald-200/50 shadow-sm">
                                    <span class="relative flex h-2 w-2">
                                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                    </span>
                                    <span>{{ $remaining }} places</span>
                                </div>
                            @else
                                <div class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-2xl bg-rose-50 text-rose-600 font-bold text-xs border border-rose-200/50">
                                    <span class="h-2 w-2 rounded-full bg-rose-500"></span>
                                    <span>Complet</span>
                                </div>
                            @endif
                        </div>

                    </article>
                @endforeach
            </div>

        </main>

    </div>

</body>
</html>