<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PreguntaRespuestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preguntas = [
            'LANGMARC' => [
                ['texto' => '¿Qué significa HTML?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'HyperText Markup Language', 'es_correcta' => 1],
                    ['texto' => 'HyperText Markdown Language', 'es_correcta' => 0],
                    ['texto' => 'Home Tool Markup Language', 'es_correcta' => 0],
                    ['texto' => 'HyperLink and Text Markup Language', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Es XHTML una versión más estricta de HTML?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué etiqueta se usa para enlaces en HTML?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => '<a>', 'es_correcta' => 1],
                    ['texto' => '<link>', 'es_correcta' => 0],
                    ['texto' => '<href>', 'es_correcta' => 0],
                    ['texto' => '<url>', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Cuál es la función de la etiqueta <head> en HTML?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Contiene metadatos sobre el documento', 'es_correcta' => 1],
                    ['texto' => 'Muestra el contenido principal', 'es_correcta' => 0],
                    ['texto' => 'Define encabezados visibles', 'es_correcta' => 0],
                    ['texto' => 'Almacena imágenes', 'es_correcta' => 0]
                ]],
                ['texto' => '¿HTML es un lenguaje de programación?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 0],
                    ['texto' => 'Falso', 'es_correcta' => 1]
                ]],
                ['texto' => '¿Qué atributo de HTML define un enlace?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'href', 'es_correcta' => 1],
                    ['texto' => 'src', 'es_correcta' => 0],
                    ['texto' => 'link', 'es_correcta' => 0],
                    ['texto' => 'alt', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué etiqueta se usa para listas ordenadas en HTML?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => '<ol>', 'es_correcta' => 1],
                    ['texto' => '<ul>', 'es_correcta' => 0],
                    ['texto' => '<li>', 'es_correcta' => 0],
                    ['texto' => '<list>', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Se puede usar CSS para dar estilo a HTML?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué etiqueta define un formulario en HTML?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => '<form>', 'es_correcta' => 1],
                    ['texto' => '<input>', 'es_correcta' => 0],
                    ['texto' => '<submit>', 'es_correcta' => 0],
                    ['texto' => '<fieldset>', 'es_correcta' => 0]
                ]]
            ],
            'PROG' => [
                ['texto' => '¿Qué es un bucle for?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Una estructura de control que itera un número fijo de veces', 'es_correcta' => 1],
                    ['texto' => 'Una función matemática', 'es_correcta' => 0],
                    ['texto' => 'Un tipo de variable', 'es_correcta' => 0],
                    ['texto' => 'Un error en el código', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Un método en programación es lo mismo que una función?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué lenguaje es conocido por su facilidad para desarrollo web?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'PHP', 'es_correcta' => 1],
                    ['texto' => 'C++', 'es_correcta' => 0],
                    ['texto' => 'Assembly', 'es_correcta' => 0],
                    ['texto' => 'Python', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué significa OOP en programación?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Object-Oriented Programming', 'es_correcta' => 1],
                    ['texto' => 'Overhead Optimization Process', 'es_correcta' => 0],
                    ['texto' => 'Operational Output Program', 'es_correcta' => 0],
                    ['texto' => 'Object Order Processing', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Python es un lenguaje de tipado dinámico?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué palabra clave se usa para definir una variable en JavaScript?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'var', 'es_correcta' => 1],
                    ['texto' => 'let', 'es_correcta' => 0],
                    ['texto' => 'define', 'es_correcta' => 0],
                    ['texto' => 'new', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Cuál es el resultado de 1 + "1" en JavaScript?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => '11', 'es_correcta' => 1],
                    ['texto' => '2', 'es_correcta' => 0],
                    ['texto' => 'undefined', 'es_correcta' => 0],
                    ['texto' => 'Error', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué es una excepción en programación?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Un evento que interrumpe el flujo normal de un programa', 'es_correcta' => 1],
                    ['texto' => 'Una variable global', 'es_correcta' => 0],
                    ['texto' => 'Un ciclo infinito', 'es_correcta' => 0],
                    ['texto' => 'Una palabra reservada', 'es_correcta' => 0]
                ]]
            ],
            'BBDD' => [
                ['texto' => '¿Qué es una base de datos relacional?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Un sistema que organiza datos en tablas relacionadas', 'es_correcta' => 1],
                    ['texto' => 'Una base de datos basada en grafos', 'es_correcta' => 0],
                    ['texto' => 'Un sistema que no necesita estructuras', 'es_correcta' => 0],
                    ['texto' => 'Una base de datos en formato texto', 'es_correcta' => 0]
                ]],
                ['texto' => '¿El lenguaje SQL es usado para manipular bases de datos?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué comando SQL se usa para recuperar datos?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => "'SELECT'", 'es_correcta' => 1],
                    ['texto' => "'UPDATE'", 'es_correcta' => 0],
                    ['texto' => "'DELETE'", 'es_correcta' => 0],
                    ['texto' => "'INSERT'", 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué tipo de base de datos utiliza MongoDB?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'NoSQL', 'es_correcta' => 1],
                    ['texto' => 'SQL', 'es_correcta' => 0],
                    ['texto' => 'Relacional', 'es_correcta' => 0],
                    ['texto' => 'Distribuida', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué significa ACID en bases de datos?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Atomicidad, Consistencia, Aislamiento, Durabilidad', 'es_correcta' => 1],
                    ['texto' => 'Aceleración, Conexión, Integridad, Distribución', 'es_correcta' => 0],
                    ['texto' => 'Adaptabilidad, Colaboración, Inclusión, Definición', 'es_correcta' => 0],
                    ['texto' => 'Autonomía, Carga, Integración, Diversión', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué herramienta se usa para modelar bases de datos relacionales?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'MySQL Workbench', 'es_correcta' => 1],
                    ['texto' => 'Photoshop', 'es_correcta' => 0],
                    ['texto' => 'Excel', 'es_correcta' => 0],
                    ['texto' => 'IntelliJ IDEA', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué clave SQL elimina una tabla?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'DROP TABLE', 'es_correcta' => 1],
                    ['texto' => "'DELETE'", 'es_correcta' => 0],
                    ['texto' => 'TRUNCATE', 'es_correcta' => 0],
                    ['texto' => 'REMOVE', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué componente asegura la integridad referencial en una base de datos?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Claves foráneas', 'es_correcta' => 1],
                    ['texto' => 'Triggers', 'es_correcta' => 0],
                    ['texto' => 'Índices', 'es_correcta' => 0],
                    ['texto' => 'Particiones', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué diferencia hay entre SQL y NoSQL?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'SQL usa tablas y NoSQL usa documentos o grafos', 'es_correcta' => 1],
                    ['texto' => 'SQL es más rápido que NoSQL', 'es_correcta' => 0],
                    ['texto' => 'NoSQL siempre usa relaciones entre datos', 'es_correcta' => 0],
                    ['texto' => 'SQL no usa estructuras', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué comando SQL se usa para crear una tabla?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => "'CREATE TABLE'", 'es_correcta' => 1],
                    ['texto' => "'INSERT TABLE'", 'es_correcta' => 0],
                    ['texto' => 'ADD TABLE', 'es_correcta' => 0],
                    ['texto' => 'MAKE TABLE', 'es_correcta' => 0]
                ]]
            ],
            'DEVENV' => [
                ['texto' => '¿Qué es un entorno de desarrollo integrado (IDE)?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Un software que integra herramientas para desarrollo', 'es_correcta' => 1],
                    ['texto' => 'Un sistema operativo', 'es_correcta' => 0],
                    ['texto' => 'Un framework', 'es_correcta' => 0],
                    ['texto' => 'Una librería de código', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Eclipse es un IDE popular?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué herramienta es útil para control de versiones?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Git', 'es_correcta' => 1],
                    ['texto' => 'Docker', 'es_correcta' => 0],
                    ['texto' => 'Visual Studio Code', 'es_correcta' => 0],
                    ['texto' => 'SQL', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué es una compilación en desarrollo de software?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'El proceso de traducir código fuente a código máquina', 'es_correcta' => 1],
                    ['texto' => 'El diseño de la interfaz de usuario', 'es_correcta' => 0],
                    ['texto' => 'El despliegue del software en producción', 'es_correcta' => 0],
                    ['texto' => 'El almacenamiento de datos en memoria', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué hace un depurador (debugger)?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Ayuda a identificar y corregir errores en el código', 'es_correcta' => 1],
                    ['texto' => 'Compila el código fuente', 'es_correcta' => 0],
                    ['texto' => 'Optimiza el rendimiento del hardware', 'es_correcta' => 0],
                    ['texto' => 'Genera documentación automáticamente', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Cuál es una ventaja del control de versiones?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Permite trabajar en equipo sin sobrescribir cambios', 'es_correcta' => 1],
                    ['texto' => 'Aumenta la velocidad del software', 'es_correcta' => 0],
                    ['texto' => 'Simplifica la instalación de aplicaciones', 'es_correcta' => 0],
                    ['texto' => 'Evita el uso de bases de datos', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué herramienta popular se usa para control de versiones?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Git', 'es_correcta' => 1],
                    ['texto' => 'Docker', 'es_correcta' => 0],
                    ['texto' => 'MySQL', 'es_correcta' => 0],
                    ['texto' => 'Apache', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué es CI/CD?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Integración y entrega continua', 'es_correcta' => 1],
                    ['texto' => 'Control de interfaces', 'es_correcta' => 0],
                    ['texto' => 'Compilación instantánea', 'es_correcta' => 0],
                    ['texto' => 'Despliegue manual', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Un entorno virtual como Docker ayuda en qué área?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Asegurar que las aplicaciones se ejecuten en entornos consistentes', 'es_correcta' => 1],
                    ['texto' => 'Mejorar el diseño visual', 'es_correcta' => 0],
                    ['texto' => 'Incrementar la velocidad de procesamiento', 'es_correcta' => 0],
                    ['texto' => 'Gestionar servidores físicos', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué comando en Git se usa para guardar cambios?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'git commit', 'es_correcta' => 1],
                    ['texto' => 'git save', 'es_correcta' => 0],
                    ['texto' => 'git update', 'es_correcta' => 0],
                    ['texto' => 'git push', 'es_correcta' => 0]
                ]]
            ],
            'SYSTEM' => [
                ['texto' => '¿Qué es un sistema operativo?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Un software que gestiona los recursos del hardware', 'es_correcta' => 1],
                    ['texto' => 'Un lenguaje de programación', 'es_correcta' => 0],
                    ['texto' => 'Un compilador', 'es_correcta' => 0],
                    ['texto' => 'Una base de datos', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Linux es un sistema operativo de código abierto?', 'tipo' => 'boolean', 'respuestas' => [
                    ['texto' => 'Verdadero', 'es_correcta' => 1],
                    ['texto' => 'Falso', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué programa se usa para comprimir archivos?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'WinRAR', 'es_correcta' => 1],
                    ['texto' => 'Notepad++', 'es_correcta' => 0],
                    ['texto' => 'Visual Studio', 'es_correcta' => 0],
                    ['texto' => 'MySQL', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué función tiene un kernel en un sistema operativo?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Gestiona la comunicación entre hardware y software', 'es_correcta' => 1],
                    ['texto' => 'Proporciona almacenamiento en la nube', 'es_correcta' => 0],
                    ['texto' => 'Sirve como interfaz gráfica de usuario', 'es_correcta' => 0],
                    ['texto' => 'Ejecuta aplicaciones de terceros', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué es un sistema de archivos?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Una estructura para organizar y almacenar datos', 'es_correcta' => 1],
                    ['texto' => 'Un programa antivirus', 'es_correcta' => 0],
                    ['texto' => 'Un módulo de redes', 'es_correcta' => 0],
                    ['texto' => 'Una herramienta de encriptación', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué significa el comando ping en redes?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Prueba la conectividad entre dos dispositivos', 'es_correcta' => 1],
                    ['texto' => 'Apaga un dispositivo remoto', 'es_correcta' => 0],
                    ['texto' => 'Instala paquetes en Linux', 'es_correcta' => 0],
                    ['texto' => 'Mide la velocidad del disco', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué sistema operativo es conocido por su uso en servidores?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Linux', 'es_correcta' => 1],
                    ['texto' => 'Windows 95', 'es_correcta' => 0],
                    ['texto' => 'Android', 'es_correcta' => 0],
                    ['texto' => 'iOS', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Un cortafuegos (firewall) ayuda a qué?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Proteger una red contra accesos no autorizados', 'es_correcta' => 1],
                    ['texto' => 'Aumentar la velocidad de Internet', 'es_correcta' => 0],
                    ['texto' => 'Actualizar el hardware automáticamente', 'es_correcta' => 0],
                    ['texto' => 'Crear bases de datos relacionales', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué significa IP en redes?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Internet Protocol', 'es_correcta' => 1],
                    ['texto' => 'Internal Process', 'es_correcta' => 0],
                    ['texto' => 'Integrated Platform', 'es_correcta' => 0],
                    ['texto' => 'Information Package', 'es_correcta' => 0]
                ]],
                ['texto' => '¿Qué hace un DNS en Internet?', 'tipo' => 'test', 'respuestas' => [
                    ['texto' => 'Traduce nombres de dominio a direcciones IP', 'es_correcta' => 1],
                    ['texto' => 'Optimiza el tráfico web', 'es_correcta' => 0],
                    ['texto' => 'Proporciona almacenamiento en línea', 'es_correcta' => 0],
                    ['texto' => 'Mide la velocidad de Internet', 'es_correcta' => 0]
                ]]
            ]
        ];

        foreach ($preguntas as $codigoCategoria => $preguntasCategoria) {
            $categoria = DB::table('categorias')->where('codigo', $codigoCategoria)->first();

            if (!$categoria) {
                continue; // Si no se encuentra la categoría, se omite
            }

            foreach ($preguntasCategoria as $pregunta) {
                $pregunta_id = DB::table('preguntas')->insertGetId([
                    'id_categoria' => $categoria->id,
                    'texto' => $pregunta['texto'],
                    'tipo' => $pregunta['tipo']
                ]);

                foreach ($pregunta['respuestas'] as $respuesta) {
                    DB::table('respuestas')->insert([
                        'id_pregunta' => $pregunta_id,
                        'texto' => $respuesta['texto'],
                        'es_correcta' => $respuesta['es_correcta']
                    ]);
                }
            }
        }
    }
}
