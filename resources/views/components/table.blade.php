@props(['data'])

<table class="min-w-full divide-y divide-gray-200">
    <thead>
    <tr>
        @foreach ($data['headers'] as $header)
            <th scope="col">
                {{ $header['text'] }}
            </th>
    @endforeach

    </thead>
    <tbody>
    @foreach ($data['rows'] as $row)
        <tr class="text-center p-2">
            @foreach ($row['cells'] as $cell)
                <td class="p-2">
                    @if (is_array($cell))
                        @foreach ($cell as $button)
                            {!! $button !!}
                        @endforeach
                    @else
                        {{ $cell }}
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
