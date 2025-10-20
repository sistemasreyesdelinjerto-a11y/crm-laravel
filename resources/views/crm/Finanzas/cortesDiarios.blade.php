@extends('panel.layouts.panel')

@section('title', 'Cortes diarios')
 
@section('content')
<section class="py-10 px-6 bg-gray-50">
    <h1 class="text-2xl text-center font-bold mb-8 text-[#1C6C73]">
        Administración de Cortes Diarios (Beta!)
    </h1>
 
    {{-- Selección de Fecha y Clínica --}}
    <div class="flex justify-center gap-4 mb-6">
        <input type="date" id="fecha" class="border rounded px-3 py-2" />
        <select id="clinic" class="border rounded px-3 py-2">
            <option value="">Selecciona Clínica</option>
            <option value="Santa fe">Santa fe</option>
            <option value="Pedregal">Pedregal</option>
            <option value="Queretaro">Queretaro</option>            
            {{-- Agregar más clínicas si se requiere --}}
        </select>
        <button id="loadDaily" class="bg-[#1C6C73] text-white px-4 py-2 rounded hover:bg-[#14585b]">
            Cargar Pagos
        </button>
    </div>

    {{-- Tabla de pagos diarios --}}
    <div class="overflow-x-auto">
        <table id="dailyTable" class="min-w-full bg-white border border-gray-200">
            <thead class="bg-[#1C6C73] text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Fecha</th>
                    <th class="px-4 py-2">Nombre</th>
                    <th class="px-4 py-2">Concepto</th>
                    <th class="px-4 py-2">Tipo</th>
                    <th class="px-4 py-2">Importe</th>
                    <th class="px-4 py-2">Método de Pago</th>
                    <th class="px-4 py-2">Sucursal</th>
                    <th class="px-4 py-2">Opciones</th>
                </tr>
            </thead>
            <tbody id="dailyBody">
                <tr>
                    <td colspan="9" class="text-center py-4">Seleccione una fecha y clínica para cargar los pagos</td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Totales diarios --}}
    <div class="mt-6 p-4 bg-gray-100 rounded">
        <h2 class="font-bold text-lg mb-2">Totales por método de pago</h2>
        <ul id="totalsList" class="list-disc list-inside text-gray-700">
            <li>Seleccione una fecha y clínica para ver los totales</li>
        </ul>
    </div>

    {{-- Firma --}}
    <div class="mt-6 p-4 bg-gray-100 rounded flex flex-col items-center gap-3">
        <h2 class="font-bold text-lg">Firma</h2>
        <canvas id="signaturePad" class="border border-gray-400 rounded" width="400" height="150"></canvas>
        <div class="flex gap-2 mt-2">
            <button id="clearSignature" class="bg-red-500 text-white px-4 py-2 rounded">Borrar Firma</button>
            <button id="saveSignature" class="bg-green-500 text-white px-4 py-2 rounded">Guardar Firma</button>
        </div>
    </div>

    {{-- Generar PDF --}}
    <div class="mt-6 flex justify-center">
        <button id="generatePDF" class="bg-[#1C6C73] text-white px-6 py-2 rounded hover:bg-[#14585b]">
            Generar Corte Diario (PDF)
        </button>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.0.0/dist/signature_pad.umd.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const signaturePad = new SignaturePad(document.getElementById('signaturePad'));

    // Borrar firma
    document.getElementById('clearSignature').addEventListener('click', () => signaturePad.clear());

    // Guardar firma
    document.getElementById('saveSignature').addEventListener('click', async () => {
        if(signaturePad.isEmpty()) return alert('No hay firma para guardar');
        const firmaData = signaturePad.toDataURL();
        const dia = document.getElementById('fecha').value;
        const clinic = document.getElementById('clinic').value;

        const res = await fetch('{{ route("panel.corte.addSignByDay") }}', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({ dia, clinic, firma: firmaData })
        });
        const data = await res.json();
        alert(data.success ? 'Firma guardada' : data.message);
    });

    // Cargar pagos y totales
    document.getElementById('loadDaily').addEventListener('click', async () => {
        const fecha = document.getElementById('fecha').value;
        const clinic = document.getElementById('clinic').value;

        if(!fecha || !clinic) return alert('Seleccione fecha y clínica');

        // Cargar pagos
        const formData = new FormData();
            formData.append('fecha', fecha);
            formData.append('clinic', clinic);

            const res = await fetch('{{ route("panel.corte.loadAllDaily") }}', {
                method: 'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: formData
            });

        const data = await res.json();

        const tbody = document.getElementById('dailyBody');
        tbody.innerHTML = '';
        if(data.data.length === 0){
            tbody.innerHTML = '<tr><td colspan="9" class="text-center py-4">No se encontraron pagos</td></tr>';
        } else {
            data.data.forEach(d => {
                tbody.innerHTML += `
                    <tr>
                        <td class="px-4 py-2">${d.id}</td>
                        <td class="px-4 py-2">${d.fecha}</td>
                        <td class="px-4 py-2">${d.nombre}</td>
                        <td class="px-4 py-2">${d.concepto}</td>
                        <td class="px-4 py-2">${d.tipo}</td>
                        <td class="px-4 py-2">${d.importe}</td>
                        <td class="px-4 py-2">${d.metodo_de_pago}</td>
                        <td class="px-4 py-2">${d.sucursal}</td>
                        <td class="px-4 py-2">${d.options || ''}</td>
                    </tr>
                `;
            });
        }

        // Cargar totales
        const resTotals = await fetch('{{ route("panel.corte.loadTotalDaily") }}', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({ fecha, clinic })
        });
        const totalsData = await resTotals.json();
        const ul = document.getElementById('totalsList');
        ul.innerHTML = '';
        totalsData.totals.forEach(t => {
            ul.innerHTML += `<li>${t.metodo_de_pago}: $${t.total_importe}</li>`;
        });
    });

    // Generar PDF
    document.getElementById('generatePDF').addEventListener('click', async () => {
        const fecha = document.getElementById('fecha').value;
        const clinic = document.getElementById('clinic').value;
        if(!fecha || !clinic) return alert('Seleccione fecha y clínica');

        const tableData = [];
        document.querySelectorAll('#dailyBody tr').forEach(row => {
            const cells = row.querySelectorAll('td');
            if(cells.length > 1){
                tableData.push([
                    cells[5].innerText, // Efectivo, Tarjeta, etc. ajustar según tu orden
                    0,0,0,0,0,0,0,0 // Placeholder para simplificar por ahora
                ]);
            }
        });

        let firmaData = signaturePad.isEmpty() ? null : signaturePad.toDataURL();

        const res = await fetch('{{ route("panel.corte.generateCashClosingDaily") }}', {
            method: 'POST',
            headers: {'Content-Type': 'application/json', 'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            body: JSON.stringify({ fecha, clinic, tableData, firma: firmaData, user_id: {{ auth()->id() }} })
        });
        const data = await res.json();
        if(data.success){
            alert('PDF generado: ' + data.path);
            window.open('/' + data.path, '_blank');
        } else {
            alert('Error: ' + data.message);
        }
    });
});
</script>
@endsection
