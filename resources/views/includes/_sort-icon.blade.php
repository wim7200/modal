@if ($sortField !== $field)
    <span style="color: gray">
        <i class="text-muted fas fa-sort"></i>
    </span>
@elseif ($sortAsc)

    <span style="color: red">
        <i class="fas fa-sort-up"></i>
    </span>
@else
    <span style="color: red">
        <i class="fas fa-sort-down"></i>
    </span>
@endif
