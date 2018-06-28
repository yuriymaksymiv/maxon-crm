@foreach($categories as $category_list)

    <option value="{{$category_list->id or ""}}"

            @isset($product->category_id)

            @if ($product->category_id == $category_list->id)
            selected=""
            @endif

            @if ($product->category_id == $category_list->parent_id)
            selected=""
            @endif

            @endisset
    >
        {!! $delimiter or "" !!}{{$category_list->name or ""}}
    </option>

    @if (count($category_list->children) > 0)

        @include('office.products.partials.categories', [
        'categories' => $category_list->children,
        'delimiter' => ' - ' . $delimiter
        ])
    @endif

@endforeach
