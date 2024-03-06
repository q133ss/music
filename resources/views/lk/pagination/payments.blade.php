<div class="dataTables_paginate paging_simple_numbers d-flex align-self-center mt-2" id="DataTables_Table_0_paginate">
    <ul class="pagination">
        <li class="paginate_button page-item previous @if ($paginator->onFirstPage()) disabled @endif" id="DataTables_Table_0_previous">
            <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                class="page-link" href="{{$paginator->previousPageUrl()}}">Назад</a></li>

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis">
                    <a aria-controls="DataTables_Table_0" aria-disabled="true" role="link" data-dt-idx="ellipsis" tabindex="-1" class="page-link">
                        …
                    </a>
                </li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button page-item active">
                    @else
                        <li class="paginate_button page-item">
                    @endif
                            <a href="{{$url}}" aria-controls="DataTables_Table_0" role="link" aria-current="page" data-dt-idx="0" tabindex="0"
                               class="page-link">{{$page}}
                            </a>
                        </li>
                @endforeach
            @endif
        @endforeach


        <li class="paginate_button page-item next @if ($paginator->onLastPage()) disabled @endif" id="DataTables_Table_0_next">
            <a href="{{$paginator->nextPageUrl()}}" aria-controls="DataTables_Table_0" role="link" data-dt-idx="next" tabindex="0" class="page-link">
                Вперед
            </a>
        </li>
    </ul>
</div>
