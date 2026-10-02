<div class="card">
    <h3>Lokasi: {{ $item['lokasi'] }}</h3>
    <p><strong>Nama Pelapor:</strong> {{ $item['nama_pelapor'] }}</p>
    <p><strong>Tinggi Genangan Air:</strong> {{ $item['tinggi_air'] }} cm</p>

    @if($item['tinggi_air'] < 30)
        <p>Status: <span style="color: orange; font-weight: bold;">Waspada</span></p>
    @elseif($item['tinggi_air'] <= 70)
        <p>Status: <span style="color: darkorange; font-weight: bold;">Siaga</span></p>
    @else
        <p>Status: <span style="color: red; font-weight: bold;">Awas</span></p>
    @endif
</div>
