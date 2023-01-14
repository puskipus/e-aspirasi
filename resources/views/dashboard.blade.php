<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aspirasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (Auth::user()->id != 1)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="{{ route('aspirasi.store') }}" method="post">
                            @csrf
                            @error('isi')
                                <span class="text-error block">Harap isi dengan minimal 8 huruf</span>
                            @enderror
                            <textarea name="isi" class="w-full block rounded textarea textarea-bordered @error('isi') textarea-error @enderror" rows="3" placeholder="Sampaikan aspirasi anda ... (minimal 8 huruf)">{{ old('isi') }}</textarea>
                            <input type="submit" value="Submit" class="btn mt-3">
                        </form>
                    </div>
                </div>
            @endif
            
            
            @foreach ($aspirasis as $aspirasi)
                <div class="card w-full bg-base-100 shadow-xl my-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $aspirasi->user->name }} - <span class="text-gray-400">{{ $aspirasi->created_at }}</span></h2>
                        <p>{{ $aspirasi->isi }}</p>
                    </div>
                    <div class="card-actions justify-end">
                        <a href="{{ route('aspirasi.show', $aspirasi) }}" class="mx-3 my-3">Detail Aspirasi</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
