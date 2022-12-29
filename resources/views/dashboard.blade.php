<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('post.store') }}" method="POST">
                        @csrf
                        @error('body')
                            <span class="texterror block">{{ $message }}</span>
                        @enderror
                        <textarea name="body" class="w-full rounded block textarea textarea-bordered @error('body') textarea-error @enderror" rows="3" placeholder="Post something">{{ old('body') }}</textarea>
                        <input type="submit" value="Post" class="btn mt-2">
                    </form>
                </div>
            </div>

            @foreach ($posts as $post)
                <div class="card w-full bg-base-100 shadow-xl my-3">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->user->name }} - <span class="text-gray-500">
                            {{ $post->created_at->diffForHumans() }}</span></h2>
                        <p>{{ $post->body }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
