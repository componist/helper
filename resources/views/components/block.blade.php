<div
    {{ $attributes->merge(['class' => 'grid grid-cols-1 gap-5 p-5 bg-white dark:bg-slate-800 rounded-md shadow-sm']) }}>
    {{ $slot }}
</div>
