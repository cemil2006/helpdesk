<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/js/app.js'])
    @endif
</head>

<body class="min-h-screen bg-[#FDFDFC] text-[#1b1b18] p-6">
    <div class="max-w-3xl mx-auto">
        <h1 class="text-2xl font-semibold mb-4">Contactformulier</h1>

        @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-800 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-800 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="/contact" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium" for="name">Naam</label>
                <input id="name" name="name" value="{{ old('name') }}" required class="w-full border px-3 py-2 rounded" />
            </div>
            <div>
                <label class="block mb-1 font-medium" for="email">E-mail</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}" required class="w-full border px-3 py-2 rounded" />
            </div>
            <div>
                <label class="block mb-1 font-medium" for="subject">Onderwerp</label>
                <input id="subject" name="subject" value="{{ old('subject') }}" required class="w-full border px-3 py-2 rounded" />
            </div>
            <div>
                <label class="block mb-1 font-medium" for="message">Bericht</label>
                <textarea id="message" name="message" rows="6" required class="w-full border px-3 py-2 rounded">{{ old('message') }}</textarea>
            </div>
            <button type="submit" class="px-4 py-2 bg-[#1b1b18] text-white rounded">Verstuur bericht</button>
        </form>
    </div>
</body>

</html>