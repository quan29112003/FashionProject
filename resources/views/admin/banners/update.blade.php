<table>
    @foreach ($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>
            <input type="checkbox" class="is_active_checkbox" data-id="{{ $category->id }}" {{ $category->is_active ? 'checked' : '' }}>
        </td>
    </tr>
    @endforeach
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.is_active_checkbox').forEach(function(checkbox) {
            checkbox.addEventListener('change', function() {
                var isActive = this.checked ? 1 : 0;
                var categoryId = this.dataset.id;
                var token = '{{ csrf_token() }}';

                fetch('{{ route("update-category-status") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    body: JSON.stringify({
                        id: categoryId,
                        is_active: isActive
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Category status updated successfully.');
                    } else {
                        alert('Error updating category status.');
                    }
                })
                .catch(error => {
                    alert('Error updating category status.');
                });
            });
        });
    });
</script>
