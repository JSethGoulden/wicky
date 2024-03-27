<div class="max-w-lg mx-auto my-4 bg-white p-6 rounded-xl shadow shadow-slate-300">
    <div class="flex flex-row justify-between items-center">
        <div>
            <h1 class="text-3xl font-medium">
                {{ $title }}
            </h1>
        </div>
        <div class="inline-flex space-x-2 items-center">
            <!-- buttons  -->
        </div>
    </div>
    <p class="text-slate-500">
        {{ $description }}
    </p>

    <div id="tasks" class="my-5">
        {{ $slot }}
    </div>
    <p class="text-xs text-slate-500 text-center">Something something footer</p>
</div>
