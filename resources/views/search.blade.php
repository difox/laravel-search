@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="/search" class="form flex">
                @csrf

                <input type="text" name="q" class="form-control" value=""  />

                <button class="btn btn-primary" type="submit">
                    Search
                </button>
            </form>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            @if (count($items) > 0)
                <table class="table table-bordered">
                    @foreach ($items as $item)
                    <tr>
                        <td>
                            <img src="{{ $item->image_url }}" width="200" />
                        </td>
                        <td>{{ $item->product_name }}</td>
                        <td>{{ $item->categories }}</td>
                        <td>
                            <a class="product-save-link" href="javascript:void(0)" data-id="{{ $item->id }}">Save</a>
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
