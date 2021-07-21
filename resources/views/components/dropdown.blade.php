<div x-data="{ open: false }">
    <div @click="open = !open" @click.away="open = false">
        {{ $trigger }}
    </div>

    <div x-show="open" class="py-2 absolute bg-gray-100 w-full mt-1 rounded-xl z-50 overflow-auto max-h-52">
        {{ $options }}
    </div>
</div>