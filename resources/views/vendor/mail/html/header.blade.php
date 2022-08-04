<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Sirisma DKK Semarang')
            <img src="https://semarangkota.go.id/assets/img/logo-icon.png" class="logo" alt="Pemkot Logo">
            <h3 style="text-align: center">Sirisma DKK Semarang</h3>
            @else
            {{ $slot }}
            @endif
        </a>
    </td>
</tr>
