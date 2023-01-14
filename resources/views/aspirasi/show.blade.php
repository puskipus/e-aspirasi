<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aspirasi Detail') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card w-full bg-base-100 shadow-xl my-3">
                <div class="card-body">
                    <h2 class="card-title">{{ $aspirasi->user->name }} - <span class="text-gray-400">{{ $aspirasi->created_at }}</span></h2>
                    @can('delete', $aspirasi)
                        @if (Auth::user()->id == 1)
                            <form action="{{ route('aspirasi.destroy', $aspirasi) }}"  method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Delete" class="btn btn-error text-white">
                            </form>
                        @endif
                    @endcan
                    <h1 class="text-gray-400">Status : {{ $aspirasi->status }}</h1>
                    <p>{{ $aspirasi->isi }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        @if (Auth::user()->id == 1)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 card border-b border-gray-200">
                    <h2>Ganti status aspirasi</h2>
                    <form action="{{ route('aspirasi.update.status', $aspirasi) }}" method="post">
                        @csrf
                        @error('status')
                            <span class="text-error block">Harap isi dengan minimal 8 huruf</span>
                        @enderror
                        <textarea name="status" class="w-full block rounded textarea textarea-bordered @error('isi') textarea-error @enderror" rows="3" placeholder="Sampaikan hasil dari aspirasi warga ... (minimal 8 huruf)">{{ old('status') }}</textarea>
                        <input type="submit" value="Submit" class="btn mt-3">
                    </form>
                </div>
            </div>
        @endif


        @if (Auth::user()->id == 1)
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 card border-b border-gray-200">
                    <h2>Berikan Feedback</h2>
                    <form action="{{ route('aspirasi.komentar.store', $aspirasi) }}" method="post">
                        @csrf
                        @error('isi')
                            <span class="text-error block">Harap isi dengan minimal 8 huruf</span>
                        @enderror
                        <textarea name="isi" class="w-full block rounded textarea textarea-bordered @error('isi') textarea-error @enderror" rows="3" placeholder="Sampaikan hasil dari aspirasi warga ... (minimal 8 huruf)">{{ old('isi') }}</textarea>
                        <input type="submit" value="Submit" class="btn mt-3">
                    </form>
                </div>
            </div>
        @endif

        
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl my-3">Feedback</h1>
            @foreach ($aspirasi->komentars as $komentar)
                    <div class="card w-full bg-base-100 shadow-xl my-3">
                        <div class="card-body">
                            <h2 class="card-title">{{ $komentar->user->name }} - 
                                <span class="text-gray-500">{{ $komentar->created_at }}</span>
                                @can('delete', $komentar)
                                    @if (Auth::user()->id == 1)
                                        <form action="{{ route('aspirasi.komentar.destroy', [$komentar->aspirasi, $komentar]) }}"  method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-error text-white">
                                        </form>
                                    @endif
                                @endcan
                            </h2>
                            <p>{{ $komentar->isi }}</p>
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    
</x-app-layout>