<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

<div class="min-h-screen flex items-center justify-center bg-slate-950 p-4 relative overflow-hidden">
    <!-- Ambient Background Glows -->
    <div class="absolute -top-20 -left-20 w-80 h-80 bg-indigo-600/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-20 -right-20 w-80 h-80 bg-violet-600/30 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Main Card -->
    <div class="w-full max-w-md bg-slate-900/80 backdrop-blur-xl border border-slate-800/80 rounded-2xl p-8 shadow-2xl relative z-10">
        
        <!-- Header -->
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-12 h-12 rounded-xl bg-gradient-to-tr from-indigo-500 to-violet-500 text-white mb-3 shadow-lg shadow-indigo-500/30">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 4 4 0 11-8 0 4 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                </svg>
            </div>
            <h2 class="text-2xl font-bold text-white tracking-tight">Create an Account</h2>
            <p class="text-slate-400 text-sm mt-1">Join us today and start your journey</p>
        </div>

        <form method="POST" action="{{ route('register') }}" class="space-y-5">
            @csrf

            <!-- Name Field -->
            <div>
                <label for="name" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Full Name</label>
                <div class="relative">
                    <input type="text" name="name" id="name" required placeholder="John Doe"
                        class="w-full bg-slate-800/50 border border-slate-700/60 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition duration-200">
                </div>
            </div>

            <!-- Email Field -->
            <div>
                <label for="email" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Email Address</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required placeholder="you@example.com"
                        class="w-full bg-slate-800/50 border border-slate-700/60 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition duration-200">
                </div>
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required placeholder="••••••••"
                        class="w-full bg-slate-800/50 border border-slate-700/60 rounded-xl px-4 py-3 text-sm text-slate-100 placeholder-slate-500 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition duration-200">
                </div>
            </div>

            <!-- Role Selector -->
            <div>
                <label for="role" class="block text-xs font-semibold uppercase tracking-wider text-slate-400 mb-1.5">Account Role</label>
                <div class="relative">
                    <select name="role" id="role" required
                        class="w-full bg-slate-800/50 border border-slate-700/60 rounded-xl px-4 py-3 text-sm text-slate-100 focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-500/20 transition duration-200 appearance-none cursor-pointer">
                        <option value="student" class="bg-slate-900 text-slate-200">Student</option>
                        <option value="admin" class="bg-slate-900 text-slate-200">Admin</option>
                    </select>
                    <!-- Custom Arrow Icon -->
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full mt-2 py-3 px-4 bg-gradient-to-r from-indigo-500 to-violet-600 hover:from-indigo-600 hover:to-violet-700 text-white font-medium text-sm rounded-xl shadow-lg shadow-indigo-500/25 hover:shadow-indigo-500/40 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 transition-all duration-200 active:scale-[0.99]">
                Get Started
            </button>

        </form>
    </div>
</div>