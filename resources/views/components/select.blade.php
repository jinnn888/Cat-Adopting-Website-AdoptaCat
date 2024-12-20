@props([
	'options' => [],
	'selected' => null
])
<select {{ $attributes->merge(['class' => 'border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md']) }}>
	<option value="" selected disabled>Please select</option>
	@foreach ($options as $option)
		<option  {{ $selected == $option ? 'selected' : ''}} value="{{ $option }}">{{ ucfirst($option) }}</option>
	@endforeach
</select>