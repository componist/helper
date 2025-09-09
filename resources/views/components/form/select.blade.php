<select
    {{ $attributes->merge(['class' => 'w-full px-5 py-2 bg-white dark:bg-slate-500 rounded-md border-2 border-slate-400 focus:border-teal-400 focus:ring-teal-400  inline-block focus:outline-none']) }}>
    {{ $slot }}
</select>
