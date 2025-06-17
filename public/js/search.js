$(document).ready(function () {
    // Function to handle search
    function handleSearch(inputSelector, resultsSelector) {

        const form = $(inputSelector).closest('form');

        $(inputSelector).on("input", function () {
            const query = $(this).val().trim();
            const resultsContainer = $(resultsSelector);

            if (query.length < 2) {
                resultsContainer.hide().empty();
                return;
            }

            // Show loading indicator
            resultsContainer
                .html('<div class="dropdown-item">جاري البحث...</div>')
                .show();

            const csrfToken = form.find('input[name="_token"]').val();

            $.ajax({
                url: "/search-products",
                method: "POST",
                data: {
                    _token: csrfToken,
                    query: query,
                },
                dataType: "json",
                success: function (data) {
                    if (data.length > 0) {
                        let html = "";
                        $.each(data, function (index, product) {
                            var productSlug = arabicSlug(product.name);
                            html += `<a href="/product/${product.id}/${productSlug}" class="dropdown-item">
                                <span>${product.name}</span>
                                <span><img loading="lazy" class="img-fluid" widht="25" height="25" src="/storage/${product.preview_image}" alt="${product.name}"></span>
                            </a>`;
                        });
                        resultsContainer.html(html).show();
                    } else {
                        resultsContainer
                            .html(
                                '<div class="dropdown-item">لا يوجد نتائج</div>'
                            )
                            .show();
                    }
                },
                error: function (xhr, status, error) {
                    resultsContainer
                        .html(
                            '<div class="dropdown-item">خطأ, يرجى المحاولة لاحقا</div>'
                        )
                        .show();
                    console.error("Error:", error);
                },
            });
        });

        // Hide results when clicking outside
        $(document).on("click", function (e) {
            if (
                !$(e.target).closest(inputSelector).length &&
                !$(e.target).closest(resultsSelector).length
            ) {
                $(resultsSelector).hide();
            }
        });
    }

    // Initialize both search inputs
    handleSearch("#search-input-1", "#search-results-1");
    handleSearch("#search-input-2", "#search-results-2");

    // Optional: Add debouncing to reduce AJAX calls
    $.extend({
        debounce: function (func, wait) {
            let timeout;
            return function () {
                const context = this,
                    args = arguments;
                clearTimeout(timeout);
                timeout = setTimeout(function () {
                    func.apply(context, args);
                }, wait);
            };
        },
    });
});

function arabicSlug(string) {
    if (!string) return '';

    // Replace spaces with dashes
    let slug = string.replace(/ /g, '-');

    // Remove special characters (keeps Arabic letters, numbers, spaces, and dashes)
    slug = slug.replace(/[^\u0600-\u06FF\u0750-\u077F\u08A0-\u08FF\uFB50-\uFDFF\uFE70-\uFEFF0-9 -]/g, '');

    // Trim dashes from beginning and end
    slug = slug.replace(/^-+/, '').replace(/-+$/, '');

    return slug;
}
