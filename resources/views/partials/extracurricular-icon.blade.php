@if (!empty($item['logo_url']))
    <img src="{{ $item['logo_url'] }}" alt="Logo {{ $item['name'] }}" class="rounded-circle border"
        style="width: 32px; height: 32px; object-fit: cover;">
@else
    <i class="fa-solid {{ $item['icon'] ?? 'fa-star' }} text-primary" style="font-size: 24px;"></i>
@endif
