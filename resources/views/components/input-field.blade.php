@props(['autofocus' => false])

<input {{ $autofocus ? 'autofocus' : '' }} {{ $attributes->merge(['type' => "text", 'class' => "bg-white border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-300 block w-full p-2.5"]) }}>