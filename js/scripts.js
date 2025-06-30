document.addEventListener('DOMContentLoaded', () => {
  const searchInput = document.getElementById('searchInput');
  const suggestionsBox = document.getElementById('searchSuggestions');

  searchInput.addEventListener('input', () => {
    const query = searchInput.value.trim();

    if (query.length < 2) {
      suggestionsBox.style.display = 'none';
      return;
    }

    fetch(`../public/live-search.php?q=${encodeURIComponent(query)}`)
      .then(res => res.json())
      .then(data => {
        suggestionsBox.innerHTML = '';

        if (data.length === 0) {
          suggestionsBox.style.display = 'none';
          return;
        }

        data.forEach(item => {
          const li = document.createElement('li');
          li.className = 'list-group-item list-group-item-action';
          li.textContent = item.name;
          li.addEventListener('click', () => {
            window.location.href = `../public/product.php?id=${item.product_id}`;
          });
          suggestionsBox.appendChild(li);
        });

        suggestionsBox.style.display = 'block';
      });
  });

  // Hide suggestions on click outside
  document.addEventListener('click', e => {
    if (!searchInput.contains(e.target) && !suggestionsBox.contains(e.target)) {
      suggestionsBox.style.display = 'none';
    }
  });
});
