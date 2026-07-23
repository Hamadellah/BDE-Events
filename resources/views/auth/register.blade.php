<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte</title>
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

    <!-- Register Card Container -->
    <div class="w-full max-w-md my-auto">
        
        <div class="relative rounded-[2.5rem] bg-white/80 backdrop-blur-xl border border-white p-8 md:p-10 shadow-[0_10px_40px_-15px_rgba(0,0,0,0.05)] overflow-hidden">
            
            <!-- Top Decorative Gradient Blob -->
            <div class="absolute -top-24 -right-24 w-48 h-48 bg-gradient-to-br from-indigo-400/20 to-pink-400/20 rounded-full blur-2xl pointer-events-none"></div>

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-14 h-14 rounded-2xl bg-indigo-50 border border-indigo-100/80 text-indigo-600 mb-4 shadow-sm">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 4 4 0 11-8 0 4 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Créer un compte</h1>
                <p class="text-xs text-slate-400 font-medium mt-1">Rejoignez-nous aujourd'hui et commencez</p>
            </div>

            <!-- Form -->
            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name Field -->
                <div class="space-y-1.5">
                    <label for="name" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Nom complet</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </span>
                        <input type="text" name="name" id="name" required
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300" 
                            placeholder="John Doe">
                    </div>
                </div>

                <!-- Email Field -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Adresse Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </span>
                        <input type="email" name="email" id="email" required
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300" 
                            placeholder="vous@exemple.com">
                    </div>
                </div>

                <!-- Password Field -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Mot de passe</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </span>
                        <input type="password" name="password" id="password" required
                            class="w-full pl-11 pr-4 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300" 
                            placeholder="••••••••">
                    </div>
                </div>

                <!-- Role Selector -->
                <div class="space-y-1.5">
                    <label for="role" class="block text-xs font-bold text-slate-600 uppercase tracking-wider">Rôle du compte</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </span>
                        <select name="role" id="role" required
                            class="w-full pl-11 pr-10 py-3 bg-slate-50/80 border border-slate-200/80 rounded-2xl text-slate-800 text-sm font-medium focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:bg-white transition-all duration-300 appearance-none cursor-pointer">
                            <option value="student">Student</option>
                            <option value="admin">Admin</option>
                        </select>
                        <!-- Arrow Icon -->
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <button type="submit" 
                    class="w-full group relative inline-flex items-center justify-center gap-2 py-3.5 px-6 rounded-2xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-sm transition-all duration-300 shadow-lg shadow-slate-900/10 hover:shadow-xl hover:shadow-slate-900/20 hover:-translate-y-0.5 active:translate-y-0 overflow-hidden pt-3.5 mt-2">
                    <span class="absolute inset-0 w-full h-full bg-gradient-to-r from-violet-600 via-indigo-600 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-gradient-x"></span>
                    <span class="relative z-10 tracking-wide">Commencer</span>
                    <svg class="w-4 h-4 relative z-10 transition-transform duration-300 group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                    </svg>
                </button>

                <!-- Login Redirect Link -->
                <p class="text-center text-xs font-semibold text-slate-400 pt-2">
                    Vous avez déjà un compte ? 
                    <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 hover:underline">Se connecter</a>
                </p>

            </form>

        </div>

    </div>

</body>
</html>