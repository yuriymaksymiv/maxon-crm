<label for="">Статус</label>
<input type="hidden" name="user_id" value="{{Auth::id()}}">
<select class="form-control" name="published">
    @if (isset($product->id))
        <option value="0" @if ($product->published == 0) selected="" @endif>Не опубліковано</option>
        <option value="1" @if ($product->published == 1) selected="" @endif>Опубліковано</option>
    @else
        <option value="0">Не опубліковано</option>
        <option value="1">Оопубліковано</option>
    @endif
</select>

<label for="">Назва</label>
<input type="text" class="form-control" name="name" placeholder="Назва категорії" value="{{$product->name or ""}}" required>

<label for="">Категорія</label>
<select class="form-control" name="category_id">
    <option value="0">-- Головна категорія</option>
    @include('office.products.partials.categories', ['categories' => $categories])
</select>

<input type="file" name="image">

<input class="btn btn-success" type="submit" value="Зберегти">