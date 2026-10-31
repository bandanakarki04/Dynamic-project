document.addEventListener('DOMContentLoaded', function () {
    const tagFilter = document.getElementById('tag-filter');

    if (!tagFilter) {
        return;
    }

    tagFilter.addEventListener('change', function () {
        const selectedTag = tagFilter.value === '' ? '' : Number(tagFilter.value);

        document.querySelectorAll('.product-row').forEach(function (row) {
            const productTags = JSON.parse(row.dataset.tags);

            if (selectedTag === '' || productTags.includes(selectedTag)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
});