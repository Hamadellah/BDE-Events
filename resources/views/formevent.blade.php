<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-100 my-6">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Créer un Nouvel Événement</h2>
    
    <form action="stor_event" method="POST" class="space-y-5">
        @csrf
        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre de l'événement</label>
            <input type="text" id="title" name="title" required placeholder="Ex: Conférence Tech 2026"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea id="description" name="description" rows="4" required placeholder="Décrivez l'événement..."
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition resize-none"></textarea>
        </div>

        <!-- Date & Times Row -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <!-- Event Date -->
            <div>
                <label for="event_date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" id="event_date" name="event_date" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>

            <!-- Start Time -->
            <div>
                <label for="starr_time" class="block text-sm font-medium text-gray-700 mb-1">Heure de début</label>
                <input type="time" id="starr_time" name="starr_time" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>

            <!-- End Time -->
            <div>
                <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">Heure de fin</label>
                <input type="time" id="end_time" name="end_time" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
        </div>

        <!-- Location -->
        <div>
            <label for="location" class="block text-sm font-medium text-gray-700 mb-1">Lieu (Location)</label>
            <input type="text" id="location" name="location" required placeholder="Ex: Casablanca, Hôtel X"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
        </div>

        <!-- Price & Capacity Row -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Price -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Prix (DH)</label>
                <input type="number" id="price" name="price" step="0.01" min="0" required placeholder="0.00"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>

            <!-- Capacity -->
            <div>
                <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Capacité (Nombre de places)</label>
                <input type="number" id="capacity" name="capacity" min="1" required placeholder="100"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 px-4 rounded-lg shadow-md transition duration-200">
                Ajouter l'événement
            </button>
        </div>

    </form>
</div>