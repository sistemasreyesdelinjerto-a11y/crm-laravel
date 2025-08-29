<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>@yield('title', 'Clínica Capilar')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        beigeClaro: '#DED5CE',
        beigeCalido: '#CDAF95',
        verdeOscuro: '#1C6C73',
        verdeClaro:  '#4298A7',
        grisCalido:  '#C8BAAF',
      },
      fontFamily: { poppins: ['Poppins','sans-serif'] },
      keyframes: {
        fadeUp: { '0%': {opacity:0, transform:'translateY(12px)'}, '100%': {opacity:1, transform:'translateY(0)'} },
        glow:    { '0%,100%': {boxShadow:'0 0 0 rgba(0,0,0,0)'}, '50%': {boxShadow:'0 8px 24px rgba(28,108,115,.25)'} },
        floaty:  { '0%,100%': {transform:'translateY(0)'}, '50%': {transform:'translateY(-4px)'} }
      },
      animation: { fadeUp:'fadeUp 1.2s ease-out both', glow:'glow 3s ease-in-out infinite', floaty:'floaty 4s ease-in-out infinite' }
    }
  }
}
</script>
<!-- BOTÓN FLOTANTE DE WHATSAPP -->
<!-- BOTÓN FLOTANTE DE WHATSAPP CON OPCIONES -->
<div class="fixed bottom-6 right-6 flex flex-col items-end z-50">
    <!-- Botón principal -->
    <button id="whatsappBtn" 
        class="w-16 h-16 bg-green-500 hover:bg-green-600 text-white rounded-full shadow-lg flex items-center justify-center transition transform hover:scale-110">
        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-8 h-8">
            <path d="M20.52 3.48A11.87 11.87 0 0012 0C5.373 0 0 5.373 0 12c0 2.112.552 4.084 1.512 5.824L0 24l6.432-1.512A11.914 11.914 0 0012 24c6.627 0 12-5.373 12-12 0-3.196-1.24-6.196-3.48-8.52zm-8.52 18c-1.924 0-3.74-.528-5.288-1.44l-.38-.224-3.84.936.976-3.744-.248-.38A9.937 9.937 0 012 12c0-5.523 4.477-10 10-10 2.664 0 5.16 1.04 7.048 2.928C21.96 6.84 23 9.336 23 12c0 5.523-4.477 10-10 10zm5.34-7.86c-.288-.144-1.704-.84-1.968-.936-.264-.096-.456-.144-.648.144-.192.288-.744.936-.912 1.128-.168.192-.336.216-.624.072-.288-.144-1.216-.448-2.312-1.432-.856-.76-1.432-1.696-1.6-1.984-.168-.288-.018-.444.126-.588.128-.128.288-.336.432-.504.144-.168.192-.288.288-.48.096-.192.048-.36-.024-.504-.072-.144-.648-1.56-.888-2.136-.232-.576-.472-.504-.648-.504-.168 0-.36-.024-.552-.024s-.504.072-.768.36c-.264.288-1.008.984-1.008 2.4s1.032 2.784 1.176 2.976c.144.192 2.016 3.072 4.896 4.296.684.296 1.216.472 1.632.6.684.216 1.308.184 1.8.112.552-.08 1.704-.696 1.944-1.368.24-.672.24-1.248.168-1.368-.072-.12-.264-.192-.552-.336z"/>
        </svg>
    </button>

    <!-- Opciones desplegables -->
    <div id="whatsappMenu" class="mt-2 hidden flex-col space-y-2">
        <a href="https://wa.me/5215512345678" target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg transition">
           Santa Fe
        </a>
        <a href="https://wa.me/5215598765432" target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg transition">
           Pregral
        </a>
        <a href="https://wa.me/5215533322110" target="_blank"
           class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg transition">
           Querétaro
        </a>
    </div>
</div>

<script>
    const btn = document.getElementById('whatsappBtn');
    const menu = document.getElementById('whatsappMenu');

    btn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
    });
</script>


</head>
<body class="font-poppins bg-white text-verdeOscuro overflow-x-hidden">
  @yield('content')
</body>
</html>
