@extends('layouts.app')

@section('content')
<div class="container">
    <form method="GET" action="/search" class="form search-form">
        <div class="row justify-content-center mb-2">
            <div class="col-md-8 d-flex">
                <input type="text" name="q" class="form-control search-form__input" value="{{ $query }}"  />

                <button class="btn btn-primary" type="submit">
                    Search
                </button>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-8">
                Display on page:
                
                <select name="i">
                    <option {{ app('request')->input('i') == 20 ? 'selected' : '' }} value="20">20</option>
                    <option {{ app('request')->input('i') == 50 ? 'selected' : '' }} value="50">50</option>
                    <option {{ app('request')->input('i') == 100 ? 'selected' : '' }} value="100">100</option>
                    <option {{ app('request')->input('i') == 250 ? 'selected' : '' }} value="250">250</option>
                    <option {{ app('request')->input('i') == 500 ? 'selected' : '' }} value="500">500</option>
                    <option {{ app('request')->input('i') == 1000 ? 'selected' : '' }} value="1000">1000</option>
                </select>
            </div>
        </div>
    </form>

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (count($items) > 0)
                {!! $pagination->toHtml() !!}
                Total items: {{ $pagination->total() }}

                <table class="table table-bordered">
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            @if(isset($item['image_url']))
                                <img src="{{ $item['image_url'] }}" width="200" />
                            @else
                                No Image
                            @endif
                        </td>
                        <td>{{ $item['product_name'] ?? '' }}</td>
                        <td>{{ $item['categories'] ?? '' }}</td>
                        <td>
                            <a class="product-save-link" href="javascript:void(0)" data-id="{{ $item['code'] }}">Save</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            @elseif (!empty($query))
                There are no matching results
            @endif
        </div>
    </div>
</div>
@endsection
