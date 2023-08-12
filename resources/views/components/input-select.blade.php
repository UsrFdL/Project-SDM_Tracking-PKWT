<select {{ $attributes->merge(["class" => "bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-red-400 focus:border-red-400 block w-full p-2.5"]) }}>
    {{ $slot }}
</select>