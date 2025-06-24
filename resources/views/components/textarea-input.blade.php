@props(['disabled' => false])

<textarea @disabled($disabled) rows="10" {{ $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900
dark:text-gray-300 focus:border-indigo-500 dark:focus:border-secondary-500 focus:ring-indigo-500 dark:focus:ring-secondary-500
rounded-md shadow-sm']) }} />{{ $slot }}</textarea>
