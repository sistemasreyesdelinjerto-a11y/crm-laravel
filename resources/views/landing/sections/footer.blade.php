<footer class="bg-white text-verdeOscuro py-12 px-6">
  <div class="max-w-7xl mx-auto grid md:grid-cols-3 gap-8">

    <!-- Información de la clínica -->
    <div>
      <h3 class="font-bold text-xl mb-4">Clínica Capilar</h3>
      <p class="text-sm mb-2">Especialistas en injerto capilar y tratamientos complementarios. Resultados naturales y personalizados.</p>
      <p class="text-sm">Email: info@clinicacapilar.com</p>
      <p class="text-sm">Tel: +52 55 1234 5678</p>
    </div>

    <!-- Clínicas -->
    <div>
      <h3 class="font-bold text-xl mb-4">Nuestras Clínicas</h3>
      <ul class="space-y-2 text-sm">
        <li><strong>Santa Fe:</strong> Av. Reforma 123, Col. Juárez</li>
        <li><strong>Pedregal:</strong> Av. Vallarta 456, Col. Americana</li>
        <li><strong>Queretaro:</strong> Av. Constitución 789, Col. Centro</li>
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
