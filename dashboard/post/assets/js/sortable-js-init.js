var nestedSortables = [].slice.call(document.querySelectorAll(".nested-sortable")),
nestedSortablesHandles = (nestedSortables && Array.from(nestedSortables).forEach(function(e) {
    new Sortable(e, {
        group: "nested",
        animation: 150,
        fallbackOnBody: !0,
        swapThreshold: .65
    })
}), [].slice.call(document.querySelectorAll(".nested-sortable-handle")));
nestedSortablesHandles && Array.from(nestedSortablesHandles).forEach(function(e) {
    new Sortable(e, {
        handle: ".handle",
        group: "nested",
        animation: 150,
        fallbackOnBody: !0,
        swapThreshold: .65
    })
});