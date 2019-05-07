@if ((count($category->children) > 0) AND ($category->parent_id > 0))

    <li><a href="#">{{ $category->name }} <i class="fa fa-chevron-right"></i></a>

@else

    <li><a href="#">{{ $category->name }}</a>

@endif

    @if (count($category->children) > 0)

        <ul>

        @foreach($category->children as $category)

            @include('menu.partials.index', $category)

        @endforeach

        </ul>

    @endif

    </li>