<!-- <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>POS Checkout</title>
</head>
<body class="bg-gray-100 h-screen flex flex-col">

    <div class="flex flex-col md:flex-row h-full w-full overflow-hidden">
        
        <div class="flex-1 flex flex-col bg-white shadow-lg overflow-hidden">
            <div class="p-4 border-b bg-blue-600 flex justify-between items-center text-white">
                <h2 class="text-xl font-bold">Carrito de Ventas</h2>
                <span class="text-sm">Orden #1234</span>
            </div>

            <div class="flex-1 overflow-y-auto p-4">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-400 uppercase text-xs border-b">
                            <th class="pb-2">Producto</th>
                            <th class="pb-2 text-center">Cant.</th>
                            <th class="pb-2 text-right">Precio</th>
                            <th class="pb-2 text-right">Total</th>
                            <th class="pb-2"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        <tr class="hover:bg-gray-50">
                            <td class="py-4">
                                <p class="font-medium">Café Americano 12oz</p>
                                <span class="text-xs text-gray-400">SKU: 00123</span>
                            </td>
                            <td class="py-4 text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="bg-gray-200 px-2 rounded hover:bg-gray-300">-</button>
                                    <span class="font-semibold w-6">2</span>
                                    <button class="bg-gray-200 px-2 rounded hover:bg-gray-300">+</button>
                                </div>
                            </td>
                            <td class="py-4 text-right text-gray-600">$2.50</td>
                            <td class="py-4 text-right font-bold">$5.00</td>
                            <td class="py-4 text-right">
                                <button class="text-red-500 hover:text-red-700 ml-2">🗑️</button>
                            </td>
                        </tr>
                        <tr class="hover:bg-gray-50">
                            <td class="py-4">
                                <p class="font-medium">Croissant de Mantequilla</p>
                                <span class="text-xs text-gray-400">SKU: 00456</span>
                            </td>
                            <td class="py-4 text-center text-semibold text-center">
                                <div class="flex items-center justify-center space-x-2">
                                    <button class="bg-gray-200 px-2 rounded hover:bg-gray-300">-</button>
                                    <span class="font-semibold w-6">1</span>
                                    <button class="bg-gray-200 px-2 rounded hover:bg-gray-300">+</button>
                                </div>
                            </td>
                            <td class="py-4 text-right text-gray-600">$3.00</td>
                            <td class="py-4 text-right font-bold">$3.00</td>
                            <td class="py-4 text-right text-red-500">
                                <button class="text-red-500 hover:text-red-700 ml-2">🗑️</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full md:w-96 bg-gray-50 p-6 flex flex-col justify-between border-l border-gray-200">
            <div>
                <h3 class="text-lg font-bold mb-4 text-gray-700 border-b pb-2">Resumen de Pago</h3>
                
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-500">Subtotal</span>
                        <span class="font-semibold">$8.00</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-500">Impuestos (10%)</span>
                        <span class="font-semibold">$0.80</span>
                    </div>
                    <div class="flex justify-between text-xl font-bold text-blue-700 pt-4 border-t">
                        <span>Total</span>
                        <span>$8.80</span>
                    </div>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-2">
                    <button class="border-2 border-blue-500 text-blue-500 font-bold py-3 rounded-lg hover:bg-blue-50">Efectivo</button>
                    <button class="border-2 border-gray-300 text-gray-600 font-bold py-3 rounded-lg hover:bg-gray-100">Tarjeta</button>
                </div>
            </div>

            <button class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-xl shadow-lg mt-6 text-lg transition-transform active:scale-95">
                PROCESAR PAGO (F12)
            </button>
        </div>
    </div>

</body>
</html> -->


<!-- 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>POS System - Venta</title>
</head>
<body class="bg-gray-100 h-screen flex flex-col font-sans">

    <div class="flex flex-col md:flex-row h-full w-full overflow-hidden">
        
        <div class="flex-1 flex flex-col bg-white shadow-lg overflow-hidden">
            
            <div class="p-4 bg-slate-800 text-white">
                <div class="flex flex-col lg:flex-row gap-4 items-center">
                    <h2 class="text-xl font-bold whitespace-nowrap">Punto de Venta</h2>
                    
                    <div class="relative w-full">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            🔍
                        </span>
                        <input 
                            type="text" 
                            placeholder="Escanea código de barras o busca por nombre/presentación..." 
                            class="w-full pl-10 pr-4 py-3 bg-slate-700 border-none rounded-lg text-white placeholder-gray-400 focus:ring-2 focus:ring-blue-500 transition-all outline-none"
                            autofocus
                        >
                        <span class="absolute inset-y-0 right-0 pr-3 flex items-center">
                            <kbd class="hidden sm:inline-block px-2 py-1 text-xs font-semibold text-gray-400 bg-slate-800 border border-slate-600 rounded">F1</kbd>
                        </span>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4">
                <table class="w-full text-left">
                    <thead class="sticky top-0 bg-white shadow-sm">
                        <tr class="text-gray-400 uppercase text-xs border-b">
                            <th class="pb-3">Detalle del Producto</th>
                            <th class="pb-3 text-center">Cant.</th>
                            <th class="pb-3 text-right">Precio Unit.</th>
                            <th class="pb-3 text-right">Subtotal</th>
                            <th class="pb-3 text-center w-10">Acción</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y text-gray-700">
                        <tr class="hover:bg-blue-50 transition-colors">
                            <td class="py-4">
                                <div class="font-bold text-gray-800">Coca Cola 600ml</div>
                                <div class="text-xs text-blue-600 font-mono">7501055300074 • Botella PET</div>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center justify-center border rounded-lg w-24 mx-auto overflow-hidden">
                                    <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200">-</button>
                                    <input type="text" value="1" class="w-8 text-center border-none text-sm focus:ring-0">
                                    <button class="px-2 py-1 bg-gray-100 hover:bg-gray-200">+</button>
                                </div>
                            </td>
                            <td class="py-4 text-right font-medium">$1.50</td>
                            <td class="py-4 text-right font-bold text-gray-900">$1.50</td>
                            <td class="py-4 text-center">
                                <button class="text-gray-300 hover:text-red-500 transition-colors">
                                    ✖
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                </div>
        </div>

        <div class="w-full md:w-80 lg:w-96 bg-gray-50 border-l flex flex-col">
            <div class="p-6 flex-1">
                <h3 class="text-gray-500 uppercase text-xs font-bold tracking-wider mb-6 border-b pb-2">Resumen de Venta</h3>
                
                <div class="space-y-4">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Subtotal</span>
                        <span class="font-bold">$1.50</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">IVA (16%)</span>
                        <span class="font-bold">$0.24</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-gray-600">Descuento</span>
                        <span class="font-bold text-red-500">-$0.00</span>
                    </div>
                    
                    <div class="pt-6 border-t mt-6">
                        <div class="flex justify-between items-end">
                            <span class="text-gray-800 font-bold text-lg">Total a Pagar</span>
                            <span class="text-4xl font-black text-blue-700">$1.74</span>
                        </div>
                    </div>
                </div>

                <div class="mt-10 grid grid-cols-1 gap-3">
                    <button class="flex items-center justify-between px-4 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition-all group">
                        <span class="font-bold text-gray-600 group-hover:text-blue-600">💵 Efectivo</span>
                        <span class="text-xs bg-gray-200 px-2 py-1 rounded group-hover:bg-blue-200">F8</span>
                    </button>
                    <button class="flex items-center justify-between px-4 py-3 bg-white border-2 border-gray-200 rounded-xl hover:border-blue-500 hover:bg-blue-50 transition-all group">
                        <span class="font-bold text-gray-600 group-hover:text-blue-600">💳 Tarjeta</span>
                        <span class="text-xs bg-gray-200 px-2 py-1 rounded group-hover:bg-blue-200">F9</span>
                    </button>
                </div>
            </div>

            <div class="p-4 bg-white border-t">
                <button class="w-full bg-green-600 hover:bg-green-700 text-white font-black py-5 rounded-2xl shadow-xl shadow-green-200 text-xl flex items-center justify-center gap-3 transition-transform active:scale-95">
                    COBRAR AHORA
                    <span class="text-sm font-normal opacity-80">(Enter)</span>
                </button>
            </div>
        </div>
    </div>

</body>
</html> -->





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>POS Venezuela - Multimoneda</title>
</head>
<body class="bg-slate-100 h-screen flex flex-col font-sans overflow-hidden">

    <nav class="bg-blue-800 text-white px-6 py-2 flex justify-between items-center shadow-md">
        <div class="flex items-center gap-4">
            <h1 class="font-black text-xl tracking-tight">VENE-POS</h1>
            <span class="bg-blue-700 px-3 py-1 rounded-full text-xs font-mono border border-blue-500">Terminal #01</span>
        </div>
        
        <div class="flex items-center gap-3 bg-blue-900 px-4 py-1 rounded-lg border border-blue-400">
            <span class="text-xs font-bold text-blue-200">TASA BCV:</span>
            <div class="flex items-center">
                <span class="text-sm font-bold mr-1">Bs.</span>
                <input type="number" value="36.50" step="0.01" class="bg-transparent border-none w-16 text-sm font-black focus:ring-0 outline-none text-yellow-400" title="Click para editar tasa">
            </div>
            <span class="text-[10px] text-blue-300 italic">Hoy 19:18</span>
        </div>
    </nav>

    <div class="flex flex-col md:flex-row h-full overflow-hidden">
        
        <div class="flex-1 flex flex-col bg-white overflow-hidden">
            
            <div class="p-4 border-b">
                <div class="relative group">
                    <span class="absolute inset-y-0 left-0 pl-4 flex items-center text-gray-400 group-focus-within:text-blue-600 transition-colors">
                        🔍
                    </span>
                    <input 
                        type="text" 
                        placeholder="Escribe Nombre, Código de Barras o Presentación..." 
                        class="w-full pl-12 pr-4 py-4 bg-gray-50 border-2 border-gray-200 rounded-2xl focus:border-blue-500 focus:bg-white transition-all outline-none text-lg shadow-sm"
                        autofocus
                    >
                </div>
            </div>

            <div class="flex-1 overflow-y-auto px-4">
                <table class="w-full text-left">
                    <thead class="sticky top-0 bg-white z-10 border-b">
                        <tr class="text-gray-400 uppercase text-[10px] font-bold tracking-widest">
                            <th class="py-4">Descripción</th>
                            <th class="py-4 text-center">Cant.</th>
                            <th class="py-4 text-right">Precio ($ / Bs.)</th>
                            <th class="py-4 text-right">Total Bs.</th>
                            <th class="py-4 w-12"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        <tr class="hover:bg-blue-50/50 transition-colors">
                            <td class="py-4">
                                <div class="font-bold text-gray-800 leading-tight">Harina Pan 1kg</div>
                                <div class="text-[11px] text-blue-600 font-mono">759100100012 • Maíz Precocida</div>
                            </td>
                            <td class="py-4">
                                <div class="flex items-center justify-center bg-gray-100 rounded-lg w-20 mx-auto">
                                    <button class="px-2 font-bold hover:text-blue-600">-</button>
                                    <span class="px-2 text-sm font-black">2</span>
                                    <button class="px-2 font-bold hover:text-blue-600">+</button>
                                </div>
                            </td>
                            <td class="py-4 text-right">
                                <div class="text-sm font-bold text-gray-700">$ 1.20</div>
                                <div class="text-[10px] text-gray-400">Bs. 43.80</div>
                            </td>
                            <td class="py-4 text-right">
                                <div class="text-base font-black text-blue-900 italic">Bs. 87.60</div>
                                <div class="text-[10px] text-gray-400">Ref. $ 2.40</div>
                            </td>
                            <td class="py-4 text-center">
                                <button class="text-gray-300 hover:text-red-500 transition-colors">✕</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="w-full md:w-96 bg-slate-50 border-l border-gray-200 flex flex-col shadow-2xl">
            <div class="p-6 flex-1 space-y-6">
                <div>
                    <h3 class="text-slate-400 text-xs font-black uppercase tracking-widest mb-4">Resumen de Cuenta</h3>
                    
                    <div class="space-y-3 bg-white p-4 rounded-xl border border-gray-200 shadow-sm">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 italic">Subtotal Neto</span>
                            <span class="font-bold text-gray-700">$ 2.40</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-500 italic">IGTF (3%)</span>
                            <span class="font-bold text-orange-600">$ 0.07</span>
                        </div>
                        <hr class="border-dashed">
                        <div class="flex justify-between items-baseline">
                            <span class="text-gray-400 text-xs">TOTAL REF.</span>
                            <span class="text-2xl font-black text-gray-800">$ 2.47</span>
                        </div>
                    </div>
                </div>

                <div class="bg-blue-600 p-5 rounded-2xl shadow-lg shadow-blue-200 text-white relative overflow-hidden">
                    <div class="relative z-10">
                        <span class="text-xs font-bold opacity-80 uppercase">Total a Pagar (Bs.)</span>
                        <div class="text-4xl font-black mt-1 leading-none">
                            Bs. 90.15
                        </div>
                    </div>
                    <div class="absolute -right-4 -bottom-4 text-6xl opacity-10 rotate-12">🇻🇪</div>
                </div>

                <div class="grid grid-cols-2 gap-2">
                    <button class="flex flex-col items-center justify-center p-3 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                        <span class="text-xl">📱</span>
                        <span class="text-[10px] font-black text-gray-50:">PAGO MÓVIL</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-3 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                        <span class="text-xl">💵</span>
                        <span class="text-[10px] font-black text-gray-50:">DIVISAS</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-3 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                        <span class="text-xl">💳</span>
                        <span class="text-[10px] font-black text-gray-50:">DÉBITO</span>
                    </button>
                    <button class="flex flex-col items-center justify-center p-3 bg-white border-2 border-gray-100 rounded-xl hover:border-blue-500 transition-all group">
                        <span class="text-xl">🧾</span>
                        <span class="text-[10px] font-black text-gray-50:">BIOPAGO</span>
                    </button>
                </div>
            </div>

            <div class="p-4 bg-white border-t">
                <button class="w-full bg-green-500 hover:bg-green-600 text-white font-black py-4 rounded-xl text-lg shadow-lg flex flex-col items-center justify-center transition-transform active:scale-95 leading-tight">
                    <span>FINALIZAR VENTA</span>
                    <span class="text-[10px] font-normal opacity-90 uppercase tracking-tighter">Generar Factura Fiscal / Ticket</span>
                </button>
            </div>
        </div>
    </div>

</body>
</html>