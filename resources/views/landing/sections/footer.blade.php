<footer class="bg-white text-verdeOscuro py-12 px-6">

    <!-- Banner estático -->
    <section class="relative w-full h-80 md:h-screen/2 bg-cover bg-center"
        style="background-image: url('{{ asset('images/equipo/Equipo1Z.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <div class="relative z-10 flex items-center justify-center h-full">
            <h1 class="text-white text-2xl md:text-4xl font-bold text-center">Innovación. Precisión. Excelencia </h1>
        </div>
    </section> 

    <br><br><br><br>

    <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">

        <!-- Información de la clínica -->
        <div>
            <h3 class="font-bold text-xl mb-4">Clínica Capilar Elite</h3>
            <p class="text-sm mb-2">Especialistas en injerto capilar y tratamientos complementarios. Resultados naturales
                y personalizados.</p>
            <p class="text-sm">Email: info@clinicacapilar.com</p>
            <p class="text-sm">Tel: +52 55 1234 5678</p>
        </div>

        <!-- Clínicas -->
        <div>
            <h3 class="font-bold text-xl mb-4">Nuestras Clínicas</h3>
            <ul class="space-y-2 text-sm">
                <li><strong>Santa Fe:</strong> Santa Fe - Juan Salvador Agraz 97 piso 1, Contadero, Cuajimalpa de
                    Morelos 05348, CDMX.

                </li>
                <li><strong>Pedregal:</strong> Anillo Perif. 3332-Piso 9, Oficina 910, Jardines del Pedregal, Álvaro
                    Obregón, 01900 Ciudad de México, CD</li>
                <li><strong>Queretaro:</strong> Corporativo AQUA Querétaro, Anillo Vial Fray Junípero Serra 3034 Piso 9
                    Consultorio 905, 76100 Juriquilla, 76100 Santiago de Querétaro, Qro.</li>
            </ul>
        </div>



    </div>

    <div class="mt-8 border-t border-gray-200 pt-4 text-center text-sm text-gray-500">
        © 2025 Clínica Capilar Elite. Todos los derechos reservados.
    </div>
</footer>

<script>
    function calcularFoliculos() {
        const pacientes = parseInt(document.getElementById('pacientes').value) || 0;
        const foliculos = parseInt(document.getElementById('foliculos').value) || 0;
        const total = pacientes * foliculos;
        document.getElementById('resultado').innerText = "Total de folículos implantados: " + total;
    }
</script>
