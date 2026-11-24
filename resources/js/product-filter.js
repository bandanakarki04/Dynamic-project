document.addEventListener('DOMContentLoaded', function () {
    const tagFilter = document.getElementById('tag-filter');
    const solutionFilter = document.getElementById('solution-filter');
    const productList = document.getElementById('product-list');

    if (!tagFilter || !solutionFilter || !productList) {
        return;
    }

    async function loadProducts(url) {
        try {
            const response = await fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            });

            if (!response.ok) {
                throw new Error('Failed to load products');
            }

            productList.innerHTML = await response.text();
        } catch (error) {
            console.error(error);
            alert('Could not load products.');
        }
    }

    function updateFilters() {
        const url = new URL(window.location.href);

        if (tagFilter.value === '') {
            url.searchParams.delete('tag');
        } else {
            url.searchParams.set('tag', tagFilter.value);
        }

        if (solutionFilter.value === '') {
            url.searchParams.delete('solution');
        } else {
            url.searchParams.set('solution', solutionFilter.value);
        }

        url.searchParams.delete('page');

        window.history.replaceState(null, '', url.toString());

        loadProducts(url.toString());
    }

    tagFilter.addEventListener('change', updateFilters);
    solutionFilter.addEventListener('change', updateFilters);

    productList.addEventListener('click', function (event) {
        const link = event.target.closest('a');

        if (!link || !link.closest('nav')) {
            return;
        }

        event.preventDefault();
        window.history.replaceState(null, '', link.href);
        loadProducts(link.href);
    });
});