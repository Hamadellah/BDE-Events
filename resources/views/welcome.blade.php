<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenue - EventHub</title>
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
                            '50%': { transform: 'translateY(-6px)' },
                        }
                    }
                }
            }
        }
    </script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="bg-[#F8FAFC] text-slate-800 min-h-screen font-sans antialiased relative overflow-x-hidden flex flex-col justify-between">

    <!-- Ambient Dynamic Backgrounds -->
    <div class="fixed top-[-10%] left-1/2 -translate-x-1/2 w-[600px] h-[600px] bg-gradient-to-tr from-indigo-200/40 via-sky-200/40 to-pink-200/40 rounded-full blur-[120px] -z-10 pointer-events-none animate-float"></div>
    <div class="fixed bottom-[-10%] right-10 w-[400px] h-[400px] bg-gradient-to-br from-emerald-200/30 to-blue-200/40 rounded-full blur-[100px] -z-10 pointer-events-none"></div>

    <!-- Navigation Bar -->
    <header class="max-w-7xl mx-auto w-full p-4 md:p-6">
        <div class="flex items-center justify-between p-4 px-6 rounded-3xl bg-white/70 backdrop-blur-2xl border border-white shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-2xl bg-gradient-to-tr from-indigo-500 via-purple-500 to-pink-500 p-0.5 shadow-md flex items-center justify-center">
                    <div class="w-full h-full bg-white rounded-[14px] flex items-center justify-center">
                        <span class="text-xl font-black text-indigo-600">E</span>
                    </div>
                </div>
                <span class="text-lg font-extrabold text-slate-900 tracking-tight">Event<span class="text-indigo-600">Hub</span></span>
            </div>

            <!-- Auth Action Buttons -->
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" 
                   class="px-5 py-2.5 rounded-2xl bg-white hover:bg-slate-50 text-slate-700 font-semibold text-sm border border-slate-200/80 transition-all duration-300 shadow-sm hover:shadow">
                    Connexion
                </a>
                <a href="{{ route('register') }}" 
                   class="group relative inline-flex items-center gap-2 px-5 py-2.5 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-semibold text-sm transition-all duration-300 shadow-lg shadow-slate-900/10 hover:shadow-xl hover:shadow-slate-900/20 hover:-translate-y-0.5 overflow-hidden">
                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-violet-600 via-indigo-600 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-gradient-x"></span>
                    <span class="relative z-10">S'inscrire</span>
                </a>
            </div>

        </div>
    </header>

    <!-- Main Hero Section -->
    <main class="max-w-7xl mx-auto px-4 py-12 md:py-20 flex-1 flex flex-col items-center justify-center text-center">
        
        <!-- Welcome Badge -->
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50/80 border border-indigo-100 text-indigo-700 font-bold text-xs shadow-sm mb-8 animate-float">
            <span class="flex h-2 w-2 relative">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-indigo-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-indigo-500"></span>
            </span>
            <span>La plateforme N°1 de gestion d'événements</span>
        </div>

        <!-- Main Title -->
        <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-slate-900 tracking-tight leading-[1.15] max-w-4xl mb-6">
            Découvrez & Réservez vos <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500">Événements Préférés</span>
        </h1>

        <!-- Subtitle -->
        <p class="text-slate-500 text-base md:text-lg max-w-2xl font-medium leading-relaxed mb-10">
            Rejoignez notre communauté pour participer à des événements exclusifs, réserver vos places en temps réel et gérer vos participations en toute simplicité.
        </p>

        <!-- CTA Buttons Container -->
        <div class="flex flex-col sm:flex-row items-center gap-4 w-full sm:w-auto mb-16">
            
            <!-- Register CTA -->
            <a href="{{ route('register') }}" 
               class="w-full sm:w-auto group relative inline-flex items-center justify-center gap-3 px-8 py-4 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-base transition-all duration-300 shadow-xl shadow-slate-900/15 hover:shadow-2xl hover:shadow-indigo-500/20 hover:-translate-y-1 active:translate-y-0 overflow-hidden">
                <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-violet-600 via-indigo-600 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-gradient-x"></span>
                <span class="relative z-10">Créer un compte gratuitement</span>
                <svg class="w-5 h-5 relative z-10 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                </svg>
            </a>

            <!-- Login CTA -->
            <a href="{{ route('login') }}" 
               class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-8 py-4 rounded-2xl bg-white hover:bg-slate-50 text-slate-700 font-bold text-base border border-slate-200/80 transition-all duration-300 shadow-sm hover:shadow hover:-translate-y-0.5">
                <span>Déjà membre ? Se connecter</span>
            </a>

        </div>

        <!-- Features Showcase Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full text-left mt-8">
            
            <div class="p-6 rounded-[2rem] bg-white/80 backdrop-blur-xl border border-white shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)]">
                <div class="w-12 h-12 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center mb-4 font-bold">
                    ⚡
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Réservation Rapide</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Réservez vos places en un seul clic avec une mise à jour instantanée des capacités.</p>
            </div>

            <div class="p-6 rounded-[2rem] bg-white/80 backdrop-blur-xl border border-white shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)]">
                <div class="w-12 h-12 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center mb-4 font-bold">
                    🎯
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Événements Variés</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Accédez à une large sélection d'événements adaptés à vos centres d'intérêt.</p>
            </div>

            <div class="p-6 rounded-[2rem] bg-white/80 backdrop-blur-xl border border-white shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)]">
                <div class="w-12 h-12 rounded-2xl bg-pink-50 text-pink-600 flex items-center justify-center mb-4 font-bold">
                    🛡️
                </div>
                <h3 class="text-lg font-bold text-slate-900 mb-1">Espace Personnalisé</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Gérez votre profil, vos inscriptions et suivez l'état de vos réservations facilement.</p>
            </div>

        </div>

    </main>

    <!-- Simple Modern Footer -->
    <footer class="max-w-7xl mx-auto w-full p-6 text-center text-xs font-semibold text-slate-400">
        <p>© 2026 EventHub. Tous droits réservés.</p>
    </footer>

</body>
</html>