@props(['for'])

@error($for)
    <p {{ $attributes->merge(['class' => 'border-2 border-red-600 bg-red-100 rounded-md py-1 px-2 mt-2 text-sm text-red-700']) }}>{{ $message }}</p>
@enderror
