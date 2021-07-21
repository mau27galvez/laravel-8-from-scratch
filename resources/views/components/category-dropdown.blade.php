<x-dropdown>
    <x-slot name="trigger">
        <button class="w-full inline-flex py-2 pl-3 pr-9 text-sm font-semibold lg:w-32 text-left">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}

            <x-icon.arrow-down class="absolute pointer-events-none" style="right: 12px;" width="22"
            height="22" />
        </button>
    </x-slot>
    <x-slot name="options">
        <x-dropdown-item href="{{ route('posts') }}" :active="!isset($currentCategory)">
            All
        </x-dropdown-item>

        @foreach ($categories as $category)
            <x-dropdown-item href="{{ route('posts') }}/?category={{ $category->slug}}" :active="isset($currentCategory) && $currentCategory->is($category)">
                {{ ucwords($category->name) }}
            </x-dropdown-item>
        @endforeach
    </x-slot>
</x-dropdown>